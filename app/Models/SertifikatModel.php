<?php

namespace App\Models;

use CodeIgniter\Model;

class SertifikatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Sertifikat';
    protected $primaryKey       = 'id_sertifikat';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_pedagang', 'no_sertifikat', 'image'];
}
