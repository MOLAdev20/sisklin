<?php 

class Setting extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_setting");
    }

    public function index()
    {
        $this->load->view("admin/v_pengaturan");

        if(!$this->session->has_userdata("permission")){
			$this->session->set_flashdata("alert", "<script>swal('Akses ditolak', 'Anda harus login', 'warning')</script>");
			redirect("Login/index", "refresh");
		}
    }

    public function change()
    {
        if(empty($_POST)){
            $this->load->view("error_log/not_found");
        }else{
            $this->M_setting->changeNameAddress();
        }
        
    }

    public function changePict()
    {
        $this->M_setting->changePict();
    }

    public function changeRoot()
    {
        $this->M_setting->changeRoot();
    }
}