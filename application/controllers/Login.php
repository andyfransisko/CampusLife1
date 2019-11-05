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
        $this->load->view('Template/html-open');
        $this->load->view('Template/head-open');
        $this->load->view('Template/template-header', $data);
    }

    private function head_close(){
        $this->load->view('Template/head-close');
        $this->load->view('Template/body-open');
    }

    private function foot(){
        //$this->load->view('Template/preloader');
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
            $data['title'] = "Login";
            $this->head_open($data);
            $this->load->view('Template/login-css');
            $this->head_close();
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

        $cek_user = $this->M_Login->get_record('user', $where)->row_array();
        
        //cek user ada tidak
        if($cek_user)
        {
            //cek user uda aktivasi akun belum
            if($cek_user['status'] == 1){
                if(password_verify($password, $cek_user['password'])){
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
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Username is not registered!</div>');
            redirect('Login');
        }

    }

    public function signup(){
        if($this->session->flashdata('tipe')){
            if($this->session->flashdata('tipe') == "1"){
                $data['nav'] = "Login";
                $data['title'] = "Student Sign Up";
                $this->head_open($data);
                $this->load->view('Template/signup-css');
                $this->head_close();
                $this->load->view('Template/nav', $data );
                $this->load->view("Home/V_signup_tipe_mhs");
                $this->foot();
            }
            else if($this->session->flashdata('tipe') == "2"){
                $data['nav'] = "Login";
                $data['title'] = "Lecturer Sign Up";
                $this->head_open($data);
                $this->load->view('Template/signup-css');
                $this->head_close();
                $this->load->view('Template/nav', $data );
                $this->load->view("Home/V_signup_tipe_mhs");
                $this->foot();
            }else{
                $this->load->view('errors/html/error_404');
            }
        }
        else{
            $data['nav'] = "Login";
            $data['title'] = "Sign Up";
            $this->head_open($data);
            $this->load->view('Template/signup-css');
            $this->head_close();
            $this->load->view('Template/nav', $data );
            $this->load->view("Home/V_signup");
            $this->foot();
        }
        
        
    }
    
    public function signup_tipe_mhs(){
        if($this->session->flashdata('tipe')){
            $this->session->set_flashdata('tipe_mhs', '1');    
            redirect('Login/signup_mhs');
        }
        
        
        $this->session->set_flashdata('tipe', '1');
        redirect('Login/signup');
        
    }

    public function signup_mhs($tipe){
        $data['nav'] = "Login";
            $data['title'] = "Student Sign Up";
            $this->head_open($data);
            $this->load->view('Template/signup-css');
            $this->head_close();
            $this->load->view('Template/nav', $data );
            
        if($tipe == "1"){
            $this->load->view("Home/V_signup_mhs_1");
        }
        else if($tipe == "2"){
            $this->load->view("Home/V_signup_mhs_2");
        }
        else{
            $this->load->view('errors/html/error_404');
        }
        $this->foot();
    }


    public function signup_mhs_cek(){
        
            $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[mahasiswa.nim]');
            $this->form_validation->set_rules('nama_mhs', 'Name', 'required|trim');
            $this->form_validation->set_rules('jenis_kelamin', 'Sex', 'required|trim');
            $this->form_validation->set_rules('jurusan', 'Major Name', 'required|trim');
            $this->form_validation->set_rules('universitas', 'University Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('tmpt_lahir', 'Place of Birth', 'required|trim');
            $this->form_validation->set_rules('tgl_lahir', 'Date of Birth', 'required|trim');
            $this->form_validation->set_rules('alamat_rumah', 'Address', 'required|trim');
            $this->form_validation->set_rules('no_telp', 'Telephone Number', 'required|trim|numeric');
            $this->form_validation->set_rules('agama', 'Religion', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[6]|matches[password]');

            if($this->form_validation->run() == false){
                
               echo validation_errors('<div class="error">', '</div>');;
                //redirect('Login/signup_mhs/1');
            }
            else
            {
                $email = $this->input->post('email', true);

                $data_mhs = array(
                    'nim' => htmlspecialchars($this->input->post('nim')), 
                    'nama_mhs' => htmlspecialchars($this->input->post('nama_mhs')), 
                    'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')), 
                    'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')), 
                    'email_mhs' => htmlspecialchars($email), 
                    'tgl_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('tgl_lahir')))),
                    'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
                    'alamat_rumah' => htmlspecialchars($this->input->post('alamat_rumah')), 
                    'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
                    'agama' => htmlspecialchars($this->input->post('agama')) 
                );

                $data_user = array(
                    'username' => htmlspecialchars($this->input->post('nim'), true),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),   
                    'images' => 'default.jpg', 
                    'tipe_akun'=> '1',
                    'status' => '0'
                );

                //token
                $token = base64_encode(random_bytes(32));
                $user_token = array(
                    'id'    => $this->input->post('nim'),
                    'email' => $email,
                    'token' => $token,
                );

                $this->load->library('email');  
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_timeout'] = 60;
        $config['smtp_user'] = 'campuslife.cs@gmail.com';
        $config['smtp_pass'] = 'campus123456';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['newline'] = "\r\n";
        
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from('campuslife@gmail.com', 'Campus Life');
        $this->email->to('jayanagara.joshua@gmail.com');
        $this->email->subject('tes');
        $this->email->message('test');
        

        if($this->email->send()){
            return true;
        }
        else{
            echo $this->email->print_debugger();
            die;
        }
        
                // $this->M_Login->insert_record('mahasiswa', $data_mhs);
                // $this->M_Login->insert_record('user', $data_user);
                // $this->M_Login->insert_record('user_token', $user_token);

               // $this->_send_email($token, 'verify');

                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert">Your account has been created! <br> Please check your email to activate your account. </div>');
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
            $this->load->view('Template/nav', $data );
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
            $this->load->view('Template/nav', $data );
            $this->load->view("Home/V_change_password");
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