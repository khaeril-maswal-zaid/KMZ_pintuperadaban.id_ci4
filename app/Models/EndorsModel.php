<?php

namespace App\Models;

use CodeIgniter\Model;

class EndorsModel extends Model
{
    protected $table = 'endors';
    protected $useTimestamps = true;
    protected $createdField  = false;
    protected $updatedField   = false;
    protected $allowedFields = ['sourceleft', 'sourceright', 'status', 'brand', 'idbrand', 'position', 'wa', 'chat', 'addby'];
}
