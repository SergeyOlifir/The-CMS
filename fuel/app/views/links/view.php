<h2>Viewing #<?php echo $link->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $link->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $link->description; ?></p>
<p>
	<strong>Image:</strong>
	<?php echo $link->image; ?></p>
<p>
	<strong>Page id:</strong>
	<?php echo $link->page_id; ?></p>
<p>
	<strong>Weight:</strong>
	<?php echo $link->weight; ?></p>
<p>
	<strong>Public:</strong>
	<?php echo $link->public; ?></p>

<?php echo Html::anchor('links/edit/'.$link->id, 'Edit'); ?> |
<?php echo Html::anchor('links', 'Back'); ?>