<? $current_page = Controller_Application::$current_page; ?>
<? $template = "default"; ?>
<!DOCTYPE html>
<html lang="<?= Session::get('lang') ? Session::get('lang') : Config::get('language'); ?>">
	 <head>
		<meta charset="utf-8"/>
		<meta name='yandex-verification' content='4bee6e3f36f25284' />
		
                                    <meta name='wmail-verification' content='5622ced4bad4660a' />
                                                    <!-- Yandex.Metrika counter -->
                                                    <script type="text/javascript">
                                                    (function (d, w, c) {
                                                        (w[c] = w[c] || []).push(function() {
                                                            try {
                                                                w.yaCounter22608880 = new Ya.Metrika({id:22608880,
                                                                        clickmap:true,
                                                                        trackLinks:true,
                                                                        accurateTrackBounce: true});
                                                                } catch (e) {
                                                                }
                                                            });

                                                            var n = d.getElementsByTagName("script")[0],
                                                                    s = d.createElement("script"),
                                                                    f = function() {
                                                                n.parentNode.insertBefore(s, n);
                                                            };
                                                            s.type = "text/javascript";
                                                            s.async = true;
                                                            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                                                            if (w.opera == "[object Opera]") {
                                                                d.addEventListener("DOMContentLoaded", f, false);
                                                            } else {
                                                                f();
                                                            }
                                                        })(document, window, "yandex_metrika_callbacks");
                                                    </script>
                         <noscript><div><img src="//mc.yandex.ru/watch/22608880" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                         <!-- /Yandex.Metrika counter -->
		<meta property="og:title" content="zhitnitsa" />
		<meta property="og:type" content="company" />
		<meta property="og:url" content="http://zhitnitsa.com.ua/" />
		<meta property="og:image" content="" />
		<meta property="og:site_name" content="&#x416;&#x438;&#x442;&#x43d;&#x438;&#x446;&#x430;" />
		<meta property="fb:admins" content="100005100901584" />

		<title><?= $title; ?></title>
		<link rel="shortcut icon" href="assets/img/templates/<?= $template; ?>/favicon.png" type="image/png">
		<?= Asset::css('bootstrap.min.css'); ?>
		<?= Asset::css('reveal.css'); ?>
		<?= Asset::css('jquery.fancybox.css'); ?>
		<?= Asset::css('jquery.fancybox-buttons.css'); ?>
		<?= Asset::css('jquery.mCustomScrollbar.css'); ?>
		<?= TCTheme::add_css("style.css"); ?>

		<?= Asset::js('jquery-1.8.3.min.js'); ?>
		<?= Asset::js('jquery-ui-1.9.0.custom.min.js'); ?>
		<?= Asset::js('jquery.ui.min.js'); ?>
		<?= Asset::js('jquery.mousewheel.min.js'); ?>
		<script src="http://connect.facebook.net/ru_RU/all.js#xfbml=1"></script>
		<script src="http://vkontakte.ru/js/api/openapi.js" type="text/javascript" charset="windows-1251"></script>
		
		<?= Asset::js('jquery.fancybox.pack.js'); ?>
		<?= Asset::js('jquery.fancybox-buttons.js'); ?>
		<?= Asset::js('jquery.scrollTo.js');?>
		<?= Asset::js('jquery.mCustomScrollbar.min.js'); ?>
		<?= Asset::js("jcarousellite_1.0.1.js"); ?>
		<?= Asset::js('bootstrap.min.js'); ?>
		<?= TCTheme::add_js("content-loader.js"); ?>
		<?= Asset::js('jquery.reveal.js'); ?>
		<?= Asset::render('javascripts'); ?>
                                    <script src="http://api-maps.yandex.ru/1.1/index.xml?key=AGOEZ1IBAAAAFaaMRwMAJy9B84wK-dU6o86VDlEL5XChoiIAAAAAAAAAAAAkOArCtwmUjAVHea0bqw0-OAyPMA=="
                                    type="text/javascript"></script>
	</head>

	<body>
		<? 
			if (Session::get('lang')) {
        		Config::set('language', Session::get('lang'));
            }
            Lang::load($template.'.php');
            $curr_lang = TCLocale::get_current_leng_id();
        ?>
		<div id="all-wrapper">
			<div id="header">
				<?= TCTheme::render("header",array()); ?>
			</div>
			<div id="content-wrapper">
					<?= TCTheme::render("menu/arrows",array('links' => Model_Link::find_with_translitions($curr_lang, null, null, 'weight'))); ?>
				<div id="second-wrapper">
					<div class="menu-all clearfix">
						<?= TCTheme::render("menu/main",array('template' => $template)); ?>
					</div>
					<div id="content">
						<div id="all-columns" class="clearfix">
							<?= TCTheme::render("columns/main",array()); ?>
							<? $pages = Model_Page::find('all', array('order_by' => array('weight' => 'asc'))); ?>
							<? foreach ($pages as $page): ?>
								<?= TCTheme::render("columns/column",array('page' => $page)); ?>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div id="footer">
				<?= TCTheme::render("footer"); ?>
			</div>
		</div>
		<?= TCTheme::render("popup"); ?>
                                    <!-- Rating@Mail.ru counter -->
                                    <script type="text/javascript">//<![CDATA[
                                    var _tmr = _tmr || [];
                                    _tmr.push({id: "2413421", type: "pageView", start: (new Date()).getTime()});
                                    (function (d, w) {
                                       var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true;
                                       ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
                                       var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
                                       if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
                                    })(document, window);
                                    //]]></script><noscript><div style="position:absolute;left:-10000px;">
                                        <img src="//top-fwz1.mail.ru/counter?id=2413421;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
                                    </div></noscript>
                                    <!-- //Rating@Mail.ru counter -->
	</body>
</html>
