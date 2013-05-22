<div class="row">
    <div class="span3">
	<ul class="nav nav-list well span2 affix">
	    <li class="active">
		<a href="#page-list">
		    <?= __("index.navlist.list"); ?>
		</a>
	    </li>
	</ul>
    </div>
    <div class="span9">
	<section id="page-list">
	    <h2><?= __("index.page-list.title"); ?></h2>
	    <?php if ($users): ?>
		<table class="table table-striped">
		    <thead>
			<tr>
			    <th><?= __("index.page-list.table.name"); ?></th>
			    <th><?= __("index.page-list.table.email"); ?></th>
			    <th><?= __("index.page-list.table.role"); ?></th>
			    <th><?= __("index.page-list.table.date_registration"); ?></th>
			    <th><?= __("index.page-list.table.actions"); ?></th>
			</tr>
		    </thead>
		    <tbody>
			<?php foreach ($users as $user): ?>		
			    <tr>
				<td><?= $user->username; ?></td>
				<td><?= $user->email; ?></td>
				<td><?= $user->group; ?></td>
				<td><?= Date::forge($user->created_at)->format("%d.%m.%Y", true); ?></td>
				<td>
				    <div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					    <?= __("index.page-list.btn-group.title"); ?>
					    <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					    <li><?= Html::anchor('admin/user/delete/'.$user->id, __("index.page-list.btn-group.delete"), array('onclick' => "return confirm('Are you sure?')")); ?></li>
					    <li><?= Html::anchor('admin/user/group/'.$user->id . '/1', __("index.page-list.btn-group.ban"), array('onclick' => "return confirm('Are you sure?')")); ?></li>
					    <li><?= Html::anchor('admin/user/group/'.$user->id . '/100', __("index.page-list.btn-group.admin"), array('onclick' => "return confirm('Are you sure?')")); ?></li>
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