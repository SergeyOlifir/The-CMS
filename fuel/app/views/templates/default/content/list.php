<script>
	$(".scroll-<? //echo $page->alias; ?>-index").mCustomScrollbar();
	$(".scroll-<? //echo $page->alias; ?>-tiles").mCustomScrollbar();
</script>
	<ul class='list clearfix'>
		<? foreach ($contents as $content): ?>
			<a data-reveal-id="contents_popup" href="#" content_id="<?= $content->id; ?>" class="show-popup">
				<li>
					<div class="clearfix">
						<div class="image-wrapper left">
							<?= Html::img("files/{$content->logo->thumb}"); ?>
						</div>
						<div class="description left">
							<h3>
								<?= $content["name"]; ?>
							</h3>
							<div class="text">
								<?= $content["short_description"]; ?>
							</div>
							<? if ($content->category->public_data == 1): ?>
								<div class="date right">
									<?= Date::forge($content["date_create"])->format("%d.%m.%Y", true); ?>
								</div>
							<? endif; ?>
						</div>
					</div>
				</li>
			</a>
		<? endforeach; ?>
	</ul>
