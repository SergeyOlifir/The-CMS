<h3> <?= __("login.title"); ?> </h1>
<div class="form-wrapper">
	<?= Form::open(array('action' => '/admin/index', 'method' => 'post', 'class' => 'form-actions')); ?>
		<fieldset>
			<div class="input-wrapper">
				<?= Form::input('username', '', array('placeholder' => __("login.input.username"), 'class' => 'input-xxlarge')); ?>
			</div>
			<div class="input-wrapper">
				<?= Form::password('password', '', array('placeholder' => __("login.input.password"), 'class' => 'input-xxlarge')); ?>
			</div>
		</fieldset>
		<?= Form::submit("login", __("login.input.submit"), array("class" => "btn btn-primary btn-large")); ?>
	<?= Form::close(); ?>
</div>