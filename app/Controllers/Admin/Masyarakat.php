<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\dokumenModel;
use App\Models\Admin\masyarakatModel;

class Masyarakat extends BaseController
{
    public function __construct()
    {
        $this->masyarakatModel = new masyarakatModel();
        $this->dokumenModel = new dokumenModel();
    }
    public function index()
    {
        $masyarakat = $this->masyarakatModel->getdata();
        $data = [
            'masyarakat' => $masyarakat
        ];
        return view('Admin/masyarakat/dashboard', $data);
    }

    public function halchart()
    {
        return view('Admin/masyarakat/chartmasyarakat');
    }

    public function haldokumen()
    {
        $dokumen = $this->dokumenModel->findAll();
        $data = ['dokumen' => $dokumen];
        return view('Admin/masyarakat/listdokumen', $data);
    }

    public function verifdokumen($id)
    {
        $data = [
            'status' => "Selesai"
        ];

        $this->dokumenModel->update($id, $data);

        return redirect()->to('/admin/dokumenmasyarakat');
    }
}
