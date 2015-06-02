<section class="projects wrapper-padding min-height clearfix">
    <? foreach ($content as $project): ?>
	<article class="project tile left">
	    <div class="logo-wrapper">
		<?= Html::img("files/{$project->logo->tile}", array("alt" => $project['name'])); ?>
	    </div>
	    <header class="name">			
		<h1><?= \Fuel\Core\Html::anchor("/home/content/view/{$project['id']}", Str::truncate($project['name'], 10, '...'), array('class' => 'project-link')); ?></h1>
		<p><?= \Fuel\Core\Html::anchor("home/category/view/{$project['category']->alias}", $project['category']->name, array('class' => 'project-link')); ?></p>
	    </header>
	    <?= \Fuel\Core\Html::anchor("/home/content/view/{$project['id']}", "More", array('class' => 'more-link')); ?>
	</article>
    <? endforeach; ?>
</section>