<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
    }

    private function head(){
        $this->load->view('Template/html-open');
        $this->load->view('Template/head-open');
        $data['title'] = 'User Profile';
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
        if($this->session->userdata('tipe_akun') == '1'){
            $tipe = 'mahasiswa';
            $where = array(
                'nim' => $this->session->userdata('username'),
            );
        }
        else if($this->session->userdata('tipe_akun') == '2'){
            $tipe = 'dosen';
            $where = array(
                'nidn' => $this->session->userdata('username'),
            );
        }
        else{
            $tipe = 'admin';
            $where = array(
                'id_admin' => $this->session->userdata('username'),
            );
        }
        
        
        $data['user'] = $this->M_User->get_where($tipe, $where)->result();
        $data['nav'] = "User";
        $this->head();
        $this->load->view('Template/nav', $data);
        $this->load->view("User/V_profile", $data);
        $this->foot();
        
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }





}

?>