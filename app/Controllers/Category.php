<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\AdminModel;
use App\Models\EndorsModel;


class Category extends BaseController
{
    protected $templatelayout;
    protected $classbody;

    protected $kategorimodel;
    protected $artikelmodel;
    protected $adminmodel;
    protected $countviewrs;

    protected $endorsmodel;

    protected $artKtg;
    protected $utama;


    public function __construct()
    {
        $this->templatelayout = ['layout2/nav-user', 'layout2/footer-user'];
        $this->classbody = 'user';

        $this->kategorimodel = new KategoriModel();
        $this->artikelmodel = new ArtikelModel();
        $this->adminmodel = new AdminModel();
        $this->endorsmodel = new EndorsModel();


        //KALAU MAU GUNAKAN UTAMA A,B,C (Cocok jika Website sudah besar).....................
        //Ambil artikel utama (1)a,b,c
        // $this->utama = [];
        // for ($i = "a"; $i < "d"; $i++) {
        //     $this->utama[] = $this->artikelmodel->special('level', '1' . $i, 1)[0];
        // }
    }

    public function postedarticle($data)
    {
        //ambil data yg menulis artikel  by nama untuk fotonya
        if ($this->adminmodel->where('nama', $data)->first() == null) {
            $penulis = [$this->adminmodel->where('nama', 'User Default')->first()['foto'], 'web'];
        } else {
            $penulis = [$this->adminmodel->where('nama', $data)->first()['foto'], 'admin'];
        }

        return $penulis;
    }


    public function index($ktg)
    {
        //untuk class css yg aktif
        if ($ktg == 'news') {
            $active = [null, 'active', null, null, null, null];
        } elseif ($ktg == 'opini') {
            $active = [null, null, 'active', null, null, null];
        } elseif ($ktg == 'the-story') {
            $active = [null, null, null, 'active', null, null];
        } else {
            $active = [null, null, null, null, 'active', null];
        }

        $data = [
            'active' => $active,
            'templatelayout' =>  $this->templatelayout,
            'classbody' =>  'home',
            'display' => ['d-block d-md-none', 'd-none d-md-block'], //klw di Home bagian populer none | optional 'd-none' / 'd-none d-md-block'
            'iklan' => '<amp-auto-ads type="adsense" data-ad-client="ca-pub-3151537190694448"></amp-auto-ads>', //klw di home di bagian kanan munculkan iklan
            'kategoris' =>  $this->kategorimodel->findAll(),
            'kategori' => $ktg, // dari parameter

            // 'utama' => $this->utama, //KALAU MAU GUNAKAN UTAMA A,B,C (Cocok jika Website sudah besar)
            'utama' => $this->artikelmodel->special('level', 'main', 3),
            'umum' => $this->artikelmodel->special('level', 'general', 4),

            //POPULER => tidak berguna di sini cuma agar di right tdk error
            'populer' => [
                'pp1' => $this->artikelmodel->special('level', 'populer-post', 1)[0],  //untuk populer post ke 1
                'populerviwers' => $this->artikelmodel->where('slug', 'memaknai-humanisme-dalam-konteks-kemuhammadiyahan')->first(), //ditentukan manual saja dulu //untuk populer post ke 2
                'utamapast' => $this->artikelmodel->like('level', 'main')->orderBy('id', 'DESC')->findAll(1, 3)[0], //untuk populer post ke 3
                'umumpast' => $this->artikelmodel->where('level', 'general')->orderBy('id', 'DESC')->findAll(1, 4)[0],  //untuk populer post ke 4
                'pp1past' => $this->artikelmodel->where('level', 'populer-post')->orderBy('id', 'DESC')->findAll(1, 1)[0],  //untuk populer post 5
            ],

            'artikelcategoryBig' => $this->artikelmodel->where('kategori', $ktg)->orderBy('id', 'DESC')->findAll(4, 0),
            'artikelcategorySmall' => $this->artikelmodel->where('kategori', $ktg)->orderBy('id', 'DESC')->findAll(6, 4),

            'penulis2' => $this->postedarticle($this->artikelmodel->special('kategori', 'news', 4)[0]['oleh']), //untuk news
            'endors' => $this->endorsmodel->findAll(),


            'description'   => "Menebar Kebaikan dan Manfaat Melalui Mimbar Informasi, Literasi Universal, Autentik, Serta Berkemajuan.",
            'url'           => URL,
            'title'         => "Pintu Peradaban.Com",
            'image'         => URL . "assets/img/web/pp.png",
            'time'          => 1652850000
        ];
        // dd($data['artikelcategoryBig']);

        return view('artikel/artikelcategory',  $data);
    }
}
