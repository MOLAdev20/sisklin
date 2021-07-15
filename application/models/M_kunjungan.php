<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kunjungan extends CI_Model {

	protected $table = "riwayat_kunjungan";

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	protected function userData()
	{
		return $this->session->userdata("id");
	}



	public function getData($request)
	{
		$tanggal = $this->input->get("day");
		$bulan = $this->input->get("month");
		$tahun = $this->input->get("year");

		$getTanggal = [
			"Tanggal" => $tanggal,
			"Bulan" => $bulan,
			"Tahun" => $tahun
		];
		$getTahun = [
			"Tahun" => $tahun
		];
		$getBulan = [
			"Tahun" => $tahun,
			"Bulan" => $bulan
		];


		if ($request == "daily") {

			$this->db->join("pasien", $this->table.".ID_pasien = pasien.ID_pasien");
			return $this->db->get_where($this->table, $getTanggal)->result_array();
			
		}else if($request == "monthly"){

			$this->db->join("pasien", $this->table.".ID_pasien = pasien.ID_pasien");
			return $this->db->get_where($this->table, $getBulan)->result_array();

		}else if($request == "yearly"){

			$this->db->join("pasien", $this->table.".ID_pasien = pasien.ID_pasien");
			return $this->db->get_where($this->table, $getTahun)->result_array();

		}


	}



	// Tampilkan data riwayat kunjungan untuk user/pasien
	// Berapa kali dia berkunjung
	// Tampilkan dengan bentuk percabangan agar lebih efisien tidak mengulang kode yang sama
	public function getDataById($request)
	{
		$tanggal = $this->input->get("day");
		$bulan = $this->input->get("month");
		$tahun = $this->input->get("year");

		$getTanggal = [
			"ID_pasien" => $this->userData(),
			"Tanggal" => $tanggal,
			"Bulan" => $bulan,
			"Tahun" => $tahun
		];
		$getTahun = [
			"ID_pasien" => $this->userData(),
			"Tahun" => $tahun
		];
		$getBulan = [
			"ID_pasien" => $this->userData(),
			"Tahun" => $tahun,
			"Bulan" => $bulan
		];


		


		if ($request === "yearly") {
			return $this->db->get_where($this->table, $getTahun)->result_array();		
		}else if($request === "monthly") {
			return $this->db->get_where($this->table, $getBulan )->result_array();
		}else if($request === "daily"){
			return $this->db->get_where($this->table, $getTanggal )->result_array();
		}else if($request === "" ){
			return $this->db->get_where($this->table, ["ID_pasien" => $this->userData()] )->result_array();
		}

	}	

	// Mendapatkan ID Pasien, Bulan, dan tahun

	public function getIdMonth()
	{
		$getThisBulan = [
			"ID_pasien" => $this->userData(),
			"Bulan" => date("m"),
			"Tahun" => date("Y")
		];

		return $this->db->get_where($this->table, $getThisBulan)->result_array();
	}

	// Mendapatkan data kunjungan per ID / per satuan
	public function getDataPerId($id)
	{
		return $this->db->get_where($this->table, ["ID" => $id])->result_array();
	}

}

/* End of file M_kunjungan.php */
/* Location: ./application/models/M_kunjungan.php */