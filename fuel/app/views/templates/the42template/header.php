<h1>
    <?= \Fuel\Core\Html::anchor("/", "42 Develipment Studio", array('class' =>'logo')); ?>
</h1>
<ul class="menu clearfix">
	<li>
		<?= Controller_Application::$current_page == "Home" ? \Fuel\Core\Html::anchor("/", "Home", array('class' => 'active')) :  \Fuel\Core\Html::anchor("/", "Home"); ?>
	</li>
	<li>
		<?= Controller_Application::$current_page == "About" ? \Fuel\Core\Html::anchor("hui", "About us", array('class' => 'active')) : \Fuel\Core\Html::anchor("hui", "About us"); ?>
	</li>
	<li>
		<?= Controller_Application::$current_page == "content" ? \Fuel\Core\Html::anchor("home/content", "Portfolio", array('class' => 'active')) : \Fuel\Core\Html::anchor("home/content", "Portfolio"); ?>
	</li>
	<li>
		<?= \Fuel\Core\Html::anchor("#", "Blog & News"); ?>
	</li>
	<li>
		<?= \Fuel\Core\Html::anchor("#", "Contact us"); ?>
	</li>
</ul>