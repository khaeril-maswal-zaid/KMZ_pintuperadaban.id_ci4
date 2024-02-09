    <header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center" href="/adminppc/<?= url_title($adminlogin['nama'], '-', true) ?>"><?= BRAND ?></a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>

    <!-- tag penutup ada di footer-admin -->
    <div class="container-fluid">
      <!-- tag penutup ada di footer-admin -->
      <div class="row">


        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky">

            <div class="d-flex flex-column flex-shrink-0 p-3">
              <ul class="list-unstyled ps-0">
                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed active" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    <span data-feather="home" class="mx-1"></span> Home
                  </button>
                  <div class="collapse" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="/adminppc/<?= url_title($adminlogin['nama'], '-', true) ?>" class="link-dark rounded"><span data-feather="home" class="mx-1"></span>Home</a></li>
                      <li><a href="/webmail" target="blank_" class="link-dark rounded"><span data-feather="mail" class="mx-1"></span>Email :</a> official@pintuperadaban.com <br> Pass : peradaban165_</li>
                    </ul>
                  </div>
                </li>

                <hr>


                <?php
                foreach ($kategori as $ktg) :
                ?>

                  <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#<?= url_title($ktg['kategori'], '', true)  ?>" aria-expanded="false">
                      <span data-feather="<?= $ktg['icon'] ?>" class="mx-1"></span><?= $ktg['kategori'] ?>
                    </button>

                    <div class="collapse" id="<?= url_title($ktg['kategori'], '', true)  ?>">

                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/adminppc/artikel/<?= strtolower($ktg['kategori']) ?>" class="link-dark rounded"><span data-feather="edit" class="mx-1"></span>Buat Artikel</a></li>
                        <li><a href="#" class="link-dark rounded"><span data-feather="message-square" class="mx-1"></span>Komentar Public</a></li>
                      </ul>

                    </div>
                  </li>

                <?php endforeach ?>

                <hr>
              </ul>

              <div class="dropdown profil-admin p-1 m-1 bg-secondary">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="/assets/img/admin/<?= $adminlogin['foto'] ?>" alt="<?= $adminlogin['foto'] ?>" width="50" height="50" class="rounded-circle me-2" class="img-thumbnail">
                  <strong class="text-white"><?= $adminlogin["nama"] ?></strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                  <li><a href="/adminppc/endors" class="dropdown-item">Endors</a></li>
                  <li><a href="#" class="dropdown-item">Admin</a></li>
                  <li><a href="/adminppc/kategori" class="dropdown-item">Kategori</a></li>
                  
                  <li><a class="dropdown-item" href="/adminppc/shareemail/truncate">Trunc. Dtb Emailed</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="/">Sign out</a></li>
                </ul>
              </div>
            </div>

          </div>
        </nav>