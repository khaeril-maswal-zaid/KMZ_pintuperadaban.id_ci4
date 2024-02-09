<!-- Topbar Start -->
<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="/"><?= dayina(date('l')) ?>, <?= kelenderina(date('d-m-Y')) ?></a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="/kontak">Advertise</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="/kontak">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="/adminppc">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-auto mr-n2">
                    <li class="nav-item">
                        <a class="nav-link text-body" href="/">Pintu Peradaban Site</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="/" class="navbar-brand p-0 d-none d-lg-block">
                <!-- <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-secondary font-weight-normal">News</span></h1> -->
                <img src="/assets/img/web/brand.png" alt="Pintu Perdaban" class="py-1" width="100%">
            </a>
        </div>
        <!-- Iklan -->
        <div class="col-lg-8 text-center text-lg-right">
            <amp-auto-ads type="adsense" data-ad-client="ca-pub-3151537190694448"></amp-auto-ads>
            <!-- <a href="https://htmlcodex.com"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a> -->
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="/" class=" navbar-brand d-block d-lg-none" style="max-width: 65%;">
            <!-- <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1> -->
            <h1><img src="/assets/img/web/brand.png" alt="Pintu Perdaban" class="py-1" width="100%"></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="/" class="nav-item nav-link <?= $active[0] ?>">Home</a>
                <a href="/category/news" class="nav-item nav-link <?= $active[1] ?>">Latest News</a>
                <a href="/category/opini" class="nav-item nav-link <?= $active[2] ?>">Opini</a>
                <a href="/category/the-story" class="nav-item nav-link <?= $active[3] ?>">The Story</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle <?= $active[4] ?>" data-toggle="dropdown">More Posts</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="/category/teologi" class="dropdown-item">Teologi</a>
                        <a href="/category/filsafat" class="dropdown-item">Filsafat</a>
                        <a href="/category/sosial" class="dropdown-item">Sosial</a>
                        <a href="/category/ekonomi" class="dropdown-item">Ekonomi</a>
                        <a href="/category/politik" class="dropdown-item">Politik</a>
                        <a href="/category/bisnis" class="dropdown-item">Bisnis</a>
                    </div>
                </div>
                <a href="/kontak" class="nav-item nav-link <?= $active[5] ?>">Kontak</a>
            </div>
            <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                <input type="text" class="form-control border-0" placeholder="Keyword">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary text-dark border-0 px-3"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->