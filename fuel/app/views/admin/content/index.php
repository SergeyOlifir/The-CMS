<h2>Список контента страницы <?= $page->name; ?></h2>
<? $contents = $page->contents; ?>
<?php if ($contents): ?>
	<div class="main-metro-wrapper clearfix">
		<? foreach ($contents as $content): ?>
			<div class="tile left smoll content">
				<a href="/content/edit/<?=$content->id; ?>">
					<?= Html::img("files/{$content->image}"); ?>
					<h3><?= $content->name; ?></h3>
				</a>
				<div class="buttons-area clearfix">
					<a href="/content/delete/<?=$content->id; ?>" class="delite-button right">Delete</a>
				</div>
			</div>
		<? endforeach; ?>
	</div>
<?php else: ?>
	<p>Контента здесь пока нет. Но ето дело поправимое</p>
<?php endif; ?>
