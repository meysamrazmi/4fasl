<?php
function user_practices($uid){
  print user_practices_wrapper($uid);
}

function user_practices_wrapper($uid) {
  ob_start();
  $user = user_load($uid); //the user id of the user that is being viewed
  $expires = timetoexpire($user->uid);

  $q = db_select('node','n');
  $count = $q->fields('n', array())->condition('n.uid', intval($user->uid))->condition('n.status', 1)->condition('n.type', 'homework')->execute()->rowCount();
  $q->join('field_data_field_vip', 'v', 'n.nid = v.entity_id');
  $vip_count = 0;
  $vip_count = $q->fields('n', array())->condition('v.field_vip_value', 1)->condition('n.uid', intval($user->uid))->condition('n.status', 1)->condition('n.type', 'homework')->execute()->rowCount();

  /*$output = '';
  if ($expires['vip'] && $user->uid != 1 && $user->uid != 9307){
    if ($expires['honarjo']){
      $output .='<div class="honarjo-practices honarjo-en">';
      if (($count - $vip_count) < count(student_films($user->uid))){ //student_films returns at least 1 because of 'if'
        $output .= '<div class="add-practice" title-text="تمرین جلسه '. ($count - $vip_count + 1) .'" nid="'. max(student_films($user->uid)) .'">افزودن</div>';
      } else{
        $output .= '<div class="add-practice disabeld" title="به ازای هر جلسه فقط یک تمرین می توانید آپلود کنید."><span>به ازای هر جلسه فقط یک تمرین می توانید آپلود کنید.</span></div>';
      }
      $output .= views_embed_view('courses_list', 'block_2', $user->uid , 0);
      $output .='</div>';
    }


    $output .=
    '<div class="vip-practices vip-en">'.
      '<div class="add-practice">افزودن</div>';
    $output .= views_embed_view('courses_list', 'block_2', $user->uid , 1);
    $output .='</div>';

  } else if ($expires['honarjo'] && $user->uid != 1 && $user->uid != 9307){
    if ($count < count(student_films($user->uid))){ //student_films returns at least 1 because of 'if'
      $output .= '<div class="add-practice" title-text="تمرین جلسه '. ($count - $vip_count + 1) .'" nid="'. max(student_films($user->uid)) .'">افزودن</div>';
    } else{
      $output .= '<div class="add-practice disabeld" title="به ازای هر جلسه فقط یک تمرین می توانید آپلود کنید."><span>به ازای هر جلسه فقط یک تمرین می توانید آپلود کنید.</span></div>';
    }

    $output .= views_embed_view('courses_list', 'block_2', $user->uid);
  } else if ($expires['offline'] && $user->uid != 1 && $user->uid != 9307){
    $output .= '<div class="offline-practices"><div class="add-practice">افزودن</div>';
    $output .= views_embed_view('courses_list', 'block_2', $user->uid , 0);
    $output .='</div>';
  }
  print $output;*/

  $query =  db_select('pay_practice', 'payed');
  $query->join('node_comment_statistics', 'stats', 'payed.nid = stats.nid');
  $last = $query
    ->fields('payed', array())
    ->condition('payed.uid', $user->uid)
    ->condition('payed.nid', 0, '!=')
    ->condition('stats.comment_count', 0, '!=')
    ->orderBy('payed.description', 'DESC')
    ->execute()->fetchObject();

  //new user just enrolled
  if(!isset($last->id) && (isset($user->roles[4]) || isset($user->roles[7])) ){//user has a role but didn't send any practice, so he is new registered
    $expiration = db_select('uc_roles_expirations', 'e')
      ->fields('e', array())
      ->condition('e.uid', $user->uid)
      ->condition('e.expiration', time() , '>')
      ->orderBy('e.expiration', 'DESC')
      ->execute()->fetchObject();
  }

  //new user just enrolled and didnt send any practice
  if(isset($expiration->reid) && ((int)$expiration->expiration - time()) > 0 ):?>
    <div class="real-time" style="display:none;"><?php echo ((int)$expiration->expiration - time());?></div>
    <div id="timer1" class="timer" style="background: #fff;"></div>
    <script>
      var countdown = parseInt($('.real-time').text())
      var updateTimer1 = setInterval(function() {
        var timer = countdown
        var days = Math.floor(timer / (60 * 60 * 24));
        var hours = Math.floor((timer % ( 60 * 60 * 24)) / (60 * 60));
        var minutes = Math.floor((timer % ( 60 * 60)) / (60));
        var seconds = Math.floor((timer % (60)) / 1);

        if (timer < 0) {
          clearInterval(updateTimer1)
        } else{
          $("#timer1").html("<span>"+ days + "</span>روز<span>" + hours + "</span>ساعت<span>" + minutes + "</span>دقیقه<span>" + seconds + "</span>ثانیه<p>اگر تا زمان باقی مانده تمرین بعدی خود را ارسال کنید از 10 هزار تومان تخفیف برخوردار خواهید شد</p>")
          countdown--
        }
      }, 1000)
    </script>
  <?php elseif(isset($last->id) && (time() - (int)$last->description) < (60*60*24*7) ):?>
    <div class="real-time" style="display:none;"><?php echo (60*60*24*7) - (time() - (int)$last->description);?></div>
    <div id="timer1" class="timer" style="background: #fff;"></div>
    <script>
      var countdown = parseInt($('.real-time').text())
      var updateTimer1 = setInterval(function() {
        var timer = countdown
        var days = Math.floor(timer / (60 * 60 * 24));
        var hours = Math.floor((timer % ( 60 * 60 * 24)) / (60 * 60));
        var minutes = Math.floor((timer % ( 60 * 60)) / (60));
        var seconds = Math.floor((timer % (60)) / 1);

        if (timer < 0) {
          clearInterval(updateTimer1)
        } else{
          $("#timer1").html("<span>"+ days + "</span>روز<span>" + hours + "</span>ساعت<span>" + minutes + "</span>دقیقه<span>" + seconds + "</span>ثانیه<p>اگر تا زمان باقی مانده تمرین بعدی خود را ارسال کنید از 10 هزار تومان تخفیف برخوردار خواهید شد</p>")
          countdown--
        }
      }, 1000)
    </script>
  <?php endif;?>

  <button type="button" class="modal-btn practice-btn" data-toggle="modal" data-target=".points-for-practice" user="<?=$user->uid ?>">پرداخت برای تمرین</button>
  <?php
  $films = student_films($user->uid);
  $max = is_array($films) && count($films)? max($films) : 0;

  print '<div class="add-practice" title-text="تمرین جلسه '. ($count - $vip_count + 1) .'" nid="'. $max .'" style="display: none;">افزودن</div>';
  print views_embed_view('courses_list', 'block_2', $user->uid);
  ?>

  <div class="modal fade points-for-practice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">پرداخت اعتبار برای افزودن تمرین</h4> </div>
      <div class="modal-content"> ... </div>
    </div>
  </div>
  <?php if(!$expires['vip'] && !$expires['honarjo']):?>
    <script>
      $('.modal-content').addClass("failed").append('<p class="message fail">ابتدا باید در یک دوره ثبت نام کنید</p><a class="btn btn-block btn-primary" href="/get-started" style="margin: 0 auto 30px;width: 170px;">ثبت نام در دوره</a>')
    </script>
  <?php else:?>
    <script>
      $('.modal-btn').on('click', function(){
        $('.modal-content').html('<div class="loader spin"></div>');
        var el = $(this)
        $.ajax({
          url: "/user/"+ $(this).attr('user') + "/get-current-points",
          success: function(result){
            if(result.available > 0){
              $('.modal-content').addClass("success").html('<div style="padding: 50px 0;"><p class="message ok">تمرین خود را میتوانید بارگزاری کنید.</p></div>')
              $('.practice-btn').fadeOut().parents('.disabeld').fadeOut()
              $('.add-practice').fadeIn().click()
              $('.add-practice-menu').fadeIn()
              setTimeout(function(){
                $('.points-for-practice, .modal-backdrop').fadeOut()
              }, 3500)
            }
            else{
              var now = (new Date().getTime() / 1000);
              if((now - parseInt(result.lastPractice)) < (60*60*24*7)){
                var prices = '<span><i>45000  تومان</i><strong>35000  تومان</strong></span>'
                var price = 35000
              }else{
                var prices = '<span><strong>45000  تومان</strong></span>'
                var price = 45000
              }

              $('.modal-content').html($.parseHTML('<div id="timer2" class="timer"></div><p style="text-align: center;margin: 15px;">برای افزودن تمرین جدید باید مبلغ '+ prices +' از حساب کاربری شما کسر شود</p><div class="avail-points">میزان اعتبار قابل برداشت شما برابر <strong>'+ result.displayPoints +'  تومان</strong> است.</div>'))

              //setting timer
              if((now - parseInt(result.lastPractice)) < (60*60*24*7)){
                var updateTimer = setInterval(function() {
                  now = (new Date().getTime() / 1000);
                  var timer = (60*60*24*7) - (now - (parseInt(result.lastPractice)))
                  var days = Math.floor(timer / ( 60 * 60 * 24));
                  var hours = Math.floor((timer % ( 60 * 60 * 24)) / ( 60 * 60));
                  var minutes = Math.floor((timer % (60 * 60)) / ( 60));
                  var seconds = Math.floor((timer % (60)) / 1);

                  if (timer < 0)
                    clearInterval(updateTimer)
                  else
                    $("#timer2").html("<span>"+ days + "</span>روز<span>" + hours + "</span>ساعت<span>" + minutes + "</span>دقیقه<span>" + seconds + "</span>ثانیه<p>اگر تا زمان باقی مانده تمرین بعدی خود را ارسال کنید از  10 هزار تومان تخفیف برخوردار خواهید شد</p>")
                }, 1000)
              }

              if(result.points >= price){
                $('.modal-content').append('<div style="text-align: center;"><a class="btn btn-default" href="/user/'+ el.attr('user') + '/money/charge" style="width: 130px;vertical-align: top;">شارژ حساب کاربری</a><a class="btn btn-success pay" href="/user/'+ el.attr('user') + '/pay/'+ price +'" style="margin: 0 70px 30px 0;width: 170px;">پرداخت از اعتبار</a></div>')
              }
              else{
                $('.modal-content').append('<p style="text-align: center;">اعتبار شما کافی نیست</p><a class="btn btn-block btn-primary" href="/user/'+ el.attr('user') + '/money/charge" style="margin: 0 auto 30px;width: 170px;">شارژ حساب کاربری</a>')
              }
            }
          }
        });
      })

      $('.modal-content').on('click', '.pay', function(e){
        e.preventDefault()
        var el = $(this)
        console.log(el)
        console.log(el.attr('href'))
        el.parent().append('<div class="loading"><div class="loader small spin"></div></div>')
        $.ajax({
          url: el.attr('href') ,
          success: function(result){
            console.log(result)
            if(result.status == 'ok'){
              el.parents('.modal-content').addClass("success").append('<p class="message '+ result.status +'">'+ result.message +'</p>')
              $('.practice-btn').fadeOut().parents('.disabeld').fadeOut()
              $('.add-practice').fadeIn().click()
              $('.add-practice-menu').fadeIn()
              setTimeout(function(){
                $('.points-for-practice, .modal-backdrop').fadeOut()
              }, 4500)
            }
            else{
              el.parents('.modal-content').addClass("failed").append('<p class="message '+ result.status +'">'+ result.message +'</p>')
            }
            el.parent().find('.loading').remove()
          }
        });
      })

    </script>
  <?php endif;?>

  <style>
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    .modal-content span {
      margin: 0 10px;
    }
    .modal-content span i {
      text-decoration: line-through;
      color: #F44336;
      margin: 0 -5px 0 5px;
    }
    .timer span {
      margin: 0 4px;
      padding: 0px 3px;
      background: #ddd;
      border-radius: 5px;
    }
    .timer {
      text-align: center;
      padding: 10px 0 1px;
      line-height: 30px;
      background: #f5f5f5;
      border-bottom: 1px solid #eee;
    }
    .loader {
      border: 10px solid #f3f3f3;
      border-top: 10px solid #673AB7;
      border-radius: 50%;
      width: 80px;
      height: 80px;
      animation: spin 2s linear infinite;
      margin: 20px auto;
    }
    .modal-content p.message.ok {
      position: absolute;
      height: 100%;
      top: -15px;
      background: #fff;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .modal-content p.message.ok{
      border-top: 1px solid #4CAF50;
    }
    .modal-content p.message.fail{
      position: relative;
      text-align: center;
      padding: 10px 15px 15px;
      border-top: 1px solid #F44336;
    }
    p.message.ok:before {
      content: "\f134";
      font-family: mat;
      color: #4CAF50;
      font-size: 36px;
      margin: 20px;
    }
    p.message.fail:before {
      content: "\f15a";
      font-family: mat;
      color: #F44336;
      font-size: 36px;
      margin: 20px;
      vertical-align: middle;
    }
    .field-name-user-practices .practice-btn {
      position: absolute;
      left: 0;
      top: 25px;
      background: #693496;
      color: #fff;
      width: 50px;
      height: 50px;
      margin-left: 30px;
      border-radius: 50%;
      box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
      border: none;
      cursor: pointer;
      font-size: 0;
      background-position: 8px 12px;
      background-size: 35px;
      background-repeat: no-repeat;
    }
    .field-name-user-practices .practice-btn:before,.field-name-user-practices .practice-btn:after{
      content: "\f415";
      font-family: mat;
      position: absolute;
      font-size: 24px;
      text-align: center;
      width: 50px;
      line-height: 50px;
      transition: all 0.1s;
      top: 0;
      right: 0;
    }
    .loader.small {
      width: 30px;
      height: 30px;
      border-width: 3px;
    }
    .field-name-user-practices .practice-btn:after {
      content: "\f374";
    }
    .modal-content .loading {
      position: absolute;
      z-index: 1;
      background: rgba(255, 255, 255, 0.7);
      width: 100%;
      bottom: 0;
      height: 80px;
    }
    .modal-content p.message.ok:after {
      content: "";
      position: absolute;
      bottom: -15px;
      width: 100%;
      left: 0;
      height: 5px;
      background: #aaa;
      animation: loaded 4.5s linear;
    }
    @keyframes loaded {
      0% { width: 100%; }
      100% { width: 0; }
    }
  </style>

<?php
  return ob_get_clean();
}
?>

