<!--<nav class="clearfix">
    <h1 class="left">
        <?= \Fuel\Core\Html::anchor("/", "", array('class' =>'logo')); ?>
    </h1>
    <ul class="menu left clearfix">
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
</nav>-->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>