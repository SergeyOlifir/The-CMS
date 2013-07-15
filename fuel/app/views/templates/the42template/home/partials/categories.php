<? if(isset($content)): ?>
    <section class='app-categories wrapper-padding'>
        <ul class="catergories-list clearfix">
            <? foreach($content as $category) { ?>
                <!--<li class="category left img-circle">
		    <?= \Fuel\Core\Html::anchor("/home/category/view/{$category->alias}", "", array('class' =>'image img-circle')); ?>
                    <h3><?= \Fuel\Core\Html::anchor("/home/category/view/{$category->alias}", $category->name, array('class' =>'name')); ?></h3>
                    <span class='description'>
                        <?= Str::truncate($category->header, 100, '...'); ?>
                    </span>
                </li>-->
                <li class="span3">
                    <div class="thumbnail">
                        <img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADICAYAAABS39xVAAAHGElEQVR4nO3bYWviWBuA4f3/P0UQQYQiggREpCBSpJQQRER8SwiSv/Dsh3Zs4rSzszvbnT6+14frw4TM6QHJzTnH+EfbtgGQwR+/ewIAP0uwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQLSEOwgDQEC0hDsIA0BAtIQ7CANAQL...yyqqIsyzh0XuS81pz2UZZlVFUZZXX4j8+DssyT/4JgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQhmABaQgWkIZgAWkIFpCGYAFpCBaQxp/ohWjNWxWVxwAAAABJRU5ErkJggg==">
                    </div>
                    <div class="caption">
                        <h3>
                            <?= \Fuel\Core\Html::anchor("/home/category/view/{$category->alias}", $category->name, array('class' =>'name')); ?>
                        </h3>
                        <p>
                            <?= Str::truncate($category->header, 100, '...'); ?>
                        </p>
                    </div>
                </li>
            <? } ?>
        </ul>
    </section>
<? endif;?>