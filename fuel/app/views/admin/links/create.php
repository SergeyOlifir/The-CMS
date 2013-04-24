<? $locals = Model_Local::find('all'); ?>
<h2>Создание новой ссылки в главном меню</h2>
<ul class="nav nav-tabs">
	<? foreach ($locals as $local): ?>
		<li class="<?= $curr_local == $local->id ? 'active' : ''; ?>">
   			<?= Html::anchor('admin/links/create/'.$local->id, $local->name); ?>
		</li>
	<? endforeach; ?>
</ul>	
<?= render('admin/links/_form'); ?>
