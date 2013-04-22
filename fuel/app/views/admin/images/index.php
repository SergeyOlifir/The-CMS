<h3>Галерея</h3>
<? if(count($content->images) < 1): ?>
	<p class="text-info text-center">Галерея пока пуста. Для добавления картинок нажмите кнопку добавить</p>
<? else: ?>
	<div class="clearfix">
		<div class="main-metro-wrapper clearfix">
			<? foreach ($content->images as $related): ?>
				<div class="tile left smoll content">
					<?= Html::img("files/{$related->thumb}"); ?>
					<div class="buttons-area clearfix">
						<a href="/admin/image/delete/<?=$related->id; ?>/<?= $content->page_id; ?>" class="delite-button right">Delete</a>
					</div>
				</div>
			<? endforeach; ?>
		</div>
	</div>
<? endif; ?>
	<?= Form::open(array('enctype'=>'multipart/form-data', 'action' => "admin/image/create/{$content->id}")); ?>
	<fieldset>
		<div class="clearfix">
			<?= Form::label('Изображение', 'image'); ?>
			<div class="input">
				<?= Form::file("image",array('class' => 'span12')); ?>
			</div>
		</div>
		<input type="submit" class="btn btn-large btn-info" value="Save" />
	</fieldset>
	<?= Fuel\Core\Form::close(); ?>