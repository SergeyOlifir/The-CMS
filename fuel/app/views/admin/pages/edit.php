<? $locals = Model_Local::find('all'); ?>
<h2>Редактирование страницы <?= $page->name; ?></h2>
<?= Model_Translition::get_langvige_tabs($curr_local); ?>
<?php echo render('admin/pages/_form'); ?>
<?= render('admin/pages/relations'); ?>
