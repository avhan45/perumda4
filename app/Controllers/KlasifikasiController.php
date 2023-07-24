<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KlasifikasiModel;

class KlasifikasiController extends BaseController
{
    public function index()
    {
        $model = new KlasifikasiModel();
        $data['klasifikasi'] = $model->findAll();
        $data['username'] = session()->get('username');
        return view('klasifikasi/index', $data);
    }

    public function store()
    {
        $model = new KlasifikasiModel();
        $data = [
            'klasifikasi' => $this->request->getPost('klasifikasi')
        ];
        $simpan = $model->insert($data);
        if (is_numeric($simpan)) {
            session()->setFlashdata('success', 'Data Berhasil Di Simpan');
        } else {
            session()->setFlashdata('error', 'Data Gagal Di Simpan');
        }

        // Redirect back to the previous page (or any other desired page)
        return redirect()->back();
    }

    public function update($id)
    {
        $model = new KlasifikasiModel();
        $data = [
            'id_klasifikasi' => $id,
            'klasifikasi'   => $this->request->getPost('klasifikasi')
        ];
        $update = $model->update($id, $data);
        if ($update) {
            session()->setFlashdata('success', 'Data Berhasil Di Update');
        } else {
            session()->setFlashdata('error', 'Data Gagal Di Update');
        }

        // Redirect back to the previous page (or any other desired page)
        return redirect()->back();
    }

    public function delete($id)
    {
        $model = new KlasifikasiModel();
        $model->delete($id);
        $Message = "Data Berhasil Di Delete.";
        session()->setFlashdata('success', $Message);
        return redirect()->to('/klasifikasi')->withInput();
    }
}
