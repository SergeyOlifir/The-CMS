<? if(isset($content)): ?>
    <div class='app-categories clearfix wrapper-padding'>
        <ul>
            <? foreach($content as $category) { ?>
                <li class="category img-circle">
                    <?= \Fuel\Core\Html::anchor("/", "", array('class' =>'image img-circle')); ?>
                    <h3><?= \Fuel\Core\Html::anchor("/", $category->name, array('class' =>'name')); ?></h3>
                    <span class='description'>
                        <?= Str::truncate($category->header, 100, '...'); ?>
                    </span>
                </li>
            <? } ?>
        </ul>
    </div>
<? endif;?>