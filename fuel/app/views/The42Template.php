<? $current_page = Controller_Application::$current_page; ?>
<? $template = "the42template"; ?>
<!DOCTYPE html>
<html lang="<?= Config::get('language'); ?>">
	 <head>
		<title><?= $title; ?></title>
		<meta charset="utf-8"/>
		<link rel="shortcut icon" href="assets/img/templates/<?= $template; ?>/favicon.png" type="image/png">
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
		<?= Asset::js("templates/{$template}/jcarousellite_1.0.1.js"); ?>
		<?= Asset::render('javascripts'); ?>
	</head>

	<body>
		<div id="all-wrapper">
			<div id="header">
				<?= render("templates/{$template}/header",array()); ?>
			</div>
			
			<div id="content">
				<? if(isset($content)): ?>
					<?= $content; ?>
				<? endif; ?>
			</div>
			
			<div id="footer">
				<?= render("templates/{$template}/footer"); ?>
			</div>
		</div>
	</body>
</html>
