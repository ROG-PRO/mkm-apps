<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
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
        $this->load->view('admin/itemmaster/v_unit/tampil_unit', $data);
        $this->load->view('admin/itemmaster/v_unit/ajaxcrud_unit', $data);
        $this->load->view('templete/js');
    }

    public function dataunit()
    {
        $uri3 = $this->uri->segment(3);
        $dataunit = $this->master_model->getdataunit();
        $no = 1;
        foreach ($dataunit as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['nm_unit'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $aksi = "<button class='btn btn-outline-info btn-sm ubah-unit' data-toggle='modal' data-id=" . $value['id_unit'] . "><i class='fas fa-edit'></i>
            </button>" . ' ' . "<button class='btn btn-outline-danger btn-sm hapus-unit' id='id' data-toggle='modal' data-id=" . $value['id_unit'] . "><i class='fas fa-trash'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }


        if ($dataunit) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahunit()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $nm_unit = $this->input->post('nm_unit');
        $created_by = $this->input->post('created_by');
        $created_dt = $this->input->post('created_dt');

        $tambahunit = array(

            'nm_unit'        => $nm_unit,
            'created_by'        => $created_by,
            'created_dt'        => $created_dt

        );

        $data = $this->master_model->insertunit($tambahunit);

        echo json_encode($data);
    }


    public function hapusunit()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->master_model->hapusdataunit($id);
        echo json_encode($data);
    }

    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $uri3 = $this->uri->segment(3);
        $data['title'] = $uri3;
        $id = $this->input->post('id');
        $data['dataperunit'] = $this->master_model->dataunitedit($id);
        $this->load->view('admin/itemmaster/v_unit/formeditunit', $data);
    }

    public function ubahunit()
    {
        $objdata = array(

            'nm_unit'     => $this->input->post('e_nm_unit'),
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt')
        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahunit($objdata, $id);

        echo json_encode($data);
    }
}
