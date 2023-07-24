<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $data['username'] = session()->get('username');
        return view('user/dashboard', $data);
    }
}
