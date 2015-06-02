<section class="projects wrapper-padding min-height clearfix">
    <? foreach ($content as $project): ?>
	<article class="project clearfix">
	    <div class="logo-wrapper left">
		<?= Html::img("files/{$project->logo->list}", array("alt" => $project['name'])); ?>
	    </div>
            <div class="white-block left">
                <header class="name">
                    <h1><?= \Fuel\Core\Html::anchor("/home/content/view/{$project['id']}", Str::truncate($project->name, 30, '...'), array('class' => 'project-link')); ?></h1>
                    <span><?= \Fuel\Core\Html::anchor("home/category/view/{$project['category']->alias}", $project['category']->name, array('class' => 'project-link')); ?></span>
                </header>
                <div class="description">
                    <?= Str::truncate($project['short_description'], 185, '...'); ?>
                </div>
	    </div>
	    <?= \Fuel\Core\Html::anchor("/home/content/view/{$project['id']}", "More", array('class' => 'more-link')); ?>
	</article>
    <? endforeach; ?>
</section>