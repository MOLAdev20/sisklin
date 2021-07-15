<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konsultasi extends CI_Model {

	protected $table = "data_konsultasi";

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function show()
	{
		
		$kode_dokter = $this->session->userdata("nik");
		$sql = "SELECT * FROM pasien JOIN $this->table 
				ON pasien.ID_pasien = ".$this->table.".Pasien 
				WHERE ".$this->table.".Dokter = $kode_dokter AND ".$this->table.".Pengirim = 'Pasien' ";

		return $this->db->query($sql)->result_array();
		
	}

	// Menampilkan detail dari jumlah chat dokter pada bulan ini
	public function showCategory($type)
	{
		$kode_dokter = $this->session->userdata("nik");
		$default_query = "
		SELECT * FROM pasien JOIN $this->table 
		ON pasien.ID_pasien = ".$this->table.".Pasien 
		WHERE ".$this->table.".Dokter = $kode_dokter AND ".$this->table.".Pengirim = 'Pasien' ";

		// Ada 3 tingkatan tipe detail
		// showAll untuk melihat semua data
		// answered untuk melihat data pesan yang telah di jawab
		// unanswered untuk melihat data pesan yang belum di jawab
		// DAN
		if ($type === "showAll") {
			
			$result = $this->db->query($default_query)->result_array();

			return $result;
		}else if($type === "answered") {

			$sql = $default_query." AND Balasan NOT IN ('unreplied') ";
			$result = $this->db->query($sql);
			
			return $result->result_array();
		}else if($type === "unanswered") {

			$sql = $default_query." AND Balasan = 'unreplied' ";
			$result = $this->db->query($sql)->result_array();
			
			return $result;
		}
	}

	public function showChat()
	{
		$kode_dokter = $this->input->post("kode_dokter");
		$pasien = $this->session->userdata('id');
		return $this->db->get_where($this->table, ['Pasien' => $pasien , 'Dokter' => $kode_dokter])->result_array();
	}

	public function giveQuest($kode_dokter)
	{
		$kode_pasien = $this->session->userdata("id");

		$data = [
			"Pasien" => $kode_pasien,
			"Dokter" => $kode_dokter,
			"Tanggal" => date("d/m/y"),
			"Pengirim" => "Pasien",
			"Isi" => $this->input->post('text'),
			"Balasan" => "unreplied"
		];

		// Kirim semua data tsb ke db
		$this->db->insert($this->table, $data);

		echo "terkirim";
	}

	// Bagian untuk membalas keluhan dari pasien
	public function reply($ID_pasien)
	{
		$reply = $this->input->post("reply_text");

		$this->db->update($this->table, ["Balasan" => $reply], ["ID" => $ID_pasien] );

		echo "terbalas";

	}

}

/* End of file M_konsultasi.php */
/* Location: ./application/models/M_konsultasi.php */