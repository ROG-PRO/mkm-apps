<?php

defined('BASEPATH') or exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Workorder
 *
 * @author jamaludin
 */
class Workorder extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Workorder_model');
        $this->load->model('Wohistory_model');
        $this->load->model("Socustomer_model");
        $this->load->model("Inventory_model");
        $this->load->model("auth_model");
        if ($this->auth_model->isNotLogin())
            redirect(site_url('login'));
    }

    public function index()
    {
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $data['datawo'] = $this->Workorder_model->getdata();
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('production/wo');
        $this->load->view('templete/js');
    }

    public function detail($wo)
    {
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $data['datawo'] = $this->Workorder_model->getdata($wo);
        $data['datahistory'] = $this->Wohistory_model->getbywo($wo);
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('production/wodetail', $data);
        $this->load->view('templete/js');
    }

    //function generate wo history id
    public function woh_no($wo)
    {
        $lastno = $this->Wohistory_model->getlastid($wo);

        if ($lastno->maxid == null) {
            $newno = 1;
        } else {
            $newno = $lastno->maxid + 1;
        };

        return $newno;
    }

    //function create WO form SO
    public function woproses($id)
    {
        //get data from SO and SO-Detail
        $sodata = $this->Socustomer_model->getbyno($id);
        $sodetail = $this->Socustomer_model->getdetailpart($id);

        //generate data WO
        $datawo = array();
        $n = 1;
        foreach ($sodetail as $part) {
            $exp = explode("-", $sodata->so_pono);
            $wo_no = $exp[1] . "_" . sprintf("%04s", $n++);

            $datawo[] = array(
                "wo_id" => $wo_no,
                "wo_date" => date('Y-m-d H:i:S'),
                "wo_sono" => $sodata->so_no,
                "wo_itemcode" => $part->sod_itemcode,
                "wo_itemname" => $part->sod_itemname,
                "wo_qty" => $part->sod_qty,
                "wo_qtyfinish" => 0,
                "wo_status" => '50'
            );
        };

        //insert to work order
        $this->Workorder_model->insertdata($datawo);

        //generate data history
        $datawoh = [
            "woh_id" => $this->woh_no($wo_no),
            "woh_woid" => $wo_no,
            "woh_date" => date('Y-m-d H:i:s'),
            "woh_operator" => $this->session->userdata('user_logged')->fullname,
            "woh_text" => "Work order release to production"
        ];
        //insert data history
        $this->Wohistory_model->inserthistory($datawoh);

        //update WO, marking already generate WO
        $so = [
            "so_prodwo" => '1',
        ];
        $this->Socustomer_model->update($sodata->so_id, $so);
        redirect('production/workorder/');
    }

    //function rilis WO to Production
    // set status WO from 50 to 100, and set date for start & deadline
    public function rilis()
    {
        $post = $this->input->post();
        $woid = $post['woid'];
        print_r($post);
        echo '<br/>';
        $datawo = [
            "wo_status" => '100',
            "wo_start" => $post['wostartdt'] . " " . $post['wostarttm'],
            "wo_end" => $post['woenddt'] . " " . $post['woendtm']
        ];

        $this->Workorder_model->updatewo($woid, $datawo);
        print_r($datawo);


        $datawoh = [
            "woh_id" => $this->woh_no($woid),
            "woh_woid" => $woid,
            "woh_date" => date('Y-m-d H:i:s'),
            "woh_operator" => $this->session->userdata('user_logged')->fullname,
            "woh_text" => "Work order release to production"
        ];
        print_r($datawoh);

        $this->Wohistory_model->inserthistory($datawoh);

        redirect('production/workorder/');
    }

    public function deliver()
    {
        $post = $this->input->post();
        print_r($post);

        $woid = $post['wono'];
        $qty = $post['woqty'];
        $fnqty = $post['wofqty'];
        $ngqty = $post['wonqty'];
        //$balance = $qty - $fnqty;

        $wo = $this->Workorder_model->getdata($woid);

        $qtyfinish = $wo->wo_qtyfinish + $fnqty + $ngqty;
        $qtyng = $wo->wo_qtyng + $ngqty;

        $balance = $wo->wo_qty - $qtyfinish;

        //echo $balance;
        //set data for update wo
        if ($balance <= 0) {
            $status = '200';
        } else {
            $status = '150';
        }

        $datawo = [
            "wo_status" => $status,
            "wo_qtyfinish" => $qtyfinish,
            "wo_qtyng" => $qtyng
        ];
        $this->Workorder_model->updatewo($woid, $datawo);

        //set data for wo history
        $datawoh = [
            "woh_id" => $this->woh_no($woid),
            "woh_woid" => $woid,
            "woh_date" => $post['wodeldate'],
            "woh_operator" => $post['woopr'],
            "woh_process" => $post['woprocess'],
            "woh_qtyin" => $qty,
            "woh_qtyout" => $fnqty + $ngqty,
            "woh_qtyng" => $ngqty,
            "woh_text" => "Production process"
        ];

        echo $this->Inventory_model->stockin("FG01", $wo->wo_itemcode, $wo->wo_itemname, $fnqty, "");
        echo $this->Inventory_model->stockin("NG01", $wo->wo_itemcode, $wo->wo_itemname, $ngqty, "");

        $this->Wohistory_model->inserthistory($datawoh);

        //print_r($datawoh);

        redirect('production/workorder/');
    }
}
