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
        	filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

		} );
	};
</script>
<?= Form::open(array('enctype'=>'multipart/form-data')); ?>
	<fieldset>
		<div class="clearfix">
			<? if(isset($link->image)): ?>
				<?= Html::img("files/{$link->image}"); ?>
			<? endif; ?>
			<?= Form::label('Изображение', 'image'); ?>
			<div class="input">
				<?= Form::file("image"); ?>
			</div>
		</div>
		<div class="clearfix">
			<div class="input">
				<?= Form::checkbox('public', 1, isset($link) && $link->public > 0 ? true : false);  ?>
				<?= Form::label('Публикация', 'public'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?= Form::label('Название', 'name'); ?>
			<div class="input">
				<?= Form::input('name', Input::post('name', isset($link) ? $link->name : ''), array('class' => 'span12')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?= Form::label('Страница', 'page_id'); ?>
			<div class="input">
				<?= Form::select('page_id', Input::post('page_id', isset($link) ? $link->page_id : ''), Model_Page::as_array(), array('class' => 'span12')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?= Form::label('Вес', 'weight'); ?>
			<div class="input">
				<?= Form::select('weight', Input::post('weight', isset($link) ? $link->weight : ''), $weights, array('class' => 'span12')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?=Form::label('Описание', 'description'); ?>
			<div class="input">
				<?= Form::textarea('description', Input::post('description', isset($link) ? $link->description : ''), array('class' => 'span12', 'rows' => 12)); ?>
			</div>
		</div>	
		<div class="actions">
			<?= Form::submit('submit', 'Сохранить', array('class' => 'btn btn-primary btn-large')); ?>
		</div>
	</fieldset>
<?= Form::close(); ?>