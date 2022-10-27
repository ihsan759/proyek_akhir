<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Masyarakat\AkunModel;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $UserModel;
    protected $AkunModel;

    public function __construct()
    {
        $this->AkunModel = new AkunModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        if (session('jabatan')) {
            return redirect()->to(site_url('home'));
        } else if (session('NIK')) {
            return redirect()->to(site_url('warga/home'));
        } else if (session('jabatan') == 'Admin') {
            return redirect()->to(site_url('dashboard'));
        }
        return view('Auth\Petugas\login');
    }

    public function display()
    {
        if (session('NIK')) {
            return redirect()->to(site_url('warga/home'));
        } else if (session('jabatan') == 'Petugas') {
            return redirect()->to(site_url('home'));
        } else if (session('jabatan') == 'Admin') {
            return redirect()->to(site_url('dashboard'));
        }
        return view('Auth\Masyarakat\login');
    }

    public function auth()
    {
        $data = $this->request->getPost();
        if (isset($data['username'])) {
            $query = $this->UserModel->getWhere(['username' => $data['username']]);
            if ($query->getRow()) {
                if (md5($data['password']) == $query->getRow()->password && $query->getRow()->deleted_at == null) {
                    if ($query->getRow()->roles == 'Admin') {
                        $params = [
                            'username' => $query->getRow()->username,
                            'password' => $query->getRow()->password,
                            'nama_petugas' => $query->getRow()->nama_petugas,
                            'id_petugas' => $query->getRow()->id_petugas,
                            'jabatan' => strtolower($query->getRow()->jabatan),
                            'roles' => $query->getRow()->roles,
                            'login' => true
                        ];
                        session()->set($params);
                        return redirect()->to("/dashboard");
                    } else {
                        $params = [
                            'id_petugas' => $query->getRow()->id_petugas,
                            'rt' => $query->getRow()->rt,
                            'rw' => $query->getRow()->rw,
                            'roles' => $query->getRow()->roles,
                            'jabatan' => $query->getRow()->jabatan,
                            'nama' => $query->getRow()->nama_petugas,
                            'login' => true
                        ];
                        session()->set($params);
                        return redirect()->to(site_url('home'))->with('success', 'Anda berhasil login');
                    }
                } else {
                    return redirect()->back()->with('error', 'Username atau Password salah');
                }
            } else {
                return redirect()->back()->with('error', 'Username atau Password salah');
            }
        } else {
            $query = $this->AkunModel->getWhere(['NIK' => $data['NIK']]);
            if ($query->getRow()) {
                if (md5($data['password']) == $query->getRow()->password && $query->getRow()->status == 'Aktif') {
                    $params = [
                        'NIK' => $query->getRow()->NIK,
                        'id_petugas' => $query->getRow()->id_petugas,
                        'login' => true
                    ];
                    session()->set($params);
                    return redirect()->to(site_url('/warga/home'))->with('success', 'Anda berhasil login');
                } else {
                    return redirect()->back()->with('error', 'NIK atau Password salah');
                }
            } else {
                return redirect()->back()->with('error', 'NIK atau Password salah');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
