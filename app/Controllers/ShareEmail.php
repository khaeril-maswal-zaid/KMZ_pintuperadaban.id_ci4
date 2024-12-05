<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\LanggananModel;
use App\Models\EmailsendedModel;

class ShareEmail extends BaseController
{
    protected $templatelayout;
    protected $classbody;
    protected $session;

    protected $dataartikel;

    protected $artikelmodel;
    protected $langgananmodel;

    protected $adminlogin;
    protected $adminmodel;

    protected $kategorimodel;

    protected $countEmail;
    protected $emailsended;

    public function __construct()
    {
        $this->templatelayout = ['layout/nav-admin', 'layout/footer-admin'];
        $this->classbody = 'admin';

        $this->session = session();
        $this->adminmodel = new AdminModel;

        $this->artikelmodel = new ArtikelModel();
        $this->langgananmodel = new LanggananModel();
        $this->kategorimodel = new KategoriModel();
        $this->emailsended = new EmailsendedModel();

        if ($this->session->get("adminlogin")) {

            //Ambil id admin login untuk queri
            $id = $this->session->get("adminlogin");
            $this->adminlogin = $this->adminmodel->where('id', $id)->first();
        }
    }

    public function index($slug, $time)
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        //Ambil data email dari API camaba UMB 2021 & 2022 ***
        $datajson1 = file_get_contents("https://lipmb.umbulukumba.ac.id/APIcamaba/?select=email&database=2023");
        $datajson2 = file_get_contents("https://lipmb.umbulukumba.ac.id/APIcamaba/?select=email&database=2022");
        $datajson3 = file_get_contents("https://lipmb.umbulukumba.ac.id/APIcamaba/?select=alamat_email&database=2021");

        // dd($datajson2);

        $rowsemail2 = json_decode($datajson1, TRUE);
        $rowsemail3 = json_decode($datajson2, TRUE);
        $rowsemail4 = json_decode($datajson3, TRUE);

        $this->dataartikel = $this->artikelmodel->orlike('slug', $slug);
        $this->dataartikel = $this->artikelmodel->orlike('time', $time);

        //Ambil data artikel 
        $dataartikel = $this->dataartikel->first();

        //Ambil data email dari tabel langganan di database internal ***
        $langganan = $this->langgananmodel->select('email')->findAll();

        $expArtikel = explode('</p>', $dataartikel['artikel']);

        $rowsemail1 = [];
        foreach ($langganan as $lgn) {
            $rowsemail1[] = $lgn['email'];
        }


        $rowsemailG = array_merge($rowsemail1, $rowsemail2, $rowsemail3, $rowsemail4); //Gabungkan Aray email dari 3 sumber
        $rowsemailU = array_unique($rowsemailG); // Gabungkan Array duplicate
        $rowsemailIm = implode('*||*', $rowsemailU); // Jadikan string terlebih dahulu
        $rowsemail = explode('*||*', $rowsemailIm); // dari string jadikan Array supya index berurut

        $confemail = \Config\Services::email();

        // dd($rowsemail);

        $case_insensitive = $this->emailsended->where('idartikel', $dataartikel['id'])->countAllResults();
        define('IIE', $case_insensitive);

        for ($ii = IIE; $ii < (50 + IIE); $ii++) { // 50+IIE
            $confemail->setTo($rowsemail[$ii]); //muhammadkhaerilzaid@gmail.com || $rowsemail[$ii]
            $confemail->setFrom('official@pintuperadaban.com', 'Pintu Peradaban.Com');
            $confemail->setSubject($dataartikel['judul']);
            $confemail->setMessage(
                $expArtikel[0] . '</p>' . $expArtikel[1] . '</p>' .

                    '<p>Selengkapnya di ' . base_url() . '/' . $dataartikel['slug'] . '/' . $dataartikel['time'] . '</p>'
            );

            if ($confemail->send()) {
                $this->berhasilterkirim($ii);

                $this->emailsended->save([
                    'id'            => '',

                    'emailsended' => $rowsemail[$ii],
                    'idartikel' => $dataartikel['id']
                ]);
            } else {
                $data = $confemail->printDebugger(['headers']);
                print_r($data);
            }
        }

        return redirect()->to(base_url() . '/adminppc/artikel/' . $dataartikel['kategori']);
    }

    public function berhasilTerkirim($data)
    {
        $jmlemail = $data + 1;
        session()->setFlashdata('alert', 'Artikel Berhasil dishare ke ' . $jmlemail . ' Email');
    }

    public function sendedto($slug, $time)
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        $this->dataartikel = $this->artikelmodel->orlike('slug', $slug);
        $this->dataartikel = $this->artikelmodel->orlike('time', $time);

        //Ambil data artikel 
        $dataartikel = $this->dataartikel->first();

        // dd($dataartikel);


        $data = [
            'title' => "Admin | " . $this->adminlogin['nama'],
            'templatelayout' =>  $this->templatelayout,
            'classbody' =>  $this->classbody,

            'judulArt' => $dataartikel['judul'],
            'sendto' => $this->emailsended->where('idartikel', $dataartikel['id'])->findAll(),
            'sendtoCount' => $this->emailsended->where('idartikel', $dataartikel['id'])->countAllResults(),

            'adminlogin' => $this->adminlogin,
            //Untuk Kategori di SIDEBAR ADMIN
            'kategori' => $this->kategorimodel->findAll()
        ];

        return view('admin/shareemail/sendedto', $data);
    }

    public function truncate()
    {
        $this->emailsended->truncate();
        return redirect()->to(base_url() . '/adminppc/truncate-true');
    }
}
