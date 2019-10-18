<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
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
        $this->load->view("Template/template-footer");
        
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