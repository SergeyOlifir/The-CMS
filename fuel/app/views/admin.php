<? $current_page = Controller_Application::$current_page; ?>

<!DOCTYPE html>
<html>
	 <head>
		<meta charset="utf-8"/>
		<title><?= $title; ?></title>

		<?= Asset::css('bootstrap.min.css'); ?>
		<?= Asset::css('main.css'); ?>
		<?= Asset::render('stylesheets'); ?>
		<?= Asset::js('jquery-1.6.4.min.js'); ?>
		<?= Asset::js('bootstrap-alerts.js');?>
		<?= Asset::render('javascripts'); ?>
	</head>
	<body>
		<div id="header">
			<div class="row">
				<? if(isset($back_button)): ?>
					<?= $back_button; ?>
				<? endif; ?>
				<h1>Sevennights CMS </h1>
			</div>
		</div>
		<div class="container">
			<? if($messagess = e((array) Session::get_flash('notice'))): ?>
				<? foreach ($messagess as $messages) : ?>
					<?= render('_messages', array('messages' => $messages), false); ?>
				<? endforeach; ?>
			<? endif; ?>
		    <div class="content">	
				<?= $content; ?>
			</div>
		</div>
		<footer>
			<? if(isset($add_button)): ?>
				<?= $add_button; ?>
			<? endif; ?>
		</footer>
	</body>
</html>
