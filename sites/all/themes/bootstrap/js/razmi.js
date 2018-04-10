(function ($) {
var translate_options_2 = {
	1 : {	'name' : 'تار',
		'eName' : 'tar',
		'InstrumentOptionId' : 13,
		'uid' : 164,
		'TeacherOptionId' : 30,
		'TeacherIntro' : 'کارشناس ارشد نوازندگی موسیقی ایرانی از دانشگاه هنر با ساز تخصصی تار (دوره کارشناسی) و سه‌تار (دوره کارشناسی ارشد)<br>هنرآموخته نزد :<br>(برای ساز سه تار) : احمد رضا صمدی، مسعود شعاری، بهنام وادانی، مهربانو توفیق، داریوش طلایی<br>(برای ساز تار) : محمدرضا ابراهیمی، بهروز همتی، حسین علیزاده (مسترکلاس)، محمدرضا لطفی، حمیدرضا خبازی، داریوش طلایی<br>انتشار کتاب « سرمشق» شامل گزیده‌ای از تمرین‌های نوشته شده برای تار و سه‌تار اثر استاد وزیری (94)<br>انتشار کتاب « رامشگری» شامل گزیده‌ای از قطعات نوشته شده برای تار و سه‌تار اثر استاد وزیری (94)<br>همراهی با ارکستر مجلسی کامه‌راتا به سرپرستی کیوان میرهادی در کنسرت موسیقی پُست مدرن، به عنوان نوازنده‌ی سه‌تار، 1385<br>کنسرت گروه بیداد به آهنگسازی و سرپرستی فرهاد ابراهیم خانی در کرج ، 1388<br>همراهی با ارکستر سمفونیک تهران و گروه کُر دفتر موسیقی و برگزاری کنسرت در تهران ( 1387 و 1388) و اولین تور کنسرتی در پنج کشور فرانسه ، بلژیک ، ایتالیا ، هلند و سوییس (1388)'
	},
	2 : {	'name' : 'تنبک',
		'eName' : 'tonbak',
		'InstrumentOptionId' : 11,
		'uid' : 108,
		'TeacherOptionId' : 29,
		'TeacherIntro' : 'کارشناس نوازندگی موسیقی جهانی دانشگاه هنر تهران<br>نوازندگی تنبک از سال 1372 و بهره مند از حضور اساتید آقایان مرتضا پوربخت، بهمن رجبی و امیربابک رکنی والا.<br>نوازندگی ویولا از سال 1376 و بهره مند از حضور اساتید آقایان شمیم موحد، ابراهیم لطفی، عمادرضا نکویی و خانم ها قنبری مهر و ستاره بهشتی.<br>استفاده از  محضر اساتید آقایان شریف لطفی، سیاوش بیضایی، حمیدرضا دیبازر، امیرحسین اسلامی و خانم شهره جلالی قاجار در طول تحصیل<br>کسب مقام اول گروه نوازی در جشنواره دانشگاه هنر با ساز تنبک<br>کسب مقام دوم گروه نوازی  در 23امین جشنواره موسیقی فجر با ساز تنبک'
	},
	3 : {	'name' : 'سنتور',
		'eName' : 'santoor',
		'InstrumentOptionId' : 10,
		'uid' : 1996,
		'TeacherOptionId' : 32,
		'TeacherIntro' : 'آغاز فعالیت هنری از سال 82 عضو فعال خانه ی موسیقی ایران بهره مندی از محضر اساتید: حسن میرزاخانی، اردوان کامکار در نوازندگی ساز سنتور آنالیز موسیقی ایرانی زیر نظر بابک دشتی نژاد و میرسعید حسینی پناه و ... گذراندن دوره ی آموزش موسیقی کودک زیر نظر استاد سودابه سالم گذراندن دوره ی سلفژ و هارمونی زیر نظر اساتید مرتضی شیرکوهی و ... عضو گروه ارکستر سنتور نوازان رویش، عضو گروه موسیقی سنتی مهرگان'
	},
	4 : {	'name' : 'سه تار',
		'eName' : 'setar',
		'InstrumentOptionId' : 14,
		'uid' : 111,
		'TeacherOptionId' : 31,
		'TeacherIntro' : 'کارشناس ارشد نوازندگی موسیقی ایرانی از دانشگاه هنر با ساز تخصصی تار (دوره کارشناسی) و سه‌تار (دوره کارشناسی ارشد)<br>هنرآموخته نزد :<br>(برای ساز سه تار) : احمد رضا صمدی، مسعود شعاری، بهنام وادانی، مهربانو توفیق، داریوش طلایی<br>(برای ساز تار) : محمدرضا ابراهیمی، بهروز همتی، حسین علیزاده (مسترکلاس)، محمدرضا لطفی، حمیدرضا خبازی، داریوش طلایی<br>انتشار کتاب « سرمشق» شامل گزیده‌ای از تمرین‌های نوشته شده برای تار و سه‌تار اثر استاد وزیری (94)<br>انتشار کتاب « رامشگری» شامل گزیده‌ای از قطعات نوشته شده برای تار و سه‌تار اثر استاد وزیری (94)<br>همراهی با ارکستر مجلسی کامه‌راتا به سرپرستی کیوان میرهادی در کنسرت موسیقی پُست مدرن، به عنوان نوازنده‌ی سه‌تار، 1385<br>کنسرت گروه بیداد به آهنگسازی و سرپرستی فرهاد ابراهیم خانی در کرج ، 1388<br>همراهی با ارکستر سمفونیک تهران و گروه کُر دفتر موسیقی و برگزاری کنسرت در تهران ( 1387 و 1388) و اولین تور کنسرتی در پنج کشور فرانسه ، بلژیک ، ایتالیا ، هلند و سوییس (1388)'
	},
	5 : {	'name' : 'ویولن',
		'eName' : 'violin',
		'InstrumentOptionId' : 18,
		'uid' : 107,
		'TeacherOptionId' : 28,
		'TeacherIntro' : 'فارغ التحصیل از هنرستان موسیقی پسران٬ فارغ التحصیل از دانشکده موسیقی در رشته نوازندگی ساز جهانی ( ویلن کلاسیک )، فارغ التحصیل از دانشگاه موسیقی در رشته نوازندگی ساز جهانی ( ویلن کلاسیک )<br>بهره مندی از حضور در کلاس اساتیدی چون: استاد سیاوش ظهیرالدینی استاد سرکار خانم قنبری مهر استاد سرکار خانم بهشتی استاد سیاوش بیضایی استاد محسن الهامیان استاد هوشنگ استوار  و ...<br>شرکت در مستر کلاسهای نوازندگی ویلن کلاسیک در کنسرواتوار کشور نروژ<br>Detlef Hahn- Professor - Violin<br>Terje Moe Hansen- Professor – Violin<br>Peter Herresthal- Associate professor - Violin<br>رهبر ارکستر مجلسی رِبِک<br>عضو فعّال ارکستر سمفونیک سازمان صداوسیمای جمهوری اسلامی ایران<br>عضو فعّال ارکستر استاد نادر مشایخی جهت اجرای کنسرت در شهر سنت پولتن کشور اتریش<br>عضو فعّال ارکستر فیلارمونیک ایرانیان<br>عضو فعّال ارکستر ملل<br>عضو فعّال ارکستر استاد کیوان ساکت به خوانندګی سالار عقیلی<br>عضو فعّال ارکستر سمفونیک به رهبری شهرداد روحانی'
	},
	6 : {	'name' : 'پیانو',
		'eName' : 'piano',
		'InstrumentOptionId' : 9,
		'uid' : 33,
		'TeacherOptionId' : 33,
		'TeacherIntro' : 'ليسانس موسيقی<br>نوازندگي پيانو از سال ١٣٧٣ و بهره مند از حضور اساتيد گرانقدر مهرداد مرادي ،فريبرز لاچيني ،پروفسور كلارا بوكوچاوا ،رافائل ميناسكانيان،دلبر حكيم اوا ،آرش عباسي<br>بهره گيري از اساتيد گرانقدر مصطفي كمال پور تراب ،محسن الهاميان ،خانم مارينا و خانم دكتر افسري و نويد گوهر<br>گذراندن دوره هاي آموزش و نوازندگي پيانو از سال ٩٣ در كنسرواتور هاي كشورهاي تركيه ايتاليا فرانسه<br>رتبه ٤ جشنواره جوان به همراه اجراي گروه سنتي به سرپرستي محمد برزن'
	},
	7 : {	'name' : 'گیتار کلاسیک',
		'eName' : 'guitar-classic',
		'InstrumentOptionId' : 5,
		'uid' : 64,
		'TeacherOptionId' : 38,
		'TeacherIntro' : 'تحصیلات: لیسانس الکترونیک - فوق لیسانس MBA<br>عضو (وابسته 1) خانه موسیقی<br>آموزش دیده نزد اساتید: سید حسن مهدوی – دکتر مهرداد پاکباز – مصطفی آخوندی – افشین ضیائیان – دکتر لیلی افشار (مسترکلاس)<br>آموزش هارمونی و سلفژ نزد: مرتضی شیرکوهی<br>مقام ها و جوائز<br>کسب مقام دوم کشوری در جشنواره موسیقی دانشجوئی سال 1386<br>کسب مقام دوم کشوری در جشنواره ملی جوان ایرانی سال 1389<br>احراز رتبه ی چهارم در مسابقات گیتار کلاسیک کشوری سال 1390'
	},
	8 : {	'name' : 'گیتار فلامنکو',
		'eName' : 'guitar-flamenco',
		'InstrumentOptionId' : 12,
		'uid' : 109,
		'TeacherOptionId' : 35,
		'TeacherIntro' : 'کارشناس ارشد نوازندگی ساز جهانی ( دانشگاه تهران )<br>نوازندگی گیتار از سال 1379و بهره مند از حضور اساتید آقایان<br>مهرداد پاکباز ، سیمون آیوازیان ، بهرام آقاخان ، کیوان میرهادی ، روبن دیاز و خانمها لیلی افشار، کارینا کیمیایی<br>گذراندن دوره هارمونی گیتار نزد مهرداد پاکباز و هارمونی جز نزد حمزه یگانه<br>استفاده از محضر اساتیدی ،شاهین فرهت ، علیرضا مشایخی ، کیاوش صاحب نسق ، خانم دكتر ستاره بهشتی ، آذین موحد ، دكتر ساسان فاطمی ، دکتر هومان اسعدی ، شاهرخ خواجه نوری ، محمدرضا تفضلی ، علی رادمان ،آرش عباسی<br>مقام دوم کشوری در مسابقات آهنگسازی برای گیتارکلاسیک'
	},
	9 : {	'name' : 'گیتار پاپ',
		'eName' : 'guitar-pop',
		'InstrumentOptionId' : 16,
		'uid' : 110,
		'TeacherOptionId' : 36,
		'TeacherIntro' : 'کارشناس ارشد نوازندگی ساز جهانی ( دانشگاه تهران )<br>نوازندگی گیتار از سال 1379و بهره مند از حضور اساتید آقایان<br>مهرداد پاکباز ، سیمون آیوازیان ، بهرام آقاخان ، کیوان میرهادی ، روبن دیاز و خانمها لیلی افشار، کارینا کیمیایی<br>گذراندن دوره هارمونی گیتار نزد مهرداد پاکباز و هارمونی جز نزد حمزه یگانه<br>استفاده از محضر اساتیدی ،شاهین فرهت ، علیرضا مشایخی ، کیاوش صاحب نسق ، خانم دكتر ستاره بهشتی ، آذین موحد ، دكتر ساسان فاطمی ، دکتر هومان اسعدی ، شاهرخ خواجه نوری ، محمدرضا تفضلی ، علی رادمان ،آرش عباسی<br>مقام دوم کشوری در مسابقات آهنگسازی برای گیتارکلاسیک'
	},
	10 : {	'name' : 'دف',
		'eName' : 'daf',
		'InstrumentOptionId' : 19,
		'uid' : 1011,
		'TeacherOptionId' : 26,
		'TeacherIntro' : 'آغاز فعالیت های هنری از سال ۱۳۶۸ با نوازندگی ساز دف آموزش دف و تمبک نزد هنرمندان بیژن زنگنه و بیژن کامکار حضور موفق در چند جشنواره بین المللی از جمله جشنواره موسیقی فجر و چند فستیوال در خارج از کشور همکاری در اجرا و ضبط کاست های لیلی جان و ماه خراسان باده نوشین و.. عضو هیتت انتخاب اولین جشنواری تکنوازان دف در فرهنگسرای بهمن به تاریخ ۸ شهریورماه ۱۳۹۵ تشکیل گروه دف نوازان وندادمهر با همکاری مهرزاد هویدا در سال ۱۳۷۹ اجرای کنسرت های متعدد در شهر های مختلف ایران آثار در دست انتشار : آثاری برای گروه نوازی دف کتاب جامع برای هنر دف نوازی'
	},
	11 : {	'name' : 'نی',
		'eName' : 'ney',
		'InstrumentOptionId' : 23,
		'uid' : 2785,
		'TeacherOptionId' : 34,
		'TeacherIntro' : 'کارشناس ارشد نوازندگی موسیقی ایرانی از دانشکده هنرهای زیبای دانشگاه تهران<br>فراگیری ساز نی از سال 1374 نزد یاسین اژدری، محمدعلی کیانی نژاد و عبدالنقی افشارنیا<br>فراگیری ردیف آوازی استاد عبدالله دوامی نزد استاد محمدعلی کیانی نژاد و ردیف سازی میرزاعبدالله نزد استاد عبدالنقی افشارنیا در دانشگاه هنر و استاد داریوش طالیی در دانشگاه تهران<br>کسب مقام دوم آهنگسازی موسیقی سنتی در نخستین جشنوارۀ جوان ایرانی / تهران 1389<br>شرکت در جشنوارۀ فرهنگی 0202 Expo درکشور چین و اجرای موسیقی ایرانی در شهر شانگهای چین به همراه گروه سازهای ایرانی / June 2010<br>اجرای کنسرت به همراه گروه"مشرق" / بیست وسومین جشنوارۀ موسیقی فجر/ فرهنگسرای هنر و تالاررودکی/دیماه 1386/نوازندۀ نی'
	},
	12 : {	'name' : 'گیتار الکتریک',
		'eName' : 'guitar-electric',
		'InstrumentOptionId' : 24,
		'uid' : 3079,
		'TeacherOptionId' : 37,
		'TeacherIntro' : 'نوازندگی گیتار (سبک کلاسیک) از سال 1378<br>نوازندگی گیتار الکتریک و آکوستیک به صورت حرفه ای از سال 1379 تحت نظر استاد سعید حسن زاده<br>فراگیری پیانو، سلفژ و هارمونی (خصوصا سبک جز)، سازشناسی،  ارکستراسیون و آهنگسازی فیلم از سال 1383<br>برخی از سوابق کاری:<br>آهنگساز و نوازنده ی گیتار الکتریک در آلبوم "ناله در کنار ظهر" گروه راک "زیرسیگاری" که توسط کمانی آمریکایی TuneCore در سال 2012 منتشر شد<br>ترجمه و تالیف کتاب "گیتار در موسیقی جز" نوشته ی جودی فیشر<br>آهنگسازی فیلم سینمایی "مانگرو" به کارگردانی مهدی صباغ زاده'
	},
	13 : {	'name' : 'هارمونیکا',
		'eName' : 'harmonica',
		'InstrumentOptionId' : 25,
		'uid' : 3314,
		'TeacherOptionId' : 27,
		'TeacherIntro' : 'دکترای تخصصی پیوسته بیوتکنولوژی دانشگاه تهران<br>آموزش دیده نزد الیاس دژآهنگ (از شاگردان فرانز اشمل نوازنده ویرتئوز هارمونیکای کلاسیک)<br>عضویت در ارکستر آکو و برگزاری اجراهای مستقل <br>عضو آنسامبل هارمونیکای آکو<br>اجرای افتخاری در دومین جشنواره کشوری هارمونیکا<br>کسب مقام سوم کشوری در اولین جشنواره هارمونیکا در بخش کلاسیک'
	}
};

Drupal.behaviors.myregister = {attach: function (context, settings) {
	
var translate_optionsId = {};
Object.keys(translate_options_2).map(function(objectKey) {
	var val = translate_options_2[objectKey];
	Object.defineProperty(translate_optionsId, val.InstrumentOptionId, {
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
	// Object.keys(translate_options_2).map(function(objectKey) {
		// var value = translate_options_2[objectKey];
		// if(value.InstrumentOptionId == item.find('input').attr('value')){
			// key = value;
			// return ;
		// }
	// });
	$(this).find('label').append('<p class="course-link"><a href="/'+ translate_optionsId[$(this).find('input').attr('value')].eName +'" target="_blank">معرفی دوره</a></p>');
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
$('.attribute-3 > .form-item-attributes-3').append('<div class="description rules"><div><p>ثبت نام و تمدید ثبت نام در دوره های آموزشی، به مدت 4 هفته (28 روز) اعتبار دارد</p><p>هر هفته یک جلسه استاد به بررسی تمرینات و پاسخگویی، و ارائه ی درس و تمرینات جدید به شما میپردازد</p><p>ارائه ی دروس جدید و ویدیوهای آموزشی برای شما رایگان بوده و نیاز به پرداخت هزینه های اضافی نمیباشد</p><p>با پایان یافتن هر دوره، جهت ادامه ی آموزش، اقدام به تمدید دوره کنید</p><p>جهت حفظ امتیازات خود، قبل از پایان دوره، اقدام به تمدید کنید.</p><p>در صورتیکه بعد از پایان دوره اقدام به تمدید کنید، امتیازات تشویقی شما از بین خواهد رفت. اما حساب کاربری شما حفظ خواهد شد و پس از تمدید، ادامه ی آموزش از سر گرفته خواهد شد</p><p>برای آشنایی بیشتر می توانید <a href="/faq" class="btn" target="_blank">سوالات متداول</a> و <a href="/node/66" class="btn" target="_blank">نحوه ی کار</a> را مشاهده کنید.</p></div><div class="title"><img src="/sites/all/themes/bootstrap/images/law-book.svg"><span>شرایط و قوانین ثبت نام</span></div></div>');
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
		$('html, body').animate({scrollTop: 100}, 200);
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
	Object.keys(translate_options_2).map(function(objectKey) {
		var value = translate_options_2[objectKey];
		if(value.InstrumentOptionId == selected[0]){
			key = value;
			if(!$('.attribute-7 .teacher-intro').length)
				$('.attribute-7 > .form-item-attributes-7').append('<div class="col-lg-10 col-md-9 col-sm-8 col-xs-6 teacher-intro"></div>');
			return ;
		}
	});
	$('#edit-attributes-7 .form-item').each(function(){
		if($(this).find('input').attr('id') == ('edit-attributes-7-'+ key.TeacherOptionId)){
			$(this).css({'display':'block'}).addClass('acrive');
			$(this).find('input').prop('checked', true);
			$(this).find('label').addClass('selected');
			$('.attribute-7 .teacher-intro').html(key.TeacherIntro);
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
