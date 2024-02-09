<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $useTimestamps = true;
    protected $createdField  = false;
    protected $updatedField   = false;
    protected $allowedFields = ['kategori', 'icon'];
}
