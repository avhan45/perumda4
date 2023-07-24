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
        // $pd = $model->findAll();
        $no_pasar = $this->request->getPost('nama_pasar');
        $nama = $this->request->getPost('nama_pedagang');
        $data = [
            'no_pasar' => $this->request->getPost('nama_pasar'),
            'no_blok' => $this->request->getPost('nama_blok'),
            'id_klasifikasi' => $this->request->getPost('klasifikasi'),
            'nama_pedagang' => $this->request->getPost('nama_pedagang'),
            'jk' => $this->request->getPost('jk'),
            'agama' => $this->request->getPost('agama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'ukuran' => $this->request->getPost('ukuran'),
            'alamat' => $this->request->getPost('alamat'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'sertifikat' => $this->request->getPost('sertifikat'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];
        $pedagang = $model->getDataPedagang($no_pasar, $nama);
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
    public function update($id)
    {
        $model = new PedagangModel();
        $data = [
            'no_pasar' => $this->request->getPost('nama_pasar'),
            'no_blok' => $this->request->getPost('nama_blok'),
            'id_klasifikasi' => $this->request->getPost('klasifikasi'),
            'nama_pedagang' => $this->request->getPost('nama_pedagang'),
            'jk' => $this->request->getPost('jk'),
            'agama' => $this->request->getPost('agama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'ukuran' => $this->request->getPost('ukuran'),
            'alamat' => $this->request->getPost('alamat'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'sertifikat' => $this->request->getPost('sertifikat'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];
        $update = $model->update($id, $data);
        if ($update) {
            session()->setFlashdata('success', 'Data Berhasil Di Update');
        } else {
            session()->setFlashdata('error', 'Data Gagal Di Update');
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
            $errorMessage = "Tambahkan Data Pedagang Terlebih Dahulu.";
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
