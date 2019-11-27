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

    public function profile()
    {
        $data['nav'] = "User";
        $this->load->model('M_User');
        $data['user'] = $this->M_User->tampilkanData()->result();
        $data['jurusan'] = $this->M_Jurusan->tampilkanData()->result();
        $data['mahasiswa'] = $this->M_Mahasiswa->tampilkanRecordProfile($this->session->userdata('username'))->result();
        $this->head();
        $this->load->view("LandingPage/Template/profile-css");
        $this->load->view('LandingPage/Template/nav', $data);
        $this->load->view("LandingPage/Home/V_profile");
        //$this->load->view("V_profile", $data);
        $this->foot();

        
    }

    public function Editprofile()
    {
        $data['nav'] = "User";
        $this->load->model('M_User');
        $data['user'] = $this->M_User->tampilkanData()->result();
        $data['jurusan'] = $this->M_Jurusan->tampilkanData()->result();
		$data['user'] = $this->M_User->tampilkanData()->result();
        $this->head();
        $this->load->view("LandingPage/Template/profile-css");
        $this->load->view('LandingPage/Template/nav', $data);
        $this->load->view("LandingPage/Home/V_Editprofile");
        //$this->load->view("User/V_profile", $data);
        $this->foot();

        
    }

    function updateData(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_mhs', 'Name', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Sex', 'required|trim');
		$this->form_validation->set_rules('id_jurusan', 'Major Name', 'required|trim');
		$this->form_validation->set_rules('angkatan', 'Batch', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('tmpt_lahir', 'Place of Birth', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Address', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Telephone Number', 'required|trim|numeric');
		$this->form_validation->set_rules('agama', 'Religion', 'required|trim');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_mhs = array(
				'nama_mhs' => htmlspecialchars($this->input->post('nama_mhs')), 
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')), 
				'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')), 
				'angkatan' => htmlspecialchars($this->input->post('angkatan')), 
				'email_mhs' => htmlspecialchars($this->input->post('email')), 
				'tgl_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('tgl_lahir')))),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
				'alamat_rumah' => htmlspecialchars($this->input->post('alamat')), 
				'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
				'agama' => htmlspecialchars($this->input->post('agama')), 
				'user_edit' => $this->session->userdata('username'),  
			);

			$where = array(
				'nim' => $this->input->post('nim'),
			);
			$this->M_Mahasiswa->updateRecord($where,$data_mhs,'mahasiswa');
			redirect('User/profile');

		}

		
	}


}

?>