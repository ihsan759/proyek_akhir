<?php

namespace App\Controllers\Masyarakat;

use App\Controllers\BaseController;
use App\Models\Masyarakat\SuratModel;

class Surat extends BaseController
{
    protected $SuratModel;
    public function __construct()
    {
        $this->SuratModel = new SuratModel();
    }
    public function home()
    {
        $proses = 1;
        if (session('jabatan')) {
            $surat = $this->SuratModel->orderBy('id', 'DESC')->getsurat();
            $data = [
                'title' => 'Surat &mdash; elurah',
                'surat' => $surat,
                'validation' => \Config\Services::validation(),
                'proses' => $proses
            ];
            return view('Masyarakat/Petugas/Surat/index.php', $data);
        } else {
            $surat = $this->SuratModel->orderBy('id', 'DESC')->getpendingwarga();
            $data = [
                'title' => 'Surat &mdash; elurah',
                'surat' => $surat,
                'validation' => \Config\Services::validation(),
                'proses' => $proses
            ];
            return view('Masyarakat/Akun_Warga/Surat/index.php', $data);
        }
    }

    public function create()
    {
        if (session('jabatan')) {
            $nik = $this->SuratModel->getnik();
            $data = [
                'title' => 'Surat &mdash; elurah',
                'validation' => \Config\Services::validation(),
                'nik' => $nik
            ];
            return view('Masyarakat/Petugas/Surat/buatsurat.php', $data);
        } else {
            $data = [
                'title' => 'Surat &mdash; elurah',
                'validation' => \Config\Services::validation()
            ];
            return view('Masyarakat/Akun_Warga/Surat/buatsurat.php', $data);
        }
    }

    public function save()
    {
        if (!$this->validate([
            'surat_pengantar' => [
                'rules' => 'uploaded[surat_pengantar]',
                'errors' => [
                    'uploaded' => 'Surat Pengantar harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('/surat/add')->withInput();
        }
        $tanggal = date("Y-m-d");
        $tanggal_selesai = date('Y-m-d', strtotime('+1 days', strtotime($tanggal)));
        $surat_pengantar = $this->request->getFile('surat_pengantar');
        $surat_pengantar->move('surat/surat_pengantar');
        $surat_pengantar_name = $surat_pengantar->getName();
        if ($this->request->getVar('surat_pendukung') == null) {
            $this->SuratModel->save([
                'NIK' => $this->request->getVar('NIK'),
                'jenis_surat' => $this->request->getVar('jenis_surat'),
                'id_pemohon' => $this->request->getVar('id_pemohon'),
                'status' => 'Proses',
                'surat_pengantar' => $surat_pengantar_name,
                'tanggal_selesai' => $tanggal_selesai
            ]);

            return redirect()->to('/surat/index')->with('success', 'Anda berhasil membuat surat permohonan');
        } else {
            $surat_pendukung = $this->request->getFile('surat_pendukung');
            $surat_pendukung->move('surat/surat_pendukung');
            $surat_pendukung_name = $surat_pendukung->getName();
            $this->SuratModel->save([
                'NIK' => $this->request->getVar('NIK'),
                'jenis_surat' => $this->request->getVar('jenis_surat'),
                'id_pemohon' => $this->request->getVar('id_pemohon'),
                'status' => 'Proses',
                'surat_pendukung' => $surat_pendukung_name,
                'surat_pengantar' => $surat_pengantar_name,
                'tanggal_selesai' => $tanggal_selesai
            ]);

            return redirect()->to('/surat/index')->with('success', 'Anda berhasil membuat surat permohonan');
        }
    }

    public function store()
    {
        if (!$this->validate([
            'surat_pengantar' => [
                'rules' => 'uploaded[surat_pengantar]',
                'errors' => [
                    'uploaded' => 'Surat Pengantar harus diisi.'
                ]
            ],
            'jenis_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis surat harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/surat/add')->withInput();
        }
        $tanggal = date("Y-m-d");
        $tanggal_selesai = date('Y-m-d', strtotime('+1 days', strtotime($tanggal)));
        $surat_pengantar = $this->request->getFile('surat_pengantar');
        $surat_pengantar->move('surat/surat_pengantar');
        $surat_pengantar_name = $surat_pengantar->getName();
        if ($this->request->getVar('surat_pendukung') == null) {
            $this->SuratModel->save([
                'NIK' => session('NIK'),
                'jenis_surat' => $this->request->getVar('jenis_surat'),
                'id_pemohon' => session('id_petugas'),
                'status' => 'Pending',
                'surat_pengantar' => $surat_pengantar_name,
                'tanggal_selesai' => $tanggal_selesai
            ]);

            return redirect()->to('/surat/index')->with('success', 'Anda berhasil membuat surat permohonan');
        } else {
            $surat_pendukung = $this->request->getFile('surat_pendukung');
            $surat_pendukung->move('surat/surat_pendukung');
            $surat_pendukung_name = $surat_pendukung->getName();
            $this->SuratModel->save([
                'NIK' => session('NIK'),
                'jenis_surat' => $this->request->getVar('jenis_surat'),
                'id_pemohon' => session('id_petugas'),
                'status' => 'Pending',
                'surat_pendukung' => $surat_pendukung_name,
                'surat_pengantar' => $surat_pengantar_name,
                'tanggal_selesai' => $tanggal_selesai
            ]);

            return redirect()->to('/surat/index')->with('success', 'Anda berhasil membuat surat permohonan');
        }
    }

    public function delete($id)
    {
        $Surat = $this->SuratModel->where("id", $id)->first();
        $filename = $Surat['surat_pengantar'];
        unlink("surat/surat_pengantar/$filename");
        $this->SuratModel->delete($id);

        return redirect()->to('/surat/index')->with('success', 'Anda berhasil menghapus pengajuan surat permohonan');
    }

    public function tolak()
    {
        $tolak = 1;
        if (session('jabatan')) {
            $surat = $this->SuratModel->orderBy('id', 'DESC')->gettolak();
            $data = [
                'title' => 'Surat &mdash; elurah',
                'surat' => $surat,
                'validation' => \Config\Services::validation(),
                'tolak' => $tolak
            ];
            return view('Masyarakat/Petugas/Surat/index.php', $data);
        } else {
            $surat = $this->SuratModel->orderBy('id', 'DESC')->gettolakwarga();
            $data = [
                'title' => 'Surat &mdash; elurah',
                'surat' => $surat,
                'validation' => \Config\Services::validation(),
                'tolak' => $tolak
            ];
            return view('Masyarakat/Akun_Warga/Surat/index.php', $data);
        }
    }

    public function terima()
    {
        $terima = 1;
        if (session('jabatan')) {
            $surat = $this->SuratModel->orderBy('id', 'DESC')->getterima();
            $data = [
                'title' => 'Surat &mdash; elurah',
                'surat' => $surat,
                'validation' => \Config\Services::validation(),
                'terima' => $terima
            ];
            return view('Masyarakat/Petugas/Surat/index.php', $data);
        } else {
            $surat = $this->SuratModel->orderBy('id', 'DESC')->getterimawarga();
            $data = [
                'title' => 'Surat &mdash; elurah',
                'surat' => $surat,
                'validation' => \Config\Services::validation(),
                'terima' => $terima
            ];
            return view('Masyarakat/Akun_Warga/Surat/index.php', $data);
        }
    }

    public function verifikasi()
    {
        $surat = $this->SuratModel->orderBy('id', 'DESC')->getverifikasi();
        $terima = 1;
        $data = [
            'title' => 'Surat &mdash; elurah',
            'surat' => $surat,
            'validation' => \Config\Services::validation(),
            'terima' => $terima
        ];
        return view('Masyarakat/Petugas/Surat/index.php', $data);
    }

    public function konfirmasi()
    {
        if (!$this->validate([
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->to('/akun/index')->withInput();
        }
        $this->SuratModel->save([
            'id' => $this->request->getVar('id'),
            'status' => $this->request->getVar('status')
        ]);
        return redirect()->to('/surat/verifikasi')->with('success', 'Berhasil mengubah status');
    }
}
