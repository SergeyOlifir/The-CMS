<? if(isset($content)): ?>
    <section class='app-categories wrapper-padding'>
        <ul class="clearfix">
            <? foreach($content as $category) { ?>
                <li class="category left img-circle">
		    <?= \Fuel\Core\Html::anchor("/home/category/view/{$category->alias}", "", array('class' =>'image img-circle')); ?>
                    <h3><?= \Fuel\Core\Html::anchor("/home/category/view/{$category->alias}", $category->name, array('class' =>'name')); ?></h3>
                    <span class='description'>
                        <?= Str::truncate($category->header, 100, '...'); ?>
                    </span>
                </li>
            <? } ?>
        </ul>
    </section>
<? endif;?>