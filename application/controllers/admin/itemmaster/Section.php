<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section extends CI_Controller
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
        $this->load->view('admin/itemmaster/v_section/tampil_section', $data);
        $this->load->view('admin/itemmaster/v_section/ajaxcrud_section', $data);
        $this->load->view('templete/js');
    }

    public function datasection()
    {
        $uri3 = $this->uri->segment(3);
        $datasection = $this->master_model->getdatasection();
        $no = 1;
        foreach ($datasection as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['section_cd'];
            $tbody[] = $value['section_nm'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $aksi = "<button class='btn btn-info btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['id_section'] . "><i class='fas fa-edit'></i>
            </button>" . ' ' . "<button class='btn btn-danger btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id_section'] . "><i class='fas fa-trash'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datasection) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahsection()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $section_cd = $this->input->post('section_cd');
        $section_nm = $this->input->post('section_nm');
        $created_by = $this->input->post('created_by');
        $created_dt = $this->input->post('created_dt');

        $tambahsection = array(
            'section_cd' => $section_cd,
            'section_nm'        => $section_nm,
            'created_by'        => $created_by,
            'created_dt'        => $created_dt

        );

        $data = $this->master_model->insertsection($tambahsection);

        echo json_encode($data);
    }


    public function hapussection()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->master_model->hapusdatasection($id);
        echo json_encode($data);
    }

    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data['datapersection'] = $this->master_model->datasectionedit($id);
        $this->load->view('admin/itemmaster/v_section/formeditsection', $data);
    }

    public function ubahsection()
    {
        $objdata = array(
            //'nama_mahasiswa'=>$this->input->post('editnama'),
            //'alamat'=>$this->input->post('editalamat'),
            'section_cd'     => $this->input->post('e_section_cd'),
            'section_nm'     => $this->input->post('e_section_nm'),
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt'),


        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahsection($objdata, $id);

        echo json_encode($data);
    }
}
