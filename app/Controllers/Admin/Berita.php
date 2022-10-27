<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\beritaModel;
use App\Models\Admin\historyberitaModel;
use App\Models\Admin\queryBuilder;
use App\Models\userModel;

class Berita extends BaseController
{
    public function __construct()
    {
        $this->beritaModel = new beritaModel();
        $this->userModel = new userModel();
        $this->historyberitaModel = new historyberitaModel();
        $this->queryBuilder = new queryBuilder;
    }
    public function index()
    {
        $kunci = $this->request->getVar('judul');

        if ($kunci) {
            $query = $this->beritaModel->pencarian($kunci);
        } else {
            $query = $this->beritaModel;
        }

        $berita = $this->beritaModel->orderBy('id', 'DESC')->paginate(5, 'berita');
        $pager = $this->beritaModel->pager;
        $data = [
            'berita' => $berita,
            'pager' => $pager
        ];

        return view('Admin/Berita/dashboard', $data);
    }

    public function hallistberita()
    {
        $berita = $this->beritaModel->orderBy('id', 'DESC')->paginate(10, 'berita');
        $pager = $this->beritaModel->pager;
        $data = [
            'berita' => $berita,
            'pager' => $pager
        ];

        return view('Admin/Berita/listberita', $data);
    }

    public function haladdberita()
    {
        session();
        $data = ['validation' => \Config\Services::validation()];
        return view('Admin/Berita/addberita', $data);
    }

    public function haldetailberita($id)
    {
        $berita = $this->beritaModel->where("id", $id)->first();
        $penulis = $this->userModel->where("id_petugas", $berita['id_author'])->first();
        $data = [
            'berita' => $berita,
            'author' => $penulis
        ];

        return view('Admin/berita/detailberita', $data);
    }
    public function historyberita()
    {
        $history = $this->historyberitaModel->paginate(10, 'berita');
        $pager = $this->historyberitaModel->pager;
        $data = [
            'history' => $history,
            'pager' => $pager
        ];

        return view('Admin/Berita/deletedberita', $data);
    }

    public function haleditberita($id)
    {
        $berita = $this->beritaModel->where("id", $id)->first();
        $penulis = $this->userModel->where("id_petugas", $berita['id_author'])->first();
        $data = [
            'berita' => $berita,
            'author' => $penulis
        ];

        return view('Admin/berita/editberita', $data);
    }

    //CRUD
    public function delberita($id)
    {
        $berita = $this->beritaModel->where("id", $id)->first();
        $filename = $berita['gambar'];
        unlink("berita/gambar/$filename");
        $this->beritaModel->delete($id);
        return redirect()->to('/admin/listberita');
    }
    public function addberita()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul berita harus diisi.',
                ]
            ],
            'caption' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Caption gambar harus diisi.',
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi berita harus diisi.',
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|ext_in[gambar,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => 'Gambar harus diisi. Hanya menerima png, jpg, jpeg',
                    'ext_in' => 'Extensi gambar hanya menerima png, jpg, jpeg'
                ]
            ]

        ])) {
            return redirect()->to('/admin/buatberita')->withInput();
        }

        $id_petugas = session()->get('id_petugas');
        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $namagambar = $file->getRandomName();
            $file->move('berita/gambar', $namagambar);
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'id_author' => $id_petugas,
            'gambar' => $namagambar,
            'caption' => $this->request->getPost('caption'),
            'isi' => $this->request->getPost('isi')
        ];

        $this->beritaModel->save($data);

        return redirect()->to('/admin/berita');
    }
    public function editberita()
    {
        $id = $this->request->getPost('id');
        $data = [
            'judul' => $this->request->getPost('judul'),
            'caption' => $this->request->getPost('caption'),
            'isi' => $this->request->getPost('isi')
        ];

        $this->beritaModel->update($id, $data);

        return redirect()->to('/admin/listberita');
    }

    public function delallusang()
    {
        $this->historyberitaModel->emptyTable();
        return redirect()->to('/admin/usangberita');
    }
}
