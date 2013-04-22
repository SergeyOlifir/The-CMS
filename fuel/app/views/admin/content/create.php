<? $locals = Model_Local::find('all'); ?>
<h2>Cоздание нового контента</h2>
<ul class="nav nav-tabs">
	<? foreach ($locals as $local): ?>
		<li class="<?= $curr_local == $local->id ? 'active' : ''; ?>">
   			<?= Html::anchor('admin/content/create/'.$page_id.'/'.$local->id, $local->name); ?>
		</li>
	<? endforeach; ?>
</ul>	
<?= render('admin/content/_form_create'); ?>