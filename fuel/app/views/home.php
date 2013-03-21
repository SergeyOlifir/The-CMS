<? $current_page = Controller_Application::$current_page; ?>
<? $template = "kandibur"; ?>
<!DOCTYPE html>
<html lang="<?= Config::get('language'); ?>">
	 <head>
		<meta charset="utf-8"/>
		
		<meta property="og:title" content="zhitnitsa" />
		<meta property="og:type" content="company" />
		<meta property="og:url" content="http://zhitnitsa.com.ua/" />
		<meta property="og:image" content="" />
		<meta property="og:site_name" content="&#x416;&#x438;&#x442;&#x43d;&#x438;&#x446;&#x430;" />
		<meta property="fb:admins" content="100005100901584" />

		<title><?= $title; ?></title>
		<link rel="shortcut icon" href="files/favicon.png" type="image/png">
		<?= Asset::css('reveal.css'); ?>
		<?= Asset::css('jquery.fancybox.css'); ?>
		<?= Asset::css('jquery.fancybox-buttons.css'); ?>
		<?= Asset::css('jquery.mCustomScrollbar.css'); ?>
		<?= Asset::css("templates/{$template}/style.css"); ?>

		<?= Asset::js('jquery-1.8.3.min.js'); ?>
		<?= Asset::js('jquery-ui-1.9.0.custom.min.js'); ?>
		<?= Asset::js('jquery.ui.min.js'); ?>
		<?= Asset::js('jquery.mousewheel.min.js'); ?>
		<?= Asset::js('jquery.reveal.js'); ?>
		<?= Asset::js('jquery.fancybox.pack.js'); ?>
		<?= Asset::js('jquery.fancybox-buttons.js'); ?>
		<?= Asset::js('jquery.scrollTo.js');?>
		<?= Asset::js('jquery.mCustomScrollbar.min.js'); ?>
		<?= Asset::js('content-loader.js'); ?>
		<?= Asset::render('javascripts'); ?>
	</head>

	<body>
		<div id="all-wrapper">
			<div id="header">
				<?= render("templates/{$template}/header",array()); ?>
			</div>
			<div id="content-wrapper">
					<?= render("templates/{$template}/menu/arrows",array('links' => Model_Link::get_public())); ?>
				<div id="second-wrapper">
					<div class="menu-all clearfix">
						<?= render("templates/{$template}/menu/main",array('template' => $template)); ?>
					</div>
					<div id="content">
						<div id="all-columns" class="clearfix">
							<?= render("templates/{$template}/columns/main",array()); ?>
							<? $pages = Model_Page::find('all'); ?>
							<? foreach ($pages as $page): ?>
								<?= render("templates/{$template}/columns/column",array('page' => $page)); ?>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div id="footer">
				<?= render("templates/{$template}/footer"); ?>
			</div>
		</div>
		<?= render("templates/{$template}/popup"); ?>
	</body>
</html>
