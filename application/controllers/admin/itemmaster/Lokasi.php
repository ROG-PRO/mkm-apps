<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
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
        $this->load->view('admin/itemmaster/v_lokasi/tampil_lokasi', $data);
        $this->load->view('admin/itemmaster/v_lokasi/ajaxcrud_lokasi', $data);
        $this->load->view('templete/js');
    }

    public function datalokasi()
    {
        $uri3 = $this->uri->segment(3);
        $datalokasi = $this->master_model->getdatalokasi();
        $no = 1;
        foreach ($datalokasi as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['cd_lok'];
            $tbody[] = $value['nm_lok'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $aksi = "<button class='btn btn-secondary btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['id_lok'] . "><i class='far fa-edit' style='color:blue;'></i>
            </button>" . ' ' . "<button class='btn btn-secondary btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id_lok'] . "><i class='far fa-trash-alt' style='color:red;'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datalokasi) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahlokasi()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $cd_lok = $this->input->post('cd_lok');
        $nm_lok = $this->input->post('nm_lok');
        $created_by = $this->input->post('created_by');
        $created_dt = $this->input->post('created_dt');

        $tambahlokasi = array(

            'cd_lok'        => $cd_lok,
            'nm_lok'        => $nm_lok,
            'created_by'        => $created_by,
            'created_dt'        => $created_dt

        );

        $data = $this->master_model->insertlokasi($tambahlokasi);

        echo json_encode($data);
    }


    public function hapuslokasi()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->master_model->hapusdatalokasi($id);
        echo json_encode($data);
    }

    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $uri3 = $this->uri->segment(3);
        $data['title'] = $uri3;
        $id = $this->input->post('id');
        $data['dataperlokasi'] = $this->master_model->datalokasiedit($id);
        $this->load->view('admin/itemmaster/v_lokasi/formeditlokasi', $data);
    }

    public function ubahlokasi()
    {
        $objdata = array(

            'cd_lok'     => $this->input->post('e_cd_lok'),
            'nm_lok'     => $this->input->post('e_nm_lok'),
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt')
        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahlokasi($objdata, $id);

        echo json_encode($data);
    }
}
