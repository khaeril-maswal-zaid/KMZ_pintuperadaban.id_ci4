<?php $this->extend('layout/template') ?>

<?php $this->section('content') ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h1 class="h6">Artikel "<?=$judulArt?>" Sended to <?=$sendtoCount?> Email</h1>
    </div>
    
    <div class="table-responsive mt-3 mb-md-0 mt-4">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Send to</th>
                    <th>More</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($sendto as $st) :
                ?>

                    <tr class="align-middle">
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="#"><?= $st['emailsended'] ?></td>
                        <td class="text-center"></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- footer -->
    <?= $this->include("layout/footer-pages"); ?>
</main>


<?php $this->endSection() ?>