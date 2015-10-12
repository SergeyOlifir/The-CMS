<? $current_page = Controller_Application::$current_page; ?>

<!DOCTYPE html>
<html>
	 <head>
		<meta charset="utf-8"/>
		<title><?= $title; ?></title>

		<?= Asset::css('bootstrap_old.min.css'); ?>
		<?= Asset::css('reveal.css'); ?>
		<?= Asset::css('jquery.fancybox.css'); ?>
		<?= Asset::css('jquery.fancybox-buttons.css'); ?>
		<?= Asset::css('jquery.mCustomScrollbar.css'); ?>
		<?= Asset::css('main.css'); ?>
		
		<?= Asset::render('stylesheets'); ?>
		<?= Asset::js('jquery-1.8.3.min.js'); ?>
		<?= Asset::js('jquery-ui-1.9.0.custom.min.js'); ?>
		<?= Asset::js('bootstrap_old.min.js');?>
		<?= Asset::js('jquery.mousewheel.min.js'); ?>
		<?= Asset::js('jquery.reveal.js'); ?>
		<?= Asset::js('jquery.fancybox.pack.js'); ?>
		<?= Asset::js('jquery.fancybox-buttons.js'); ?>
		<?= Asset::js('jquery.scrollTo.js');?>
		<?= Asset::js('jquery.mCustomScrollbar.min.js'); ?>
		<?= Asset::js('admin.js'); ?>
		
		<?= Asset::render('javascripts'); ?>
	</head>
	<body data-spy="scroll" data-target=".scroll">
		<? Lang::load('admin/index.php', null, 'ru'); ?>
	    <header>
		<nav class="navbar navbar-fixed-top navbar-inverse">
		    <div class="navbar-inner">
			<a class="brand" href="/admin"><?= __("navbar-top.brand"); ?></a>
			<ul class="nav">
			    <li class="<?= Controller_Application::$current_page == 'users' ? 'active' : ''; ?>">
				<a href="/admin/user"><?= __("navbar-top.users"); ?></a>
			    </li>
			    <li class="<?= Controller_Application::$current_page == 'pages' ? 'active' : ''; ?>">
				<a href="/admin/pages"><?= __("navbar-top.pages"); ?></a>
			    </li>
			    <li class="<?= Controller_Application::$current_page == 'links' ? 'active' : ''; ?>">
				<a href="/admin/links"><?= __("navbar-top.links"); ?></a>
			    </li>
			    <li class="<?= Controller_Application::$current_page == 'categories' ? 'active' : ''; ?>">
				<a href="/admin/categories"><?= __("navbar-top.categories"); ?></a>
			    </li>
			</ul>
		    </div>
	        </nav>
	    </header>
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
