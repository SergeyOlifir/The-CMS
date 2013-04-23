<div class="projects wrapper-padding clearfix">
	<? foreach ($content as $project): ?>
		<? $translitions = $project->get_translation(1); ?>
		<div class="project tile left">
			<div class="logo-wrapper">
				<?= Html::img("files/{$project['image']}", array("alt" => $project['name'])); ?>
			</div>
			<div class="name">
				<h3><?= \Fuel\Core\Html::anchor("/home/content/view/{$project['id']}", $project['name'], array('class' => 'project-link')); ?></h3>
				<p><?= \Fuel\Core\Html::anchor("home/category/view/{$project['page']->alias}", $project['page']->name, array('class' => 'project-link')); ?></p>
			</div>
			<?= \Fuel\Core\Html::anchor("/home/content/view/{$project['id']}", "More", array('class' => 'more-link')); ?>
		</div>
	<? endforeach; ?>
</div>