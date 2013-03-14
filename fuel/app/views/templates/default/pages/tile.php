<script>
	$(".scroll-<?= $page->alias; ?>-tiles").mCustomScrollbar();
</script>
<? $contents = $page->contents; ?>
<ul class="tile clearfix">
	<? foreach ($contents as $content): ?>
			<li>
				<a id ="<?= $content->id; ?>" data-reveal-id="contents_popup" href="#" content_id="<?= $content->id; ?>" class="show-popup">
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