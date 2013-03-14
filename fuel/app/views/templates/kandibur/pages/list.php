<script>
	$(".scroll-<?= $page->alias; ?>-index").mCustomScrollbar();
	$(".scroll-<?= $page->alias; ?>-tiles").mCustomScrollbar();
</script>
	<ul class='list clearfix'>
		<? $contents = $page->contents; ?>
		<? foreach ($contents as $content): ?>
			<a data-reveal-id="contents_popup" href="#" content_id="<?= $content->id; ?>" class="show-popup">
				<li>
					<div class="clearfix">
						<div class="image-wrapper left">
							<?= Html::img("files/{$content->image}"); ?>
						</div>
						<div class="description left">
							<h3>
								<?= $content->name; ?>
							</h3>
							<div class="text">
								<?= $content->short_description; ?>
							</div>
							<div class="date">
								<?= Date::forge($content->updated_at)->format("%d.%m.%Y", true); ?>
							</div>
						</div>
					</div>
				</li>
			</a>
		<? endforeach; ?>
	</ul>
