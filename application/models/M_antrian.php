<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_antrian extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getData()
	{
		$query = "SELECT * FROM kunjung_antri INNER JOIN pasien ON pasien.ID_pasien = kunjung_antri.ID_pasien AND kunjung_antri.Waktu LIKE '".date('d/m/y')."%' "." AND kunjung_antri.Status = 'Menunggu'";
		echo json_encode($this->db->query($query)->result_array(), true);
	}

	public function add()
	{
		// Cek apa nama yang di kirimkan terdaftar di pasien
		$pasien = $this->input->post("pasien");
		$chek = $this->db->get_where("pasien", ['Nama' => $pasien]);

		if ($chek->num_rows($chek) != NULL) {
			// Hitung jumlah data di database antrian
			$waktu = date("d")."/".date("m")."/".date("y");
			$jumlah = $this->db->query("SELECT * FROM kunjung_antri WHERE Waktu LIKE '".$waktu."%'");
			$jumlah = $jumlah->num_rows($jumlah);

			// Proses masuk ke database kunjung_antri
			$id = $this->db->get_where("pasien", ["Nama" => $pasien])->result_array();
			var_dump($id);
			$data = [
				"ID_pasien" => $id[0]['ID_pasien'],
				"Antrian" => $jumlah + 1,
				"Keluhan" => $this->input->post("keluhan"),
				"Waktu" => date("d/m/y H:i"),
				"Status" => "Menunggu"
			];

			$this->db->insert("kunjung_antri", $data);

		}else{
			echo "failed";
		}

		
	}

	public function getPasienByTime($time)
	{
		$sql = "SELECT * FROM kunjung_antri WHERE Waktu LIKE '%".$time."%' ";
		return  $this->db->query($sql)->result_array();
	}

	public function getPasienByStatus($status, $waktu = null)
	{
		$sql = "SELECT * FROM kunjung_antri INNER JOIN pasien ON kunjung_antri.ID_pasien = pasien.ID_pasien AND Status LIKE '".$status."' AND Waktu LIKE '%".$waktu."%' ";
		return $this->db->query($sql)->result_array();
	}

	public function panggil($urutan)
	{
		if($this->db->get_where("kunjung_antri", ["Antrian" => $urutan])->num_rows() == NULL){
			echo "Data tidak tersedia";
		}else{
			$this->db->update("kunjung_antri", ["Status" => "Menunggu Pembayaran"], ["Antrian" => $urutan]);
			echo "success";
		}
	}

}

/* End of file M_antrian.php */
/* Location: ./application/models/M_antrian.php */