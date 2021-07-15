<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	protected $dokter = "data_pegawai";
	protected $pasien = "pasien";
	protected $admin = "admin";

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function loginAdmin(){

		$username = $this->db->get_where("pengaturan", ["config" => "admin_u"])->result_array();
		$passowrd = $this->db->get_where("pengaturan", ["config" => "admin_p"])->result_array();
		


			$user = htmlentities($this->input->post("username"));
			$pass = htmlentities($this->input->post("password"));

		if ($user == $username[0]['config_vall'] && $pass == $passowrd[0]['config_vall']) {
			$session = [
				"permission" => true,
				"user" => $user
			];

			$this->session->set_userdata($session);
			echo "masuk_admin";
		}else{
			$this->loginDokter();
		}
	}

	public function loginDokter()
	{
		$where = [
			"NIK" => htmlentities($this->input->post("password")),
			"Nama_pengguna" => htmlentities($this->input->post("username")),
			"Status" => "Aktif",
		];

		$this->db->like("Jabatan", "Dokter");
		$dokter_cek = $this->db->get_where($this->dokter, $where);

		if ( $dokter_cek->num_rows($dokter_cek) === 1 ) {

			// Jika benar maka buat session untuk dokter
			$session = [
				"login_dokter" => TRUE,
				"nik" => $this->input->post("password"),
				"nama" => htmlentities($this->input->post("username"))
			];
			$this->session->set_userdata($session);
			echo "masuk_dokter";

		}else{

			$this->loginPasien();
			
		}
	}

	public function loginPasien()
	{
		// Jika gagal maka coba cek di tabel pasien
		$where = [
			"nama" => htmlentities($this->input->post("username")),
			"ID_pasien" => htmlentities($this->input->post("password"))
		];

		$pasien_cek = $this->db->get_where($this->pasien, $where);

		if ( $pasien_cek->num_rows($pasien_cek) === 1 ) {

				// Jika benar/ada datanya, maka buat session untuk pasien
			$session = [
				"login_pasien" => TRUE,
				"nama" => $this->input->post("username"),
				"id" => $this->input->post("password")
			];

			$this->session->set_userdata($session);

			echo "masuk_pasien";

		}else{

				// Jika gagal, berarti dia bukan admin, dokter maupun pasien yang login
			echo "gagal";
		}
	}



	public function loginProcess()
	{
		$this->loginAdmin();
		$this->active_session();
	}

	// Mengaktifkan seluruh session pengaturan
	// Nama rumah sakit, alamat rumah sakit, nama admin dan lain lain
	public function active_session()
	{
		$nama_rs = $this->db->get_where("pengaturan", ["config" => "rs_name"])->result_array();
		$alamat_rs = $this->db->get_where("pengaturan", ["config" => "rs_addr"])->result_array();
		$logo_rs = $this->db->get_where("pengaturan", ["config" => "rs_logo"])->result_array();

		$this->session->set_userdata([
			"rs" => $nama_rs[0]['config_vall'],
			"address" => $alamat_rs[0]['config_vall'],
			"logo" => $logo_rs[0]['config_vall'],
		]);
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */