<?= Form::open('/user/user/create'); ?>
	<?= Form::input('username', 'value', array()); ?>
	<?= Form::input('password', 'value', array()); ?>
	<?= Form::input('email', 'value', array()); ?>
	<?= Form::submit("go", "registr", array()); ?>
<?= Form::close(); ?>