<?php

namespace App\Models;

use CodeIgniter\Model;

class PedagangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Pedagang';
    protected $primaryKey       = 'id_pedagang';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['no_pasar', 'no_blok', 'id_klasifikasi', 'nama_pedagang', 'jk', 'agama', 'no_hp', 'ukuran', 'alamat', 'jenis_usaha', 'sertifikat', 'keterangan'];

    public function getPasar($no_pasar)
    {
        return $this->db->table('Pedagang')
            ->where('Pedagang.no_pasar', $no_pasar)
            ->join('Pasar', 'Pasar.no_pasar=Pedagang.no_pasar')
            ->get()
            ->getResultArray();
    }

    public function getDataPedagang($nama, $no_pasar)
    {
        return $this->db->table('Pedagang')
            ->where('nama_pedagang', $nama)
            ->where('no_pasar', $no_pasar)
            ->get()
            ->getResultArray();
    }

    public function getPedagang()
    {
        return $this->db->table('Pedagang')
            ->join('Pasar', 'Pasar.no_pasar=Pedagang.no_pasar')
            ->get()
            ->getResultArray();
    }
}
