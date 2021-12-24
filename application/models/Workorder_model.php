<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Workorder_model extends CI_model
{
    private $_table = "workorder";

    public $wo_id;
    public $wo_date;
    public $wo_sono;
    public $wo_itemcode;
    public $wo_itemname;
    public $wo_qty;
    public $wo_qtyfinish;
    public $wo_start;
    public $wo_end;
    public $wo_status;
    public $wo_remark;

    public function insertdata($data)
    {
        return $this->db->insert_batch($this->_table, $data);
    }

    public function getdata($id = false)
    {
        if ($id == false) {
            $this->db->select('*');
            $this->db->from($this->_table);
            return $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->where('wo_id', $id);
            return $this->db->get()->row();
        }
    }

    public function updatewo($id, $data)
    {
        $this->db->where('wo_id', $id);
        return $this->db->update($this->_table, $data);
    }
}
