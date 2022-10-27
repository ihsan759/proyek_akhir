<?php 
function countdata($table){
	$db = \Config\Database::connect();
	return $db->table($table)->countAllResults();
}

function countdatauser($roles){
	$where = "roles != ".$roles;
	$db = \Config\Database::connect();
	return $db->table('user')
	->where($where)
	->countAllResults();
}

function countdatasurat($table, $status){
	$db = \Config\Database::connect();
	return $db->table($table)
	->where(['status' => $status])
	->countAllResults();
}

function countusiamasyarakat($bat1, $bat2){
	$where = "TIMESTAMPDIFF(YEAR,Tanggal_kelahiran,CURDATE()) between ".$bat1." and ".$bat2;
	$db = \Config\Database::connect();
	return $db->table('kartu_keluarga')
	->where($where)
	->countAllResults();
}

function countdatajeniskelamin($jk){
	$db = \Config\Database::connect();
	return $db->table('kartu_keluarga')
	->where(['jenis_kelamin' => $jk])
	->countAllResults();
}

function countuser($status){
	$db = \Config\Database::connect();
	return $db->table('user')
	->where(['roles' => $status])
	->countAllResults();
}
