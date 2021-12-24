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
class Stock extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("Inventory_model");
        if ($this->auth_model->isNotLogin())
            redirect(site_url('login'));
    }
    
    public function index() {
        $uri2 = $this->uri->segment(2);
        $data['title'] = $uri2;
        $data['inventory'] = $this->Inventory_model->getall();
        $this->load->view('templete/header', $data);
        $this->load->view('templete/sidebar');
        $this->load->view('purchasing/stock/stock');
        $this->load->view('templete/js');
    }

//    public function stockin($itemcode,$loc,$qty){
//
//    }

//    public function stockout($itemcode,$loc,$qty){
//        
//    }
}
