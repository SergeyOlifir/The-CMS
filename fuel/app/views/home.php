<? $current_page = Controller_Application::$current_page; ?>
<? $template = "default"; ?>
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
				<h1>Житница</h1>
			</div>
			<div id="content-wrapper">
				<div id="second-wrapper">
					<div class="menu-all clearfix">
						<div class="main-menu-content">
							<? //$links = Model_Link::get_public(); var_dump($links); die(); ?>
							<?= render("templates/{$template}/menu/main_menu",array('links' => Model_Link::get_public())); ?>
						</div>			
						<div class="main-menu clearfix">
							<a class="mail left" href="#">Mail</a>
							<span>Меню</span>
							<ul class="flags right clearfix">
								<li><a href="#" class="ru">ru</a></li>
								<li><a href="#" class="uk">ua</a></li>
								<li><a href="#" class="en">en</a></li>
								<li><a href="#" class="de">en</a></li>
							</ul>
						</div>
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
				<div class="footer-content clearfix">
					<ul class="social clearfix left">
						<li>
							<a class="fab" href="#"></a>
						</li>
						<li>
							<a class="vk" href="#"></a>
						</li>
						<li>
							<a class="od" href="#"></a>
						</li>
						<li>
							<a class="ram" href="#"></a>
						</li>
						<li>
							<a class="fl" href="#"></a>
						</li>
						<li>
							<a class="ya" href="#"></a>
						</li>
						<li>
							<a class="g" href="#"></a>
						</li>
						<li>
							<a class="tv" href="#"></a>
						</li>
					</ul>
					<a href="#"><div class="map right"></div></a>
				</div>
			</div>
		</div>
	</body>
</html>
