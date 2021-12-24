<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IssuedPPB extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model('inquiry_model');
        $this->load->model('master_model');
        $this->load->model('estimationcost_model');
        $this->load->model('pocustomer_model');
        $this->load->model('issuedppb_model');
        if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {

        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => $uri2,
            'ppb_cd' => $this->issuedppb_model->getKodePPB(),
            'issuedppb' => $this->issuedppb_model->getdataissuedPPB(),
            'customer' => $this->master_model->select_customer()->result(),
            'sono' => $this->issuedppb_model->select_sono()->result(),
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('planner/v_issuedppb/tampil_issuedppb', $data);
        $this->load->view('planner/v_issuedppb/ajaxcrud_issuedppb', $data);
        $this->load->view('templete/js');
    }

    public function dataissuedppb()
    {
        $uri2 = $this->uri->segment(2);
        $dataissuedppb = $this->issuedppb_model->getdataissuedPPB();
        $no = 1;
        foreach ($dataissuedppb as $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = "<a href='" . base_url('planner/issuedppb/ppb_detail/' .  $value['ppb_no'] . ' ') . "' class='btn btn-info btn-sm' ><i class='fas fa-search'></i> 
            </a>";
            $tbody[] = $value['ppb_no'];
            $tbody[] = $value['ppb_section_id'];
            $tbody[] = $value['ppb_request_by'];
            $tbody[] = $value['ppb_request_dt'];
            $tbody[] = $value['ppb_doc_no'];
            $tbody[] = $value['ppb_so_number'];
            $tbody[] = $value['ppb_customer_cd'];
            $tbody[] = $value['ppb_po_number'];
            if ($value['ppb_approve_sts'] == 0) {
                $tbody[] = "not approved";
            } else {
                $tbody[] = "approved";
            }

            $aksi = "<!--<button class='btn btn-outline-info btn-sm ubah-$uri2' data-toggle='modal' data-id=" . $value['ppb_id'] . "><i class='fas fa-edit'></i>
            </button>-->" . ' ' . "<button class='btn btn-danger btn-sm hapus-$uri2' id='id' data-toggle='modal' data-id=" . $value['ppb_id'] . "><i      class='fas fa-trash-alt'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($dataissuedppb) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function addppbdetail()
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

    public function input()
    {
        $sono = $this->input->post('so_number');
        $data['mr'] = $this->issuedppb_model->getmrbyso($sono);
        $data['mrdetail'] = $this->issuedppb_model->getmrdetailbyso($sono);
        $data['poProcess'] = $this->input->post('poProcess');
        $data['poProduction'] = $this->input->post('poProduction');

        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        //$this->load->view('templete2/breadcrumb', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('planner/v_issuedppb/inputppb', $data);
        $this->load->view('templete/js');
    }

    public function create_ppb()
    {
        $id = $this->issuedppb_model->getKodePPB();
        $uri2 = $this->uri->segment(2);
        $data = array(
            'title' => $uri2,
            'mtltype' => $this->issuedppb_model->select_kodemtltype()->result(),
            'socustomer' => $this->issuedppb_model->getall(),
            'unit' => $this->inquiry_model->select_unit()->result(),
            'detailmr' => $this->issuedppb_model->detailmr()
        );
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('planner/v_issuedppb/new_issuedppb', $data);
        $this->load->view('planner/v_issuedppb/ajaxcrud_issuedppb', $data);
        $this->load->view('templete/js');
        //print_r($data);print_r($id);


    }

    public function dataissuedppb_1()
    {
        $uri2 = $this->uri->segment(2);
        $dataissuedppb = $this->issuedppb_model->getdataissuedppb();
        $no = 1;
        foreach ($dataissuedppb as $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = "<a href='" . base_url('planner/issuedppb/ppb_detail/' .  $value['ppb_so_number'] . ' ') . "' class='btn btn-secondary btn-sm' ><font color='blue'><i class='fas fa-search-plus'></i> </font>
            </a>";

            $tbody[] = $value['mr_no'];


            $tbody[] = $value['so_number'];

            $tbody[] = $value['mr_created_by'];
            $tbody[] = $value['mr_dt'];
            // $tbody[] = $value['inquiry_note'];


            $aksi = "<!--<button class='btn btn-outline-info btn-sm ubah-$uri2' data-toggle='modal' data-id=" . $value['mr_id'] . "><i class='fas fa-edit'></i>
            </button>-->" . ' ' . "<button class='btn btn-secondary btn-sm hapus-$uri2' id='id' data-toggle='modal' data-id=" . $value['mr_id'] . "><i style='color:red' class='fas fa-trash-alt'></i></button>";
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($dataissuedppb) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }


    // public function addmrdetail()
    // {

    //     $addmrdetail = array(
    //         'mr_no'        => $this->issuedppb_model->getKodeMr(),
    //         'mr_item'        => $this->input->post('mr_item'),
    //         'mr_qty'        => $this->input->post('mr_qty'),
    //         'mr_supplier'        => $this->input->post('mr_supplier'),
    //         'mr_soa'        => $this->input->post('mr_soa'),
    //         'mr_created_by'        => $this->input->post('mr_created_by'),
    //         'mr_created_dt'        => $this->input->post('mr_created_dt'),
    //         'mr_flex_1'        => '0',
    //         'mtl_type_cd'        => $this->input->post('mtl_type_cd'),



    //     );
    //     $data = $this->db->insert('mr_detail', $addmrdetail);
    //     redirect('planner/issuedppb/create_mr');

    //     echo json_encode($data);
    // }

    // public function addmr()
    // {
    //     // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}

    //     $so_number = $this->input->post('so_number');

    //     $addmr = array(
    //         'so_number'        => $so_number,
    //         'mr_dt'        => $this->input->post('mr_date'),
    //         'mr_created_by'        => $this->input->post('created_by'),


    //     );
    //     $this->db->insert('mr', $addmr);


    //     $data = array(
    //         'so_number'        => $so_number,
    //         'mr_flex_1'        => '1',
    //     );

    //     $this->issuedppb_model->updatemrdetail($data);

    //     $sodata = array(
    //         // 'so_no'        => $so_number,
    //         'so_flex'        => '1',
    //     );

    //     $this->issuedppb_model->updatesocustflex($sodata,$so_number);
    //     redirect('planner/issuedppb');
    // }

    public function ppb_detail()
    {

        $id = $this->uri->segment('4');
        $data = array(
            'title' => $id,

            'detailppb' => $this->issuedppb_model->getDetailppb($id),
            'detailpartppb' => $this->issuedppb_model->getDetailpartppb($id)

        );

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('planner/v_issuedppb/detail_issuedppb', $data);
        $this->load->view('templete/js');
    }

    public function print_ppb()
    {
        $id = $this->uri->segment('4');
        $uri2 = $this->uri->segment('2');
        $data = array(
            'title' => $uri2,
            'detailppb' => $this->issuedppb_model->getDetailppb($id),
            //'datamtltype' => $this->master_model->getdatamtltype(),
            'detailpartppb' => $this->issuedppb_model->getDetailpartppb($id)
        );
        $this->load->view('templete/head_print', $data);
        $this->load->view('planner/v_issuedppb/print_issuedppb', $data);
        //$this->load->view('templete/js');

    }

    // public function hapusmrdetail()
    // {

    //     $id = $this->uri->segment('4');

    //     $data = $this->issuedppb_model->hapusdatamrdetail($id);
    //     redirect('planner/issuedppb/create_mr');
    //     // echo json_encode($data);
    // }

    // MR detail form

    // function add_mr_detail(){
    //     $uri4 = $this->uri->segment('4') ;
    // 	echo json_encode(
    //         array(
    //             "id"=>$this->issuedppb_model->create($uri4),

    //         )
    //     );
    // }

    // function update_mr_detail(){
    // 	$id= $this->input->post("id");
    // 	$value= $this->input->post("value");
    // 	$modul= $this->input->post("modul");
    // 	$this->issuedppb_model->update($id,$value,$modul);
    // 	echo "{}";
    // }


    // function delete_mr_detail(){
    // 	$id= $this->input->post("id");
    // 	$this->issuedppb_model->delete($id);
    // 	echo "{}";
    // }

    public function save()
    {
        // metho post dibuat dalam 1 variabel
        $post = $this->input->post();
        //$cust = $post['po_custcode'];
        //$custdata = $this->master_model->getcustomerbyid($cust);
        //$custcd = $custdata->customer_cd2;

        //generate nomor SO berdasarkan data yg di input
        //$sono = "SO-" . $post['po_jproses'] . "-" . $post['po_jprod'] . "-" . $cust . "-" . $this->pocustomer_model->newPOid() . "-" . date('m') . "-" . date('d', strtotime($post['po_delivdate'])) . "-" . date('m', strtotime($post['po_delivdate'])) . "-" . date('y', strtotime($post['po_delivdate']));
        $ppbno = $this->issuedppb_model->getKodePPB();
        //membuat array data untuk insert ke table socustomer
        $data = [
            "ppb_no" => $ppbno,
            "ppb_request_dt" => date('Y-m-d'),
            "ppb_customer_cd" => $post['ppb_customer_id'],
            "ppb_so_number" => $post['ppb_so_number'],
            "ppb_doc_no" => $post['ppb_doc_no'],
            "ppb_po_number" => $post['ppb_po_number'],
            "ppb_section_id" => $post['ppb_section_id'],
            "ppb_request_by" => $post['ppb_request_by'],
            "ppb_flex" => "0",
            "ppb_created_by" => $this->session->userdata('user_logged')->username,
            "ppb_created_dt" => date('Y-m-d H:i:s')
        ];
        print_r($data);
        //insert data ke table socustomer
        $this->issuedppb_model->insertissuedppb($data);

        // processing data part SO 
        //tangkap semua inputan
        $itemcd = $post['ppb_part_cd'];
        $itemnm = $post['ppb_part_name'];
        $qty = $post['ppb_qty'];
        $price = $post['ppb_price'];
        $date = $post['ppb_incoming_dt'];


        //membuat array untuk insert batch
        $datapart = array();
        foreach ($itemcd as $key => $itmcd) {
            $datapart[] = array(
                "ppb_no" => $ppbno,
                "ppb_part_name" => $itmnm,
                "ppb_part_cd" => $itemcd[$key],
                "ppb_qty" => $qty[$key],
                "ppb_price" => $price[$key],
                "ppb_incoming_dt" => $date[$key],
                "ppb_detail_cby" => $this->session->userdata('user_logged')->username,
                "ppb_detail_cdt" => date('Y-m-d H:i:s')
            );
        }
        print_r($datapart);
        //proses insert batch
        $this->issuedppb_model->insertppbdetail($datapart);

        // update flex mr
        $datamr = [
            "mr_status" => "1",
            // "inquiry_status" => "2"
        ];
        $mrid = $post['mr_no'];
        $this->db->where('mr_no', $mrid);
        $this->db->update('mr', $datamr);

        // set message succes
        $this->session->set_flashdata('success', 'Input berhasil!!');
        //redirect to po customer
        redirect('planner/issuedppb');
    }

    function delete_ppb_all()
    {
        $ppb_no = $this->input->post("id");
        $so_no = $this->input->post("so_no");
        $this->issuedppb_model->delete_ppb($ppb_no);
        $this->issuedppb_model->delete_ppb_detail($ppb_no);

        $data = array(
            'mr_status' => '0',
        );
        $this->materialrequest_model->updateppbsts($so_no, $data);
        echo "{}";
    }
}
