<?php $this->extend('layout/template') ?>

<?php $this->section('content') ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 border-bottom">
        <h1 class="h2">Tabel Endors</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-primary">Tambah Endors</button>
        </div>
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

    <div class="row">
        <div class="col-md-7">
            <div class="table-responsive mt-3 mb-md-0 mt-4">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Aksi</th>

                            <th>Brand</th>
                            <th>Posisi</th>
                            <th>No WA</th>
                            <th>Isi Chat</th>
                        </tr>
                    </thead>

                    <tbody id="getforfilter">
                        <?php
                        $no = 1;
                        foreach ($endors as $end) :
                        ?>

                            <tr class="align-middle">
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center" style="min-width: 120px;">
                                    <!-- <a href="/adminppcproses/deleteendors/<?= $end['id'] ?>" class="btn btn-danger btn-sm">Hapus</a> -->
                                    <button class="btn btn-info btn-sm edit-endors" data-bs-toggle="modal" data-bs-target=".staticBackdrop" data-id="<?= $end['id'] ?>">Edit</button>
                                    <button class="btn btn-success btn-sm">View</button>
                                </td>

                                <td><?= $end['brand'] ?></td>
                                <td><?= $end['position'] ?></td>
                                <td><?= $end['wa'] ?></td>
                                <td><?= $end['chat'] ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-5 border text-center">
            <!-- akan disini card informasi tentang Endors -->
            akan disini card informasi tentang Endors

        </div>

    </div>


    <!-- footer -->
    <?= $this->include("layout/footer-pages"); ?>

</main>

<!-- Modal -->
<div class="modal fade staticBackdrop" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Edit Endors</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form method="post" class="needs-validation" novalidate action="/adminppcproses/addendors">
                <input type="hidden" name="id" value="" id="hidden-id">
                <?= csrf_field() ?>

                <div class="modal-body pt-1">
                    <div class="row">
                        <div class="input-group has-validation mt-2">
                            <input id="input-brand" autocomplete="off" placeholder="Brand" type="text" class="form-control" aria-describedby="inputGroupPrepend" required name="brand">
                            <div class="invalid-feedback">
                                Isikan dengan benar !
                            </div>
                        </div>

                        <div class="input-group has-validation mt-2">
                            <input id="input-idbrand" autocomplete="off" placeholder="Id Brand" type="text" class="form-control" aria-describedby="inputGroupPrepend" required name="idbrand">
                            <div class="invalid-feedback">
                                Isikan dengan benar !
                            </div>
                        </div>

                        <div class="input-group has-validation mt-2">
                            <input id="input-wa" autocomplete="off" placeholder="WA" type="number" class="form-control" aria-describedby="inputGroupPrepend" required name="wa">
                            <div class="invalid-feedback">
                                Isikan dengan benar !
                            </div>
                        </div>

                        <div class="form-floating mt-2">
                            <textarea class="form-control" id="input-chat" placeholder="Isi Chat" style="height: 100px" name="chat"></textarea>
                            <label for="chat">&nbsp;&nbsp;&nbsp;Isi Chat :</label>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Edit Endors</button>
                </div>
            </form>

        </div>
    </div>
</div>


<?php $this->endSection() ?>