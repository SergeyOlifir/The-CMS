<h3>Welcome to Sevennights CMS </h1>
<div class="form-wrapper">
	<?= Form::open(array('action' => '/admin/index', 'method' => 'post', 'class' => 'form-actions')); ?>
		<fieldset>
			<div class="input-wrapper">
				<?= Form::input('username', '', array('placeholder' => "User Name", 'class' => 'input-xxlarge')); ?>
			</div>
			<div class="input-wrapper">
				<?= Form::password('password', '', array('placeholder' => "Password", 'class' => 'input-xxlarge')); ?>
			</div>
		</fieldset>
		<?= Form::submit("login", "Login", array("class" => "btn btn-primary btn-large")); ?>
	<?= Form::close(); ?>
</div>