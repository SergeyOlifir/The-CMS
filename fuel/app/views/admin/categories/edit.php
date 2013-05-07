<? $locals = Model_Local::find('all'); ?>
<h2>Редактирование страницы <?= $page->name; ?></h2>
<ul class="nav nav-tabs">
	<? foreach ($locals as $local): ?>
		<li class="<?= $curr_local == $local->id ? 'active' : ''; ?>">
   			<?= Html::anchor('admin/categories/edit/'.$id.'/'.$local->id, $local->name); ?>
		</li>
	<? endforeach; ?>
</ul>
<?php echo render('admin/categories/_form'); ?>
