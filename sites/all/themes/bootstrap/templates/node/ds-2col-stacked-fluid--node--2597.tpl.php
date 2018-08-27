<?php

/**
 * @file
 * Display Suite fluid 2 column stacked template.
 */

  // Add sidebar classes so that we can apply the correct width in css.
  if (($left && !$right) || ($right && !$left)) {
    $classes .= ' group-one-column';
  }
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="ds-2col-stacked-fluid <?php print $classes;?> clearfix">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <<?php print $header_wrapper ?> class="group-header<?php print $header_classes; ?>">
    <?php 
	$header = str_replace('form-item-attributes-3 form-type-radio radio', 'form-item-attributes-3 form-type-radio radio col-lg-2 col-md-3 col-sm-4 col-xs-6 card-view', $header); 
	$header = str_replace('attribute attribute-3', 'attribute attribute-3 active', $header); 
	print $header; ?>
  </<?php print $header_wrapper ?>>

  <?php if ($left): ?>
    <<?php print $left_wrapper ?> class="group-left<?php print $left_classes; ?>">
      <?php print $left; ?>
    </<?php print $left_wrapper ?>>
  <?php endif; ?>

  <?php if ($right): ?>
    <<?php print $right_wrapper ?> class="group-right<?php print $right_classes; ?>">
      <?php print $right; ?>
    </<?php print $right_wrapper ?>>
  <?php endif; ?>

  <<?php print $footer_wrapper ?> class="group-footer<?php print $footer_classes; ?>">
    <?php print $footer; ?>
  </<?php print $footer_wrapper ?>>

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
<script>
$('body').append('<div class="modal fade ostad-timing" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">  <div class="modal-dialog modal-lg" role="document">    <div class="modal-header">      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left;"><span aria-hidden="true">&times;</span></button>      <h4 class="modal-title" id="myModalLabel">برنامه زمانی اساتید آموزشگاه</h4>    </div>    <div class="modal-content">      ...    </div>  </div></div>');
</script>
  <style>
.classes-timing {
    width: 100%;
}
.classes-timing td {
    border: 1px solid #eee;
}
.classes-timing td .busy,
.classes-timing td .disabled {
    opacity: 0.4;
	background: #ccc;
    cursor: default;
}
.classes-timing td label {
    padding: 10px;
    display: block;
    margin: 0;
    font-family: fanum;
    font-weight: normal;
	cursor: pointer;
	transition: all 0.3s ease;
}
.classes-timing td label input {
    margin: 0;
}
td.day-persian_name {
    padding: 0 15px;
    text-align: center;
}
#time-selection button {
    float: left;
    min-width: 150px;
    margin: 15px 0 0 0;
}
.breadcrumb {
    display: none;
}
#node-2556 {
    padding-top: 0;
}
#time-selection input[type="radio"][disabled] {
    opacity: 0.3;
}
#time-selection tr + tr {
    border-top: 1px solid rgba(103, 58, 183, 0.5) !important;
}
#time-selection tr {
    border-bottom: none;
}
#time-selection td {
    border-width: 0 0px 0 0px !important;
}
.classes-timing td label.selected {
	box-shadow: 0px 0px 10px #673AB7;
    z-index: 1;
    border-radius: 5px;
    background: #fff;
    border-bottom-width: 0px;
}
#time-selection td:first-child {
    border: 1px solid #fff !important;
    border-left: 1px solid rgba(103, 58, 183, 0.5) !important;
    font-weight: 500;
}
.course-info {
    background: #fcfcfc;
    padding: 15px;
    border: solid #FFC107;
    border-width: 0 3px;
    margin: 10px;
	display: flex;
    justify-content: space-around;
    box-shadow: 0 1px 6px rgba(0,0,0,0.12), 0 1px 4px rgba(0,0,0,0.12);
}
.course-info p {
    margin: 0;
}
.course-info .seperator {
    background: #FFC107;
    width: 1px;
    height: 32px;
    margin: -5px 0 -5px 0;
}
#node-2556 .description.rules {
    margin: 0 0 10px 0;
    box-shadow: none;
    border: none;
    padding: 15px 0 0;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
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
  </style>
<style>
.breadcrumb {
    display: none;
}
.main-container {
    padding: 0;
}
#navbar {
    height: 250px !important;
}
.main-container {
    margin-top: -73px !important;
}
.attribute.attribute-4 {
    width: initial !important;
    position: absolute;
    bottom: 38px !important;
    height: initial !important;
}
form#uc-product-add-to-cart-form-2597 {
    overflow: hidden;
}
div#uc_product_add_to_cart_form-2597-attributes {
    display: flex;
    width: 200%;
    overflow: auto;
    align-items: flex-start;
    margin-right: 0%;
}
div#uc_product_add_to_cart_form-2597-attributes > .attribute {
    width: 100%;
    overflow: hidden;
    height: 0;
    padding: 0 15px;
    margin-bottom: 0;
}
div#uc_product_add_to_cart_form-2597-attributes > .attribute.active {
    height: initial;
}
.add-to-cart .alert {
    margin: -15px 25px 0px;
}
form#uc-product-add-to-cart-form-2597:not(.last-one) .form-actions {
    display: none;
}
#edit-submit-2597.node-add-to-cart {
    background-color: #5cb85c;
    border-color: #4cae4c;
    margin-left: 15px;
}
#edit-attributes-7 .form-item {
    width: 100%;
}
div#edit-attributes-7 .form-item > label {
    width: 200px;
    float: right;
}
div#edit-attributes-7 .form-item .teacher-intro {
    width: calc(100% - 200px);
    padding: 15px 50px 0 15px;
    box-sizing: border-box;
    box-shadow: none;
    background: transparent;
    margin: 0;
	border: none;
}
#time-selection {
    width: 100%;
    overflow: auto;
}
</style>
<script>
(function ($) {

var translate_options = []
$.ajax({
	url: "/admin/4fasl-setting/get/offline",
	success: function(result){
		translate_options = result
	}
});

Drupal.behaviors.myregister = {attach: function (context, settings) {
	
var translate_optionsId = {};
Object.keys(translate_options).map(function(objectKey) {
	var val = translate_options[objectKey];
	Object.defineProperty(translate_optionsId, val.oid, {
		value: val,
		writable: true
	});
});
$('div#edit-attributes-3 .form-item').each(function(){
	$(this).addClass('col-lg-2 col-md-3 col-sm-4 col-xs-6 card-view');
	var oldtitle = $(this).find('.oldtitle').text().split('+');
	$(this).find('.oldtitle').text(oldtitle[0].replace(',', ''));
	if(oldtitle[1] != "undefined"){
		$(this).find('label').append('<span class="price">'+ oldtitle[1] +'</span>');
	}
	// var item = $(this);
	// var key ;
	// Object.keys(translate_options).map(function(objectKey) {
		// var value = translate_options[objectKey];
		// if(value.oid == item.find('input').attr('value')){
			// key = value;
			// return ;
		// }
	// });
	//$(this).find('label').append('<p class="course-link"><a href="/'+ translate_optionsId[$(this).find('input').attr('value')].name +'" target="_blank">معرفی دوره</a></p>');
});  
$('div#edit-attributes-7 .form-item').each(function(){
	$(this).addClass('card-view').css({'display':'none'});
});
$('div#edit-attributes-3 .form-item input, div#edit-attributes-7 .form-item input, div#edit-attributes-5 .form-item input').change(function(){
	if($(this).hasClass('form-radio')){
		if($(this).is( ":checked" )){
			$(this).parents('.form-item.form-group').find('.selected').removeClass('selected');
			$(this).parent().parent().addClass('selected');
		}
	}else{
		if($(this).is( ":checked" )){
			$(this).parent().parent().addClass('selected');
		}else{
			$(this).parent().parent().removeClass('selected');
		}
	}
});
$('div#edit-submitted-instrument input').change(function(){
	if($(this).is( ":checked" )){
		$('.selected').removeClass('selected');
		$(this).parent().parent().addClass('selected');
		$(this).parent().parent().parent().addClass('selected');
	}
});

/* $('div#edit-attributes-3 .form-item input').change(function(){
	if($('#edit-attributes-3-23').is( ":checked")){
		$('#edit-attributes-6-22').prop('checked' , true);
		$('.uc-product-35 .uc-price').text('60,000تومان');
	}else{
		$('#edit-attributes-6-22').prop('checked' , false);
		$('.uc-product-35 .uc-price').text('80,000تومان');
	}
});
$("div#edit-attributes-3 label[for*='edit-attributes-3-23']").prepend('<i>تخفیف ویژه</i>'); */
/*-----------------------------------------------------------------------------------------------------------*/
$('#uc-product-add-to-cart-form-2597 .attribute.attribute-3').append('<button class="btn btn-primary">انتخاب استاد<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>');
$('#uc-product-add-to-cart-form-2597 .attribute.attribute-5').append('<button class="btn btn-primary">انتخاب استاد<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>');
$('.attribute-5 > .form-item-attributes-5').prepend('<div class="description"><p><span>دوره مقدماتی:</span> با ثبت نام در این دوره، موارد آموزشی از ابتدا برای شما صورت میگیرد. ثبت نام در دوره مقدماتی احتیاج به هیچ پیش نیاز و آموزش قبلی در موسیقی نداشته و پس از ثبت نام، جلسه به جلسه زیر نظر استاد، موارد آموزشی را فرا خواهید گرفت.</p><p><span>دوره VIP:</span> با ثبت نام در این دوره، موارد آموزشی بر اساس سطح نوازندگی شما، به شما ارائه میشود. این دوره مخصوص هنرجویانی است که آشنایی قبلی با موسیقی و ساز مورد نظر دارند و تمایل به آموزش از سطح مقدماتی را ندارند. در صورتیکه برای آغاز آموزش، نیاز به مشاوره با استاد را دارید میتوانید در بخش پشتیبانی و در قسمت تعیین سطح، اقدام به ارسال توضیحات و ویدیوی تصویری از نوازندگی خود کنید. استاد راهنمایی های لازم را به جهت ادامه ی آموزش به شما ارائه خواهند داد.</p></div>');
$('.attribute-3 > .form-item-attributes-3').append('<div class="description rules"><div><p>ثبت نام در دوره های آموزشی حضوری بصورت ماهیانه بوده و 4 هفته اعتبار دارد و مدت زمان هر جلسه نیم ساعت می باشد.</p><p>هزینه کلاس موسیقی کودک برای یک ترم (۱۲ هفته) در نظر گرفته شده است</p><p>زمان جلسات ساز هنگ درام به مدت 1 ساعت می باشد لذا قیمت ثبت نام در آن دو برابر می باشد</p><p>پس از ثبت نام، روز و ساعت کلاس آموزشی برای شما اختصاص داده میشود و شما هر هفته در همان زمان اعلام شده از کلاس آموزشی استفاده می کنید</p><p>غیبت از کلاس باعث سوخت شدن جلسه شما میشود. البته در مواقعی که نتوانید در کلاس حضور یابید (بعلت بیماری و یا مسافرت و ...) میتوانید جلسه را بصورت مجازی شرکت کنید. بدین منظور حتما یک روز قبل از کلاس باید هماهنگی های لازم را با آموزشگاه به عمل آورید.</p><p>برای آشنایی بیشتر می توانید <a href="/faq" class="btn" target="_blank">سوالات متداول</a> و <a href="/node/66" class="btn" target="_blank">نحوه ی کار</a> را مشاهده کنید.</p></div><div class="title"><img src="/sites/all/themes/bootstrap/images/law-book.svg"><span>شرایط و قوانین ثبت نام</span></div></div>');
$('#uc-product-add-to-cart-form-2597 .attribute.attribute-3').addClass('active');

$('.shopping-stepper .step').click(function(){
	$('.add-to-cart .alert').remove();
	if(!$('form#uc-product-add-to-cart-form-2597 > div').hasClass('rule-checked')){
		$('.add-to-cart').prepend('<div class="alert alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>تیک شرایط و قوانین را بزنید.</div>');
		return;
	}
	var flag = false;
	var index = $('.attributes > .active').index();
	$('.attributes > .active').find('.form-item').each(function(){
		if($('.attribute-7').hasClass('active')){
			if($(this).hasClass('acrive')){
				if($(this).find('input').is(":checked")){
					flag = true;
					$('.shopping-stepper .active').addClass('done');
				}
			}
		}else{
			if($(this).find('input').is(":checked")){
				flag = true;
				$('.shopping-stepper .active').addClass('done');
			}
		}
	});
	if($(this).index() < index){ //clicking previuse section
		flag = true;
	}
	if(flag){
		if($(this).index() == 3){
			$('#edit-submit-2597.node-add-to-cart').click();
			return;
		}
		$('.shopping-stepper .active, .attributes > .active').removeClass('active');
		$('.attributes').children('.attribute').eq($(this).index()).addClass('active');
		$(this).addClass('active');
		if($('.attribute-7').hasClass('active')) SelectingTeacher();
		$('.attributes').css({'margin-right' : ($(this).index() * -100) + '%'});
		$('.attribute-4.rule-checked').css({'display': 'none'});
		if($('.attribute-7').hasClass('active')){
			$('form#uc-product-add-to-cart-form-2597').addClass('last-one');
		}else{
			$('form#uc-product-add-to-cart-form-2597').removeClass('last-one');
		}
	}else{
		$('.add-to-cart').prepend('<div class="alert alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>باید یکی از گزینه ها را انتخاب کنید.</div>');
	}
});

$('.attributes .attribute > .btn').click(function(e){
	e.preventDefault();
	$('.add-to-cart .alert').remove();
	if(!$('form#uc-product-add-to-cart-form-2597 > div').hasClass('rule-checked')){
		$('.add-to-cart').prepend('<div class="alert alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>تیک شرایط و قوانین را بزنید.</div>');
		$('html, body').animate({scrollTop: 200}, 200);
		return;
	}
	var flag = false;
	$(this).parents('.attribute').find('.form-item').each(function(){
		if($('.attribute-7').hasClass('active')){
			if($(this).hasClass('acrive')){
				if($(this).find('input').is(":checked")){
					flag = true;
					$('.shopping-stepper .active').addClass('done');
				}
			}
		}else{
			if($(this).find('input').is(":checked")){
				flag = true;
				$('.shopping-stepper .active').addClass('done');
			}
		}
	});
	if(flag){
		$('.shopping-stepper .active').addClass('done');
		$('.shopping-stepper .active, .attributes > .active').removeClass('active');
		var index = $(this).parents('.attribute').index() + 1;
		$('.attributes').children('.attribute').eq(index).addClass('active');
		$('.shopping-stepper').children('.step').eq(index).addClass('active');
		if($('.attribute-7').hasClass('active')) SelectingTeacher();
		$('.attributes').css({'margin-right' : (index * -100) + '%'});
		if($('.attribute-7').hasClass('active')){
			$('form#uc-product-add-to-cart-form-2597').addClass('last-one');
		}else{
			$('form#uc-product-add-to-cart-form-2597').removeClass('last-one');
		}
		$('.attribute-4.rule-checked').css({'display': 'none'});
	}else{
		$('.add-to-cart').prepend('<div class="alert alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>باید یکی از گزینه ها را انتخاب کنید.</div>');
	}
	$('html, body').animate({scrollTop: 100}, 200);
});

var SelectingTeacher = function(){
	var selected = [];
	$('.attribute-3 .form-item input').each(function(){
		if($(this).is( ":checked" )){
			selected.push(parseInt($(this).attr('id').substr(18)));
		}
	});
	$('#edit-attributes-7 .acrive').css({'display':'none'}).removeClass('acrive')
	$('#edit-attributes-7 .teacher-intro').remove();
	Object.keys(translate_options).map(function(objectKey) {
		var value = translate_options[objectKey];
		if(value.oid == selected[0]){
			TeachersItems(value)
		}
	});
	if($('#edit-attributes-7 .acrive').length == 1){
		$('#edit-attributes-7 .acrive').find('input').prop('checked', true);
		$('#edit-attributes-7 .acrive').find('label').addClass('selected');
	}
};

var TeachersItems = function(key){
	//به صورت پیش فرض تو تنظیمات دروپال یکی از آیتم ها انتخاب شده که به این صورت برش میدارم
	$('.attribute-7').find('.form-item input').attr( "checked" , false)
	
	$item = $('#edit-attributes-7 .form-item input#edit-attributes-7-' + key.Teacher_OptionId).closest('.form-item')
	$item.css({'display':'block'}).addClass('acrive').append('<div class="teacher-intro">' + key.Teacher_Intro + '<p style="margin-top: 15px;"><button type="button" class="btn btn-info" data-toggle="modal" data-target=".ostad-timing" ostad="'+ key.ostad_uid +'">مشاهده برنامه زمانی استاد</button></p></div>');
}

$('#edit-submit-2597.node-add-to-cart').click(function(e){
	$('.add-to-cart .alert').remove();
	var flag = false;
	$('.attribute-7').find('.form-item').each(function(){
		if($(this).find('input').is( ":checked" )){
			flag = true;
		}
	});
	if(!flag){
		e.preventDefault();
		$('.add-to-cart').prepend('<div class="alert alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>باید یکی از گزینه ها را انتخاب کنید.</div>');
		$('html, body').animate({scrollTop: 200}, 200);
	}
});

$('#edit-attributes-7').on('click', '.teacher-intro button', function(){
	$('.modal-content').html('<div class="loader spin"></div>');
	$.ajax({
		url: "/time-selection/"+ $(this).attr('ostad'),
		success: function(result){
			$('.modal-content').html($.parseHTML('<p style="margin: 0;padding: 15px;text-align: center;">زمانهای خالی و قابل انتخاب با رنگ سفید مشخص شده است.</p>' + result.timing + '<p style="margin: 0;padding: 15px;text-align: center;">پس از تکمیل ثبت نام می توانید آنها را انتخاب کنید</p>'))
			$('.modal-content #time-selection tr').each(function(){
				var hidden = true
				$(this).find('label').each(function(){
					if(!$(this).hasClass("disabled"))
						hidden = false
				})
				if(hidden)
					$(this).addClass('hidden')
			})
		}
	});
	$('.modal-title').text('برنامه زمانی اساتید آموزشگاه - ' + $(this).closest('.form-item').find('.oldtitle').text())
})	

$('#edit-attributes-4 label').append('<span class="register-rules">شرایط و قوانین سایت را می پذیرم.<span>');
$('#edit-attributes-4 input').change(function(){
	if($(this).is( ":checked" )){
		$(this).parents('.attribute-4').addClass('rule-checked');
		$(this).parents('.attribute-4').parent().parent().addClass('rule-checked');
	}else{
		$('.rule-checked').removeClass('rule-checked');
	}
});


}};

}(jQuery));
window.onload = function () { 

}

var initialize = function(){
	$('div#edit-attributes-3 .form-item').each(function(){
		$(this).addClass('col-lg-2 col-md-3 col-sm-4 col-xs-6 card-view');
		var oldtitle = $(this).find('.oldtitle').text().split('+');
		$(this).find('.oldtitle').text(oldtitle[0].replace(',', ''));
		if(oldtitle[1] != "undefined"){
			// $(this).find('label').append('<span class="price">'+ oldtitle[1] +'</span>');
		}
	});
	$('div#edit-attributes-7 .form-item').each(function(){
		$(this).addClass('card-view').css({'display':'none'});
	});
	$('div#edit-attributes-3 .form-item input, div#edit-attributes-7 .form-item input, div#edit-attributes-5 .form-item input').change(function(){
		if($(this).hasClass('form-radio')){
			if($(this).is( ":checked" )){
				$(this).parents('.form-item.form-group').find('.selected').removeClass('selected');
				$(this).parent().parent().addClass('selected');
			}
		}else{
			if($(this).is( ":checked" )){
				$(this).parent().parent().addClass('selected');
			}else{
				$(this).parent().parent().removeClass('selected');
			}
		}
	});

	setTimeout(function(){
		while(!$('div#edit-attributes-3 .form-item').hasClass('card-view')){
			initialize()
		}
	}, 500);

}

</script>