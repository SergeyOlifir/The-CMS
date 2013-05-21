<? if($page->description !== null): ?>
    <?= $page->description; ?>
<? endif; ?>
<? if($page->content): ?>
    <? if(count($page->content) > 0): ?>
	<section class="projects wrapper-padding clearfix">
	    <header>
		<h1><legend>Похожие проекты</legend></h1>
	    </header>
	    <? foreach ($page->content as $project): ?>
		<article class="project tile left">
		    <div class="logo-wrapper">
			<?= Html::img("files/{$project['image']}"); ?>
		    </div>
		    <header class="name">
			<h1><?= \Fuel\Core\Html::anchor("/home/content/view/{$project->id}", $project['name'], array('class' => 'project-link')); ?></h1>
			<p><?= \Fuel\Core\Html::anchor("home/category/view/{$project['page']->alias}", $project['page']->name, array('class' => 'project-link')); ?></p>
		    </header>
		    <?= \Fuel\Core\Html::anchor("#", "More", array('class' => 'more-link')); ?>
		</article>
	    <? endforeach; ?>
	</section>
    <? endif; ?>
<? endif; ?>
