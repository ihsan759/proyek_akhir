<?php

namespace App\Controllers\Masyarakat\Petugas;

use App\Controllers\BaseController;
use App\Models\Masyarakat\AkunModel;

class Akun extends BaseController
{

    protected $AkunModel;

    public function __construct()
    {
        $this->AkunModel = new AkunModel();
    }

    public function index()
    {
        $akun = $this->AkunModel->getakun();
        $data = [
            'title' => 'Akun &mdash; elurah',
            'validation' => \Config\Services::validation(),
            'akun' => $akun
        ];
        return view('Masyarakat/Petugas/Akun/index.php', $data);
    }

    public function add()
    {
        $nik = $this->AkunModel->getnik();
        $data = [
            'title' => 'Akun &mdash; elurah',
            'validation' => \Config\Services::validation(),
            'nik' => $nik
        ];
        return view('Masyarakat/Petugas/Akun/buatakun.php', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password berita harus diisi.',
                ]
            ],
            'NIK' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK berita harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('/akun/add')->withInput();
        }
        $this->AkunModel->save([
            'NIK' => $this->request->getVar('NIK'),
            'password' => md5($this->request->getVar('password')),
            'status' => 'Aktif'
        ]);
        return redirect()->to('akun/index')->with('success', 'Akun berhasil dibuat');
    }

    public function update()
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password berita harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/akun/index')->withInput();
        }
        $this->AkunModel->save([
            'NIK' => $this->request->getVar('NIK'),
            'password' => md5($this->request->getVar('password'))
        ]);
        return redirect()->to('akun/index')->with('success', 'Password akun berhasil diubah');
    }
}
