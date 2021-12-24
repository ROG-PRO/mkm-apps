<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estimationcost extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('estimationcost_model');
        $this->load->model('inquiry_model');
        $this->load->model('databrg_model');
        $this->load->model("auth_model");
        $this->load->helper('number');
        // if ($this->auth_model->isNotLogin()) redirect(site_url('login'));
    }
    public function index()
    {

        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_estimationcost/tampil_estimationcost', $data);
        $this->load->view('engineering/v_estimationcost/ajaxcrud_estimationcost', $data);
        $this->load->view('templete/js');
    }

    public function dataestimationcost()
    {
        $uri2 = $this->uri->segment(2);
        $dataestimationcost = $this->estimationcost_model->getdataestimationcost();
        $no = 1;
        foreach ($dataestimationcost as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            if ($value['inquiry_status2'] == '0') {
                $tbody[] =
                    "<button href='#' class='btn btn-info  btn-xs' disabled><i class='fas fa-search'></i>
            </button>";
            } else {
                $tbody[] =
                    "<a href='" . base_url('engineering/estimationcost/list_estimation/' .  $value['id_inquiry'] . ' ') . "' class='btn btn-info btn-xs' ><i class='fas fa-search'></i>
            </a>";
            };
            // $tbody[] = "<a href='" . base_url('engineering/estimationcost/list_estimation/' .  $value['id_inquiry'] . ' ') . "' class='btn btn-info btn-sm' ><i class='fas fa-search'></i>
            // </a>";
            $tbody[] = $value['id_inquiry'];
            if ($value['inquiry_status2'] == '0') {
                $tbody[] = '<span class="badge badge-warning">Canceled </span>';
            } else if ($value['inquiry_status2'] == '1') {
                $tbody[] = '<span class="badge badge-primary">Continue </span>';
            } else {
                $tbody[] = '';
            }
            $tbody[] = $value['inquiry_note'];
            $tbody[] = $value['type_prod'];
            $progress = '<div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0"
            aria-valuemax="100" style="width: 20%">
            <span class="sr-only">20% Complete</span>
            </div>';
            $tbody[] = $value['inq_progress'];
            // $tbody[] = "<a href='" . base_url() . "drawing/" . $value['drawing'] . "'   class ='btn btn-default btn-xs'><i class='fa fa-eye'></i> view </a>";
            // $tbody[] = 'Rp' .number_format ($value['cost_tools'], 0, ',', '.');
            // $tbody[] = 'Rp' .number_format ($value['cost_materials'], 0, ',', '.');
            // $tbody[] = 'Rp' .number_format ($value['cost_process'], 0, ',', '.');
            // $tbody[] = 'Rp' .number_format ($value['cost_packing'], 0, ',', '.');
            // $tbody[] = 'Rp' .number_format ($value['cost_transportation'], 0, ',', '.');
            // $tbody[] = 'Rp' .number_format ($value['cost_transportation'] + $value['cost_packing'] + $value['cost_process'] + $value['cost_materials'] + $value['cost_tools'], 0, ',', '.');
            if ($value['esti_status'] == '0') {
                $tbody[] = '<span class="badge badge-danger">Not Estimate</span>';
            } else {
                $tbody[] = '<span class="badge badge-success">Estimated</span>';
            }
            //$tbody[] = $value['esti_status'];
            $tbody[] = $value['esti_note'];
            $tbody[] = $value['esti_update_by'];
            $tbody[] = $value['esti_update_dt'];
            $aksi = "<button class='btn btn-danger btn-sm hapus-$uri2' id='id' data-toggle='modal' data-id=" . $value['id_inquiry'] . "><i class='far fa-trash-alt' ></i> </button>";
            // $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($dataestimationcost) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function detail_estimation()
    {

        $id = $this->uri->segment('4');
        $data = array(
            'title' => $id,
            'countinq' => $this->estimationcost_model->countbyInquiry($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            // 'detailmaterials' => $this->estimationcost_model->getdetailmaterials($id),
            //'detailprocess' => $this->estimationcost_model->getdetailprocess($id),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            'process_amount' => $this->estimationcost_model->ProcessCost($id),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_calculationcost/tampil_calculationcost', $data);
        $this->load->view('templete/js');
    }



    //=============================MP_Calculation cost==============================================

    public function mp_tools_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');

        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'datainquiry' => $this->inquiry_model->getinquirybyid($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id, $id2),
            'detailmaterials' => $this->estimationcost_model->mp_getdetailmaterials($id, $id2),
            'detailprocess' => $this->estimationcost_model->mp_getdetailprocess($id, $id2),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/mp_head_detail_cost', $data);
        $this->load->view('engineering/v_calculationcost/mp_tools_estimation', $data);
        $this->load->view('templete/js');
    }


    public function mp_materials_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');
        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailmaterials' => $this->estimationcost_model->mp_getdetailmaterials($id, $id2),
            'detailprocess' => $this->estimationcost_model->mp_getdetailprocess($id, $id2),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id, $id2),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
            // 'inquiry' => $this->estimationcost_model->getinquiry($id),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/mp_head_detail_cost');
        $this->load->view('engineering/v_calculationcost/mp_materials_estimation', $data);
        $this->load->view('templete/js');
    }

    public function mp_process_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');
        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailmaterials' => $this->estimationcost_model->mp_getdetailmaterials($id, $id2),
            'detailprocess' => $this->estimationcost_model->mp_getdetailprocess($id, $id2),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id, $id2),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/mp_head_detail_cost');
        $this->load->view('engineering/v_calculationcost/mp_process_estimation', $data);
        $this->load->view('templete/js');
    }

    public function mp_process_estimation_edit()
    {

        $id = $this->uri->segment('5');
        $id_process_dtl = $this->uri->segment('4');
        $id2 = $this->uri->segment('6');
        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailmaterials' => $this->estimationcost_model->mp_getdetailmaterials($id, $id2),
            'detailprocess' => $this->estimationcost_model->mp_getdetailprocess($id, $id2),
            'detailprocessedit' => $this->estimationcost_model->jo_getdetailprocessedit($id_process_dtl),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id, $id2),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        // $this->load->view('templete/mp_head_detail_cost');
        $this->load->view('engineering/v_calculationcost/mp_process_estimation_edit', $data);
        $this->load->view('templete/js');
    }

    public function mp_others_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');

        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailmaterials' => $this->estimationcost_model->mp_getdetailmaterials($id, $id2),
            'detailprocess' => $this->estimationcost_model->mp_getdetailprocess($id, $id2),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id, $id2),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),

        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/mp_head_detail_cost');
        $this->load->view('engineering/v_calculationcost/mp_others_estimation', $data);
        $this->load->view('templete/js');
    }

    function mp_tambah_process()
    {
        $id = $this->input->post('id_inquiry');
        $id2 = $this->input->post('id_inquiry_detail');
        $data = array(
            'id_process'    => $this->input->post('id_process'),
            'id_machine'    => $this->input->post('id_machine'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'id_inquiry_detail'   => $this->input->post('id_inquiry_detail'),
            'mc_time' => $this->input->post('mc_time'),
            'jasa_cost' => $this->input->post('jasa_cost'),
            'id_barang' => $this->input->post('id_barang'),

        );

        $this->estimationcost_model->insertestimationcost('process_detail', $data);
        redirect('engineering/estimationcost/mp_process_estimation/' . $id . '/' . $id2 . '');
    }

    public function update_estimation()
    {
        $objdata = array(

            'cost_tools'     => $this->input->post('cost_tools'),
            'cost_materials'     => $this->input->post('cost_materials'),
            'cost_process'    => $this->input->post('cost_process'),
            'cost_packing'     => $this->input->post('cost_packing'),
            'cost_transportation' => $this->input->post('cost_transportation'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'esti_update_by'   => $this->input->post('update_by'),
            'esti_update_dt'   => $this->input->post('today'),
            'esti_status'      => '1',
            'esti_note'      => $this->input->post('note'),
            //'approve'      => $this->input->post('approve'),


        );

        $id = $this->input->post('id_inquiry');
        $this->estimationcost_model->updateestimationcost($objdata, $id);

        // $cost_tools   = $this->input->post('cost_tools');
        // $cost_materials  = $this->input->post('cost_materials');
        // $cost_process    = $this->input->post('cost_process');
        // $cost_packing     = $this->input->post('cost_packing');
        // $cost_transportation = $this->input->post('cost_transportation');
        // $data['quotation_price'] = $cost_tools + $cost_materials + $cost_process + $cost_packing + $cost_transportation;
        // $data['eng_approve'] = '1';
        // $this->estimationcost_model->updateinquirysts($data, $id);

        redirect('engineering/estimationcost');
    }

    function mp_tambah_tools()
    {
        $id = $this->input->post('id_inquiry');
        $data = array(
            'id_barang'    => $this->input->post('id_barang'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'tool_qty' => $this->input->post('tool_qty'),

        );

        $this->estimationcost_model->insertestimationcost('tools', $data);
        redirect('engineering/estimationcost/mp_tools_estimation/' . $id . '');
    }
    public function mp_delete_tool()
    {
        $id_tool = $this->uri->segment('4');
        $id_inquiry = $this->uri->segment('5');
        $id_inquiry_detail = $this->uri->segment('6');
        if ($this->estimationcost_model->jo_delete_tool($id_tool)) {
            redirect('engineering/estimationcost/mp_tools_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '');
        }
    }

    public function mp_delete_process()
    {
        $id = $this->uri->segment('4');
        $id_inquiry = $this->uri->segment('5');
        $id_inquiry_detail = $this->uri->segment('6');


        if ($this->estimationcost_model->jo_delete_process($id)) {
            redirect('engineering/estimationcost/mp_process_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '');
        }
    }


    //==============================================JO-Calculation cost====================================================

    public function jo_tools_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');

        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailInq' => $this->estimationcost_model->getDetailInq($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id2),
            //'detailmaterials' => $this->estimationcost_model->getdetailmaterials($id,$id2),
            //'detailprocess' => $this->estimationcost_model->getdetailprocess($id),
            'tools' => $this->estimationcost_model->select_tools()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id2),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/jo_head_detail_cost', $data);
        $this->load->view('engineering/v_calculationcost/jo_tools_estimation', $data);
        $this->load->view('templete/js');
    }
    public function jo_tools_estimation_edit()
    {

        $id_tool = $this->uri->segment('4');
        $id = $this->uri->segment('5');
        $id2 = $this->uri->segment('6');

        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getDetailTools($id),
            //'detailmaterials' => $this->estimationcost_model->getdetailmaterials($id,$id2),
            //'detailprocess' => $this->estimationcost_model->getdetailprocess($id),
            'tools' => $this->estimationcost_model->select_tools()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
            'detailtoolsedit' => $this->estimationcost_model->jo_getdetailtoolsedit($id_tool),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        // $this->load->view('templete/jo_head_detail_cost', $data);
        $this->load->view('engineering/v_calculationcost/jo_tools_estimation_edit', $data);
        $this->load->view('templete/js');
    }

    function jo_tambah_tools()
    {
        $id = $this->input->post('id_inquiry');
        $id2 = $this->input->post('id_inquiry_detail');
        $prod_type = $this->input->post('prod_type');
        $part_no = $this->input->post('part_no');
        $data = array(
            'id_barang'    => $this->input->post('id_barang'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'id_inquiry_detail'   => $this->input->post('id_inquiry_detail'),
            'tool_qty' => $this->input->post('tool_qty'),
            'tool_price' => $this->input->post('price'),
            'tool_created_by' => $this->input->post('created_by'),
            'tool_created_dt' => $this->input->post('created_dt'),

        );

        $this->estimationcost_model->insertestimationcost('tools', $data);
        redirect('engineering/estimationcost/jo_tools_estimation/' . $id . '/' . $id2 . '');
        // redirect('engineering/estimationcost/jo_tools_estimation/' . $id . '/' . $id2 . '/' . $prod_type . '/' . $part_no . '');
    }

    public function jo_edit_tools()
    {
        $id_inquiry = $this->input->post('id_inquiry');
        $id_inquiry_detail = $this->input->post('id_inquiry_detail');
        $prod_type = $this->input->post('prod_type');
        $part_no = $this->input->post('part_no');

        $data = array(
            'id_barang'    => $this->input->post('id_barang'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'id_inquiry_detail'   => $this->input->post('id_inquiry_detail'),
            'tool_price'   => $this->input->post('price'),
            'tool_qty'   => $this->input->post('tool_qty'),
            'tool_update_dt' => $this->input->post('update_dt'),
            'tool_update_by' => $this->input->post('update_by'),

        );
        $id_tool = $this->input->post('id_tool');
        $this->estimationcost_model->update_jo_tool_cost($data, $id_tool);
        redirect('engineering/estimationcost/jo_tools_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '');
        // redirect('engineering/estimationcost/jo_tools_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '/' . $prod_type . '/' . $part_no . '');
    }

    // ----------------------------------------JO Material estimation -------------------------------------------------------

    public function jo_incld_mtl_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');
        $data = array(
            'title' => $id,
            'brand' => $this->databrg_model->select_brand()->result(),
            'lokasi' => $this->databrg_model->select_lokasi()->result(),
            'unit' => $this->databrg_model->select_unit()->result(),
            'kategori' => $this->databrg_model->select_kategori()->result(),
            'section' => $this->databrg_model->select_section()->result(),
            'status' => $this->databrg_model->select_status()->result(),
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id, $id2),
            'detailInq' => $this->estimationcost_model->getDetailInq($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailmaterials' => $this->estimationcost_model->jo_getdetailmaterials($id, $id2),
            'detailInq' => $this->estimationcost_model->getDetailInq($id),
            'mtl_amount' => $this->estimationcost_model->jo_rmcost($id, $id2),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            //'process_amount' => $this->estimationcost_model->jo_rmcost($id,$id2),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
            // 'all' => $this->db->get('raw_material')->result(),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/jo_head_detail_cost', $data);
        $this->load->view('engineering/v_calculationcost/jo_materials_incld_estimation', $data);
        $this->load->view('templete/js');
    }

    public function addmtl()
    {


        $part_no = $this->input->post('part_no');
        // $part_nm = $this->input->post('part_nm');
        // $id_brand = $this->input->post('id_brand');
        $id_unit = $this->input->post('id_unit');
        // $id_kategori = $this->input->post('id_kategori');
        $id_status = $this->input->post('id_status');
        // $min_stok = $this->input->post('min_stok');
        $created_by = $this->input->post('created_by');
        $created_dt = $this->input->post('created_dt');
        //$update_by = '';
        //$update_dt = '';
        // $id_lok = $this->input->post('id_lok');
        // $price = $this->input->post('price');
        // $id_section = $this->input->post('id_section');
        //$alamat = $this->input->post('alamat');

        $tambahbrg = array(
            'part_no' => $part_no,
            'part_nm'        => 'Raw Material',
            // 'id_brand'        => $id_brand,
            'id_unit'        => $id_unit,
            'id_kategori'        => 198,
            'id_status'        => 2,
            // 'min_stok'        => $min_stok,
            'created_by'        => $created_by,
            'created_dt'        => $created_dt,
            //'update_by'        => $update_by,
            //'update_dt'        => $update_dt,
            // 'price'        => $price,
            'id_lok'        => 64,
            'id_section'        => 1
        );
        $id = $this->input->post('id_inquiry');
        $id2 = $this->input->post('id_inquiry_detail');

        $data = $this->databrg_model->insertbrg($tambahbrg);
        redirect('engineering/estimationcost/jo_incld_mtl_estimation/' . $id . '/' . $id2 . '');
        echo json_encode($data);
    }

    public function jo_materials_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');
        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id, $id2),
            'detailInq' => $this->estimationcost_model->getDetailInq($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailmaterials' => $this->estimationcost_model->jo_getdetailmaterials($id, $id2),

            'mtl_amount' => $this->estimationcost_model->jo_rmcost($id, $id2),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            //'process_amount' => $this->estimationcost_model->jo_rmcost($id,$id2),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
            'all' => $this->db->get('raw_material')->result(),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/jo_head_detail_cost', $data);
        $this->load->view('engineering/v_calculationcost/jo_materials_estimation', $data);
        $this->load->view('templete/js');
    }

    public function jo_materials_estimation_edit()
    {

        $id = $this->uri->segment('5');
        $id2 = $this->uri->segment('6');
        $id_rm = $this->uri->segment('4');
        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id, $id2),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailmaterials' => $this->estimationcost_model->jo_getdetailmaterials($id, $id2),
            'detailmaterialsedit' => $this->estimationcost_model->jo_getdetailmaterialsedit($id_rm),
            'detailInq' => $this->estimationcost_model->getDetailInq($id),
            'mtl_amount' => $this->estimationcost_model->jo_rmcost($id, $id2),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id),
            'rm_amount' => $this->estimationcost_model->RmCost($id),
            //'process_amount' => $this->estimationcost_model->jo_rmcost($id,$id2),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),

        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        // $this->load->view('templete/jo_head_detail_cost', $data);
        $this->load->view('engineering/v_calculationcost/jo_materials_estimation_edit', $data);
        $this->load->view('templete/js');
    }

    function jo_tambah_incld_material()
    {
        $id = $this->input->post('id_inquiry');
        $id2 = $this->input->post('id_inquiry_detail');
        $prod_type = $this->input->post('prod_type');
        $inq_incld_mtl = $this->input->post('inq_incld_mtl');

        $data = array(
            'id_barang'    => $this->input->post('id_brg'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'id_inquiry_detail'   => $this->input->post('id_inquiry_detail'),
            'rm_long'   => $this->input->post('long'),
            'rm_width'   => $this->input->post('width'),
            'rm_height'   => $this->input->post('height'),
            'rm_qty' => $this->input->post('rm_qty'),
            'id_shape' => $this->input->post('id_shape'),
            'price_kg' => $this->input->post('price'),
            'created_dt' => $this->input->post('created_dt'),
            'created_by' => $this->input->post('created_by'),

        );

        $this->estimationcost_model->insertestimationcost('raw_material', $data);


        redirect('engineering/estimationcost/jo_incld_mtl_estimation/' . $id . '/' . $id2 . '');

        // redirect('engineering/estimationcost/jo_materials_estimation/' . $id . '/' . $id2 . '/' . $prod_type . '/' . $part_no . '');
    }
    function jo_tambah_material()
    {
        $id = $this->input->post('id_inquiry');
        $id2 = $this->input->post('id_inquiry_detail');
        $prod_type = $this->input->post('prod_type');
        $inq_incld_mtl = $this->input->post('inq_incld_mtl');

        $data = array(
            'id_barang'    => $this->input->post('id_brg'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'id_inquiry_detail'   => $this->input->post('id_inquiry_detail'),
            'rm_long'   => $this->input->post('long'),
            'rm_width'   => $this->input->post('width'),
            'rm_height'   => $this->input->post('height'),
            'rm_qty' => $this->input->post('rm_qty'),
            'id_shape' => $this->input->post('id_shape'),
            'price_kg' => $this->input->post('price'),
            'created_dt' => $this->input->post('created_dt'),
            'created_by' => $this->input->post('created_by'),

        );

        $this->estimationcost_model->insertestimationcost('raw_material', $data);


        redirect('engineering/estimationcost/jo_materials_estimation/' . $id . '/' . $id2 . '');
        // redirect('engineering/estimationcost/jo_materials_estimation/' . $id . '/' . $id2 . '/' . $prod_type . '/' . $part_no . '');
    }

    public function jo_edit_material()
    {
        $id_inquiry = $this->input->post('id_inquiry');
        $id_inquiry_detail = $this->input->post('id_inquiry_detail');
        $prod_type = $this->input->post('prod_type');
        $part_no = $this->input->post('part_no');
        $inq_incld_mtl = $this->input->post('inq_incld_mtl');

        $data = array(
            'id_barang'    => $this->input->post('id_brg'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'id_inquiry_detail'   => $this->input->post('id_inquiry_detail'),
            'rm_long'   => $this->input->post('long'),
            'rm_width'   => $this->input->post('width'),
            'rm_height'   => $this->input->post('height'),
            'rm_qty' => $this->input->post('rm_qty'),
            'id_shape' => $this->input->post('id_shape'),
            'price_kg' => $this->input->post('price'),
            'update_dt' => $this->input->post('update_dt'),
            'update_by' => $this->input->post('update_by'),

        );
        $id_rm = $this->input->post('id_rm');
        $this->estimationcost_model->update_jo_mtl_cost($data, $id_rm);
        $inq_incld_mtl == 1 ?
            redirect('engineering/estimationcost/jo_incld_mtl_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '') :
            redirect('engineering/estimationcost/jo_materials_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '');
        // redirect('engineering/estimationcost/jo_materials_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '');
        // redirect('engineering/estimationcost/jo_materials_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '/' . $prod_type . '/' . $part_no . '');
    }

    // ---------------------------------------- JO Process estimation -------------------------------------------------------

    public function jo_process_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');
        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailInq' => $this->estimationcost_model->getDetailInq($id),
            'detailprocess' => $this->estimationcost_model->jo_getdetailprocess($id, $id2),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'mtl_process' => $this->estimationcost_model->select_mtlprocess($id2)->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id),
            'processamount' => $this->estimationcost_model->jo_processCost($id, $id2),
            // 'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/jo_head_detail_cost', $data);
        $this->load->view('engineering/v_calculationcost/jo_process_estimation', $data);
        $this->load->view('templete/js');
    }

    public function jo_process_estimation_edit()
    {

        $id_process_dtl = $this->uri->segment('4');
        $id = $this->uri->segment('5');
        $id2 = $this->uri->segment('6');
        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailprocessedit' => $this->estimationcost_model->jo_getdetailprocessedit($id_process_dtl),
            'detailprocess' => $this->estimationcost_model->jo_getdetailprocess($id, $id2),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'mtl_process' => $this->estimationcost_model->select_mtlprocess($id2)->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id),
            'processamount' => $this->estimationcost_model->jo_processCost($id, $id2),
            // 'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        // $this->load->view('templete/jo_head_detail_cost', $data);
        $this->load->view('engineering/v_calculationcost/jo_process_estimation_edit', $data);
        $this->load->view('templete/js');
    }

    function jo_tambah_process()
    {
        $id = $this->input->post('id_inquiry');
        $id2 = $this->input->post('id_inquiry_detail');
        $prod_type = $this->input->post('prod_type');
        $part_no = $this->input->post('part_no');

        $data = array(
            'id_process'    => $this->input->post('id_process'),
            'id_machine'    => $this->input->post('id_machine'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'id_inquiry_detail'   => $this->input->post('id_inquiry_detail'),
            'mc_time' => $this->input->post('mc_time'),
            'jasa_cost' => $this->input->post('jasa_cost'),
            'mc_cost' => $this->input->post('mc_cost'),
            'id_barang' => $this->input->post('id_barang'),
            'subcont_process' => $this->input->post('subcont_process'),
            'subcont_name' => $this->input->post('subcont_name'),


        );

        $this->estimationcost_model->insertestimationcost('process_detail', $data);
        redirect('engineering/estimationcost/jo_process_estimation/' . $id . '/' . $id2 .  '');
        // redirect('engineering/estimationcost/jo_process_estimation/' . $id . '/' . $id2 . '/' . $prod_type . '/' . $part_no . '');
    }

    function jo_edit_process()
    {
        $id_inquiry = $this->input->post('id_inquiry');
        $id_inquiry_detail = $this->input->post('id_inquiry_detail');
        $prod_type = $this->input->post('prod_type');
        $part_no = $this->input->post('part_no');

        $data = array(
            'id_process'    => $this->input->post('id_process'),
            'id_machine'    => $this->input->post('id_machine'),
            'id_inquiry'   => $this->input->post('id_inquiry'),
            'id_inquiry_detail'   => $this->input->post('id_inquiry_detail'),
            'mc_time' => $this->input->post('mc_time'),
            'jasa_cost' => $this->input->post('jasa_cost'),
            'mc_cost' => $this->input->post('mc_cost'),
            'id_barang' => $this->input->post('id_barang'),
            'subcont_process' => $this->input->post('subcont_process'),
            'subcont_name' => $this->input->post('subcont_name'),


        );
        $id = $this->input->post('id_process_detail');
        $this->estimationcost_model->update_jo_process_cost($data, $id);
        redirect('engineering/estimationcost/jo_process_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '');
        redirect('engineering/estimationcost/jo_process_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '/' . $prod_type . '/' . $part_no . '');
    }

    public function jo_others_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');
        $data = array(
            'title' => $id,
            'id_inquiry_detail' => $id2,
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'detailtools' => $this->estimationcost_model->getdetailtools($id),
            'detailmaterials' => $this->estimationcost_model->jo_getdetailmaterials($id, $id2),
            'detailprocess' => $this->estimationcost_model->jo_getdetailprocess($id, $id2),
            'detailothetedit' => $this->estimationcost_model->jo_getdetailotheredit($id2),
            'detailInq' => $this->estimationcost_model->getDetailInq($id),
            'tools' => $this->estimationcost_model->select_barang()->result(),
            'materials' => $this->estimationcost_model->select_material()->result(),
            'process' => $this->estimationcost_model->select_process()->result(),
            'machineType' => $this->estimationcost_model->select_machineType()->result(),
            'tools_amount' => $this->estimationcost_model->toolsCost($id2),
            'mtl_amount' => $this->estimationcost_model->jo_rmcost($id, $id2),
            'processamount' => $this->estimationcost_model->jo_processCost($id, $id2),
            //'process_amount' => $this->estimationcost_model->ProcessCost($id),
            'detailestimation' => $this->estimationcost_model->getDetailestimation($id2),
        );
        //$data['amount'] = $this->estimationcost_model->toolsCost();

        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('templete/jo_head_detail_cost', $data);
        $this->load->view('engineering/v_calculationcost/jo_others_estimation', $data);
        $this->load->view('templete/js');
    }




    public function jo_delete_tool()
    {
        $id_tool = $this->uri->segment('4');
        $id_inquiry = $this->uri->segment('5');
        $id_inquiry_detail = $this->uri->segment('6');
        $prod_type = $this->uri->segment('7');
        $part_no = $this->uri->segment('8');

        if ($this->estimationcost_model->jo_delete_tool($id_tool)) {
            redirect('engineering/estimationcost/jo_tools_estimation/' . $id_inquiry . '/' . $id_inquiry_detail .  '');
            // redirect('engineering/estimationcost/jo_tools_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '/' . $prod_type . '/' . $part_no . '');
        }
    }

    public function jo_delete_rm()
    {
        $id_rm = $this->uri->segment('4');
        $id_inquiry = $this->uri->segment('5');
        $id_inquiry_detail = $this->uri->segment('6');
        $inq_incld_mtl = $this->uri->segment('7');
        $part_no = $this->uri->segment('8');

        // echo  $id_inquiry;
        // echo $id_rm;
        // echo $id_inquiry_detail;
        if ($this->estimationcost_model->jo_delete_rm($id_rm)) {
            $inq_incld_mtl == 1 ?
                redirect('engineering/estimationcost/jo_incld_mtl_estimation/' . $id_inquiry . '/' . $id_inquiry_detail .  '') :
                redirect('engineering/estimationcost/jo_materials_estimation/' . $id_inquiry . '/' . $id_inquiry_detail .  '');
            // redirect('engineering/estimationcost/jo_materials_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '/' . $prod_type . '/' . $part_no . '');
        }
    }

    public function jo_delete_process()
    {
        $id = $this->uri->segment('4');
        $id_inquiry = $this->uri->segment('5');
        $id_inquiry_detail = $this->uri->segment('6');
        $prod_type = $this->uri->segment('7');
        $part_no = $this->uri->segment('8');


        if ($this->estimationcost_model->jo_delete_process($id)) {
            redirect('engineering/estimationcost/jo_process_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '');
            // redirect('engineering/estimationcost/jo_process_estimation/' . $id_inquiry . '/' . $id_inquiry_detail . '/' . $prod_type . '/' . $part_no . '');
        }
    }

    //=================================End JO Calculation ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    public function update_inq_detail_cost()
    {
        $objdata = array(

            'cost_tool'     => $this->input->post('cost_tool'),
            'cost_mtl'     => $this->input->post('cost_mtl'),
            'cost_process'    => $this->input->post('cost_process'),
            'cost_pack'     => $this->input->post('cost_pack'),
            'cost_del' => $this->input->post('cost_del'),
            'cost_overhead' => $this->input->post('cost_overhead'),
            // 'id_inquiry'   => $this->input->post('id_inquiry'),
            'inq_dtl_update_by'   => $this->input->post('update_by'),
            'inq_dtl_update_dt'   => $this->input->post('today'),
            'inq_dtl_sts'      => '1',
            'inq_dtl_note'      => $this->input->post('note'),
            //'approve'      => $this->input->post('approve'),


        );
        // print_r($objdata);
        $id2 = $this->input->post('id_inquiry_detail');
        $id = $this->input->post('id_inquiry');
        $this->estimationcost_model->update_inqdtl_cost($objdata, $id2);

        redirect('engineering/estimationcost/list_estimation/' . $id . '');
    }




    public function list_estimation()
    {

        $id = $this->uri->segment('4');
        $id2 = $this->uri->segment('5');
        // $b['data']=$this->db->estimationcost_model->countbyInquiry();

        $data = array(
            'title' => $id,
            'detailpartinquiry' => $this->estimationcost_model->getDetailpartInquiry2($id),
            'detailinquiry' => $this->estimationcost_model->getdetailinquiry($id),
            'total_amount' => $this->estimationcost_model->jo_costtotal($id),
            'grtotal_amount' => $this->estimationcost_model->jo_grcosttotal($id),
            'detailInq' => $this->estimationcost_model->getDetailInq($id),

        );


        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('engineering/v_calculationcost/list_calculationcost', $data);
        $this->load->view('templete/js');
    }



    // public function update_estimation()
    // {
    //     $objdata = array(

    //         'cost_tools'     => $this->input->post('cost_tools'),
    //         'cost_materials'     => $this->input->post('cost_materials'),
    //         'cost_process'    => $this->input->post('cost_process'),
    //         'cost_packing'     => $this->input->post('cost_packing'),
    //         'cost_transportation' => $this->input->post('cost_transportation'),
    //         'id_inquiry'   => $this->input->post('id_inquiry'),
    //         'esti_update_by'   => $this->input->post('update_by'),
    //         'esti_update_dt'   => $this->input->post('today'),
    //         'esti_status'      => '1',
    //         'esti_note'      => $this->input->post('note'),
    //         //'approve'      => $this->input->post('approve'),


    //     );

    //     $id = $this->input->post('id_inquiry');
    //     $this->estimationcost_model->updateestimationcost($objdata, $id);

    //     $cost_tools   = $this->input->post('cost_tools');
    //     $cost_materials  = $this->input->post('cost_materials');
    //     $cost_process    = $this->input->post('cost_process');
    //     $cost_packing     = $this->input->post('cost_packing');
    //     $cost_transportation = $this->input->post('cost_transportation');
    //     $data['quotation_price'] = $cost_tools + $cost_materials + $cost_process + $cost_packing + $cost_transportation;
    //     $data['eng_approve'] = '1';
    //     $this->estimationcost_model->updateinquirysts($data, $id);

    //     redirect('engineering/estimationcost');
    // }

    public function update_engsts()
    {

        date_default_timezone_set('Asia/Jakarta');
        $user = $this->session->userdata('user_logged')->username;
        $today = date("Y-m-d H:i:s");

        $data = array(
            'eng_approve' => '1',
            'id_inquiry' => $this->uri->segment('4'),
            'eng_app_dt' => $today,

        );

        $objdata = array(
            'esti_status' => '1',
            'id_inquiry' => $this->uri->segment('4'),
            'esti_update_dt' => $today,
            'esti_update_by' => $user,
        );

        $id = $this->uri->segment('4');
        $this->estimationcost_model->updateinquirysts($data, $id);
        $this->estimationcost_model->updateestimationsts($objdata, $id);
        // print_r($data);


        redirect('engineering/estimationcost');
        // echo $data;
    }
    public function cancel_engsts()
    {

        date_default_timezone_set('Asia/Jakarta');
        $user = $this->session->userdata('user_logged')->username;
        $today = date("Y-m-d H:i:s");

        $data = array(
            'eng_approve' => '0',
            'id_inquiry' => $this->uri->segment('4'),
            'eng_app_dt' => $today,

        );

        $objdata = array(
            'esti_status' => '0',
            'id_inquiry' => $this->uri->segment('4'),
            'esti_update_dt' => $today,
            'esti_update_by' => $user,
        );

        $id = $this->uri->segment('4');
        $this->estimationcost_model->updateinquirysts($data, $id);
        $this->estimationcost_model->updateestimationsts($objdata, $id);
        // print_r($data);


        redirect('engineering/estimationcost');
        // echo $data;
    }

    public function recalculate_estimationcost()
    {
        $objdata = array(

            'cost_mtl' => '0',
            'cost_process' => '0',
            'cost_tool' => '0',
            'cost_del' => '0',
            'cost_pack' => '0',
            'cost_overhead' => '0',
            'estimation_finish' => '0',
            'profit_percent' => '0',
            'transport_percent' => '0'


        );

        $id = $this->uri->segment('4');
        $this->estimationcost_model->recalculate_estimationcost($objdata, $id);
        $this->estimationcost_model->delete_costprocess($id);
        $this->estimationcost_model->delete_costtools($id);
        $this->estimationcost_model->delete_costrm($id);

        redirect('engineering/estimationcost/list_estimation/' . $id . '');
    }



    public function update_typeprod()
    {
        $objdata = array(

            'cost_mtl' => '0',
            'cost_process' => '0',
            'cost_tool' => '0',
            'cost_del' => '0',
            'cost_pack' => '0',
            'cost_overhead' => '0',
            'estimation_finish' => '0',
            'profit_percent' => '0',
            'transport_percent' => '0'


        );

        // $id = $this->uri->segment('4');
        $id = $this->input->post('id_inquiry');
        $this->estimationcost_model->recalculate_estimationcost($objdata, $id);
        $this->estimationcost_model->delete_costprocess($id);
        $this->estimationcost_model->delete_costtools($id);
        $this->estimationcost_model->delete_costrm($id);

        $data['type_prod'] = $this->input->post('type_prod');
        $data['type_process'] = $this->input->post('type_process');
        $this->estimationcost_model->updatetypeprod($data, $id);

        redirect('engineering/estimationcost/list_estimation/' . $id . '');
    }


    public function hapusestimationcost()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->estimationcost_model->hapusdataestimationcost($id);

        echo json_encode($data);
    }

    public function hapusDetailEstimationcost()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        //$data = $this->estimationcost_model->hapusdataestimationcost($id);
        $data = $this->estimationcost_model->hapusToolscost($id);
        $data = $this->estimationcost_model->hapusProcesscost($id);
        $data = $this->estimationcost_model->hapusMaterialcost($id);
        echo json_encode($data);
    }

    public function formcreatequotation()
    {
        // id yang telah diparsing pada ajax ajaxcrud_brg.php data{id:id}
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $id = $this->input->post('id');
        $data['dataperestimationcost'] = $this->estimationcost_model->dataestimationcost($id);
        $this->load->view('admin/v_kategori/formeditestimationcost', $data);
    }
}
