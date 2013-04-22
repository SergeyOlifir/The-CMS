<div class="row">
	<div class="span3">
		<ul class="nav nav-list well span2 affix">
			<li class="active">
				<a href="#page-list">
					Cписок страниц
				</a>
			</li>
			<li>
				<a href="/admin/pages/create">
					Добавить страницу
				</a>
			</li>
		</ul>
	</div>
	<div class="span9">
		<section id="page-list">
			<h2>Список созданных страниц</h2>
			<?php if ($pages): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Название</th>
							<th>Alias</th>
							<th>Дата создания</th>
							<th>Дата контента</th>
							<th>Вид контента</th>
							<th>Действия</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pages as $page): ?>		
							<tr>
								<td><?= $page->name; ?></td>
								<td><?= $page->alias; ?></td>
								<td><?= Date::forge($page->created_at)->format("%d.%m.%Y", true); ?></td>
								<th><?= $page->public_data == 1 ? '+' : '-'; ?></th>
								<td><?= $page->view_content; ?></td>
								<td>
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
											Action
											<span class="caret"></span>
										</a>
											<ul class="dropdown-menu">
												<li><?= Html::anchor('admin/content/index/'.$page->id, 'View', array()); ?></li> 
												<li><?= Html::anchor('admin/pages/edit/'.$page->id, 'Edit', array()); ?> </li>
												<li><?= Html::anchor('admin/pages/delete/'.$page->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></li>
											</ul>
									</div>
									
								</td>
							</tr>
						<?php endforeach; ?>	
					</tbody>
				</table>
			<?php else: ?>
				<p>No Pages.</p>
			<?php endif; ?>
		</section>
	</div>
</div>