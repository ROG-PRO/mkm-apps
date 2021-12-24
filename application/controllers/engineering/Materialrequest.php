<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MaterialRequest extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model('inquiry_model');
        $this->load->model('master_model');
        $this->load->model('estimationcost_model');
        $this->load->model('pocustomer_model');
        $this->load->model('materialrequest_model');
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {

        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => $uri2,
            // 'inquiry_cd' => $this->inquiry_model->getKodeInquiry(),
            'customer' => $this->inquiry_model->select_customer()->result(),
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_materialrequest/tampil_materialrequest', $data);
        $this->load->view('engineering/v_materialrequest/ajaxcrud_materialrequest', $data);
        $this->load->view('templete/js');
    }



    public function input_mr()
    {

        $sono = $this->input->post('so_number');
        if (isset($sono)) {
            $so_number = $sono;
        } else {
            $so_number = $this->uri->segment(4);
        }

        // $data['inquiry'] = $this->inquiry_model->getinquirybyid($inq);
        $data = array(
            'sodetail' => $this->materialrequest_model->sodetailbypart($so_number),
            'mrDate' => $this->input->post('mr_date'),
            'mr_no' => $this->materialrequest_model->getKodeMr(),
            'so_number' =>  $so_number,
            'mtltype' => $this->materialrequest_model->select_kodemtltype()->result(),
            'detailmr' => $this->materialrequest_model->detailmr_wtsop()
        );
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        //$this->load->view('templete2/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_materialrequest/inputmr', $data);
        $this->load->view('templete/js');
    }

    public function input_mr1()
    {

        $sono = $this->input->post('so_number');
        if (isset($sono)) {
            $so_number = $sono;
        } else {
            $so_number = $this->uri->segment(4);
        }

        // $data['inquiry'] = $this->inquiry_model->getinquirybyid($inq);
        $data = array(
            'mrdetail' => $this->materialrequest_model->mrdetail_rm($so_number),
            'mrDate' => $this->input->post('mr_date'),
            'mr_no' => $this->materialrequest_model->getKodeMr(),
            'so_number' =>  $so_number,
            'mtltype' => $this->materialrequest_model->select_kodemtltype()->result(),
            'detailmr' => $this->materialrequest_model->detailmr_wtsop()
        );
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        //$this->load->view('templete2/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_materialrequest/inputmr_view', $data);
        $this->load->view('templete/js');
    }

    public function input_mrTools()
    {
        $so_number = $this->uri->segment('4');
        // $data['inquiry'] = $this->inquiry_model->getinquirybyid($inq);
        $data = array(
            'sodetail' => $this->materialrequest_model->sodetailbypart($so_number),
            'mrDate' => $this->input->post('mr_date'),
            'mr_no' => $this->materialrequest_model->getKodeMr(),
            'so_number' =>  $so_number,
            'mtltype' => $this->materialrequest_model->select_kodemtltype()->result(),
            'detailmr' => $this->materialrequest_model->detailmr_wsop(),
            'tools' => $this->estimationcost_model->select_tools()->result()
        );
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        //$this->load->view('templete2/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_materialrequest/inputmr_tools', $data);
        $this->load->view('templete/js');
    }

    public function input_mrOthers()
    {
        $so_number = $this->uri->segment('4');
        // $data['inquiry'] = $this->inquiry_model->getinquirybyid($inq);
        $data = array(
            'sodetail' => $this->materialrequest_model->sodetailbypart($so_number),
            // 'mrDate' => $this->input->post('mr_date'),
            // 'mr_no' => $this->materialrequest_model->getKodeMr(),
            'so_number' =>  $so_number,
            // 'mtltype' => $this->materialrequest_model->select_kodemtltype()->result(),
            'detailmrdesc' => $this->materialrequest_model->detailmr_others()
        );
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        //$this->load->view('templete2/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_materialrequest/inputmr_others', $data);
        $this->load->view('templete/js');
    }

    public function savemr_wsop()
    {
        // metho post dibuat dalam 1 variabel
        $post = $this->input->post();
        // $cust = $post['po_custcode'];
        //$custdata = $this->master_model->getcustomerbyid($cust);
        //$custcd = $custdata->customer_cd2;

        //generate nomor SO berdasarkan data yg di input
        //$sono = "SO-" . $post['po_jproses'] . "-" . $post['po_jprod'] . "-" . $cust . "-" . $this->pocustomer_model->newPOid() . "-" . date('m') . "-" . date('d', strtotime($post['po_delivdate'])) . "-" . date('m', strtotime($post['po_delivdate'])) . "-" . date('y', strtotime($post['po_delivdate']));
        // $pono = $this->pocustomer_model->newPOid();
        $so_number = $this->input->post('so_number');
        $mr_note = $this->input->post('mr_note');
        $mr_no = $this->materialrequest_model->getKodeMr();

        $data = [
            // 'mr_no'         => $mr_no,
            'so_number'     => $so_number,
            'mr_status'     => '0',
            'mr_dt'         => date('Y-m-d H:i:s'),
            'mr_created_by' => $this->session->userdata('user_logged')->username,
            'mr_note' => $mr_note,
        ];
        print_r($data);
        //insert data ke table mr
        $this->materialrequest_model->insertmr($data);

        // processing data part SO 
        //tangkap semua inputan
        $mr_item = $post['mr_item'];
        // $so_number = $post['so_number'];
        $mr_item_nm = $post['mr_item_nm'];
        $mr_rmpartno = $post['mr_rmpartno'];
        $mr_rmlong = $post['mr_rmlong'];
        $mr_rmwidth = $post['mr_rmwidth'];
        $mr_rmheight = $post['mr_rmheight'];
        $mr_soqty = $post['mr_soqty'];
        $mr_qty = $post['mr_qty'];
        $mr_unit = $post['mr_unit'];
        $mr_soa = $post['mr_soa'];
        $mr_supplier = $post['mr_supplier'];
        // $mtl_type_cd = $post['mtl_type_cd'];



        //membuat array untuk insert batch
        $datapart = array();
        foreach ($mr_item as $key => $mr_item) {
            $datapart[] = array(
                "mr_item" => $mr_item,
                "mr_no" => $mr_no,
                "so_number" => $so_number,
                "mr_item_nm" => $mr_item_nm[$key],
                "mr_rmpartno" => $mr_rmpartno[$key],
                "mr_rmlong" => $mr_rmlong[$key],
                "mr_rmwidth" => $mr_rmwidth[$key],
                "mr_rmheight" => $mr_rmheight[$key],
                "mr_soqty" => $mr_soqty[$key],
                "mr_qty" => $mr_qty[$key],
                "mr_unit" => $mr_unit[$key],
                "mr_soa" => $mr_soa[$key],
                "mr_supplier" => $mr_supplier[$key],
                "mtl_type_cd" => 'MR-MTL',
                "mr_flex_1" => '0',
                "mr_created_by" => $this->session->userdata('user_logged')->username,
                "mr_created_dt" => date('Y-m-d H:i:s')
            );
        }
        // print_r($datapart);
        //proses insert batch
        $this->materialrequest_model->insertdetail($datapart);

        //update flex inquiry
        // $datainq = [
        //     "so_flex" => "1",
        //     "inquiry_status" => "2"
        // ];
        // $inqid = $post['po_inquiry'];
        // $this->inquiry_model->ubahinquiry($datainq, $inqid);

        // set message succes
        $this->session->set_flashdata('success', 'Input berhasil!!');
        //redirect to po customer
        redirect('engineering/materialrequest/input_mr1/' . $so_number . '/' . $mr_no);
    }

    public function updatemr_wsop()
    {
        // metho post dibuat dalam 1 variabel
        $post = $this->input->post();
        $so_number = $this->input->post('so_number');
        $mr_note = $this->input->post('mr_note');
        $mr_no = $this->materialrequest_model->getKodeMr();


        // processing data part SO 
        //tangkap semua inputan
        $mr_item = $post['mr_item'];
        // $so_number = $post['so_number'];
        $mr_item_nm = $post['mr_item_nm'];
        $mr_rmpartno = $post['mr_rmpartno'];
        $mr_rmlong = $post['mr_rmlong'];
        $mr_rmwidth = $post['mr_rmwidth'];
        $mr_rmheight = $post['mr_rmheight'];
        $mr_soqty = $post['mr_soqty'];
        $mr_qty = $post['mr_qty'];
        $mr_unit = $post['mr_unit'];
        $mr_soa = $post['mr_soa'];
        $mr_supplier = $post['mr_supplier'];
        // $mtl_type_cd = $post['mtl_type_cd'];



        //membuat array untuk insert batch
        $datapart = array();
        foreach ($mr_item as $key => $mr_item) {

            $datapart[] = array(
                "mr_item" => $mr_item,
                "mr_no" => $mr_no,
                "so_number" => $so_number,
                "mr_item_nm" => $mr_item_nm[$key],
                "mr_rmpartno" => $mr_rmpartno[$key],
                "mr_rmlong" => $mr_rmlong[$key],
                "mr_rmwidth" => $mr_rmwidth[$key],
                "mr_rmheight" => $mr_rmheight[$key],
                "mr_soqty" => $mr_soqty[$key],
                "mr_qty" => $mr_qty[$key],
                "mr_unit" => $mr_unit[$key],
                "mr_soa" => $mr_soa[$key],
                "mr_supplier" => $mr_supplier[$key],
                "mtl_type_cd" => 'MR-MTL',
                "mr_flex_1" => '0',
                "mr_updated_by" => $this->session->userdata('user_logged')->username,
                "mr_updated_dt" => date('Y-m-d H:i:s')
            );
        }
        // print_r($datapart);
        //proses insert batch
        $this->materialrequest_model->updatedetail($datapart);


        //update flex inquiry
        // $datainq = [
        //     "so_flex" => "1",
        //     "inquiry_status" => "2"
        // ];
        // $inqid = $post['po_inquiry'];
        // $this->inquiry_model->ubahinquiry($datainq, $inqid);

        // set message succes
        $this->session->set_flashdata('success', 'Input berhasil!!');
        //redirect to po customer
        redirect('engineering/materialrequest/input_mr1/' . $so_number . '/' . $mr_no);
    }

    public function create_mr()
    {
        $id = $this->inquiry_model->getKodeInquiry();
        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => $uri2,
            'action'  => site_url('marketing/inquiry/process'),
            'mtltype' => $this->materialrequest_model->select_kodemtltype()->result(),
            'socustomer' => $this->materialrequest_model->getformr(),
            'unit' => $this->inquiry_model->select_unit()->result(),
            'detailmr' => $this->materialrequest_model->detailmr_wtsop()
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_materialrequest/new_materialrequest', $data);
        $this->load->view('engineering/v_materialrequest/ajaxcrud_materialrequest', $data);
        $this->load->view('templete/js');
        //print_r($data);print_r($id);


    }

    public function create_mr_wsopart()
    {
        $id = $this->inquiry_model->getKodeInquiry();
        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => $uri2,
            'action'  => site_url('marketing/inquiry/process'),
            'mtltype' => $this->materialrequest_model->select_kodemtltype()->result(),
            'socustomer' => $this->materialrequest_model->getformr(),
            'unit' => $this->inquiry_model->select_unit()->result(),
            'detailmr' => $this->materialrequest_model->detailmr_wsop()
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_materialrequest/new_materialrequest_wsopart', $data);
        $this->load->view('engineering/v_materialrequest/ajaxcrud_materialrequest', $data);
        $this->load->view('templete/js');
        //print_r($data);print_r($id);


    }

    public function datamaterialrequest()
    {
        $uri2 = $this->uri->segment(2);
        $datamaterialrequest = $this->materialrequest_model->getdatamaterialrequest();
        $no = 1;
        foreach ($datamaterialrequest as $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = "<a href='" . base_url('engineering/materialrequest/mr_detail/' .  $value['so_number'] . ' ') . "' class='btn btn-info btn-xs' ><i class='fas fa-search'></i> 
            </a>";

            $tbody[] = $value['mr_no'];


            $tbody[] = $value['so_number'];

            $tbody[] = $value['mr_created_by'];
            $tbody[] = $value['mr_dt'];
            // $tbody[] = $value['inquiry_note'];


            $aksi = "<a href='materialrequest/input_mr1/" . $value['so_number'] . "/" . $value['mr_no'] . "' class='btn btn-info btn-sm ' ><i class='fas fa-edit'></i></a>
            </button>" . ' ' . "<button class='btn btn-danger btn-sm hapus-$uri2' id='id' data-toggle='modal' data-id=" . $value['so_number'] . "><i      class='fas fa-trash-alt'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datamaterialrequest) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }


    public function addmrdetail()
    {

        $addmrdetail = array(
            'mr_no'        => $this->materialrequest_model->getKodeMr(),
            'mr_item'        => $this->input->post('mr_item'),
            'mr_qty'        => $this->input->post('mr_qty'),
            'mr_supplier'        => $this->input->post('mr_supplier'),
            'mr_soa'        => $this->input->post('mr_soa'),
            'mr_created_by'        => $this->input->post('mr_created_by'),
            'mr_created_dt'        => $this->input->post('mr_created_dt'),
            'mr_flex_1'        => '0',
            'mr_wtsop_flex'        => '0',
            'mtl_type_cd'        => $this->input->post('mtl_type_cd'),



        );
        $data = $this->db->insert('mr_detail', $addmrdetail);


        redirect('engineering/materialrequest/create_mr');

        echo json_encode($data);
    }

    public function addmrtooldetail()
    {

        $id_brg = $this->input->post('id_barang');
        $so_number = $this->input->post('so_number');
        $addmrdetail = array(
            'mr_no'        => $this->materialrequest_model->getKodeMr(),
            'mr_item'        => $this->input->post('mr_item'),
            'mr_item_nm'        => $this->input->post('mr_item_nm'),
            'mr_qty'        => $this->input->post('mr_qty'),
            'mr_unit'        => $this->input->post('mr_unit'),
            'mr_supplier'        => $this->input->post('mr_supplier'),
            'mr_soa'        => $this->input->post('mr_soa'),
            'mr_created_by'        => $this->input->post('mr_created_by'),
            'mr_created_dt'        => $this->input->post('mr_created_dt'),
            'mr_flex_1'        => '0',
            'mr_wsop_flex'        => '0',
            'mtl_type_cd'        => 'MR-TLS',
            'id_barang'        => $id_brg,
            'so_number'        => $so_number,



        );
        $data = $this->db->insert('mr_detail', $addmrdetail);
        echo json_encode($data);

        $uri4 = $this->uri->segment(4);
        $uri5 = $this->uri->segment(5);
        $so_number = $this->input->post('so_number');
        $so_no = array(
            'so_number' => $so_number,
        );
        redirect('engineering/materialrequest/input_mrTools/' . $uri4 . '/' . $uri5);
    }

    public function addmrothers()
    {


        $addmrdesc = array(
            // 'mr_no'        => $this->materialrequest_model->getKodeMr(),
            'mr_descDetail'        => $this->input->post('mr_descDetail'),
            'mr_descPurpose'        => $this->input->post('mr_descPurpose'),
            'mr_descRemark'        => $this->input->post('mr_descRemark'),
            "mr_descCreateby" => $this->session->userdata('user_logged')->username,
            "mr_descCreatedt" => date('Y-m-d H:i:s'),
            'mr_descFlex'        => '0',




        );
        $data = $this->db->insert('mr_description', $addmrdesc);
        echo json_encode($data);

        $uri4 = $this->uri->segment(4);
        $uri5 = $this->uri->segment(5);
        $so_number = $this->input->post('so_number');
        $so_no = array(
            'so_number' => $so_number,
        );
        redirect('engineering/materialrequest/input_mrOthers/' . $uri4 . '/' . $uri5);
    }

    public function savemrothers()
    {


        $so_number = $this->input->post('so_number');
        $mr_no = $this->input->post('mr_no');

        $updatemr = array(
            // 'mr_no'        => $this->materialrequest_model->getKodeMr(),
            'mr_descSO'        => $so_number,
            'mr_no'        => $mr_no,
            // 'mr_status'        => '0',
            'mr_descFlex'        => '1',
            "mr_descUpdateby" => $this->session->userdata('user_logged')->username,
            "mr_descUpdatedt" => date('Y-m-d H:i:s'),
            // 'mr_note'        => $this->input->post('mr_note'),


        );
        $data = $this->db->where('mr_descFlex', '0');
        $data = $this->db->update('mr_description', $updatemr);
        echo json_encode($data);

        $uri4 = $this->uri->segment(4);
        $uri5 = $this->uri->segment(5);

        redirect('engineering/materialrequest');
        // redirect('engineering/materialrequest/input_mrOthers/'.$uri4. '/' . $uri5 );

    }

    public function savemrtooldetail()
    {


        $so_number = $this->input->post('so_number');
        $mr_no = $this->input->post('mr_no');

        $updatemr = array(
            // 'mr_no'        => $this->materialrequest_model->getKodeMr(),
            'so_number'        => $so_number,
            'mr_no'        => $mr_no,
            // 'mr_status'        => '0',
            'mr_flex_1'        => '1',
            'mr_created_dt'        => $this->input->post('mr_date'),
            'mr_created_by'        => $this->input->post('created_by'),
            // 'mr_note'        => $this->input->post('mr_note'),


        );
        $data = $this->db->where('mr_flex_1', '0');
        $data = $this->db->update('mr_detail', $updatemr);
        echo json_encode($data);

        $uri4 = $this->uri->segment(4);
        $uri5 = $this->uri->segment(5);

        redirect('engineering/materialrequest/input_mrOthers/' . $uri4 . '/' . $uri5);
    }



    public function addmr()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

        $so_number = $this->input->post('so_number');
        $mr_no = $this->input->post('mr_no');

        $addmr = array(
            // 'mr_no'        => $this->materialrequest_model->getKodeMr(),
            'so_number'        => $so_number,
            'mr_no'        => $mr_no,
            'mr_status'        => '0',
            'mr_dt'        => $this->input->post('mr_date'),
            'mr_created_by'        => $this->input->post('created_by'),
            'mr_note'        => $this->input->post('mr_note'),


        );
        $this->db->insert('mr', $addmr);


        $data = array(
            'so_number'        => $so_number,
            'mr_flex_1'        => '1',
        );

        $this->materialrequest_model->updatemrdetail($data);

        $sodata = array(
            // 'so_no'        => $so_number,
            'so_flex'        => '1',
        );

        $this->materialrequest_model->updatesocustflex($sodata, $so_number);
        redirect('engineering/materialrequest/');
    }

    public function mr_detail()
    {

        $id = $this->uri->segment('4');
        $data = array(
            'title' => $id,

            'detailmr' => $this->materialrequest_model->getDetailMR($id),
            'detailpartmr' => $this->materialrequest_model->getDetailpartMR($id),
            'mrDesc' => $this->materialrequest_model->getDescMR($id),

        );

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_materialrequest/detail_materialrequest', $data);
        $this->load->view('templete/js');
    }

    public function print_mr()
    {
        $id = $this->uri->segment('4');
        $uri2 = $this->uri->segment('2');
        $data = array(
            'title' => $uri2,
            'detailmr' => $this->materialrequest_model->getDetailMR($id),
            'datamtltype' => $this->master_model->getdatamtltype(),
            'detailpartmr_mtl' => $this->materialrequest_model->getDetailpartMR_mtl($id),
            'detailpartmr_tls' => $this->materialrequest_model->getDetailpartMR_tls($id)
        );
        $this->load->view('templete/head_print', $data);
        $this->load->view('engineering/v_materialrequest/print_materialrequest', $data);
        //$this->load->view('templete/js');

    }

    public function print_mr_p1()
    {
        $id = $this->uri->segment('4');
        $uri2 = $this->uri->segment('2');
        $data = array(
            'title' => $uri2,
            'detailmr' => $this->materialrequest_model->getDetailMR($id),
            'datamtltype' => $this->master_model->getdatamtltype(),
            'detailpartmr_mtl' => $this->materialrequest_model->getDetailpartMR_mtl($id),
            'detailpartmr_tls' => $this->materialrequest_model->getDetailpartMR_tls($id)
        );
        $this->load->view('templete/head_print', $data);
        $this->load->view('engineering/v_materialrequest/print_materialrequest_p1', $data);
        //$this->load->view('templete/js');

    }

    public function print_mr_p2()
    {
        $id = $this->uri->segment('4');
        $uri2 = $this->uri->segment('2');
        $data = array(
            'title' => $uri2,
            'detailmr' => $this->materialrequest_model->getDetailMR($id),
            'datamtltype' => $this->master_model->getdatamtltype(),
            'detail_desc' => $this->materialrequest_model->getDescMR($id),

        );
        $this->load->view('templete/head_print', $data);
        $this->load->view('engineering/v_materialrequest/print_materialrequest_p2', $data);
        //$this->load->view('templete/js');

    }

    public function hapusmrdetail()
    {

        $id = $this->uri->segment('4');

        $data = $this->materialrequest_model->hapusdatamrdetail($id);
        redirect('engineering/materialrequest/create_mr');
        // echo json_encode($data);
    }

    public function hapusmr_desc()
    {

        $id = $this->uri->segment('4');
        $uri4 = $this->uri->segment('4');
        $uri5 = $this->uri->segment('5');

        $data = $this->materialrequest_model->hapusdatamr_desc($id);
        redirect('engineering/materialrequest/input_mrOthers/' . $uri4 . '/' . $uri5);
        // echo json_encode($data);
    }

    public function hapusmrdetail_wsop()
    {

        $id = $this->uri->segment('4');
        $so_no = $this->uri->segment('5');
        $mr_no = $this->uri->segment('6');

        $data = $this->materialrequest_model->hapusdatamrdetail($id);
        redirect('engineering/materialrequest/input_mrTools/' . $so_no . '/' . $mr_no);
        // echo json_encode($data);
    }

    // MR detail form

    function add_mr_detail()
    {
        $uri4 = $this->uri->segment('4');
        echo json_encode(
            array(
                "id" => $this->materialrequest_model->create($uri4),

            )
        );
    }

    function update_mr_detail()
    {
        $id = $this->input->post("id");
        $value = $this->input->post("value");
        $modul = $this->input->post("modul");
        $this->materialrequest_model->update($id, $value, $modul);
        echo "{}";
    }

    function delete_mr_detail()
    {

        $id = $this->input->post('id');
        $this->materialrequest_model->delete($id);
        echo "{}";
    }



    function delete_mr_all()
    {
        $so_no = $this->input->post("id");
        $this->materialrequest_model->delete_mr($so_no);
        $this->materialrequest_model->delete_mr_detail($so_no);
        $data = array(
            'so_flex' => '0',
        );
        $this->materialrequest_model->updatesosts($so_no, $data);
        echo "{}";
    }


    // edit mrDesc

    function add_mr_desc()
    {
        $uri4 = $this->uri->segment('4');
        echo json_encode(
            array(
                "id" => $this->materialrequest_model->create_desc($uri4),

            )
        );
    }

    function update_mr_desc()
    {
        $id = $this->input->post("id");
        $value = $this->input->post("value");
        $modul = $this->input->post("modul");
        $this->materialrequest_model->update_desc($id, $value, $modul);
        echo "{}";
    }

    function delete_mr_desc()
    {

        $id = $this->input->post('id');
        $this->materialrequest_model->delete_desc($id);
        echo "{}";
    }
}
