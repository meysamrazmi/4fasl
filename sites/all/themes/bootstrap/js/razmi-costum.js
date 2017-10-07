var $ = jQuery;
$(document).ready(function () {
	$('.front .alert-block').addClass("col-sm-10");
/*-----------------------------------------------------------------------------------------------------------*/
	/*
	*this part is for fixed top menu
	*/
	var nav = $('header#navbar');
	num = nav.offset().top;
	$(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            nav.addClass("topfix");
			$('body').addClass("fixedmenu");
        } else {
            nav.removeClass("topfix");
			$('body').removeClass("fixedmenu");
        }
    });
/*-----------------------------------------------------------------------------------------------------------*/
if ($('.our-work').length){
	var totop = $('.our-work').offset().top;
	var totop = totop - 130;
	$(window).scroll(function () {
		if ($(this).scrollTop() > totop) {
			if (!$('.our-work').hasClass('counting')){		
//			} else{
				$('.our-work').addClass('counting');
				countup($('.counter'));
				countup($('.counter1'));
				countup($('.counter2'));
				countup($('.counter3'));
			}
		}
	});
}
/*-----------------------------------------------------------------------------------------------------------*/
if($('body.one-sides').length){
  $('.main-container, header#navbar, footer.footer').addClass('col-lg-10 col-md-9 col-xs-12');
}
// $('.user-profile.view-mode-full .field-name-user-practices').html('<div class="add-practice">افزودن</div>' + $('.user-profile.view-mode-full .field-name-user-practices').html());

if($('.field-name-add-practice').length){
	$('.add-practice:not(.disabeld) , #mini-panel-right_side .user-practice a:not(.disabeld)').click(function(e){
		e.preventDefault();
		$('.field-name-add-practice #edit-title').val($(this).attr('title-text'));
		$('.field-name-add-practice #edit-field-nid-und-0-value').val($(this).attr('nid'));
		$('.field-name-add-practice').slideToggle(400);
		$('.field-name-add-practice, .add-practice:not(.disabeld)').toggleClass('open');
		if($('.field-name-add-practice').hasClass('open')){
			$('html, body').animate({
				scrollTop: ($('.field-name-add-practice').offset().top - 0)
			}, 1000);
		}
		if($('body').hasClass('vip-en')){
			$('#edit-field-vip-und').prop('checked', true);
		}else{
			$('#edit-field-vip-und').prop('checked', false);
		}
	});
	$('.add-practice.disabeld , #mini-panel-right_side .user-practice a.disabeld').click(function(e){
		e.preventDefault();
	});
}
/*---------------*/
// if($('.user-profile')){
	// if($('.field-name-field-siteinfo-stu .field_collection_item').length){
		// var collections = $('.field-name-field-siteinfo-stu .field_collection_item').length;
	// }else{
		// var collections = $('.view-courses-list.view-display-id-block_1 .views-row').length;
	// }
	// var homeworkes = $('.field-name-user-practices tbody tr').length;
	// if(!$('.field-name-user-practices tbody tr .views-empty').length){
		// if(homeworkes >= collections ){
			// $('.field-name-add-practice').remove();
			// $('.add-practice , #mini-panel-right_side .user-practice a').addClass('disabeld');
			// $('.add-practice , #mini-panel-right_side .user-practice a').attr('title' , "به ازای هر جلسه فقط یک تمرین می توانید آپلود کنید.");
		// }
	// }
		
// }

/*---------------*/
if($('#block-formblock-support-ticket').length){
	$('.send-ticket').click(function(e){
		e.preventDefault();
		if($(this).hasClass('sath')){
			if(!$('#block-formblock-support-ticket .grade-help').length){
				$('#block-formblock-support-ticket').prepend('<div class="grade-help"><p>در این قسمت شما می توانید ویدئوی کوتاهی از نوازندگی خود جهت تعیین سطح ارسال کنید. اساتید ما آن را بررسی کرده و به شما پاسخ خواهند داد.</p></div>');	
			}else{
				$('#block-formblock-support-ticket .grade-help p').text('در این قسمت شما می توانید ویدئوی کوتاهی از نوازندگی خود جهت تعیین سطح ارسال کنید. اساتید ما آن را بررسی کرده و به شما پاسخ خواهند داد.');					
			}
			$('#block-formblock-support-ticket #edit-support').css({'display':'none'});
			$('#block-formblock-support-ticket .block-title').text('تعیین سطح');
			$('#block-formblock-support-ticket #edit-title').val('تعیین سطح');
			$('#block-formblock-support-ticket textarea').val('درخواست تعیین سطح برای ثبت نام از سطوح بالاتر را دارم.');
		}else{
			if(!$('#block-formblock-support-ticket .grade-help').length){
				$('#block-formblock-support-ticket').prepend('<div class="grade-help"><p>در این قسمت شما می توانید سوالات خود را مطرح نمایید. کارشناسان ما در اسرع وقت به شما پاسخ خواهند داد.</p></div>');	
			}else{
				$('#block-formblock-support-ticket .grade-help p').text('در این قسمت شما می توانید سوالات خود را مطرح نمایید. کارشناسان ما در اسرع وقت به شما پاسخ خواهند داد.');					
			}
			// $('#block-formblock-support-ticket .grade-help').remove();
			$('#block-formblock-support-ticket #edit-support').css({'display':'block'});
			$('#block-formblock-support-ticket .block-title').text('درخواست پشتیبانی');
			$('#block-formblock-support-ticket #edit-title').val('');
			$('#block-formblock-support-ticket textarea').val('');
		}
		$('#block-formblock-support-ticket').slideToggle(400);
		$('#block-formblock-support-ticket, .send-ticket').toggleClass('open');
		if($('#block-formblock-support-ticket').hasClass('open')){
			$('html, body').animate({
				scrollTop: ($('#block-formblock-support-ticket').offset().top - 0)
			}, 1000);
		}
	});
}
$('.view-my-tickets .view-filters').prepend('<div class="support-filters">فیلتر ها</div>');
$('.support-filters').click(function(){
	$(this).parent().find('#edit-state-wrapper').slideToggle(400);
	$(this).parent().toggleClass('open');
});
/*-----------------------------------------------------------------------------------------------------------*/
if($('#cart-form-pane').length){
	$('body').addClass('cart-form');
}
if($('.page-user-login, .page-user-register , .page-user-password , .page-user-reset').length){
	$('.main-container , footer.footer').removeClass('col-lg-10');
	$('.main-container , footer.footer').removeClass('col-xs-12');
	$('.main-container , footer.footer').removeClass('col-md-9');
	$('body').removeClass('right-sides');
	//$('.page-user.right-sides header#navbar, .page-user.right-sides footer.footer, .page-user.right-sides .main-container').css({'float':'none'});	
}
/*-----------------------------------------------------------------------------------------------------------*/
if($('.user-profile.view-mode-full')){
	if($('.user-profile.view-mode-full .group-header dl dt:nth-child(3)').length){
	}else{
		$('.user-profile.view-mode-full .group-header dl').css({'display':'none'});
	}
}

/*-------------------------------------------------------------------------------------------------------------------------------*/
$('#block-panels-mini-right-side h2').html($('#block-panels-mini-right-side h2').html() + $('#mini-panel-right_side .pane-block-2 .pane-content .user_pic').html()); 
$('#block-panels-mini-right-side h2').click(function(e){
	e.preventDefault();
	if($(this).parent().parent().parent().hasClass('opened')){
		$('#cboxOverlay').css({'opacity' : '0'});
		setTimeout(function(){$('#cboxOverlay').css({'display':'none'});}, 800);
		$(this).parent().parent().parent().removeClass('opened');
		$('#block-panels-mini-right-side h2.block-title img').removeClass('d-z');
	}else{
		$(this).parent().parent().parent().addClass('opened');
		$('#cboxOverlay').css({'display':'block'});
		setTimeout(function(){$('#cboxOverlay').css({'opacity' : '1'});}, 10);
		setTimeout(function(){$('#block-panels-mini-right-side h2.block-title img').addClass('d-z');}, 500);
	}
});
$('#cboxOverlay').click(function(){
	//$(this).css({'opacity' : '0'});
	$('#cboxOverlay').css({'opacity' : '0'});
	setTimeout(function(){$('#cboxOverlay').css({'display':'none'});}, 800);
	$('aside.opened').removeClass('opened');
});
/*-----------------------------------------------------------------------------------------------------------*/

$('.main-slide .views-field-title').append( '<div class="changetext"></div>' );

$(function(){
        $(".main-slide .views-field-title .changetext").typed({
            strings: [" صدای چه سازی تو خونت بپیچه ؟","چه سازی رو بنوازی ؟"],
            // Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
            stringsElement: null,
            // typing speed
            typeSpeed: 70,
            // time before typing starts
            startDelay: 200,
            // backspacing speed
            backSpeed: 0,
            // time before backspacing
            backDelay: 200,
            // loop
            loop: false,
            // false = infinite
            loopCount: 3,
            // show cursor
            showCursor: true,
            // character for cursor
            cursorChar: "|",
            // attribute to type (null == text)
            attr: null,
            // either html or text
            contentType: 'html',
            // call when done callback function
            callback: function() {},
            // starting callback function before each string
            preStringTyped: function() {},
            //callback for every typed string
            onStringTyped: function() {},
            // callback for reset
            resetCallback: function() {}
        });
    });

/*-----------------------------------------------------------------------------------------------------------*/
$('.students-section .attachment-after').prepend('<div class="add-level">+</div>');
$('.add-level').click(function(){
	if($(this).parent().parent().hasClass('open')){
		$(this).parent().parent().removeClass('open');
		$(this).removeClass('open');
	}else{
		$(this).parent().parent().addClass('open');
		$(this).addClass('open');
	}
	if($(this).parent().parent().next('form').hasClass('open')){
		$(this).parent().parent().next('form').removeClass('open');
		$(this).parent().parent().next('form').slideUp();
	}else{
		$(this).parent().parent().next('form').addClass('open');
		$(this).parent().parent().next('form').slideDown();
	}
});

$('.view-courses-list.student-pic .views-field-picture img').click(function(e){
	e.preventDefault();
	if(!$(this).parents('.students-section').hasClass('no-homework')){
		if($(this).parents('.students-section').hasClass('student-open')){
			$(this).parents('.students-section').removeClass('student-open');
			$(this).parents('.students-section').children('.view-content').slideUp();
			$(this).parents('.students-section').find('.pagination').slideUp();
			$(this).parents('.students-section').next('form').removeClass('open');
			$(this).parents('.students-section').next('form').slideUp();
			$(this).parents('.students-section').find('.add-level').removeClass('open');
			$(this).delay(500).queue(function(next) {
				$(this).parents('.students-section').removeClass('float');
				next();
			});
		}else{
			$(this).parents('.students-section').addClass('float');
			$(this).parents('.students-section').addClass('student-open');
			$(this).parents('.students-section').children('.view-content').delay(200).slideDown();
			$(this).parents('.students-section').find('.pagination').delay(200).slideDown();
		}
	}
});
	
$('.node-homework.node-teaser .field-name-title').click(function(){
	if($(this).parent().hasClass('open')){
		$(this).parent().removeClass('open');
		$(this).parent().children('.field-name-field-hw-video,.field-name-body').slideUp();
	}else{
		$(this).parent().addClass('open');
		$(this).parent().children('.field-name-field-hw-video ,.field-name-body').slideDown();
	}
});	
/*-----------------------------------------------------------------------------------------------------------*/
$('.comment-form').on('focus', 'textarea', function () {
    CommentOpen();
});
// Open Notifications
CommentOpen = function() {
    $('.comment-form').addClass('writing');
	$('.comment-form').find('.bootstrap-fieldgroup-accordion , .form-actions').slideDown();
	$('.comment-form').find('#edit-support , div#edit-support-ticket-upload').slideDown();
    
	$('html').unbind("click", CommentClose);
};
// Close Comment Form
CommentClose = function() {
    $('.comment-form').removeClass('writing');
	$('.comment-form.ajax-comments-form-add').find('.field-name-field-hw-video , .form-actions').slideUp();
	$('.comment-form').find('#edit-support , div#edit-support-ticket-upload').slideUp();
	
	$('html').unbind("click", CommentClose);
};
$('.comment-form').click(function(event){
    if(!$('.comment-form .bootstrap-fieldgroup-accordion').length){
		event.stopPropagation();		
	}
});
$('html').click(function(event){
    if(!$('.comment-form .bootstrap-fieldgroup-accordion').length){
		CommentClose();
	}
});
/*-----------------------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------------------*/
$('.field-name-field-film-image img')
if($('.page-gallery .mejs-poster').length){
	if($('.page-gallery .field-name-field-film-image img').length){
		$('.page-gallery .mejs-poster').html($('.page-gallery .field-name-field-film-image img').outerHTML());
		$('.page-gallery .mejs-poster').css({'background' : 'url(' +$('.page-gallery .field-name-field-film-image img').attr('src') + ')' , 'display' : 'block'});
		$('.page-gallery .field-name-field-film-image').remove();
	}
}
/*-----------------------------------------------------------------------------------------------------------*/
$('.tb-megamenu .btn-navbar').click(function(){
	if(!$(this).parent().children('.nav-collapse').hasClass('in')){
		$(this).parent().addClass('tb-opened');
	}else{
		$(this).parent().removeClass('tb-opened');
	}
});
$('section#block-menu-menu-gallery .block-title').click(function(){
	$(this).parent().toggleClass('open');
});
/*-----------------------------------------------------------------------------------------------------------*/
$('#main-saaz').append('<div class="middle-buttom">&nbsp;</div>');
$(".middle-buttom").click(function(e) {
  var destination = $(this).parents('#main-saaz').next();
  $('html, body').animate({
    scrollTop: ($(destination).offset().top - 0)
  }, 1000);
});
/*-----------------------------------------------------------------------------------------------------------*/
/*for front page scrolling*/
if($('.front').length){
	$( function( $ ) {
		// Init Skrollr
		var s = skrollr.init({
			render: function(data) {
				//Debugging - Log the current scroll position.
				//console.log(data.curTop);
			}
		});
	} );
}

$('.node-instrument .field-name-field-firstclass .group-right .field-item').html('<a href="'+ $('.node-instrument .field-name-field-firstclass .group-left .node_kamel a').attr('href') +'" target="_blank">'+ $('.node-instrument .field-name-field-firstclass .group-right .field-item').html() +'</a>');

//$('.role-استاد .add-to-cart div#edit-actions , .role-هنرجو .add-to-cart div#edit-actions .role-استاد .attribute-4, .role-هنرجو .attribute-4').remove();
$('#uc-cart-view-form .form-actions button:last-child,#edit-continue ,form#uc-zarinpal-pay-submission-form .btn ,#uc-cart-checkout-review-form #edit-submit').addClass('btn btn-success');
$('#edit-continue-shopping, form#uc-cart-checkout-review-form .btn').addClass('btn btn-primary');
$('#edit-empty,#edit-cancel').addClass('btn btn-danger'); 
$('.page-cart,.page-college').addClass('gray-main');
$('.page-cart h1.page-header').addClass('container');
$('#uc-cart-checkout-review-form #edit-submit ,#uc-zarinpal-pay-submission-form #edit-submit').text('پرداخت و ثبت نام');
$('#cart-pane legend span').text('ثبت نام:');
$('#uc-product-add-to-cart-form-35 .node-add-to-cart').html('<span class="icon glyphicon glyphicon-plus" aria-hidden="true"></span>ثبت نام در دوره');
$('#uc-product-add-to-cart-form-139 .node-add-to-cart').html('<span class="icon glyphicon glyphicon-plus" aria-hidden="true"></span>تمدید دوره');
$('.product-info.display-price').prepend('<span class="price-label">هزینه دوره:</span>');
if($('.form-managed-file').find('.file-resup-wrapper').length){$('.form-managed-file').addClass('has-resumeable')}

$('.mejs-overlay-button').click(function(){
	$(this).parents('#saaz-film').find('.field-name-field-film-image').remove();
});
/*-----------------------------------------------------------------------------------------------------------*/
$('.view-empty').each(function(){
	$(this).parent('.view').addClass('empty-view');
});


$('.file-resup-wrapper .messages').click(function(){
	$(this).remove();
});
/*----------------------------------------------------------------مربوط به کاربر-----------------------------------------------------------------*/
$('.bootstrap-fieldgroup-accordion .panel-heading a').addClass('collapsed');
$('.bootstrap-fieldgroup-accordion > div:nth-child(1) .panel-heading a').text('ویدئو');
$('.bootstrap-fieldgroup-accordion > div:nth-child(2) .panel-heading a').text('فایل');

/*---------------*/
if($('.role-هنرجو').length){
	$('body').addClass('role-honarjoo');
}
if($('.role-استاد').length){
	$('body').addClass('role-ostad');
}
/*---------------*/
if(getCookie('vip') && getCookie('vip-user') == window.location.href){
	$('.change-role').addClass('left').removeClass('right');
	$('body').addClass('vip-en').removeClass('honarjo-en');
	console.log(window.location.href);
}
// change_role();
if($('body').hasClass('has-vip')){
	if(!$('body').hasClass('has-honarjo')){
		$('body').addClass('vip-en');
	}
}

$('.node-article .field-name-field-share .field-label').click(function(){
	$(this).parent().toggleClass('open');
});

$('.nophoto').each(function(){
	$(this).parents('.views-row').addClass('nophoto');
});

$('.node-homework.node-teaser').each(function(){
	if($(this).find('.new-content').length){
		$(this).addClass('has-new');
		$(this).parents('.views-row').addClass('has-new');
		$(this).parents('.view').addClass('has-new');
	}
	if($(this).find('.seen-content').length){
		
	}
	
});

if($('.field-name-relatives .view-empty').length){
	$('.field-name-relatives').remove();
}

if ($('.tab-container').length){
	$('.tab-content').css({'width': ($('.tab-content > div').length * 100) + '%'})
	$('ul.tab-nav li:first-child , .tab-content > div:first-child').addClass('active');
	$('.active-bar').css({'width': ($('ul.tab-nav li.active').width()+20) , 'left' : $('ul.tab-nav li.active').position().left });
	$('ul.tab-nav li').click(function(e){
		$('.active-bar').css({'width' : $(this).width() + 20 , 'left' : $(this).position().left });
		$('.tab-content .active, ul.tab-nav li').removeClass('active');
		var hoverr = $(this).parents('.movies-tab').find('.tab-content').children('div').eq($(this).index());
		hoverr.addClass('active');
		$(this).addClass('active');
		$('.tab-content').css({'margin-right' : ($(this).index() * -100) + '%'});
	});
}
/*----------------------------------------------------------------مربوط به گالری-----------------------------------------------------------------*/
if($('.page-category:not(.page-content)').length){
	$('h1.page-header, head title').text($('.page-gallery .breadcrumb span:last-child').text());
	$('section[id*="block-views-taxonomy-menu"] .views-row .field-content').each(function(){
		if($(this).hasClass('tid-'+ window.location.href.split('/')[5])){
			$(this).addClass('active');
		}
	});
}else if($('.page-category.page-content').length){
	$('h1.page-header').text('گالری چهارفصل');
}else if($('.page-gallery.page-tags:not(.page-content)').length){
	$('section[id*="block-views-taxonomy-menu"] .views-row .field-content').each(function(){
		if($(this).hasClass('tid-'+ window.location.href.split('/')[5])){
			$(this).addClass('active');
		}
	});
}

$('.node-course .mediaelement-video').parents('.field-name-access').after('<div class="field video-help"><a href="#">مشکل در مشاهده ویدیو؟</a><p>در صورتیکه هنگام مشاهده و یا دانلود فیلم با مشکل مواجه شدید موارد زیر را بررسی کنید:<br>1 - احتمال پایین بودن سرعت اینترنت (با توجه به کیفیت و حجم بالای ویدیوهای آموزشی، در صورتیکه فیلم پخش و یا دانلود شد اما در اواسط اجرا قطع شد به احتمال زیاد مشکل از پایین بودن سرعت اینترنت شماست)<br>2 - حافظه ی پنهان مرورگر (cache)(در صورتی که همچنان با پیغام خطا مواجه شدید حافظه ی پنهان مرورگر خود را پاک کنید و مجدد اقدام به مشاهده و یا دانلود ویدیو کنید)<br></p></div>');
	$('.field.video-help a').click(function(e){
		e.preventDefault()
		$(this).next().slideToggle();
	});


if($('.view-site-sections.view-display-id-block_2').length){
	$('.view-site-sections.view-display-id-block_2 .mejs-poster').html($('.view-site-sections.view-display-id-block_2 .views-field-field-film-image a').html()).css({'display':'block'});
	$('.views-field-field-film-image').remove();
}
if($('#saaz-film').length){
	$('#saaz-film .mejs-poster').html($('#saaz-film .field-name-field-film-image .field-item').html()).css({'display':'block'});
	$('#saaz-film .field-name-field-film-image').remove();
}




});

/*-----------------*/
var applyHeights = function(x, y , z) {
	if (x.height() < y.height()){
		x.height(y.height() + (z));
	}else if (x.height() > y.height()){
		y.height(x.height() + (z));
	}else 
		return false;
	
	return true;
}
/*-----------------*/
var applyHeight = function(x, y) {
		x.css({'height' : y.height()});
}
/*-----------------*/
var countup = function(x) {
	var $dd = parseInt(x.text());
	jQuery({someValue: 0}).animate({someValue: $dd }, {
		duration: 2000,
		easing:'swing', // can be anything
		step: function() { // called on every step
			x.text(Math.ceil(this.someValue));
		}
	});
}
/*-----------------*/
// Cookies
function setCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";               
    document.cookie = name + "=" + value + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
function eraseCookie(name) {setCookie(name, "", -1);}

function change_role(){
	if($('.change-role').hasClass('right')){
		$('body').addClass('honarjo-en').removeClass('vip-en');
	}else if($('.change-role').hasClass('left')){
		$('body').addClass('vip-en').removeClass('honarjo-en');
	}
	$('.change-role').click(function(){
		$(this).toggleClass('right left');
		$('body').addClass('changing');
		if($(this).hasClass('left')){
			setCookie('vip-user', window.location.href , 2);
			setCookie('vip', '1', 2);
		}else{
			eraseCookie('vip-user');
			eraseCookie('vip');
		}
		setTimeout(function(){
			if($('.change-role').hasClass('right')){
				$('body').addClass('honarjo-en').removeClass('vip-en');
			}else if($('.change-role').hasClass('left')){
				$('body').addClass('vip-en').removeClass('honarjo-en');
			}
			if($('.field-name-add-practice').hasClass('open')){
				$('.add-practice').click();
			}
			setTimeout(function(){$('body').removeClass('changing');}, 500);
			
		}, 500);
	});

}




/*for firing some scripts after ajax */
Drupal.behaviors.myBehavior = {attach: function (context, settings) {
	$('.file-resup-wrapper .messages').prepend('<span class="close">x</span>');
	change_role();
/*-----------------*/
	
	$('.table > thead > tr > th img').each(function(){
		if($(this).attr('src') == 'http://4faslmusic.ir/misc/arrow-desc.png'){
			$(this).parent().addClass('desc').removeClass('asc');
		}else{
			$(this).parent().addClass('asc').removeClass('desc');
		}
	});
/*-----------------*/	
	if($('div#edit-support-ticket-upload .file-widget, div#edit-field-hw-video .file-widget , #user-profile-form input#edit-picture-upload').length){
		$.getScript('/sites/all/themes/bootstrap/js/bootstrap-filestyle.min.js', function(){
			$(":file").filestyle({buttonText: "انتخاب فایل", buttonName: "btn-primary",placeholder: "فایلی انتخاب نشده"});
		});
	}
	
	$('.field.video-help a').click(function(e){
		e.preventDefault()
		$(this).next().slideToggle();
	});
	
}};

jQuery.fn.outerHTML = function() {return jQuery('<div />').append(this.eq(0).clone()).html();};
