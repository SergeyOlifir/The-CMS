<nav class="all-wrapper clearfix">
    <h1>
        <?= \Fuel\Core\Html::anchor("/", "42 Development Studio", array('class' =>'logo')); ?>
    </h1>
    <ul class="menu clearfix">
        <li>
            <?= Controller_Application::$current_page == "Home" ? \Fuel\Core\Html::anchor("/", "Home", array('class' => 'active')) :  \Fuel\Core\Html::anchor("/", "Home"); ?>
        </li>
        <? $links = Model_Link::find_with_translitions(TCLocale::get_current_leng_id(), null, null, 'weight');?>
        <?php foreach ($links as $link): ?>
        <li>
	    <?= \Fuel\Core\Html::anchor(($link->page_id) != -1 ? "home/pages/view/{$link->page->alias}" : Fuel\Core\Uri::base() . $link->uri, $link->name, array('class' => ($link->name == Controller_Application::$current_page or ($link->page_id != -1 and Controller_Application::$current_page == $link->page->name )) ? "active" : "")); ?>
	</li>
        <?php endforeach; ?>
    </ul>
</nav>
