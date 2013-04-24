<? $locals = Model_Local::find('all'); ?>
<h2>Редактирование контента (<?= Model_Local::find($curr_local)->name; ?>)</h2>
<ul class="nav nav-tabs">
	<? foreach ($locals as $local): ?>
		<li class="<?= $curr_local == $local->id ? 'active' : ''; ?>">
   			<?= Html::anchor('admin/content/edit/'.$id.'/'.$local->id, $local->name); ?>
		</li>
	<? endforeach; ?>
</ul>
<? $data['local_id'] = $curr_local; ?>
<?= render('admin/content/_form', $data); ?>
<?= render('admin/content/relations'); ?>