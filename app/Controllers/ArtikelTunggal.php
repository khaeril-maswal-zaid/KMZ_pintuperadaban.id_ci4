<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\AdminModel;
use App\Models\CvpageModel;
use App\Models\EndorsModel;

class ArtikelTunggal extends BaseController
{
    protected $templatelayout;
    protected $classbody;

    protected $artikelmodel;
    protected $kategorimodel;
    protected $adminmodel;
    protected $cvpagemodel;

    protected $endorsmodel;

    protected $dataartikel;
    protected $artikel;
    protected $terbaru0;
    protected $terbaru12;



    public function __construct()
    {
        $this->templatelayout = ['layout2/nav-user', 'layout2/footer-user'];
        $this->classbody = 'user';
        $this->kategorimodel = new KategoriModel();
        $this->adminmodel = new AdminModel();
        $this->artikelmodel = new ArtikelModel();
        $this->cvpagemodel = new CvpageModel();
        $this->endorsmodel = new EndorsModel();

        //Ambil 2 artikel terbaru indeks 1-2
        $this->terbaru12 = $this->artikelmodel->orderBy('id', 'DESC')->findAll(2, 1);
        $this->terbaru0 = $this->artikelmodel->orderBy('id', 'DESC')->findAll(1); // Sengaja tidak mengunakan first()
    }
    //--------------------------------------------------------


    //method pages
    //........................................................
    public function artikel1($slug, $time)
    {
        $this->dataartikel = $this->artikelmodel->orlike('slug', $slug);
        // $this->dataartikel = $this->artikelmodel->orlike('time', $time);
        //Matikan dulu karena selalu salah deteksi artikel

        //Ambil data artikel 
        $this->artikel = $this->dataartikel->first();

        //Jika penulusuran tidak ada lempar ke home
        if ($this->artikel == null) {
            // return redirect()->to(URL . $this->artikel['slug'] . '/' . $this->artikel['time']);
            return redirect()->to(URL);
        }

        //Jika slug atau time tidak lengkap maka reload ulang dengan slug dan time yg lengkap
        if ($this->artikel['slug'] != $slug || $this->artikel['time'] != $time) {
            return redirect()->to(URL . $this->artikel['slug'] . '/' . $this->artikel['time']);
        }

        //ambil data yg menulis artikel by nama
        $penulis = [$this->adminmodel->where('nama', $this->artikel['oleh'])->first(), 'admin'];
        if ($penulis[0] == null) {
            $penulis = [$this->adminmodel->where('nama', 'Editor Ppc')->first(), 'web'];
        }

        //untuk class css yg aktif
        if ($this->artikel['kategori'] == 'News') {
            $active = [null, 'active', null, null, null, null];
        } elseif ($this->artikel['kategori'] == 'Opini') {
            $active = [null, null, 'active', null, null, null];
        } elseif ($this->artikel['kategori'] == 'The-story') {
            $active = [null, null, null, 'active', null, null];
        } else {
            $active = [null, null, null, null, 'active', null];
        }

        //jika artikel yg dibuka sama dengan artikl pling terbaru mka pilih yg last ke tiga
        if ($this->artikel  == $this->terbaru0[0]) {
            $this->terbaru0 =  $this->artikelmodel->orderBy('id', 'DESC')->findAll(1, 3);
        }

        //jika artikel yg dibuka sama dengan artikl pling terbaru12 mka pilih yg last ke tiga
        if ($this->artikel  == $this->terbaru12[0] || $this->artikel  == $this->terbaru12[0]) {
            $this->terbaru12 =  $this->artikelmodel->orderBy('id', 'DESC')->findAll(2, 3);
        }

        //untuk hitung data kunjungan --------------------
        $this->cvpagemodel->addcount(takeusers(), $this->artikel['id']);

        /*
        NOW  = Jumlah visit (total kunjungan) dihitung dari data di database artikel yang telah diset sejak add artikel, selanjutnya + 1 setiap laod ***** / VSISIT-2
        BISAJUGA = Jumlah visit (total kunjungan) real dari di databese visit, hitungan murni total pengnjung berdasarkan ip adress ***** / VISIT-1
        */

        $visit1 = $this->cvpagemodel->where('idartikel', $this->artikel['id'])->countAllResults(); //||Visit real|| *****
        $visit2 = $this->artikel['visit'] + 1; //||Visit set add artikel||


        /* Fiewers (Unique Visitors) adalah hitungan seseorang mengunjungi sebuah website lebih dari 1 kali, maka tetap dianggap sebagai 1 Unique Visitor*/

        $rowviewers = [];
        for ($i = 0; $i < $visit1; $i++) {
            $rowviewers[] = $this->cvpagemodel->select('deteksi')->where('idartikel', $this->artikel['id'])->findAll()[$i]['deteksi'];
        }

        $this->artikelmodel->save([
            'id'            => $this->artikel['id'],
            'visit'         =>  $visit2, //$visit1, //(ambil di databese visit atau ambil di database artikel) *****
            'view'          => count(array_unique($rowviewers))
        ]);


        //--------------------------------------------------


        $data = [
            'templatelayout' =>  $this->templatelayout,
            'classbody' =>  'home',
            'display' => ['d-block d-md-none', 'd-none d-md-block'], //v. Mobile none v. dekstop muncul

            'kategoris' =>  $this->kategorimodel->findAll(),
            'artikel' => $this->artikel,
            'penulis' => $penulis,
            'terbaru0' => $this->terbaru0[0],
            'terbaru12' => $this->terbaru12,

            //Hitung hasil kujungan web
            'visit'   => $this->artikel['visit'] + 1,
            'viewers'   => $this->artikel['view'] + 50, //tambah 50 dulu wkwkw


            //POPULER
            'populer' => [
                'pp1' => $this->artikelmodel->special('level', 'populer-post', 1)[0],  //untuk populer post ke 1
                'populerviwers' => $this->artikelmodel->where('slug', 'memaknai-humanisme-dalam-konteks-kemuhammadiyahan')->first(), //ditentukan manual saja dulu //untuk populer post ke 2
                'utamapast' => $this->artikelmodel->like('level', 'main')->orderBy('id', 'DESC')->findAll(1, 3)[0], //untuk populer post ke 3
                'umumpast' => $this->artikelmodel->where('level', 'general')->orderBy('id', 'DESC')->findAll(1, 4)[0],  //untuk populer post ke 4
                'pp1past' => $this->artikelmodel->where('level', 'populer-post')->orderBy('id', 'DESC')->findAll(1, 1)[0],  //untuk populer post 5
            ],

            'endors' => $this->endorsmodel->findAll(),

            'description' => $this->artikel['description'],
            'url' => URL . $this->artikel['slug'] . '/' . $this->artikel['time'],
            'title' => $this->artikel['judul'],
            'image' => URL . 'assets/img/artikel/' . strtolower($this->artikel['kategori']) . '/' . $this->artikel['picture'],
            'time' => $this->artikel['time'],

            'active' => $active
        ];

        return view('artikel/artikel1', $data);
    }
}
