<?php 
class Course extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Matakuliah');

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
        $data['nav'] = "Course";
        $data['matkul'] = $this->M_Matakuliah->getMatkul(1, 2019, 1)->result();
        foreach ($data['matkul'] as $a) {
            $data['detail_matkul'] = $this->M_Matakuliah->getJadwalMatkul($a->id_mata_kuliah)->result();
        }
        
        $this->head();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view('LandingPage/Course/V_course', $data);
        $this->foot();

        
    }

    function getHari($hari){
        switch ($hari) {
            case 1:
                echo "Monday";
                break;
            
            case 2:
                echo "Tuesday";
                break;

            case 3:
                echo "Wednesday";
                break;

            case 4:
                echo "Thursday";
                break;

            case 5:
                echo "Friday";
                break;

            case 6:
                echo "Saturday";
                break;

            case 7:
                echo "Sunday";
                break;

            default:
                return null;
                break;
        }
    }
    

}










?>