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
<p>
	<strong>Content_date:</strong>
	<?php echo $page->public_data == 1 ? '+' : '-'; ?></p>

<?php echo Html::anchor('pages/edit/'.$page->id, 'Edit'); ?> |
<?php echo Html::anchor('pages', 'Back'); ?>