<section class="projects clearfix app-categories left">
    <header class="name clearfix">
        <h1 class="left"><?= $page->header; ?></h1>
        <?= \Fuel\Core\Html::anchor("home/content/change/tile/{$page->alias}", "Tile", array('class' => 'tile left')); ?>
        <?= \Fuel\Core\Html::anchor("home/content/change/list/{$page->alias}", "List", array('class' => 'list left')); ?>
    </header>
    <ul class="clearfix">
    	<? foreach ($content as $project): ?>
            <li class="category left">
                <a href="/home/content/view/<?= $project->id; ?>">
                    <article>
                        <div class="img-wrapper">
                            <?= Html::img("files/{$project->image}"); ?>
                        </div>
                        <header class="description">
                            <h1>
                                <?= Str::truncate($project->name, 30, '...'); ?>
                            </h1>
                        </header>
                    </article>
                </a>
            </li>
        <? endforeach; ?>
    </ul>
</section>
