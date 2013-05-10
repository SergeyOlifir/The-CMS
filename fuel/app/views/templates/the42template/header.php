<nav class="all-wrapper clearfix">
    <h1>
        <?= \Fuel\Core\Html::anchor("/", "42 Development Studio", array('class' =>'logo')); ?>
    </h1>
    <ul class="menu clearfix">
        <li>
            <?= Controller_Application::$current_page == "Home" ? \Fuel\Core\Html::anchor("/", "Главная", array('class' => 'active')) :  \Fuel\Core\Html::anchor("/", "Главная"); ?>
        </li>
        <? $links = Model_Link::find_with_translitions(TCLocale::get_current_leng_id(), null, null, 'weight');?>
        <?php foreach ($links as $link): ?>
        <li>
	    <? $utl = ($link->page_id) != -1 ?  Fuel\Core\Uri::base() . "home/pages/view/{$link->page->alias}" : Fuel\Core\Uri::base() . $link->uri; ?>
	    <?= \Fuel\Core\Html::anchor($utl, $link->name, array('class' => ($utl . '.html' == Controller_Application::$current_page) ? "active" : "")); ?>

	</li>
        <?php endforeach; ?>
    </ul>
</nav>
