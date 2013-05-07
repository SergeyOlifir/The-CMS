<div class="container">
    <?= Form::open('/user/user/create'); ?>
        <h2 class="form-signin-heading">Please registr</h2>
        <?= Form::input('username', '', array('class' => "input-block-level", 'placeholder' => 'User Name')); ?>
        <?= Form::input('email', '', array('class' => "input-block-level", 'placeholder' => 'Email')); ?>
        <?= Form::password('password', '', array('class' => "input-block-level", 'placeholder' => 'Password')); ?>

        <button type="submit" class="btn btn-large btn-primary">Registr</button>
    <?= Form::close(); ?>
</div>