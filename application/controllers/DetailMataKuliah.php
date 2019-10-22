<?php 
class DetailMataKuliah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

    }

    private function head(){
        $this->load->view('Template/html-open');
        $this->load->view('Template/head-open');
        $data['title'] = "Course Detail";
        $this->load->view('Template/template-header', $data);
        $this->load->view('Template/course-detail-css');
        $this->load->view('Template/head-close');
        $this->load->view('Template/body-open');
        
    }

    private function foot(){
        $this->load->view('Template/preloader');
        $this->load->view('Template/footer');
        $this->load->view('Template/template-footer');
        $this->load->view('Template/course-detail-js');
        $this->load->view('Template/body-close');
        $this->load->view('Template/html-close');
        
    }

    public function index()
    {
        $data['nav'] = "Course Detail";
        $this->head();
        $this->load->view('Template/nav', $data);
        $this->load->view('Course/V_detail_course');
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


}










?>