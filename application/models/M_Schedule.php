<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Schedule extends CI_Model{

    function get_jadwal($nim, $tahun, $oddeven){
        $query = $this->db->query('SELECT * FROM enroll a 
        JOIN jadwal_kuliah b ON a.id_mata_kuliah = b.id_mata_kuliah
        JOIN semester c ON a.id_semester = c.id_semester
        WHERE a.nim = $nim AND c.tahun = $tahun AND c.jenis_semester = $oddeven');

        return $query;

    }

    
    


}



?>