<?php
class User extends CI_Controller
{


    public function __construct()
    {
        /*call CodeIgniter's default Constructor*/
        parent::__construct();

        /*load database libray manually*/
        $this->load->database();

        /*load Model*/
        $this->load->model('user_model');
        $this->load->model("auth_model");
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }


    public function index()
    {
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $data['user'] = $this->user_model->tampil_user()->result();
        //$data = $this->session->userdata('user_logged');

        $this->load->view('templete/header', $data);
        $this->load->view('templete/topbar_master', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('admin/v_user', $data);
        $this->load->view('templete/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->user_model->delete($id)) {
            redirect(site_url('admin/user'));
        }
    }
}
