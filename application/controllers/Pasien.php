<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_pasien");

		if(!$this->session->has_userdata("permission")){
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
	}

	public function index()
	{
		$data['pasien'] = $this->M_pasien->getData();
		$this->load->view("admin/v_daftar_pasien", $data);
	}

	public function tambah()
	{
		$this->M_pasien->add();
	}

	public function edit()
	{
		$this->M_pasien->edit();
	}

	public function delete($id)
	{
		$id = decrypt_url($id);
		$this->M_pasien->delete($id);
	}

	public function getPasien()
	{
		echo json_encode($this->M_pasien->check_data(), true);
	}

}

/* End of file Pasien.php */
/* Location: ./application/controllers/Admin/Pasien.php */