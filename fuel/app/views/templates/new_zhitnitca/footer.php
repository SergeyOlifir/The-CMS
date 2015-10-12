<div class="posts-count-section">
    <div class="container">
        <h5>
            <?php 
                $count = (string)Model_Content::count();
                $str = strlen($count); 
            ?>
            <?php if ($str < 4): ?>
                <?php for($i = 0; $i < 4 - $str; $i++): ?>
                    <?php $count = "0" . $count;?>
                <?php endfor; ?>
            <?php endif; ?>
            <?php for($i = 0; $i < strlen($count); $i++): ?>
                <?php if(strlen($count) - $i > 3): ?>
                    <i class="th"><?php echo $count[$i]; ?></i>
                <?php else: ?>
                    <i><?php echo $count[$i]; ?></i>
                <?php endif; ?>
            <?php endfor; ?>
            <span>количество постов на сайте...</span>
        </h5>
    </div>
</div>


<nav class="clearfix">
    <div class="clearfix">
        <ul class="social clearfix left">
            <li>
                <a class="fb" target="_blank" href="http://vk.com/club87835656"></a>
            </li>
            <li>
                <a class="vk" target="_blank" href="https://www.facebook.com/groups/1468409396731180/"></a>
            </li>
        </ul>
        <a class="mail left" href="mailto:karuselkafest@mail.ru" target="_blank">karuselkafest@mail.ru</a>
        <ul class="footer-menu clearfix right">
            <li>
                <?= Controller_Application::$current_page == "Home" ? \Fuel\Core\Html::anchor("/", "Главная", array('class' => 'active')) :  \Fuel\Core\Html::anchor("/", "Главная"); ?>
            </li>
            <? $links = Model_Link::find_with_translitions(TCLocale::get_current_leng_id(), null, null, 'weight');?>
            <?php foreach ($links as $link): ?>
            <li>
            <? $utl = ($link->page_id) != -1 ?  Fuel\Core\Uri::base() . "home/pages/view/{$link->page->alias}/{$link->page->view_content}" : Fuel\Core\Uri::base() . $link->uri; ?>
            <?= \Fuel\Core\Html::anchor($utl, $link->name, array('class' => ($utl . '.html' == Controller_Application::$current_page) ? "active" : "")); ?>

            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a class="gorod-forum" href="http://forum.gorod.dp.ua/archive/index.php/t-323016-p-12.html" target="_blank"></a>
</nav>
