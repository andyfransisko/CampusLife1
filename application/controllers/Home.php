<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    private function head(){
        $data['judul'] = "Homepage - Campus Life";
        $this->load->view("Template/template-header", $data);
        $this->load->view("Template/bg_home");
        $this->load->view("Template/preloader");
        $this->load->view("Template/nav");

    }

    private function foot(){
        $this->load->view("Template/template-footer");
    }

    public function index()
    {
        $this->head();
        $this->load->view("Home/index");
        $this->foot();
        
    }



}

?>