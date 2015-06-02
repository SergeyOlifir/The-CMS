<? 	$curr_lang_id = TCLocale::get_current_leng_id(); 
	$count = $page->content->count(); ?>
<script type="text/javascript">

	var view_content;

	$(function() {

		var page = "#<?= $page->alias; ?>";
		var page_id = "<?= $page->alias; ?>";
		var cur_page, total_items;
		$('#<?= $page->alias; ?>-column .current_page').attr('value', 1);

		get("home/page/view/<?= $page->alias .'/'. $page->view_content; ?>", page, "");
		$('#list-' + page_id + '-button').click(function() {
			get("home/contents/change/list/<?= $page->alias; ?>", page, "");
			$('#<?= $page->alias; ?>-column .pagination .cur_page').html('1');
			$('#<?= $page->alias; ?>-column .current_page').attr('value', '1');
			$('#<?= $page->alias; ?>-column .pagination .total_items').html("<?= ceil($count/6); ?>");
			view_content = 'list';
			return false;
		});
		
		$('#tile-' + page_id + '-button').click(function() {
			get("home/contents/change/tile/<?= $page->alias; ?>", page, "");
			$('#<?= $page->alias; ?>-column .pagination .cur_page').html('1');
			$('#<?= $page->alias; ?>-column .current_page').attr('value', '1');
			$('#<?= $page->alias; ?>-column .pagination .total_items').html("<?= ceil($count/15); ?>");
			view_content = 'tile';
			return false;
		});

		$('#<?= $page->alias; ?>-column .paginator-wrapper .paginator-bottom').click(function() {			
			cur_page = parseInt($('#<?= $page->alias; ?>-column .current_page').attr('value'));
			total_items = parseInt($('#<?= $page->alias; ?>-column .pagination .total_items').html());
			if (1 <= cur_page && cur_page < total_items) {
				get("home/page/view/<?= $page->alias; ?>" + '?page=' + (cur_page + 1), page, "");
				$('#<?= $page->alias; ?>-column .current_page').attr('value', cur_page + 1);
				$('#<?= $page->alias; ?>-column .pagination .cur_page').html(cur_page + 1);
			}
			return false;
		});

		$('#<?= $page->alias; ?>-column .paginator-wrapper .paginator-top').click(function() {
			cur_page = parseInt($('#<?= $page->alias; ?>-column .current_page').attr('value'));
			total_items = parseInt($('#<?= $page->alias; ?>-column .pagination .total_items').html());
			if (1 < cur_page && cur_page <= total_items) {
				get("home/page/view/<?= $page->alias; ?>" + '?page=' + (cur_page - 1), page, "");
				$('#<?= $page->alias; ?>-column .current_page').attr('value', cur_page - 1);
				$('#<?= $page->alias; ?>-column .pagination .cur_page').html(cur_page - 1);
			}
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
			<?= __("pagination.prev"); ?>
		</div>
		<a id="list-<?= $page->alias; ?>-button" class="list-button left" href="#"></a>
		<a id="tile-<?= $page->alias; ?>-button" class="tile-button left" href="#"></a>
	</div>
	<div class="content" id="<?= $page->alias; ?>" data="<?= $page->id; ?>">
		
	</div>
	<div class="paginator-wrapper clearfix">
		<div class="paginator-bottom left" targetContent="<?= $page->alias; ?>">
			<?= __("pagination.next"); ?>
			<div class="pagination right">
				<?= __("pagination.page"); ?>&nbsp;<span class="cur_page">1</span>&nbsp;<?= __("pagination.of"); ?>&nbsp;<span class="total_items"><?= ceil($count/($page->view_content == 'tile' ? 15 : 6)); ?></span>
			</div>
		</div>
	</div>
	<input type="hidden" class="current_page" value="1"></input>
</div>