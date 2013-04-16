<div class="projects clearfix">
	<? foreach ($content as $project): ?>
		<div class="project clearfix">
			<div class="logo-wrapper left">
				<?= Html::img("files/{$project['image']}"); ?>
			</div>
			<div class="name left">
				<h3><?= $project['name']; ?></h3>
				<p><?= \Fuel\Core\Html::anchor("portfolio/index/{$project['page']->alias}", $project['page']->name, array('class' => 'project-link')); ?></p>
			</div>
			<div class="description left">
				<?= $project['short_description']; ?>
			</div>
			<?= \Fuel\Core\Html::anchor("#", "More", array('class' => 'more-link')); ?>
		</div>
	<? endforeach; ?>
</div>