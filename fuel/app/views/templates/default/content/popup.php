<div id="fb-root"></div>
<script>
	$(function(){
		var elem = $(document.createElement("fb:like"));
            elem.attr("href", "<?= Fuel\Core\Uri::current(); ?>");
            $("div#fb-like").empty().append(elem);
            FB.XFBML.parse($("div#fb-like").get(0));
    });
</script>

<? $curr_lang_id = TCLocale::get_current_leng_id(); ?>
<h3><?= $content->name; ?></h3>
<div class="popup-content scroll-news-index">
	<div class="wrapper-preview">
		<div class="preview">
			<div id="content-carousel" class="carousel slide">
				<ol class="carousel-indicators">
				<? $i = 0; ?> 
				<? foreach($content->images as $image): ?>
				    <li data-target="#content-carousel" class="<?= $i == 0 ? 'active' : '' ?>" data-slide-to="<?= $i++; ?>"></li>
				<? endforeach; ?>
			    </ol>
				<div class="carousel-inner">
				<? $i = 0; ?> 
				<? foreach($content->images as $image): ?>
				    <div class="<?= $i == 0 ? 'active' : '' ?> item">
					<a class="fancybox" data-fancybox-group="button" href="<?= Fuel\Core\Uri::base() . "files/{$image->full}" ?>"><?= Html::img("files/{$image->galery}"); ?></a>
				    </div>
				    <? $i++; ?>
				<? endforeach; ?>
			    </div>
			</div>
			<div class="short_description">
				<?= $content->description; ?>
			</div>
		</div>
	</div>
	<div class="description">
		<?=$content->more_description; ?>
	</div>
</div>

<div id="social-buttons" class="wrapper-padding clearfix">
	<div class="fb-like" data-href="<? //= Fuel\Core\Uri::current(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>

	<a href="https://twitter.com/share" class="twitter-share-button" data-via="propozitive" data-lang="ru">Твитнуть</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
	</script>

	<div class="g-plusone"  data-width="300"></div>
	<script type="text/javascript">
	  	window.___gcfg = {lang: 'ru'};

		(function() {
		    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		    po.src = 'https://apis.google.com/js/plusone.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
	</script>
</div>

<? if(count($content->related_content) > 0): ?>
    <section class="related_content clearfix">
	<header class="name">
	    <h1>Сопутствующая информация</h1>
	</header>
	<ul class="tile clearfix">
		<? foreach ($content->related_content as $content): ?>
			<li>
				<a id="<?= $content->id; ?>" data-reveal-id="contents_popup" href="#" content_id="<?= $content->id; ?>" class="show-popup">
					<div class="img-wrapper">
						<?= Html::img("files/{$content->logo->thumb}"); ?>
					</div>
					<h3 class="header">
						<?= $content->name; ?>
					</h3>
				</a>
			</li>
		<? endforeach; ?>
	</ul>
	</section>
<? endif; ?>

<script>$('.carousel').carousel({
	interval: 2000
});</script>