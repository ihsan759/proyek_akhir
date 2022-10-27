<?php

namespace App\Controllers\Masyarakat\Petugas;

use App\Controllers\BaseController;
use App\Models\Masyarakat\DokumenModel;

class Dokumen extends BaseController
{
    protected $DokumenModel;
    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
    }
    public function upload()
    {
        $data = [
            'title' => 'Upload Dokumen &mdash; elurah',
            'validation' => \Config\Services::validation()
        ];
        return view('Masyarakat/Petugas/Dokumen/upload.php', $data);
    }

    public function index()
    {
        if (session('jabatan') == 'RT') {
            $dokumen = $this->DokumenModel->orderBy('id', 'DESC')->getdata();
        } else {
            $dokumen = $this->DokumenModel->orderBy('id', 'DESC')->viewdata();
        }
        $data = [
            'title' => 'Index Dokumen &mdash; elurah',
            'validation' => \Config\Services::validation(),
            'dokumen' => $dokumen
        ];
        return view('Masyarakat/Petugas/Dokumen/index.php', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_dokumen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Dokumen harus diisi.'
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]',
                'errors' => [
                    'uploaded' => 'Dokumen harus diisi harus diisi.'
                ]
            ]

        ])) {
            return redirect()->to('/dokumen/upload')->withInput();
        }
        $file = $this->request->getFile('file');
        $file->move('dokumen');
        $filename = $file->getName();
        $this->DokumenModel->save([
            'nama_dokumen' => $this->request->getVar('nama_dokumen'),
            'file' => $filename,
            'id_petugas' => session('id_petugas'),
            'status' => 'Pending'
        ]);

        return redirect()->to('/dokumen/index')->with('success', 'Anda berhasil mengupload dokumen');
    }

    public function delete($id)
    {
        $Dokumen = $this->DokumenModel->where("id", $id)->first();
        $filename = $Dokumen['file'];
        unlink("Dokumen/$filename");
        $this->DokumenModel->delete($id);

        return redirect()->to('/dokumen/index')->with('success', 'Anda berhasil menghapus data');
    }
}
