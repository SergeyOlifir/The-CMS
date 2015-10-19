<div class="carusel-sm">
    <?= TCTheme::render('home/partials/gallery'); ?>
</div>
<div class="container">
    <? if($page->description !== ''): ?>
        <div class="page-descr-wrapp">
            <?= $page->description; ?>
        </div>
    <? endif; ?>
    <div class="row page-nav-wrapp">
        <div class="col-md-9">
            <ul class="nav nav-tabs">
                <li role="presentation" class="<?= !(isset($current_category_alias)) ? 'active' : '' ?>"><?= Fuel\Core\Html::anchor('/home/pages/view/'. $page->alias, 'Все статьи'); ?></li>
                <? foreach ($page->category as $category): ?>
                    <li role="presentation" class="<?= (isset($current_category_alias) and $current_category_alias === $category->alias) ? 'active' : '' ?>"><?= Fuel\Core\Html::anchor('/home/pages/view/' . $page->alias . '/' . $category->alias, $category->name) ;?></li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="col-md-3">
            
        </div>
    </div>
    
    <? if($content): ?>
        <? if(count($content) > 0): ?>
            <div class="row tiles">
                <div class="col-md-9">
                    <h2 class="pull-left"><?= $page->name; ?></h2>
                    <div class="pull-right pg-wrapp-top">
                        <?= $pagination; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="page-count">Количество страниц: <?= $total; ?></h5>
                </div>
            </div>
    
            <?= TCTheme::render("content/tiles", array('content' => $content, 'category' => $page, 'fool_view' => true)); ?>
            
            <div class="row tiles">
                <div class="col-md-9">
                    <div class="pull-right pg-wrapp-top">
                        <?= $pagination; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="page-count">Количество страниц: <?= $total; ?></h5>
                </div>
            </div>
        <? endif; ?>
    <? endif; ?> 
</div>
