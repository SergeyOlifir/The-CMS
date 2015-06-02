<header>
	<h1 class="title-page">Главная</h1>
</header>
<section id="Carousel" class="carousel slide">
	<div class="border-top-slide-show"></div>
    <ol class="carousel-indicators">
		<li data-target="#Carousel" class="active" data-slide-to="0"></li>
		<li data-target="#Carousel" data-slide-to="1"></li>
		<li data-target="#Carousel" class="" data-slide-to="2"></li>
		<li data-target="#Carousel" class="" data-slide-to="3"></li>
		<li data-target="#Carousel" class="" data-slide-to="4"></li>
		<li data-target="#Carousel" class="" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
		<div class="item active">
		    <?= Html::img("assets/img/templates/carusel/img_slideshow_05.jpg"); ?>
		</div>
		<div class="item">
		    <?= Html::img("assets/img/templates/carusel/img_slideshow_01.jpg"); ?>
		</div>
		<div class="item">
		    <?= Html::img("assets/img/templates/carusel/img_slideshow_02.jpg"); ?>
		</div>
		<div class="item">
		    <?= Html::img("assets/img/templates/carusel/img_slideshow_03.jpg"); ?>
		</div>
		<div class="item">
		    <?= Html::img("assets/img/templates/carusel/img_slideshow_04.jpg"); ?>
		</div>
		
    </div>
    <a class="carousel-control left" href="#Carousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#Carousel" data-slide="next">&rsaquo;</a>
    <div class="border-bottom-slide-show"></div>
</section>
<script>$('.carousel').carousel();</script>
