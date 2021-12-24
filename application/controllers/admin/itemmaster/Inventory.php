<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('databrg_model');
        $this->load->model("auth_model");
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }
    public function index()
    {
        $uri3 = $this->uri->segment(3);
        $data = array(
            'title' => $uri3,
            'brand' => $this->databrg_model->select_brand()->result(),
            'lokasi' => $this->databrg_model->select_lokasi()->result(),
            'unit' => $this->databrg_model->select_unit()->result(),
            'kategori' => $this->databrg_model->select_kategori()->result(),
            'section' => $this->databrg_model->select_section()->result(),
            'status' => $this->databrg_model->select_status()->result(),
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/topbar_master', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('admin/itemmaster/brg_product/tampil_brg', $data);
        $this->load->view('admin/itemmaster/brg_product/ajaxcrud_brg', $data);
        $this->load->view('templete/js');
    }

    public function databrg()
    {

        $databrg = $this->databrg_model->getdatabrg();
        $no = 1;
        foreach ($databrg as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['part_no'];
            $tbody[] = $value['part_nm'];
            $tbody[] = $value['section_cd'];
            $tbody[] = $value['nm_brand'];
            $tbody[] = $value['nm_kategori'];
            $tbody[] = $value['min_stok'];
            $tbody[] = $value['nm_unit'];
            //$tbody[] = $value['nm_status'];
            //$tbody[] = $value['cd_lok'];
            $tbody[] = $value['price'];
            $tbody[] = $value['created_dt'];
            $aksi = "<button class='btn btn-sm ubah-brg' data-toggle='modal' data-id=" . $value['id_barang'] . "><i class='fas fa-edit'> Edit</i>
            </button>" . ' ' . "<button class='btn btn-sm hapus-brg' id='id' data-toggle='modal' data-id=" . $value['id_barang'] . "><i class='fas fa-trash-alt'></i> Delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($databrg) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahbrg()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $this->form_validation->set_rules('part_no', 'Part_no', 'required|trim|is_unique[barang.part_no]', [
            'is_unique' => 'This part number already registered!'
        ]);

        if ($this->form_validation->run() == false) {

            $uri3 = $this->uri->segment(3);
            $data = array(
                'title' => $uri3,
                'brand' => $this->databrg_model->select_brand()->result(),
                'lokasi' => $this->databrg_model->select_lokasi()->result(),
                'unit' => $this->databrg_model->select_unit()->result(),
                'kategori' => $this->databrg_model->select_kategori()->result(),
                'section' => $this->databrg_model->select_section()->result(),
                'status' => $this->databrg_model->select_status()->result(),
            );
            $this->load->view('templete/header', $data);
            $this->load->view('templete/topbar_master', $data);
            $this->load->view('templete/sidebar');
            $this->load->view('admin/itemmaster/brg_product/tampil_brg', $data);
            $this->load->view('admin/itemmaster/brg_product/ajaxcrud_brg', $data);
            $this->load->view('templete/js');
        } else {

            $part_no = $this->input->post('part_no');
            $part_nm = $this->input->post('part_nm');
            $id_brand = $this->input->post('id_brand');
            $id_unit = $this->input->post('id_unit');
            $id_kategori = $this->input->post('id_kategori');
            $id_status = $this->input->post('id_status');
            $min_stok = $this->input->post('min_stok');
            $created_by = $this->input->post('created_by');
            $created_dt = $this->input->post('created_dt');
            //$update_by = '';
            //$update_dt = '';
            $id_lok = $this->input->post('id_lok');
            $price = $this->input->post('price');
            $id_section = $this->input->post('id_section');
            //$alamat = $this->input->post('alamat');

            $tambahbrg = array(
                'part_no' => $part_no,
                'part_nm'        => $part_nm,
                'id_brand'        => $id_brand,
                'id_unit'        => $id_unit,
                'id_kategori'        => $id_kategori,
                'id_status'        => $id_status,
                'min_stok'        => $min_stok,
                'created_by'        => $created_by,
                'created_dt'        => $created_dt,
                //'update_by'        => $update_by,
                //'update_dt'        => $update_dt,
                'price'        => $price,
                'id_lok'        => $id_lok,
                'id_section'        => $id_section
            );

            $data = $this->databrg_model->insertbrg($tambahbrg);

            echo json_encode($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your
                data has been created ! </div>');
        }
    }

    public function hapusbrg()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->databrg_model->hapusdatabrg($id);
        echo json_encode($data);
    }

    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data = array(
            'brand' => $this->databrg_model->select_brand()->result(),
            'lokasi' => $this->databrg_model->select_lokasi()->result(),
            'unit' => $this->databrg_model->select_unit()->result(),
            'kategori' => $this->databrg_model->select_kategori()->result(),
            'section' => $this->databrg_model->select_section()->result(),
            'status' => $this->databrg_model->select_status()->result(),
            'dataperbrg' => $this->databrg_model->databrgedit($id)
        );
        $this->load->view('admin/itemmaster/brg_product/formeditbrg', $data);
    }

    public function ubahbrg()
    {
        $objdata = array(
            //'nama_mahasiswa'=>$this->input->post('editnama'),
            //'alamat'=>$this->input->post('editalamat'),
            'part_no'     => $this->input->post('e_part_no'),
            'part_nm'     => $this->input->post('e_part_nm'),
            'id_brand'    => $this->input->post('e_id_brand'),
            'id_unit'     => $this->input->post('e_id_unit'),
            'id_kategori' => $this->input->post('e_id_kategori'),
            'id_status'   => $this->input->post('e_id_status'),
            'min_stok'    => $this->input->post('e_min_stok'),
            //'created_by'        => $this->input->post('editalamat')$created_by,
            //'created_dt'        => $this->input->post('editalamat')$created_dt,
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt'),
            'id_lok'      => $this->input->post('e_id_lok'),
            'price'      => $this->input->post('e_price'),
            'id_section'  => $this->input->post('e_id_section')

        );

        $id = $this->input->post('id');
        $data = $this->databrg_model->ubahbrg($objdata, $id);

        echo json_encode($data);
    }

    /*public function form_dropdown()
    {
        $this->load->view("reg_form");
    }

    public function data_submitted()
    {
        //storing the value send by submit using post method in an array
        $mul_array = $this->input->post('Technical_skills');
        //converting array into a string
        $mul_val_string = serialize($mul_array);
        $data = array(
            'dropdown_single' => $this->input->post('Department'),
            'dropdown_multi' => $mul_val_string
        );
        $this->load->model("db_dropdown");
        $this->db_dropdown->insert_in_db($data);
        $this->load->model("db_dropdown");
        $result = $this->db_dropdown->read_from_db($data);
        $data['result'] = $result[0];
        $this->load->view("reg_form", $data);
    }
}
?>*/
}
