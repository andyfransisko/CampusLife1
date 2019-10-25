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
        
        $username = htmlspecialchars($this->input->post('username'));
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
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert">Username is not registered!</div>');
            redirect('Login');
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }

    public function signup(){
        $data['nav'] = "Login";
        $this->head();
        $this->load->view('Template/nav', $data );
        $this->load->view("Home/V_signup");
        $this->foot();
        
    }

    public function signup_mahasiswa(){
        $_tipe_akun = "1";
        
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[mahasiswa.nim]');
        $this->form_validation->set_rules('nama_mhs', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('id_jurusan', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email_mhs', 'Nama', 'r   equired|trim|valid_email');
        $this->form_validation->set_rules('tgl_lahir', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmpt_lahir', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat_rumah', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nama', 'required|trim|numeric');
        $this->form_validation->set_rules('agama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password', 'Nama', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Nama', 'required|trim|min_length[6]|matches[password]');
        if($this->form_validation->run() == false){
            
            $data['nav'] = "Login";
            $this->head();
            $this->load->view('Template/nav', $data );
            $this->load->view("Home/V_signup");
            $this->foot();
        }
        else{
            $data_mhs = array(
                'nim' => htmlspecialchars($this->input->post('nim')), 
                'nama_mhs' => htmlspecialchars($this->input->post('nama_mhs')), 
                'jenis_kelamin' => htmlspecialchars($this->input->post('jk')), 
                'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')), 
                'email_mhs' => htmlspecialchars($this->input->post('email_mhs')), 
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir')), 
                'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
                'alamat_rumah' => htmlspecialchars($this->input->post('alamat_rumah')), 
                'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
                'agama' => htmlspecialchars($this->input->post('agama')), 
                 
            ));

            $data_user = array(
                'username' => htmlspecialchars($this->input->post('nim')), 
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image' => 'default.jpg', 
                'tipe_akun'=> '1',
                'status' => '0'
            );

            $this->M_Login->insert_record('mahasiswa', $data_mhs);
            $this->M_Login->insert_record('user', $data_user);
            redirect('Login/activate')
        }
    }

    function signup_dosen(){
        $_tipe_akun = "2";
        
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('nama_mhs', 'Nama', 'required|trim');
        if($this->form_validation->run() == false){
            
            $data['nav'] = "Login";
            $this->head();
            $this->load->view('Template/nav', $data );
            $this->load->view("Home/V_signup");
            $this->foot();
        }
        else{
            $data = array(
                'nim' => htmlspecialchars($this->input->post('nim')), 
                'nama_mhs' => htmlspecialchars($this->input->post('nama_mhs')), 
                'jenis_kelamin' => htmlspecialchars($this->input->post('jk')), 
                'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')), 
                'email_mhs' => htmlspecialchars($this->input->post('email_mhs')), 
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir')), 
                'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
                'alamat_rumah' => htmlspecialchars($this->input->post('alamat_rumah')), 
                'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
                'agama' => htmlspecialchars($this->input->post('agama')), 
            );

            $data_user = array(
                'username' => htmlspecialchars($this->input->post('nim')), 
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image' => 'default.jpg', 
                'tipe_akun'=> '2',
                'status' => '0'
            );
        }
    }

    public function activate(){
        $data['nav'] = "Acivate Account";
        $this->head();
        $this->load->view('Template/nav', $data );
        $this->load->view("Home/V_activate");
        $this->foot();
    }

    public function activate_akun(){

    }

    private function _sendEmail(){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'campuslife@gmail.com',
            'smtp_pass' => '123456',
            'smtp_port' => '465',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => '\r\n',
        ];

        $this->load->library('email', $config);

        $this->email->from('campuslife@gmail.com', 'Campus Life');
        
    }


}

?>