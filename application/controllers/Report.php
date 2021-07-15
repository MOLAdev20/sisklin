<?php 


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if(!$this->session->has_userdata("permission")){
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
    }

    public function index()
    {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=cobaExcel.xlsx");
        // header("Cache-Control: max-age=0");
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("A1", "Hello world");

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");

    }
}