<? $locals = Model_Local::find('all'); ?>
<h2>Редактирование ссылки для страницы <?= $link->page->name; ?> (<?= Model_Local::find($curr_local)->name; ?>)</h2>
<ul class="nav nav-tabs">
	<? foreach ($locals as $local): ?>
		<li class="<?= $curr_local == $local->id ? 'active' : ''; ?>">
   			<?= Html::anchor('admin/links/edit/'.$id.'/'.$local->id, $local->name); ?>
		</li>
	<? endforeach; ?>
</ul>
<? $data['local_id'] = $curr_local; ?>
<?= render('admin/links/_form', $data); ?>