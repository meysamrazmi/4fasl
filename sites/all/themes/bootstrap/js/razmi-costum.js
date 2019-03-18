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
	
	$('#block-system-main-menu').append('<div id="menuoverlay" style="display: none;opacity: 0;"></div>');
	$('#block-system-main-menu .block-title').after('<div class="logo"><a href="/"><img src="/sites/default/files/logo1.png"></a></div>');
		$('#block-system-main-menu .block-title').click(function(){
		if($(this).parent().hasClass('opened')){
			$('#menuoverlay').css({'opacity' : '0'});
			setTimeout(function(){$('#menuoverlay').css({'display':'none'});}, 800);
		}else{
			$('#menuoverlay').css({'display':'block'});
			setTimeout(function(){$('#menuoverlay').css({'opacity' : '1'});}, 10);
		} 
		$(this).parent().toggleClass('opened');
	});
	$('#menuoverlay').click(function(){
		$('#menuoverlay').css({'opacity' : '0'});
		setTimeout(function(){$('#menuoverlay').css({'display':'none'});}, 800);
		$('#block-system-main-menu').removeClass('opened');
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

if($('.field-name-add-practice, #block-formblock-homework').length){
	$('.add-practice:not(.disabeld) , #mini-panel-right_side .user-practice a:not(.disabeld)').click(function(e){
		e.preventDefault();
		var el = $('.field-name-add-practice, #block-formblock-homework');
		el.find('[id*="edit-title"]').val($(this).attr('title-text'));
		el.find('[id*="edit-field-nid-und-0-value"]').val($(this).attr('nid'));
		el.slideToggle(400).toggleClass('open');
		$('.add-practice:not(.disabeld)').toggleClass('open');
		if(el.hasClass('open')){
			$('html, body').animate({
				scrollTop: ($('#block-formblock-homework').offset().top - 0)
			}, 1000);
		}
		if($('body').hasClass('vip-en')){
			$('[id*="edit-field-vip-und"]').prop('checked', true);
		}else{
			$('[id*="edit-field-vip-und"]').prop('checked', false);
		}
		if($('.offline-practices').length){
			$('[id*="edit-field-enable-und"]').prop('checked', true);
		}else{
			$('[id*="edit-field-enable-und"]').prop('checked', false);
		}
	});
	$('.add-practice.disabeld , #mini-panel-right_side .user-practice a.disabeld').click(function(e){
		e.preventDefault();
	});
	$('.change-role').click(function(){
		$('.field-name-add-practice, #block-formblock-homework').slideUp(400).removeClass('open');
		$('.add-practice:not(.disabeld)').removeClass('open');
	})
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
	$('a#register-link').text('عضویت در سایت');
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

$('div#edit-submitted-instrument input').change(function(){
	if($(this).is( ":checked" )){
		$('.selected').removeClass('selected');
		$(this).parent().parent().addClass('selected');
		$(this).parent().parent().parent().addClass('selected');
	}
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

if($('.node-homework-form').length){
	$('.node-homework-form').parent().append('<div class="description rules"><div><p>رعایت حجاب اسلامی در فیلم های ارسالی توسط هنرجویان الزامی است.</p><p>لطفا جهت برقراری نظم بیشتر، تمامی تمرینات مورد نظر را در قالب یک ویدیو ارسال کنید.</p><p>در روزهای مشخص شده در هفته، استاد فیلم های ارسالی شما را ملاحظه کرده و به رفع اشکال شما ارائه ی نکات تکمیلی می پردازد. لذا به جهت برخورداری از نظم بیشتر، تا قبل از روز رفع اشکال، تمرینات خود را ارسال بفرمایید.</p><p>از قسمت ویرایش می توانید اقدام به حذف ویدیو و قرار دادن ویدیوی جدید کنید.</p><p>در صورتی که نیاز به راهنمایی بیشتر دارید، در بخش پشتیبانی سوال خود را مطرح کنید. کارشناسان ما در اسرع وقت به شما پاسخ خواهند داد.</p></div><div class="title"><img src="/sites/all/themes/bootstrap/images/law-book.svg"><span>شرایط و قوانین ارسال تمرین</span></div></div>');
}
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

$('.node-course .mediaelement-video').parents('.field-name-access').after('<div class="field video-help"><a href="#">مشکل در مشاهده ویدیو؟</a><p>در صورتیکه هنگام مشاهده و یا دانلود فیلم با مشکل مواجه شدید موارد زیر را بررسی کنید:<br>1 - احتمال پایین بودن سرعت اینترنت (با توجه به کیفیت و حجم بالای ویدیوهای آموزشی، در صورتیکه فیلم پخش و یا دانلود شد اما در اواسط اجرا قطع شد به احتمال زیاد مشکل از پایین بودن سرعت اینترنت شماست)<br>2 - جهت دانلود ویدیو، ترجیحا از نرم افزارهای مدیریت دانلود (Download Manager) استفاده نکنید. برای دانلود، روی لینک دانلود کلیک راست کرده و گزینه ی save link یا download link را بزنید.<br></p></div>');
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

$('video').each(function(){
	var src = $(this).attr('src')
	var item = $(this)
	if(src.slice(-3) == 'mp3' || src.slice(-3) == 'ogg' || src.slice(-3) == 'm4a'){
		item.parents('.mediaelement-video').addClass('mp3')
	}
})
if($('.mediaelement-video.mp3').length){
		var src = $('.mediaelement-video.mp3 video').attr('src')
		$.getScript('//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js', function(){
			$('.mediaelement-video.mp3').prepend('<div class="wavyplayer"><div id="waveform"></div class="wavyplayer"><button id="playy" value="play/pause" class="btn btn-default">play/pause</button></div>')
			$('.mediaelement-video.mp3 .mejs-container').remove()
			var wavesurfer = WaveSurfer.create({
			    container: '#waveform',
				backend : 'MediaElement',
				responsive: true,
				progressColor: '#9575CD',
				waveColor: '#ddd'
			});
			wavesurfer.load(src);
			$('#playy').click(function(){
            	wavesurfer.playPause()
				$(this).toggleClass('paused')
			})
			wavesurfer.on('finish', function () {
				$('#playy').removeClass('paused')
			});
		});
}

$('#block-webform-client-block-1663 .field-name-field-tozihaat').click(function(){
	$(this).parents('#block-webform-client-block-1663').toggleClass('open')
$(this).parents('#block-webform-client-block-1663').find('form').slideToggle()
})

/*-----------------------------------------------------------------------------------------------------------*/
if($('.page-cart').length){
	if($('.page-checkout').length){
		if($('.page-review').length){
			$('div#uc_Progressbar .bullet:nth-child(3)').addClass('current');
			$('div#uc_Progressbar .bullet:nth-child(1) , div#uc_Progressbar .bullet:nth-child(2)').addClass('done');
		}else {
			$('div#uc_Progressbar .bullet:nth-child(2)').addClass('current');
			$('div#uc_Progressbar .bullet:nth-child(1)').addClass('done');
		}
	}else {
		$('div#uc_Progressbar .bullet:nth-child(1)').addClass('current');
	}
}
/*-----------------------------------------------------------------------------------------------------------*/
if($('.no-permission').length){
	$('.group-left .field-name-field-attachment .field-items').html($('.no-permission').parent().html());
	$('.group-left .field-name-field-attachment .no-permission').removeClass('no-video').find('p').text('شما به این قسمت دسترسی ندارید');
}


//for setting default value for faq
if($('.page-faq').length){
	$('.form-item-edit-category-57 a').click();
}


if($('.node-type-course').length && $('.no-video').length){
	if($('h1.page-header').text().indexOf("جلسه") != -1 && $('h1.page-header').text().indexOf("اول") != -1 ){
		$('.node-course .group-header').html('<a class="first-session-prompt" href="/user/register?destination='+ window.location.href.substr(21) +'">جلسات اول هر دوره را می توانید به صورت رایگان پس از عضویت در سایت مشاهده کنید</a>')
	}
}

/*-----------------------------------------------------------------------------------------------------------*/
$(".node-points").mouseup(function(){
	window.location.href = $(this).find(".points-link")[0].getAttribute("href")
})


/*-----------------------------------------------------------------------------------------------------------*/
$('.login-forgot').prepend('<span>گذرواژه خود را فراموش کرده اید؟</span>')
$('.toboggan-unified #login-message').remove()
$('.toboggan-unified #login-form').after('<div id="login-message"><h3>ورود به سایت</h3>'+
		'<p class="switch-login">در صورتی که حساب کاربری ندارید از طریق لینک زیر اقدام کنید<a href="/user/register" class="switch-login">عضویت در سایت</a></p>'+
		'</div>')

$('.toboggan-unified #register-form').before('<div id="register-message"><h3>ساخت حساب کاربری</h3><a href="/faq?category%5B0%5D=58" target="_blank">راهنما</a>'+
	'<div class="ff"><span>پورتال اختصاصی</span>'+
	'<p>در سایت چهارفصل میتوانید همه ی فیلم ها و تمرین ها و پیام های خود را مدیریت کنید</p></div>'+
	'<div class="ss"><span>دسترسی به محتواهای آموزشی</span>'+
	'<p>در سایت چهارفصل میتوانید به محتوای آموزشی رایگان دسترسی پیدا کنید</p></div>'+
	'<div class="tt"><span>پشتیبانی 24 ساعته</span>'+
	'<p>در هر زمان میتوانید سوالات و مشکلات خود را در بخش پشتیبانی مطرح کنید تا کارشناسان ما به شما پاسخ دهند</p></div>'+
	'<p class="switch-login">در صورتی که حساب کاربری دارید از طریق لینک زیر وارد شوید<a href="/user/login" class="switch-login">ورود به سایت</a></p>'+
	'</div>')

$('a.switch-login').click(function(e){
	e.preventDefault()
	// $('a.login-link:not(.lt-active)').click()

	$('.toboggan-unified').toggleClass('login')
	$('.toboggan-unified').toggleClass('register')

	// if($('.toboggan-unified').hasClass('login')){
	//   $('.toboggan-unified').addClass('register').removeClass('login')
	// }else {
	//   $('.toboggan-unified').addClass('login').removeClass('register')
	// }

})


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
		if($(this).attr('src') == 'https://4faslmusic.ir/misc/arrow-desc.png'){
			$(this).parent().addClass('desc').removeClass('asc');
		}else{
			$(this).parent().addClass('asc').removeClass('desc');
		}
	});
/*-----------------*/	
	if($('div[id*="edit-support-ticket-upload"] .file-widget, div[id*="edit-field-hw-video"] .file-widget , #user-profile-form input#edit-picture-upload').length){
		$.getScript('/sites/all/themes/bootstrap/js/bootstrap-filestyle.min.js', function(){
			$(":file").filestyle({buttonText: "انتخاب فایل", buttonName: "btn-primary",placeholder: "فایلی انتخاب نشده"});
		});
	}
	
	$('.field.video-help a').click(function(e){
		e.preventDefault()
		$(this).next().slideToggle();
	});
	
	if($('.form-managed-file').find('.file-resup-wrapper').length){$('.form-managed-file').addClass('has-resumeable')}
	
	if($('.page-faq').length){
		var selected = $('.view-faq #edit-category-wrapper select [selected="selected"]').attr('value')
		$('.view-faq #edit-category-wrapper .form-item-edit-category-'+ selected).addClass('active')
	}
}};

jQuery.fn.outerHTML = function() {return jQuery('<div />').append(this.eq(0).clone()).html();};
