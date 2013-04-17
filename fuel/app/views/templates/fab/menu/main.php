<div class="main-menu-content">
	<?= render("templates/{$template}/menu/main_menu",array('links' => Model_Link::get_public())); ?>
</div>			
<div class="main-menu clearfix">
	<a class="mail left" target="_blank" href="#">Mail</a>
	<span><?= __("menu"); ?></span>
	<ul class="flags right clearfix">
		<li><a href="<?= \Uri::base(false);?>lang/index/ru" class="ru">ru</a></li>
		<li><a href="<?= \Uri::base(false);?>lang/index/uk" class="uk">ua</a></li>
		<li><a href="<?= \Uri::base(false);?>lang/index/en" class="en">en</a></li>
		<li><a href="<?= \Uri::base(false);?>lang/index/de" class="de">de</a></li>
	</ul>
</div>