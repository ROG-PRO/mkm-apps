<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('master_model');
        $this->load->model("auth_model");
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }
    public function index()
    {
        $uri3 = $this->uri->segment(3);
        $data['title'] = $uri3;
        $data['unit'] = $this->master_model->select_unit()->result();
        $data['customer'] = $this->master_model->select_customer()->result();
        $this->load->view('templete/header', $data);
        $this->load->view('templete/topbar_master', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('admin/itemmaster/v_product/tampil_product', $data);
        $this->load->view('admin/itemmaster/v_product/ajaxcrud_product', $data);
        $this->load->view('templete/js');
    }

    public function dataproduct()
    {
        $uri3 = $this->uri->segment(3);
        $dataproduct = $this->master_model->getdataproduct();
        $no = 1;
        foreach ($dataproduct as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['part_no'];
            $tbody[] = $value['part_nm'];
            $tbody[] = $value['model_no'];
            $tbody[] = $value['nm_unit'];
            $tbody[] = $value['product_price'];
            $tbody[] = $value['customer_cd'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $aksi = "<button class='btn btn-info btn-sm ubah-product' data-toggle='modal' data-id=" . $value['id_product'] . "><i class='fas fa-edit'></i>
            </button>" . ' ' . "<button class='btn btn-danger btn-sm hapus-product' id='id' data-toggle='modal' data-id=" . $value['id_product'] . "><i class='fas fa-trash'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($dataproduct) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahproduct()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}


        $tambahproduct = array(
            'part_no' => $this->input->post('part_no'),
            'part_nm'        => $this->input->post('part_nm'),
            'model_no'        => $this->input->post('model_no'),
            'id_unit'        => $this->input->post('id_unit'),
            'id_customer'        => $this->input->post('id_customer'),
            'created_by'        => $this->input->post('created_by'),
            'product_price'        => $this->input->post('product_price')


        );

        $data = $this->master_model->insertproduct($tambahproduct);

        echo json_encode($data);
    }


    public function hapusproduct()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->master_model->hapusdataproduct($id);
        echo json_encode($data);
    }

    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $data['unit'] = $this->master_model->select_unit()->result();
        $data['customer'] = $this->master_model->select_customer()->result();
        $uri3 = $this->uri->segment(3);
        $data['title'] = $uri3;
        $id = $this->input->post('id');
        $data['dataperproduct'] = $this->master_model->dataproductedit($id);
        $this->load->view('admin/itemmaster/v_product/formeditproduct', $data);
    }

    public function ubahproduct()
    {
        $objdata = array(
            //'nama_mahasiswa'=>$this->input->post('editnama'),
            //'alamat'=>$this->input->post('editalamat'),
            'part_no' => $this->input->post('e_part_no'),
            'part_nm'        => $this->input->post('e_part_nm'),
            'model_no'        => $this->input->post('e_model_no'),
            'id_unit'        => $this->input->post('e_id_unit'),
            'id_customer'        => $this->input->post('e_id_customer'),
            'update_by'        => $this->input->post('update_by'),
            'update_dt'        => $this->input->post('update_dt'),
            'product_price'        => $this->input->post('e_product_price')

        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahproduct($objdata, $id);

        echo json_encode($objdata, $id);
    }
}
