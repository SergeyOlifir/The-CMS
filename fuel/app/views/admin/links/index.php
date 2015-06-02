<div class="row">
	<div class="span3">
		<ul class="nav nav-list well span2 affix">
			<li class="active">
				<a href="#page-list">
					<?= __("index.navlist.list"); ?>
				</a>
			</li>
			<li>
				<a href="/admin/links/create/1">
					<?= __("index.navlist.add"); ?>
				</a>
			</li>
		</ul>
	</div>
	<div class="span9">
		<section id="page-list">
                    <h2><?= __("index.page-list.title"); ?></h2>
                    <? if ($links): ?>
                    <table class="table table-striped">
                            <thead>
                                    <tr>
                                            <th><?= __("index.page-list.table.name"); ?></th>
                                            <th><?= __("index.page-list.table.page"); ?></th>
                                            <th><?= __("index.page-list.table.weight"); ?></th>
                                            <th><?= __("index.page-list.table.publication"); ?></th>
                                            <th><?= __("index.page-list.table.actions"); ?></th>
                                    </tr>
                            </thead>
                            <tbody>
                            <? foreach ($links as $link): ?>		
                                    <tr>
                                            <td><?= $link->name; ?></td>
                                            <td><?= $link->page_id == -1 ? Fuel\Core\Uri::base() . $link->uri : $link->page->name; ?></td>
                                            <td><?= $link->weight; ?></td>
                                            <td><?= $link->public; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                        <?= __("index.page-list.btn-group.title"); ?>
                                                        <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu"> 
                                                        <li><?= Html::anchor('admin/links/edit/'.$link->id.'/1', __("index.page-list.btn-group.edit"), array()); ?>  </li>
                                                        <li><?= Html::anchor('admin/links/delete/'.$link->id, __("index.page-list.btn-group.delete"), array('onclick' => "return confirm('Are you sure?')")); ?></li>
                                                    </ul>
                                                </div>
                                                   
                                            </td>
                                    </tr>
                            <? endforeach; ?>
                            </tbody>
                    </table>

                    <? else: ?>
                            <h2><?= __("index.page-list.null"); ?></h2>
                    <? endif; ?>
                </section>
	</div>
</div>
	