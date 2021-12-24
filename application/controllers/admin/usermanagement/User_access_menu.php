<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_access_menu extends CI_Controller
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
        $this->load->view('admin/usermanagement/v_user_access_menu/tampil_user_access_menu', $data);
        $this->load->view('admin/usermanagement/v_user_access_menu/ajaxcrud_user_access_menu', $data);
        $this->load->view('templete/js');
    }

    public function datauser_access_menu()
    {
        $uri3 = $this->uri->segment(3);
        $datauser_access_menu = $this->usermanagement_model->getdatauser_access_menu();
        $no = 1;
        foreach ($datauser_access_menu as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['role_id'];
            $tbody[] = $value['role'];
            $tbody[] = $value['menu_id'];
            // $tbody[] = $value['role'];
            $tbody[] = $value['seq_no'];
            // $aksi = "<button class='btn  btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id'] . "><i class='far fa-trash-alt' ></i> Delete</button>";
            $aksi = "<button class='btn  btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['id'] . "><i class='far fa-edit'> Edit</i>
            </button>" . ' ' . "<button class='btn  btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id'] . "><i class='far fa-trash-alt' ></i> Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datauser_access_menu) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahuser_access_menu()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $today = date("Y-m-d H:i:s");
        $user = $this->session->userdata('user_logged')->username;
        $tambahuser_access_menu = array(
            'role_id'        => $this->input->post('role_id'),
            'menu_id'        => $this->input->post('menu_id'),
            'seq_no'        => $this->input->post('seq_no'),
            'uam_ins_by'        => $user,
            'uam_ins_dt'        => $today
        );

        $data = $this->usermanagement_model->insertuser_access_menu($tambahuser_access_menu);
        echo json_encode($data);
    }


    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data['dataperuser_access_menu'] = $this->usermanagement_model->datauser_access_menuedit($id);
        $data['select_user_role'] = $this->usermanagement_model->select_user_role();
        $this->load->view('admin/usermanagement/v_user_access_menu/formedituser_access_menu', $data);
    }

    public function ubahuser_access_menu()
    {
        $today = date("Y-m-d H:i:s");
        $user = $this->session->userdata('user_logged')->username;
        $objdata = array(
            'role_id'        => $this->input->post('e_role_id'),
            'menu_id'        => $this->input->post('e_menu_id'),
            'seq_no'        => $this->input->post('e_seq_no'),
            'uam_upd_by'        => $user,
            'uam_upd_dt'        => $today
        );

        $id = $this->input->post('id');
        $data = $this->usermanagement_model->ubahuser_access_menu($objdata, $id);

        echo json_encode($data);
    }

    public function hapususer_access_menu()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data = $this->usermanagement_model->hapusdatauser_access_menu($id);
        echo json_encode($data);
    }
}
