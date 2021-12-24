<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Receive extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('receive_model');
        $this->load->model("auth_model");
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }
    public function index()
    {
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        #$this->load->view('templete/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('purchasing/v_receive/tampil_receive', $data);
        $this->load->view('purchasing/v_receive/ajaxcrud_receive', $data);
        $this->load->view('templete/js');
    }

    public function datareceive()
    {
        $uri2 = $this->uri->segment(2);
        $datareceive = $this->receive_model->getdatareceive();
        $no = 1;
        foreach ($datareceive as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['receive_cd'];
            $tbody[] = $value['sup_name'];
            $tbody[] = $value['recv_dt'];
            $tbody[] = $value['no_ref'];
            $tbody[] = $value['note'];

            $aksi = '<a class="btn btn-xs btn-outline-primary" href="' . site_url('purchasing/receive/detail_receive/' . $value['receive_cd']) . '">
            <i class="fas fa-eye"></i> View</a>';

            $tbody[] = $aksi;

            $data[] = $tbody;
        }

        if ($datareceive) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function add()
    {

        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $data['detail'] = $this->receive_model->getdetailreceive()->result();
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('purchasing/v_receive/new_form', $data);

        $this->load->view('templete/js');
    }

    public function detail_receive($id)
    {
        $id = $this->uri->segment(4);
        $data = array(
            'title' => 'Detail receive',
            'detail' => $this->receive_model->getdatareceivedetail($id),
            'partdetail' => $this->receive_model->getdatapartdetail($id),

        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('purchasing/v_receive/detail_receive', $data);
        $this->load->view('templete/js');
    }

    function detail_penjualan()
    {
        $id = $this->uri->segment(3);
        $data = array(
            'title' => 'Detail Penjualan Barang',
            'active_penjualan' => 'active',
            'dt_penjualan' => $this->model_app->getDataPenjualan($id),
            'barang_jual' => $this->model_app->getBarangPenjualan($id),
        );
        $this->load->view('element/v_header', $data);
        $this->load->view('pages/v_detail_penjualan');
        $this->load->view('element/v_footer');
    }



    public function tambahreceive()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $tambahreceive = array(
            'receive_cd'        => $this->input->post('receive_cd'),
            'sup_name'        => $this->input->post('sup_name'),
            'recv_dt'        => $this->input->post('recv_dt'),
            'no_ref'        => $this->input->post('no_ref'),
            'note'        => $this->input->post('note'),
            'updt_by'        => $this->input->post('updt_by')
        );

        $data = $this->receive_model->insertreceive($tambahreceive);
        echo json_encode($data);
    }

    public function updatedetailreceive()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $objdata = array(
            'receive_cd'        => $this->input->post('receive_cd'),
            'flex'        => $this->input->post('flex'),
            'created_by'        => $this->input->post('created_by')
        );

        $id = $this->input->post('id');
        $data = $this->receive_model->updatereceivedetail($objdata, $id);
        echo json_encode($data);
    }


    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->receive_model->deletedetailreceive($id)) {
            redirect(site_url('purchasing/receive/add'));
        }
    }
}
