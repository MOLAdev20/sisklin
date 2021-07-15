<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->has_userdata("login_dokter"))
		{
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}

		$this->load->model("M_pegawai");
		$this->load->model("M_konsultasi");
	}

	public function index()
	{

		// ambil data detail dari pegawai dari model
		$data['pegawai'] = $this->M_pegawai->detailBy("NIK", $this->session->userdata("nik") );
		$unrepliedChat = $this->M_konsultasi->showCategory("unanswered");

		$this->session->set_userdata("new_notification", count($unrepliedChat));
		$this->load->view('dokter/v_index', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Dokter/Home.php */