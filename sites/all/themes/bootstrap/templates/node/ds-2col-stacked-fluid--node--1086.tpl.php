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
(function ($) {
var translate_options = []
$.ajax({
	url: "/admin/4fasl-setting/get/online",
	success: function(result){
		translate_options = result
		console.log(translate_options.length)
		Drupal.attachBehaviors(init)
	}
});

var init = function (context, settings) {
if($('body').hasClass('attached')){
	return	//i dont khnow why but attachBehaviors calls init for 22 times and this is how to prevent that to happened
}else{
	$('body').addClass('attached')
}

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
	$(this).find('label').append('<p class="course-link"><a href="/'+ translate_optionsId[$(this).find('input').attr('value')].name +'" target="_blank">معرفی دوره</a></p>');
});  
$('div#edit-attributes-7 .form-item').each(function(){
	$(this).addClass('col-lg-2 col-md-3 col-sm-4 col-xs-6 card-view');
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

/*-----------------------------------------------------------------------------------------------------------*/
$('#uc-product-add-to-cart-form-1086 .attribute.attribute-3').append('<button class="btn btn-primary">انتخاب سطح<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>');
$('#uc-product-add-to-cart-form-1086 .attribute.attribute-5').append('<button class="btn btn-primary">انتخاب استاد<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>');
$('.attribute-5 > .form-item-attributes-5').prepend('<div class="description"><p><span>دوره مقدماتی:</span> با ثبت نام در این دوره، موارد آموزشی از ابتدا برای شما صورت میگیرد. ثبت نام در دوره مقدماتی احتیاج به هیچ پیش نیاز و آموزش قبلی در موسیقی نداشته و پس از ثبت نام، جلسه به جلسه زیر نظر استاد، موارد آموزشی را فرا خواهید گرفت.</p><p><span>دوره VIP:</span> با ثبت نام در این دوره، موارد آموزشی بر اساس سطح نوازندگی شما، به شما ارائه میشود. این دوره مخصوص هنرجویانی است که آشنایی قبلی با موسیقی و ساز مورد نظر دارند و تمایل به آموزش از سطح مقدماتی را ندارند. در صورتیکه برای آغاز آموزش، نیاز به مشاوره با استاد را دارید میتوانید در بخش پشتیبانی و در قسمت تعیین سطح، اقدام به ارسال توضیحات و ویدیوی تصویری از نوازندگی خود کنید. استاد راهنمایی های لازم را به جهت ادامه ی آموزش به شما ارائه خواهند داد.</p></div>');
$('.attribute-3 > .form-item-attributes-3').append('<div class="description rules"><div><p>ثبت نام و تمدید ثبت نام در دوره های آموزشی، به مدت 4 هفته (28 روز) اعتبار دارد</p><p>هر هفته یک جلسه استاد به بررسی تمرینات و پاسخگویی، و ارائه ی درس و تمرینات جدید به شما میپردازد</p><p>ارائه ی دروس جدید و ویدیوهای آموزشی برای شما رایگان بوده و نیاز به پرداخت هزینه های اضافی نمیباشد</p><p>با پایان یافتن هر دوره، جهت ادامه ی آموزش، اقدام به تمدید دوره کنید</p><p>جهت حفظ امتیازات خود، قبل از پایان دوره، اقدام به تمدید کنید.</p><p>زمان جلسات ساز هنگ درام به مدت 1 ساعت می باشد لذا قیمت ثبت نام در آن دو برابر می باشد</p><p>در صورتیکه بعد از پایان دوره اقدام به تمدید کنید، امتیازات تشویقی شما از بین خواهد رفت. اما حساب کاربری شما حفظ خواهد شد و پس از تمدید، ادامه ی آموزش از سر گرفته خواهد شد</p><p>برای آشنایی بیشتر می توانید <a href="/faq" class="btn" target="_blank">سوالات متداول</a> و <a href="/node/66" class="btn" target="_blank">نحوه ی کار</a> را مشاهده کنید.</p></div><div class="title"><img src="/sites/all/themes/bootstrap/images/law-book.svg"><span>شرایط و قوانین ثبت نام</span></div></div>');
$('#uc-product-add-to-cart-form-1086 .attribute.attribute-3').addClass('active');

$('.shopping-stepper .step').click(function(){
	$('.add-to-cart .alert').remove();
	if(!$('form#uc-product-add-to-cart-form-1086 > div').hasClass('rule-checked')){
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
			$('#edit-submit-1086.node-add-to-cart').click();
			return;
		}
		$('.shopping-stepper .active, .attributes > .active').removeClass('active');
		$('.attributes').children('.attribute').eq($(this).index()).addClass('active');
		$(this).addClass('active');
		if($('.attribute-7').hasClass('active')) SelectingTeacher();
		if($('.attribute-5').hasClass('active')) TypeSelection();
		$('.attributes').css({'margin-right' : ($(this).index() * -100) + '%'});
		$('.attribute-4.rule-checked').css({'display': 'none'});
		if($('.attribute-7').hasClass('active')){
			$('form#uc-product-add-to-cart-form-1086').addClass('last-one');
		}else{
			$('form#uc-product-add-to-cart-form-1086').removeClass('last-one');
		}
	}else{
		$('.add-to-cart').prepend('<div class="alert alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>باید یکی از گزینه ها را انتخاب کنید.</div>');
	}
});

$('.attributes .attribute > .btn').click(function(e){
	e.preventDefault();
	$('.add-to-cart .alert').remove();
	if(!$('form#uc-product-add-to-cart-form-1086 > div').hasClass('rule-checked')){
		$('.add-to-cart').prepend('<div class="alert alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>تیک شرایط و قوانین را بزنید.</div>');
		$('html, body').animate({scrollTop: 100}, 200);
		return;
	}
	var flag = false;
	$(this).parents('.attribute').find('.form-item').each(function(){
		if($('.attribute-7').hasClass('active')){
			if($(this).hasClass('active')){
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
		if($('.attribute-5').hasClass('active')) TypeSelection();
		$('.attributes').css({'margin-right' : (index * -100) + '%'});
		if($('.attribute-7').hasClass('active')){
			$('form#uc-product-add-to-cart-form-1086').addClass('last-one');
		}else{
			$('form#uc-product-add-to-cart-form-1086').removeClass('last-one');
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
	var key ;
	Object.keys(translate_options).map(function(objectKey) {
		var value = translate_options[objectKey];
		if(value.oid == selected[0]){
			key = value;
			if(!$('.attribute-7 .teacher-intro').length)
				$('.attribute-7 > .form-item-attributes-7').append('<div class="col-lg-10 col-md-9 col-sm-8 col-xs-6 teacher-intro"></div>');
			return ;
		}
	});
	$('#edit-attributes-7 .form-item').each(function(){
		if($(this).find('input').attr('id') == ('edit-attributes-7-'+ key.Teacher_OptionId)){
			$(this).css({'display':'block'}).addClass('acrive');
			$(this).find('input').prop('checked', true);
			$(this).find('label').addClass('selected');
			$('.attribute-7 .teacher-intro').html(key.Teacher_Intro);
		}else{
			$(this).css({'display':'none'}).removeClass('acrive');
		}
	});
};

var TypeSelection = function(){
	var selected = [];
	$('.attribute-3 .form-item input').each(function(){
		if($(this).is( ":checked" )){
			selected.push(parseInt($(this).attr('id').substr(18)));
		}
	});
	if(selected[0] == 44 || selected[0] == 48){
		$('#edit-attributes-5-20')
			.attr("disabled", true)
			.prop('checked', false)
			.closest('.form-item-attributes-5')
				.addClass('disabled')
				.removeClass('selected');
		$('#edit-attributes-5-21').prop('checked', true).closest('.form-item-attributes-5').addClass('selected');
	}else{
		$('#edit-attributes-5-20').attr("disabled", false).closest('.form-item-attributes-5').removeClass('disabled');
	}
}

$('#edit-submit-1086.node-add-to-cart').click(function(e){
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



$('#edit-attributes-4 label').append('<span class="register-rules">شرایط و قوانین سایت را می پذیرم.<span>');
$('#edit-attributes-4 input').change(function(){
	if($(this).is( ":checked" )){
		$(this).parents('.attribute-4').addClass('rule-checked');
		$(this).parents('.attribute-4').parent().parent().addClass('rule-checked');
	}else{
		$('.rule-checked').removeClass('rule-checked');
	}
});

}

}(jQuery));

</script>