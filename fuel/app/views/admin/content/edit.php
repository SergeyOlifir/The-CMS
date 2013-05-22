<div class="span3">
    <ul class="nav nav-list well span2 affix" id="scroll" >
	<li>
	    <a href="#edit">
			<?= __("edit.navlist.edit"); ?>
	    </a>
	</li>
	<li>
	    <a href="#related">
			<?= __("edit.navlist.related"); ?>
	    </a>
	</li>
	<li>
	    <a href="#galery">
			<?= __("edit.navlist.galery"); ?>
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