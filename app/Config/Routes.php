<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * KHUSUS ADMIN 
 * --------------------------------------------------------------------
*/

//AbouT Artikel----------------------------------------------------------------------
$routes->get('/adminppc', 'Adminppc');
$routes->get('/adminppc/artikel/(:any)', 'Adminppc::artikel/$1');
$routes->get('/adminppc/artikel/(:any)/(:any)/(:any)', 'Adminppc::artikel/$1/$2/$3');
$routes->get('/adminppc/kategori', 'Adminppc::kategori');
$routes->get('/adminppc/endors', 'Adminppc::Endors');
$routes->post('/adminppc/queriajaxeditendors', 'AdminppcProses::queriajaxeditendors');


//Proses Login Admin
$routes->post('/adminppc/proseslogin', 'AdminppcProses::proseslogin');
//Add artikel
$routes->post('/adminppcproses/tambahartikel', 'AdminppcProses::tambahArtikel');
//Add KATEGORI
$routes->post('/adminppcproses/addkategori', 'AdminppcProses::addkategori');
$routes->get('/adminppcproses/deletekategori/(:any)/(:any)', 'AdminppcProses::deletekategori/$1/$2');
//Add endors
$routes->post('/adminppcproses/addendors', 'AdminppcProses::addendors');
$routes->get('/adminppcproses/deleteendors/(:any)', 'AdminppcProses::deleteendors/$1');

//Email
$routes->get('/adminppc/shareemail/truncate', 'ShareEmail::truncate');
$routes->get('/adminppc/shareemail/sendedto/(:any)/(:any)', 'ShareEmail::sendedto/$1/$2');
$routes->get('/adminppc/shareemail/(:any)/(:any)', 'ShareEmail/$1/$2');



// Post Foto menggunakan Ajax
$routes->post('/postfotoajaxl/(:any)/(:any)', function ($judulberita, $location) {
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = url_title($judulberita, '-', true) . '.' . $ext;

    move_uploaded_file($_FILES["file"]["tmp_name"], "assets/img/artikel/" . $location . "/" . $name);

    echo '<img src="/assets/img/artikel/' . $location . "/" . $name . '" style="width: 100%;" class="img-thumbnail" />';
    echo '<input type="hidden" name="fotopost" value="' . $name . '">';
});



//home admin harus paling bawah agar tdk menimpa
$routes->get('/adminppc/(:any)', 'Adminppc::home/$1');



/*
 * --------------------------------------------------------------------
 * END KHUSUS ADMIN 
 * --------------------------------------------------------------------
*/


//LINK API
$routes->get('/api/artikel-populer/(:any)', 'ApiPpc::populerpost/$1'); //API Populer



//Artikel Kategori
$routes->get('/category/(:any)', 'Category::index/$1');

//Artikel Tunggal
$routes->get('/(:any)/(:any)', 'ArtikelTunggal::artikel1/$1/$2');
