<div class="carusel-sm">
    <?= TCTheme::render('home/partials/gallery'); ?>
</div>
<div class="container">
    
    
    <? if($content): ?>
        <? if(count($content) > 0): ?>
            <div class="row tiles">
                <div class="col-md-9">
                    <h2 class="pull-left"><?= $category->name; ?></h2>
                    <div class="pull-right pg-wrapp-top">
                        <?= $pagination; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="page-count">Количество страниц: <?= $total; ?></h5>
                </div>
            </div>
    
            <?= TCTheme::render("content/tiles", array('content' => $content, 'page' => $category)); ?>
            
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

