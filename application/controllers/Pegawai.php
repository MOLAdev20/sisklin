<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load model pegawai
		$this->load->model("M_pegawai");

		if(!$this->session->has_userdata("permission")){
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
	}

	public function index()
	{
		// Load tampilan
		$data["dokter"] = count($this->M_pegawai->countWorker("dokter"));
		$data["staff"] = count($this->M_pegawai->countWorker("staff"));
		$data["man"] = count($this->M_pegawai->countWorker("men"));
		$data["woman"] = count($this->M_pegawai->countWorker("woman"));
		$this->load->view("admin/v_pegawai", $data);
	}

	// Tambah pegawai
	public function add()
	{

		// Form validasi
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('bidang', 'bidang', 'required');
		$this->form_validation->set_rules('seks', 'seks', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');

		if ( $this->form_validation->run() === FALSE ) {
			echo "all_fill_required";
		}else{
			// Krim ke model M_pegawai
			$this->M_pegawai->add();
		}

		
	}

	public function get()
	{
		if(!$this->input->get("query")){
			// Dapatkan data dari model M_pegawai
			echo json_encode( $this->M_pegawai->get(), true );
		}else{
			echo json_encode( $this->M_pegawai->seacrhName(), true );
		}
	}

	public function detail($id)
	{

		// Dapatkan detail petugas

		
		$data['pegawai'] = $this->M_pegawai->detailBy("ID", $id);

		$this->load->view("admin/v_detail_pegawai", $data);
	}

	public function edit($id = [])
	{

		if (empty($id)) {
			
		}else{
			$id = decrypt_url($id);

			$this->M_pegawai->edit($id);
		}
		
	}

	public function updatePP($id = [])
	{
		// Decrypt id
		$id = decrypt_url($id);

		
		if (empty($id)) {
			show_404();
		}else{

			// Kirim semua data ke model
			$this->M_pegawai->updatePP($id);
		}
	}

	public function delete($id = [])
	{
		
		if (empty($id)) {
			$this->load->view('error_log/not_found');
		}else{
			$id = decrypt_url($id);
			echo $this->M_pegawai->delete($id);
		}
	}

	public function banned($id = [])
	{

		if (empty($id)) {
			$this->load->view('error_log/not_found');
		}else{
			$id = decrypt_url($id);
			$this->M_pegawai->setStatus($id, "Suspen");
		}
	}

	public function unbanned($id = [])
	{

		if (empty($id)) {
			$this->load->view('error_log/not_found');
		}else{
			$id = decrypt_url($id);
			$this->M_pegawai->setStatus($id, "Aktif");
		}
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Admin/Pegawai.php */