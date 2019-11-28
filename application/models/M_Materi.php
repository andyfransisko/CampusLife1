 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Materi extends CI_Model{
 function tampilkanData()
	{
		$query=$this->db->get('materi');
		return $query;
		
    }
    
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.id_materi, b.nama_mata_kuliah, a.judul_materi, a.penjelasan_materi, a.kali_pertemuan, a.direktori_file
        FROM materi a 
        JOIN matakuliah b ON a.id_mata_kuliah = b.id_mata_kuliah 
        ');
	}
	
	function getMateri($id)
	{
		return $this->db->query('SELECT a.id_materi, b.nama_mata_kuliah, a.judul_materi, a.penjelasan_materi, a.kali_pertemuan, a.direktori_file
        FROM materi a 
        JOIN matakuliah b ON a.id_mata_kuliah = b.id_mata_kuliah 
		WHERE b.id_mata_kuliah = "'.$id.'"');
    }
    
	function insertTable($a,$b)
	{
		$this->db->insert($a,$b);
    }
    
	function editRecord($where,$table)
	{
		return $this->db->get_where($table,$where);
    }

    function getRecord($where,$table)
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
}