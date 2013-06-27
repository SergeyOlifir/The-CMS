<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<section class="submenu">
    <h1 class="category">
    	<?= $content->category->name; ?>
	</h1> - 
    <h2><?= $content->name; ?></h2>
    <h2 class="right">Рекламные места проекта</h2>
</section>
<table class="content">
	<tr>
		<td>
			<section class="content-and-social-button left">
			    <article class="single-content">
					<div class="preview">
						<header>
						    <h1><?= $content->name; ?></h1>
						</header>
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
							<?=$content->description; ?>
					    </div>
					</div>
					<div class="description">
						<?=$content->more_description; ?>
					</div>
				</article>
				<? if(count($content->related_content) > 0): ?>
				    <section class="projects related_content app-categories wrapper-padding clearfix">
					<header class="name">
					    <h1>Похожие новости</h1>
					</header>
					<ul class="clearfix">
						<? foreach ($content->related_content as $project): ?>
						    <li class="category left">
				                <a href="/home/content/view/<?= $project->id; ?>">
				                    <article>
				                        <div class="img-wrapper">
				                            <?= Html::img("files/{$project->logo->tile}"); ?>
				                        </div>
				                        <header class="description">
				                            <h1>
				                                <?= Str::truncate($project->name, 30, '...'); ?>
				                            </h1>
				                        </header>
				                    </article>
				                </a>
				            </li>
						<? endforeach; ?>
					</ul>
				    </section>
				<? endif; ?>
				<div id="social-buttons" class="wrapper-padding clearfix">
					<div class="fb-like" data-href="<?= Fuel\Core\Uri::current(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
					<!--<script type="text/javascript">
					    VK.init({apiId: 3637024, onlyWidgets: true});
					</script>
					<div id="vk_like" style="display: inline-block; margin-left: 30px;"></div>
					<script type="text/javascript">
					    VK.Widgets.Like("vk_like", {type: "mini"});
					</script>-->

					<!-- Поместите этот тег туда, где должна отображаться кнопка +1. -->
					<div class="g-plusone"  data-width="300"></div>

					<!-- Поместите этот тег за последним тегом виджета кнопка +1. -->
					<script type="text/javascript">
					  window.___gcfg = {lang: 'ru'};

					  (function() {
					    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					    po.src = 'https://apis.google.com/js/plusone.js';
					    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					<div class='back-link'></div>
				</div>
			</section>
		</td>
		<td>
			<section class="advertising right">

			</section>
		</td>
	</tr>
</table>

<script>$('.carousel').carousel({
	interval: 2000
});</script>