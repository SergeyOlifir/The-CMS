<h2>Viewing #<?php echo $content->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $localcontent->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $localcontent->description; ?></p>
<p>
	<strong>Short description:</strong>
	<?php echo $localcontent->short_description; ?></p>
<p>
	<strong>Image:</strong>
	<?php echo $content->image; ?></p>
<p>
	<strong>Page id:</strong>
	<?php echo $content->page_id; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo Date::forge($content->date_create)->format("%m/%d/%Y", true); ?></p>

<?php echo Html::anchor('admin/content/edit/'.$content->id.'/1', 'Edit'); ?> |
<?php echo Html::anchor('admin/pages', 'Back'); ?>