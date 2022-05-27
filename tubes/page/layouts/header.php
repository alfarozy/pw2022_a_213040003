<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Type some info">
    <meta name="author" content="Type name">

    <title>Nusantara Hospital Center | <?= $title ?? "title" ?></title>

    <!-- Bootstrap css -->
    <link href="<?= assets("frontoffice/css/bootstrap.css?v=2.0") ?>" rel="stylesheet" type="text/css" />

    <!-- Custom css -->
    <link href="<?= assets("frontoffice/css/ui.css?v=2.0") ?>" rel="stylesheet" type="text/css" />
    <link href="<?= assets("frontoffice/css/responsive.css?v=2.0") ?>" rel="stylesheet" type="text/css" />

    <!-- Font awesome 5 -->
    <link href="<?= assets("frontoffice/fonts/fontawesome/css/all.min.css") ?>" type="text/css" rel="stylesheet">

    <style>
        .hero-bg-svg {
            /* From https://css.glass */
            background: rgba(255, 255, 255, 0.32);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(1.1px);
            -webkit-backdrop-filter: blur(1.1px);
            max-width: 100%;
            width: 645px;
            border-radius: 8px;
            border-top-right-radius: 30%;
            border-bottom-left-radius: 30%;
            padding: 50px;
            background-image: url("<?= assets('frontoffice/images/nusantara.svg') ?>");
            background-repeat: no-repeat;
            background-position: center;
            background-clip: border-box;
            background-size: contain;
            height: 350px;
        }
    </style>
</head>