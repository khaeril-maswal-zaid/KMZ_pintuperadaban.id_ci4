<?php

namespace App\Models;

use CodeIgniter\Model;

class CvpageModel extends Model
{
    protected $table = 'viewerspage';
    protected $useTimestamps = true;
    protected $createdField  = false;
    protected $updatedField   = false;
    protected $allowedFields = ['deteksi', 'date', 'idartikel']; //table yang diizinkan untuk di kelola

    public function addcount($ipaddress1Ipaddress2Browser, $idpage)
    {
        $this->save([
            'id'        => '',

            'deteksi'   =>  $ipaddress1Ipaddress2Browser,
            'date'      =>  date('d-m-Y'),
            'idartikel' =>  $idpage
        ]);
    }
}
