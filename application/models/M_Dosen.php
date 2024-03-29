<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dosen extends CI_Model {

	function tampilkanData()
	{
		$query=$this->db->get('dosen');
		return $query;
		
	}
	function insertTable($a,$b)
	{
		$this->db->insert($a,$b);
	}
	function editRecord($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	function updateRecord($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function hapusRecord($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.nidn, a.nama_dosen,a.jenis_kelamin,a.tipe_dosen, a.email_dosen, a.tgl_lahir, a.tmpt_lahir, a.alamat_rumah, a.no_telp, a.agama, a.no_telp, c.username, c.status, c.tipe_akun FROM dosen a JOIN user c ON a.nidn=c.username');
	}
	function getRecord($where)
	{
		return $this->db->query('SELECT a.nidn, a.nama_dosen,a.tipe_dosen, c.username, c.status, c.tipe_akun 
		FROM dosen a 
		JOIN user c ON a.nidn=c.username 
		WHERE c.username = '.$where);
	}
	function getRecordActivate()
	{
		return $this->db->query('SELECT a.nidn, a.nama_dosen,a.tipe_dosen, c.username, c.status, c.tipe_akun 
		FROM dosen a 
		JOIN user c ON a.nidn=c.username 
		WHERE c.status = 0');
	}
	function getRecordOther($where){
		return $this->db->query('SELECT a.nidn, a.nama_dosen,a.tipe_dosen,a.jenis_kelamin, c.username, c.status, c.tipe_akun 
		FROM dosen a 
		JOIN user c ON a.nidn=c.username 
		WHERE c.username != '.$where);
	}
	function tampilkanRecordProfile($nidn)
	{
		return $this->db->query('SELECT a.nidn, a.nama_dosen,a.jenis_kelamin,a.tipe_dosen, a.email_dosen, a.tgl_lahir, a.tmpt_lahir, a.alamat_rumah, a.no_telp, a.agama, a.no_telp, c.username, c.status, c.tipe_akun FROM dosen a JOIN user c ON a.nidn=c.username WHERE a.nidn='.$nidn);
	}
}
?>