<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page && !empty($title)): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($display_submitted): ?>
    <span class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </span>
    <?php endif; ?>
  </header>
  <?php endif; ?>
  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    print render($content);
	print /** text*/'
		<img src="/sites/all/themes/bootstrap/images/sazz.png" style="width: 100%;max-width: 700px;margin: auto;display: block;">
    <span style="
    font-size: 35px;
    font-weight: bold;
	text-align: center;
    display: block;
	margin: 50px 0 0;">شروع کنید</span>
	<p style="font-size: 15px;text-align: center;margin: 0px auto 0;max-width: 870px;border: 5px solid #673AB7;border-width: 0 3px;padding: 0px 10px;">
    <br>
    در آموزشگاه موسیقی چهارفصل، میتوانید ساز و آواز مورد علاقه خود را، زیر نظر اساتید برجسته موسیقی آموزش ببینید. در صورت تمایل
    <br>
    میتوانید بصورت حضوری و یا مجازی، آموزش ببینید. انتخاب کنید:
    <br>
    حضوری یا آنلاین بودن کلاس خود را میتوانید بعد از پرداخت در قسمت انتخاب زمان کلاس انتخاب کنید.
  </p>

	<div class="links">
			<a href="/get-started/حضوری" target="_blank" class="draw">
			  <span class="for-draw"></span>
				<span class="img" style="z-index: 4;"><img src="/sites/all/themes/bootstrap/images/location.png"></span>
				<span style="z-index: 4;text-align: center;">ثبت نام در دوره های حضوری و آنلاین
				<br>
				 (به صورت تماس تصویری)
				 </span>
				<span class="for-spin"></span>
			</a>
			<a href="/get-started/آنلاین" target="_blank" class="draw">
			  <span class="for-draw"></span>
				<span class="img" style="z-index: 4;"><img src="/sites/all/themes/bootstrap/images/online.png"></span>
				<span style="z-index: 4;">ثبت نام در دوره های آنلاین</span>
				<span class="for-spin"></span>
			</a>
			<a href="/get-started/مجازی" target="_blank" class="draw">
        <span class="for-draw"></span>
				<img src="/sites/all/themes/bootstrap/images/monitor.png" style="width: 40px; margin-left: 20px; z-index: 4;">
				<span style="z-index: 4;text-align: center;">ثبت نام در دوره های مجازی
				<br>
				 (آفلاین به صورت ارسال فیلم)
				</span>
				<span class="for-spin"></span>
			</a>
	</div>
	<p style="
    text-align: center;
    margin-top: 70px;
">
	آموزشگاه موسیقی چهارفصل<br>
با مجوز رسمی از وزارت فرهنگ و ارشاد اسلامی<br>
تهران - جنت آباد جنوبی - بلوار لاله - تقاطع شاهین (شهید پژوهنده)
<span style="margin-right: 20px;"></span>
تلفن: ۴۴۴۱۰۰۹۷
	</p>
	';
  ?>
  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
  <footer>
    <?php print render($content['field_tags']); ?>
    <?php print render($content['links']); ?>
  </footer>
  <?php endif; ?>
  <?php print render($content['comments']); ?>
</article>


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
.links {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 50px auto 20px;
}
.links img {
  width: auto;
  max-height: 100%;
}
.links a {
  padding: 5px 25px;
  color: #555;
  font-size: 15px;
  font-weight: 500;
  box-shadow: 0 1px 6px rgba(0,0,0,0.12), 0 1px 4px rgba(0,0,0,0.12);
  white-space: nowrap;
  border-radius: 50px;
  background: #fff;
  display: flex;
  align-items: center;
  height: 70px;
  margin: 0 15px;
  position: relative;
  overflow: hidden;
}
@media all and (max-width: 600px){
  .links{
    flex-direction: column;
  }
  .links a {  margin: 10px;}
}
.links .img {
  width: 40px;
  height: 40px;
  overflow: hidden;
  display: inline-flex;
  padding: 0px;
  align-items: center;
  justify-content: center;
  margin-left: 15px;
}
h1.page-header {
    display: none;
}
.main-container.container-fluid {
    width: 100%;
    max-width: none;
    background: #f9f9f9;
    padding-top: 50px;
    margin-top: -200px !important;
    margin-bottom: -2px;
}



.links a:before,.links a:after {box-sizing: inherit;content: '';position: absolute;width: 100%;height: 100%;}
.links .draw {
  transition: color 0.25s;
}
.links .draw::before,
.links .draw::after {
  border: 2px solid transparent;
  width: 0;
  height: 0;
}
.links .draw::before {
  top: 0;
  left: 0;
}
.links .draw::after {
  bottom: 0;
  right: 0;
  border: 2px solid transparent;
}
.links .draw:hover {
  color: #673AB7;
}
.links .draw:hover::before,
.links .draw:hover::after {
  width: 100%;
  height: 100%;
}
.links .draw:hover::before {
  border-top-color: #9c27b0;
  /* border-right-color: #9c27b0; */
  transition: width 0.3s ease-out, height 0.25s ease-out 0.25s;
}
.links .draw:hover::after {
  border-bottom-color: #9c27b0;
  /* border-left-color: #9c27b0; */
  transition: border-color 0s ease-out 0.5s, width 0.3s ease-out 0.5s, height 0.25s ease-out 0.75s;
}

span.for-spin,span.for-draw {
  position: absolute;
  width: 70px;
  height: 70px;
  left: 0;
  top: 0;
  border-radius: 50%;
  /* transform: rotate(45deg); */
}

span.for-spin:before, span.for-spin:after,span.for-draw:before, span.for-draw:after {content: "";width: 100%;height: 100%;position: absolute;left: 0;top: 0;}

span.for-spin:after,span.for-draw:after {border-radius: 50%;border: 2px solid transparent;border-bottom-color: #9c27b0;border-left-color: #9c27b0;z-index: 1;transform: rotate(45deg);}

span.for-spin:before,span.for-draw:before {
  z-index: 2;
  background: #fff;
  width: 50%;
}

a:hover span.for-spin:before {
  height: 0px;
  transition: height 0.25s ease-out 0.75s;
}

a:hover span.for-draw:before {
  height: 0px;
  transition: height 0.25s linear 0.25s;
  bottom: 0;
  top: inherit;
}

span.for-draw:before, span.for-draw:after {
  bottom: 0;
  right: 0;
  left: inherit;
}

span.for-draw {
  right: 0;
  bottom: 0;
  top: inherit;
  left: inherit;
}

span.for-draw:after {
  transform: rotate(-135deg);
}
</style>
