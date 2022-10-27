<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\masyarakatModel;
use App\Models\Admin\queryBuilder;
use App\Models\Admin\suratModel;
use App\Models\UserModel;

class Surat extends BaseController
{
    public function __construct()
    {
        $this->suratModel = new suratModel();
        $this->masyarakatModel = new masyarakatModel();
        $this->userModel = new UserModel();
        $this->queryBuilder = new queryBuilder;
    }
    public function indexkades()
    {
        $listsurat = $this->queryBuilder->getsuratuser();
        $data = ['surat' => $listsurat];
        return view('Admin/kades/kadessurat', $data);
    }
    public function index()
    {
        $listsurat = $this->queryBuilder->getsuratuser();
        $data = ['surat' => $listsurat];
        return view('Admin/surat/listsurat', $data);
    }

    public function hallistsuratpending()
    {
        $statussurat = $this->queryBuilder->getstatussurat('proses');
        $data = ['status' => $statussurat];
        return view('Admin/surat/listpending', $data);
    }

    public function hallistsuratselesai()
    {
        $statussurat = $this->queryBuilder->getstatussurat('selesai');
        $data = ['status' => $statussurat];
        return view('Admin/surat/listselesai', $data);
    }

    public function hallistsurattolak()
    {
        $statussurat = $this->queryBuilder->getstatussurat('tolak');
        $data = ['status' => $statussurat];
        return view('Admin/surat/listtolak', $data);
    }

    public function halverifsurat($id)
    {
        $surat = $this->suratModel->where("id", $id)->first();
        $pemohon = $this->userModel->where("id_petugas", $surat['id_pemohon'])->first();
        $data = [
            'surat' => $surat,
            'pemohon' => $pemohon
        ];
        return view('Admin/surat/halverifsurat', $data);
    }

    public function haltolakverif($id)
    {
        $surat = $this->suratModel->where("id", $id)->first();
        $pemohon = $this->userModel->where("id_petugas", $surat['id_pemohon'])->first();
        $data = [
            'surat' => $surat,
            'pemohon' => $pemohon
        ];
        return view('Admin/surat/halsurattolak', $data);
    }

    public function tolakverif()
    {
        $id = $this->request->getPost('id');
        $data = [
            'alasan' => $this->request->getPost('alasan'),
            'status' => "Tolak"
        ];

        $this->suratModel->update($id, $data);
        return redirect()->to('/admin/suratditolak');
    }

    public function verifsurat($id)
    {
        $data = [
            'status' => "Selesai"
        ];

        $this->suratModel->update($id, $data);
        return redirect()->to('/admin/suratselesai');
    }

    public function detailsurat($id)
    {
        $surat = $this->suratModel->where("id", $id)->first();
        $data = ['surat' => $surat];

        return view('Admin/surat/detailsurat', $data);
    }


    // Download Surat
    public function downloadsurat($id)
    {
        $surat = $this->suratModel->where("id", $id)->first();
        $nik = $surat['NIK'];
        $masyarakat = $this->masyarakatModel->where("NIK", $nik)->first();
        $data = [
            'surat' => $surat,
            'masyarakat' => $masyarakat
        ];

        if ($surat['jenis_surat'] == 'Surat SKTM Kesehatan') {
            return view('Admin/templatesurat/pengantarskck', $data);
        }
    }
}
