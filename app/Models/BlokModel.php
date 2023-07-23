<?php

namespace App\Models;

use CodeIgniter\Model;

class BlokModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Blok';
    protected $primaryKey       = 'no_blok';
    protected $allowedFields    = ['no_blok', 'nama_blok'];
}
