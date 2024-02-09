<?php

namespace App\Models;

use CodeIgniter\Model;

class LanggananModel extends Model
{
    protected $table = 'langganan';
    protected $allowedFields = ['email'];
}
