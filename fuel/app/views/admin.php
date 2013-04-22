<? $current_page = Controller_Application::$current_page; ?>

<!DOCTYPE html>
<html>
	 <head>
		<meta charset="utf-8"/>
		<title><?= $title; ?></title>

		<?= Asset::css('bootstrap.min.css'); ?>
		<?= Asset::css('reveal.css'); ?>
		<?= Asset::css('jquery.fancybox.css'); ?>
		<?= Asset::css('jquery.fancybox-buttons.css'); ?>
		<?= Asset::css('jquery.mCustomScrollbar.css'); ?>
		<?= Asset::css('main.css'); ?>
		
		<?= Asset::render('stylesheets'); ?>
		<?= Asset::js('jquery-1.8.3.min.js'); ?>
		<?= Asset::js('jquery-ui-1.9.0.custom.min.js'); ?>
		<?= Asset::js('bootstrap.js');?>
		<?= Asset::js('jquery.mousewheel.min.js'); ?>
		<?= Asset::js('jquery.reveal.js'); ?>
		<?= Asset::js('jquery.fancybox.pack.js'); ?>
		<?= Asset::js('jquery.fancybox-buttons.js'); ?>
		<?= Asset::js('jquery.scrollTo.js');?>
		<?= Asset::js('jquery.mCustomScrollbar.min.js'); ?>
		
		<?= Asset::render('javascripts'); ?>
	</head>
	<body>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<a class="brand" href="#">THE CMS</a>
				<ul class="nav">
					<li class="active"><a href="#">Пользователи</a></li>
					<li><a href="/admin/pages">Категории</a></li>
					<li><a href="/admin/links">Ссылки</a></li>
				</ul>
			</div>
        </div>
		
		<div class="container">
			<? if($messagess = e((array) Session::get_flash('notice'))): ?>
				<? foreach ($messagess as $messages) : ?>
					<?= render('_messages', array('messages' => $messages), false); ?>
				<? endforeach; ?>
			<? endif; ?>
		    <div class="row">
				<?= $content; ?>
			</div>
		</div>
		
	</body>
</html>
