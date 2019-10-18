<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }   

    private function head(){
        $this->load->view("Template/template-header");
        
    }
    
    private function foot(){
        $this->load->view("Template/preloader");
        $this->load->view("Template/footer");
        $this->load->view("Template/template-footer");
        
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