<? $weights = array();
	for($i = 0; $i < 40; $i++) {
		$weights[$i] = $i;
	}
?>
<?= Asset::js('ckeditor/ckeditor.js'); ?>
<script type="text/javascript">
	window.onload = function()
	{
		CKEDITOR.replace( 'description', {
			filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
			height: 600, 
		} );
		
		
	};
	
</script>
<section id="edit" class="well">
    <header>
	 <h1><legend><?= __("_form.title"); ?></legend></h1>
    </header>
    <?php echo Form::open(); ?>
	<fieldset>
	    <div class="clearfix">
		<?php echo Form::label(__("_form.input.alias"), 'alias'); ?>
		    <div class="input">
			<?php echo Form::input('alias', Input::post('alias', isset($page) ? $page->alias : ''), array('class' => 'span8', 'rows' => 12)); ?>
		    </div>
	    </div>

	    <?= isset($page) ? $page->translition_form() : Model_Page::get_translition_form(); ?>

	    <div class="input">
		<?= Form::checkbox('publish_date', 1, isset($page) && $page->publish_date > 0 ? true : false);  ?>
		<?= Form::label(__("_form.input.publish_date"), 'public_data'); ?>
	    </div>
	    <div class="clearfix">
			<?= Form::label(__("_form.input.weight"), 'weight'); ?>
			<div class="input">
				<?= Form::select('weight', Input::post('weight', isset($page) ? $page->weight : ''), $weights, array('class' => 'span8')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label(__("_form.input.view-content.title"), 'view_content'); ?>
			<div class="input">
			    <?= Form::radio('view_content', 'list', isset($page) && $page->view_content == 'list' ? true : false); ?>
			    <?= Form::label(__("_form.input.view-content.list"), 'view_content'); ?>
			    <?= Form::radio('view_content', 'tile', isset($page) && $page->view_content == 'tile' ? true : false); ?>
			    <?= Form::label(__("_form.input.view-content.tile"), 'view_content'); ?>
			</div>
	    </div>
	    <div class="actions">
		<?php echo Form::submit('submit', __("_form.input.submit"), array('class' => 'btn btn-primary btn-large')); ?>
	    </div>
	</fieldset>
    <?php echo Form::close(); ?>
</section>