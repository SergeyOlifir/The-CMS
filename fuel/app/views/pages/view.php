<h2>Viewing #<?php echo $page->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $page->name; ?></p>
<p>
	<strong>Alias:</strong>
	<?php echo $page->alias; ?></p>
<p>
	<strong>Header:</strong>
	<?php echo $page->header; ?></p>

<?php echo Html::anchor('pages/edit/'.$page->id, 'Edit'); ?> |
<?php echo Html::anchor('pages', 'Back'); ?>