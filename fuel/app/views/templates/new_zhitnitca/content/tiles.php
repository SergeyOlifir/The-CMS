<section class="projects clearfix app-categories left">
    <!---<ul class="clearfix">
    	<? foreach ($content as $project): ?>
            <li class="category left">
                <a href="/home/content/view/<?= $project->id; ?>">
                    <article>
                        <div class="img-wrapper">
                            <?= Html::img("files/{$project->logo->tile}"); ?>
                        </div>
                        <div class="description">
                            <header>
                                <h1>
                                    <?= Str::truncate($project->name, 30, '...'); ?>
                                </h1>
                            </header>
                            <? if ($project->category->public_data == 1): ?>
                                <div class="date">
                                    <?= Date::forge($project->date_create)->format("%d.%m.%y", true); ?>
                                </div>
                            <? endif; ?>
                        </div>
                    </article>
                </a>
            </li>
        <? endforeach; ?>
    </ul>-->
    
    
    <div class="row tiles">
        <? foreach ($content as $project): ?>
            <div class="col-md-3 col-xs-6 item">
                <a href="/home/content/view/<?= $project->id; ?>">
                    <article>
                            <div class="img-wrapper">
                                <?= Html::img("files/{$project->logo->tile}"); ?>
                            </div>
                            <div class="description">
                                <header>
                                    <h1>
                                        <?= Str::truncate($project->name, 30, '...'); ?>
                                    </h1>
                                </header>
                            </div>
                    </article>
                </a>
            </div>
        <? endforeach; ?>
    </div>
</section>
