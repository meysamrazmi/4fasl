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
if($('body.one-sides').length){
  $('.main-container, header#navbar, footer.footer').addClass('col-lg-10 col-md-9 col-xs-12');
}
// $('.user-profile.view-mode-full .field-name-user-practices').html('<div class="add-practice">افزودن</div>' + $('.user-profile.view-mode-full .field-name-user-practices').html());

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







$('.joyride-tip-guide.user-help-6 a.joyride-next-tip').click(function(e){
	$('#block-panels-mini-right-side').parents('aside').addClass('opened');
	$('#cboxOverlay').css({'display':'block'});
	setTimeout(function(){$('#cboxOverlay').css({'opacity' : '1'});}, 10);
	setTimeout(function(){$('#block-panels-mini-right-side h2.block-title img').addClass('d-z');}, 500);
});


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
		$.getScript('/user-help/user-help_files/bootstrap-filestyle.min.js', function(){
			$(":file").filestyle({buttonText: "انتخاب فایل", buttonName: "btn-primary",placeholder: "فایلی انتخاب نشده"});
		});
	}
	$('.user-profile.view-mode-full > div > .field-name-user-help a').click(function(e){
	e.preventDefault();
	$("#user-help").joyride({
    	/* Options will go here */
  	});
});
	
	
}};

jQuery.fn.outerHTML = function() {return jQuery('<div />').append(this.eq(0).clone()).html();};
