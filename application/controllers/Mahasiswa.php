<?php 
class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    private function head(){
        $data['judul'] = "Student - Campus Life";
        $this->load->view("Template/template-header", $data);
        $this->load->view("Template/bg_login");
        $this->load->view("Template/preloader");
        $this->load->view("Template/nav");

    }

    private function foot(){
        $this->load->view("Template/template-footer");
    }

    public function index()
    {
        $this->load->view('User/Mahasiswa');
    }
}










?>