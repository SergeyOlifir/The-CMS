<? $current_page = Controller_Application::$current_page; ?>
<? $template = "fab"; ?>
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
		<meta name='yandex-verification' content='55f35cd89076afa2' />

		<title><?= $title; ?></title>
		<link rel="shortcut icon" href="assets/img/templates/<?= $template; ?>/favicon.png" type="image/png">
		<?= Asset::css('bootstrap.min.css'); ?>
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
		<?= Asset::js("jcarousellite_1.0.1.js"); ?>
		<script src="http://connect.facebook.net/ru_RU/all.js#xfbml=1"></script>
		<script src="http://vkontakte.ru/js/api/openapi.js" type="text/javascript" charset="windows-1251"></script>
		<?= Asset::js('bootstrap.min.js'); ?>
		<?= TCTheme::add_js("content-loader.js"); ?>
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
					<?= TCTheme::render("menu/arrows",array('links' => Model_Link::find_with_translitions($curr_lang, null, null, 'weight'))); ?>
				<div id="second-wrapper">
					<div class="menu-all clearfix">
						<?= TCTheme::render("menu/main",array('template' => $template)); ?>
					</div>
					<div id="content">
						<div id="all-columns" class="clearfix">
							<?= TCTheme::render("columns/main",array()); ?>
							<? $pages = Model_Page::find('all', array('order_by' => array('weight' => 'asc'))); ?>
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
		<?= TCTheme::render("loading"); ?>
		<?= TCTheme::render("popup"); ?>
	</body>
</html>
