<div class="main-menu-content">
	<?= render("templates/{$template}/menu/main_menu",array('links' => Model_Link::get_public())); ?>
</div>			
<div class="main-menu clearfix">
	<a class="mail left" target="_blank" href="mailto:ridnazhitnitsa@gmail.com">ridnazhitnitsa@gmail.com</a>
	<span>Меню</span>
	<ul class="flags right clearfix">
		<li><a href="#" class="ru">ru</a></li>
		<li><a href="#" class="uk">ua</a></li>
		<li><a href="#" class="en">en</a></li>
		<li><a href="#" class="de">en</a></li>
	</ul>
</div>