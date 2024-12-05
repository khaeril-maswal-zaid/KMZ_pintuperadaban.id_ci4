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


<!-- Breaking News Start -->
<!-- <div class="container-fluid bg-dark py-3 mb-3">
    <div class="container">
        <div class="row align-items-center bg-dark">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 170px); padding-right: 90px;">
                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="<?= $news[0]['slug'] ?>/<?= $news[0]['time'] ?>"><?= $news[0]['judul'] ?></a></div>
                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="<?= $news[1]['slug'] ?>/<?= $news[1]['time'] ?>"><?= $news[1]['judul'] ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Breaking News End -->

<!-- Populer Slider Start -->
<div class="container-fluid pt-4 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Popular Posts</h4>
        </div>

        <div class="owl-carousel news-carousel carousel-item-4 position-relative">

            <?php foreach ($populer as $ppr) : ?>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="/assets/img/artikel/<?= url_title($ppr['kategori'], '', true) ?>/<?= $ppr['picture'] ?>" alt="<?= $ppr['picture'] ?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="/category/<?= strtolower($ppr['kategori']) ?>"><?= $ppr['kategori'] ?></a>
                            <small class="text-white"><?= KelenderIna($ppr['tanggal']) ?></small>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="/<?= $ppr['slug'] ?>/<?= $ppr['time'] ?>"><?= $ppr['judul'] ?></a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- Populer Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">


                    <!-- Iklan Area Start -->
                    <div class="col-lg-12 mb-3">
                        <?= $endors[1]['hrefsourcelef'] .  $endors[1]['wa'] . $endors[1]['sourcechat'] . $endors[1]['chat'] . $endors[1]['hrefsourceright'] . $endors[1]['imgsourceleft'] . $endors[1]['idbrand'] . $endors[1]['imgsourceright'] ?>

                        <amp-auto-ads type="adsense" data-ad-client="ca-pub-3151537190694448"></amp-auto-ads>
                    </div>
                    <!-- Iklan Area End -->


                    <!-- Latest News Area Start -->
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="category/news">View All</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <div class="" style="height:360px">
                                <img class="img-fluid h-100 w-100" src="/assets/img/artikel/<?= url_title($news[0]['kategori'], '', true) ?>/<?= $news[0]['picture'] ?>" alt="<?= $news[0]['picture'] ?>" style="object-fit: cover;">
                            </div>
                            <div class="bg-white border border-top-0 p-4 position-relative overflow-hidden" style="height:377px">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="/category/<?= strtolower($news[0]['kategori']) ?>"><?= $news[0]['kategori'] ?></a>
                                    <small><?= KelenderIna($news[0]['tanggal']) ?></small>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?= $news[0]['slug'] ?>/<?= $news[0]['time'] ?>"><?= $news[0]['judul'] ?></a>
                                <p class="m-0"><?= $news[0]['description'] ?></p>
                            </div>
                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="/assets/img/<?= $penulis2[1] ?>/<?= $penulis2[0] ?>" width="31" height="31" alt="<?= $penulis2[0] ?>">
                                    <small><?= $news[0]['oleh'] ?></small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="ml-3"><i class="far fa-eye mr-2"></i><?= $news[0]['visit'] ?></small>
                                    <!--<small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <div class="" style="height:360px">
                                <img class="img-fluid h-100 w-100" src="/assets/img/artikel/<?= url_title($news[1]['kategori'], '', true) ?>/<?= $news[1]['picture'] ?>" alt="<?= $news[1]['picture'] ?>" style="object-fit: cover;">
                            </div>
                            <div class="bg-white border border-top-0 p-4 position-relative overflow-hidden" style="height:377px">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="/category/<?= strtolower($news[0]['kategori']) ?>"><?= $news[1]['kategori'] ?></a>
                                    <?= KelenderIna($news[1]['tanggal']) ?></small>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?= $news[1]['slug'] ?>/<?= $news[1]['time'] ?>"><?= $news[1]['judul'] ?></a>
                                <p class="m-0"><?= $news[1]['description'] ?></p>
                            </div>
                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="/assets/img/<?= $penulis2[1] ?>/<?= $penulis2[0] ?>" width="31" height="31" alt="<?= $penulis2[0] ?>">
                                    <small><?= $news[1]['oleh'] ?></small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="ml-3"><i class="far fa-eye mr-2"></i><?= $news[1]['visit'] ?></small>
                                    <!--<small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>-->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 130px;">
                            <div class="position-relative overflow-hidden" style="width: 150px; height: 100%;">
                                <img class="img-fluid w-100 h-100" src="/assets/img/artikel/<?= url_title($news[2]['kategori'], '', true) ?>/<?= $news[2]['picture'] ?>" alt="<?= $news[2]['picture'] ?>" style="object-fit: cover;">
                            </div>

                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= strtolower($news[0]['kategori']) ?>"><?= $news[2]['kategori'] ?></a>
                                    <small><?= KelenderIna($news[2]['tanggal']) ?></small>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="/<?= $news[2]['slug'] ?>/<?= $news[2]['time'] ?>"><?= substr($news[2]['judul'], 0, 50) ?>...</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 130px;">
                            <div class="position-relative overflow-hidden" style="width: 150px; height: 100%;">
                                <img class="img-fluid w-100 h-100" src="/assets/img/artikel/<?= url_title($news[3]['kategori'], '', true) ?>/<?= $news[3]['picture'] ?>" alt="<?= $news[3]['picture'] ?>" style="object-fit: cover;">
                            </div>

                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= strtolower($news[0]['kategori']) ?>"><?= $news[3]['kategori'] ?></a>
                                    <small><?= KelenderIna($news[3]['tanggal']) ?></small>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="/<?= $news[3]['slug'] ?>/<?= $news[3]['time'] ?>"><?= substr($news[3]['judul'], 0, 50) ?>...</a>
                            </div>
                        </div>
                    </div>
                    <!--Latest News Area End -->


                    <hr>


                    <!-- Iklan Area Start -->
                    <div class="col-lg-12 mb-3">
                        <div class="d-block d-md-none">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold"><?= $endors[0]['hrefsourcelef'] .  $endors[0]['wa'] . $endors[0]['sourcechat'] . $endors[0]['chat'] . $endors[0]['hrefsourceright'] . $endors[0]['brand'] ?></a></h4>
                            </div>

                            <div class="bg-white text-center border border-top-0 p-3">
                                <?= $endors[0]['hrefsourcelef'] .  $endors[0]['wa'] . $endors[0]['sourcechat'] . $endors[0]['chat'] . $endors[0]['hrefsourceright'] . $endors[0]['imgsourceleft'] . $endors[0]['idbrand'] . $endors[0]['imgsourceright'] ?>
                            </div>
                        </div>

                        <div class="d-none d-md-block">
                            <?= $endors[2]['hrefsourcelef'] .  $endors[2]['wa'] . $endors[2]['sourcechat'] . $endors[2]['chat'] . $endors[2]['hrefsourceright'] . $endors[2]['imgsourceleft'] . $endors[2]['idbrand'] . $endors[2]['imgsourceright'] ?>
                        </div>

                        <amp-auto-ads type="adsense" data-ad-client="ca-pub-3151537190694448"></amp-auto-ads>
                    </div>
                    <!-- Iklan Area End -->


                    <!-- Kategori Area Start -->
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">category</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="/category/opini">View All</a>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row news-lg mx-0 mb-3">
                            <div class="col-md-6 h-100 px-0 ">
                                <img class="img-fluid h-100 w-100" src="/assets/img/artikel/<?= url_title($artkelKtg[6]['kategori'], '', true) ?>/<?= $artkelKtg[6]['picture'] ?>" alt="<?= $artkelKtg[6]['picture'] ?>" style="object-fit: cover;">
                            </div>
                            <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                <div class="mt-auto p-4 position-relative overflow-hidden">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="/category/opini">Opini</a>
                                        <small><?= KelenderIna($artkelKtg[6]['tanggal']) ?></small>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="/<?= $artkelKtg[6]['slug'] ?>/<?= $artkelKtg[6]['time'] ?>"><?= $artkelKtg[6]['judul'] ?></a>
                                    <p class="m-0"><?= $artkelKtg[6]['description'] ?></p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="/assets/img/<?= $penulis[1] ?>/<?= $penulis[0] ?>" width="31" height="31" alt="<?= $penulis[0] ?>">
                                        <small><?= $artkelKtg[6]['oleh'] ?></small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i><?= $artkelKtg[6]['visit'] ?></small>
                                        <!--<small class="ml-3"><i class="far fa-comment mr-2"></i>123</small> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 150px;">
                            <div class="position-relative overflow-hidden" style="width: 150px; height: 100%;">
                                <img class="img-fluid w-100 h-100" src="/assets/img/artikel/<?= url_title($artkelKtg[0]['kategori'], '', true) ?>/<?= $artkelKtg[0]['picture'] ?>" alt="<?= $artkelKtg[0]['picture'] ?>" style="object-fit: cover;">
                            </div>

                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= strtolower($artkelKtg[0]['kategori']) ?>"><?= $artkelKtg[0]['kategori'] ?></a>
                                    <small><?= KelenderIna($artkelKtg[0]['tanggal']) ?></small>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="/<?= $artkelKtg[0]['slug'] ?>/<?= $artkelKtg[0]['time'] ?>"><?= $artkelKtg[0]['judul'] ?></a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center bg-white mb-3" style="height: 150px;">
                            <div class="position-relative overflow-hidden" style="width: 150px; height: 100%;">
                                <img class="img-fluid w-100 h-100" src="/assets/img/artikel/<?= url_title($artkelKtg[1]['kategori'], '', true) ?>/<?= $artkelKtg[1]['picture'] ?>" alt="<?= $artkelKtg[1]['picture'] ?>" style="object-fit: cover;">
                            </div>

                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= strtolower($artkelKtg[1]['kategori']) ?>"><?= $artkelKtg[1]['kategori'] ?></a>
                                    <small><?= KelenderIna($artkelKtg[1]['tanggal']) ?></small>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="<?= $artkelKtg[1]['slug'] ?>/<?= $artkelKtg[1]['time'] ?>"><?= $artkelKtg[1]['judul'] ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 150px;">
                            <div class="position-relative overflow-hidden" style="width: 150px; height: 100%;">
                                <img class="img-fluid w-100 h-100" src="/assets/img/artikel/<?= url_title($artkelKtg[7]['kategori'], '-', true) ?>/<?= $artkelKtg[7]['picture'] ?>" alt="<?= $artkelKtg[7]['picture'] ?>" style="object-fit: cover;">
                            </div>

                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= url_title($artkelKtg[7]['kategori'], '-', true) ?>"><?= $artkelKtg[7]['kategori'] ?></a>
                                    <small><?= KelenderIna($artkelKtg[7]['tanggal']) ?></small> f
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="/<?= $artkelKtg[7]['slug'] ?>/<?= $artkelKtg[7]['time'] ?>"><?= $artkelKtg[7]['judul'] ?></a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center bg-white mb-3" style="height: 150px;">
                            <div class="position-relative overflow-hidden" style="width: 150px; height: 100%;">
                                <img class="img-fluid w-100 h-100" src="/assets/img/artikel/<?= url_title($artkelKtg[2]['kategori'], '', true) ?>/<?= $artkelKtg[2]['picture'] ?>" alt="<?= $artkelKtg[2]['picture'] ?>" style="object-fit: cover;">
                            </div>

                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= strtolower($artkelKtg[2]['kategori']) ?>"><?= $artkelKtg[2]['kategori'] ?></a>
                                    <?= KelenderIna($artkelKtg[2]['tanggal']) ?></small>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="<?= $artkelKtg[2]['slug'] ?>/<?= $artkelKtg[2]['time'] ?>"><?= $artkelKtg[2]['judul'] ?></a>
                            </div>
                        </div>
                    </div>
                    <!-- Kategori Area End -->

                </div>
            </div>

            <!-- Kolum bagian Kanan Halaman -->
            <?= $this->include("layout2/pages-right"); ?>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->


<?php $this->endSection() ?>