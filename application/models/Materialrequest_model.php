<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');


class Materialrequest_model extends CI_Model
{
    private $_table1 = "pocustomer";



    public function getdatamaterialrequest()
    {
        $this->db->select('*');
        $this->db->from('mr');
        $this->db->order_by('mr_no', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    // public function getinquirybysoflex()
    // {
    //     $this->db->select('*');
    //     $this->db->from('log_inquiry');
    //     $this->db->where('log_inquiry.so_flex', "0");
    //     return $this->db->get()->result();
    //     //$query = $this->db->get();
    //     //return $query->result();
    // }
    // public function insertinquiry($data)
    // {
    //     return $this->db->insert('log_inquiry', $data);
    // }

    // public function insertinquiry2eng($data2)
    // {
    //     return $this->db->insert('estimation_cost', $data2);
    // }

    // public function datainquiryedit($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('log_inquiry');
    //     $this->db->join('customer', 'customer.customer_cd = log_inquiry.cust_cd');
    //     $this->db->where('log_inquiry.id_inquiry', $id);
    //     $query = $this->db->get();
    //     return $query->row_array();
    // }

    function getDetailMR($id)
    {
        return $this->db->query("SELECT * from mr 

            where so_number = '$id'")->result();
    }


    public function sodetailbypart($so_number)
    {
        $this->db->select('*');
        $this->db->from('v_bom');
        $this->db->join('pocustomer', 'v_bom.id_inquiry = pocustomer.id_inquiry');
        $this->db->join('socustomer', 'pocustomer.po_no =  socustomer.so_pono');
        // $this->db->join('mr_detail', 'mr_detail.so_number =  socustomer.so_no', 'right');
        $this->db->join('sodetail', 'socustomer.so_no =  sodetail.sod_sono and v_bom.inq_part_no =  sodetail.sod_itemcode');
        // $this->db->join('mr_detail', 'mr_detail.so_number =  socustomer.so_no');
        $this->db->where('socustomer.so_no', $so_number);
        // $this->db->where('mr_detail.mtl_type_cd', 'MR-MTL');
        $this->db->order_by('v_bom.inq_part_no', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function mrdetail_rm($so_number)
    {
        $this->db->select('*');
        $this->db->from('mr_detail');
        $this->db->where('so_number', $so_number);
        $this->db->where('mtl_type_cd', 'MR-MTL');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDetailpartMR($id)
    {
        $this->db->select('*');
        $this->db->from('mr_detail');
        // $this->db->join('mr','mr.mr_no = mr_detail.mr_no', 'left');
        // $this->db->join('unit', 'unit.id_unit = log_inquiry_detail.id_unit');
        $this->db->where('so_number', $id);
        $this->db->where('mr_flex_1', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDescMR($id)
    {
        $this->db->select('*');
        $this->db->from('mr_description');
        // $this->db->join('mr','mr.mr_no = mr_detail.mr_no');
        // $this->db->join('unit', 'unit.id_unit = log_inquiry_detail.id_unit');
        $this->db->where('mr_descSO', $id);
        $this->db->where('mr_descFlex', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDetailpartMR_mtl($id)
    {
        $this->db->select('*');
        $this->db->from('mr_detail');
        //$this->db->join('mr','mr.mr_no = mr_detail.mr_no');
        // $this->db->join('unit', 'unit.id_unit = log_inquiry_detail.id_unit');
        $this->db->where('so_number', $id);
        $this->db->where('mtl_type_cd', 'MR-MTL');
        $this->db->where('mr_flex_1', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDetailpartMR_tls($id)
    {
        $this->db->select('*');
        $this->db->from('mr_detail');
        //$this->db->join('mr','mr.mr_no = mr_detail.mr_no');
        // $this->db->join('unit', 'unit.id_unit = log_inquiry_detail.id_unit');
        $this->db->where('so_number', $id);
        $this->db->where('mtl_type_cd', 'MR-TLS');
        $this->db->where('mr_flex_1', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKodeMr()
    {
        date_default_timezone_set('Asia/Jakarta');

        $cd = date("ymd");
        //$inquiry_cd = 'INQ-' . $cd;
        $q = $this->db->query("select MAX(RIGHT(mr_no,5)) as kd_max from mr");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%05s", $tmp);
            }
        } else {
            $kd = "00001";
        }
        return "MR-" . $cd . $kd;
    }

    public function getall()
    {
        $this->db->select('*');
        $this->db->from($this->_table1);
        $this->db->join('customer', 'po_customerid =  customer_cd');
        $this->db->join('socustomer', 'po_no =  so_pono');
        $this->db->where('socustomer.so_flex', '0');

        return $this->db->get()->result();
    }

    public function getformr()
    {
        $this->db->select('*');
        $this->db->from($this->_table1);
        $this->db->join('customer', 'po_customerid =  customer_cd');
        $this->db->join('socustomer', 'po_no =  so_pono');
        $this->db->where('socustomer.so_flex', '0');
        $this->db->where('socustomer.so_approved', '1');

        return $this->db->get()->result();
    }

    public function detailmr_wtsop()
    {
        $this->db->select('*');
        $this->db->from('mr_detail');
        $this->db->where('mr_flex_1', '0');
        $this->db->where('mr_wtsop_flex', '0');
        $query = $this->db->get();
        return $query->result();
    }

    public function detailmr_wsop()
    {
        $this->db->select('*');
        $this->db->from('mr_detail');
        $this->db->where('mr_flex_1', '0');
        $this->db->where('mr_wsop_flex', '0');
        $query = $this->db->get();
        return $query->result();
    }

    public function detailmr_others()
    {
        $this->db->select('*');
        $this->db->from('mr_description');
        $this->db->where('mr_descFlex', '0');
        $query = $this->db->get();
        return $query->result();
    }


    public function updatemrdetail($data)
    {
        $this->db->where('mr_flex_1', '0');
        return $this->db->update('mr_detail', $data);
    }
    public function updatesocustflex($sodata, $so_number)
    {
        $this->db->where('so_flex', '0');
        $this->db->where('so_no', $so_number);
        return $this->db->update('socustomer', $sodata);
    }


    public function hapusdatamrdetail($id)
    {
        $this->db->where('mr_detail_id', $id);
        return $this->db->delete('mr_detail');
    }

    public function hapusdatamr_desc($id)
    {
        $this->db->where('mr_descID', $id);
        return $this->db->delete('mr_description');
    }

    public function insertdetail($data)
    {
        return $this->db->insert_batch('mr_detail', $data);
    }

    public function updatedetail($data)
    {
        return $this->db->update_batch('mr_detail', $data);
    }

    public function insertmr($data)
    {
        return $this->db->insert('mr', $data);
    }


    public function select_customer()
    {
        $this->db->select('*');
        $this->db->from('customer');
        return $this->db->get();
    }

    public function select_unit()
    {
        $this->db->select('*');
        $this->db->from('unit');
        return $this->db->get();
    }
    public function select_kodemtltype()
    {
        $this->db->select('*');
        $this->db->from('mtl_type');
        return $this->db->get();
    }

    /* crud mr detail */

    function create($uri4)
    {
        $this->db->insert("mr_detail", array(
            'so_number' => $uri4,
            'mr_flex_1' => '1',
            'mr_created_by' => $this->session->userdata('user_logged')->fullname,
            'mr_created_dt' => date("Y-m-d H:i:s"),
            // 'so_number' => $uri4
        ));
        return $this->db->insert_id();
    }


    function update($id, $value, $modul)
    {
        $this->db->where(array("mr_detail_id" => $id));
        $this->db->update("mr_detail", array($modul => $value));
    }

    function delete($id)
    {
        $this->db->where("mr_detail_id", $id);
        $this->db->delete("mr_detail");
    }

    /* crud mr desc */

    function create_desc($uri4)
    {
        $this->db->insert("mr_description", array(
            'mr_descSO' => $uri4,
            'mr_descFlex' => '1',
            'mr_descUpdateby' => $this->session->userdata('user_logged')->fullname,
            'mr_descUpdatedt' => date("Y-m-d H:i:s"),
            // 'so_number' => $uri4
        ));
        return $this->db->insert_id();
    }


    function update_desc($id, $value, $modul)
    {
        $this->db->where(array("mr_descID" => $id));
        $this->db->update("mr_description", array($modul => $value));
    }

    function delete_desc($id)
    {
        $this->db->where("mr_descID", $id);
        $this->db->delete("mr_description");
    }

    function delete_mr_detail($so_no)
    {
        $this->db->where("so_number", $so_no);
        return $this->db->delete("mr_detail");
    }
    function delete_mr($so_no)
    {
        $this->db->where("so_number", $so_no);
        return $this->db->delete("mr");
    }
    public function updatesosts($so_no, $data)
    {
        $this->db->where('so_no', $so_no);
        return $this->db->update('socustomer', $data);
    }
}


/* End of file Databrg_model.php */
