<?php 
class Schedule extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Schedule');

    }

    private function head(){
        $this->load->view('LandingPage/Template/html-open');
        $this->load->view('LandingPage/Template/head-open');
        $data['title'] = "Schedule";
        $this->load->view('LandingPage/Template/template-header', $data);
        //$this->load->view('Template/schedule-css');
        //$this->load->view('Template/timeline-css');
        $this->load->view('LandingPage/Template/new');
        $this->load->view('LandingPage/Template/head-close');
        $this->load->view('LandingPage/Template/body-open');
        
    }

    private function foot(){
        $this->load->view('LandingPage/Template/preloader');
        $this->load->view('LandingPage/Template/footer');
        $this->load->view('LandingPage/Template/template-footer');
        //$this->load->view('Schedule/calendar-script');
        $this->load->view('LandingPage/Template/body-close');
        $this->load->view('LandingPage/Template/html-close');
        
    }

    public function index()
    {
        $data['nav'] = "Schedule";
        $data['jadwal'] = $this->M_Schedule->getJadwal(1, 2019, 1)->result();
        $this->head();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view("LandingPage/Schedule/V_schedule", $data);
        $this->foot();

    }


}










?>