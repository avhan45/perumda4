<?php

namespace App\Models;

use CodeIgniter\Model;

class PasarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Pasar';
    protected $primaryKey       = 'id_pasar';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['no_pasar', 'nama_pasar', 'alamat_pasar'];
}
