<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasarModel;
use App\Models\PedagangModel;

class PasarController extends BaseController
{

    private $username; // Simpan data username dalam property private
    private $model;

    public function __construct()
    {
        // Ambil data username dari session dalam constructor
        $this->username = session()->get('username');
        $this->model = new PasarModel();
    }

    public function index()
    {
        $data['pasar'] = $this->model->findAll();
        $data['username'] = $this->username;
        return view('pasar/index', $data);
    }

    public function store()
    {
        $data = [
            'no_pasar'      => $this->request->getPost('no_pasar'),
            'nama_pasar'    => $this->request->getPost('nama_pasar'),
            'alamat_pasar'  => $this->request->getPost('alamat_pasar')
        ];
        $simpan = $this->model->insert($data);
        if (is_numeric($simpan)) {
            session()->setFlashdata('success', 'Data Berhasil Di Simpan');
        } else {
            session()->setFlashdata('error', 'Data Gagal Di Simpan');
        }

        // Redirect back to the previous page (or any other desired page)
        return redirect()->back();
    }

    public function update($no_pasar)
    {
        $data = [
            'no_pasar' => $no_pasar,
            'nama_pasar' => $this->request->getPost('nama_pasar'),
            'alamat_pasar' => $this->request->getPost('alamat_pasar'),
        ];
        $update = $this->model->update($no_pasar, $data);
        if ($update) {
            session()->setFlashdata('success', 'Data Berhasil Di Simpan');
        } else {
            session()->setFlashdata('error', 'Data Gagal Di Simpan');
        }

        // Redirect back to the previous page (or any other desired page)
        return redirect()->back();
    }

    public function delete($no_pasar)
    {
        $this->model->delete($no_pasar);
        $Message = "Data Berhasil Di Delete.";
        session()->setFlashdata('success', $Message);
        return redirect()->to('/pasar')->withInput();
    }

    // Fungsi untuk mengambil data pasar berdasarkan pencarian
    public function getDataPasar()
    {
        $searchTerm = $this->request->getVar('q'); // Mendapatkan teks pencarian dari Select2
        $pasarModel = new PasarModel();
        $dataPasar = $pasarModel->searchPasar($searchTerm);

        // Ubah data menjadi format JSON untuk Select2
        $response = [];
        foreach ($dataPasar as $pasar) {
            $response[] = [
                'id' => $pasar['no_pasar'],
                'text' => $pasar['nama_pasar']
            ];
        }

        return $this->response->setJSON($response);
    }
}
