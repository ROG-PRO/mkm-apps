<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_role extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model('usermanagement_model');
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }
    public function index()
    {
        $data['title'] = $this->uri->segment(3);
        $this->load->view('templete/header', $data);
        $this->load->view('templete/topbar_usermgt_master', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('admin/usermanagement/v_user_role/tampil_user_role', $data);
        $this->load->view('admin/usermanagement/v_user_role/ajaxcrud_user_role', $data);
        $this->load->view('templete/js');
    }

    public function datauser_role()
    {
        $uri3 = $this->uri->segment(3);
        $datauser_role = $this->usermanagement_model->getdatauser_role();
        $no = 1;
        foreach ($datauser_role as  $value) {
            $tbody = array();
            // $tbody[] = $no++;
            $tbody[] = $value['roleid'];
            $tbody[] = $value['role'];
            $aksi = "<button class='btn  btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['roleid'] . "><i class='far fa-trash-alt' ></i> Delete</button>";
            // $aksi = "<button class='btn  btn-sm ubah-$uri2' data-toggle='modal' data-id=" . $value['roleid'] . "><i class='far fa-edit'> Edit</i>
            // </button>" . ' ' . "<button class='btn  btn-sm hapus-$uri2' id='id' data-toggle='modal' data-id=" . $value['roleid'] . "><i class='far fa-trash-alt' ></i> Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datauser_role) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahuser_role()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $tambahuser_role = array(
            'role'        => $this->input->post('role'),
            'rol_ins_by'        => $this->input->post('created_by'),
            'rol_ins_dt'        => $this->input->post('created_dt')
        );

        $data = $this->usermanagement_model->insertuser_role($tambahuser_role);
        echo json_encode($data);
    }


    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data['dataperuser_role'] = $this->usermanagement_model->datauser_roleedit($id);
        $this->load->view('admin/usermanagement/v_user_role/formedituser_role', $data);
    }

    public function ubahuser_role()
    {
        $objdata = array(
            'nm_user_role'     => $this->input->post('e_nm_user_role'),
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt')
        );

        $id = $this->input->post('id');
        $data = $this->usermanagement_model->ubahuser_role($objdata, $id);

        echo json_encode($data);
    }

    public function hapususer_role()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data = $this->usermanagement_model->hapusdatauser_role($id);
        echo json_encode($data);
    }
}
