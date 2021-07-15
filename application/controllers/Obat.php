<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_obat");

		if(!$this->session->has_userdata("permission")){
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
	}

	public function index()
	{
		if (empty($this->input->get("search"))) {
			$data['obat'] = $this->M_obat->getData();
		}else{
			$data['obat'] = $this->M_obat->getObatByName(true);
		}


		$data['pil'] = $this->M_obat->getJenis('Kapsul');
		$data['sirup'] = $this->M_obat->getJenis('Sirup');
		$data['injeksi'] = $this->M_obat->getJenis('Injeksi');
		$data['notifStok'] = $this->M_obat->notifStok();
		$this->load->view('admin/v_obat', $data);

			
	}

	public function add()
	{
		$this->M_obat->addObat();
	}

	public function delete($img = [], $id = [])
	{
		$dec = decrypt_url($id);

		if (encrypt_url($dec) == $id ) {
			$this->M_obat->delete($img, $dec);
		}else{
			$this->load->view('error');
		}
	}

	public function update($id = [])
	{
		if ($id === NULL) {
			show_404();
		}else{
			$this->M_obat->update($id);
		}
	}

}

/* End of file Obat.php */
/* Location: ./application/controllers/Admin/Obat.php */