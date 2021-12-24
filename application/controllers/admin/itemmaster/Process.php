<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Process extends CI_Controller
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
        $this->load->view('admin/itemmaster/v_process/tampil_process', $data);
        $this->load->view('admin/itemmaster/v_process/ajaxcrud_process', $data);
        $this->load->view('templete/js');
    }

    public function dataprocess()
    {
        $uri3 = $this->uri->segment(3);
        $dataprocess = $this->master_model->getdataprocess();
        $no = 1;
        foreach ($dataprocess as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['process_nm'];
            //$tbody[] = $value['cost_process'];
            $tbody[] = $value['process_created_by'];
            $tbody[] = $value['process_created_dt'];
            $aksi = "<button class='btn btn-info btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['id_process'] . "><i class='fas fa-edit'></i>
            </button>" . ' ' . "<button class='btn btn-danger btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id_process'] . "><i class='fas fa-trash'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($dataprocess) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahprocess()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $tambahprocess = array(
            'process_nm'        => $this->input->post('process_nm'),
            //'cost_process'        => $this->input->post('cost_process'),
            'process_created_by'        => $this->input->post('created_by'),
            'process_created_dt'        => $this->input->post('created_dt')
        );

        $data = $this->master_model->insertprocess($tambahprocess);
        echo json_encode($data);
    }


    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $uri3 = $this->uri->segment(3);
        $data['title'] = $uri3;
        $id = $this->input->post('id');
        $data['dataperprocess'] = $this->master_model->dataprocessedit($id);
        $this->load->view('admin/itemmaster/v_process/formeditprocess', $data);
    }

    public function ubahprocess()
    {
        $objdata = array(
            'process_nm'     => $this->input->post('e_process_nm'),
            //'cost_process'     => $this->input->post('e_cost_process'),
            'process_update_by'   => $this->input->post('update_by'),
            'process_update_dt'   => $this->input->post('update_dt')
        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahprocess($objdata, $id);

        echo json_encode($data);
    }

    public function hapusprocess()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data = $this->master_model->hapusdataprocess($id);
        echo json_encode($data);
    }
}
