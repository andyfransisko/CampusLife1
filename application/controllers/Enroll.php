<?php 

class Enroll extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Enroll');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_Matakuliah');
        $this->load->model('M_Semester');
        
    }

    private function head_open($data){
        $this->load->view('Template/html-open');
        $this->load->view('Template/head-open');
        $this->load->view('Template/template-header', $data);
    }

    private function head_close(){
        $this->load->view('Template/head-close');
        $this->load->view('Template/body-open');
    }

    private function foot(){
        //$this->load->view('Template/preloader');
        $this->load->view('Template/template-footer');
        $this->load->view('Template/body-close');
        $this->load->view('Template/html-close');
        
    }

    public function index(){
        
        
        $data['title'] = "Enroll - Campus Life";

        if(intval(date('m')) < 5){
            $date = 2;
        }
        else if(intval(date('m')) >= 5 && intval(date('m')) < 8){
            $date = 3;
        }
        else{
            $date = 1;
        }

        $data['matkul'] = $this->M_Enroll->getMatkulEnroll(date('Y'), $date)->result();
        $data['mahasiswa'] = $this->M_Mahasiswa->tampilkanData()->result();
        $data['tahun'] = $this->M_Semester->tampilkanData()->result();
        $this->load->view('LandingPage/Enroll/tes2', $data);
        
    }

    public function enroll($tangkapMatkul = 0, $tangkapSemester = 0){
        if(intval(date('m')) < 5){
            $date = 2;
        }
        else if(intval(date('m')) >= 5 && intval(date('m')) < 8){
            $date = 3;
        }
        else{
            $date = 1;
        } 
        

        $data['title'] = "Enroll - Campus Life";
        $data['mahasiswa'] = $this->M_Mahasiswa->tampilkanRecord()->result();
        
        $where = [
            'id_mata_kuliah' => $tangkapMatkul
        ];
        $data['enrolled'] = $this->M_Enroll->getAllEnrollCond($where)->row_array();
        $data['matkul'] = $this->M_Matakuliah->getJadwalMatkul($where)->row_array();
        $this->load->view('Enroll/tes', $data);
    }

    public function insertData(){
        
        
        $id_enroll = htmlspecialchars($this->input->post('id_enroll'));
        $id_matkul = htmlspecialschars($this->input->post('id_matkul'));
        $mahasiswa = htmlspecialschars($this->input->post('mahasiswa'));
        $id_semester = htmlspecialschars($this->input->post('id_semester'));

        foreach($mahasiswa as $a){
            $data = array(
                'id_enroll' =>$id_enroll,
                'id_mata_kuliah' =>$id_matkul,
                'nim' =>$mahasiswa,
                'id_semester' =>$id_semester,
            );
            $this->M_Enroll->insertTable('enroll', $data);
        }
    }





}








?>