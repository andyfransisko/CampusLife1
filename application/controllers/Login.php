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

    private function head_open($data){
        $this->load->view('LandingPage/Template/html-open');
        $this->load->view('LandingPage/Template/head-open');
        $this->load->view('LandingPage/Template/template-header', $data);
    }

    private function head_close(){
        $this->load->view('LandingPage/Template/head-close');
        $this->load->view('LandingPage/Template/body-open');
    }

    private function foot(){
        $this->load->view('LandingPage/Template/preloader');
        $this->load->view('LandingPage/Template/template-footer');
        $this->load->view('LandingPage/Template/body-close');
        $this->load->view('LandingPage/Template/html-close');
        
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if($this->form_validation->run() == false){
            $data['nav'] = "Login";
            $data['title'] = "Login";
            $this->head_open($data);
            $this->load->view('LandingPage/Template/login-css');
            $this->head_close();
            $this->load->view('LandingPage/Template/nav', $data );
            $this->load->view("LandingPage/Home/V_login");
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
        );

        
        $cek_user = $this->M_Login->getRecord('user', $where)->row_array();
        
        //cek user ada tidak
        if($cek_user)
        {
            //cek user uda aktivasi akun belum
            if($cek_user['status'] == 1){
                if(password_verify($password, $cek_user['password'])){
                    $data = array(
                        'username' => $cek_user['username'],
                        'tipe_akun' => $cek_user['tipe_akun'],
                        'nama_user' => $nama
                    );
                    $this->session->set_userdata($data);

                    if($cek_user['tipe_akun'] == 1){
                        $nama = $cek_user['nama_mhs'];
                        redirect('User');
                    }
                    else{
                        redirect('Dashboard/Welcome');
                    }
                    
                    
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
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Username is not registered!</div>');
            redirect('Login');
        }

    }

    public function signupMahasiswa(){
        $data['nav'] = "Login";
        $data['title'] = "Student Sign Up";
        $this->load->model('M_Jurusan');
        $data['jurusan'] = $this->M_Jurusan->tampilkanData()->result();
        $this->head_open($data);
        $this->load->view('LandingPage/Template/signup-css');
        $this->head_close();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view("LandingPage/Home/V_signup_mhs_2", $data);
        $this->foot();
    }

    public function signupDosen(){
        $data['nav'] = "Login";
        $data['title'] = "Lecturer Sign Up";
        $this->head_open($data);
        $this->load->view('LandingPage/Template/signup-css');
        $this->head_close();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view("LandingPage/Home/V_signup_dosen");
        $this->foot();
    }

    public function signupKaprodi(){
        $data['nav'] = "Login";
        $data['title'] = "Head Department Sign Up";
        $this->head_open($data);
        $this->load->view('LandingPage/Template/signup-css');
        $this->head_close();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view("LandingPage/Home/V_signup_kaprodi", $data);
        $this->foot();
    }

    public function signup(){
        $data['nav'] = "Login";
            $data['title'] = "Sign Up";
            $this->head_open($data);
            $this->load->view('LandingPage/Template/signup-css');
            $this->head_close();
            $this->load->view('LandingPage/Template/nav', $data );
            $this->load->view("LandingPage/Home/V_signup");
            $this->foot();
        
        
    }


    public function signup_mhs_cek(){
            $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[mahasiswa.nim]');
            $this->form_validation->set_rules('nama_mhs', 'Name', 'required|trim');
            $this->form_validation->set_rules('jenis_kelamin', 'Sex', 'required|trim');
            $this->form_validation->set_rules('jurusan', 'Major Name', 'required|trim');
            $this->form_validation->set_rules('angkatan', 'Batch', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('tmpt_lahir', 'Place of Birth', 'required|trim');
            $this->form_validation->set_rules('tgl_lahir', 'Date of Birth', 'required|trim');
            $this->form_validation->set_rules('alamat_rumah', 'Address', 'required|trim');
            $this->form_validation->set_rules('no_telp', 'Telephone Number', 'required|trim|numeric');
            $this->form_validation->set_rules('agama', 'Religion', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[6]|matches[password]');

            if($this->form_validation->run() == FALSE){
                $data['nav'] = "Login";
                $data['title'] = "Student Sign Up";
                $this->load->model('M_Jurusan');
                $data['jurusan'] = $this->M_Jurusan->tampilkanData()->result();
                $this->head_open($data);
                $this->load->view('LandingPage/Template/signup-css');
                $this->head_close();
                $this->load->view('LandingPage/Template/nav', $data );
                $this->load->view("LandingPage/Home/V_signup_mhs_2", $data);
                $this->foot();
            }
            else
            {
                $email = $this->input->post('email', true);

                $data_mhs = array(
                    'nim' => htmlspecialchars($this->input->post('nim')), 
                    'nama_mhs' => htmlspecialchars($this->input->post('nama_mhs')), 
                    'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')), 
                    'id_jurusan' => htmlspecialchars($this->input->post('jurusan')), 
                    'angkatan' => htmlspecialchars($this->input->post('angkatan')), 
                    'email_mhs' => htmlspecialchars($email), 
                    'tgl_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('tgl_lahir')))),
                    'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
                    'alamat_rumah' => htmlspecialchars($this->input->post('alamat_rumah')), 
                    'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
                    'agama' => htmlspecialchars($this->input->post('agama'))
                    //'user_add' => htmlspecialchars($this->input->post('nim')),  
                    //'user_edit' => '',  
                    //'user_delete' => '',
                    //'status_delete' => 1 
                );
        
                $data_user = array(
                    'username' => htmlspecialchars($this->input->post('nim'), true),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),   
                    'images' => 'default.jpg', 
                    'tipe_akun'=> '1',
                    'status' => '0'
                );
        
                
                
                 $this->M_Login->insertTable('mahasiswa', $data_mhs);
                 $this->M_Login->insertTable('user', $data_user);
        
               // $this->_send_email($token, 'verify');
        
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center p-t-25 p-b-50" role="alert">Your account has been created! <br> Please wait until your account verified. </div>');
                redirect('Login');  
                
                
            }
           
        
    }
    
    public function signup_dosen_cek(){
        $this->form_validation->set_rules('nidn', 'NIDN', 'required|trim');
        $this->form_validation->set_rules('nama_dosen', 'Name', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Sex', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('tmpt_lahir', 'Place of Birth', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Date of Birth', 'required|trim');
        $this->form_validation->set_rules('alamat_rumah', 'Address', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Telephone Number', 'required|trim|numeric');
        $this->form_validation->set_rules('agama', 'Religion', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[6]|matches[password]');

        if($this->form_validation->run() == FALSE){
            $data['nav'] = "Login";
            $data['title'] = "Lecturer Sign Up";
            $this->head_open($data);
            $this->load->view('LandingPage/Template/signup-css');
            $this->head_close();
            $this->load->view('LandingPage/Template/nav', $data );
            $this->load->view("LandingPage/Home/V_signup_dosen", $data);
            $this->foot();
        }
        else
        {
            $email = $this->input->post('email', true);

            $data_dosen = array(
                'nidn' => htmlspecialchars($this->input->post('nidn')), 
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen')), 
                'tipe_dosen' => 3,
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')), 
                'email_dosen' => htmlspecialchars($email), 
                'tgl_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('tgl_lahir')))),
                'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
                'alamat_rumah' => htmlspecialchars($this->input->post('alamat_rumah')), 
                'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
                'agama' => htmlspecialchars($this->input->post('agama')) 
            );
    
            $data_user = array(
                'username' => htmlspecialchars($this->input->post('nidn'), true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),   
                'images' => 'default.jpg', 
                'tipe_akun'=> '2',
                'status' => '0'
            );
    
            
             $this->M_Login->insertTable('dosen', $data_dosen);
             $this->M_Login->insertTable('user', $data_user);
    
           // $this->_send_email($token, 'verify');
    
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center p-t-25 p-b-50" role="alert">Your account has been created! <br> Please wait until your account verified. </div>');
            redirect('Login');  
            
            
        }
       
    
}
    private function _send_email($token, $type){
        
        $this->load->library('email');  
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'campuslife.cs@gmail.com',
            'smtp_pass' => 'campus123456',
            'smtp_port' => 465,
            'smtp_timeout' => 60,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];
        
        $this->email->initialize($config);

        $this->email->from('campuslife@gmail.com', 'Campus Life');
        $this->email->to('jayanagara.joshua@gmail.com');
        
        /*if($type == "verify"){
            $this->email->subject('Account Verification');
            $message = 
                "Hello". $this->input->post('nama') .",<br>
                Thank you for sign up with us! <br> 
                Please click this link to verify your account : \r\n <a href='>".base_url()."Login/verify?id=".$this->input->post('email')."&token=".urlencode($token)."'> Activate your account </a>";
            $this->email->message($message);
        }else if($type == "forgot"){
            $this->email->subject('Reset Password');
            $message = 
                "Hello". $this->input->post('nama') .",<br>
                <br> 
                This is your new password. <br>
                Email : ".$this->input->post('email'). "<br>
                Password : ".urlencode($token)." <br>
                <br>
                Please login using the new password, then change the password to your liking";
            $this->email->message($message);
        }*/
        $this->email->message('test');
        

        if($this->email->send()){
            return true;
        }
        else{
            echo $this->email->print_debugger();
            die;
        }
        
    }

    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->M_Login->get_user_record_by_email($email)->row_array();

        if($user){
            $user_token = $this->M_Login->get_record('user_token', ['token' => $token])->row_array();

            if($user_token){
                if(time() - $user_token['time_created'] < (60*60*24)){
                    $this->M_Login->update_record('user', ['status' => '1'], ['email'=>$email]);
                    
                    $this->M_Login->delete_record('user_token', ['token' => $token]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center p-t-25 p-b-50" role="alert">Verification Success! Please login </div>');
                }else{
                    $this->M_Login->delete_record('user', ['email' => $email]);
                    $this->M_Login->delete_record('user_token', ['token' => $token]);
                    
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert">Account Activation Failed! Token Expired</div>');
                    redirect('Login');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert">Account Activation Failed! Invalid Token</div>');
                redirect('Login');    

            }
        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert">Account Activation Failed! Wrong Email</div>');
            redirect('Login');
        }
    }

    public function forgot_password(){
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        
        if($this->form_validation->run() == false){
            $data['nav'] = "Login";
            $data['title'] = "Forgot Password";
            $this->head_open($data);
            $this->head_close();
            $this->load->view('LandingPage/Template/nav', $data );
            $this->load->view("Home/V_forgot_password");
            $this->foot();
        }
        else{
            $email = $this->input->post('email');

            $cek_email = $this->M_Login->get_user_record_by_email(array($email))->row_array();

            $id = ($cek_email['status'] == "1" ? $cek_email['nim']: $cek_email['nidn']);
            if($cek_email){
                 //token
                $token = base64_encode(random_bytes(32));
                $user_token = array(
                    'id'    => $id,
                    'email' => $email,
                    'token' => $token
                );

                $this->M_Login->insert_record('user_token', $user_token);
                $this->M_Login->update_record('user', $token, ['username' => $id]);
                $this->_send_email($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center p-t-25 p-b-50" role="alert">Please check your email to reset your password</div>');
                redirect('Login');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert">Email is not registered or activated!</div>');
                redirect('Login/forgot_password');
            }
        }
    }

    public function change_password(){
        if(!$this->session->userdata('reset_email')){
            redirect('Login');
        }

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[6]|matches[password]');
        
        if($this->form_validation->run() == false){
            $data['nav'] = "Login";
            $data['title'] = "Login";
            $this->head_open($data);
            $this->head_close();
            $this->load->view('LandingPage/Template/nav', $data );
            $this->load->view("LandingPage/Home/V_change_password");
            $this->foot();
        }else{
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email    = $this->session->userdata('reset_email');
            $table    = ($this->session->userdata('tipe_user') == "1" ? "mahasiswa" : "dosen");

            
            $this->M_Login->update_record($table, ['password' => $password], $email);

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center p-t-25 p-b-50" role="alert">Your password has been changed! Please login.</div>');
            redirect('Login');
        }
    }

    public function logout(){
        $this->session->session_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center p-t-25 p-b-50" role="alert">You have logged out</div>');
        redirect('Login');
    }

}
?>