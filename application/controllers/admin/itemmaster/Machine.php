<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Machine extends CI_Controller
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
        $this->load->view('admin/itemmaster/v_machine/tampil_machine', $data);
        $this->load->view('admin/itemmaster/v_machine/ajaxcrud_machine', $data);
        $this->load->view('templete/js');
    }

    public function datamachine()
    {
        $uri3 = $this->uri->segment(3);
        $datamachine = $this->master_model->getdatamachine();
        $no = 1;
        foreach ($datamachine as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['type_machine'];
            $tbody[] = $value['cost_machine'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $aksi = "<button class='btn btn-info btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['id_machine'] . "><i class='fas fa-edit'></i>
            </button>" . ' ' . "<button class='btn btn-danger btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id_machine'] . "><i class='fas fa-trash'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datamachine) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahmachine()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $tambahmachine = array(
            'type_machine'        => $this->input->post('type_machine'),
            'cost_machine'        => $this->input->post('cost_machine'),
            'created_by'        => $this->input->post('created_by'),
            'created_dt'        => $this->input->post('created_dt')
        );

        $data = $this->master_model->insertmachine($tambahmachine);
        echo json_encode($data);
    }


    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $uri3 = $this->uri->segment(3);
        $data['title'] = $uri3;
        $id = $this->input->post('id');
        $data['datapermachine'] = $this->master_model->datamachineedit($id);
        $this->load->view('admin/itemmaster/v_machine/formeditmachine', $data);
    }

    public function ubahmachine()
    {
        $objdata = array(
            'type_machine'     => $this->input->post('e_type_machine'),
            'cost_machine'     => $this->input->post('e_cost_machine'),
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt')
        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahmachine($objdata, $id);

        echo json_encode($data);
    }

    public function hapusmachine()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data = $this->master_model->hapusdatamachine($id);
        echo json_encode($data);
    }
}
