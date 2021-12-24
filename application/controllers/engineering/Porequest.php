<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Porequest extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('porequest_model');
        $this->load->model("auth_model");
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }
    public function index()
    {
        // Action form.
        $data['unit'] = $this->porequest_model->select_unit()->result();
        $data['customer'] = $this->porequest_model->select_customer()->result();
        $data['action'] = site_url('engineering/porequest/process');
        $data['porequest'] = $this->porequest_model->get_all();
        //$this->load->view('data', $data);
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        //$this->load->view('templete2/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_porequest/tampil_porequest', $data);
        $this->load->view('engineering/v_porequest/ajaxcrud_porequest', $data);
        $this->load->view('templete/js');
    }
    
    public function dataporequest()
    {
        $uri2 = $this->uri->segment(2);
        $dataporequest = $this->porequest_model->getdataporequest();
        $no = 1;
        foreach ($dataporequest as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['porequest_no'];
            $tbody[] = $value['customer_cd'];
            $tbody[] = $value['customer_nm'];
            $tbody[] = $value['item_cd'];
            $tbody[] = $value['item_nm'];
            $tbody[] = $value['model_no'];
            $test = "if(" . $value['qty'] . " > 0 ){ echo 'jangan input 0' })";
            $tbody[] = $test;
            $tbody[] = $value['unit'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $tbody[] = $value['update_by'];
            $tbody[] = $value['update_dt'];
            $tbody[] = $value['note'];
            $aksi = "<button class='btn btn-outline-info btn-xs ubah-$uri2' data-toggle='modal' data-id=" . $value['id_porequest'] . "><i class='fas fa-edit'></i>
            </button>" . ' ' . "<button class='btn btn-outline-danger btn-xs hapus-$uri2' id='id' data-toggle='modal' data-id=" . $value['id_porequest'] . "><i class='fas fa-trash'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }
        
        if ($dataporequest) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }
    
    
    /* Memproses data csv yang diimport */
    public function process()
    {
        if (isset($_POST['import'])) {
            
            $file = $_FILES['porequest']['tmp_name'];
            
            // Medapatkan ekstensi file csv yang akan diimport.
            $ekstensi  = explode('.', $_FILES['porequest']['name']);
            
            // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
            if (empty($file)) {
                echo 'File tidak boleh kosong!';
            } else {
                // Validasi apakah file yang diupload benar-benar file csv.
                if (strtolower(end($ekstensi)) === 'csv' && $_FILES["porequest"]["size"] > 0) {
                    
                    $i = 0;
                    $handle = fopen($file, "r");
                    while (($row = fgetcsv($handle, 2048))) {
                        $i++;
                        if ($i == 1) continue;
                        
                        // Data yang akan disimpan ke dalam databse
                        $data = [
                            'porequest_no' => $row[1],
                            'customer_cd' => $row[2],
                            'customer_nm' => $row[3],
                            'item_cd' => $row[4],
                            'item_nm' => $row[5],
                            'model_no' => $row[6],
                            'qty' => $row[7],
                            'unit' => $row[8],
                            'create_by' => $row[9],
                            'create_dt' => $row[10],
                            'update_by' => $row[11],
                            'update_dt' => $row[12],
                            'note' => $row[13],
                        ];
                        
                        // Simpan data ke database.
                        $this->porequest_model->insertcsv($data);
                    }
                    
                    fclose($handle);
                    redirect('engineering/porequest');
                } else {
                    echo 'Format file tidak valid!';
                }
            }
        }
    }
    
    
    public function hapusporequest()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');
        
        $data = $this->porequest_model->hapusdataporequest($id);
        echo json_encode($data);
    }
    
    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data['dataperporequest'] = $this->porequest_model->dataporequestedit($id);
        $this->load->view('engineering/v_porequest/formeditporequest', $data);
    }
    
    public function ubahporequest()
    {
        $objdata = array(
            //'nama_mahasiswa'=>$this->input->post('editnama'),
            //'alamat'=>$this->input->post('editalamat'),
            'porequest_cd'     => $this->input->post('e_porequest_cd'),
            'porequest_nm'     => $this->input->post('e_porequest_nm'),
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt'),
            
            
        );
        
        $id = $this->input->post('id');
        $data = $this->porequest_model->ubahporequest($objdata, $id);
        
        echo json_encode($data);
    }
    
    
    /*multiple insert */
    public function input_data()
    {
        $result = array();
        foreach ($_POST['porequest_no'] as $key => $val) {
            $result[] = array(
                'porequest_no' => $_POST['porequest_no'][$key],
                'customer_cd' => $_POST['customer_cd'][$key],
                'customer_nm' => $_POST['customer_nm'][$key],
                'item_cd' => $_POST['item_cd'][$key],
                'item_nm' => $_POST['item_nm'][$key],
                'model_no' => $_POST['model_no'][$key],
                'qty' => $_POST['qty'][$key],
                'unit' => $_POST['unit'][$key],
                'create_by' => $_POST['create_by'][$key],
                'create_dt' => $_POST['create_dt'][$key],
                'note' => $_POST['note'][$key]
            );
        }
        $this->db->insert_batch('porequest', $result);
        redirect('marketing/porequest');
    }
    
    /* Autocomplete */
    public function search()
    {
        // tangkap variabel keyword dari URL
        $uri3 = $this->uri->segment(3);
        
        // cari di database
        $data = $this->db->from('customer')->like('customer_cd', $uri3)->get();
        
        // format keluaran di dalam array
        foreach ($data->result() as $row) {
            $arr['query'] = $uri3;
            $arr['suggestions'][] = array(
                'value'    => $row->customer_cd,
                'customer_nm'    => $row->customer_nm
            );
        }
        // minimal PHP 5.2
        echo json_encode($arr);
    }
}
