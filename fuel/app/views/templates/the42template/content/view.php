<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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

<sectioin id="social-buttons" class="wrapper-padding">
	<div class="fb-like" data-href="<?= Fuel\Core\Uri::current(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
	<script type="text/javascript">
	    VK.init({apiId: 3637024, onlyWidgets: true});
	</script>
	<!-- Put this div tag to the place, where the Like block will be -->
	<div id="vk_like" style="display: inline-block; margin-left: 30px;"></div>
	<script type="text/javascript">
	    VK.Widgets.Like("vk_like", {type: "mini"});
	</script>
	<!-- Поместите этот тег туда, где должна отображаться кнопка +1. -->
	<div class="g-plusone" data-annotation="inline" data-width="300"></div>

	<!-- Поместите этот тег за последним тегом виджета кнопка +1. -->
	<script type="text/javascript">
	  window.___gcfg = {lang: 'ru'};

	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>
</sectioin>

<script>$('.carousel').carousel();</script>
<? if(count($content->related_content) > 0): ?>
    <section class="projects wrapper-padding clearfix">
	<header>
	    <h1><legend>Похожие проекты</legend></h1>
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