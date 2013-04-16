<div class="projects clearfix">
	<? foreach ($content as $project): ?>
		<div class="project clearfix">
			<div class="logo-wrapper left">
				<?= Html::img("files/{$project['image']}"); ?>
			</div>
			<div class="name left">
				<h3><?= \Fuel\Core\Html::anchor("/portfolio/project/view/{$project->id}", $project['name'], array('class' => 'project-link')); ?></h3>
				<p><?= \Fuel\Core\Html::anchor("home/category/view/{$project['page']->alias}", $project['page']->name, array('class' => 'project-link')); ?></p>
			</div>
			<div class="description left">
				<?= $project['short_description']; ?>
			</div>
			<?= \Fuel\Core\Html::anchor("#", "More", array('class' => 'more-link')); ?>
		</div>
	<? endforeach; ?>
</div>