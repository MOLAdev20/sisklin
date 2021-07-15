<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi extends CI_Model {

	protected $table = "kunjung_antri";

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	protected function userData()
	{
		return $this->session->userdata("id");
	}

	public function getNotification($status)
	{

		$get_user = [
			"ID_pasien" => $this->userData(),
			"Status" => $status
		];

		return $this->db->get_where($this->table, $get_user)->result_array();
	}

}

/* End of file M_notifikasi.php */
/* Location: ./application/models/M_notifikasi.php */