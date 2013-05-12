<div class="span3">
    <ul class="nav nav-list well span2 affix" id="scroll" >
	<li>
	    <a href="#edit">
		Редактирование контета
	    </a>
	</li>
	<li>
	    <a href="#related">
		Связанный контент
	    </a>
	</li>
	<li>
	    <a href="#galery">
		Галерея
	    </a>
	</li>
    </ul>
</div>
<div class="span9">
    <?= Model_Translition::get_langvige_tabs($curr_local); ?>
    <? $data['local_id'] = $curr_local; ?>
    <?= render('admin/content/_form', $data); ?>
    <?= render('admin/content/relations'); ?>
    <?= render('admin/images/index', array('locale' => $curr_local)); ?>
</div>