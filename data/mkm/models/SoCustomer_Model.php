<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SoCustomer_Model extends CI_Model
{
    //inisiasi table data so customer
    private $_table1 = 'socustomer';
    //inisiasi table detail data part so customer
    private $_table2 = 'sodetail';

    //get all data join table customer
    public function getall()
    {
        $this->db->select('*');
        $this->db->from($this->_table1);
        $this->db->join('customer', 'so_customerid = customer_cd2');
        return $this->db->get()->result();
    }

    //function insert data SO
    public function insertso($data)
    {
        return $this->db->insert($this->_table1, $data);
    }

    //function insert detail data part so
    public function insertdetail($data)
    {
        return $this->db->insert_batch($this->_table2, $data);
    }
}
