<? $curr_lang = TCLocale::get_current_leng_id(); ?>
<div class="main-menu-content">
	<?= TCTheme::render("menu/main_menu",array('links' => Model_Link::find_with_translitions_related_to_public($curr_lang))); ?>
</div>			
<div class="main-menu clearfix">
	<a class="mail left" target="_blank" href="#">Mail</a>
	<span><?= __("menu"); ?></span>
	<ul class="flags right clearfix">
		<li><a href="<?= \Uri::base(false);?>lang/index/ru" class="ru">ru</a></li>
		<li><a href="<?= \Uri::base(false);?>lang/index/uk" class="uk">ua</a></li>
	</ul>
</div>