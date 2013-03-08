<script>
	$(".scroll-<?= $page->alias; ?>-tiles").mCustomScrollbar();
</script>
<? $contents = $page->contents; ?>
<ul class="tile clearfix">
	<? foreach ($contents as $content): ?>
			<li>
				<a id="tile-<?= $page->alias; ?>-<?= $content->id; ?>" data-reveal-id="<?= $page->alias; ?>_reveal_<?= $content->id; ?>" href="#">
					<div class="img-wrapper">
						<?= Html::img("files/{$content->image}"); ?>
					</div>
					<h3 class="header">
						<?= $content->name; ?>
					</h3>
				</a>
			</li>
	<? endforeach; ?>
</ul>