<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailsendedModel extends Model
{
    protected $table = 'emailsended';
    protected $allowedFields = ['emailsended', 'idartikel'];
}
