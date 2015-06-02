<script>
	$(".scroll-<? //echo $page->alias; ?>-tiles").mCustomScrollbar();
</script>
<ul class="tile clearfix">
	<? foreach ($contents as $content): ?>
			<li>
				<a id ="<?= $content['content_id']; ?>" data-reveal-id="contents_popup" href="#" content_id="<?= $content['content_id']; ?>" class="show-popup">
					<div class="img-wrapper">
						<?= Html::img("files/{$content['image']}"); ?>
					</div>
					<h3 class="header">
						<?= $content["name"]; ?>
					</h3>
				</a>
			</li>
	<? endforeach; ?>
</ul>