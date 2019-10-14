<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    private function head(){
        $data['judul'] = "Homepage - Campus Life";
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
        $this->head();
        $this->load->view("Home/login");
        $this->foot();
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $status_login = $this->M_Home->login_cek($username, $password)->result();
        
        if($status_login)
        {
            redirect('Home');
        }else
        {
            $this->load->view('Homepage');
        }


        
    }





}

?>