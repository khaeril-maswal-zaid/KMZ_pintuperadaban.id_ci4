<!-- Footer Start -->
<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-3">
    <div class="row py-4">
        <div class="col-lg-4 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Berdikari C, Jln. Ahmad Yani, Bulukumba</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>62 853-4365-2494 / 62 853-4043-4280</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>official@pintuperadaban.com</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://web.facebook.com/profile.php?id=100083999477470"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://web.facebook.com/profile.php?id=100083999477470"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://web.facebook.com/profile.php?id=100083999477470"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="https://web.facebook.com/profile.php?id=100083999477470"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular Peradaban</h5>

            <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= strtolower($populer['pp1']['kategori']) ?>"><?= $populer['pp1']['kategori'] ?></a>
                    <small><?= KelenderIna($populer['pp1']['tanggal']) ?></small>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="/<?= $populer['pp1']['slug'] ?>/<?= $populer['pp1']['time'] ?>"><?= substr($populer['pp1']['judul'], 0, 30) ?></a>
            </div>

            <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= strtolower($populer['populerviwers']['kategori']) ?>"><?= $populer['populerviwers']['kategori'] ?></a>
                    <small><?= KelenderIna($populer['populerviwers']['tanggal']) ?></small>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="/<?= $populer['populerviwers']['slug'] ?>/<?= $populer['populerviwers']['time'] ?>"><?= substr($populer['populerviwers']['judul'], 0, 30) ?></a>
            </div>

            <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/category/<?= strtolower($populer['pp1past']['kategori']) ?>"><?= $populer['pp1past']['kategori'] ?></a>
                    <small><?= KelenderIna($populer['pp1past']['tanggal']) ?></small>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="/<?= $populer['pp1past']['slug'] ?>/<?= $populer['pp1past']['time'] ?>"><?= substr($populer['pp1past']['judul'], 0, 30) ?></a>
            </div>

        </div>

        <div class="col-lg-4 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
            <div class="m-n1">
                <?php foreach ($kategoris as $ktg) : ?>
                    <a href="/category/<?= strtolower($ktg['kategori']) ?>" class="btn btn-sm btn-secondary m-1"><?= $ktg['kategori'] ?></a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="/">Pintu Perdaban.Com</a>. All Rights Reserved.
        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Design by <a href="https://htmlcodex.com">HTML Codex</a>
    </p>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>