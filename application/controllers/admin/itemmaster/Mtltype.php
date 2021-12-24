<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MtlType extends CI_Controller
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
        $this->load->view('admin/itemmaster/v_mtltype/tampil_mtltype', $data);
        $this->load->view('admin/itemmaster/v_mtltype/ajaxcrud_mtltype', $data);
        $this->load->view('templete/js');
    }

    public function datamtltype()
    {
        $uri3 = $this->uri->segment(3);
        $datamtltype = $this->master_model->getdatamtltype();
        $no = 1;
        foreach ($datamtltype as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['mtl_type_cd'];
            $tbody[] = $value['mtl_type_desc'];
            $tbody[] = $value['mtl_type_created_by'];
            $tbody[] = $value['mtl_type_created_dt'];
            $aksi = "<button class='btn btn-info btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['mtl_type_id'] . "><i class='fas fa-edit'></i>
            </button>" . ' ' . "<button class='btn btn-danger btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['mtl_type_id'] . "><i class='fas fa-trash'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datamtltype) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahmtltype()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $mtltype_cd = $this->input->post('mtl_type_cd');
        $mtltype_nm = $this->input->post('mtl_type_desc');
        $created_by = $this->input->post('created_by');
        $created_dt = $this->input->post('created_dt');

        $tambahmtltype = array(
            'mtl_type_cd' => $mtltype_cd,
            'mtl_type_desc'        => $mtltype_nm,
            'mtl_type_created_by'        => $created_by,
            'mtl_type_created_dt'        => $created_dt

        );

        $data = $this->master_model->insertmtltype($tambahmtltype);

        echo json_encode($data);
    }


    public function hapusmtltype()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->master_model->hapusdatamtltype($id);
        echo json_encode($data);
    }

    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data['datapermtltype'] = $this->master_model->datamtltypeedit($id);
        $this->load->view('admin/itemmaster/v_mtltype/formeditmtltype', $data);
    }

    public function ubahmtltype()
    {
        $objdata = array(
            //'nama_mahasiswa'=>$this->input->post('editnama'),
            //'alamat'=>$this->input->post('editalamat'),
            'mtl_type_cd'     => $this->input->post('e_mtl_type_cd'),
            'mtl_type_desc'     => $this->input->post('e_mtl_type_desc'),
            'mtl_type_update_by'   => $this->input->post('update_by'),
            'mtl_type_update_dt'   => $this->input->post('update_dt'),


        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahmtltype($objdata, $id);

        echo json_encode($data);
    }
}
