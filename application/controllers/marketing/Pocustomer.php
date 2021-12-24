<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pocustomer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('pocustomer_model');
        $this->load->model('inquiry_model');
        $this->load->model('master_model');
        $this->load->model("auth_model");
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }
    public function index()
    {
        // Action form.
        $data['unit'] = $this->master_model->select_unit()->result();
        $data['customer'] = $this->pocustomer_model->select_customer()->result();
        $data['action'] = site_url('marketing/pocustomer/process');
        $data['pocustomer'] = $this->pocustomer_model->getall();
        $data['datainquiry'] = $this->inquiry_model->getinquirybysoflex();
        $data['podetail'] = $this->pocustomer_model->detailPo();
        $data['product'] = $this->master_model->select_product()->result();

        //$this->load->view('data', $data);
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        //$this->load->view('templete2/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_pocustomer/tampil_pocustomer', $data);
        //$this->load->view('marketing/v_pocustomer/ajaxcrud_pocustomer', $data);
        $this->load->view('templete/js');
    }

    public function input()
    {
        $inq = $this->input->post('poInquiry');
        $data['inquiry'] = $this->inquiry_model->getinquirybyid($inq);
        $data['inqdetail'] = $this->inquiry_model->inquirydetailbyid($inq);
        $data['poProcess'] = $this->input->post('poProcess');
        $data['poProduction'] = $this->input->post('poProduction');

        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        //$this->load->view('templete2/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_pocustomer/inputpo', $data);
        $this->load->view('templete/js');
    }

    public function datapocustomer()
    {
        $uri2 = $this->uri->segment(2);
        $datapocustomer = $this->pocustomer_model->getdatapocustomer();
        $no = 1;
        foreach ($datapocustomer as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $aksi = "<button class='btn btn-info btn-kecil ubah-$uri2' data-toggle='modal' data-id=" . $value['id_pocustomer'] . "><i class='fas fa-edit'></i>
            </button>" . ' ' . "<button class='btn btn-danger btn-kecil hapus-$uri2' id='id' data-toggle='modal' data-id=" . $value['id_pocustomer'] . "><i class='fas fa-trash'></i></button>";
            $tbody[] = $aksi;
            $tbody[] = $value['pocustomer_no'];
            $tbody[] = $value['customer_cd'];
            $tbody[] = $value['customer_nm'];
            $tbody[] = $value['item_cd'];
            $tbody[] = $value['item_nm'];
            $tbody[] = $value['model_no'];
            $tbody[] = $value['qty'];
            $tbody[] = $value['unit'];
            $tbody[] = $value['created_by'];
            $tbody[] = $value['created_dt'];
            $tbody[] = $value['update_by'];
            $tbody[] = $value['update_dt'];
            $tbody[] = $value['note'];
            $data[] = $tbody;
        }

        if ($datapocustomer) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }


    /* Memproses data csv yang diimport */
    public function process()
    {
        if (isset($_POST['import'])) {

            $file = $_FILES['pocustomer']['tmp_name'];

            // Medapatkan ekstensi file csv yang akan diimport.
            $ekstensi  = explode('.', $_FILES['pocustomer']['name']);

            // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
            if (empty($file)) {
                echo 'File tidak boleh kosong!';
            } else {
                // Validasi apakah file yang diupload benar-benar file csv.
                if (strtolower(end($ekstensi)) === 'csv' && $_FILES["pocustomer"]["size"] > 0) {

                    $i = 0;
                    $handle = fopen($file, "r");
                    while (($row = fgetcsv($handle, 2048))) {
                        $i++;
                        if ($i == 1) continue;

                        // Data yang akan disimpan ke dalam databse
                        $data = [
                            'pocustomer_no' => $row[1],
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
                        $this->pocustomer_model->insertcsv($data);
                    }

                    fclose($handle);
                    redirect('marketing/pocustomer/input');
                } else {
                    echo 'Format file tidak valid!';
                }
            }
        }
    }




    public function hapuspocustomer()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->pocustomer_model->hapusdatapocustomer($id);
        redirect('marketing/pocustomer');
        echo json_encode($data);
    }
    public function hapuspodetail()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->uri->segment('4');

        $data = $this->pocustomer_model->hapuspodetail($id);
        redirect('marketing/pocustomer');
        echo json_encode($data);
    }

    public function formedit()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $id = $this->input->post('id');
        $data['dataperpocustomer'] = $this->pocustomer_model->datapocustomeredit($id);
        $this->load->view('marketing/v_pocustomer/formeditpocustomer', $data);
    }

    public function ubahpocustomer()
    {
        $objdata = array(
            //'nama_mahasiswa'=>$this->input->post('editnama'),
            //'alamat'=>$this->input->post('editalamat'),
            'pocustomer_cd'     => $this->input->post('e_pocustomer_cd'),
            'pocustomer_nm'     => $this->input->post('e_pocustomer_nm'),
            'update_by'   => $this->input->post('update_by'),
            'update_dt'   => $this->input->post('update_dt'),


        );

        $id = $this->input->post('id');
        $data = $this->pocustomer_model->ubahpocustomer($objdata, $id);

        echo json_encode($data);
    }


    /*multiple insert */
    public function input_data()
    {
        $result = array();
        foreach ($_POST['pocustomer_no'] as $key => $val) {
            $result[] = array(
                'pocustomer_no' => $_POST['pocustomer_no'][$key],
                'customer_cd' => $_POST['customer_cd'][$key],
                'customer_nm' => $_POST['customer_nm'][$key],
                'item_cd' => $_POST['item_cd'][$key],
                'item_nm' => $_POST['item_nm'][$key],
                'model_no' => $_POST['model_no'][$key],
                'qty' => $_POST['qty'][$key],
                'unit' => $_POST['unit'][$key],
                'created_by' => $_POST['created_by'][$key],
                'created_dt' => $_POST['created_dt'][$key],
                'note' => $_POST['note'][$key]
            );
        }
        $this->db->insert_batch('pocustomer', $result);
        redirect('marketing/pocustomer');
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

    public function save()
    {
        // metho post dibuat dalam 1 variabel
        $post = $this->input->post();
        $cust = $post['po_custcode'];
        //$custdata = $this->master_model->getcustomerbyid($cust);
        //$custcd = $custdata->customer_cd2;

        //generate nomor SO berdasarkan data yg di input
        //$sono = "SO-" . $post['po_jproses'] . "-" . $post['po_jprod'] . "-" . $cust . "-" . $this->pocustomer_model->newPOid() . "-" . date('m') . "-" . date('d', strtotime($post['po_delivdate'])) . "-" . date('m', strtotime($post['po_delivdate'])) . "-" . date('y', strtotime($post['po_delivdate']));
        $pono = $this->pocustomer_model->newPOid();
        //membuat array data untuk insert ke table socustomer
        $data = [
            "po_no" => $pono,
            "po_date" => date('Y-m-d'),
            "po_customerid" => $post['po_custcode'],
            "id_inquiry" => $post['id_inquiry'],
            "po_pono" => $post['po_pono'],
            "po_project" => $post['po_project'],
            "po_deliverydate" => $post['po_delivdate'],
            "po_proses" => $post['po_jproses'],
            "po_jenis" => $post['po_jprod'],
            "po_flex" => "0",
            "po_createdby" => $this->session->userdata('user_logged')->username,
            "po_created" => date('Y-m-d H:i:s')
        ];
        print_r($data);
        //insert data ke table socustomer
        $this->pocustomer_model->insertpocustomer($data);

        // processing data part SO 
        //tangkap semua inputan
        $itemcd = $post['po_partcode'];
        $itemnm = $post['po_partname'];
        $model = $post['po_model'];
        $qty = $post['po_qty'];
        $unit = $post['po_unit'];
        $delDT = $post['po_deldt'];
        $note = $post['po_note'];

        //membuat array untuk insert batch
        $datapart = array();
        foreach ($itemcd as $key => $itmcd) {
            $datapart[] = array(
                "pod_pono" => $pono,
                "pod_itemcode" => $itmcd,
                "pod_itemname" => $itemnm[$key],
                "pod_model" => $model[$key],
                "pod_qty" => $qty[$key],
                "pod_unit" => $unit[$key],
                "pod_deldt" => $delDT[$key],
                "pod_remark" => $note[$key],
                "pod_createdby" => $this->session->userdata('user_logged')->username,
                "pod_created" => date('Y-m-d H:i:s')
            );
        }
        print_r($datapart);
        //proses insert batch
        $this->pocustomer_model->insertdetail($datapart);

        //update flex inquiry
        $datainq = [
            "so_flex" => "1",
            "inquiry_status" => "2"
        ];
        $inqid = $post['po_inquiry'];
        $this->inquiry_model->ubahinquiry($datainq, $inqid);

        // set message succes
        $this->session->set_flashdata('success', 'Input berhasil!!');
        //redirect to po customer
        redirect('marketing/pocustomer');
    }

    public function addpodetail()
    {
        $pono = $this->pocustomer_model->newPOid();
        $pod_itemcode = $this->input->post('pod_itemcode');
        $pod_itemname = $this->input->post('pod_itemname');
        $pod_qty = $this->input->post('pod_qty');
        $pod_unit = $this->input->post('pod_unit');
        $pod_createdby = $this->input->post('pod_createdby');
        $pod_created = $this->input->post('pod_created');
        $pod_price = $this->input->post('pod_price');
        // $inquiry_detail_cby = $this->input->post('inquiry_detail_cby');
        // $drawing = $this->input->post('drawing');
        //$eng_approve = $this->input->post('eng_approve');
        //$inquiry_note = $this->input->post('inquiry_note');

        $addpodetail = array(
            // "pod_pono" => $pono,
            'pod_itemcode'        => $pod_itemcode,
            'pod_itemname'        => $pod_itemname,
            'pod_qty'        => $pod_qty,
            'pod_unit'        => $pod_unit,
            'pod_createdby'        => $pod_createdby,
            'pod_created'        => $pod_created,
            'pod_flex'        => '0',
            'pod_price'        => $pod_price,



        );
        // $data=$this->pocustomer_model->insertdetail($addinquirydetail);
        $data = $this->db->insert('podetail', $addpodetail);
        redirect('marketing/pocustomer');

        echo json_encode($data);
    }

    public function detail($id)
    {
        if (!isset($id)) show_404();

        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $data['poid'] = $id;
        $data['po'] = $this->pocustomer_model->getbyno($id);
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_pocustomer/detail_po', $data);
        $this->load->view('templete/js');
    }

    public function getdatapartbypo()
    {
        $no = $this->input->get('pono');
        $data = $this->pocustomer_model->getdetailpart($no);
        echo json_encode($data);
    }


    // add PO tanpa inquiry

    public function addpo_noinquiry()
    {
        // metho post dibuat dalam 1 variabel
        $post = $this->input->post();
        $cust = $post['po_custcode'];


        $pono = $this->pocustomer_model->newPOid();
        $data = [
            "po_no" => $pono,
            "po_date" => date('Y-m-d'),
            "po_customerid" => $post['po_custcode'],
            // "id_inquiry" => $post['id_inquiry'],
            "po_pono" => $post['po_pono'],
            "po_project" => $post['po_project'],
            "po_deliverydate" => $post['po_delivdate'],
            "po_proses" => $post['po_jproses'],
            "po_jenis" => $post['po_jprod'],
            "po_flex" => "0",
            "po_createdby" => $this->session->userdata('user_logged')->username,
            "po_created" => date('Y-m-d H:i:s')
        ];
        print_r($data);
        //insert data ke table socustomer
        $this->pocustomer_model->insertpocustomer($data);

        $user = $this->session->userdata('user_logged')->username;
        $objdata = array(
            'pod_pono' => $pono,
            'pod_flex' => 1
        );
        $this->pocustomer_model->updatepocustomerdetail($objdata, $user);
        // set message succes
        $this->session->set_flashdata('success', 'Input berhasil!!');
        //redirect to po customer
        redirect('marketing/pocustomer');
    }
}
