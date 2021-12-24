<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotation extends CI_Controller
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
            'inquiry_cd' => $this->quotation_model->getKodeInquiry(),
            'customer' => $this->inquiry_model->select_customer()->result(),
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_quotation/tampil_quotation', $data);
        $this->load->view('marketing/v_quotation/ajaxcrud_quotation', $data);
        $this->load->view('templete/js');
    }

    public function CreateQuo()
    {

        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => 'addquotation',
            'inquiry_cd' => $this->quotation_model->getKodeInquiry(),
            'customer' => $this->inquiry_model->select_customer()->result(),
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_quotation/create_quotation', $data);
        $this->load->view('marketing/v_quotation/ajaxcrud_addquotation', $data);
        $this->load->view('templete/js');
    }

    public function dataquotation()
    {
        $uri2 = $this->uri->segment(2);
        $dataquotation = $this->quotation_model->getdataquotation();
        $no = 1;
        foreach ($dataquotation as $value) {
            $tbody = array();
            $tbody[] = $no++;
            if ($value['inquiry_status'] == '0') {
                $tbody[] = "<a href='" . base_url('marketing/quotation/quotation_detail/' .  $value['id_inquiry'] . ' ') . "' class='btn btn-warning  btn-xs'  >Create Quo
                </a>";
            } else {
                $tbody[] = "<a href='" . base_url('marketing/quotation/quotation_detail/' .  $value['id_inquiry'] . ' ') . "' class='btn btn-info btn-xs' >Quo detail
                </a>";
            }

            $tbody[] = $value['quotation_no'];
            $tbody[] = $value['id_inquiry'];
            $tbody[] = $value['cust_cd'];

            $tbody[] = $value['q_update_by'];
            $tbody[] = $value['q_update_dt'];
            $tbody[] = $value['q_note'];
            $value['q_approved_sts'] == '1' ?
                $tbody[] = "<span class='badge badge-success'>Yes</span>" :
                $tbody[] = "<span class='badge badge-secondary'>No</span>";
            if ($value['inquiry_status'] == 0) {
                $tbody[] = "<span class='badge badge-success'>Inquiry</span>-<span class='badge badge-secondary'>Quotation</span>-<span class='badge badge-secondary'>PO</span>-<span class='badge badge-secondary'>SO</span>";
            } elseif ($value['inquiry_status'] == 1) {
                $tbody[] = "<span class='badge badge-secondary'>Inquiry</span>-<span class='badge badge-success'>Quotation</span>-<span class='badge badge-secondary'>PO</span>-<span class='badge badge-secondary'>SO</span>";
            } elseif ($value['inquiry_status'] == 2) {
                $tbody[] = "<span class='badge badge-secondary'>Inquiry</span>-<span class='badge badge-secondary'>Quotation</span>-<span class='badge badge-success'>PO</span>-<span class='badge badge-secondary'>SO</span>";
            } elseif ($value['inquiry_status'] == 3) {
                $tbody[] = "<span class='badge badge-secondary'>Inquiry</span>-<span class='badge badge-secondary'>Quotation</span>-<span class='badge badge-secondary'>PO</span>-<span class='badge badge-success'>SO</span>";
            }
            $data[] = $tbody;
        }

        if ($dataquotation) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function dataaddquotation()
    {
        $uri2 = $this->uri->segment(2);
        $dataaddquotation = $this->quotation_model->getaddquotation();
        $no = 1;
        foreach ($dataaddquotation as $value) {
            $tbody = array();
            $tbody[] = $no++;
            if ($value['eng_approve'] == '0') {
                $tbody[] = "<a href='" . base_url('marketing/quotation/quotation_detail_man/' .  $value['id_inquiry'] . ' ') . "' class='btn btn-warning  btn-sm'><i class='fas fa-search'></i> </font>
                </a>";
            } else {
                $tbody[] = "<a href='" . base_url('marketing/quotation/quotation_detail_man/' .  $value['id_inquiry'] . ' ') . "' class='btn btn-info btn-sm' ><i class='fas fa-search'></i>
                </a>";
            }

            $tbody[] = $value['quotation_no'];
            $tbody[] = $value['id_inquiry'];

            if ($value['inquiry_status'] == 0) {
                $tbody[] = "Inquiry";
            } elseif ($value['inquiry_status'] == 1) {
                $tbody[] = "Quotation";
            } elseif ($value['inquiry_status'] == 2) {
                $tbody[] = "PO";
            } elseif ($value['inquiry_status'] == 3) {
                $tbody[] = "SO";
            }

            $tbody[] = $value['cust_cd'];
            $tbody[] = $value['q_update_by'];
            $tbody[] = $value['q_update_dt'];
            $tbody[] = $value['q_note'];

            $data[] = $tbody;
        }

        if ($dataaddquotation) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }




    public function quotation_detail()
    {
        // if (isset($_POST['id_inquiry'])) {

        //     $id = $this->input->post('id_inquiry');
        // } else {

        $id = $this->uri->segment('4');
        // }
        $data = array(
            'title' => $id,
            'quotation_no' => $this->quotation_model->getKodeQuotation(),
            'detailpartinquiry' => $this->quotation_model->getdetailpartinquiry($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'total_amount' => $this->estimationcost_model->jo_costtotal($id),
            'tot_quot_price' => $this->quotation_model->sumQuotation_price($id),
            'dataquoedit' => $this->quotation_model->dataquoedit($id),

        );

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_quotation/detail_quotation', $data);
        $this->load->view('templete/js');
    }
    public function quotation_detail_man()
    {

        $id = $this->uri->segment('4');
        $data = array(
            'title' => $id,
            'quotation_no' => $this->quotation_model->getKodeQuotation(),
            'detailpartinquiry' => $this->quotation_model->getdetailpartinquiry($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'total_amount' => $this->estimationcost_model->jo_costtotal($id),
            'tot_quot_price' => $this->quotation_model->sumQuotation_price($id),
            'dataquoedit' => $this->quotation_model->dataquoedit($id),

        );

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_quotation/detail_quotation_man', $data);
        $this->load->view('templete/js');
    }

    public function createnewquo()
    {
        $id = $this->inquiry_model->getKodeInquiry();
        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => $uri2,
            'action'  => site_url('marketing/quotation/process'),
            'quotation_cd' => $this->quotation_model->getKodeQuotation(),
            'customer' => $this->inquiry_model->select_customer()->result(),
            'unit' => $this->inquiry_model->select_unit()->result(),
            'detailinquiry' => $this->inquiry_model->detailinquiry($id)
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_quotation/new_quotation', $data);
        $this->load->view('marketing/v_quotation/ajaxcrud_quotation', $data);
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



    public function createquotation()
    {
        $user = $this->session->userdata('user_logged')->fullname;
        $today = date("Y-m-d H:i:s");
        $objdata = array(
            'quotation_no' => $this->quotation_model->getKodeQuotation(),
            'subject'     => $this->input->post('subject'),
            'cust_reff'   => $this->input->post('cust_reff'),
            'attention'   => $this->input->post('attention'),
            'job'   => $this->input->post('job'),
            'validity_price'   => $this->input->post('validity_price'),
            'excluded'   => $this->input->post('excluded'),
            'payment_term'   => $this->input->post('payment_term'),
            'working_schedule'   => $this->input->post('working_schedule'),
            'quotation_flex'        => '1',
            'qty'        => $this->input->post('qty'),
            'inquiry_status'        => '1',
            'q_update_dt' => $today,
            'q_update_by' => $user,
            'q_note' => $this->input->post('q_note'),
            // 'q_approved_by' => $this->input->post('q_approved_by'),
            // 'q_approved_phone' => $this->input->post('q_approved_phone'),
            // 'q_approved_at' =>date("Y-m-d H:i:s"),
            'so_flex' => '0',

        );
        $id = $this->input->post('id_inquiry');
        //print_r($objdata);
        //print_r($id);

        $this->inquiry_model->updateinquiry($objdata, $id);


        // $data = array(
        //     'profit_percent' => $this->input->post('profit_percent'),
        //     'transport_percent' =>  $this->input->post('transport_percent'),
        // );
        // $this->inquiry_model->updateprofit_percent($data, $id);
        //echo json_encode($data);
        //$this->inquiry_model->ubahinquiry('log', $data);
        redirect('marketing/quotation/quotation_detail/' . $id . '');
    }


    public function updatequotation()
    {
        $user = $this->session->userdata('user_logged')->fullname;
        $today = date("Y-m-d H:i:s");
        $objdata = array(
            // 'quotation_no' => $this->quotation_model->getKodeQuotation(),
            'subject'     => $this->input->post('subject'),
            'cust_reff'   => $this->input->post('cust_reff'),
            'attention'   => $this->input->post('attention'),
            'job'   => $this->input->post('job'),
            'validity_price'   => $this->input->post('validity_price'),
            'excluded'   => $this->input->post('excluded'),
            'payment_term'   => $this->input->post('payment_term'),
            'working_schedule'   => $this->input->post('working_schedule'),
            // 'quotation_flex'        => '1',
            'qty'        => $this->input->post('qty'),
            // 'inquiry_status'        => '1',
            'q_update_dt' => $today,
            'q_update_by' => $user,
            'q_note' => $this->input->post('q_note'),
            // 'q_approved_by' => $this->input->post('q_approved_by'),
            // 'q_approved_phone' => $this->input->post('q_approved_phone'),


        );
        $qNo = $this->input->post('quo_no');
        $id = $this->input->post('id_inquiry');
        //print_r($objdata);
        //print_r($id);

        $this->quotation_model->updatequotation($objdata, $qNo);

        redirect('marketing/quotation/quotation_detail/' . $id . '');
    }

    public function print_quotation()
    {
        $id = $this->uri->segment('4');
        $uri2 = $this->uri->segment('2');
        $data = array(
            'title' => $uri2,
            'detailinquiry' => $this->inquiry_model->datainquiryedit($id),
            'detailpartinquiry' => $this->quotation_model->getDetailprintQuo($id),
            'tot_quot_price' => $this->quotation_model->sumprintQuotation_price($id),
        );
        $this->load->view('templete/head_print', $data);
        $this->load->view('marketing/v_quotation/print_quotation', $data);
        // $this->load->view('marketing/v_quotation/print_quotation_p', $data);
        //$this->load->view('templete/js');

    }
    public function print_quotation_p()
    {
        $id = $this->uri->segment('4');
        $uri2 = $this->uri->segment('2');
        $data = array(
            'title' => $uri2,
            'detailinquiry' => $this->inquiry_model->datainquiryedit($id),
            'detailpartinquiry' => $this->quotation_model->getDetailprintQuo($id),
            'tot_quot_price' => $this->quotation_model->sumprintQuotation_price($id),
        );
        $this->load->view('templete/head_print', $data);
        $this->load->view('marketing/v_quotation/print_quotation_p', $data);
        //$this->load->view('templete/js');

    }
    public function print_quotation_d()
    {
        $id = $this->uri->segment('4');
        $data = array(
            'title' => $id,
            'quotation_no' => $this->quotation_model->getKodeQuotation(),
            'detailpartinquiry' => $this->quotation_model->getdetailpartinquiryPRINT($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'total_amount' => $this->estimationcost_model->jo_costtotal($id),
            //'tot_quot_price' => $this->quotation_model->sumQuotation_price($id),
            'dataquoedit' => $this->quotation_model->dataquoedit($id),
            'tot_quot_price' => $this->quotation_model->sumprintQuotation_price($id),

        );
        $this->load->view('templete/head_print', $data);
        $this->load->view('marketing/v_quotation/print_quotation_d', $data);
        //$this->load->view('templete/js');

    }
    public function print_drawing()
    {
        $id = $this->uri->segment('4');
        $data = array(
            'title' => $id,
            'quotation_no' => $this->quotation_model->getKodeQuotation(),
            'detailpartinquiry' => $this->quotation_model->getdetailpartinquiryPRINT($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            // 'total_amount' => $this->estimationcost_model->jo_costtotal($id),
            //'tot_quot_price' => $this->quotation_model->sumQuotation_price($id),
            // 'dataquoedit' => $this->quotation_model->dataquoedit($id),
            // 'tot_quot_price' => $this->quotation_model->sumprintQuotation_price($id),

        );
        $this->load->view('templete/head_print', $data);
        $this->load->view('marketing/v_quotation/print_drawing', $data);
        //$this->load->view('templete/js');

    }
    public function print_Attachment()
    {
        $id = $this->uri->segment('4');
        $uri2 = $this->uri->segment('2');
        $data = array(
            'title' => $uri2,
            'detailinquiry' => $this->inquiry_model->datainquiryedit($id),
            'detailpartinquiry' => $this->quotation_model->getDetailprintQuo($id),
            'tot_quot_price' => $this->quotation_model->sumprintQuotation_price($id),
        );
        $this->load->view('templete/head_print', $data);
        $this->load->view('marketing/v_quotation/print_attachment', $data);
        //$this->load->view('templete/js');

    }

    public function update_qNote()
    {
        $objdata['q_note'] = $this->input->post('q_note');
        $id = $this->input->post('id_inquiry');
        $this->quotation_model->updateinquiry($objdata, $id);
        redirect('marketing/quotation');
    }

    public function update_qPrintSts()
    {
        $id = $this->uri->segment('4');
        $data = array(
            'q_print_sts' => '1',
            'q_print_dt' => date("Y-m-d H:i:s"),

        );
        $this->quotation_model->update_q_print($data, $id);
        redirect('marketing/quotation/print_quotation/' . $id . '');
    }

    public function cancel_quotation()
    {
        $id = $this->uri->segment('4');

        date_default_timezone_set('Asia/Jakarta');
        $user = $this->session->userdata('user_logged')->username;
        $today = date("Y-m-d H:i:s");
        $id = $this->uri->segment('4');

        $data = array(
            'quo_print_flex' => '0',
            'id_inquiry' => $this->uri->segment('4'),
            'eng_app_dt' => $today,

        );

        $objdata = array(
            'inquiry_status' => '0',
            'quotation_no' => '',
            'subject'     => '',
            'cust_reff'   => '',
            'attention'   => '',
            'job'   => '',
            'validity_price'   => '',
            'excluded'   => '',
            'payment_term'   => '',
            'working_schedule'   => '',
            'quotation_flex'        => '0',
            'qty'        => '',
            'inquiry_status'        => '0',
            'q_update_dt' => '',
            'q_update_by' => '',
            'q_note' => '',
            // 'esti_update_dt' => $today,
            // 'esti_update_by' => $user,
        );


        $this->quotation_model->updateinquiry($objdata, $id);
        // $this->estimationcost_model->updateestimationsts($objdata,$id);
        // print_r($data);


        redirect('marketing/quotation/quotation_detail/' . $id . '');
    }

    // inquiry detail form

    // function add_inquiry_detail(){
    // 	echo json_encode(
    //         array(
    //             "id"=>$this->inquiry_model->create()
    //         )
    //     );
    // }

    function update_inquiry_detail()
    {
        $id = $this->input->post("id");
        $value = $this->input->post("value");
        $modul = $this->input->post("modul");
        $this->quotation_model->update($id, $value, $modul);
        echo "{}";
    }

    function quo_print_yes()
    {
        $id_inq = $this->uri->segment('5');
        $id_inq_detail = $this->uri->segment('4');
        $objdata = array(
            'quo_print_flex' => '1',

        );


        $this->db->where('id_inquiry_detail', $id_inq_detail);
        $this->db->update('log_inquiry_detail', $objdata);


        redirect('marketing/quotation/quotation_detail/' . $id_inq . '');
    }

    function quo_print_no()
    {
        $id_inq = $this->uri->segment('5');
        $id_inq_detail = $this->uri->segment('4');
        $objdata = array(
            'quo_print_flex' => '0',

        );


        $this->db->where('id_inquiry_detail', $id_inq_detail);
        $this->db->update('log_inquiry_detail', $objdata);


        redirect('marketing/quotation/quotation_detail/' . $id_inq . '');
    }

    // 2021-Des-5
    // menambahkan update untuk approve quotation yang akan di print
    // menambahkan field 'q_approved_by,q_approved_phone & q_approved_dt' pada table log_inquiry
    function approvequotation()
    {
        $data = array(
            'q_approved_by' => $this->input->post('q_approved_by'),
            'q_approved_phone' => $this->input->post('q_approved_phone'),
            'q_approved_at' => date("Y-m-d H:i:s"),
            'q_approved_sts' => '1'
        );

        $quoNo = $this->input->post('quoNo');
        $inqNo = $this->input->post('inqNo');

        // $id_inq = $this->uri->segment('4');
        // $qNo = $this->uri->segment('5');
        $this->db->where('quotation_no', $quoNo);
        $this->db->update('log_inquiry', $data);

        redirect('marketing/quotation/quotation_detail/' . $inqNo . '');
    }

    function selectinquiry()
    {
        // $inquiryNo = $this->quotation_model->getinquiryno();/
        $uri3 = $this->uri->segment('3');
        $data = array(
            'title' => $uri3,
            'inquiryNo' => $this->quotation_model->getinquiryno()
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('marketing/v_quotation/formselect_inquiry', $data);
        $this->load->view('templete/js');
    }
}
