<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class historyberitaModel extends Model
{
    protected $table      = 'history_berita';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'id_author', 'judul', 'caption', 'status', 'isi', 'deleted_at'];
}
