<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Socustomer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('pocustomer_model');
        $this->load->model('SoCustomer_Model');
        $this->load->model('config_model');
        $this->load->model("auth_model");
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $data['customer'] = $this->pocustomer_model->select_customer()->result();
        $data['dataso'] = $this->SoCustomer_Model->getall();
        //$data['newno'] = $this->newno();
        $this->load->view('templete/header', $data);
        //$this->load->view('templete2/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_socustomer/tampil_socustomer');
        $this->load->view('templete/js');
    }

    /*
        Function newno() untuk mengambil nomor transaksi berikutnya dari table config
    */
    public function newno()
    {
        $no = $this->config_model->getconfig('so_no');
        $newno = $no->cfg_value;
        return $newno;
    }

    public function proses()
    {
        // metho post dibuat dalam 1 variabel
        $post = $this->input->post();

        //generate nomor SO berdasarkan data yg di input
        $sono = "SO-" . $post['soProcess'] . "-" . $post['soProduction'] . "-" . $post['soCustomer'] . "-" . $this->newno() . "-" . date('m') . "-" . date('d', strtotime($post['soDelivery'])) . "-" . date('m', strtotime($post['soDelivery'])) . "-" . date('y', strtotime($post['soDelivery']));

        //membuat array data untuk insert ke table socustomer
        $data = [
            "so_no" => $sono,
            "so_date" => $post['soDate'],
            "so_customerid" => $post['soCustomer'],
            "so_pono" => $post['soPono'],
            "so_project" => $post['soProject'],
            "so_deliverydate" => $post['soDelivery'],
            "so_proses" => $post['soProcess'],
            "so_jenis" => $post['soProduction'],
            "so_approved" => "0",
            "so_createdby" => $this->session->userdata('user_logged')->username,
            "so_created" => date('Y-m-d H:i:s')
        ];

        //insert data ke table socustomer
        $this->SoCustomer_Model->insertso($data);

        //update nomor transaksi, nomor sebelumnya +1
        $no = $this->newno();
        //fungsi pembuat 3 digit
        $newcode = sprintf("%03s", $no + 1);
        //data yang akan diupdate di table config
        $cfg = [
            "cfg_value" => $newcode
        ];
        //proses update new no
        $this->config_model->updateconfig($cfg, "so_no");

        // processing data part SO 
        //tangkap semua inputan
        $itemcd = $post['item_cd'];
        $itemnm = $post['item_nm'];
        $model = $post['model_no'];
        $qty = $post['qty'];
        $unit = $post['unit'];
        $note = $post['note'];

        //membuat array untuk insert batch
        $datapart = array();
        foreach ($itemcd as $key => $itmcd) {
            $datapart[] = array(
                "sod_sono" => $sono,
                "sod_itemcode" => $itmcd,
                "sod_itemname" => $itemnm[$key],
                "sod_model" => $model[$key],
                "sod_qty" => $qty[$key],
                "sod_unit" => $unit[$key],
                "sod_remark" => $note[$key],
                "sod_createdby" => $this->session->userdata('user_logged')->username,
                "sod_created" => date('Y-m-d H:i:s')
            );
        }
        //proses insert batch
        $this->SoCustomer_Model->insertdetail($datapart);
        redirect('marketing/socustomer');
    }
}
