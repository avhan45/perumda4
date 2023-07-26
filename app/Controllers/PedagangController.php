<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlokModel;
use App\Models\KlasifikasiModel;
use App\Models\PasarModel;
use App\Models\PedagangModel;
use Dompdf\Dompdf;

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
        $jumlahPedagangPerPasar = $model->countAllResults();
        $data['jumlah_pedagang_per_Pasar'] = $jumlahPedagangPerPasar;
        // dd($data['pedagang']);
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
        $modelPasar = new PasarModel();
        $modelBlok = new BlokModel();
        $modelKlasifikasi = new KlasifikasiModel();
        // $data['pedagang'] = $model->where('no_pasar', $no_pasar)->findAll();
        $data['pedagang'] = $model->getPasar($no_pasar);
        $data['username'] = $this->username;
        $data['daftar_pasar'] = $modelPasar->findAll();
        $data['daftar_blok'] = $modelBlok->findAll();
        $data['daftar_klasifikasi'] = $modelKlasifikasi->findAll();
        $data['no_pasar'] = $no_pasar;
        // $data['pasar'] = $modelPasar->findAll();

        // /Menghitung Jumlah data Pedagang untuk setiap no pasar 
        $jumlahPedagangPerPasar = $model->where('no_pasar', $no_pasar)->countAllResults();
        // foreach ($data['pasar'] as $pasar) {
        //     $no_pasar = $pasar['no_pasar'];
        //     $jumlahPedagang = $model->where('no_pasar', $no_pasar)->countAllResults();
        //     $jumlahPedagangPerPasar[$no_pasar] = $jumlahPedagang;
        // }
        $data['jumlah_pedagang_per_Pasar'] = $jumlahPedagangPerPasar;
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

    public function laporan()
    {
        $model = new PedagangModel();
        $data['content'] = $model->getPedagang();
        // $data['content'] = 'Isi laporan PDF'; // Ganti dengan konten yang sesuai

        $html = view('pedagang/laporan', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream('laporan.pdf', ['Attachment' => 0]);
    }

    public function laporanPerPasar($no_pasar)
    {
        $model = new PedagangModel();
        $data['content'] = $model->getPasar($no_pasar);
        // $data['content'] = 'Isi laporan PDF'; // Ganti dengan konten yang sesuai

        $html = view('pedagang/laporanPerPasar', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream('laporan.pdf', ['Attachment' => 0]);
    }
}
