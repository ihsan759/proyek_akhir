<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id_petugas";
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_petugas', 'nama_petugas', 'no_hp', 'roles', 'jabatan', 'rt', 'rw', 'username', 'password'];
}
