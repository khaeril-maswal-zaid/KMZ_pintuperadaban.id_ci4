<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailsendedModel extends Model
{
    protected $table = 'emailsended';
    protected $useTimestamps = true;
    protected $createdField  = false;
    protected $updatedField   = false;
    protected $allowedFields = ['emailsended', 'idartikel'];
}
