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
				<div class="header-wrapper clearfix">
					<h1 class="left">Житница</h1>
					<div><a href="http://umimarket.com.ua/index.php?route=product/category&amp;path=119" target="_blank"><img alt="" src="/	files/images/ban_tolokno.jpg" style="width: 500px; height: 100px; border: 1px solid rgb(153, 102, 51); border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; margin-left: 10px; margin-right: 10px; margin-top: 0px; float:left;"/></a></div>
				</div>
			</div>
			<div id="content-wrapper">
				<div class="content-arrow left-arrow">
				    <ul class="right">
				        <li><a class="indicator-main"            href="#2"></a></li>
				        <li><a class="indicator-news"            href="#news"></a></li>
				        <li><a class="indicator-products"        href="#products"></a></li>
				        <li><a class="indicator-implementations" href="#productions"></a></li>
					<li><a class="indicator-raws"            href="#raws" ></a></li>
				        <li><a class="indicator-productions"     href="#implementations"></a></li>
				    </ul>
				</div>
				<div class="content-arrow right-arrow">
				    <ul class="left">
					<li><a class="indicator-contacts"        href="#contacts"></a></li>
				        <li><a class="indicator-partners"        href="#partners"></a></li>
				        <li><a class="indicator-contacts-2"        href="#contacts"></a></li>
				    </ul>
				</div>
				<div id="second-wrapper">
					<div class="menu-all clearfix">
						<div class="main-menu-content">
							<? //$links = Model_Link::get_public(); var_dump($links); die(); ?>
							<?= render("templates/{$template}/menu/main_menu",array('links' => Model_Link::get_public())); ?>
						</div>			
						<div class="main-menu clearfix">
							<a class="mail left" target="_blank" href="mailto:ridnazhitnitsa@gmail.com">ridnazhitnitsa@gmail.com</a>
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
					<a class="map-link" href="#contacts"><div class="map right"></div></a>
					<div class="contacts left">
						<h3>Контактная информация.</h3> 
						<span>Телефон для справок по вопросам применения и 
						качества продукта:</span>
						<span>т. моб. + 38 (063) 685-16-67 - применение</span> 
						<span>т. моб. + 38 (095) 061-65-93 - качество</span>
						<span>т. моб. + 38 (067) 633-42-85 - жалобы, предложения</span>
						<span> 
							<a target="_blank" href="mailto:ridnazhitnitsa@gmail.com">
								E-mail: ridnazhitnitsa@gmail.com
							</a>
						</span>
					</div>
					<div class="contacts-dop left">
						 <span>Телефон по вопросам приобретения и развития дилерской сети:</span>
						 <span>т. моб. + 38 (099) 219-24-18</span>
						 <span>т. моб. + 38 (066) 937-12-14</span>
						 <span>т. моб. + 38 (050) 131-13-48</span>

 					 	 <span><a href="http://umimarket.com.ua/index.php?route=product/category&amp;path=119" style="color: #333399;" target="_blank">Купить в интернет магазине</a></span>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
