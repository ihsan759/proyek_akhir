<?php

namespace App\Models\Masyarakat;

use CodeIgniter\Model;

class KTPModel extends Model
{
    protected $table = 'detail_ktp';
    protected $allowedFields = ['scan_ktp', 'NIK'];
    protected $primaryKey = 'NIK';

    public function cekdata($NIK)
    {
        return $this->getWhere(['NIK' => $NIK])->getResult();
    }

    public function getktp()
    {
        return $this->join('kartu_keluarga', 'detail_ktp.NIK = kartu_keluarga.NIK')
            ->where('scan_ktp!=', null)
            ->get()->getResultArray();
    }
}
