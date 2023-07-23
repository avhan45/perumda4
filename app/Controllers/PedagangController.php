<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlokModel;
use App\Models\KlasifikasiModel;
use App\Models\PasarModel;
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
        $pasar = new PasarModel();
        $blok = new BlokModel();
        $klasifikasi = new KlasifikasiModel();
        $data['pedagang'] = $model->getPedagang();
        $data['daftar_pasar'] = $pasar->findAll();
        $data['daftar_blok'] = $blok->findAll();
        $data['daftar_klasifikasi'] = $klasifikasi->findAll();
        $data['username'] = $this->username;
        return view('pedagang/index', $data);
    }

    public function store()
    {
        $model = new PedagangModel();
        $pd = $model->findAll();
        $nama = $pd[0]['nama_pedagang'];
        $no_pasar = $pd[0]['no_pasar'];
        // dd($nama);
        $data = [
            'no_pasar' => $this->request->getPost('nama_pasar'),
            'no_blok' => $this->request->getPost('nama_blok'),
            'id_klasifikasi' => $this->request->getPost('klasifikasi'),
            'nama_pedagang' => $this->request->getPost('nama_pedagang'),
            'jk' => $this->request->getPost('jk'),
            'agama' => $this->request->getPost('agama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'sertifikat' => $this->request->getPost('sertifikat'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];
        $pedagang = $model->getDataPedagang($nama, $no_pasar);
        if (empty($pedagang)) {
            $simpan = $model->insert($data);
            if (is_numeric($simpan)) {
                session()->setFlashdata('success', 'Data Berhasil Di Simpan');
            } else {
                session()->setFlashdata('error', 'Data Gagal Di Simpan');
            }
            // return redirect()->back();
        } else {
            session()->setFlashdata('error', 'Data Sudah Ada Dalam Database');
        }
        return redirect()->back();
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

    public function delete($id)
    {
        $model = new PedagangModel();
        $model->delete($id);
        $Message = "Data Berhasil Di Hapus.";
        session()->setFlashdata('success', $Message);
        return redirect()->to('/pedagang')->withInput();
    }
}
