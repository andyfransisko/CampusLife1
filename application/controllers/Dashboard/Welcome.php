<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Dosen','M_Mahasiswa','M_User','M_Matakuliah','M_Semester'));
	}

	public function head(){
		$this->load->view('Dashboard/Template/head-open');
		$this->load->view('Dashboard/Template/css');
		$this->load->view('Dashboard/Template/head-close');
		if($this->session->userdata('tipe_akun')== 2){
			$data2['dosen'] = $this->M_Dosen->getRecord($this->session->userdata('username'))->row_array();
		}
		$this->load->view('Dashboard/Template/left', $data2);
	}
	
	public function foot(){
		$this->load->view('Dashboard/Template/js');
		$this->load->view('Dashboard/Template/body-close');
	}
	public function index()
	{
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanRecord()->result();
		$data['matakuliah'] = $this->M_Matakuliah->tampilkanRecord()->result();
		$data['nav'] = "User";
        $data['count'] = $this->M_Mahasiswa->tampilkanData()->num_rows();
		$data['hitungmahasiswa'] = $this->M_Mahasiswa->hitungJumlahMahasiswa();
		$this->head();
		$this->load->view('Dashboard/index',$data);
		$this->foot();
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
        
    }
	
		
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }
	
	public function Activating($username)
	{
		$data = ['status'=>'1'];
		$this->db->where('username',$username);
		$this->db->update('user',$data);
		redirect('Dashboard/Welcome');
	}

	public function Profile()
    {
        $data['nav'] = "User";
        $this->load->model('M_User');
        $data['user'] = $this->M_User->tampilkanData()->result();
		$data['dosen'] = $this->M_Dosen->tampilkanRecordProfile($this->session->userdata('username'))->result();
		$this->head();
		$this->load->view("Dashboard/V_Profile",$data);
		$this->foot();
        //$this->load->view("V_profile", $data);

        
    }

    public function Editprofile()
    {
        $data['nav'] = "User";
        $this->load->model('M_User');
        $data['user'] = $this->M_User->tampilkanData()->result();
		$data['dosen'] = $this->M_Dosen->tampilkanRecordProfile($this->session->userdata('username'))->result();
		$this->head();
		$this->load->view("Dashboard/V_Editprofil", $data);
		$this->foot();

        
    }

    function updateData(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_dosen', 'Name', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Sex', 'required|trim');
		$this->form_validation->set_rules('tipe_dosen', 'Lecturer Type', 'required|trim');
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

			$data_dosen = array(
				'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen')), 
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
				'tipe_dosen' => htmlspecialchars($this->input->post('tipe_dosen')),
				'email_dosen' => htmlspecialchars($this->input->post('email')), 
				'tgl_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('tgl_lahir')))),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
				'alamat_rumah' => htmlspecialchars($this->input->post('alamat')), 
				'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
				'agama' => htmlspecialchars($this->input->post('agama')), 
				'user_edit' => $this->session->userdata('username'),  
			);

			$where = array(
				'nidn' => $this->input->post('nidn'),
			);

			$this->M_Dosen->updateRecord($where,$data_dosen,'dosen');
			redirect('Dashboard/Welcome/Profile');

		}

		
	}
}
