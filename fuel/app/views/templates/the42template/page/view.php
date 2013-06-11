<? if($page->description !== null): ?>
    <?= $page->description; ?>
<? endif; ?>
<? if($content): ?>
	<? if(count($page->content) > 0): ?>
		<section class="submenu">
			<h2>Portfolio</h2>
			<?= \Fuel\Core\Html::anchor("home/content/change/tile/{$page->alias}", "Tile", array('class' => 'tile')); ?>
			<?= \Fuel\Core\Html::anchor("home/content/change/list/{$page->alias}", "List", array('class' => 'list')); ?>
		</section>
		<? if (Session::get('tile')): ?>
		    <?= TCTheme::render("content/tiles", array('content' => $content, 'page' => $page)); ?>
		<? else: ?>
		    <?= TCTheme::render("content/list", array('content' => $content, 'page' => $page)); ?>
		<? endif;?>
		<?= $pagination; ?>
	<? endif; ?>
<? endif; ?> 