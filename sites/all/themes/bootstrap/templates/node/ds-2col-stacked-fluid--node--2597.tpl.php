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
td.day-name {
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
var translate_options_2 = {
	1 : {	'name' : 'تار',
		'eName' : 'tar',
		'InstrumentOptionId' : 13,
		'uid' : 164,
		'TeacherOptionId' : 30,
		'TeacherName' : '',
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
		'TeacherIntro' : 'آغاز فعالیت هنری از سال 82<br> عضو فعال خانه ی موسیقی ایران<br> بهره مندی از محضر اساتید: حسن میرزاخانی، اردوان کامکار در نوازندگی ساز سنتور<br> آنالیز موسیقی ایرانی زیر نظر بابک دشتی نژاد و میرسعید حسینی پناه و ...<br> گذراندن دوره ی آموزش موسیقی کودک زیر نظر استاد سودابه سالم<br> گذراندن دوره ی سلفژ و هارمونی زیر نظر اساتید مرتضی شیرکوهی و ... <br>عضو گروه ارکستر سنتور نوازان رویش، عضو گروه موسیقی سنتی مهرگان'
	},
	4 : {	'name' : 'سه تار',
		'eName' : 'setar',
		'InstrumentOptionId' : 14,
		'uid' : 111,
		'TeacherOptionId' : 31,
		'TeacherIntro' : 'کارشناس ارشد نوازندگی موسیقی ایرانی از دانشگاه هنر با ساز تخصصی تار (دوره کارشناسی) و سه‌تار (دوره کارشناسی ارشد)<br>هنرآموخته نزد :<br>(برای ساز سه تار) : احمد رضا صمدی، مسعود شعاری، بهنام وادانی، مهربانو توفیق، داریوش طلایی<br>(برای ساز تار) : محمدرضا ابراهیمی، بهروز همتی، حسین علیزاده (مسترکلاس)، محمدرضا لطفی، حمیدرضا خبازی، داریوش طلایی<br>انتشار کتاب « سرمشق» شامل گزیده‌ای از تمرین‌های نوشته شده برای تار و سه‌تار اثر استاد وزیری (94)<br>انتشار کتاب « رامشگری» شامل گزیده‌ای از قطعات نوشته شده برای تار و سه‌تار اثر استاد وزیری (94)<br>همراهی با ارکستر مجلسی کامه‌راتا به سرپرستی کیوان میرهادی در کنسرت موسیقی پُست مدرن، به عنوان نوازنده‌ی سه‌تار، 1385<br>کنسرت گروه بیداد به آهنگسازی و سرپرستی فرهاد ابراهیم خانی در کرج ، 1388<br>همراهی با ارکستر سمفونیک تهران و گروه کُر دفتر موسیقی و برگزاری کنسرت در تهران ( 1387 و 1388) و اولین تور کنسرتی در پنج کشور فرانسه ، بلژیک ، ایتالیا ، هلند و سوییس (1388)'
	},
/* 	5 : {	'name' : 'ویولن',
		'eName' : 'violin',
		'InstrumentOptionId' : 18,
		'uid' : 107,
		'TeacherOptionId' : 28,
		'TeacherIntro' : 'فارغ التحصیل از هنرستان موسیقی پسران٬ فارغ التحصیل از دانشکده موسیقی در رشته نوازندگی ساز جهانی ( ویلن کلاسیک )، فارغ التحصیل از دانشگاه موسیقی در رشته نوازندگی ساز جهانی ( ویلن کلاسیک )<br>بهره مندی از حضور در کلاس اساتیدی چون: استاد سیاوش ظهیرالدینی استاد سرکار خانم قنبری مهر استاد سرکار خانم بهشتی استاد سیاوش بیضایی استاد محسن الهامیان استاد هوشنگ استوار  و ...<br>شرکت در مستر کلاسهای نوازندگی ویلن کلاسیک در کنسرواتوار کشور نروژ<br>Detlef Hahn- Professor - Violin<br>Terje Moe Hansen- Professor – Violin<br>Peter Herresthal- Associate professor - Violin<br>رهبر ارکستر مجلسی رِبِک<br>عضو فعّال ارکستر سمفونیک سازمان صداوسیمای جمهوری اسلامی ایران<br>عضو فعّال ارکستر استاد نادر مشایخی جهت اجرای کنسرت در شهر سنت پولتن کشور اتریش<br>عضو فعّال ارکستر فیلارمونیک ایرانیان<br>عضو فعّال ارکستر ملل<br>عضو فعّال ارکستر استاد کیوان ساکت به خوانندګی سالار عقیلی<br>عضو فعّال ارکستر سمفونیک به رهبری شهرداد روحانی'
	}, */
	6 : {	'name' : 'پیانو',
		'eName' : 'piano',
		'InstrumentOptionId' : 9,
		'uid' : 30,
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
	10 : {	'name' : 'آواز پاپ',
		'eName' : 'avaz',
		'InstrumentOptionId' : 44,
		'uid' : 7260,
		'TeacherOptionId' : 42,
		'TeacherIntro' : 'فارغ التحصیل دوره های تخصصی صداسازی نزد  اساتید برجسته کشور از جمله استاد محمد رضا صادقی، سابقه چندین اجرای زنده در رادیو، سابقه حضور و اجرا در شبکه های سیما، سابقه برگزاری کنسرت رسمی در کشور و چندین اجرای زنده. ترانه سرا،  خواننده ، آهنگساز و تنظیم کننده موزیک پاپ، انتشار چندین اثر صوتی در حوزه موزیک پاپ و …'
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
	},
	14 : {'name' : 'دف',
		'eName' : 'daf',
		'InstrumentOptionId' : 19,
		'uid' : 7259,
		'TeacherOptionId' : 39,
		'TeacherIntro' : 'شروع نوازندگی تنبور 1381<br>یادگیری دف نزد استاد سارا فطروس 1381<br>یادگیری دوره ویژه دف استاد نبیل یوسف شریداوی 1386<br>یادگیری تنبور نزد استاد علی اکبر مرادی 1392- 1384<br>اخذ کارت مربیگری تنبود از اداره ارشاد کل تهران 1386<br>'
	},
	15 : {	'name' : 'ویولن',
		'eName' : 'violin',
		'InstrumentOptionId' : 18,
		'uid' : 7261,
		'TeacherOptionId' : 40,
		'TeacherIntro' : 'آغاز به موسیقی  از ۱۰ سالگی با ساز ویلن<br>بهره مندی از محضر اساتید: دکتر ستاره بهشتی، ایمان فخر، لعیا اعتمادی، گلریز زربخش، پویا خوش آهنگ<br>فارغ التحصیل رشته ی موسیقی از دانشگاه هنر تهران با گرایش نوازندگی موسیقی جهانی و نوازنده ی ارکستر ملی ایران.<br>سابقه ی همکاری و نوازندگی در ارکستر سمفونیک دانشگاه هنر، ارکستر آکادمیک ایران، ارکستر سمفونیک سی ساز،ارکستر فارابی به رهبری الکساندر هالاپسیس،ارکستر بزرگ کیوان ساکت،ارکستر مجلسی رسا و …'
	},
	16 : {	'name' : 'تنبور',
		'eName' : 'tanbor',
		'InstrumentOptionId' : 47,
		'uid' : 7259,
		'TeacherOptionId' : 39,
		'TeacherIntro' : 'شروع نوازندگی تنبور 1381<br>یادگیری دف نزد استاد سارا فطروس 1381<br>یادگیری دوره ویژه دف استاد نبیل یوسف شریداوی 1386<br>یادگیری تنبور نزد استاد علی اکبر مرادی 1392- 1384<br>اخذ کارت مربیگری تنبود از اداره ارشاد کل تهران 1386<br>'
	},
	17 : {	'name' : 'موسیقی کودک',
		'eName' : 'kids-music',
		'InstrumentOptionId' : 46,
		'uid' : 7262,
		'TeacherOptionId' : 41,
		'TeacherIntro' : ''
	},
	18 : {	'name' : 'فلوت',
		'eName' : 'flut',
		'InstrumentOptionId' : 45,
		'uid' : 7263,
		'TeacherOptionId' : 43,
		'TeacherIntro' : 'دارنده مقام اول کشوری جشنواره هنر و دوم استانی در رشته نوازندگی فلوت<br>سابقه همکاری با ارکستر هیوا به عنوان سولیست به رهبری مظفر نبیلی ، کر فلوت تهران به رهبری سعید تقدسی ، ارکستر فیلارمونیک کرج ، ارکستر گلستان به رهبری کیوان ساکت ، ارکستر ایستگاه و ... .<br>شرکت در مسترکلاس های فلوت دکتر آذین موحد ، فیروزه نوایی ، سعید تقدسی و مهرداد غلامی و مستر کلاس های "پرکتیکوم" پروفسور میرزا کاپتانوویچ ، "الکزندر تکنیک" دکتر آذین موحد و "فلوت" گرهارد مایر.'
	},
	19 : {	'name' : 'آواز ایرانی',
		'eName' : 'avazirani',
		'InstrumentOptionId' : 48,
		'uid' : 7313,
		'TeacherOptionId' : 49,
		'TeacherIntro' : 'دانش آموخته دكترای زبان و ادبيات فارسی <br>١٣٩٢  انتشار البوم اينك از اميد با موسيقی شاهين شهبازی<br>١٣٩٢ (٢٠١٣ جولای) رتبه دوم icm اتريش<br>٢٠١٣ نشان درجه يك خيام از فردريك لونورمان فرانسه<br>١٣٩٣ جايزه مستر وكال فنلاند از هلسينكی <br>٢٠١٤١٣٩٣ انتشار البوم اينك از حافظ با موسيقی دكتر پويا سرايی در استراسبورگ تحت ليسانس فردريك لونورمان<br>١٣٩٤ انتشار البوم اينك از حافظ در تهران<br>انتشار البوم مولاناجان  با موسيقي سياوش عبدی ١٣٩٦ در تهران <br>مفسر ادبی  و برنامه ساز شبكه مستند سيما در قالب مجموعه برنامه های صفير انس.'
	}
};//@todo : make another object for teachers 

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
	//$(this).find('label').append('<p class="course-link"><a href="/'+ translate_optionsId[$(this).find('input').attr('value')].eName +'" target="_blank">معرفی دوره</a></p>');
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
$('.attribute-3 > .form-item-attributes-3').append('<div class="description rules"><div><p>ثبت نام در دوره های آموزشی حضوری بصورت ترمی بوده و 12 هفته اعتبار دارد و مدت زمان هر جلسه نیم ساعت می باشد.</p><p>پوشش مناسب: از همکاری شما سپاسگذاریم (-;</p><p>پس از ثبت نام، روز و ساعت کلاس آموزشی برای شما اختصاص داده میشود و شما هر هفته در همان زمان اعلام شده از کلاس آموزشی استفاده می کنید</p><p>غیبت از کلاس باعث سوخت شدن جلسه شما میشود. البته در مواقعی که نتوانید در کلاس حضور یابید (بعلت بیماری و یا مسافرت و ...) میتوانید جلسه را بصورت مجازی شرکت کنید. بدین منظور حتما یک روز قبل از کلاس باید هماهنگی های لازم را با آموزشگاه به عمل آورید.</p><p>برای آشنایی بیشتر می توانید <a href="/faq" class="btn" target="_blank">سوالات متداول</a> و <a href="/node/66" class="btn" target="_blank">نحوه ی کار</a> را مشاهده کنید.</p></div><div class="title"><img src="/sites/all/themes/bootstrap/images/law-book.svg"><span>شرایط و قوانین ثبت نام</span></div></div>');
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
	Object.keys(translate_options_2).map(function(objectKey) {
		var value = translate_options_2[objectKey];
		if(value.InstrumentOptionId == selected[0]){
			TeachersItems(value)
		}
	});
	if($('#edit-attributes-7 .acrive').length == 1){
		$('#edit-attributes-7 .acrive').find('input').prop('checked', true);
		$('#edit-attributes-7 .acrive').find('label').addClass('selected');
	}
};

var TeachersItems = function(key){
	$item = $('#edit-attributes-7 .form-item input#edit-attributes-7-' + key.TeacherOptionId).closest('.form-item')
	$item.css({'display':'block'}).addClass('acrive').append('<div class="teacher-intro">' + key.TeacherIntro + '<p style="margin-top: 15px;"><button type="button" class="btn btn-info" data-toggle="modal" data-target=".ostad-timing" ostad="'+ key.uid +'">مشاهده برنامه زمانی استاد</button></p></div>');
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