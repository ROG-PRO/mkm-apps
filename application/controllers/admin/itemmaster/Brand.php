<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model('master_model');
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }
    public function index()
    {
        $uri3 = $this->uri->segment(3);
        $data['title'] = $uri3;
        $this->load->view('templete/header', $data);
        $this->load->view('templete/topbar_master', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('admin/itemmaster/v_brand/tampil_brand', $data);
        $this->load->view('admin/itemmaster/v_brand/ajaxcrud_brand', $data);
        $this->load->view('templete/js');
    }

    public function databrand()
    {
        $uri3 = $this->uri->segment(3);
        $databrand = $this->master_model->getdatabrand();
        $no = 1;
        foreach ($databrand as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['nm_brand'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $aksi = "<button class='btn btn-sm btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['id_brand'] . "><i class='far fa-edit'>Edit</i>
            </button>" . ' ' . "<button class='btn btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id_brand'] . "><i class='far fa-trash-alt'></i>Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($databrand) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahbrand()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $tambahbrand = array(
            'nm_brand'        => $this->input->post('nm_brand'),
            'created_by'        => $this->input->post('created_by'),
            'created_dt'        => $this->input->post('created_dt')
        );

        $data = $this->master_model->insertbrand($tambahbrand);
        echo json_encode($data);
    }


    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data['dataperbrand'] = $this->master_model->databrandedit($id);
        $this->load->view('admin/itemmaster/v_brand/formeditbrand', $data);
    }

    public function ubahbrand()
    {
        $objdata = array(
            'nm_brand'     => $this->input->post('e_nm_brand'),
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt')
        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahbrand($objdata, $id);

        echo json_encode($data);
    }

    public function hapusbrand()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data = $this->master_model->hapusdatabrand($id);
        echo json_encode($data);
    }
}
