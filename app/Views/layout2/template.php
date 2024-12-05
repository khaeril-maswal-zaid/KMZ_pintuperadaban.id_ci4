<!doctype html>
<html lang="en">

<head>
    <meta name="description" content="<?= $description ?>" />
    <link rel="canonical" href="<?= $url ?>" />


    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Pintu Peradaban">

    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $description ?>" />

    <meta property="og:image" itemprop="image" content="<?= $image ?>">
    <meta property="og:image:width" content="720" />
    <meta property="og:image:height" content="460" />

    <meta property="og:updated_time" content="<?= $time ?>" />
    <meta property="og:url" content="<?= $url ?>" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?= $description ?>" />
    <meta name="twitter:title" content="<?= $title ?>" />
    <meta name="twitter:site" content="<?= $url ?>" />
    <meta name="twitter:image" content="<?= $image ?>" />


    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="/assets/img/web/pp.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/assets2/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets2/css/style.css" rel="stylesheet">
</head>

<body class="<?= $classbody ?>">

    <?= $this->include($templatelayout[0]); ?>
    <?= $this->renderSection('content'); ?>
    <?= $this->include($templatelayout[1]); ?>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/assets2/lib/easing/easing.min.js"></script>
    <script src="/assets2/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/assets2/js/main.js"></script>
</body>

</html>