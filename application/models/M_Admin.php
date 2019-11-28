<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	function tampilkanData()
	{
		$query=$this->db->get('admin');
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
	function getRecord($where)
	{
		return $this->db->query('SELECT a.id_admin, a.nama_admin, c.username, c.status, c.tipe_akun 
		FROM admin a 
		JOIN user c ON a.id_admin=c.username 
		WHERE c.username = "'.$where.'"');
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
	function get_record_ajax($where)
	{
		$this->db->where('id_admin',$where);
		$hasil = $this->db->get('admin');
		
		
		return $hasil;
	}
}
?>