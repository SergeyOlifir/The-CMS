<section id="galery" class="well">
    <header>
	 <h1><legend><?= __("edit.gallery.title"); ?></legend></h1>
    </header>
    <? if(count($content->images) < 1): ?>
	<p class="text-info text-center"><?= __("edit.gallery.null"); ?></p>
    <? else: ?>
	<div class="clearfix">
	    <div class="main-metro-wrapper clearfix">
		<? foreach ($content->images as $related): ?>
		    <div class="tile left  content">
		    	<div class="gallery-wrapper img-polaroid">
		    		<?= Html::img("files/{$related->thumb}"); ?>
				</div>
				<div class="overlay"></div>
				<div class="buttons-area clearfix">
				    <a href="<?= Fuel\Core\Uri::base() . "files/{$related->full}" ?>" class="zoom-button fancybox" data-fancybox-group="button" title="<?= __("edit.gallery.content.navbtn.zoom"); ?>">Zoom</a>
				    <a href="/admin/image/delete/<?=$related->id; ?>/<?= $content->page_id; ?>" class="delite-button" title="<?= __("edit.gallery.content.navbtn.delete"); ?>">Delete</a>
				</div>
		    </div>
		<? endforeach; ?>
	    </div>
	</div>
    <? endif; ?>
    <?= Form::open(array('enctype'=>'multipart/form-data', 'action' => "admin/image/create/{$content->id}/{$locale}")); ?>
	<fieldset>
	    <label><?= __("edit.gallery.input"); ?></label>
	    <?= Form::file("image",array('class' => 'span12')); ?>
	    <div class="actions">
		<input type="submit" class="btn btn-large btn-primary" value="<?= __("edit.gallery.submit"); ?>" />
	    </div>
	</fieldset>
    <?= Fuel\Core\Form::close(); ?>
</section>