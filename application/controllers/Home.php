<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }   

    private function head(){
        $this->load->view('Template/html-open');
        $this->load->view('Template/head-open');
        $data['title'] = "Home";
        $this->load->view("Template/template-header", $data);
        $this->load->view("Template/head-close");
        $this->load->view("Template/body-open");
        
    }

    private function foot(){
        $this->load->view("Template/preloader");
        $this->load->view("Template/footer");
        $this->load->view("Template/template-footer");
        $this->load->view("Template/body-close");
        $this->load->view("Template/html-close");
        
    }
    
    public function index()
    {
        $data['nav'] = "Home";
        $this->head();
        $this->load->view('Template/nav', $data );
        $this->load->view("Home/V_index");
        $this->foot();

        
    }



}

?>