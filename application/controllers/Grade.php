<?php 
class Grade extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Semester','M_Matakuliah'));

    }

    private function head(){
        $this->load->view('LandingPage/Template/html-open');
        $this->load->view('LandingPage/Template/head-open');
        $data['title'] = "Grade";
        $this->load->view("LandingPage/Template/template-header", $data);
        $this->load->view("LandingPage/Template/css-grade");
        $this->load->view("LandingPage/Template/head-close");
        $this->load->view("LandingPage/Template/body-open");
        
    }

    private function foot(){
        $this->load->view("LandingPage/Template/preloader");
        $this->load->view("LandingPage/Template/footer");
        $this->load->view("LandingPage/Template/template-footer");
        $this->load->view("LandingPage/Template/body-close");
        $this->load->view("LandingPage/Template/html-close");
        
    }

    public function index($nim)
    {
        if(intval(date('m')) < 5){
            $date = 2;
        }
        else if(intval(date('m')) >= 5 && intval(date('m')) < 8){
            $date = 3;
        }
        else{
            $date = 1;
        } 
        $where = array('nim' => $nim);
        $data['semester'] = $this->M_Semester->tampilkanDataSemesterEnroll($nim)->result();
        foreach($data['semester'] as $a){
            $data['matkul'] = $this->M_Matakuliah->getMatkulByNim($this->session->userdata('username'), $a->id_semester)->result();
        }
        
        $data['nav'] = "Grade";
        $this->head();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view("LandingPage/Grade/V_grade", $data);
        $this->foot();
    }


    public function insert_data(){
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama_mahasiswa' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'id_jurusan' => $this->input->post('id_jurusan'),
            'email_mhs' => $this->input->post('email'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tmpt_lahir' => $this->input->post('tmpt_lahir'),
            'alamat_rumah' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'agama' => $this->input->post('agama'),
        );

        $this->M_Mahasiswa->insert_record_table('mahasiswa', $data);
        redirect('Mahasiswa');
    }

    public function edit_data($nim)
	{
		$where = array('nim'=> $nim);
		$data['mahasiswaEdit'] = $this->M_Mahasiswa->get_record_table($where, 'mahasiswa')->result();
		$data['jurusan'] = $this->M_Jurusan->show_table()->result();

		$this->load->view('V_Edit_Mahasiswa', $data);
	}
	
	public function update_data()
	{

		$data = array(
            'nama_mahasiswa' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'id_jurusan' => $this->input->post('id_jurusan'),
            'email_mhs' => $this->input->post('email'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tmpt_lahir' => $this->input->post('tmpt_lahir'),
            'alamat_rumah' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'agama' => $this->input->post('agama'),
        );

		$where=array(
			'nim'=>$this->input->post('nim'),
		);
		$this->M_Mahasiswa->update_record_table($where, $data,'mahasiswa');
		redirect('Mahasiswa');
	}
	public function delete_data($nim)
	{
		$where = array('nim'=> $nim);
		$data['mahasiswaDelete'] = $this->M_Mahasiswa->delete_record_table($where, 'mahasiswa');

		redirect('Mahasiswa');
    }
    
    public function viewNilai($matkul)
    {
        $data['nav'] = "Grade";
        $this->head();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view("LandingPage/Grade/V_grade1", $data);
        $this->foot();
    }


}










?>