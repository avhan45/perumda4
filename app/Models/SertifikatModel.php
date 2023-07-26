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

    public function updateSertifikat($id, $data)
    {
        return $this->db->table('Sertifikat')
            ->where('id_pedagang', $id)
            ->update($data);
    }

    public function getSertifikat($id)
    {
        return $this->where('id_pedagang', $id)
            ->get()
            ->getResultArray();
    }

    public function deleteSertifikat($idPedagang)
    {
        // Find the sertifikat data by id_pedagang
        $sertifikat = $this->where('id_pedagang', $idPedagang)->first();

        if ($sertifikat) {
            // Delete the sertifikat data from the database
            $this->delete($sertifikat['id']);

            // If the sertifikat image exists, delete it from the directory
            if ($sertifikat['image'] !== 'no-image.jpg') {
                unlink(ROOTPATH . 'public/sertifikat/' . $sertifikat['image']);
            }

            return true;
        }

        return false;
    }
}
