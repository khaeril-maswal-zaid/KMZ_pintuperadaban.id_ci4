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

        $this->dataartikel = $this->artikelmodel->orlike('slug', $slug);
        // $this->dataartikel = $this->artikelmodel->orlike('time', $time);

        //Ambil data artikel 
        $dataartikel = $this->dataartikel->first();

        //Ambil data email dari tabel langganan di database internal ***
        $langganan = $this->langgananmodel->select('email')->findAll();

        $expArtikel = explode('</p>', $dataartikel['artikel']);

        $rowsemail1 = [];
        foreach ($langganan as $lgn) {
            $rowsemail1[] = $lgn['email'];
        }


        // $rowsemailG = array_merge($rowsemail1, $rowsemail2, $rowsemail3, $rowsemail4); //Gabungkan Aray email dari 3 sumber
        $rowsemailU = array_unique($rowsemail1); // Gabungkan Array duplicate
        $rowsemailIm = implode('*||*', $rowsemailU); // Jadikan string terlebih dahulu
        $rowsemail = explode('*||*', $rowsemailIm); // dari string jadikan Array supya index berurut

        $confemail = \Config\Services::email();

        $case_insensitive = $this->emailsended->where('idartikel', $dataartikel['id'])->countAllResults();
        define('IIE', $case_insensitive);


        dd($rowsemail);
        //50 adalah jumlah limit yg cocok untuk send email massal tapi jumlahnya harus lebih besar dengan jumlah langganan

        for ($ii = IIE; $ii < (50 + IIE); $ii++) { // 50+IIE
            $confemail->setTo($rowsemail[$ii]); //muhammadkhaerilzaid@gmail.com || $rowsemail[$ii]
            $confemail->setFrom($confemail->fromEmail, $confemail->fromName);
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
                die;
            }
        }

        return redirect()->to(URL . 'adminppc/artikel/' . $dataartikel['kategori']);
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
        // $this->dataartikel = $this->artikelmodel->orlike('time', $time);

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
