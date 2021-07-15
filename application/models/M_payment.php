<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_payment extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	protected function hari()
	{
		$day = date("D");
		switch ($day) {
			case 'sun' :
				return "Minggu";
				break;
			case 'Mon' :
				return "Senin";
				break;
			case 'Tue':
				return "Selasa";
				break;
			case 'Wed':
				return "Rabu";
				break;
			case 'Thu':
				return "Kamis";
				break;
			case 'Fri':
				return "Jum'at";
				break;
			case 'Sat' :
				return "Sabtu";
				break;
			default:
				return "Tidak ada hari";
				break;
		}
	}

	// Proses pengiriman data ke database
	public function saveRecord()
	{
		$as = $this->db->get_where("pasien", ['Nama' => $this->input->post('nama')])->result_array();
		
		$data = [
			"ID_pasien" => $as[0]['ID_pasien'],
			"Tagihan" => $this->input->post('tagihan'),
			"Hari" => $this->hari(),
			"Tanggal" => date("d"),
			"Bulan" => date("m"),
			"Tahun" => date("Y"),
			"Total" => $this->input->post('totalBiaya')
		];

		// Kirim semua data ke database riwayat kunjungan
		$this->db->insert('riwayat_kunjungan', $data);
		// Ubah data di database antian
		$this->db->update('kunjung_antri', ['Status' => "Membayar"], ['ID_pasien' => $as[0]['ID_pasien']] );
	}


	


	

}

/* End of file M_payment.php */
/* Location: ./application/models/M_payment.php */