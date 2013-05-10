<section class="submenu">
    <h2>Portfolio</h2>
</section>
<section>
    <article class="container single-content">
	<div class="row">
	    <div class="span9">
		<div id="Carousel" class="carousel slide">
		    <ol class="carousel-indicators">
			<? $i = 0; ?> 
			<? foreach($content->images as $image): ?>
			    <li data-target="#Carousel" class="<?= $i == 0 ? 'active' : '' ?>" data-slide-to="<?= $i++; ?>"></li>
			<? endforeach; ?>
		    </ol>
		    <div class="carousel-inner">
			<? $i = 0; ?> 
			<? foreach($content->images as $image): ?>
			    <div class="<?= $i == 0 ? 'active' : '' ?> item">
				<?= Html::img("files/{$image->galery}"); ?>
			    </div>
			    <? $i++; ?>
			<? endforeach; ?>
		    </div>
		</div>
	    </div>
	    <div class="span3">
		<header>
		    <h1 class="text-center"><?= $content->name; ?></h1>
		</header>
		<p><?=$content->description; ?></p>
	    </div>
	</div>
    </article>
</section>

<script>$('.carousel').carousel();</script>
<? if(count($content->related_content) > 0): ?>
    <section class="projects wrapper-padding clearfix">
	<header>
	    <h1><legend>Похожые проэкты</legend></h1>
	</header>
	<? foreach ($content->related_content as $project): ?>
	    <article class="project tile left">
		<div class="logo-wrapper">
		    <?= Html::img("files/{$project['image']}"); ?>
		</div>
		<header class="name">
		    <h1><?= \Fuel\Core\Html::anchor("/home/content/view/{$project->id}", $project['name'], array('class' => 'project-link')); ?></h1>
		    <p><?= \Fuel\Core\Html::anchor("home/category/view/{$project['page']->alias}", $project['page']->name, array('class' => 'project-link')); ?></p>
		</header>
		<?= \Fuel\Core\Html::anchor("#", "More", array('class' => 'more-link')); ?>
	    </article>
	<? endforeach; ?>
    </section>
<? endif; ?>