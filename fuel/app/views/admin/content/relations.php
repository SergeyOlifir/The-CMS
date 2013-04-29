
<div class="clearfix">
	<?= Form::label('Привязанный контент', 'related_content'); ?>
	<? $related_contents = $content->related_content; ?>
	<?php if ($related_contents): ?>
		<div class="main-metro-wrapper clearfix">
			<ul class="thumbnails">
				<? foreach ($related_contents as $related): ?>
					<li class="span3">
						<div  class="thumbnail">
							<?= Html::img("files/{$related->image}", array('class' => 'img-polaroid')); ?>
							<div class="caption">
								<h3><?= ""; //$related->name; ?></h3>
							</div>
							<p>
								<a class="btn btn-primary" href="/admin/content/edit/<?=$related->id; ?>/1">Редактировать</a>
								<a class="btn btn-danger" href="/admin/content/unset/<?=$content->id; ?>/<?=$related->id; ?>">Удалить</a>
							</p>
						</div>
					</li>
				<? endforeach; ?>
			</ul>
		</div>
	<?php else: ?>
		<p>Привязанного контента пока нет.</p>
	<?php endif; ?>
	<?= Html::anchor("#add_poup", 'Добавить связанный контент', array('class' => 'btn btn-primary btn-large', 'data-reveal-id' => "add_poup")); ?>
</div>


<div id="add_poup" class="reveal-modal">
	<div class="popup-content scroll-news-index">
		<?= Form::open("admin/content/set/{$content->id}"); ?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th></th>
						<th>Название</th>
						<th>Страница</th>
					</tr>
				</thead>
				<tbody>
					<? $contents = Model_Content::find('all'); ?>
					<? foreach ($contents as $cont): ?>
						<? if(!in_array($cont, $related_contents) && $content->id != $cont->id) : ?>
							<tr>
								<td><?= Form::checkbox('relations[]', $cont->id, false);  ?></td>
								<td><?= $cont->name; ?></td>
								<td><?= $cont->page['name']; ?></td>
							</tr>
						<? endif; ?>
					<? endforeach; ?>	
				</tbody>
			</table>
			<div class="actions">
				<?= Form::submit('submit', 'Сохранить', array('class' => 'btn btn-primary btn-large')); ?>
			</div>
		<?= Form::close(); ?>
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>