<div class="col-lg-4">
    <!-- Ads Start "IKLAN" -->
    <div class="mb-3">
        <div class="<?=$display[0]?>">
            <div class="section-title mb-0">
                <h4 class="m-0 text-uppercase font-weight-bold"><?= $endors[0]['hrefsourcelef'] .  $endors[0]['wa'] . $endors[0]['sourcechat'] . $endors[0]['chat'] . $endors[0]['hrefsourceright'] . $endors[0]['brand'] ?></a></h4>
            </div>
            
            <div class="bg-white text-center border border-top-0 p-3">
                <?= $endors[0]['hrefsourcelef'] .  $endors[0]['wa'] . $endors[0]['sourcechat'] . $endors[0]['chat'] . $endors[0]['hrefsourceright'] . $endors[0]['imgsourceleft'] . $endors[0]['idbrand'] . $endors[0]['imgsourceright'] ?>
            </div>
        </div>
        
        <div class="<?=$display[1]?>">
            <?= $endors[3]['hrefsourcelef'] .  $endors[3]['wa'] . $endors[3]['sourcechat'] . $endors[3]['chat'] . $endors[3]['hrefsourceright'] . $endors[3]['imgsourceleft'] . $endors[3]['idbrand'] . $endors[3]['imgsourceright'] ?>
        </div> 
        

        <amp-auto-ads type="adsense" data-ad-client="ca-pub-3151537190694448"></amp-auto-ads>
    </div>
    <!-- Ads End -->


    <!-- Social Follow Start -->
    <div class="mb-3 d-none d-md-block">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <a href="https://web.facebook.com/profile.php?id=100083999477470" target="blank" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">Pintu Peradaban Com</span>
            </a>
            <a href="https://web.facebook.com/profile.php?id=100083999477470" target="blank" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">@pintuperadaban</span>
            </a>
            <a href="https://web.facebook.com/profile.php?id=100083999477470" target="blank" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">@official.ppc</span>
            </a>
            <a href="https://web.facebook.com/profile.php?id=100083999477470" target="blank" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                <span class="font-weight-medium">Pintu Peradaban</span>
            </a>
        </div>
    </div>
    <!-- Social Follow End -->

    <!-- Popular News Start -->
    <div class="d-none d-md-block">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Populer</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">

            <?php foreach ($populer as $ppr) : ?>
                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                    <div class="position-relative overflow-hidden" style="width: 150px; height: 100%;">
                        <img class="img-fluid w-100 h-100" src="/assets/img/artikel/<?= url_title($ppr['kategori'], '', true) ?>/<?= $ppr['picture'] ?>" alt="" style="object-fit: cover;">
                    </div>

                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= strtolower($ppr['kategori']) ?>"><?= $ppr['kategori'] ?></a>
                            <small><?= KelenderIna($ppr['tanggal']) ?></small>
                        </div>
                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="/<?= $ppr['slug'] ?>/<?= $ppr['time'] ?>"><?= substr($ppr['judul'], 0, 30) ?>...</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- Popular News End -->

    <!-- Newsletter Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
        </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <p>Dapatkan informasi terupdate dari kami!</p>
            <div class="input-group mb-2" style="width: 100%;">
                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                <div class="input-group-append">
                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                </div>
            </div>
            <small>Pastikan alamat email mu akif</small>
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Tags Start -->
    <div class="mb-3 d-none d-md-block">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
        </div>
        <div class="bg-white border border-top-0 p-3">
            <div class="d-flex flex-wrap m-n1">
                <?php foreach ($kategoris as $ktg) : ?>
                    <a href="/category/<?= strtolower($ktg['kategori']) ?>" class="btn btn-sm btn-outline-secondary m-1"><?= $ktg['kategori'] ?></a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- Tags End -->
