<section class="projects wrapper-padding min-height clearfix">
    <? foreach ($content as $project): ?>
	<article class="project clearfix">
	    <div class="logo-wrapper left">
		<?= Html::img("files/{$project['image']}", array("alt" => $project['name'])); ?>
	    </div>
            <div class="white-block left clearfix">
                <header class="name left">
                    <h1><?= \Fuel\Core\Html::anchor("/home/content/view/{$project['id']}", $project->name, array('class' => 'project-link')); ?></h1>
                    <p><?= \Fuel\Core\Html::anchor("home/category/view/{$project['category']->alias}", $project['category']->name, array('class' => 'project-link')); ?></p>
                </header>
                <div class="description left">
                    <?= Str::truncate($project['short_description'], 185, '...'); ?>
                </div>
	    </div>
	    <?= \Fuel\Core\Html::anchor("/home/content/view/{$project['id']}", "More", array('class' => 'more-link')); ?>
	</article>
    <? endforeach; ?>
</section>