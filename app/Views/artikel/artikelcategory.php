<?php $this->extend('layout2/template') ?>

<?php $this->section('content') ?>


<!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">

                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="/assets/img/artikel/<?= url_title($utama[0]['kategori'], '', true) ?>/<?= $utama[0]['picture'] ?>" alt="<?= $utama[0]['picture'] ?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="/category/<?= strtolower($utama[0]['kategori']) ?>"><?= $utama[0]['kategori'] ?></a>
                            <span class="text-white"><?= KelenderIna($utama[0]['tanggal']) ?></span>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="/<?= $utama[0]['slug'] ?>/<?= $utama[0]['time'] ?>"><?= $utama[0]['judul'] ?></a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="/assets/img/artikel/<?= url_title($utama[1]['kategori'], '', true) ?>/<?= $utama[1]['picture'] ?>" alt="<?= $utama[1]['picture'] ?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="/category/<?= strtolower($utama[1]['kategori']) ?>"><?= $utama[1]['kategori'] ?></a>
                            <span class="text-white"><?= KelenderIna($utama[1]['tanggal']) ?></span>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="/<?= $utama[1]['slug'] ?>/<?= $utama[1]['time'] ?>"><?= $utama[1]['judul'] ?></a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="/assets/img/artikel/<?= url_title($utama[2]['kategori'], '', true) ?>/<?= $utama[2]['picture'] ?>" alt="<?= $utama[2]['picture'] ?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="/category/<?= strtolower($utama[2]['kategori']) ?>"><?= $utama[2]['kategori'] ?></a>
                            <span class="text-white"><?= KelenderIna($utama[2]['tanggal']) ?></span>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="/<?= $utama[2]['slug'] ?>/<?= $utama[2]['time'] ?>"><?= $utama[2]['judul'] ?></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">

                <?php foreach ($umum as $umm) : ?>
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid w-100 h-100" src="/assets/img/artikel/<?= url_title($umm['kategori'], '', true) ?>/<?= $umm['picture'] ?>" alt="<?= $umm['picture'] ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="/category/<?= strtolower($umm['kategori']) ?>"><?= $umm['kategori'] ?></a>
                                    <small class="text-white"><?= KelenderIna($umm['tanggal']) ?></small>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="/<?= $umm['slug'] ?>/<?= $umm['time'] ?>"><?= $umm['judul'] ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">


                    <!-- Iklan Area Start -->
                    <div class="col-lg-12 mb-3">
                        <?= $endors[1]['hrefsourcelef'] .  $endors[1]['wa'] . $endors[1]['sourcechat'] . $endors[1]['chat'] . $endors[1]['hrefsourceright'] . $endors[1]['imgsourceleft'] . $endors[1]['idbrand'] . $endors[1]['imgsourceright'] ?>
                        <!-- <a href=""><img class="img-fluid w-100" src="#" alt=""></a> -->
                        <amp-auto-ads type="adsense" data-ad-client="ca-pub-3151537190694448"></amp-auto-ads>
                    </div>
                    <!-- Iklan Area End -->


                    <!-- artikelcategory Area Start -->
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold"><?= $kategori; ?></h4>
                        </div>
                    </div>

                    <!-- BIG -->
                    <?php foreach ($artikelcategoryBig as $big) : ?>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <div class="" style="height:360px">
                                    <img class="img-fluid h-100 w-100" src="/assets/img/artikel/<?= url_title($big['kategori'], '', true) ?>/<?= $big['picture'] ?>" style="object-fit: cover;" alt="<?= $big['picture'] ?>">
                                </div>
                                <div class="bg-white border border-top-0 p-4 position-relative overflow-hidden" style="height:377px">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="/category/<?= url_title($big['kategori'], '', true) ?>"><?= $big['kategori'] ?></a>
                                        <small><?= KelenderIna($big['tanggal']) ?></small>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="/<?= $big['slug'] ?>/<?= $big['time'] ?>"><?= $big['judul'] ?></a>
                                    <p class="m-0"><?= $big['description'] ?></p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="/assets/img/<?= $penulis2[1] ?>/<?= $penulis2[0] ?>" width="31" height="31" alt="<?= $penulis2[0] ?>">
                                        <small><?= $big['oleh'] ?></small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i><?= $big['visit'] ?></small>
                                    <!--<small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- END BIG -->

                    <!-- SMALL -->
                    <?php foreach ($artikelcategorySmall as $small) : ?>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <div class="position-relative overflow-hidden" style="width: 150px; height: 100%;">
                                    <img class="img-fluid w-100 h-100" src="/assets/img/artikel/<?= url_title($small['kategori'], '', true) ?>/<?= $small['picture'] ?>" alt="<?= $small['picture'] ?>" style="object-fit: cover;">
                                </div>

                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= url_title($small['kategori'], '', true) ?>"><?= $small['kategori'] ?></a>
                                        <small><?= KelenderIna($small['tanggal']) ?></small>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="/<?= $small['slug'] ?>/<?= $small['time'] ?>"><?= substr($small['judul'], 0, 50) ?>...</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- END SMALL -->

                    <!-- artikelcategory Area End -->

                </div>
            </div>

            <!-- Kolum bagian Kanan Halaman -->
            <?= $this->include("layout2/pages-right"); ?>
        </div>
    </div>
</div>
<!-- artikelcategory With Sidebar End -->


<?php $this->endSection() ?>