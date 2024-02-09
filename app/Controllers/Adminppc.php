<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\EndorsModel;

class Adminppc extends BaseController
{
    protected $session;
    protected $adminlogin;

    protected $templatelayout;
    protected $classbody;

    protected $adminmodel;
    protected $artikelmodel;
    protected $kategorimodel;
    protected $endorsmodel;

    public function __construct()
    {
        $this->session = session();

        $this->templatelayout = ['layout/nav-admin', 'layout/footer-admin'];
        $this->classbody = 'admin';

        $this->adminmodel = new AdminModel();
        $this->kategorimodel = new KategoriModel();
        $this->endorsmodel = new EndorsModel();

        if ($this->session->get("adminlogin")) {

            //Ambil id admin login untuk queri
            $id = $this->session->get("adminlogin");
            $this->adminlogin = $this->adminmodel->where('id', $id)->first();
        }
    }
    //--------------------------------------------------------


    //method pages
    //........................................................
    public function index()
    {

        // echo (password_hash("peradaban165", PASSWORD_DEFAULT));
        // die;

        $data = [
            'title' => 'Admin | Login',
            'templatelayout' =>  ['layout/nav-pages', 'layout/footer-pages'],
            'classbody' =>  'home'
        ];

        echo view('admin/index/index', $data);

        hapussession($this->session, 'adminlogin');
    }

    public function home()
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }


        $data = [
            'title' => "Admin | " . $this->adminlogin['nama'],
            'templatelayout' =>  $this->templatelayout,
            'classbody' =>  $this->classbody,

            'adminlogin' => $this->adminlogin,

            //Untuk Kategori di SIDEBAR ADMIN
            'kategori' => $this->kategorimodel->findAll()
        ];

        return view('admin/home/home', $data);
    }

    public function artikel($jenis)
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        $this->artikelmodel = new ArtikelModel;

        $data = [
            'title' => "Admin | " . $this->adminlogin['nama'],
            'templatelayout' =>  $this->templatelayout,
            'classbody' =>  $this->classbody,

            'adminlogin' => $this->adminlogin,
            'jenis' => ucwords($jenis),
            'filterallnews' =>  $this->artikelmodel->filterAllArtikel($jenis),
            'artikel' => $this->artikelmodel->where('kategori', $jenis)->orderBy('id', 'DESC')->findAll(),

            //Untuk Kategori di SIDEBAR ADMIN
            'kategori' => $this->kategorimodel->findAll()
        ];

        return view('admin/artikel/index', $data);
    }

    public function kategori()
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        $data = [
            'title' => "Admin | " . $this->adminlogin['nama'],
            'templatelayout' =>  $this->templatelayout,
            'classbody' =>  $this->classbody,

            'adminlogin' => $this->adminlogin,
            'kategori' => $this->kategorimodel->findAll(),
        ];

        return view('admin/kategori/index', $data);
    }

    public function Endors()
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        $data = [
            'title' => "Admin | " . $this->adminlogin['nama'],
            'templatelayout' =>  $this->templatelayout,
            'classbody' =>  $this->classbody,

            'adminlogin' => $this->adminlogin,
            'kategori' => $this->kategorimodel->findAll(), // untuk di nav admin
            'endors' => $this->endorsmodel->findAll(),
        ];

        return view('admin/endors/index', $data);
    }
}
