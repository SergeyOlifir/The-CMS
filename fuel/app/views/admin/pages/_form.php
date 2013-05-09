<section class="well">
    <?php echo Form::open(); ?>
	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Alias', 'alias'); ?>
			<div class="input">
				<?php echo Form::input('alias', Input::post('alias', isset($page) ? $page->alias : ''), array('class' => 'span12', 'rows' => 12)); ?>
			</div>
		</div>

		<?= isset($page) ? $page->translition_form() : Model_Page::get_translition_form(); ?>


		<div class="input">
			<?= Form::checkbox('publish_date', 1, isset($page) && $page->publish_date > 0 ? true : false);  ?>
			<?= Form::label('Отображать дату контента', 'public_data'); ?>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Сохранить', array('class' => 'btn btn-primary btn-large')); ?>
		</div>
	</fieldset>
    <?php echo Form::close(); ?>
</section>