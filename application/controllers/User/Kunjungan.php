<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// excel engine
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kunjungan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->has_userdata("login_pasien"))
		{
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}

		// Load model
		$this->load->model("M_kunjungan");
	}

	public function index()
	{
		$data['totalKunjungan'] = $this->M_kunjungan->getDataById("");
		$data['totalBulanIni'] = $this->M_kunjungan->getIdMonth();
		$this->load->view("pasien/v_history", $data);
	}

	public function getData($accessKey = [])
	{
		$request = $this->input->get("req");
		
		if ($accessKey === "cVyT101") {
			echo json_encode($this->M_kunjungan->getDataById($request), true);
		}else{
			$this->load->view("error_log/not_found");
		}
		
	}

	public function report($accessKey = [])
	{
		$request = $this->input->get("request");
		$fileType = $this->input->get("file");
		if ($accessKey === "aXBi908") {

			$data = $this->M_kunjungan->getDataById($request);

			if ($fileType == "xls") {

				// set header
				header("Content-Type: application/vnd.ms-excel");
				header("Content-Disposition: attachment; filename=Data_kunjungan_pasien.xlsx");

				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();

				$sheet->setCellValue("A1", "DATA BERKUNJUNG PASIEN");
				$sheet->setCellValue("A2", $this->session->userdata("rs"));

				$sheet->setCellValue("A4", "NO");
				$sheet->setCellValue("B4", "HARI");
				$sheet->setCellValue("C4", "TANGGAL");
				$sheet->setCellValue("D4", "BULAN");
				$sheet->setCellValue("E4", "TAHUN");
				$sheet->setCellValue("F4", "TAGIHAN");
				$sheet->setCellValue("G4", "TOTAL");


				$x = 5;
				$no = 1;
				foreach($data as $key){
					$sheet->setCellValue("A".$x, $no++);
					$sheet->setCellValue("B".$x, $key['Hari']);
					$sheet->setCellValue("C".$x, $key['Tanggal']);
					$sheet->setCellValue("D".$x, $key['Bulan']);
					$sheet->setCellValue("E".$x, $key['Tahun']);
					$sheet->setCellValue("F".$x, $key['Tagihan']);
					$sheet->setCellValue("G".$x, $key['Total']);
					$x++;
				}
				$sheet->getStyle("A1:".$sheet->getHighestColumn().$sheet->getHighestRow())->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
				$writer = new Xlsx($spreadsheet);
				$writer->save("php://output");

				
			}else if($fileType == "pdf"){
				$this->load->view("pasien/report/report_kunjungan_pdf", ["pdf" => $data]);
			}

			


		}else{
			$this->load->view("error_log/not_found");
		}
	}

	public function reportSatuan($id)
	{
		if (empty($id)) {
			$this->load->view("error_log/not_found");
		}else{
			$data = $this->M_kunjungan->getDataPerId($id);
			$this->load->view("pasien/report/report_kunjungan_pdf", ["pdf" => $data]);
		}
	}

	

}

/* End of file History.php */
/* Location: ./application/controllers/User/History.php */