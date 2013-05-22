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
		
		CKEDITOR.replace( 'short_description', {
			filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
			height: 600, 
		} );
		
		$('#scroll').scrollspy();
	};
	$(function() {
		$("#form_date_create").datepicker();
	})
</script>
<section id="edit" class="well">
    <header>
	 <h1><legend><?= __("_form.title"); ?></legend></h1>
    </header>
    <?php echo Form::open(array('enctype'=>'multipart/form-data', 'class' => 'content-form')); ?>
	    <fieldset>
		    <div class="clearfix">
			    <? if(isset($content->image)): ?>
				    <?= Html::img("files/{$content->image}", array('class' => "thumbnail")); ?>
			    <? endif; ?>
			    <?= Form::label(__("_form.input.image"), 'image'); ?>
			    <div class="input">
				    <?= Form::file("image",array('class' => 'span8')); ?>
			    </div>
		    </div>

		    <?= isset($content) ? $content->translition_form() : Model_Content::get_translition_form(); ?>

		    <div class="clearfix">
			    <?= Form::label(__("_form.input.date-create"), 'date_create'); ?>
			    <div class="input">
				    <?= Form::input('date_create', Input::post('date_create', isset($content) ? Date::forge($content->date_create)->format("%m/%d/%Y", true) : Date::time()->format("%m/%d/%Y", true)), array('class' => 'span8')); ?>
			    </div>
		    </div>
		    <div class="actions">
			    <?= Form::submit('submit', __("_form.input.submit"), array('class' => 'btn btn-primary btn-large')); ?>
		    </div>
	    </fieldset>
    <?php echo Form::close(); ?>
</section>