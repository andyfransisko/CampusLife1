<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }   

    private function head(){
        $this->load->view('LandingPage/Template/html-open');
        $this->load->view('LandingPage/Template/head-open');
        $data['title'] = "Home";
        $this->load->view("LandingPage/Template/template-header", $data);
        $this->load->view("LandingPage/Template/head-close");
        $this->load->view("LandingPage/Template/body-open");
        
    }

    private function foot(){
        $this->load->view("LandingPage/Template/preloader");
        $this->load->view("LandingPage/Template/footer");
        $this->load->view("LandingPage/Template/template-footer");
        $this->load->view("LandingPage/Template/body-close");
        $this->load->view("LandingPage/Template/html-close");
        
    }
    
    public function index()
    {
        $data['nav'] = "Home";
        $this->head();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view("LandingPage/Home/V_index");
        $this->foot();

        
    }



}

?>