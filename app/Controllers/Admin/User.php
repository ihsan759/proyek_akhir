<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\queryBuilder;
use App\Models\userModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->userModel = new userModel();
        $this->queryBuilder = new queryBuilder;
    }
    public function index()
    {
        return view('login/login');
    }

    public function hallistuser()
    {
        $adminkades = $this->queryBuilder->getuserin();
        $petugas = $this->queryBuilder->getusernotin();
        $data = [
            'admin' => $adminkades,
            'petugas' => $petugas
        ];
        return view('Admin/user/listuser', $data);
    }

    public function haledituser($id_petugas)
    {
        $user = $this->userModel->where('id_petugas', $id_petugas)->first();
        $data = ['user' => $user];

        return view('Admin/user/edituser', $data);
    }

    public function haladduser()
    {
        return view('Admin/user/tambahuser');
    }
    //CRUD

    public function adduser()
    {
        $password = md5($this->request->getPost('password'));
        $data = [
            'nama_petugas' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('nohp'),
            'roles' => $this->request->getPost('roles'),
            'jabatan' => $this->request->getPost('jabatan'),
            'rt' => $this->request->getPost('rt'),
            'rw' => $this->request->getPost('rw'),
            'username' => $this->request->getPost('username'),
            'password' => $password
        ];
        $this->userModel->save($data);

        return redirect()->to('/admin/user');
    }

    public function deluser($id_petugas)
    {
        $this->userModel->delete($id_petugas);
        return redirect()->to('/admin/user');
    }

    public function edituser()
    {
        $id_petugas = $this->request->getPost('id');
        $password = $this->request->getPost('password');
        if ($password != null) {
            $data = [
                'nama_petugas' => $this->request->getPost('nama'),
                'no_hp' => $this->request->getPost('nohp'),
                'roles' => $this->request->getPost('roles'),
                'jabatan' => $this->request->getPost('jabatan'),
                'rt' => $this->request->getPost('rt'),
                'rw' => $this->request->getPost('rw'),
                'username' => $this->request->getPost('username'),
                'password' => md5($password)
            ];
        } else {
            $data = [
                'nama_petugas' => $this->request->getPost('nama'),
                'no_hp' => $this->request->getPost('nohp'),
                'roles' => $this->request->getPost('roles'),
                'jabatan' => $this->request->getPost('jabatan'),
                'rt' => $this->request->getPost('rt'),
                'rw' => $this->request->getPost('rw'),
                'username' => $this->request->getPost('username')
            ];
        }
        $this->userModel->update($id_petugas, $data);

        return redirect()->to('/admin/user');
    }
}
