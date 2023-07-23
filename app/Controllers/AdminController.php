<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasarModel;

class AdminController extends BaseController
{
    public function index()
    {
        $modelPasar = new PasarModel();
        $data['username'] = session()->get('username');
        $data['pasar'] = $modelPasar->findAll();
        return view('admin/dashboard', $data);
    }
}
