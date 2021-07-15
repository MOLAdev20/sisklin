<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_pasien");
		$this->load->model("M_antrian");
		$this->load->library("form_validation");

		if(!$this->session->has_userdata("permission")){
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
	}

	public function index()
	{
		// Ambil data pasien untuk keperluan cek apa pasien tersebut telah registrasi
		$data['pasien'] = $this->M_pasien->getData();

		

		$this->load->view("admin/dashboard", $data);	
	}

	public function getAntrian()
	{
		$data['antrian'] = $this->M_antrian->getData();
	}

	public function getKeterangan()
	{
		echo json_encode([
			'hariIni' => $this->M_antrian->getPasienByTime(date('d/m/y')),
			'dalamAntrian' => $this->M_antrian->getPasienByStatus("Menunggu"),
			'bulanIni' => $this->M_antrian->getPasienByTime(date('m'))
		], true);
	}

	public function add()
	{

		$this->form_validation->set_rules("nama", "nama", "required");
		$this->form_validation->set_rules("usia", "usia", "required");
		$this->form_validation->set_rules("alamat", "alamat", "required");

		if ($this->form_validation->run() === TRUE) {
			$this->M_pasien->add();
		}else{
			echo "failed";
		}
	}

	public function register()
	{
		$this->M_pasien->check_data();
	}

	public function antrian()
	{
		$this->M_antrian->add();
	}

	public function panggil()
	{
		$urutan = $this->input->post('antrian');

		if ($urutan == NULL) {
			echo "Error";
		}else{
			$this->M_antrian->panggil($urutan);
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Admin/Home.php */