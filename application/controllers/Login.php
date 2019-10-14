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
        $where = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')

        );

        $cek_user = $this->M_Home->login_cek('Login', $where)->result();
        
        if($cek_user > 0)
        {
            $data_session = array(
                'username' => $where['username'],
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            redirect('Home');
        }else
        {
            redirect('Home');
        }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }





}

?>