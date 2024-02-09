<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">

    <title><?= $title ?></title>

    <link rel="icon" href="/assets/img/web/pp.png" />

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- styles for this Bootstrap -->
    <link href="/assets/css/dashboard.css" rel="stylesheet">
    <link href="/assets/css/sidebars.css" rel="stylesheet">
    <link href="/assets/css/signin.css" rel="stylesheet">
    <link href="/assets/css/carousel.css" rel="stylesheet">
    <link href="/assets/css/offcanvasNavscdadmin.css" rel="stylesheet">

    <!-- styles for Data Table -->
    <link rel="stylesheet" type="text/css" href="/assets/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/buttons.bootstrap5.min.css" />

    <!-- styles manual ADMIN -->
    <link href="/assets/css/styleadmin.css" rel="stylesheet">

    <!-- styles manual ADMIN -->
    <link href="/assets/css/stylehome.css" rel="stylesheet">



    <!----------------GOOGLE AREA------------------GOOGLE AREA-------------------------GOOGLE AREA------------------------------------>

    <!-- Google Adsesns -->
    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3151537190694448" crossorigin="anonymous"></script>
    <script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script> -->


    <!-- Google Console-->
    <!-- <meta name="google-site-verification" content="XdpLl3lNw2Xu_BOou4_qQPXfWHRsgKPcJH3CwIDL0L0" /> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-55PZ3R6P1C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-55PZ3R6P1C');
    </script> -->

</head>

<body class="<?= $classbody ?>">

    <?= $this->include($templatelayout[0]); ?>
    <?= $this->renderSection('content'); ?>
    <?= $this->include($templatelayout[1]); ?>


    <!-- Javascript for jQuery; -->
    <script type="text/javascript" src="/assets/js/jquery-3.6.0.min.js"></script>

    <!-- Optional JavaScript; -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for Bootstrap fitur-->
    <script src="/assets/js/feather.min.js"></script>
    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/sidebars.js"></script>

    <!-- JavaScript for Data table -->
    <script type="text/javascript" src="/assets/js/jszip.min.js"></script>
    <script type="text/javascript" src="/assets/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/assets/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/assets/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/assets/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/assets/js/buttons.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/assets/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/assets/js/buttons.print.min.js"></script>

    <!-- ckeditor5 -->
    <script type="text/javascript" src="/assets/js/ckeditor.js"></script>


    <script src="/assets/js/script-admin.js"></script>
    <script src="/assets/js/script-home.js"></script>

    <script src="/assets/js/scriptSiades.js"></script>

</body>

</html>