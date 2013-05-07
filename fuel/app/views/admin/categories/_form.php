
<?php echo Form::open(); ?>
	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Alias', 'alias'); ?>
			<div class="input">
				<?php echo Form::input('alias', Input::post('alias', isset($page) ? $page->alias : ''), array('class' => 'span12', 'rows' => 12)); ?>
			</div>
		</div>
		
                <?= isset($page) ? $page->translition_form() : Model_Category::get_translition_form(); ?>
            
		<div class="clearfix">
			<?php echo Form::label('Вид отображения контента:', 'view_content'); ?>
			<div class="input">
				<?= Form::radio('view_content', 'list', isset($page) && $page->view_content == 'list' ? true : false); ?>
				<?= Form::label('Список (list)', 'view_content'); ?>
				<?= Form::radio('view_content', 'tile', isset($page) && $page->view_content == 'tile' ? true : false); ?>
				<?= Form::label('Плитка (tile)', 'view_content'); ?>
			</div>
		</div>
		<div class="clearfix">
			<div class="input">
				<?= Form::checkbox('public_data', 1, isset($page) && $page->public_data > 0 ? true : false);  ?>
				<?= Form::label('Отображать дату контента', 'public_data'); ?>
			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Сохранить', array('class' => 'btn btn-primary btn-large')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>