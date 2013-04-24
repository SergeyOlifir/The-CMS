<? $locals = Model_Local::find('all'); ?>
<h2>Создание новой страницы</h2>
<ul class="nav nav-tabs">
	<? foreach ($locals as $local): ?>
		<li class="<?= $curr_local == $local->id ? 'active' : ''; ?>">
   			<?= Html::anchor('admin/pages/create/'.$local->id, $local->name); ?>
		</li>
	<? endforeach; ?>
</ul>	
<?php echo render('admin/pages/_form'); ?>