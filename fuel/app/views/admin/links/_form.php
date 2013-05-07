<? $weights = array();
	for($i = 0; $i < 40; $i++) {
		$weights[$i] = $i;
	}
?>

<?= Form::open(array('enctype'=>'multipart/form-data', 'class' => 'content-form')); ?>
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
            
                <?= isset($link) ? $link->translition_form() : Model_Link::get_translition_form(); ?>
            
		<div class="clearfix">
			<div class="input">
				<?= Form::checkbox('public', 1, isset($link) && $link->public > 0 ? true : false);  ?>
				<?= Form::label('Публикация', 'public'); ?>
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
			
		<div class="actions">
			<?= Form::submit('submit', 'Сохранить', array('class' => 'btn btn-primary btn-large')); ?>
		</div>
	</fieldset>
<?= Form::close(); ?>