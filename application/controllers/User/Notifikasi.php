<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_notifikasi");

		if(!$this->session->has_userdata("login_pasien"))
		{
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
	}

	

	public function index()
	{
		$data['user_notif'] = $this->M_notifikasi->getNotification("Membayar");
		$this->load->view("pasien/v_message", $data);

		
	}

}

/* End of file Notifikasi.php */
/* Location: ./application/controllers/User/Notifikasi.php */