<div class="content-arrow left-arrow">
	<ul class="right">
		<li><a class="indicator-main" href="#2"></a></li>
		<? $link_kount = 0; ?>
		<? foreach ($links as $link): ?>
			<? if($link_kount < 5): ?>
				<? $link_kount++; ?>
				<li><a class="indicator" href="#<?= $link->page->alias; ?>"><?= Html::img("files/{$link->image}"); ?></a></li>
			<? endif; ?>
		<? endforeach; ?>
	</ul>
</div>
<div class="content-arrow right-arrow">
	<ul class="left">
		<? $link_kount = 0; ?>
		<? foreach ($links as $link): ?>
			<? if($link_kount >= 6): ?>
				<li><a class="indicator" href="#<?= $link->page->alias; ?>"><?= Html::img("files/{$link->image}"); ?></a></li>
			<? endif; ?>
			<? $link_kount++; ?>
		<? endforeach; ?>
	</ul>
</div>