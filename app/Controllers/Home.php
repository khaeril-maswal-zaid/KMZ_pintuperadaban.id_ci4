<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\AdminModel;
use App\Models\EndorsModel;


class Home extends BaseController
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


        //hapus session setiap load index home
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();

        //KALAU MAU GUNAKAN UTAMA A,B,C (Cocok jika Website sudah besar).....................
        //Ambil artikel utama (1)a,b,c
        // $this->utama = [];
        // for ($i = "a"; $i < "d"; $i++) {
        //     $this->utama[] = $this->artikelmodel->special('level', '1' . $i, 1)[0];
        // }

        //Ambil masing2 artikel terbaru di Opini, Politik, Teologi, Filsafat, Ekonomi, Sosial
        $this->artKtg = [];
        foreach ($this->kategorimodel->findAll() as $kategoris) {
            $this->artKtg[] = $this->artikelmodel->kategori($kategoris['kategori']);
        }
    }

    public function postedarticle($data)
    {
        //ambil data yg menulis artikel  by nama untuk fotonya
        $penulis = [$this->adminmodel->where('nama', $data)->first()['foto'], 'admin'];

        if ($penulis[0] == null) {
            $penulis = [$this->adminmodel->where('nama', 'User Default')->first(), 'web'];
        }

        return $penulis;
    }


    public function index()
    {
        $data = [
            'active' => ['active', null, null, null, null, null],
            'templatelayout' =>  $this->templatelayout,
            'classbody' =>  'home',
            'display' => ['d-none d-md-block', 'd-block d-md-none'], //Display bagian populer none | optional 'd-none' / 'd-none d-md-block' |Tidak tergunakan
            'iklan' => '<amp-auto-ads type="adsense" data-ad-client="ca-pub-3151537190694448"></amp-auto-ads>', //klw di home di bagian kanan munculkan iklan


            'kategoris' =>  $this->kategorimodel->findAll(),
            'artkelKtg' => $this->artKtg,

            // 'utama' => $this->utama, //KALAU MAU GUNAKAN UTAMA A,B,C (Cocok jika Website sudah besar)
            'utama' => $this->artikelmodel->special('level', 'main', 3),
            'umum' => $this->artikelmodel->special('level', 'general', 4),
            'news' => $this->artikelmodel->special('kategori', 'news', 4),

            //POPULER
            'populer' => [
                'pp1' => $this->artikelmodel->special('level', 'populer-post', 1)[0],  //untuk populer post ke 1
                'populerviwers' => $this->artikelmodel->where('slug', 'memaknai-humanisme-dalam-konteks-kemuhammadiyahan')->first(), //ditentukan manual saja dulu //untuk populer post ke 2
                'utamapast' => $this->artikelmodel->like('level', 'main')->orderBy('id', 'DESC')->findAll(1, 3)[0], //untuk populer post ke 3
                'umumpast' => $this->artikelmodel->where('level', 'general')->orderBy('id', 'DESC')->findAll(1, 4)[0],  //untuk populer post ke 4
                'pp1past' => $this->artikelmodel->where('level', 'populer-post')->orderBy('id', 'DESC')->findAll(1, 1)[0],  //untuk populer post 5
            ],

            'penulis' => $this->postedarticle($this->artKtg[6]['oleh']), //untuk kategori
            'penulis2' => $this->postedarticle($this->artikelmodel->special('kategori', 'news', 4)[0]['oleh']), //untuk news
            'endors' => $this->endorsmodel->findAll(),


            'description'   => "Menebar Kebaikan dan Manfaat Melalui Mimbar Informasi, Literasi Universal, Autentik, Serta Berkemajuan.",
            'url'           => "https://pintuperadaban.com",
            'title'         => "Pintu Peradaban.Com",
            'image'         => "https://pintuperadaban.com/assets/img/web/pp.png",
            'time'          => 1652850000
        ];

        return view('home/index',  $data);
    }
}
