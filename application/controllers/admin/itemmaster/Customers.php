<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
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
        $this->load->view('templete/header', $data);
        $this->load->view('templete/topbar_master', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('admin/itemmaster/v_customers/tampil_customers', $data);
        $this->load->view('admin/itemmaster/v_customers/ajaxcrud_customers', $data);
        $this->load->view('templete/js');
    }

    public function datacustomers()
    {
        $uri3 = $this->uri->segment(3);
        $datacustomers = $this->master_model->getdatacustomers();
        $no = 1;
        foreach ($datacustomers as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['customer_cd'];
            $tbody[] = $value['customer_cd2'];
            $tbody[] = $value['customer_nm'];
            $tbody[] = $value['customer_contact'];
            $tbody[] = $value['customer_address'];
            $tbody[] = $value['no_telp'];
            $tbody[] = $value['no_fax'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $aksi = "<button class='btn  btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['id_customer'] . "><i class='fas fa-edit'></i> Edit
            </button>" . ' ' . "<button class='btn btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id_customer'] . "><i class='fas fa-trash'></i> Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datacustomers) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahcustomers()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $tambahcustomer = array(
            'customer_cd'        => $this->input->post('customer_cd'),
            'customer_cd2'        => $this->input->post('customer_cd2'),
            'customer_nm'        => $this->input->post('customer_nm'),
            'customer_contact'        => $this->input->post('customer_contact'),
            'customer_contact2'        => $this->input->post('customer_contact2'),
            'customer_address'        => $this->input->post('customer_address'),
            'no_telp'        => $this->input->post('no_telp'),
            'no_fax'        => $this->input->post('no_fax'),
            'created_by'        => $this->input->post('created_by'),
            'created_dt'        => $this->input->post('created_dt')
        );

        $data = $this->master_model->insertcustomer($tambahcustomer);
        echo json_encode($data);
    }


    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $uri3 = $this->uri->segment(3);
        $data['title'] = $uri3;
        $id = $this->input->post('id');
        $data['datapercustomers'] = $this->master_model->datacustomeredit($id);
        $this->load->view('admin/itemmaster/v_customers/formeditcustomers', $data);
    }

    public function ubahcustomers()
    {
        $objdata = array(
            'customer_cd'        => $this->input->post('ecustomer_cd'),
            'customer_cd2'        => $this->input->post('ecustomer_cd2'),
            'customer_nm'        => $this->input->post('ecustomer_nm'),
            'customer_contact'        => $this->input->post('ecustomer_contact'),
            'customer_contact2'        => $this->input->post('ecustomer_contact2'),
            'customer_address'        => $this->input->post('ecustomer_address'),
            'no_telp'        => $this->input->post('eno_telp'),
            'no_fax'        => $this->input->post('eno_fax'),
            'update_by'        => $this->input->post('update_by'),
            'update_dt'        => $this->input->post('update_dt')
        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahcustomer($objdata, $id);

        echo json_encode($data);
    }

    public function hapuscustomers()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data = $this->master_model->hapusdatacustomer($id);
        echo json_encode($data);
    }
}
