<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getData()
	{
		return $this->db->get("tbl_obat")->result_array();
	}

	public function notifStok()
	{
		return $this->db->get_where("tbl_obat", "Stok < 60")->result_array();
	}

	public function getJenis($jenis)
	{
		return $this->db->get_where("tbl_obat", ["Jenis" => $jenis])->result_array();
	}

	public function getObatByName($like = false)
	{
		if ($like) {
			$this->db->like(["Nama_obat" => $this->input->get('search')]);
			return $this->db->get('tbl_obat')->result_array();

			echo $this->input->get("search");
		}else{
			return $this->db->get_where('tbl_obat', ["Nama_obat" => $this->input->post('obat')])->result_array();
		}
	}

	public function modStock($type)
	{
		$obat = $this->input->post("obat");

		if ($type === "plus") {
			$sql = " UPDATE tbl_obat SET Stok = Stok+1 WHERE Nama_obat = '$obat' ";
		}elseif ($type === "min") {
			$sql = " UPDATE tbl_obat SET Stok = Stok-1 WHERE Nama_obat = '$obat' ";
		}
		
		$this->db->query($sql);
	}

	protected function addToTabel($gambar)
	{
		// Kumpulkan data data dari inputan
		$data = [
			"Nama_obat" => $this->input->post('obat'),
			"Gambar" => $gambar,
			"Jenis" => $this->input->post("jenis"),
			"Harga" => $this->input->post("harga"),
			"Stok" => $this->input->post("stok"),
			"Penyimpanan" => $this->input->post("penyimpanan"),
			"Keterangan" => $this->input->post("keterangan"),
		];

		// Masukan semua data ke database
		$this->db->insert("tbl_obat", $data);
	}

	public function addObat()
	{
		if ($this->input->post("cek") === "none") {
			
			$this->addToTabel("default.jpg");

			$this->session->set_flashdata("msg", "<script>swal('Berhasil', 'Data obat di tambahkan', 'success')</script>");
			redirect('Obat/index','refresh');

		}else{

			
			$config["upload_path"] = realpath('upload/gbr_obat/');
			$config["file_name"] = "OBT".random_string("numeric", 8);
			$config["allowed_types"] = "jpg|png|jpeg";
			$config["max_size"] = "2000";

			// Load library upload data dan kirimkan semua data konfigurasi tadi
			$this->load->library("upload", $config);

			// Cek apakah upload data sudah melakukan fungsinya
			if ($this->upload->do_upload("gambar")) {

				// Jika iya, maka lakukan hal ini
				// Buat variable yang menyimpan dat data nama obat
				$obat = $this->upload->data();

				$this->addToTabel($obat['file_name']);

				$this->session->set_flashdata("msg", "<script>swal('Berhasil', 'Data obat di tambahkan', 'success')</script>");
				redirect('Obat/index','refresh');
			}else{
				echo "<h1>Kesalahan dalam mengunggah gambar</h1>";


			}

		}
		
	}

	public function delete($img, $id)
	{
		if ($img != "default.jpg") {
			unlink(realpath("upload/gbr_obat/".$img));
		}
		
		$this->db->delete("tbl_obat", ["ID" => $id]);
		$this->session->set_flashdata("msg", "<script>swal('Data di hapus', '', 'success')</script>");
		redirect('Obat/index','refresh');
	}

	public function update($id)
	{
		$data = [
			"Nama_obat" => $this->input->post("obat"),
			"Jenis" => $this->input->post("jenis"),
			"Harga" => $this->input->post("harga"),
			"Stok" => $this->input->post("stok"),
			"Penyimpanan" => $this->input->post("penyimpanan"),
			"Keterangan" => $this->input->post("keterangan")
		];

		$this->db->update("tbl_obat", $data, ["ID" => $id] );
		$this->session->set_flashdata("msg", "<script>swal('Data berhasil di edit', '', 'success')</script>");
		redirect('Obat/index','refresh');

	}

}

/* End of file M_obat.php */
/* Location: ./application/models/M_obat.php */