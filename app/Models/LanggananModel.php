<?php

namespace App\Models;

use CodeIgniter\Model;

class LanggananModel extends Model
{
    protected $table = 'langganan';
    protected $useTimestamps = true;
    protected $createdField  = false;
    protected $updatedField   = false;
    protected $allowedFields = ['email'];
}
