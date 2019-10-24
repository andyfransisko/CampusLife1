<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Login');
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
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if($this->form_validation->run() == false){
            $data['nav'] = "Login";
            $this->head();
            $this->load->view('Template/nav', $data );
            $this->load->view("Home/V_login");
            $this->foot();
        }
        else{
            $this->login();
        }
        
        

        
    }

    public function login()
    {
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        
        $where = array(
            'username' => $username,
            'password' => $password

        );

        $cek_user = $this->M_Login->login_cek('user', $where)->row_array();
        
        //cek user ada tidak
        if($cek_user)
        {
            //cek user uda aktivasi akun belum
            if($cek_user['status'] == 1){
                if($password == $cek_user['password']){
                    $data = array(
                        'username' => $cek_user['username'],
                        'tipe_akun' => $cek_user['tipe_akun'],
                        'status' => $cek_user['status'],
                    );
                    $this->session->set_userdata($data);
                    redirect('User');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert">Wrong password!</div>');
                    redirect('Login');
                }

            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert">Username is not activated!</div>');
                redirect('Login');    
            }
        }else
        {
            //jika tidak ada keluar error
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert>Username is not registered!</div>');
            redirect('Login');
        }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }





}

?>