<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_login");
	}

	public function index()
	{
		

		$masuk = $this->input->post("masuk");

		if ( isset($masuk) ) {
			$this->form_validation->set_rules("username", "username", "required");
			$this->form_validation->set_rules("password", "password", "required");

			// Cek validasi form
			if ( $this->form_validation->run() === FALSE ) {
			 	echo "form_error";
			 }else{
			 	echo $this->M_login->loginProcess();
			 }
			 
		}else{
			$this->load->view("Login");
		}

	}

	public function logOut()
	{
		$this->session->sess_destroy();
		redirect('Login/index','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */