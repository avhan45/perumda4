<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PedagangModel;

class PedagangController extends BaseController
{
    private $username; // Simpan data username dalam property private

    public function __construct()
    {
        // Ambil data username dari session dalam constructor
        $this->username = session()->get('username');
    }

    public function index()
    {
        $model = new PedagangModel();
        $data['pedagang'] = $model->getPedagang();
        $data['username'] = $this->username;
        return view('pedagang/index', $data);
    }

    public function pasar($no_pasar)
    {
        $model = new PedagangModel();
        // $data['pedagang'] = $model->where('no_pasar', $no_pasar)->findAll();
        $data['pedagang'] = $model->getPasar($no_pasar);
        $data['username'] = $this->username;
        if (!empty($data['pedagang'])) {

            $data['namapasar'] = $data['pedagang'][0]['nama_pasar'];
            return view('pedagang/pasar', $data);
        } else {
            $errorMessage = "Halaman tidak ditemukan.";
            session()->setFlashdata('error', $errorMessage);
            return redirect()->to('/pasar')->withInput();
        }
    }
}
