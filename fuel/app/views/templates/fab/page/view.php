<? if($content): ?>
	<? if(count($content) > 0): ?>
		<? if ($view == 'tile'): ?>
		    <?= TCTheme::render("content/tile", array('contents' => $content, 'page' => $page)); ?>
		<? else: ?>
		    <?= TCTheme::render("content/list", array('contents' => $content, 'page' => $page)); ?>
		<? endif;?>
	<? endif; ?>
<? endif; ?> 