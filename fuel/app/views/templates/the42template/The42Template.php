<? $current_page = Controller_Application::$current_page; ?>
<? $template = "the42template"; ?>
<!DOCTYPE html>
<html lang="<?= Config::get('language'); ?>">
    <head>
           <title><?= $title; ?></title>
           <meta charset="utf-8"/>
           <link rel="shortcut icon" href="assets/img/templates/<?= $template; ?>/favicon.png" type="image/png">
           <?= Asset::css('bootstrap.min.css'); ?>
           <?= Asset::css('reveal.css'); ?>
           <?= Asset::css('jquery.fancybox.css'); ?>
           <?= Asset::css('jquery.fancybox-buttons.css'); ?>
           <?= TCTheme::add_css("style.css"); ?>

           <?= Asset::js('jquery-1.8.3.min.js'); ?>
           <?= Asset::js('jquery-ui-1.9.0.custom.min.js'); ?>
           <?= Asset::js('jquery.ui.min.js'); ?>
           <?= Asset::js('jquery.mousewheel.min.js'); ?>
           <?= Asset::js('jquery.reveal.js'); ?>
           <?= Asset::js('jquery.fancybox.pack.js'); ?>
           <?= Asset::js('jquery.fancybox-buttons.js'); ?>
           <?=TCTheme::add_js('application.js'); ?>
           <?= Asset::js('bootstrap.min.js'); ?>
           <?= Asset::render('javascripts'); ?>
   </head>

    <body>
    <header id="header">
        <?= TCTheme::render("header",array()); ?>
    </header>
        <div class="all-wrapper">
            <div id="content">
                <? if(isset($content)): ?>
                        <?= $content; ?>
                <? endif; ?>
            </div>
        </div>
    <footer id="footer">
        <?= TCTheme::render("footer"); ?>
    </footer>
    </body>
</html>
