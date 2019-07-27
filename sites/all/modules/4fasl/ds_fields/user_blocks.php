<?php
function user_blocks() {
  ob_start();
  $loged_in_user = user_load($GLOBALS['user']->uid);

  $path = explode("/", current_path());
  if( ($path[0] == 'user' || $path[0] == 'users') && isset($path[1])){
    $user = user_load(intval($path[1]));
  }else{
    $user = $loged_in_user;
  }
  $expires = timetoexpire($user->uid);
?>
<div class="user-data">
  <div class="u-role">
    <div class="icon"></div>
    <div class="data">
      <?php
      if ($expires['honarjo'] || $expires['vip']){
        print '<span class="title">اعتبار کاربری</span>
				<div class="data">
				<a href="/user/'. $user->uid .'/points" style="font-size: 14px;" target="_blank">'. formatMoney(userpoints_get_current_points($user->uid, 'all')) . " تومان " . '</a>
				</div>';
      }
      else{
        print '<span class="title">دوره</span>
				<div class="data">
					<a href="/get-started" style="font-size: 14px;" target="_blank">ثبت نام کنید</a>
				</div>';
      }
      /*else{
        $expires = timetoexpire($user->uid);

        if ($expires['honarjo'] || $expires['vip']){
          $stu = db_select('user_relationships', 'ur')
            ->fields('ur', array('requestee_id' , 'rtid'))
            ->condition('requester_id', $user->uid,'=')
            ->condition('rtid', array(1,3),'IN') //honarjoo and vip relationship type id
            ->execute()->fetchAll();

          foreach($stu as $row){
            if($row->rtid == 1){
              $teacher = new stdClass();
              $teacher = user_load(intval($row->requestee_id));
            }else if($row->rtid == 3){
              $teacher_vip = new stdClass();
              $teacher_vip = user_load(intval($row->requestee_id));
            }
          }
          if($expires['honarjo']>0){
            print '<span class="title honarjo-en">تا پایان کاربری</span>';
            print '<div class="data honarjo-en">' . floor( $expires['honarjo'] ) . ' روز</div>';
          } else if($expires['honarjo']<0){
            print '<span class="title honarjo-en">پایان کاربری</span>';
            print '<div class="user-tamdid honarjo-en" ><a href="/cart/add/p139_a5o20_a3o'
              . instrument_info('name', $teacher->field_favorite['und'][0]['value'], array('oid'))
              .'-itamdid?destination=cart/checkout" target="_blank" >تمدید کنید</a></div>';
          }
          if ($expires['vip']>0){
            print '<span class="title vip-en">تا پایان VIP</span>';
            print '<div class="data vip-en">' . floor( $expires['vip'] ) . ' روز</div>';
          }else	if ($expires['vip']<0){
            print '<span class="title vip-en">پایان کاربری</span>';
            print '<div class="user-tamdid vip-en" ><a href="/cart/add/p139_a5o21_a3o'
              . instrument_info('name', $teacher_vip->field_favorite['und'][0]['value'], array('oid'))
              .'-itamdid?destination=cart/checkout" target="_blank" >تمدید کنید</a></div>';
          }
        }else{
          print '<div class="data"> ثبت نام نکرده</div>';
        }
      }*/
      ?>
    </div>
  </div>
  <div class="u-prac">
    <div class="icon"></div>
    <div class="data">
      <span class="title">تمرین ها</span>
      <?php
      $q = db_select('node','n');
      $count = $q->fields('n', array())->condition('n.uid', intval($user->uid))->condition('n.status', 1)->condition('n.type', 'homework')->execute()->rowCount();
      $q->join('field_data_field_vip', 'v', 'n.nid = v.entity_id');
      $vip_count = 0;
      $vip_count = $q->fields('n', array())->condition('v.field_vip_value', 1)->condition('n.uid', intval($user->uid))->condition('n.status', 1)->condition('n.type', 'homework')->execute()->rowCount();

      if ($count){
        if($vip_count){
          if ($count != $vip_count)	{
            print '<div class="data db honarjo-practicess honarjo-en">' . ($count - $vip_count) . ' تمرین</div>';
          }else{
            print '<div class="data honarjo-practices honarjo-en">تمرینی ندارید.</div>';
          }
          print '<div class="data db vip-practices vip-en">' . $vip_count . ' تمرین</div>';
        }else{
          print '<div class="data db honarjo-practices honarjo-en">' . $count . ' تمرین</div>';
          if ($expires['vip'])	{
            print '<div class="data vip-practices vip-en">تمرینی ندارید.</div>';
          }
        }
      }else{
        print '<div class="data">تمرینی ندارید.</div>';
      }
      ?>
    </div>
  </div>
  <div class="u-film honarjo-en">
    <div class="icon"></div>
    <div class="data">
      <span class="title">فیلم ها</span>
      <?php
      /*student_films function was coded in uc_user module */
      if (student_films($user->uid)){
        print '<div class="data db">' . count(student_films($user->uid)) . ' فیلم</div>';
      }else{
        print '<div class="data">دوره ای ندارید.</div>';
      }
      ?>
    </div>
  </div>
  <?php
  if ($expires['vip']):
    $nid = 0;
    $node_title = '';
    if(isset($user->field_favorite['und'][0])){
      switch ($user->field_favorite['und'][0]['value']){
        case 'guitar' :
          $nid = 28;
          $node_title = 'گیتار کلاسیک';
          break;
        case 'guitarflamenco ' :
          $nid = 46;
          $node_title = 'گیتار فلامنکو';
          break;
        case 'guitarpop ' :
          $nid = 50;
          $node_title = 'گیتار پاپ';
          break;
        case 'daf' :
          $nid = 143;
          $node_title = 'دف';
          break;
        case 'santor' :
          $nid = 44;
          $node_title = 'سنتور';
          break;
        case 'piano' :
          $nid = 49;
          $node_title = 'پیانو';
          break;
        case 'tar' :
          $nid = 47;
          $node_title = 'تار';
          break;
        case 'setar' :
          $nid = 48;
          $node_title = 'سه تار';
          break;
        case 'tonbak' :
          $nid = 42;
          $node_title = 'تنبک';
          break;
        case 'violin' :
          $nid = 45;
          $node_title = 'ویلن';
          break;
        case 'daf' :
          $nid = 143;
          $node_title = 'دف';
          break;
        default :
          $nid = 0;
      }
    }
    ?>
    <div class="u-saaz vip-en">
      <div class="icon"></div>
      <div class="data">
        <span class="title">ساز تمرینی</span>
        <?php
        print '<div class="data db">' . $node_title . '</div>';
        ?>
      </div>
    </div>
  <?php endif;?>
  <div class="u-star">
    <div class="icon"></div>
    <div class="data" style="padding: 3px 0;">
      <div class="title">امتیاز
        <span class="btn btn-sm help-link" user="<?php echo $user->uid;?>">راهنما</span>
      </div>
      <?php
      if(isset($loged_in_user->roles[3])){
        $output = field_view_field('user', $user, 'field_stu_stars', array(
          'label'=>'hidden',
        ));
        print render($output);
      }
      else{
        $sql =
          "SELECT AVG(vote.value) AS star_points
						FROM votingapi_vote vote
						WHERE vote.entity_type = 'user' AND vote.entity_id = :entity_id 
						";//AND vote.uid = :uid / , ':uid' => $loged_in_user->uid
        if($row = db_query($sql, array(':entity_id' => $user->uid))->fetchObject()){
          print '<div class="data points'. round($row->star_points / 20 , 0) . '">' . round($row->star_points / 20 , 0) . '</div>';
          print '<div class="data points">';
          for($i = 0 ; $i < round($row->star_points / 20 , 0) ; $i++){
            print '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
          }
          $field = field_view_field('user', $user, 'field_stu_stars');
          print render($field);
          print '</div>';

        }
      }
      ?>

      <div id="star-timer1" class=""><div class="loader spin"></div></div>
      <script>
        $(document).ready(function () {
          $.ajax({
            url: "/user/"+ $('.help-link').attr('user') + "/get-current-points",
            success: function(result){
              var now = new Date().getTime() / 1000;

              //setting timer
              if((now - parseInt(result.lastPractice)) < (60*60*24*14)){
                var updateTimer = setInterval(function() {
                  now = new Date().getTime();
                  var timer = (60*60*24*14*1000) - (now - (parseInt(result.lastPractice)*1000))
                  console.log(timer)
                  var days = Math.floor(timer / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((timer % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((timer % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((timer % (1000 * 60)) / 1000);

                  if (timer < 0)
                    clearInterval(updateTimer)
                  else
                    $("#star-timer1").html("<span>"+ days + "</span>:<span>" + hours + "</span>:<span>" + minutes + "</span>:<span>" + seconds + "</span>")
                }, 1000)
              }else{
                $("#star-timer1").remove()
              }

            }
          })
          $('.help-link').on('click', function(){
            $('.star-help').slideDown()
          })

        })
      </script>
    </div>
  </div>
</div>
<div class="description rules star-help">
  <span class="close"></span>
  <div class="rules-rules">
    <p>امتیازات(ستاره ها) بنا به نظر استاد اهدا می شوند.</p>
    <p>پیشرفت آموزش و استمرار در ارسال تمرینات در اهدا امتیازات موثر است</p>
    <p>در صورت دریافت هر 5 ستاره، اعتبار هدیه به هنرجویان اختصاص داده می شود.</p>
    <p>عدم ارسال تمرین به مدت 2 هفته باعث حذف تمام امتیازات خواهد شد.</p>
    <div id="star-timer" class="timer"><div>اگر تا زمان باقی مانده تمرین بعدی خود را ارسال نکنید، ستاره های شما پاک خواهد شد.</div></div>
  </div>
  <div class="title" style="display:none;"><img src="/sites/all/themes/bootstrap/images/law-book.svg"><span>شرایط و قوانین امتیاز ها</span></div>
</div>
<style>
  .help-block {
    display: none;
  }
  .fivestar-widget {
    margin: auto;
    width: 120px;
  }
  span.help-link {
    margin-right: 10px;
    background: rgba(0, 0, 0, 0.25);
    padding: 1px 10px;
    color: #fff !important;
  }
  .description.star-help {
    margin: 0px 0 0px !important;
    position: relative;
    display: none;
  }
  span.close {
    opacity: 1;
    position: absolute;
    left: 15px;
    top: 15px;
    cursor: pointer;
    z-index: 2;
  }
  span.close:before {
    content: "\f15a";
    font-family: mat;
    font-weight: normal;
    color: #F44336;
  }
  .rules-rules {
    width: 100%;
  }
  div#star-timer {
    margin: 15px -15px -10px -15px;
    border-top: 1px solid #ccc;
    padding: 15px;
  }
  div.fivestar-widget div.on a {position: relative;}

  div.fivestar-widget .star a:before {
    content: "\f4ce";
    font-family: mat;
    position: absolute;
    z-index: 100;
    color: #eee;
    font-size: 17px;
    left: 0;
    width: 17px;
    text-indent: 0;
    line-height: 17px;
    height: 17px;
  }

  div.fivestar-widget div.hover a:before {
    color: #FF9800 !important;
  }

  div.fivestar-widget div.on a:before {
    color: #FFEB3B;
  }

  div.fivestar-widget .star a, div.fivestar-widget .star {
    background: none;
    position: relative;
  }

  div.fivestar-widget .cancel a:before {
    content: "\f15a";
    font-family: mat;
    z-index: 1;
    position: absolute;
    text-indent: 0;
    left: 0;
    line-height: 19px;
    color: #F44336;
    border-radius: 50%;
    height: 20px;
    width: 20px;
    font-size: 19px;
    border: 1px solid #fff;
    background: rgba(255, 255, 255, 0.6);
  }

  div.fivestar-widget .cancel a,div.fivestar-widget .cancel {
    position: relative;
    background: none !important;
    width: 20px;
    height: 20px;
    margin: 0px 0px 0 5px;
  }
  div#star-timer1 {
    margin: 3px 0 0 0;
    line-height: 20px;
  }
  div#star-timer1 span {
    padding: 0 3px;
    font-size: 13px;
    background: rgba(103, 58, 183, 0.62);
    border-radius: 3px;
    margin: 0px 2px;
  }
  div#star-timer1 .loader {
    margin: 0 auto;
    width: 20px;
    height: 20px;
    border: 2px solid #673ab752;
    border-top: 2px solid #673AB7;
  }
</style>

<?php
  print ob_get_clean();
}
?>