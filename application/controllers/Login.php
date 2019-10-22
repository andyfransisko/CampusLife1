<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    private function head(){
        $this->load->view('Template/html-open');
        $this->load->view('Template/head-open');
        $data['title'] = "Login";
        $this->load->view('Template/template-header', $data);
        $this->load->view('Template/login-css');
        $this->load->view('Template/head-close');
        $this->load->view('Template/body-open');
        
    }

    private function foot(){
        $this->load->view('Template/preloader');
        $this->load->view('Template/template-footer');
        $this->load->view('Template/body-close');
        $this->load->view('Template/html-close');
        
    }

    public function index()
    {
        $data['nav'] = "Login";
        $this->head();
        $this->load->view('Template/nav', $data );
        $this->load->view("Home/V_login");
        $this->foot();

        
    }

    public function login()
    {
        $where = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')

        );

        $cek_user = $this->M_Home->login_cek('login', $where)->result();
        
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
            redirect(base_url('Home'));
        }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }





}

?>