<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $this->load->view('admin/itemmaster/v_kategori/tampil_kategori', $data);
        $this->load->view('admin/itemmaster/v_kategori/ajaxcrud_kategori', $data);
        $this->load->view('templete/js');
    }

    public function datakategori()
    {
        $uri3 = $this->uri->segment(3);
        $datakategori = $this->master_model->getdatakategori();
        $no = 1;
        foreach ($datakategori as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['nm_kategori'];
            $tbody[] = $value['deskripsi'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $aksi = "<button class='btn btn-sm ubah-$uri3' data-toggle='modal' data-id=" . $value['id_kategori'] . "><i class='fas fa-edit'> </i> Edit
            </button>" . ' ' . "<button class='btn btn-sm hapus-$uri3' id='id' data-toggle='modal' data-id=" . $value['id_kategori'] . "><i class='fas fa-trash-alt'></i> delete</button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datakategori) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahkategori()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $nm_kategori = $this->input->post('nm_kategori');
        $deskripsi = $this->input->post('deskripsi');
        $created_by = $this->input->post('created_by');
        $created_dt = $this->input->post('created_dt');

        $tambahkategori = array(

            'nm_kategori'        => $nm_kategori,
            'deskripsi'        => $deskripsi,
            'created_by'        => $created_by,
            'created_dt'        => $created_dt

        );

        $data = $this->master_model->insertkategori($tambahkategori);

        echo json_encode($data);
    }


    public function hapuskategori()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->master_model->hapusdatakategori($id);
        echo json_encode($data);
    }

    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $uri3 = $this->uri->segment(3);
        $data['title'] = $uri3;
        $id = $this->input->post('id');
        $data['dataperkategori'] = $this->master_model->datakategoriedit($id);
        $this->load->view('admin/itemmaster/v_kategori/formeditkategori', $data);
    }

    public function ubahkategori()
    {
        $objdata = array(

            'nm_kategori'     => $this->input->post('e_nm_kategori'),
            'deskripsi'     => $this->input->post('e_deskripsi'),
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt')
        );

        $id = $this->input->post('id');
        $data = $this->master_model->ubahkategori($objdata, $id);

        echo json_encode($data);
    }
}
