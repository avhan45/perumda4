<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasarModel;
use App\Models\PedagangModel;

class AdminController extends BaseController
{
    public function index()
    {
        $modelPedagang = new PedagangModel();
        $modelPasar = new PasarModel();
        $data['username'] = session()->get('username');
        $data['pasar'] = $modelPasar->findAll();

        // /Menghitung Jumlah data Pedagang untuk setiap no pasar 
        $jumlahPedagangPerPasar = [];
        foreach ($data['pasar'] as $pasar) {
            $no_pasar = $pasar['no_pasar'];
            $jumlahPedagang = $modelPedagang->where('no_pasar', $no_pasar)->countAllResults();
            $jumlahPedagangPerPasar[$no_pasar] = $jumlahPedagang;
        }

        $data['jumlah_pedagang_per_Pasar'] = $jumlahPedagangPerPasar;

        // dd($data['jumlah_pedagang_per_Pasar']);
        return view('admin/dashboard', $data);
    }
}
