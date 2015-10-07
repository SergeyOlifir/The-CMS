<? $current_page = Controller_Application::$current_page; ?>
<? $template = "carusel"; ?>
<!DOCTYPE html>
<html lang="<?= Config::get('language'); ?>">
    <head>
           <title><?= $title; ?></title>
           <meta charset="utf-8"/>
           <meta name='yandex-verification' content='74c8226138f1895c' />
           <link rel="shortcut icon" href="assets/img/templates/<?= $template; ?>/favicon.png" type="image/png">
           <?= Asset::css('bootstrap.min.css'); ?>
           <?= Asset::css('reveal.css'); ?>
           <?= Asset::css('jquery.fancybox.css'); ?>
           <?= Asset::css('jquery.fancybox-buttons.css'); ?>
           <?= TCTheme::add_css("carusel.css"); ?>

           <?= Asset::js('jquery-1.8.3.min.js'); ?>
           <?= Asset::js('jquery-ui-1.9.0.custom.min.js'); ?>
           <?= Asset::js('jquery.ui.min.js'); ?>
           <?= Asset::js('jquery.mousewheel.min.js'); ?>
           <?= Asset::js('jquery.reveal.js'); ?>
           <?= Asset::js('jquery.fancybox.pack.js'); ?>
           <?= Asset::js('jquery.fancybox-buttons.js'); ?>
           <?= Asset::js('jcarousellite_1.0.1.js'); ?>
           <?= TCTheme::add_js('application.js'); ?>
           <?= Asset::js('bootstrap.min.js'); ?>
           <?= Asset::render('javascripts'); ?>
	   
	   <script src="http://vkontakte.ru/js/api/openapi.js" type="text/javascript" charset="windows-1251"></script>
                    <script src="http://api-maps.yandex.ru/1.1/index.xml?key=AJ-mZ1IBAAAAFQKwMgMA14JRA9tzkfy9OKK1jpRwsqlcVV4AAAAAAAAAAADHTSPqAZgNvw1PA_vesRHxKRRSZw=="
                    type="text/javascript"></script>
           
   </head>

    <body>
      <header id="header">
          <?= TCTheme::render("header",array()); ?>
      </header>
      <?= TCTheme::render("carousel_partners"); ?>
      <content class="all-wrapper">
        <? if(isset($content)): ?>
                <?= $content; ?>
        <? endif; ?>
        <? if(isset($contentFirst)): ?>
                <?= $contentFirst; ?>
        <? endif; ?>
      </content>
      <footer id="footer">
          <?= TCTheme::render("footer"); ?>
      </footer>
    </body>
</html>
