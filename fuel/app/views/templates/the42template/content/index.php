<div class="submenu">
	<h2>Portfolio</h2>
	<?= \Fuel\Core\Html::anchor("home/content/change/tile/{$category}", "Tile", array('class' => 'tile')); ?>
	<?= \Fuel\Core\Html::anchor("home/content/change/list/{$category}", "List", array('class' => 'list')); ?>
</div>
<? if (Session::get('tile')): ?>
	<?= TCTheme::render("content/tiles", array('content' => $content)); ?>
<? else: ?>
	<?= TCThemes::render("content/list", array('content' => $content)); ?>
<? endif;?>

<?= $pagination; ?>
	