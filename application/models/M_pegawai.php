<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	protected $table = "data_pegawai";

	public function __construct()
	{
		parent::__construct();

		// Load database
		$this->load->database();
	}

	// Tambah data ke DB
	public function add()
	{

		// Kumpulkan datanya
		$data = [

			"NIK" => random_string("numeric", 13),
			"Gambar" => "default.jpg",
			"Nama" => htmlentities( $this->input->post("nama") ),
			"Gender" => htmlentities( $this->input->post("seks") ),
			"Alamat" => htmlentities( $this->input->post("alamat") ),
			"Jabatan" => htmlentities( $this->input->post("jabatan") ),
			"Gaji" => htmlentities($this->input->post("gaji")),
			"Nama_pengguna" => htmlentities($this->input->post("username")),
			"Bidang" => htmlentities( $this->input->post("bidang") ),
			"Catatan" => "kosong",
			"Status" => "Aktif"
		];

		// Kirim ke database / tabel yang di tuju
		$this->db->insert($this->table, $data);

		echo "success";
	}


	// Dapatkan data dari DB
	public function get()
	{

		// Query DB
		return $this->db->get($this->table)->result_array();
	}

	public function countWorker($type)
	{
		if($type == "dokter")
		{
			$this->db->like("Jabatan", "Dokter");
			return $this->db->get($this->table)->result_array();
		}else if($type == "staff")
		{
			return $this->db->get_where($this->table, ["Jabatan" => "Staff"])->result_array();
		}else if($type == "men")
		{
			return $this->db->get_where($this->table, ["Gender" => "Laki-laki"])->result_array();
		}else if($type == "woman")
		{
			return $this->db->get_where($this->table, ["Gender" => "perempuan"])->result_array();
		}
	}

	public function getDokter()
	{

		$sql = "SELECT * FROM ".$this->table." WHERE Jabatan NOT IN ('Staff')";
		return $this->db->query($sql)->result_array();
	}

	public function seacrhName()
	{
		$query = htmlentities($this->input->get("query"));
		
		return $this->db->like("Nama", $query)->get($this->table)->result_array();
	}

	public function detailBy($from, $value)
	{
		return $this->db->get_where($this->table, [$from => $value])->result_array();
	}

	// Dapatkan dokter dokter spesialis
	public function getFilter($request)
	{
		if ($request === "Dokter spesialis") {
			return $this->db->get_where($this->table, ["Jabatan" => $request])->result_array();
		}else if($request === "Dokter umum") {
			return $this->db->get_where($this->table, ["Jabatan" => $request])->result_array();
		}else if($request === "Dokter kandungan") {
			return $this->db->get_where($this->table, ["Jabatan" => $request])->result_array();
		}
		
	}



	// Edit data
	public function edit($id)
	{
		$data = [
			"Nama" => htmlentities( $this->input->post("nama") ),
			"Gender" => htmlentities( $this->input->post("seks") ),
			"Alamat" => htmlentities( $this->input->post("alamat") ),
			"Jabatan" => htmlentities( $this->input->post("jabatan") ),
			"Gaji" => htmlentities($this->input->post("gaji")),
			"Nama_pengguna" => htmlentities($this->input->post("username")),
			"Bidang" => htmlentities( $this->input->post("bidang") )
		];

		// Kirim semua data ke table
		$this->db->update($this->table, $data, ["ID" => $id] );

		$this->session->set_flashdata("msg", "<script>swal( 'Berhasil', 'Data pegawai telah di ubah', 'success' )</script>");
		redirect('Pegawai/detail/'.$id ,'refresh');
	}

	// Update PP
	public function updatePP($id)
	{
		$gbr_lama = $this->input->post("gambar_lama");

		// Konfigurasi file
		$config["upload_path"] = realpath("upload/Profile/Officer/");
		$config["file_name"] = "PP".random_string('numeric', 5);
		$config["allowed_types"] = "jpg|jpeg|png";
		$config["max_size"] = "1000";

		// Load library upload file Codeigniter dan kirimkan konfigurasi yang tadi ^
		$this->load->library("upload", $config);

		// Cek apakah file telah berhasil di upload ke direktori?
		if ($this->upload->do_upload("foto")) {
			
			// Cek apa nama filenya default.jpg

			if ($gbr_lama == "default.jpg") {

				// Maka biarkan
			}else{

				// Tapi jika selain default.jpg maka hapus fotonya
				unlink("upload/Profile/Officer/".$gbr_lama);
			}

			// Ambil detail filenya
			$file = $this->upload->data();

			// Kompresi gambar
			$config['image_library'] = 'gd2';
			$config['source_image'] = realpath("upload/Profile/Officer/".$file['file_name'] );
			$config['quality'] = "50%";
			$config['width'] = "400";
			$config['height'] = "400";
			$config['new_image'] = realpath("upload/Profile/Officer/".$file['file_name'] );

			// Load library image resize codeigniter
			$this->load->library("image_lib", $config);
			$this->image_lib->resize();

			// Kirim nama file ke database
			$this->db->update($this->table, ["Gambar" => $file['file_name'] ], ["ID" => $id] );

			$this->session->set_flashdata("msg", "<script>swal( 'Berhasil', 'Data pegawai telah di ubah', 'success' )</script>");
			redirect('Pegawai/detail/'.$id ,'refresh');

		}else{
			echo "<h1>Something was wrong</h1>";
		}
	}



	// Hapus data dengan ID
	public function delete($id)
	{
		$gbr_lama = $this->input->post('gambar');


		if ($gbr_lama !== "default.jpg") {
			unlink("upload/Profile/Officer/".$gbr_lama);
		}

		$this->db->delete($this->table, ["ID" => $id]);

		return "berhasil";
	}


	// Banned akun
	public function setStatus($id, $stat)
	{
		$this->db->update($this->table, ["Status" => $stat], ["ID" => $id]);
		$this->session->set_flashdata('msg', "<script>swal('Berhasil', 'Berhasil $stat akun', 'warning')</script>");
		redirect('Pegawai/detail/'.$id,'refresh');
	}

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */