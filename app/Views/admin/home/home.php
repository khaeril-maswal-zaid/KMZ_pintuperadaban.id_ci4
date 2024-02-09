<?php $this->extend('layout/template') ?>

<?php $this->section('content') ?>

<?php
$namexp = explode(" ", $adminlogin['nama']);
$nickname = $namexp[0] . ' ' . $namexp[1][0] . "...";
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="p-md-5 p-4 bg-light rounded-3 mt-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Selamat Datang,...
            </h1>
            <h2 class="mb-3"><?= $adminlogin['nama'] ?></h2>
            <!-- <h2 class="mb-4">di situs "<?= BRAND ?> .Com"</h2> -->
            <p class="col-md-8 fs-4">Di situs <span class="fst-italic">"Pintu Peradaban.Com"</span>, Menebar Kebaikan dan Manfaat Melalui Mimbar Informasi, Literasi Universal, Autentik, Serta Berkemajuan.</p>
            <button class="btn btn-primary btn-lg mt-3" type="button">Sign Out</button>
        </div>
    </div>

    <!-- footer -->
    <?= $this->include("layout/footer-pages"); ?>
</main>


<?php $this->endSection() ?>