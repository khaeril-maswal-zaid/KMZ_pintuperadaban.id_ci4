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
                                    <textarea id="editor"><br><br><br><br><br><br><br><br><br><br><br></textarea>
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
                                    <input type="text" placeholder="Jika memilih penulis custom" class="form-control" id="penuliscustom" aria-describedby="inputGroupPrepend" name="penuliscustom" disabled autofocus>
                                    <div class="invalid-feedback">
                                        Isikan dengan benar !
                                    </div>
                                </div>

                                <hr>
                                <div class="mt-3">
                                    <select class="form-select form-select-sm" id="validationCustomUsername12" aria-describedby="inputGroupPrepend" required name="level">
                                        <option selected disabled value="">Silahkan Pilih Level</option>
                                        <option value="1a">Utama 1</option>
                                        <option value="1b">Utama 2</option>
                                        <option value="1c">Utama 3</option>
                                        <option value="0">Umum</option>
                                        <option value="pp">Populer Post</option>
                                        <option value="no">Lewat</option>
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
                                    <input autocomplete="off" placeholder="Masukkan source gambar jika ada" type="text" class="form-control form-control-sm" id="bbb" aria-describedby="inputGroupPrepend" name="source">
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

</main>
<?php $this->endSection() ?>