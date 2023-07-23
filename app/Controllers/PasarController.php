<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasarModel;
use App\Models\PedagangModel;

class PasarController extends BaseController
{
    public function index()
    {
        $model = new PasarModel();
        $data['pasar'] = $model->findAll();
        $data['username'] = session()->get('username');
        return view('pasar/index', $data);
    }
}
