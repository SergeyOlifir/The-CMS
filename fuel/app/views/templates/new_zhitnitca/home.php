<? $current_page = Controller_Application::$current_page; ?>
<? $template = "new_zhitnitca"; ?>
<!DOCTYPE html>
<html lang="<?= Config::get('language'); ?>">
    <head>
        <title><?= $title; ?></title>
        <meta charset="utf-8"/>
        <link rel="shortcut icon" href="assets/img/templates/<?= $template; ?>/favicon.png" type="image/png">
        <?= Asset::css('bootstrap.min.css'); ?>
        <?= TCTheme::add_css("carusel.css"); ?>

        <?= Asset::js('jquery-2.1.4.min.js'); ?>
        <?= Asset::js('jquery.mousewheel.min.js'); ?>
        <?= TCTheme::add_js('application.js'); ?>
        <?= Asset::js('bootstrap.min.js'); ?>
        <?= Asset::render('javascripts'); ?>
    </head>

    <body>
        <header id="header">
            <?= TCTheme::render("header",array()); ?>
        </header>
        
        <content class="all-wrapper">
          <? if(isset($content)): ?>
                  <?= $content; ?>
          <? endif; ?>
        </content>
        <footer id="footer">
            <?= TCTheme::render("footer"); ?>
        </footer>
      </body>
</html>
