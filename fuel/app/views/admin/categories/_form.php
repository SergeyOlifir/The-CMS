<section id="edit" class="well">
    <header>
	 <h1><legend><?= __("_form.title"); ?></legend></h1>
    </header>
    <?php echo Form::open(array('enctype'=>'multipart/form-data', 'class' => 'content-form')); ?>
	<fieldset>
            <div class="clearfix">
                    
                    <? if(isset($page) and !empty($page->image)): ?>
                        <?= Html::img("files/{$page->logo->list}", array('class' => "thumbnail")); ?>
                    <? endif; ?>
                    <?= Form::label('HUI', 'image'); ?>
                    <div class="input">
                            <?= Form::file("image",array('class' => 'span8')); ?>
                    </div>
            </div>
	    <div class="clearfix">
		<?php echo Form::label(__("_form.input.alias"), 'alias'); ?>
		<div class="input">
		    <?php echo Form::input('alias', Input::post('alias', isset($page) ? $page->alias : ''), array('class' => 'span8', 'rows' => 12)); ?>
		</div>
	    </div>
	    <?= isset($page) ? $page->translition_form() : Model_Category::get_translition_form(); ?>
	    <div class="clearfix">
		<div class="input">
		    <?= Form::checkbox('public_data', 1, isset($page) && $page->public_data > 0 ? true : false);  ?>
		    <?= Form::label(__("_form.input.date-content"), 'public_data'); ?>
		</div>
	    </div>
	    <div class="actions">
		<?php echo Form::submit('submit', __("_form.input.submit"), array('class' => 'btn btn-primary btn-large')); ?>
	    </div>
	</fieldset>
    <?php echo Form::close(); ?>
</section>