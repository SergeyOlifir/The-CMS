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
        	filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

		} );
		
		CKEDITOR.replace( 'short_description', {
			filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
        	filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
        	filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
        	filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        	filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        	filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

		} );
	};
	$(function() {
		$("#form_date_create").datepicker();
	})
</script>
<?php echo Form::open(array('enctype'=>'multipart/form-data', 'class' => 'content-form')); ?>
	<fieldset>
		<div class="clearfix">
			<? if(isset($content->image)): ?>
				<?= Html::img("files/{$content->image}"); ?>
			<? endif; ?>
			<?= Form::label('Изображение', 'image'); ?>
			<div class="input">
				<?= Form::file("image",array('class' => 'span12')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?= Form::label('Заголовок', 'name'); ?>
			<div class="input">
				<?= Form::input('name', Input::post('name', isset($content) ? $content->name : ''), array('class' => 'span12')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?= Form::label('Краткое описание', 'short_description'); ?>
			<div class="input">
				<?= Form::textarea('short_description', Input::post('short_description', isset($content) ? $content->short_description : ''), array('class' => 'span12', 'rows' => 12)); ?>
			</div>
		</div>
		<div class="clearfix">
			<?= Form::label('Полное описание', 'description'); ?>
			<div class="input">
				<?= Form::textarea('description', Input::post('description', isset($content) ? $content->description : ''), array('class' => 'span12', 'rows' => 12)); ?>
			</div>
		</div>
		<div class="clearfix">
			<?= Form::label('Дата создания', 'date_create'); ?>
			<div class="input">
				<?= Form::input('date_create', Input::post('date_create', isset($content) ? Date::forge($content->date_create)->format("%m/%d/%Y", true) : Date::time()->format("%m/%d/%Y", true)), array('class' => 'span12')); ?>
			</div>
		</div>
		<div class="actions">
			<?= Form::submit('submit', 'Сохранить', array('class' => 'btn btn-primary btn-large')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>