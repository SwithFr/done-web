<?php use Core\Helpers\Html; ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title_for_layout) ? $title_for_layout : ''; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <?= Html::css('main'); ?>
</head>
<body>
    <?= $this->element("svgs") ?>
    <?= $this->element("nav") ?>
    <?= $this->Session->flash() ?>

    <?= $content_for_layout ?>

    <?= Html::js('main') ?>
</body>
</html>


