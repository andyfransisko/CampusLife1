<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Schedule extends CI_Model{

    function get_jadwal($nim, $tahun, $oddeven){
        $query = $this->db->query('SELECT a.nim, e.nama_mhs, 
        d.nama_mata_kuliah, c.tahun, c.jenis_semester, b.hari, b.jam_mulai, b.jam_selesai, f.detail_ruangan 
        FROM enroll a 
        JOIN jadwal_kuliah b ON a.id_mata_kuliah = b.id_mata_kuliah 
        JOIN semester c ON a.id_semester = c.id_semester 
        JOIN matakuliah d ON a.id_mata_kuliah = d.id_mata_kuliah 
        JOIN mahasiswa e ON a.nim = e.nim
        JOIN ruangan f ON d.id_ruangan = f.id_ruangan
        WHERE a.nim = '.$nim.' AND c.tahun = '.$tahun.' AND c.jenis_semester = "'.$oddeven.'"');

        return $query;

    }

    
    


}



?>