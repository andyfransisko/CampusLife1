<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Mahasiswa extends CI_Model
{
    function tampilkanData()
	{
		$query=$this->db->get('mahasiswa');
		return $query;
		
	}
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.nim, a.nama_mhs,a.jenis_kelamin, a.email_mhs, b.id_jurusan, b.nama_jurusan, a.tgl_lahir, a.tmpt_lahir, a.alamat_rumah, a.no_telp, a.agama, a.angkatan FROM mahasiswa a JOIN jurusan b ON a.id_jurusan = b.id_jurusan');
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
    
    function get_data_mahasiswa(){
        $query = $this->db->query('SELECT a.nim, a.nama_mhs, b.nama_jurusan, a.angkatan
        FROM mahasiswa a
        JOIN jurusan b ON a.id_jurusan = b.id_jurusan');
        return $query;
    }

    function get_all_mahasiswa(){
        return $this->db->get('mahasiswa');
    }
}



?>