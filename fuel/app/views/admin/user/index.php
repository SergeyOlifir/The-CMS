<div class="row">
    <div class="span3">
	<ul class="nav nav-list well span2 affix">
	    <li class="active">
		<a href="#page-list">
		    Cписок подьзователей
		</a>
	    </li>
	</ul>
    </div>
    <div class="span9">
	<section id="page-list">
	    <h2>Список пользователей</h2>
	    <?php if ($users): ?>
		<table class="table table-striped">
		    <thead>
			<tr>
			    <th>Имя</th>
			    <th>Email</th>
			    <th>Роль</th>
			    <th>Дата регистрации</th>
			    <th>Действия</th>
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
					    Action
					    <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					    <li><?= Html::anchor('admin/user/delete/'.$user->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></li>
					    <li><?= Html::anchor('admin/user/group/'.$user->id . '/1', 'Бан', array('onclick' => "return confirm('Are you sure?')")); ?></li>
					    <li><?= Html::anchor('admin/user/group/'.$user->id . '/100', 'Админ', array('onclick' => "return confirm('Are you sure?')")); ?></li>
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