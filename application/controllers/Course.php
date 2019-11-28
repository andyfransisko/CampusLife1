<?php 
class Course extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Matakuliah');
        $this->load->model('M_Jadwalkuliah');

    }

    private function head(){
        $this->load->view('LandingPage/Template/html-open');
        $this->load->view('LandingPage/Template/head-open');
        $data['title'] = "Courses";
        $this->load->view('LandingPage/Template/template-header', $data);
        $this->load->view('LandingPage/Template/course-css');
        $this->load->view('LandingPage/Template/head-close');
        $this->load->view('LandingPage/Template/body-open');
        
    }

    private function foot(){
        $this->load->view('LandingPage/Template/preloader');
        $this->load->view('LandingPage/Template/footer');
        $this->load->view('LandingPage/Template/template-footer');
        $this->load->view('LandingPage/Template/course-js');
        $this->load->view('LandingPage/Template/body-close');
        $this->load->view('LandingPage/Template/html-close');
        
    }

    public function index()
    {
        if(intval(date('m')) < 5){
            $date = 2;
        }
        else if(intval(date('m')) >= 5 && intval(date('m')) < 8){
            $date = 3;
        }
        else{
            $date = 1;
        } 
        $data['nav'] = "Course";
        $data['matkul'] = $this->M_Matakuliah->getMatkul($this->session->userdata('username'), date('Y'), $date)->result();
        $data['jadwal_matkul'] = $this->M_Jadwalkuliah->tampilkanRecord()->result();
        
        $this->head();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view('LandingPage/Course/V_course', $data);
        $this->foot();

        
    }

    public function detailCourse($id){
        $data['nav'] = "Course Detail";
        $this->head();
        $this->load->view('LandingPage/Template/nav', $data);
        $this->load->view('LandingPage/Course/V_detail_course');
        $this->foot();
    }
    

}










?>