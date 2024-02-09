<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class ApiPpc extends BaseController
{
     protected $artikelmodel;
     
     protected $passwordDeft = 'peradaban165_'; // setdefault
     
     
     public function __construct()
    {
       $this->artikelmodel = new ArtikelModel;
    }
    
    
    //"https://pintuperadaban.com/api/artikel-populer/peradaban165_" | CONTOH UNTUK MENGAKSESSNYA
    public function populerpost($password){
        if($this->passwordDeft != $password){
            return false;
            exit;
        }
        
        $slugArtikel = $this->artikelmodel->select('slug, time')->orderBy('id', 'DESC')->first(); // dd($slugArtikel);
        
        return json_encode($slugArtikel);
    }
}