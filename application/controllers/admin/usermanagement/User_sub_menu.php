<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_sub_menu extends CI_Controller
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
        $this->load->view('templete/header', $data);
        $this->load->view('templete/topbar_usermgt_master', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('admin/usermanagement/v_user_sub_menu/tampil_user_sub_menu', $data);
        $this->load->view('admin/usermanagement/v_user_sub_menu/ajaxcrud_user_sub_menu', $data);
        $this->load->view('templete/js');
    }

    public function datauser_sub_menu()
    {
        $uri3 = $this->uri->segment(3);
        $datauser_sub_menu = $this->usermanagement_model->getdatauser_sub_menu();
        $no = 1;
        foreach ($datauser_sub_menu as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['menu_id'];
            $tbody[] = $value['title'];
            $tbody[] = $value['url'];
            $tbody[] = $value['controller'];
            $tbody[] = $value['icon'];
            $tbody[] = $value['is_active'];
            $aksi = "<button class='btn  btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['id'] . "><i class='far fa-edit'> Edit</i>
            </button>" . ' ' . "<button class='btn  btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id'] . "><i class='far fa-trash-alt' ></i> Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datauser_sub_menu) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahuser_sub_menu()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $tambahuser_sub_menu = array(
            'menu_id'        => $this->input->post('menu_id'),
            'title'        => $this->input->post('title'),
            'menu_id'        => $this->input->post('menu_id'),
            'url'        => $this->input->post('url'),
            'controller'        => $this->input->post('controller'),
            'icon'        => $this->input->post('icon'),
            'is_active'        => 1,
            'usm_ins_by'        => $this->input->post('created_by'),
            'usm_ins_dt'        => $this->input->post('created_dt')
        );

        $data = $this->usermanagement_model->insertuser_sub_menu($tambahuser_sub_menu);
        echo json_encode($data);
    }


    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data['role'] = $this->usermanagement_model->select_user_role()->result();
        $data['dataperuser_sub_menu'] = $this->usermanagement_model->datauser_sub_menuedit($id);
        $this->load->view('admin/usermanagement/v_user_sub_menu/formedituser_sub_menu', $data);
    }

    public function ubahuser_sub_menu()
    {
        $today = date("Y-m-d H:i:s");
        $user = $this->session->userdata('user_logged')->username;
        $objdata = array(
            // 'mesdnu_id'       => $this->input->post('e_menu_id'),
            // 'menu_id'       => $this->input->post('e_menu_id'),
            // 'title'         => $this->input->post('e_title'),
            // 'url'           => $this->input->post('e_url'),
            'controller'    => $this->input->post('e_controller'),
            // 'icon'          => $this->input->post('e_icon'),
            // 'is_active'     => $this->input->post('e_is_active'),
            'usm_upd_by'    => $user,
            'usm_upd_dt'    => $today
        );
        $id = $this->input->post('id');
        $data = $this->usermanagement_model->ubahuser_sub_menu($objdata, $id);

        echo json_encode($data);
    }

    public function hapususer_sub_menu()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        $data = $this->usermanagement_model->hapusdatauser_sub_menu($id);
        echo json_encode($data);
    }
}
