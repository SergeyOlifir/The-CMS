<div class="span3">
    <ul class="nav nav-list well span2 affix" id="scroll" >
	<li>
	    <a href="#edit">
		Создание страници
	    </a>
	</li>
    </ul>
</div>
<div class="span9">
    <?= Model_Translition::get_langvige_tabs($curr_local); ?>
    <?= render('admin/pages/_form'); ?>
</div>
