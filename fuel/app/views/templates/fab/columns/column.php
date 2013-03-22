<div class="column left" id="<?= $page->alias; ?>-column">
	<h2>
		<?= $page->header; ?>
	</h2>
	<div class="paginator-wrapper clearfix">
		<div class="paginator-top left disable" targetContent="<?= $page->alias; ?>">
			Предыдущие
		</div>
		<a id="list-<?= $page->alias; ?>-button" class="list-button left" href="#"></a>
		<a id="tile-<?= $page->alias; ?>-button" class="tile-button left" href="#"></a>
	</div>
	<div class="content" id="<?= $page->alias; ?>" data="<?= $page->id; ?>">
		
	</div>
	<div class="paginator-wrapper clearfix">
		<div class="paginator-bottom left" targetContent="<?= $page->alias; ?>">
			Следующие
		</div>
	</div>
</div>