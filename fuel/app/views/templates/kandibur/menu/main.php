<? $curr_lang = TCLocale::get_current_leng_id(); ?>
<div class="main-menu-content">
	<?= TCTheme::render("menu/main_menu",array('links' => Model_Link::find_with_translitions_related_to_public($curr_lang))); ?>
</div>			
<div class="main-menu">
	<div class="center clearfix">
		<a class="mail left" target="_blank" href="mailto:O.Shkurchenko@i.ua">O.Shkurchenko@i.ua</a>
		<span><?= __("menu"); ?></span>
	</div>
</div>