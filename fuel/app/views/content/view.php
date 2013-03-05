<h2>Viewing #<?php echo $content->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $content->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $content->description; ?></p>
<p>
	<strong>Short description:</strong>
	<?php echo $content->short_description; ?></p>
<p>
	<strong>Image:</strong>
	<?php echo $content->image; ?></p>
<p>
	<strong>Page id:</strong>
	<?php echo $content->page_id; ?></p>

<?php echo Html::anchor('content/edit/'.$content->id, 'Edit'); ?> |
<?php echo Html::anchor('content', 'Back'); ?>