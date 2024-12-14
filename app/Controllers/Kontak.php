<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\EndorsModel;

class Kontak extends BaseController
{
    protected $templatelayout;
    protected $classbody;
    protected $endorsmodel;

    protected $artikelmodel;
    protected $kategorimodel;


    public function __construct()
    {
        $this->templatelayout = ['layout2/nav-user', 'layout2/footer-user'];
        $this->classbody = 'user';

        $this->kategorimodel = new KategoriModel();
        $this->artikelmodel = new ArtikelModel();
        $this->endorsmodel = new EndorsModel();
    }
    //--------------------------------------------------------


    //method pages
    //........................................................
    public function index()
    {
        $data = [
            'active' => [null, null, null, null, null, 'active'],
            'templatelayout' =>  $this->templatelayout,
            'classbody' =>  'home',
            'display' => 'd-none',  //klw di artikel bagian populer muncul

            'kategoris' =>  $this->kategorimodel->findAll(),
            'endors' => $this->endorsmodel->findAll(),

            //POPULER
            'populer' => [
                'pp1' => $this->artikelmodel->special('level', 'populer-post', 1)[0],  //untuk populer post ke 1
                'populerviwers' => $this->artikelmodel->where('slug', 'memaknai-humanisme-dalam-konteks-kemuhammadiyahan')->first(), //ditentukan manual saja dulu //untuk populer post ke 2
                'utamapast' => $this->artikelmodel->like('level', 'main')->orderBy('id', 'DESC')->findAll(1, 3)[0], //untuk populer post ke 3
                'umumpast' => $this->artikelmodel->where('level', 'general')->orderBy('id', 'DESC')->findAll(1, 4)[0],  //untuk populer post ke 4
                'pp1past' => $this->artikelmodel->where('level', 'populer-post')->orderBy('id', 'DESC')->findAll(1, 1)[0],  //untuk populer post 5
            ],

            'description'   => "Menebar Kebaikan dan Manfaat Melalui Mimbar Informasi, Literasi Universal, Autentik, Serta Berkemajuan.",
            'url'           => URL,
            'title'         => "Pintu Peradaban.Com",
            'image'         => URL . "/assets/img/web/pp.png",
            'time'          => 1652850000
        ];

        echo view('kontak/index', $data);
    }
}
