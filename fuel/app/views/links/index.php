<h2>Список ссылок в главном меню</h2>
<? if ($links): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Заголовок</th>
			<th>Страница</th>
			<th>Вес</th>
			<th>Публикация</th>
			<th>Действия</th>
		</tr>
	</thead>
	<tbody>
	<? foreach ($links as $link): ?>		
		<tr>
			<td><?= $link->name; ?></td>
			<td><?= $link->page->name; ?></td>
			<td><?= $link->weight; ?></td>
			<td><?= $link->public; ?></td>
			<td>
				<?= Html::anchor('links/edit/'.$link->id, 'Edit', array("class" => "edit-button")); ?> 
				<?= Html::anchor('links/delete/'.$link->id, 'Delete', array('onclick' => "return confirm('Are you sure?')", "class" => "delite-button")); ?>
			</td>
		</tr>
	<? endforeach; ?>
	</tbody>
</table>

<? else: ?>
	<h2>Ссылок в главном меню пока нет</h2>
<?php endif; ?><p>
	