<script type="text/javascript">
	$(function() {
		var page = "#<?= $page->alias; ?>";
		var _page = page;
		get("home/page/<?= $page->view_content; ?>/" + $(page).attr("data"), "#" + $(page).attr("id"), "");
		$('#list-' + $(page).attr("id") + '-button').click(function() {
			get("home/page/list/" + $(_page).attr("data"), "#" + $(_page).attr("id"), "");
			return false;
		});
		
		$('#tile-' + $(page).attr("id") + '-button').click(function() {
			get("home/page/tile/" + $(_page).attr("data"), "#" + $(_page).attr("id"), "");
			return false;
		});
	})
</script>
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