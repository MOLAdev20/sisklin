<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_konsultasi");

		if(!$this->session->has_userdata("login_dokter"))
		{
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
	}

	public function index()
	{
		$data['chat'] = $this->M_konsultasi->show();

		$unrepliedChat = $this->M_konsultasi->showCategory("unanswered");

		$this->session->set_userdata("new_notification", count($unrepliedChat));
		
		$this->load->view('dokter/v_chat', $data);
	}

	public function showCategory()
	{
		$request = $this->input->post("request");
		$detail = [
			$request => count($this->M_konsultasi->showCategory($request))
		];

		echo json_encode($detail, true);
	}

	public function reply($id = [])
	{
		if (empty($id)) {
			$this->load->view('error_log/not_found');
		}else{

			// Ambil room dari si pasien
			$this->M_konsultasi->reply($id);
		}
	}

	public function filter()
	{
		$request = $this->input->post("request");
		echo json_encode($this->M_konsultasi->showCategory($request), true);
	}

}

/* End of file Chat.php */
/* Location: ./application/controllers/Dokter/Chat.php */