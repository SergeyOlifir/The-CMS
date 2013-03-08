	<div id="<?= $page->alias; ?>_popups">
		<? $contents = $page->contents; ?>
		<? foreach ($contents as $content): ?>
			<div id="<?= $page->alias; ?>_reveal_<?= $content->id; ?>" class="reveal-modal">
				<h3><?= $content->name; ?></h3>
				<div class="popup-content scroll-news-index"><?= $content->description; ?></div>
				<a class="close-reveal-modal">&#215;</a>
			</div>
		<? endforeach; ?>
	</div>