<?php

namespace App\Controllers\Masyarakat\Petugas;

use App\Controllers\BaseController;
use App\Models\Masyarakat\AkunModel;
use App\Models\Masyarakat\KKModel;
use App\Models\Masyarakat\KTPModel;
use App\Models\Masyarakat\MasyarakatModel;
use \PhpOffice\PhpSpreadsheet\Shared\Date;

class Masyarakat extends BaseController
{
    protected $MasyarakatModel;
    protected $KKModel;
    protected $KTPModel;
    protected $tanggal_excel;
    protected $AkunModel;
    public function __construct()
    {
        $this->AkunModel = new AkunModel();
        $this->KTPModel = new KTPModel();
        $this->KKModel = new KKModel();
        $this->MasyarakatModel = new MasyarakatModel();
        $this->tanggal_excel = new Date();
    }
    public function upload()
    {
        if (session('jabatan') == 'RW') {
            $direktori = 'RW';
        } else {
            $direktori = 'RT';
        }
        $data = [
            'title' => 'Data Masyarakat',
            'validation' => \Config\Services::validation(),
            'direktori' => $direktori
        ];
        return view('Masyarakat/Petugas/Masyarakat/upload.php', $data);
    }

    public function import()
    {
        if (!$this->validate([
            'file' => [
                'rules' => 'uploaded[file]|ext_in[file,xls,xlsx]',
                'errors' => [
                    'uploaded' => 'Data Kartu Keluarga harus diinputkan.',
                    'ext_in' => 'Extensi Data Kartu Keluarga hanya menerima xls, xlsx'
                ]
            ]

        ])) {
            return redirect()->to('/masyarakat/upload')->withInput();
        }
        $file = $this->request->getFile('file');
        $ext = $file->getClientExtension();
        if ($ext == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();
        foreach ($sheet as $x => $excel) {
            if ($x == 0 || $x == 1) {
                continue;
            }

            if (empty($excel['0']) || empty($excel['22'])) {
                continue;
            }

            $tanggal_kelahiran = $this->tanggal_excel->excelToDateTimeObject($excel['4'])->format('Y-m-d');
            $tanggal_SBKRI = $this->tanggal_excel->excelToDateTimeObject($excel['10'])->format('Y-m-d');
            $tanggal_mulai_tinggal = $this->tanggal_excel->excelToDateTimeObject($excel['14'])->format('Y-m-d');
            $tanggal_kepindahan = $this->tanggal_excel->excelToDateTimeObject($excel['15'])->format('Y-m-d');

            $data = [
                'NIK' => $excel['0'],
                'Nama' => $excel['1'],
                'Jenis_kelamin' => $excel['2'],
                'Hubungan_kepala_keluarga' => $excel['3'],
                'Tanggal_kelahiran' =>  $tanggal_kelahiran,
                'Tempat_lahir' => $excel['5'],
                'Provinsi' => $excel['6'],
                'Status_perkawinan' => $excel['7'],
                'Agama' => $excel['8'],
                'No_SBKRI' => $excel['9'],
                'Tanggal_SBKRI' => $tanggal_SBKRI,
                'Pendidikan_terakhir' => $excel['11'],
                'Kemampuan_bahasa' => $excel['12'],
                'Pekerjaan' => $excel['13'],
                'Tanggal_mulai_tinggal' => $tanggal_mulai_tinggal,
                'Tanggal_kepindahan' => $tanggal_kepindahan,
                'Nama_bapak' => $excel['16'],
                'Nama_ibu' => $excel['17'],
                'Golongan_darah' => $excel['18'],
                'Akseptor_KB' => $excel['19'],
                'Catat_menurut_jenis' => $excel['20'],
                'Keterangan_lain-lain' => $excel['21'],
                'No_kk' => $excel['23'],
                'Alamat' => $excel['22']
            ];

            if (session('jabatan') == 'RW') {
                $kk = [
                    'No_kk' => $excel['23'],
                    'rt' => $excel['24'],
                    'rw' => session('rw'),
                ];
            } else {
                $kk = [
                    'No_kk' => $excel['23'],
                    'rt' => session('rt'),
                    'rw' => session('rw'),
                ];
            }

            $ktp = [
                'NIK' => $excel['0']
            ];

            if (session('jabatan') == 'RW') {
                $kk_update = [
                    'rt' => $excel['24'],
                    'rw' => session('rw'),
                ];
            } else {
                $kk_update = [
                    'rt' => session('rt'),
                    'rw' => session('rw'),
                ];
            }

            $akun = [
                'NIK' => $excel['0'],
                'id_petugas' => session('id_petugas'),
                'status' => 'Tidak Aktif'
            ];

            $NIK = $this->KTPModel->cekdata($excel['0']);
            $No_KK = $this->KKModel->cekdata($excel['23']);
            $NIK_KK = $this->MasyarakatModel->cekdata($excel['0']);
            if (count($NIK) == 0) {
                $this->KTPModel->insert($ktp);
                $this->AkunModel->insert($akun);
            }

            if (count($No_KK) == 0) {
                $this->KKModel->insert($kk);
            } else {
                $this->KKModel->update($excel['23'], $kk_update);
            }

            if (count($NIK_KK) == 0) {
                $this->MasyarakatModel->insert($data);
            } else {
                $this->MasyarakatModel->save($data);
            }
        }
        return redirect()->to('/masyarakat/index')->with('success', 'Anda berhasil memasukkan data masyarakat');
    }

    public function index()
    {
        if (session('jabatan') == 'RT') {
            $masyarakat = $this->MasyarakatModel->orderBy('kartu_keluarga.No_kk', 'DESC')->getdata();
        } else {
            $masyarakat = $this->MasyarakatModel->orderBy('kartu_keluarga.No_kk', 'DESC')->viewdata();
        }
        $data = [
            'title' => 'Data Masyarakat',
            'validation' => \Config\Services::validation(),
            'masyarakat' => $masyarakat
        ];
        return view('Masyarakat/Petugas/Masyarakat/index.php', $data);
    }

    public function input()
    {
        $kk = $this->MasyarakatModel->getkk();
        $ktp = $this->MasyarakatModel->getktp();
        $data = [
            'title' => 'Data Masyarakat',
            'kk' => $kk,
            'ktp' => $ktp,
            'validation' => \Config\Services::validation()
        ];
        return view('Masyarakat/Petugas/Masyarakat/input.php', $data);
    }

    public function kk()
    {
        if (!$this->validate([
            'No_kk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Kartu Keluarga harus diisi.',
                ]
            ],
            'file_kk' => [
                'rules' => 'uploaded[file_kk]|ext_in[file_kk,png,jpg,jpeg,pdf]',
                'errors' => [
                    'uploaded' => 'Scan Kartu Keluarga harus diisi.',
                    'ext_in' => 'Extensi Scan Kartu Keluarga hanya menerima png, jpg, jpeg, pdf'
                ]
            ]

        ])) {
            return redirect()->to('/masyarakat/input')->withInput();
        }
        $file = $this->request->getFile('file_kk');
        $file->move('masyarakat/photo_kk');
        $filename = $file->getName();
        $this->KKModel->save([
            'No_kk' => $this->request->getVar('No_kk'),
            'scan_kk' => $filename
        ]);

        return redirect()->to('/masyarakat/input')->with('success', 'Anda berhasil memasukkan Scan KK');
    }

    public function ktp()
    {
        if (!$this->validate([
            'NIK' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK harus diisi.',
                ]
            ],
            'file_ktp' => [
                'rules' => 'uploaded[file_ktp]|ext_in[file_ktp,png,jpg,jpeg,pdf]',
                'errors' => [
                    'uploaded' => 'Scan Kartu Keluarga harus diisi.',
                    'ext_in' => 'Extensi Scan Kartu Keluarga hanya menerima png, jpg, jpeg, pdf'
                ]
            ]

        ])) {
            return redirect()->to('/masyarakat/input')->withInput();
        }
        $file = $this->request->getFile('file_ktp');
        $file->move('masyarakat/photo_ktp');
        $filename = $file->getName();
        $this->KTPModel->save([
            'NIK' => $this->request->getVar('NIK'),
            'scan_ktp' => $filename
        ]);

        return redirect()->to('/masyarakat/input')->with('success', 'Anda berhasil memasukkan Scan KTP');
    }

    public function edit()
    {
        $kk = $this->KKModel->getkk();
        $ktp = $this->KTPModel->getktp();
        $data = [
            'title' => 'Edit Berkas Masyarakat',
            'kk' => $kk,
            'ktp' => $ktp,
            'validation' => \Config\Services::validation()
        ];
        return view('Masyarakat/Petugas/Masyarakat/edit.php', $data);
    }

    public function ktp_update()
    {
        if (!$this->validate([
            'NIK' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK harus diisi.',
                ]
            ],
            'file_ktp' => [
                'rules' => 'uploaded[file_ktp]|ext_in[file_ktp,png,jpg,jpeg,pdf]',
                'errors' => [
                    'uploaded' => 'Scan Kartu Keluarga harus diisi.',
                    'ext_in' => 'Extensi Scan Kartu Keluarga hanya menerima png, jpg, jpeg, pdf'
                ]
            ]

        ])) {
            return redirect()->to('/masyarakat/edit')->withInput();
        }
        $file = $this->request->getFile('file_ktp');
        $file->move('masyarakat/photo_ktp');
        $filename = $file->getName();
        $this->KTPModel->save([
            'NIK' => $this->request->getVar('NIK'),
            'scan_ktp' => $filename
        ]);

        return redirect()->to('/masyarakat/edit')->with('success', 'Anda berhasil mengupdate Scan KTP');
    }

    public function kk_update()
    {
        if (!$this->validate([
            'No_kk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Kartu Keluarga harus diisi.',
                ]
            ],
            'file_kk' => [
                'rules' => 'uploaded[file_kk]|ext_in[file_kk,png,jpg,jpeg,pdf]',
                'errors' => [
                    'uploaded' => 'Scan Kartu Keluarga harus diisi.',
                    'ext_in' => 'Extensi Scan Kartu Keluarga hanya menerima png, jpg, jpeg, pdf'
                ]
            ]

        ])) {
            return redirect()->to('/masyarakat/edit')->withInput();
        }
        $file = $this->request->getFile('file_kk');
        $file->move('masyarakat/photo_kk');
        $filename = $file->getName();
        $this->KKModel->save([
            'No_kk' => $this->request->getVar('No_kk'),
            'scan_kk' => $filename
        ]);

        return redirect()->to('/masyarakat/edit')->with('success', 'Anda berhasil mengupdate Scan KK');
    }

    public function delete($id)
    {
        $this->AkunModel->delete($id);
        $this->MasyarakatModel->delete($id);
        $this->KTPModel->delete($id);

        return redirect()->to('/masyarakat/index')->with('success', 'Anda berhasil menghapus data');
    }

    public function add()
    {
        $data = [
            'title' => 'Input Data Masyarakat',
            'validation' => \Config\Services::validation()
        ];
        return view('Masyarakat/Petugas/Masyarakat/add.php', $data);
    }
}
