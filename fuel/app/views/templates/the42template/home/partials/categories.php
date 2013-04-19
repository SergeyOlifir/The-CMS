<? if(isset($content)): ?>
    <div class='app-categories clearfix'>
        <ul>
            <? foreach($content as $category) { ?>
                <li class="category img-circle">
                    <a class="image img-circle"></a>
                    <a class="name">
                        <?= $category->name; ?>
                    </a>
                    <span class='description'>
                        <?= $category->header; ?>
                    </span>
                </li>
            <? } ?>
        </ul>
    </div>
<? endif;?>