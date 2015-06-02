
<section id="category" class="well">
    <header>
	 <h1><legend><?= __("edit.relations.title"); ?></legend></h1>
    </header>
    <p>
	<table class="table table-striped">
	    <thead>
		<tr>
		    <th><?= __("edit.relations.table.name"); ?></th>
		    <th><?= __("edit.relations.table.alias"); ?></th>
		    <th><?= __("edit.relations.table.actions"); ?></th>
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
				    <?= __("edit.relations.btn-group.title"); ?>
				    <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
				    <li><?= Html::anchor('admin/content/index/'.$related->id, __("edit.relations.btn-group.content"), array()); ?></li> 
				    <li><?= Html::anchor('admin/categories/edit/'.$related->id.'/1', __("edit.relations.btn-group.edit"), array()); ?> </li>
				    <li><?= Html::anchor("admin/pages/unset/{$page->id}/{$related->id}", __("edit.relations.btn-group.delete"), array('onclick' => "return confirm('Are you sure?')")); ?></li>
				</ul>
			    </div>
			</td>
		    </tr>
		<? endforeach; ?>	
	    </tbody>
	</table>
    </p>	
    <a href="#huiModal" role="button" class="btn" data-toggle="modal"><?= __("edit.relations.navbtn.add"); ?></a>
</section>

<div id="huiModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="huiModalLabel" aria-hidden="true">
    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="huiModalLabel"><?= __("edit.relations.add-category.title"); ?></h3>
    </div>
    <?= Form::open("admin/pages/set/{$page->id}"); ?>
	<div class="modal-body">
	    <p>
		<table class="table table-striped">
		    <thead>
			<tr>
			    <th></th>
			    <th><?= __("edit.relations.add-category.table.name"); ?></th>
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
	    <button class="btn" data-dismiss="modal" aria-hidden="true"><?= __("edit.relations.add-category.navbtn.close"); ?></button>
	    <?= Form::submit('submit', __("edit.relations.add-category.navbtn.save"), array('class' => 'btn btn-primary')); ?>
	</div>
    <?= Form::close(); ?>
</div>