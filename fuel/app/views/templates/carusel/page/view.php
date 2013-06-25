<? if($page->description !== null): ?>
    <?= $page->description; ?>
<? endif; ?>

<? if($content): ?>
	<? if(count($content) > 0): ?>
		<? if ($view == 'tile'): ?>
		    <?= TCTheme::render("content/tiles", array('content' => $content, 'page' => $page)); ?>
		<? else: ?>
		    <?= TCTheme::render("content/list", array('content' => $content, 'page' => $page)); ?>
		<? endif;?>
		<?= $pagination; ?>
	<? endif; ?>
<? endif; ?> 
