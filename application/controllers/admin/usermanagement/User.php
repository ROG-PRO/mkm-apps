<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['role'] = $this->usermanagement_model->select_user_role()->result();
        // $data['submenu'] = $this->usermanagement_model->select_submenu()->result();
        $this->load->view('templete/header', $data);
        $this->load->view('templete/topbar_usermgt_master', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('admin/usermanagement/v_user/tampil_user', $data);
        $this->load->view('admin/usermanagement/v_user/ajaxcrud_user', $data);
        $this->load->view('templete/js');
    }

    public function datauser()
    {
        $uri3 = $this->uri->segment(3);
        $datauser = $this->usermanagement_model->getdatauser();
        $no = 1;
        foreach ($datauser as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['username'];
            $tbody[] = $value['password'];
            $tbody[] = $value['fullname'];
            $tbody[] = $value['gambar'];
            $tbody[] = $value['is_active'];
            $tbody[] = $value['last_login'];
            $tbody[] = $value['role_id'];
            $tbody[] = $value['role'];
            $aksi = "<button class='btn  btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['user_id'] . "><i class='far fa-edit'> Edit</i>
            </button>" . ' ' . "<button class='btn  btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['user_id'] . "><i class='far fa-trash-alt' ></i> Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datauser) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahuser()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $tambahuser = array(
            'username'        => $this->input->post('username'),
            'password'        => $this->input->post('password'),
            'fullname'        => $this->input->post('fullname'),
            'gambar'        => '../images/user2.png',
            'is_active'        => 1,
            'role_id'        => $this->input->post('roleid'),
            'id_dept'        => $this->input->post('roleid'),
            'usr_ins_dt'        => $this->input->post('usr_ins_dt'),
            'usr_ins_by'        => $this->input->post('usr_ins_by'),
        );

        $data = $this->usermanagement_model->insertuser($tambahuser);
        echo json_encode($data);
    }


    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data['role'] = $this->usermanagement_model->select_user_role()->result();
        $data['dataperuser'] = $this->usermanagement_model->datauseredit($id);
        $data['select_user_role'] = $this->usermanagement_model->select_user_role();
        $this->load->view('admin/usermanagement/v_user/formedituser', $data);
    }

    public function ubahuser()
    {
        $objdata = array(
            'username'     => $this->input->post('e_username'),
            'password'     => $this->input->post('e_password'),
            'fullname'     => $this->input->post('e_fullname'),
            'role_id'     => $this->input->post('e_roleid'),
            'id_dept'     => $this->input->post('e_roleid'),
            'usr_upd_by'   => $this->input->post('update_by'),
            'usr_upd_dt'   => $this->input->post('update_dt')
        );

        $id = $this->input->post('id');
        $data = $this->usermanagement_model->ubahuser($objdata, $id);

        echo json_encode($data);
    }

    public function hapususer()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data = $this->usermanagement_model->hapusdatauser($id);
        echo json_encode($data);
    }
}
