<?php 
class Course extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Course');

    }

    private function head(){
        $this->load->view('Template/html-open');
        $this->load->view('Template/head-open');
        $data['title'] = "Courses";
        $this->load->view('Template/template-header', $data);
        $this->load->view('Template/course-css');
        $this->load->view('Template/head-close');
        $this->load->view('Template/body-open');
        
    }

    private function foot(){
        $this->load->view('Template/preloader');
        $this->load->view('Template/footer');
        $this->load->view('Template/template-footer');
        $this->load->view('Template/course-js');
        $this->load->view('Template/body-close');
        $this->load->view('Template/html-close');
        
    }

    public function index()
    {
        $data['nav'] = "Course";
        $data['matkul'] = $this->M_Course->get_matkul(1, 2019, "ganjil")->result();
        foreach ($data['matkul'] as $a) {
            $data['detail_matkul'] = $this->M_Course->get_jadwal_matkul($a->id_mata_kuliah)->result();
        }
        
        $this->head();
        $this->load->view('Template/nav', $data );
        $this->load->view('Course/V_course', $data);
        $this->foot();

        
    }

    function getHari($hari){
        switch ($hari) {
            case 1:
                echo "Monday";
                break;
            
            case 2:
                echo "Tuesday";
                break;

            case 3:
                echo "Wednesday";
                break;

            case 4:
                echo "Thursday";
                break;

            case 5:
                echo "Friday";
                break;

            case 6:
                echo "Saturday";
                break;

            case 7:
                echo "Sunday";
                break;

            default:
                return null;
                break;
        }
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