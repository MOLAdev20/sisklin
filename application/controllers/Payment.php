<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_obat");
		$this->load->model("M_antrian");
		$this->load->model("M_payment");

		if(!$this->session->has_userdata("permission")){
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
	}

	public function index()
	{
		$data['obat'] = $this->M_obat->getData();
		$data['pasien'] = $this->M_antrian->getPasienByStatus("Menunggu pembayaran", date('d/m/y'));
		$data['membayar'] = $this->M_antrian->getPasienByStatus("Membayar", date('d/m/y'));
		$this->load->view('admin/v_payment', $data);
	}

	public function hargaObat()
	{
		if ( $this->M_obat->getObatByName() === [] ) {
			echo json_encode("failed");
		}else{
			echo json_encode($this->M_obat->getObatByName());
		}
	}

	public function dissmiss()
	{
		$this->M_obat->modStock("min");
	}

	public function checkout()
	{
		echo json_encode($this->M_payment->saveRecord());
	}


	

}

/* End of file Payment.php */
/* Location: ./application/controllers/Admin/Payment.php */