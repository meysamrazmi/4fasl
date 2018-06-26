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
	print '
		<img src="/sites/all/themes/bootstrap/images/sazz.png" style="width: 100%;max-width: 700px;margin: auto;display: block;">
    <span style="
    font-size: 35px;
    font-weight: bold;
	text-align: center;
    display: block;
	margin: 50px 0 0;">شروع کنید</span>
	<p style="font-size: 15px;text-align: center;margin: 0px auto 0;max-width: 870px;border: 5px solid #673AB7;border-width: 0 3px;padding: 0px 10px;">
    <br>
در آموزشگاه موسیقی چهارفصل، میتوانید ساز و آواز مورد علاقه خود را، زیر نظر اساتید برجسته موسیقی آموزش ببینید. در صورت تمایل<br> میتوانید بصورت حضوری و یا مجازی، آموزش ببینید. انتخاب کنید:</p>

	<div class="links">
			<a href="/get-started/حضوری" target="_blank" style="
    border-bottom: 1px solid #aaa;
">
				<span class="img"><img src="/sites/all/themes/bootstrap/images/location.png" style="margin-top: -12px;"></span>
				<span>ثبت نام در دوره های حضوری</span>
			</a>
			<a href="/get-started/مجازی" target="_blank">
				<img src="/sites/all/themes/bootstrap/images/monitor.png" style=" width: 70px; margin-left: 20px;">
				<span>ثبت نام در دوره های مجازی</span>
			</a>
	</div>
	<p style="
    text-align: center;
    margin-top: 70px;
">
	آموزشگاه موسیقی چهارفصل<br>
با مجوز رسمی از وزارت فرهنگ و ارشاد اسلامی<br>
تهران، بزرگراه ستاری، روبروی مجتمع کوروش<span style="margin-right: 20px;"></span>
تلفن: ۴۴۰۴۴۴۹۷
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
    justify-content: space-around;
	flex-direction: column;
    margin: 50px auto 20px;
}
.links img {
    width: 80px;
}
.links a {
    padding: 25px;
    color: #555;
    font-size: 15px;
    font-weight: 500;
    /*box-shadow: 0 1px 6px rgba(0,0,0,0.12), 0 1px 4px rgba(0,0,0,0.12);*/
	white-space: nowrap;
}
.links .img {
    width: 70px;
    height: 70px;
    overflow: hidden;
    display: inline-block;
    padding: 6px;
    vertical-align: middle;
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
</style>
