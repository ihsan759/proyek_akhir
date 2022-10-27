<?php

namespace App\Models\Admin;

use CodeIgniter\Database\ConnectionInterface;

class queryBuilder
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

	public function getsuratuser()
	{
		$data = $this->db->table('surat')
			->join('user', 'user.id_petugas = surat.id_pemohon')
			->get();
		return $data->getResult();
	}

	public function getstatussurat($status)
	{
		$data = $this->db->table('surat')
			->join('user', 'user.id_petugas = surat.id_pemohon')
			->where(['status' => $status])
			->get();
		return $data->getResult();
	}

	public function getsuratuserbyid($id)
	{
		$data = $this->db->table('surat')
			->join('user', 'user.id_petugas = surat.id_pemohon')
			->where(['id_pemohon' => $id])
			->get();
		return $data->getResult();
	}

	public function getusernotin()
	{
		$where = "roles not in ('kades','admin') and deleted_at is null";
		$data = $this->db->table('user')
			->where($where)
			->get();
		return $data->getResult();
	}

	public function getuserin()
	{
		$where = "roles in ('kades','admin') and deleted_at is null";
		$data = $this->db->table('user')
			->where($where)
			->get();
		return $data->getResult();
	}

	public function getdownloadsurat($id)
	{
		$data = $this->db->table('surat')
			->join('kartu_keluarga', 'kartu_keluarga.nik = surat.nik')
			->where(['id' => $id])
			->get();
		return $data;
	}
}
