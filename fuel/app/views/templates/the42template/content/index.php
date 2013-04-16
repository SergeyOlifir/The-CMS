<div class="submenu">
	<h2>Portfolio</h2>
	<?= \Fuel\Core\Html::anchor("/portfolio/change/tile/{$category}", "Tile", array('class' => 'tile')); ?>
	<?= \Fuel\Core\Html::anchor("/portfolio/change/list/{$category}", "List", array('class' => 'list')); ?>
</div>
<? if (Session::get('tile')): ?>
	<?= render("templates/" . Controller_Application::$template_name . "/pages/portfolio/tiles", array('content' => $content)); ?>
<? else: ?>
	<?= render("templates/" . Controller_Application::$template_name . "/pages/portfolio/list", array('content' => $content)); ?>
<? endif;?>

<?= $pagination; ?>
	