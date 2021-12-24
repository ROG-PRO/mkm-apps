<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wohistory_model extends CI_model
{
    private $_table = "wo_history";

    public $woh_id;
    public $woh_woid;
    public $woh_date;
    public $woh_operator;
    public $woh_process;
    public $woh_qtyin;
    public $woh_qtyout;
    public $woh_qtyng;
    public $woh_remark;
    public $woh_text;

    public function inserthistory($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getlastid($wo)
    {
        $this->db->select_max('woh_id', 'maxid');
        $this->db->from($this->_table);
        $this->db->where('woh_woid', $wo);
        return $this->db->get()->row();

    }

    public function getbywo($wo)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('woh_woid', $wo);
        $this->db->order_by('woh_id', 'DESC');
        return $this->db->get()->result();
    }
}
