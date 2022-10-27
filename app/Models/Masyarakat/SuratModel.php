<?php

namespace App\Models\Masyarakat;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $table = 'surat';
    protected $useTimestamps = true;

    protected $allowedFields = ['NIK', 'jenis_surat', 'id_pemohon', 'surat_pengantar', 'surat_pendukung', 'tanggal_selesai', 'status'];

    public function getsurat()
    {
        return $this->join('kartu_keluarga', 'kartu_keluarga.NIK=surat.NIK')
            ->groupStart()
            ->where('status', 'Proses')
            ->where('id_pemohon', session('id_petugas'))
            ->groupEnd()
            ->orderBy('id', 'desc')
            ->get()->getResultArray();
    }

    public function gettolak()
    {
        return $this->join('kartu_keluarga', 'kartu_keluarga.NIK=surat.NIK')
            ->groupStart()
            ->where('status', 'Tolak')
            ->where('id_pemohon', session('id_petugas'))
            ->groupEnd()
            ->orderBy('id', 'desc')
            ->get()->getResultArray();
    }

    public function getterima()
    {
        return $this->join('kartu_keluarga', 'kartu_keluarga.NIK=surat.NIK')
            ->groupStart()
            ->where('status', 'Terima')
            ->where('id_pemohon', session('id_petugas'))
            ->groupEnd()
            ->orderBy('id', 'desc')
            ->get()->getResultArray();
    }

    public function getverifikasi()
    {
        return $this->join('kartu_keluarga', 'kartu_keluarga.NIK=surat.NIK')
            ->groupStart()
            ->where('status', 'Pending')
            ->where('id_pemohon', session('id_petugas'))
            ->groupEnd()
            ->orderBy('id', 'desc')
            ->get()->getResultArray();
    }

    public function getnik()
    {
        return $this->db->table('kartu_keluarga')
            ->join('detail_kartu_keluarga', 'detail_kartu_keluarga.No_kk = kartu_keluarga.No_kk')
            ->join('detail_ktp', 'detail_ktp.NIK = kartu_keluarga.NIK')
            ->groupStart()
            ->where('detail_ktp.scan_ktp!=', null)
            ->where('detail_kartu_keluarga.scan_kk!=', null)
            ->groupEnd()
            ->get()->getResultArray();
    }

    public function cekstatus($NIK, $tanggal, $jenis)
    {
        return $this->groupStart()
            ->where('NIK', $NIK)
            ->where('created_at', $tanggal)
            ->where('jenis_surat', $jenis)
            ->groupEnd()
            ->get()->getResultArray();
    }

    public function getpendingwarga()
    {
        return $this->groupStart()
            ->where('NIK', session('NIK'))
            ->where('status', 'Pending')
            ->groupEnd()
            ->get()->getResultArray();
    }

    public function getproseswarga()
    {
        return $this->groupStart()
            ->where('NIK', session('NIK'))
            ->where('status', 'Proses')
            ->groupEnd()
            ->get()->getResultArray();
    }

    public function getterimawarga()
    {
        return $this->groupStart()
            ->where('NIK', session('NIK'))
            ->where('status', 'Terima')
            ->groupEnd()
            ->get()->getResultArray();
    }

    public function gettolakwarga()
    {
        return $this->groupStart()
            ->where('NIK', session('NIK'))
            ->where('status', 'Tolak')
            ->groupEnd()
            ->get()->getResultArray();
    }
}
