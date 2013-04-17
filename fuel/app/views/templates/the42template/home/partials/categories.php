<? if(isset($content)): ?>
    <div class='app-categories'>
        <ul>
            <? foreach($content as $category) { ?>
                <li class="category">
                    <a class="image"></a>
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