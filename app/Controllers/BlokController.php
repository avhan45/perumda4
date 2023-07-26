<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlokModel;

class BlokController extends BaseController
{
    public function index()
    {
        $model = new BlokModel();
        $data['username'] = session()->get('username');
        $data['blok'] = $model->findAll();
        $data['jumlah'] = $model->countAllResults();
        return view('blok/index', $data);
    }

    public function store()
    {
        $model = new BlokModel();
        $data = [
            'no_blok'   => $this->request->getPost('no_blok'),
            'nama_blok' => $this->request->getPost('nama_blok')
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

    public function update($no_blok)
    {
        $model = new BlokModel();
        $data = [
            'no_blok'   => $no_blok,
            'nama_blok' => $this->request->getPost('nama_blok')
        ];

        $update = $model->update($no_blok, $data);
        if ($update) {
            session()->setFlashdata('success', 'Data Berhasil Di Update');
        } else {
            session()->setFlashdata('error', 'Data Gagal Di Update');
        }

        // Redirect back to the previous page (or any other desired page)
        return redirect()->back();
    }

    public function delete($no_blok)
    {
        $model = new BlokModel();
        $model->delete($no_blok);
        $Message = "Data Berhasil Di Delete.";
        session()->setFlashdata('success', $Message);
        return redirect()->to('/blok')->withInput();
    }
}
