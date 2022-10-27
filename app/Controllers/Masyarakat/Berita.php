<?php

namespace App\Controllers\Masyarakat;

use App\Controllers\BaseController;
use App\Models\Masyarakat\BeritaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Berita extends BaseController
{
    protected $BeritaModel;
    public function __construct()
    {
        $this->BeritaModel = new BeritaModel();
    }
    public function index()
    {
        $berita = $this->BeritaModel->orderBy('id', 'DESC')->findAll();
        $data = [
            'title' => 'Berita &mdash; elurah',
            'berita' => $berita
        ];
        return view('Masyarakat/Berita/index.php', $data);
    }

    public function home()
    {
        $berita = $this->BeritaModel->orderBy('id', 'DESC')->getberita();
        $data = [
            'title' => 'Home Berita &mdash; elurah',
            'validation' => \Config\Services::validation(),
            'berita' => $berita
        ];
        return view('Masyarakat/Petugas/Berita/index.php', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Buat Berita &mdash; elurah',
            'validation' => \Config\Services::validation()
        ];
        return view('Masyarakat/Petugas/Berita/buatberita.php', $data);
    }

    public function save()
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
                    'uploaded' => 'gambar harus diisi.',
                    'ext_in' => 'Extensi gambar hanya menerima png, jpg, jpeg'
                ]
            ]

        ])) {
            return redirect()->to('/berita/add')->withInput();
        }
        $file = $this->request->getFile('gambar');
        $file->move('berita/gambar');
        $filename = $file->getName();
        $this->BeritaModel->save([
            'judul' => $this->request->getVar('judul'),
            'id_author' => $this->request->getVar('id_author'),
            'gambar' => $filename,
            'caption' => $this->request->getVar('caption'),
            'isi' => $this->request->getVar('isi')
        ]);
        return redirect()->to('/berita/index')->with('success', 'Anda berhasil membuat berita');
    }

    public function delete($id)
    {
        $Berita = $this->BeritaModel->where("id", $id)->first();
        $filename = $Berita['gambar'];
        unlink("berita/gambar/$filename");
        $this->BeritaModel->delete($id);

        return redirect()->to('/berita/index')->with('success', 'Anda berhasil menghapus data');
    }

    public function detail($id)
    {
        $berita = $this->BeritaModel->getdetail($id);
        $data = [
            'title' => 'Detail Berita &mdash; elurah',
            'validation' => \Config\Services::validation(),
            'berita' => $berita
        ];
        if (!$berita) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('Masyarakat/Petugas/Berita/detail.php', $data);
    }

    public function edit($id)
    {
        $berita = $this->BeritaModel->find($id);
        $data = [
            'title' => 'Edit Berita &mdash; elurah',
            'berita' => $berita,
            'validation' => \Config\Services::validation()
        ];
        if (!$berita) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('Masyarakat/Petugas/Berita/edit.php', $data);
    }

    public function update($id)
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
                'rules' => 'ext_in[gambar,png,jpg,jpeg]',
                'errors' => [
                    'ext_in' => 'Extensi gambar hanya menerima png, jpg, jpeg'
                ]
            ]

        ])) {
            return redirect()->to('/berita/edit')->withInput();
        }
        if ($this->request->getFile('gambar')->getName()) {
            $file = $this->request->getFile('gambar');
            $file->move('berita/gambar');
            $filename = $file->getName();
            $this->BeritaModel->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'id_author' => $this->request->getVar('id_author'),
                'gambar' => $filename,
                'caption' => $this->request->getVar('caption'),
                'isi' => $this->request->getVar('isi')
            ]);
            return redirect()->to('/berita/index')->with('success', 'Anda berhasil Mengupdate berita');
        } else {
            $this->BeritaModel->save([
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'id_author' => $this->request->getVar('id_author'),
                'caption' => $this->request->getVar('caption'),
                'isi' => $this->request->getVar('isi')
            ]);
            return redirect()->to('/berita/index')->with('success', 'Anda berhasil Mengupdate berita');
        }
    }

    public function read($id)
    {
        $berita = $this->BeritaModel->getdetail($id);
        $data = [
            'title' => 'Baca Berita &mdash; elurah',
            'berita' => $berita
        ];
        if (!$berita) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('Masyarakat/Berita/baca.php', $data);
    }
}
