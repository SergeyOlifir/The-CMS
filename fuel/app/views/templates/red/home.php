<? $current_page = Controller_Application::$current_page; ?>
<? $template = "red"; ?>
<!DOCTYPE html>
<html lang="<?= Session::get('lang') ? Session::get('lang') : Config::get('language'); ?>">
	 <head>
		<meta charset="utf-8"/>
		
		<meta property="og:title" content="zhitnitsa" />
		<meta property="og:type" content="company" />
		<meta property="og:url" content="http://zhitnitsa.com.ua/" />
		<meta property="og:image" content="" />
		<meta property="og:site_name" content="&#x416;&#x438;&#x442;&#x43d;&#x438;&#x446;&#x430;" />
		<meta property="fb:admins" content="100005100901584" />

		<title><?= $title; ?></title>
		<link rel="shortcut icon" href="assets/img/templates/<?= $template; ?>/favicon.png" type="image/png">
		<?= Asset::css('reveal.css'); ?>
		<?= Asset::css('jquery.fancybox.css'); ?>
		<?= Asset::css('jquery.fancybox-buttons.css'); ?>
		<?= Asset::css('jquery.mCustomScrollbar.css'); ?>
		<?= TCTheme::add_css("style.css"); ?>

		<?= Asset::js('jquery-1.8.3.min.js'); ?>
		<?= Asset::js('jquery-ui-1.9.0.custom.min.js'); ?>
		<?= Asset::js('jquery.ui.min.js'); ?>
		<?= Asset::js('jquery.mousewheel.min.js'); ?>
		<?= Asset::js('jquery.reveal.js'); ?>
		<?= Asset::js('jquery.fancybox.pack.js'); ?>
		<?= Asset::js('jquery.fancybox-buttons.js'); ?>
		<?= Asset::js('jquery.scrollTo.js');?>
		<?= Asset::js('jquery.mCustomScrollbar.min.js'); ?>
		<?= TCTheme::add_js("content-loader.js"); ?>
		<?= TCTheme::add_js("jcarousellite_1.0.1.js"); ?>
		<?= Asset::render('javascripts'); ?>
	</head>

	<body>
		<? 
			if (Session::get('lang')) {
        		Config::set('language', Session::get('lang'));
            }
            Lang::load($template.'.php');
            $curr_lang = TCLocale::get_current_leng_id();
        ?>
		<div id="all-wrapper">
			<div id="header">
				<?= TCTheme::render("header",array()); ?>
			</div>
			<div id="content-wrapper">
					<?= TCTheme::render("menu/arrows",array('links' => Model_Link::find_with_translitions_related_to_public($curr_lang))); ?>
				<div id="second-wrapper">
					<div class="menu-all clearfix">
						<?= TCTheme::render("menu/main",array('template' => $template)); ?>
					</div>
					<div id="content">
						<div id="all-columns" class="clearfix">
							<?= TCTheme::render("columns/main",array()); ?>
							<? $pages = Model_Category::find('all'); ?>
							<? foreach ($pages as $page): ?>
								<?= TCTheme::render("columns/column",array('page' => $page)); ?>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div id="footer">
				<?= TCTheme::render("footer"); ?>
			</div>
		</div>
		<?= TCTheme::render("popup"); ?>
	</body>
</html>
