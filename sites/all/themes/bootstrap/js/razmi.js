(function ($) {
var translate_options_2 = {
	1 : {	'name' : 'تار',
		'InstrumentOptionId' : 13,
		'uid' : 164,
		'TeacherOptionId' : 30
	},
	2 : {	'name' : 'تنبک',
		'InstrumentOptionId' : 11,
		'uid' : 108,
		'TeacherOptionId' : 29
	},
	3 : {	'name' : 'سنتور',
		'InstrumentOptionId' : 10,
		'uid' : 1996,
		'TeacherOptionId' : 32
	},
	4 : {	'name' : 'سه تار',
		'InstrumentOptionId' : 14,
		'uid' : 111,
		'TeacherOptionId' : 31
	},
	5 : {	'name' : 'ویولن',
		'InstrumentOptionId' : 18,
		'uid' : 107,
		'TeacherOptionId' : 28
	},
	6 : {	'name' : 'پیانو',
		'InstrumentOptionId' : 9,
		'uid' : 33,
		'TeacherOptionId' : 33
	},
	7 : {	'name' : 'گیتار کلاسیک',
		'InstrumentOptionId' : 5,
		'uid' : 64,
		'TeacherOptionId' : 38
	},
	8 : {	'name' : 'گیتار فلامنکو',
		'InstrumentOptionId' : 12,
		'uid' : 109,
		'TeacherOptionId' : 35
	},
	9 : {	'name' : 'گیتار پاپ',
		'InstrumentOptionId' : 16,
		'uid' : 110,
		'TeacherOptionId' : 36
	},
	10 : {	'name' : 'دف',
		'InstrumentOptionId' : 19,
		'uid' : 1011,
		'TeacherOptionId' : 26
	},
	11 : {	'name' : 'نی',
		'InstrumentOptionId' : 23,
		'uid' : 2785,
		'TeacherOptionId' : 34
	},
	12 : {	'name' : 'گیتار الکتریک',
		'InstrumentOptionId' : 24,
		'uid' : 3079,
		'TeacherOptionId' : 37
	},
	13 : {	'name' : 'هارمونیکا',
		'InstrumentOptionId' : 25,
		'uid' : 3314,
		'TeacherOptionId' : 27
	}
};

Drupal.behaviors.myregister = {attach: function (context, settings) {
	
$('div#edit-attributes-3 .form-item').each(function(){
	$(this).addClass('col-lg-2 col-md-3 col-sm-4 col-xs-6 card-view');
	var oldtitle = $(this).find('.oldtitle').text().split('+');
	$(this).find('.oldtitle').text(oldtitle[0].replace(',', ''));
	if(oldtitle[1] != "undefined"){
		$(this).find('label').append('<span class="price">'+ oldtitle[1] +'</span>');
	}
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
$('div#edit-submitted-instrument input').change(function(){
	if($(this).is( ":checked" )){
		$('.selected').removeClass('selected');
		$(this).parent().parent().addClass('selected');
		$(this).parent().parent().parent().addClass('selected');
	}
});

// $('div#edit-attributes-3 .form-item input').change(function(){
	// if($('#edit-attributes-3-23').is( ":checked")){
		// $('#edit-attributes-6-22').prop('checked' , true);
		// $('.uc-product-35 .uc-price').text('60,000تومان');
	// }else{
		// $('#edit-attributes-6-22').prop('checked' , false);
		// $('.uc-product-35 .uc-price').text('80,000تومان');
	// }
// });
// $("div#edit-attributes-3 label[for*='edit-attributes-3-23']").prepend('<i>تخفیف ویژه</i>');
/*-----------------------------------------------------------------------------------------------------------*/
$('#uc-product-add-to-cart-form-1086 .attribute.attribute-3').append('<button class="btn btn-primary">انتخاب سطح<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>');
$('#uc-product-add-to-cart-form-1086 .attribute.attribute-5').append('<button class="btn btn-primary">انتخاب استاد<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>');
$('.attribute-5 > .form-item-attributes-5').prepend('<div class="description"><p><span>دوره مقدماتی:</span> با ثبت نام در این دوره، موارد آموزشی از ابتدا برای شما صورت میگیرد. ثبت نام در دوره مقدماتی احتیاج به هیچ پیش نیاز و آموزش قبلی در موسیقی نداشته و پس از ثبت نام، جلسه به جلسه زیر نظر استاد، موارد آموزشی را فرا خواهید گرفت.</p><p><span>دوره VIP:</span> با ثبت نام در این دوره، موارد آموزشی بر اساس سطح نوازندگی شما، به شما ارائه میشود. این دوره مخصوص هنرجویانی است که آشنایی قبلی با موسیقی و ساز مورد نظر دارند و تمایل به آموزش از سطح مقدماتی را ندارند. در صورتیکه برای آغاز آموزش، نیاز به مشاوره با استاد را دارید میتوانید در بخش پشتیبانی و در قسمت تعیین سطح، اقدام به ارسال توضیحات و ویدیوی تصویری از نوازندگی خود کنید. استاد راهنمایی های لازم را به جهت ادامه ی آموزش به شما ارائه خواهند داد.</p></div>');
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
			$('form#uc-product-add-to-cart-form-1086').addClass('last-one');
		}else{
			$('form#uc-product-add-to-cart-form-1086').removeClass('last-one');
		}
		$('.attribute-4.rule-checked').css({'display': 'none'});
	}else{
		$('.add-to-cart').prepend('<div class="alert alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>باید یکی از گزینه ها را انتخاب کنید.</div>');
		$('html, body').animate({scrollTop: 200}, 200);
	}
});

var SelectingTeacher = function(){
	var selected = [];
	$('.attribute-3 .form-item input').each(function(){
		if($(this).is( ":checked" )){
			selected.push(parseInt($(this).attr('id').substr(18)));
		}
	});
	var key = 0 ;
	Object.keys(translate_options_2).map(function(objectKey) {
		var value = translate_options_2[objectKey];
		if(value.InstrumentOptionId == selected[0]){
			key = value.TeacherOptionId;
			return ;
		}
	});
	$('#edit-attributes-7 .form-item').each(function(){
		if($(this).find('input').attr('id') == ('edit-attributes-7-'+ key)){
			$(this).css({'display':'block'}).addClass('acrive');
			$(this).find('input').prop('checked', true);
			$(this).find('label').addClass('selected');
		}else{
			$(this).css({'display':'none'}).removeClass('acrive');
		}
	});
};

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



$('#edit-attributes-4 label').append('<span class="register-rules"><a href="/node/145" target="_blank">شرایط و قوانین</a> سایت را می پذیرم.<span>');
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

	setTimeout(function(){
		while(!$('div#edit-attributes-3 .form-item').hasClass('card-view')){
			initialize()
		}
	}, 500);

}
