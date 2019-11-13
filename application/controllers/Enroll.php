<?php 

class Enroll extends CI_Controller
{
    function __construct(){
        parent::__construct();
        
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
        $this->load->view('Enroll/tes')
       
    }





}








?>