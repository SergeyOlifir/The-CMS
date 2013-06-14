<h2> <?= __("view.title"); ?> #<?php echo $content->id; ?></h2>

<p>
	<strong><?= __("view.name"); ?></strong>
	<?php echo $localcontent->name; ?></p>
<p>
	<strong><?= __("view.description"); ?></strong>
	<?php echo $localcontent->description; ?></p>
<p>
	<strong><?= __("view.short-description"); ?></strong>
	<?php echo $localcontent->short_description; ?></p>
<p>
	<strong><?= __("view.image"); ?></strong>
	<?php echo $content->logo->tile; ?></p>
<p>
	<strong><?= __("view.page-id"); ?></strong>
	<?php echo $content->page_id; ?></p>
<p>
	<strong><?= __("view.date"); ?></strong>
	<?php echo Date::forge($content->date_create)->format("%m/%d/%Y", true); ?></p>

<?php echo Html::anchor('admin/content/edit/'.$content->id.'/1', __("view.navbtn.edit")); ?> |
<?php echo Html::anchor('admin/pages', __("view.navbtn.Back")); ?>