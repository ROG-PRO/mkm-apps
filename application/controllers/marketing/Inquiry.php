<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inquiry extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model('inquiry_model');
        $this->load->model('quotation_model');
        $this->load->model('estimationcost_model');
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {

        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => $uri2,
            'inquiry_cd' => $this->inquiry_model->getKodeInquiry(),
            'customer' => $this->inquiry_model->select_customer()->result(),
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_inquiry/tampil_inquiry', $data);
        $this->load->view('marketing/v_inquiry/ajaxcrud_inquiry', $data);
        $this->load->view('templete/js');
    }
    public function canceledinquiry()
    {

        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => $uri2,
            'inquiry_cd' => $this->inquiry_model->getKodeInquiry(),
            'customer' => $this->inquiry_model->select_customer()->result(),
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_inquiry/tampil_canceled_inquiry', $data);
        $this->load->view('marketing/v_inquiry/ajaxcrud_inquiry', $data);
        $this->load->view('templete/js');
    }

    public function test()
    {
    }

    public function datainquiry()
    {
        $uri2 = $this->uri->segment(2);
        $datainquiry = $this->inquiry_model->getdatainquiry();
        $no = 1;
        foreach ($datainquiry as $value) {
            $tbody = array();
            $tbody[] = $no++;
            if ($value['eng_approve'] == '0') {
                $tbody[] = "<a href='" . base_url('marketing/inquiry/inquiry_detail/' .  $value['id_inquiry'] . ' ') . "' class='btn btn-info btn-xs' ><i class='fa fa-search'></i>
            </a>";
            } else {
                $tbody[] = "<a href='" . base_url('marketing/inquiry/estimation_detail/' .  $value['id_inquiry'] . ' ') . "' class='btn btn-info btn-xs'  ><i class='fas fa-search'></i> </a>";
            };

            $tbody[] = $value['id_inquiry'];
            $tbody[] = $value['cust_cd'];
            $tbody[] = $value['inquiry_created_by'];
            $tbody[] = $value['inquiry_created_dt'];
            // $tbody[] = $value['quotation_price'];
            if ($value['eng_approve'] == '0') {
                $tbody[] = '<span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true" ></i></span> not estimate';
            } else {
                $tbody[] = '<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></span> estimated';
            }
            // $tbody[] = "<a href='" . base_url() . "drawing/" . $value['drawing'] . "'   target='_blank' class ='btn btn-default btn-xs'><i class='fa fa-eye'></i> View </a>";

            // if ($value['eng_approve'] == '0') {
            //     $tbody[] = "";
            // } else {
            //     $create = "<button class='btn btn-default btn-sm create-quotation' data-toggle='modal'  data-id=" . $value['id_inquiry'] . "><i class='fas fa-edit'></i> Create
            //     </button>";
            //     $tbody[] = $create;
            // }
            // if ($value['quotation_flex'] == '0') {
            //     $tbody[] = "";
            // } else {    
            //     $tbody[] = "<a href='" . base_url('marketing/inquiry/print_quotation/' . $value['id_inquiry'] . '') . "' target='_blank' class='btn btn-default btn-xs' ><i class='fa fa-print' ></i> </a>";
            // }
            $tbody[] = $value['eng_app_dt'];
            // $tbody[] = $value['inquiry_cancel'];
            if ($value['inquiry_status2'] == '0') {
                $tbody[] = '<span class="badge badge-warning">Canceled </span>';
            } else if ($value['inquiry_status2'] == '1') {
                $tbody[] = '<span class="badge badge-primary">Continue </span>';
            } else {
                $tbody[] = '';
            }
            $tbody[] = $value['inquiry_note'];
            if ($value['inquiry_status'] == 0) {
                $tbody[] = "<span class='badge badge-success'>Inquiry</span>-<span class='badge badge-secondary'>Quotation</span>-<span class='badge badge-secondary'>PO</span>-<span class='badge badge-secondary'>SO</span>";
            } elseif ($value['inquiry_status'] == 1) {
                $tbody[] = "<span class='badge badge-secondary'>Inquiry</span>-<span class='badge badge-success'>Quotation</span>-<span class='badge badge-secondary'>PO</span>-<span class='badge badge-secondary'>SO</span>";
            } elseif ($value['inquiry_status'] == 2) {
                $tbody[] = "<span class='badge badge-secondary'>Inquiry</span>-<span class='badge badge-secondary'>Quotation</span>-<span class='badge badge-success'>PO</span>-<span class='badge badge-secondary'>SO</span>";
            } elseif ($value['inquiry_status'] == 3) {
                $tbody[] = "<span class='badge badge-secondary'>Inquiry</span>-<span class='badge badge-secondary'>Quotation</span>-<span class='badge badge-secondary'>PO</span>-<span class='badge badge-success'>SO</span>";
            }
            $aksi = "<!--<button class='btn btn-outline-info btn-sm ubah-$uri2' data-toggle='modal' data-id=" . $value['id_inquiry'] . "><i class='fas fa-edit'></i>
            </button>-->" . ' ' . "<button class='btn btn-danger btn-sm hapus-$uri2' id='id' data-toggle='modal' data-id=" . $value['id_inquiry'] . "><i  class='fas fa-trash-alt'></i></button>";
            // $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datainquiry) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function estimation_detail()
    {

        $id = $this->uri->segment('4');
        $data = array(
            'title' => $id,
            'quotation_no' => $this->quotation_model->getKodeQuotation(),
            'detailpartinquiry' => $this->quotation_model->getdetailpartinquiry($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'total_amount' => $this->estimationcost_model->jo_grcosttotal($id),
            'tot_quot_price' => $this->quotation_model->sumQuotation_price($id),
            'dataquoedit' => $this->quotation_model->dataquoedit($id),

        );

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_inquiry/detail_estimation', $data);
        $this->load->view('templete/js');
    }


    // Menampilkan form create new inquiry
    public function createinquiry()
    {
        $id = $this->inquiry_model->getKodeInquiry();
        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => $uri2,
            'action'  => site_url('marketing/inquiry/process'),
            'inquiry_cd' => $this->inquiry_model->getKodeInquiry(),
            'customer' => $this->inquiry_model->select_customer()->result(),
            'unit' => $this->inquiry_model->select_unit()->result(),
            'detailinquiry' => $this->inquiry_model->detailinquiry($id)
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_inquiry/new_inquiry', $data);
        $this->load->view('marketing/v_inquiry/ajaxcrud_inquiry', $data);
        // $this->load->view('templete/js');
        //print_r($data);print_r($id);
    }


    /* Memproses data csv yang diimport */
    public function process()
    {
        if (isset($_POST['import'])) {

            $file = $_FILES['inquiry']['tmp_name'];

            // Medapatkan ekstensi file csv yang akan diimport.
            $ekstensi  = explode('.', $_FILES['inquiry']['name']);

            // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
            if (empty($file)) {
                echo 'File tidak boleh kosong!';
            } else {
                // Validasi apakah file yang diupload benar-benar file csv.
                if (strtolower(end($ekstensi)) === 'csv' && $_FILES["inquiry"]["size"] > 0) {

                    $i = 0;
                    $handle = fopen($file, "r");
                    while (($row = fgetcsv($handle, 2048))) {
                        $i++;
                        if ($i == 1) continue;

                        // Data yang akan disimpan ke dalam databse
                        $data = [
                            'inq_part_no' => $row[1],
                            'inq_part_nm' => $row[2],
                            'inq_qty' => $row[3],
                            'inq_nm_unit' => $row[4],
                            'inq_drawing' => $row[5],
                            'flex_1' => $row[6],
                            'inquiry_detail_cdt' => $row[7],
                            'inquiry_detail_cby' => $row[8],
                        ];

                        // Simpan data ke database.
                        $this->inquiry_model->insertcsv($data);
                    }

                    fclose($handle);
                    redirect('marketing/inquiry/createinquiry');
                } else {
                    echo 'Format file tidak valid!';
                }
            }
        }
    }

    // Input inquiry part detail
    public function addinquirydetail()
    {

        $id_inquiry = $this->input->post('id_inquiry');
        $part_no = $this->input->post('part_no');
        $part_nm = $this->input->post('part_nm');
        $nm_unit = $this->input->post('nm_unit');
        $qty = $this->input->post('qty');
        $inquiry_detail_cdt = $this->input->post('inquiry_detail_cdt');
        $inquiry_detail_cby = $this->input->post('inquiry_detail_cby');
        $drawing = $this->input->post('drawing');
        $incld_mtl = $this->input->post('incld_mtl');
        //$eng_approve = $this->input->post('eng_approve');
        //$inquiry_note = $this->input->post('inquiry_note');

        $addinquirydetail = array(
            'id_inquiry'        => $id_inquiry,
            'inq_part_no'        => $part_no,
            'inq_part_nm'        => $part_nm,
            'inq_nm_unit'        => $nm_unit,
            'inquiry_detail_cdt'        => $inquiry_detail_cdt,
            'inquiry_detail_cby'        => $inquiry_detail_cby,
            'inq_qty'        => $qty,
            'flex_1'        => '0',
            'inq_drawing'        => $drawing,
            'inq_incld_mtl'        => $incld_mtl,



        );
        $data = $this->db->insert('log_inquiry_detail', $addinquirydetail);
        redirect('marketing/inquiry/createinquiry');

        echo json_encode($data);
    }

    public function templete_inquiry()
    {
        force_download('data/inquiry.csv', NULL);
    }


    public function inquiry_detail()
    {

        $id = $this->uri->segment('4');
        // $data_inq = $this->inquiry_model->getinquirybyid($id);
        $data = array(
            'title' => $id,
            'detailpartinquiry2' => $this->estimationcost_model->getdetailpartinquiry2($id),
            'detailinquiry' => $this->estimationcost_model->getDetailInquiry($id),
            'datainquiry' => $this->inquiry_model->get_DataInquiry($id),
            'total_amount' => $this->estimationcost_model->jo_costtotal($id),


        );


        $this->load->view('templete/header', $data);
        // $this->load->view('templete/sidebar');
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_inquiry/detail_inquiry_view', $data);
        $this->load->view('templete/js');
    }

    public function inquiry_detail_edit()
    {

        $id = $this->uri->segment('4');
        $data = array(
            'title' => $id,
            'detailpartinquiry2' => $this->estimationcost_model->getdetailpartinquiry2($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'total_amount' => $this->estimationcost_model->jo_costtotal($id),

        );

        $this->load->view('templete/header', $data);

        // $this->load->view('templete/sidebar');
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_inquiry/detail_inquiry_edit', $data);
        $this->load->view('marketing/v_inquiry/ajaxcrud_inquiry', $data);
        $this->load->view('templete/js');
    }



    public function addinquiry()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $id_inquiry = $this->input->post('id_inquiry');

        $addinquiry = array(
            'id_inquiry'        => $id_inquiry,
            'cust_cd'        => $this->input->post('cust_cd'),
            'inquiry_created_dt'        => $this->input->post('created_dt'),
            'inquiry_created_by'        => $this->input->post('created_by'),
            'eng_approve'        => '0',
            'inquiry_status'        => '',
            'quotation_flex'        => '0',
            'inquiry_note' => $this->input->post('inquiry_note'),
            'information_by' => $this->input->post('information_by'),
            'inquiry_custno' => $this->input->post('inquiry_custno'),
            'email' => $this->input->post('email'),
            'email_from' => $this->input->post('email_from'),
            'nm_reff' => $this->input->post('nm_reff'),
            'no_telp' => $this->input->post('no_telp'),
            'nm_contact' => $this->input->post('nm_contact'),
            'project_nm' => $this->input->post('project_nm'),

        );
        $this->db->insert('log_inquiry', $addinquiry);

        $tambahinquiry2eng = array(
            'id_inquiry'        => $id_inquiry,
            'esti_status'        => '0',
        );

        $this->db->insert('estimation_cost', $tambahinquiry2eng);

        // echo json_encode($data1, $data2);

        $data = array(
            'id_inquiry'        => $id_inquiry,
            'flex_1'        => '1',
        );

        $this->inquiry_model->updateinquirydetail($data);

        redirect('marketing/inquiry');
    }


    public function hapusinquiry()
    {
        // id yang telah diparsing pada ajax ajaxcrud_.php data{id:id}
        // $id = $this->input->post('id');
        $id = $this->uri->segment('4');

        $this->estimationcost_model->hapusdataestimationcost($id);
        $this->inquiry_model->hapusdatainquiry($id);
        $this->inquiry_model->hapusalldatainquirydetail($id);
        // echo json_encode($data,$data2);
        redirect('marketing/inquiry');
    }
    public function hapusinquirydetail()
    {

        $id = $this->uri->segment('4');

        $data = $this->inquiry_model->hapusdatainquirydetail($id);
        redirect('marketing/inquiry/createinquiry');
        // echo json_encode($data);
    }

    public function Update_sts_inquiry()
    {
        $user = $this->session->userdata('user_logged')->fullname;
        $today = date("Y-m-d H:i:s");
        // id yang telah diparsing pada ajax ajaxcrud_.php data{id:id}
        // $id = $this->input->post('id');
        $data = array(
            // 'id_inquiry'        => $id,
            'inquiry_status2'        => $this->input->post('inquiry_status'),
            'inquiry_update_dt'        => $today,
            'inquiry_update_by'        => $user,
            'inquiry_note' => $this->input->post('inquiry_note'),


        );
        $id = $this->input->post('id_inquiry');
        $this->inquiry_model->cancelinquiry($data, $id);
        // $this->inquiry_model->cancelinquirydetail($id);
        // echo json_encode($data,$data2);
        redirect('marketing/inquiry');
    }

    public function formcreatequotation()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $uri2 = $this->uri->segment(2);
        $id = $this->input->post('id');
        $data =  array(
            'title' => $uri2,
            'dataperinquiry' => $this->inquiry_model->datainquiryedit($id),
        );
        //print_r($data);
        $this->load->view('marketing/v_inquiry/formcreatequotation', $data);
    }

    // inquiry detail form

    function add_inquiry_detail()
    {
        echo json_encode(
            array(
                "id" => $this->inquiry_model->create()
            )
        );
    }

    function update_inquiry_detail()
    {
        $id = $this->input->post("id");
        $value = $this->input->post("value");
        $modul = $this->input->post("modul");
        $this->inquiry_model->update($id, $value, $modul);
        echo "{}";
    }

    function delete_inquiry_detail()
    {

        $id = $this->input->post('id');
        $this->inquiry_model->delete($id);
        echo "{}";
    }
}
