<section class="projects wrapper-padding clearfix">
    <header class="name clearfix">
        <h1 class="left"><?= $page->header; ?></h1>
        <?= \Fuel\Core\Html::anchor("home/content/change/tile/{$page->alias}", "Tile", array('class' => 'tile left')); ?>
        <?= \Fuel\Core\Html::anchor("home/content/change/list/{$page->alias}", "List", array('class' => 'list left')); ?>
    </header>
    <? foreach ($content as $project): ?>
        <article class="project clearfix">
            <div class="logo-wrapper left">
                <?= Html::img("files/{$project['image']}"); ?>
            </div>
            <div class="white-block left clearfix">
                <header>
                    <h1><?= $project['name']; ?></h1>
                </header>
                <div class="description">
                    <?= Str::truncate($project['description'], 310, '...'); ?>
                </div>
            </div>
            <?= \Fuel\Core\Html::anchor("/home/content/view/{$project->id}", $project['name'], array('class' => 'more-link')); ?>
        </article>
    <? endforeach; ?>
</section>
