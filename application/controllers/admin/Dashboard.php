<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        /*call CodeIgniter's default Constructor*/
        parent::__construct();

        /*load database libray manually*/
        $this->load->database();

        /*load Model*/
        //$this->load->model('m_barang');
        $this->load->library('session');
        $this->load->model("auth_model");
        // $this->load->model("auth_model_new");
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        //$data['barang'] = $this->m_barang->tampil_barang()->result();
        $data['title'] = "Dashboard";
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('admin/v_dashboard', $data);
        $this->load->view('templete/footer');
        $this->load->view('templete/js');
    }


    //CREATE
    /*function create()
    {
        $package = $this->input->post('package', TRUE);
        $product = $this->input->post('product', TRUE);
        $this->package_model->create_package($package, $product);
        redirect('package');
    }*/



    public function savedata()
    {
        /*load registration view form*/
        $this->load->view('v_unit');

        /*Check submit button */
        if ($this->input->post('save')) {
            $data['nm_unit'] = $this->input->post('nm_unit');
            $data['created_by'] = $this->input->post('created_by');
            #$data['email'] = $this->input->post('email');
            $user = $this->m_barang->saverecords($data);
            if ($user > 0) {
                echo "Records Saved Successfully";
            } else {
                echo "Insert error !";
            }
        }
    }
}
