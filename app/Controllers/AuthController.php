<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{

    public function index()
    {

        // dd(session()->get('role'));
        // cek apakah pengguna atau admin sudah login 
        if (session()->get('id_user') && session()->get('role')) {
            // Jika sudah login, arahkan ke halaman dashboard sesuai role
            if (session()->get('role') === 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/user/dashboard');
            }
        }
        return view('login');
    }

    public function user()
    {
        return view('user/dashboard');
    }
    public function admin()
    {
        return view('user/dashboard');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $user = $model->getUserByCredentials($username, $password);

        if ($user) {
            // Menyimpan informasi pengguna ke session
            session()->set('id_user', $user['id_user']);
            session()->set('username', $user['username']);
            session()->set('role', $user['role']);

            // Redirect ke halaman dashboard sesuai dengan peran pengguna
            if ($user['role'] === 'admin') {
                return redirect()->to('admin/dashboard');
            } else {
                return redirect()->to('/user/dashboard');
            }
        } else {
            // Jika otentikasi gagal kembalikan ke halaman login dengan pesan kesalahan 
            return redirect()->to('login')->with('error', 'Username atau Password salah');
        }
    }

    public function logout()
    {
        // session()->remove('id_user');
        // session()->remove('username');
        // session()->remove('role');
        session()->destroy();
        // Redirect ke halaman login setelah logout 
        return redirect()->to('/login');
    }
}
