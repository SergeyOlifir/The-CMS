<div class="row">
	<div class="span3">
		<ul class="nav nav-list well span2 affix">
			<li class="active">
				<a href="#page-list">
					Cписок Ссылок
				</a>
			</li>
			<li>
				<a href="/admin/links/create/1">
					Добавить ссылку
				</a>
			</li>
		</ul>
	</div>
	<div class="span9">
		<section id="page-list">
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
                                            <td><?= $link->page_id == -1 ? Fuel\Core\Uri::base() . $link->uri : $link->page->name; ?></td>
                                            <td><?= $link->weight; ?></td>
                                            <td><?= $link->public; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                        Action
                                                        <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu"> 
                                                        <li><?= Html::anchor('admin/links/edit/'.$link->id.'/1', 'Edit', array()); ?>  </li>
                                                        <li><?= Html::anchor('admin/links/delete/'.$link->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></li>
                                                    </ul>
                                                </div>
                                                   
                                            </td>
                                    </tr>
                            <? endforeach; ?>
                            </tbody>
                    </table>

                    <? else: ?>
                            <h2>Ссылок в главном меню пока нет</h2>
                    <?php endif; ?>
                </section>
	</div>
</div>
	