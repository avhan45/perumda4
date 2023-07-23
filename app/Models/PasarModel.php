<?php

namespace App\Models;

use CodeIgniter\Model;

class PasarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Pasar';
    protected $primaryKey       = 'no_pasar';
    protected $allowedFields    = ['no_pasar', 'nama_pasar', 'alamat_pasar'];

    // Fungsi untuk mencari data pasar berdasarkan teks pencarian
    public function searchPasar($searchTerm)
    {
        return $this->select('no_pasar, nama_pasar')
            ->like('nama_pasar', $searchTerm)
            ->findAll();
    }
}
