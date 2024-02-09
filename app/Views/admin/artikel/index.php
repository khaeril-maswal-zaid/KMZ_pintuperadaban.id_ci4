<?php $this->extend('layout/template') ?>

<?php $this->section('content') ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
        <h1 class="h2">Tabel Artikel <?= $jenis ?></h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Post Artikel <?= $jenis ?></button>
        </div>
    </div>

    <div class="pt-3 pb-2 border-bottom d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <span></span>
        <form action="/admin/dtb-penduduk" method="post">
            <?= csrf_field() ?>

            <div class="btn-toolbar mb-2 mb-md-0">
                <select class="form-select form-select-sm" style="width: 140px;" id="filter-pendidikan" name="filter-bulan">
                    <option value="">Semua Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>

                <select class="form-select form-select-sm mx-1" style="width: 130px;" id="filter-pendidikan" name="filter-tahun">
                    <option value="">Semua Tahun</option>
                    <?php foreach ($filterallnews[0] as $yposting) : ?>
                        <option><?= $yposting ?></option>
                    <?php endforeach; ?>
                </select>

                <select class="form-select form-select-sm" style="width: 165px;" id="filter-sdhk" name="filter-oleh">
                    <option value="">Semua Postingan</option>
                    <?php foreach ($filterallnews[1] as $oleh) : ?>
                        <option><?= $oleh ?></option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" class="btn btn-sm btn-secondary mx-1">Go</button>
            </div>
        </form>
    </div>

    <?php if (session()->getFlashdata('alert')) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <strong><?= session()->getFlashdata('alert') ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <div class="table-responsive mt-3 mb-md-0 mt-4">
        <table id="example" class="table table-sm table-bordered table-striped" style="width:100%;">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Waktu</th>
                    <!-- <th>Picture</th> -->
                    <th>Judul</th>
                    <th>Oleh</th>
                    <!-- <th>Kategori</th> -->
                    <th>Level</th>
                </tr>
            </thead>

            <tbody id="getforfilter">
                <?php
                $no = 1;
                foreach ($artikel as $art) :
                ?>

                    <tr class="align-middle">
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                  Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                  <li><a href="/<?= $art['slug'] ?>/<?= $art['time'] ?>" class="dropdown-item" target="_blank">View</a></li>
                                  <li><a href="#" class="dropdown-item">Hapus</a></li>
                                  <li><a href="/adminppc/edit/<?= $art['slug'] ?>/<?= $art['time'] ?>" class="dropdown-item">Edit</a></li>
                                  <li><a href="https://api.whatsapp.com/send?phone=6285343652494/&amp;text=*<?= $art['judul'] ?>*%0A%0Ahttps://pintuperadaban.com/<?= $art['slug'] ?>/<?= $art['time'] ?>%0A%0A*Pintu Peradaban .Com*%0A_Menebar%20kebaikan%20dan%20manfaat%20melalui%20mimbar%20informasi,%20literasi%20universal,%20autentik,%20serta berkemajuan._" class="dropdown-item" target="_blank">Share WA</a></li>
                                  <li class="dropdown-item">
                                      <a href="/adminppc/shareemail/<?= $art['slug'] ?>/<?= $art['time'] ?>">Share Email</a> | 
                                      <a href="/adminppc/shareemail/sendedto/<?= $art['slug'] ?>/<?= $art['time'] ?>">165</a>
                                  </li>
                                </ul>
                            </div>
                        </td>
                        <td class="text-center"><?= kelenderina($art['tanggal']) ?> || <?= $art['waktu'] ?></td>
                        <!-- <td class="text-center">
                            <div class="overflow-hidden" style="height:55px;">
                                <img src="/assets/img/artikel/<?= strtolower($jenis) ?>/<?= $art['picture'] ?>" style="width:100px;" alt="<?= $art['picture'] ?>">
                            </div>
                        </td> -->
                        <td><?= $art['judul'] ?></td>
                        <td><?= $art['oleh'] ?></td>
                        <!-- <td><?= $art['kategori'] ?></td> -->
                        <td><?= $art['level'] ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- FOOTER -->
    <footer class="position-relative bottom-0 end-0 start-0">
        <div class="bg-dark text-white text-center py-4">
            <span>Copyright © 2022; Designed &amp; Devaloper by Al~Zaid </span>
        </div>
    </footer>
</main>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 65%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Post Artikel <?= $jenis ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form method="post" class="needs-validation" novalidate action="/adminppcproses/tambahartikel">
                <?= csrf_field() ?>

                <div class="modal-body pt-1">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="input-group has-validation mt-2">
                                <input autocomplete="off" placeholder="Judul artikel" type="text" class="form-control" id="judulberita" aria-describedby="inputGroupPrepend" required name="judul">
                                <div class="invalid-feedback">
                                    Isikan dengan benar !
                                </div>
                            </div>
                            <div class="input-group has-validation mt-2">
                                <input autocomplete="off" placeholder="Description artikel" type="text" class="form-control" aria-describedby="inputGroupPrepend" required name="description">
                                <div class="invalid-feedback">
                                    Isikan dengan benar !
                                </div>
                            </div>

                            <div class="input-group has-validation mt-2">
                                <textarea id="editor"><strong style="color:#31404B;">PINTUPERADABAN.COM, BULUKUMBA-&nbsp;</strong>Berita anda<br><br><br><br><br><br><br><br><br><br></textarea>
                                <div class="invalid-feedback">
                                    Isikan dengan benar !
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="mt-2">
                                <select class="form-select form-select-sm" name="olehdefault" id="olehselect">
                                    <option selected disabled value="">Silahkan Pilih Penulis</option>
                                    <option><?= $adminlogin['nama'] ?></option>
                                    <option value="">Custom</option>
                                </select>
                            </div>

                            <div class="input-group-sm has-validation mt-1">
                                <input type="text" placeholder="Jika memilih penulis custom" class="form-control" id="penuliscustom" aria-describedby="inputGroupPrepend" name="penuliscustom" required disabled autofocus>
                                <div class="invalid-feedback">
                                    Isikan dengan benar !
                                </div>
                            </div>

                            <hr>
                            <div class="mt-3">
                                <select class="form-select form-select-sm" id="validationCustomUsername12" aria-describedby="inputGroupPrepend" required name="level">
                                    <option selected disabled value="">Silahkan Pilih Level</option>
                                    <option value="main">Utama</option>
                                    <option value="general">Umum</option>
                                    <option value="populer-post">Populer Post</option>
                                    <option value="past">Lewat</option>
                                </select>
                            </div>
                            <hr>

                            <div class="input-group-sm has-validation mt-3">
                                <input type="file" class="form-control" required id="pictureartikel" aria-describedby="inputGroupPrepend" name="picture">
                                <div class="invalid-feedback">
                                    Isikan dengan benar !
                                </div>
                            </div>

                            <div id="uploaded" class="mt-1">
                                <img src="/assets/img/web/df2.jpg" style="width: 100%;" class="img-thumbnail">
                            </div>

                            <div class="input-group has-validation mt-1">
                                <input autocomplete="off" placeholder="Masukkan source gambar jika ada" type="text" class="form-control form-control-sm" id="bbb" aria-describedby="inputGroupPrepend" name="source" required>
                                <div class="invalid-feedback">
                                    Isikan dengan benar !
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <textarea name="artikel" id="artikelpost" class="invisible"></textarea>
                    <button type="submit" class="btn btn-primary" name="kategori" value="<?= $jenis ?>" id="submit">Tambahkan</button>
                </div>
            </form>

        </div>
    </div>
</div>


<?php $this->endSection() ?>