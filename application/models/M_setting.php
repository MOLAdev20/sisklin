<?php 

class M_setting extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    

    public function changeNameAddress()
    {
        $new_name = $this->input->post("rs_name");
        $new_addr = $this->input->post("address");
        
        $this->db->update("pengaturan", ["config_vall" => $new_name], ["config" => "rs_name"]);
        $this->db->update("pengaturan", ["config_vall" => $new_addr], ["config" => "rs_addr"]);
        
        redirect(base_url('Login/logout'), "refresh");

    }

    public function changePict()
    {

        unlink(realpath("assets/images/logo-inverse.png"));
        
        $config['upload_path'] = realpath("assets/images");
        $config['file_name'] = "logo-inverse";
        $config['allowed_types'] = "png";
        $config['max_size'] = "2000";

        $this->load->library("upload", $config);

        if($this->upload->do_upload("rs_logo")){

            $new_logo = $this->upload->data();

            $this->db->update("pengaturan", ["config_vall" => $new_logo['file_name']], ["config" => "rs_logo"]);
            redirect(base_url("Login/logout"), "refresh");
        }else{
            $this->load->view("error_log/not_found");
        }
    }

    public function changeRoot()
    {
        $new_user = $this->input->post("new_user");
        $new_pass = $this->input->post("new_pass");
        $confirm_pass = $this->input->post("confirm_pass");

        if($new_pass === $confirm_pass) {
            $this->db->update("pengaturan", ["config_vall" => $new_user], ["config" => "admin_u"]);
            $this->db->update("pengaturan", ["config_vall" => $new_pass], ["config" => "admin_p"]);
            $this->session->set_flashdata("msg", "<script>swal('Berhasil', 'Username dan password dirubah', 'success')</script>");
            redirect(base_url("Setting/index"), "refresh");
        }else{
            $this->session->set_flashdata("msg", "<script>swal('Gagal', 'Password tidak cocok', 'error')</script>");
            redirect(base_url("Setting/index"), "refresh");
        }

        

    }
}