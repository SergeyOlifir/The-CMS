<? $locals = Model_Local::find('all'); ?>
<ul class="nav nav-tabs">
	<? foreach ($locals as $local): ?>
		<li class="<?= $local_id == $local->id ? 'active' : ''; ?>">
   			<?= Html::anchor($uri . '/'. $local->id, $local->name); ?>
		</li>
	<? endforeach; ?>
</ul>	