<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Inquiry_model extends CI_Model
{

    public function getdatainquiry()
    {
        $this->db->select('*');
        $this->db->from('log_inquiry');
        // $this->db->where('inquiry_cancel', "0");
        $this->db->order_by('id_inquiry', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getinquirybysoflex()
    {
        $this->db->select('*');
        $this->db->from('log_inquiry');
        $this->db->where('log_inquiry.so_flex', "0");
        $this->db->where('log_inquiry.inquiry_status', "1");
        return $this->db->get()->result();
        //$query = $this->db->get();
        //return $query->result();
    }


    public function getinquirybyid($id)
    {
        $this->db->select('*');
        $this->db->from('log_inquiry');
        $this->db->where('log_inquiry.id_inquiry', $id);
        return $this->db->get()->row();
    }

    function get_DataInquiry($id)
    {
        return $this->db->query("SELECT * from log_inquiry
            where id_inquiry = '$id' ")->result();
    }


    public function inquirydetailbyid($id)
    {
        $this->db->select('*');
        $this->db->from('log_inquiry_detail');
        $this->db->where('id_inquiry', $id);
        return $this->db->get()->result();
    }

    public function insertinquiry($data)
    {
        return $this->db->insert('log_inquiry', $data);
    }

    public function insertinquiry2eng($data2)
    {
        return $this->db->insert('estimation_cost', $data2);
    }

    public function datainquiryedit($id)
    {
        $this->db->select('*');
        $this->db->from('log_inquiry');
        $this->db->join('customer', 'customer.customer_cd = log_inquiry.cust_cd');
        $this->db->where('log_inquiry.id_inquiry', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function detailinquiry($id)
    {
        $this->db->select('*');
        $this->db->from('log_inquiry_detail');
        // $this->db->join('unit', 'unit.id_unit = log_inquiry_detail.id_unit');
        //$this->db->where('id_inquiry', $id);
        $this->db->where('flex_1', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertcsv($data)
    {
        return $this->db->insert('log_inquiry_detail', $data);
    }

    public function ubahinquiry($data, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('log_inquiry', $data);
    }

    public function updateinquiry($objdata, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('log_inquiry', $objdata);
    }
    public function updateinquirydetail($data)
    {
        $this->db->where('flex_1', '0');
        return $this->db->update('log_inquiry_detail', $data);
    }

    public function updateprofit_percent($data, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('log_inquiry_detail', $data);
    }

    public function hapusdatainquiry($id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->delete('log_inquiry');
    }
    public function hapusdatainquirydetail($id)
    {
        $this->db->where('id_inquiry_detail', $id);
        return $this->db->delete('log_inquiry_detail');
    }
    public function hapusalldatainquirydetail($id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->delete('log_inquiry_detail');
    }

    public function cancelinquiry($data, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('log_inquiry', $data);
    }

    public function getKodeInquiry()
    {
        date_default_timezone_set('Asia/Jakarta');

        $cd = date("ymd");
        //$inquiry_cd = 'INQ-' . $cd;
        $q = $this->db->query("select MAX(RIGHT(id_inquiry,5)) as kd_max from log_inquiry");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%05s", $tmp);
            }
        } else {
            $kd = "00001";
        }
        return "INQ-" . $cd . $kd;
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


    /* crud inquiry detail */

    function create()
    {
        $this->db->insert("log_inquiry_detail", array(
            "id_inquiry" => "",
            'flex_1' => '1',
            'inquiry_detail_cdt' => date("Y-m-d H:i:s"),
            'inquiry_detail_cby' => $this->session->userdata('user_logged')->fullname,

        ));
        return $this->db->insert_id();
    }


    function update($id, $value, $modul)
    {
        $this->db->where(array("id_inquiry_detail" => $id));
        $this->db->update("log_inquiry_detail", array($modul => $value));
    }

    function delete($id)
    {
        $this->db->where("id_inquiry_detail", $id);
        $this->db->delete("log_inquiry_detail");
    }
}


/* End of file Databrg_model.php */
