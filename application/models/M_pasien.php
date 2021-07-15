<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function add() 
	{
		$data = [
			"ID_pasien" => random_string("numeric", 8),
			"Nama" => $this->input->post("nama"),
			"Gender" => $this->input->post("seks"),
			"Usia" => $this->input->post("usia"),
			"No_telpon" => $this->input->post("telepon"),
			"Alamat" => $this->input->post("alamat")
		];

		$this->db->insert("pasien", $data);
		echo json_encode("success", true);
	}

	public function getData()
	{
		return $this->db->get("pasien")->result_array();
	}

	public function check_data()
	{
		$nama = $this->input->post('nama');
		$nama = htmlspecialchars($nama);

		$query = $this->db->query("SELECT * FROM pasien WHERE Nama LIKE '%".$nama."%' ");

		if ( $query->num_rows($query) != NULL ) {
			return $query->result_array();
		}else{
			echo "false";
		}
	}

	public function delete($id)
	{
		$this->db->delete("pasien", ['ID_pasien' => $id] );
		$this->session->set_flashdata("msg", "<script>swal('Berhasil', 'Data pasien telah di hapus', 'success')</script>");
		redirect('Pasien/index','refresh');
		
	}

	public function edit()
	{
		$id = $this->input->post("id");
		$data = [
			"Nama" => $this->input->post("nama"),
			"Gender" => $this->input->post("seks"),
			"Usia" => $this->input->post("usia"),
			"No_telpon" => $this->input->post("telepon"),
			"Alamat" => $this->input->post("alamat")
		];

		$this->db->update("pasien", $data, ['ID_pasien' => $id]);

		echo json_encode("success");
	}

}

/* End of file M_pasien.php */
/* Location: ./application/models/M_pasien.php */