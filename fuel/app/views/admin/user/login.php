<?= Form::open('/user/user/login'); ?>
	<?= Form::input('username', 'value', array()); ?>
	<?= Form::input('password', 'value', array()); ?>
	<?= Form::submit("go", "registr", array()); ?>
<?= Form::close(); ?>