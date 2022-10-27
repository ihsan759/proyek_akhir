<?php

namespace App\Models\Masyarakat;

use CodeIgniter\Model;

class KKModel extends Model
{
    protected $table = 'detail_kartu_keluarga';
    protected $allowedFields = ['scan_kk', 'No_kk', 'rt', 'rw', 'alamat'];
    protected $primaryKey = 'No_kk';

    public function cekdata($no)
    {
        return $this->getWhere(['No_kk' => $no])->getResult();
    }

    public function getkk()
    {
        return $this->join('kartu_keluarga', 'detail_kartu_keluarga.No_kk = kartu_keluarga.No_kk')
            ->where('detail_kartu_keluarga.scan_kk!=', null)
            ->get()->getResultArray();
    }
}
