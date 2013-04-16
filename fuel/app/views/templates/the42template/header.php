<h1 class="logo">
	42 Develipment Studio
</h1>
<ul class="menu clearfix">
	<li>
		<?= Controller_Application::$current_page == "Home" ? \Fuel\Core\Html::anchor("/", "Home", array('class' => 'active')) :  \Fuel\Core\Html::anchor("/", "Home"); ?>
	</li>
	<li>
		<?= Controller_Application::$current_page == "About" ? \Fuel\Core\Html::anchor("hui", "About us", array('class' => 'active')) : \Fuel\Core\Html::anchor("hui", "About us"); ?>
	</li>
	<li>
		<?= Controller_Application::$current_page == "Portfolio" ? \Fuel\Core\Html::anchor("portfolio", "Portfolio", array('class' => 'active')) : \Fuel\Core\Html::anchor("portfolio", "Portfolio"); ?>
	</li>
	<li>
		<?= \Fuel\Core\Html::anchor("hui", "Blog & News"); ?>
	</li>
	<li>
		<?= \Fuel\Core\Html::anchor("hui", "Contact us"); ?>
	</li>
</ul>