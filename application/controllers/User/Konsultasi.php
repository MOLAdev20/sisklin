<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_Konsultasi');
		if(!$this->session->has_userdata("login_pasien"))
		{
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
	}

	public function index()
	{
		// Ambil semua dokter
		$data['dokter'] = $this->M_pegawai->getDokter();
		$this->load->view('pasien/v_chat', $data);
	}

	public function giveQuest($id_dokter)
	{
		$this->M_Konsultasi->giveQuest($id_dokter);
	}

	public function showChat()
	{
		// Ambil data chat dari dokter yg bersangkutan
		echo json_encode($this->M_Konsultasi->showChat(), true);	
	}

	public function getFilter()
	{	
		$request = $this->input->post("request");
		echo json_encode($this->M_pegawai->getFilter($request), true);
	}


	public function getDetailDoctor()
	{
		$nik = $this->input->post("nik");
		echo json_encode($this->M_pegawai->detailBy("NIK", $nik), true);
	}

}

/* End of file Konsultasi.php */
/* Location: ./application/controllers/User/Konsultasi.php */