<h2>Список созданных страниц</h2>
<?php if ($pages): ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Название</th>
				<th>Alias</th>
				<th>Дата создания</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pages as $page): ?>		
				<tr>
					<td><?= $page->name; ?></td>
					<td><?= $page->alias; ?></td>
					<td><?= Date::forge($page->created_at)->format("%d.%m.%Y", true); ?></td>
					<td>
						<?= Html::anchor('content/index/'.$page->id, 'View', array("class" => "view-button")); ?> 
						<?= Html::anchor('pages/edit/'.$page->id, 'Edit', array("class" => "edit-button")); ?> 
						<?= Html::anchor('pages/delete/'.$page->id, 'Delete', array("class" => "delite-button", 'onclick' => "return confirm('Are you sure?')")); ?>
					</td>
				</tr>
			<?php endforeach; ?>	
		</tbody>
	</table>
<?php else: ?>
	<p>No Pages.</p>
<?php endif; ?>
