<div class="row">
	<div class="span3">
		<ul class="nav nav-list well span2 affix">
			<li class="active">
				<a href="#page-list">
					<?= __("index.navlist.list"); ?>
				</a>
			</li>
			<li>
				<a href="/admin/pages/create/1">
					<?= __("index.navlist.add"); ?>
				</a>
			</li>
		</ul>
	</div>
	<div class="span9">
		<section id="page-list">
			<h2><?= __("index.page-list.title"); ?></h2>
			<?php if ($pages): ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th><?= __("index.page-list.table.name"); ?></th>
							<th><?= __("index.page-list.table.alias"); ?></th>
							<th><?= __("index.page-list.table.date_create"); ?></th>
							<th><?= __("index.page-list.table.actions"); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pages as $page): ?>		
							<tr>
								<td><?= $page->name; ?></td>
								<td><?= $page->alias; ?></td>
								<td><?= Date::forge($page->created_at)->format("%d.%m.%Y", true); ?></td>
								<td>
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
											<?= __("index.page-list.btn-group.title"); ?>
											<span class="caret"></span>
										</a>
											<ul class="dropdown-menu">
												<li><?= Html::anchor('admin/pages/index/'.$page->id, __("index.page-list.btn-group.view"), array()); ?></li> 
												<li><?= Html::anchor('admin/pages/edit/'.$page->id.'/1', __("index.page-list.btn-group.edit"), array()); ?> </li>
												<li><?= Html::anchor('admin/pages/delete/'.$page->id, __("index.page-list.btn-group.delete"), array('onclick' => "return confirm('Are you sure?')")); ?></li>
											</ul>
									</div>
									
								</td>
							</tr>
						<?php endforeach; ?>	
					</tbody>
				</table>
			<?php else: ?>
				<p><?= __("index.page-list.null"); ?></p>
			<?php endif; ?>
		</section>
	</div>
</div>