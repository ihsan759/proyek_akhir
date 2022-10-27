<?php

namespace App\Controllers\Masyarakat;

use App\Controllers\BaseController;
use App\Models\Masyarakat\BeritaModel;
use App\Models\Masyarakat\DokumenModel;
use App\Models\Masyarakat\MasyarakatModel;
use App\Models\Masyarakat\SuratModel;

class Home extends BaseController
{
    protected $SuratModel;
    protected $BeritaModel;
    protected $MasyarakatModel;
    protected $DokumenModel;
    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
        $this->MasyarakatModel = new MasyarakatModel();
        $this->SuratModel = new SuratModel();
        $this->BeritaModel = new BeritaModel();
    }
    public function home()
    {
        $surat = count($this->SuratModel->getsurat()) + count($this->SuratModel->getterima()) + count($this->SuratModel->gettolak());
        $berita = count($this->BeritaModel->getberita());
        if (session('jabatan') == 'RT') {
            $masyarakat = count($this->MasyarakatModel->getdata());
            $dokumen = count($this->DokumenModel->getdata());
        } else {
            $masyarakat = count($this->MasyarakatModel->viewdata());
            $dokumen = count($this->DokumenModel->viewdata());
        }
        $data = [
            'surat' => $surat,
            'berita' => $berita,
            'masyarakat' => $masyarakat,
            'validation' => \Config\Services::validation(),
            'dokumen' => $dokumen,
            'title' => 'Dashboard &mdash; elurah'
        ];
        return view('Masyarakat/Petugas/home.php', $data);
    }

    public function view()
    {
        $pending = count($this->SuratModel->getpendingwarga());
        $proses = count($this->SuratModel->getproseswarga());
        $terima = count($this->SuratModel->getterimawarga());
        $tolak = count($this->SuratModel->gettolakwarga());
        $data = [
            'title' => 'Dashboard &mdash; elurah',
            'validation' => \Config\Services::validation(),
            'pending' => $pending,
            'proses' => $proses,
            'terima' => $terima,
            'tolak' => $tolak
        ];
        return view('Masyarakat/Akun_Warga/home.php', $data);
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'title' => 'Index &mdash; elurah'
        ];
        return view('index.php', $data);
    }

    public function cek()
    {
        if (!$this->validate([
            'NIK' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK harus diisi.'
                ]
            ],
            'jenis_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis surat harus diisi.'
                ]
            ],
            'date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('/')->withInput();
        }
        $NIK = $this->request->getVar('NIK');
        $jenis_surat = $this->request->getVar('jenis_surat');
        $tanggal = $this->request->getVar('date');
        $surat = $this->SuratModel->cekstatus($NIK, $tanggal, $jenis_surat);
        $count = count($surat);
        $data = [
            'validation' => \Config\Services::validation(),
            'surat' => $surat,
            'count' => $count,
            'title' => 'Index &mdash; elurah'
        ];
        return view('index.php', $data);
    }
}
