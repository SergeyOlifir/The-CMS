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
    <a class="gorod-forum" href="http://gorod.dp.ua/"></a>
</nav>
