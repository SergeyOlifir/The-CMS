<div class="submenu">
	<h2>Portfolio</h2>
</div>
<? $translitions = $content->get_translation(1); ?>
<div class="container single-content wrapper-padding">
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
			<h3 class="text-center"><?= $translitions->name; ?></h3>
			<p><?=$translitions->description; ?></p>
		</div>
	</div>
</div>
<script>//$('.m-carousel').carousel(); 
	$('.carousel').carousel();</script>
<!--<h2>Related Projects</h2>
<div class="hui m-carousel m-center m-fade-out">
  <div class="m-carousel-inner">
	  <? foreach ($content->related_content as $project): ?>
		<div class="m-item">
			<div class="project tile left">
				  <div class="logo-wrapper">
					  <?= Html::img("files/{$project['image']}"); ?>
				  </div>
				  <div class="name">
					  <h3><?= \Fuel\Core\Html::anchor("/home/content/view/{$project->id}", $project['name'], array('class' => 'project-link')); ?></h3>
					  <p><?= \Fuel\Core\Html::anchor("home/category/view/{$project['page']->alias}", $project['page']->name, array('class' => 'project-link')); ?></p>
				  </div>
				  <?= \Fuel\Core\Html::anchor("#", "More", array('class' => 'more-link')); ?>
			  </div>
		  </div>
	  <? endforeach; ?>
  </div>
	<div class="m-carousel-controls">
    <a href="#" data-slide="prev">&lsaquo; Previous</a>
    <a href="#" data-slide="next">Next &rsaquo;</a>
	</div>
</div>-->
