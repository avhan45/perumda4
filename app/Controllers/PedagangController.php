<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlokModel;
use App\Models\KlasifikasiModel;
use App\Models\PasarModel;
use App\Models\PedagangModel;
use App\Models\SertifikatModel;
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
        $modelSertifikat = new SertifikatModel();
        // $pd = $model->findAll();
        $no_pasar = $this->request->getPost('nama_pasar');
        $nama = $this->request->getPost('nama_pedagang');
        $ktp = $this->request->getFile('ktp');
        $sertifikat = $this->request->getFile('sertifikat');

        $data = [
            'no_pasar' => $this->request->getPost('nama_pasar'),
            'no_blok' => $this->request->getPost('nama_blok'),
            'id_klasifikasi' => $this->request->getPost('klasifikasi'),
            'nama_pedagang' => $this->request->getPost('nama_pedagang'),
            'ktp' => '',
            'jk' => $this->request->getPost('jk'),
            'agama' => $this->request->getPost('agama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'ukuran' => $this->request->getPost('ukuran'),
            'alamat' => $this->request->getPost('alamat'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($ktp->isValid() && !$ktp->hasMoved('ktp')) {
            $namaKtp = $ktp->getRandomName();
            // Pindahkan ke Folder upload
            $ktp->move(ROOTPATH . 'public/uploads', $namaKtp, true);
            $data['ktp'] = $namaKtp;
        } else {
            $data['ktp'] = 'no-image.jpg';
        }
        // $model->insert($data);

        $pedagang = $model->getDataPedagang($no_pasar, $nama);
        if (empty($pedagang)) {

            $pedagangId = $model->insert($data);

            $sertData = [
                'id_pedagang' => $pedagangId,
                'no_sertifikat' => $this->request->getPost('no_sertifikat'),
                'image' => '',
            ];

            if ($sertifikat->isValid() && !$sertifikat->hasMoved('sertifikat')) {
                $namaSertifikat = $sertifikat->getRandomName();
                $sertifikat->move(ROOTPATH . 'public/sertifikat', $namaSertifikat, true);
                $sertData['image'] = $namaSertifikat;
            } else {
                $sertData['image'] = 'no-image.jpg';
            }

            $simpan = $modelSertifikat->insert($sertData);
            if (is_numeric($simpan)) {
                session()->setFlashdata('success', 'Data Berhasil Di Simpan');
            } else {
                session()->setFlashdata('error', 'Data Gagal Di Simpan');
            }
            return redirect()->back();
        } else {
            session()->setFlashdata('error', 'Data Sudah Ada Dalam Database');
        }
        // return redirect()->back();
    }
    public function update($id)
    {

        $model = new PedagangModel();
        $modelSertifikat = new SertifikatModel();

        $no_pasar = $this->request->getPost('nama_pasar');
        $nama = $this->request->getPost('nama_pedagang');
        $ktp = $this->request->getFile('ktp');
        $sertifikat = $this->request->getFile('sertifikat');
        $data = [
            'no_pasar' => $this->request->getPost('nama_pasar'),
            'no_blok' => $this->request->getPost('nama_blok'),
            'id_klasifikasi' => $this->request->getPost('klasifikasi'),
            'nama_pedagang' => $this->request->getPost('nama_pedagang'),
            'ktp' => '',
            'jk' => $this->request->getPost('jk'),
            'agama' => $this->request->getPost('agama'),
            'no_hp' => $this->request->getPost('no_hp'),
            'ukuran' => $this->request->getPost('ukuran'),
            'alamat' => $this->request->getPost('alamat'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'sertifikat' => $this->request->getPost('sertifikat'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];
        if ($ktp->isValid() && !$ktp->hasMoved('ktp')) {
            $namaKtp = $ktp->getRandomName();
            //     // Pindahkan ke Folder Upload
            $ktp->move(ROOTPATH . 'public/uploads', $namaKtp, true);
            $data['ktp'] = $namaKtp;

            $pedagang = $model->find($id);
            if ($pedagang['ktp'] !== 'no-image.jpg') {
                unlink(ROOTPATH . 'public/uploads/' . $pedagang['ktp']);
            }
        } else {
            $pedagang = $model->find($id);
            $nmKtp = $pedagang['ktp'];
            $data['ktp'] = $nmKtp;
        }
        $model->update($id, $data);

        // Proses update data sertifikat jika ada gambar baru
        $sertData = [
            'no_sertifikat' => $this->request->getPost('no_sertifikat'),
        ];

        if ($sertifikat->isValid() && !$sertifikat->hasMoved('sertifikat')) {
            $namaSertifikat = $sertifikat->getRandomName();
            $sertifikat->move(ROOTPATH . 'public/sertifikat', $namaSertifikat, true);
            $sertData['image'] = $namaSertifikat;

            // Hapus gambar lama dari direktori jika ada
            $pedagang = $model->find($id);
            $sertifikatLama = $modelSertifikat->getSertifikat($id);
            if ($sertifikatLama[0]['image'] !== 'no-image.jpg') {
                unlink(ROOTPATH . 'public/sertifikat/' . $sertifikatLama[0]['image']);
            }
        }

        // Update data sertifikat
        $modelSertifikat->updateSertifikat($id, $sertData);

        session()->setFlashdata('success', 'Data Berhasil Di Perbarui');
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
        $modelSertifikat = new SertifikatModel();

        // Mengambil data pedagang dan sertifikat berdasarkan ID
        $pedagang = $model->find($id);
        $sertifikatLama = $modelSertifikat->getSertifikat($id);


        // Menghapus file gambar ktp jika ada
        if ($pedagang['ktp'] !== 'no-image.jpg') {
            unlink(ROOTPATH . 'public/uploads/' . $pedagang['ktp']);
        }
        // Menghapus data pedagang
        $model->delete($id);

        // Menghapus file gambar sertifikat jika ada
        if ($sertifikatLama[0]['image'] !== 'no-image.jpg') {
            unlink(ROOTPATH . 'public/sertifikat/' . $sertifikatLama[0]['image']);
        }

        // Menghapus data sertifikat
        $modelSertifikat->deleteSertifikat($id);

        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->back();
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
        $data['pasar'] = $data['content'][0]['nama_pasar'];
        // $data['content'] = 'Isi laporan PDF'; // Ganti dengan konten yang sesuai

        $html = view('pedagang/laporanPerPasar', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream('laporan.pdf', ['Attachment' => 0]);
    }
}
