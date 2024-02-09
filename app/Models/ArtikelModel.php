<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $useTimestamps = true;
    protected $createdField  = false;
    protected $updatedField   = false;
    protected $allowedFields = ['tanggal', 'yposting', 'waktu', 'time', 'slug', 'judul', 'description', 'srcimg', 'picture', 'oleh', 'kategori', 'level', 'artikel', 'visit', 'view'];

    public function filterAllArtikel($kategori)
    {
        $count = $this->select('yposting')->where('kategori', $kategori)->countAllResults();

        $yposting = $this->where('kategori', $kategori)->select('yposting')->findAll();
        $oleh = $this->select('oleh')->where('kategori', $kategori)->findAll();

        $row1 = [];
        $row2 = [];


        for ($i = 0; $i < $count; $i++) {
            $row1[] = $yposting[$i]['yposting'];
            $row2[] = $oleh[$i]['oleh'];
        }

        return [array_unique($row1), array_unique($row2)];
    }

    public function special($wName, $wValue, $limit)
    {
        return $this->where($wName, $wValue)->orderBy('id', 'DESC')->findAll($limit);
    }


    public function kategori($ktg)
    {
        return $this->where('kategori', $ktg)->orderBy('id', 'DESC')->first();
    }
}
