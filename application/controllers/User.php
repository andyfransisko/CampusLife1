<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Jurusan','M_Mahasiswa','M_User', 'M_Jurusan'));
    }

    private function head(){
        $this->load->view('LandingPage/Template/html-open');
        $this->load->view('LandingPage/Template/head-open');
        $data['title'] = 'User Profile';
        $this->load->view('LandingPage/Template/template-header', $data);
        $this->load->view('LandingPage/Template/login-css');
        $this->load->view('LandingPage/Template/head-close');
        $this->load->view('LandingPage/Template/body-open');
        
    }

    private function foot(){
        $this->load->view("LandingPage/Template/preloader");
        $this->load->view("LandingPage/Template/footer");
        $this->load->view("LandingPage/Template/template-footer");
        $this->load->view("LandingPage/Template/body-close");
        $this->load->view("LandingPage/Template/html-close");
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
        
        
        //$data['user'] = $this->M_User->get_where($tipe, $where)->result();
        $data['nav'] = "User";
        $this->head();
        $this->load->view('LandingPage/Template/nav', $data);
        $this->load->view("LandingPage/Home/V_index");
        //$this->load->view("User/V_profile", $data);
        $this->foot();
        
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }

    public function profile($nim)
    {
        $data['nav'] = "User";
        $this->load->model('M_User');
        $where = array('nim' => $nim);
        $data['user'] = $this->M_User->tampilkanData()->result();
        $data['jurusan'] = $this->M_Jurusan->tampilkanData()->result();
		$data['user'] = $this->M_User->tampilkanData()->result();
        $this->head();
        $this->load->view("LandingPage/Template/profile-css");
        $this->load->view('LandingPage/Template/nav', $data);
        $this->load->view("LandingPage/Home/V_profile");
        //$this->load->view("User/V_profile", $data);
        $this->foot();

        
    }



}

?>