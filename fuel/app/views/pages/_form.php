
<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Имя страницы', 'name'); ?>
			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($page) ? $page->name : ''), array('class' => 'span12')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Alias', 'alias'); ?>
			<div class="input">
				<?php echo Form::textarea('alias', Input::post('alias', isset($page) ? $page->alias : ''), array('class' => 'span12', 'rows' => 12)); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Заголовок', 'header'); ?>
			<div class="input">
				<?php echo Form::textarea('header', Input::post('header', isset($page) ? $page->header : ''), array('class' => 'span12', 'rows' => 12)); ?>
			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Сохранить', array('class' => 'btn btn-primary btn-large')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>