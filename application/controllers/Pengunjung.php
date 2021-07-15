<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Excel library

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengunjung extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_kunjungan");

		if(!$this->session->has_userdata("permission")){
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
	}

	public function index()
	{
		$this->load->view("admin/v_kunjungan_pasien");
	}

	public function getData()
	{
		if (empty($_GET)) {
			redirect('Pengunjung/index','refresh');
		}
		$request = $this->input->get("req");
		echo json_encode($this->M_kunjungan->getData($request), true);

	}

	public function report($requestFile)
	{

		if ($requestFile != "pdf" && $requestFile != "excel") {
			$this->load->view("error_log/not_found");
		}else{
			$request = $this->input->get("req");
			$data["kunjungan"] = $this->M_kunjungan->getData($request);

			if(!empty($data['kunjungan'])){
				if ($requestFile == "pdf") {
					$this->load->view("admin/report/laporan_kunjungan_pdf", $data);
				}else if($requestFile == "excel") {
	
					// Set header
					header("Content-Type: application/vnd.ms-excel");
					header("Content-Disposition: attachment;filename=Data_kunjungan_pasien.xlsx");
					header("Cache-Control: max-age=0");
					

					$spreadsheet = new Spreadsheet();
					$sheet = $spreadsheet->getActiveSheet();

					$sheet->setCellValue("A1", "DATA BERKUNJUNG PASIEN");
					$sheet->setCellValue("A2", $this->session->userdata("rs"));

					
					$sheet->setCellValue("A4", "NO");
					$sheet->setCellValue("B4", "NAMA");
					$sheet->setCellValue("C4", "GENDER");
					$sheet->setCellValue("D4", "WAKTU");
					$sheet->setCellValue("E4", "TAGIHAN");
					$sheet->setCellValue("F4", "TOTAL");
	
					$x = 5;
					$cell = 1; foreach ($data['kunjungan'] as $key) {
						$sheet->setCellValue("A".$x, $cell++);
						$sheet->setCellValue("B".$x, $key['Nama']);
						$sheet->setCellValue("C".$x, $key['Gender']);
						$sheet->setCellValue("D".$x, $key['Hari']);
						$sheet->setCellValue("E".$x, $key['Tagihan']);
						$sheet->setCellValue("F".$x, $key['Total']);
						$x++;
					}
					$sheet->getStyle("A4:".$sheet->getHighestColumn().$sheet->getHighestRow())->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	
					$writer = new Xlsx($spreadsheet);
	
					$writer->save("php://output");
					
	
				}
			}else{
				$this->load->view("error_log/not_found");
			}

			
		}
		

		
	}

}

/* End of file Pengunjung.php */
/* Location: ./application/controllers/Pengunjung.php */