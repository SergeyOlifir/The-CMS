
<section class="well">
	<?= Form::label('Добавленные категории', 'related_content'); ?>
	<div class="main-metro-wrapper clearfix">
	    <p>
		<table class="table table-striped">
		    <thead>
			<tr>
			    <th>Имя</th>
			    <th>Алиас</th>
			    <th>Действия</th>
			</tr>
		    </thead>
		    <tbody>
			<? $related_contents = $page->category; ?>
			<? foreach ($related_contents as $related): ?>
			    <tr>
				<td><?= $related->name  ?></td>
				<td><?= $related->alias; ?></td>
				<td>
				    <div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					    Action
					    <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					    <li><?= Html::anchor('admin/content/index/'.$related->id, 'Контент', array()); ?></li> 
					    <li><?= Html::anchor('admin/categories/edit/'.$related->id.'/1', 'Edit', array()); ?> </li>
					    <li><?= Html::anchor("admin/pages/unset/{$page->id}/{$related->id}", 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></li>
					</ul>
				    </div>
				</td>
			    </tr>
			<? endforeach; ?>	
		    </tbody>
		</table>
	    </p>	
	</div>
    <a href="#huiModal" role="button" class="btn" data-toggle="modal">Добавить категорию</a>
</section>

<div id="huiModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="huiModalLabel" aria-hidden="true">
    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="huiModalLabel">Доступные категории</h3>
    </div>
    <?= Form::open("admin/pages/set/{$page->id}"); ?>
	<div class="modal-body">
	    <p>
		<table class="table table-striped">
		    <thead>
			<tr>
			    <th></th>
			    <th>Название</th>
			</tr>
		    </thead>
			<tbody>
			    <? $contents = $page->get_avalible_category(); ?>
			    <? foreach ($contents as $cont): ?>
				<tr>
				    <td><?= Form::checkbox('relations[]', $cont->id, false);  ?></td>
				    <td><?= $cont->name; ?></td>
				</tr>
			    <? endforeach; ?>	
			</tbody>
		    </table>
	    </p>
	</div>
	<div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	    <?= Form::submit('submit', 'Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>
    <?= Form::close(); ?>
</div>