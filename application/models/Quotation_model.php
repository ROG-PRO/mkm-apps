<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Quotation_model extends CI_Model
{

    public function getdataquotation()
    {
        $inqSts = array('0', '1');
        $this->db->select('*');
        $this->db->from('log_inquiry');
        $this->db->where('inquiry_status2', '1');
        $this->db->where('quotation_flex', '1');
        // $this->db->where_in('inquiry_status', $inqSts);
        $this->db->order_by('id_inquiry', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getinquiryno()
    {
        $inqSts = array('0', '1');
        $this->db->select('*');
        $this->db->from('log_inquiry');
        $this->db->where('inquiry_status2', '1');
        $this->db->where('quotation_flex', '0');
        $this->db->where_in('inquiry_status', $inqSts);
        $this->db->order_by('id_inquiry', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getaddquotation()
    {
        $this->db->select('*');
        $this->db->from('log_inquiry');
        $this->db->where('inquiry_status', '0');
        $this->db->order_by('id_inquiry', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataquoedit($id)
    {
        $this->db->select('*');
        $this->db->from('log_inquiry');
        $this->db->join('customer', 'customer.customer_cd = log_inquiry.cust_cd');
        $this->db->where('log_inquiry.id_inquiry', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getDetailpartInquiry($id)
    {
        return $this->db->query("SELECT * from v_hpp_profit
         where id_inquiry = '$id'")->result();
    }
    function getDetailpartInquiryPRINT($id)
    {
        return $this->db->query("SELECT * from v_hpp_profit
         where id_inquiry = '$id' and quo_print_flex = '1' ")->result();
    }

    function getDetailprintQuo($id)
    {
        return $this->db->query("SELECT * from v_hpp_profit
         where id_inquiry = '$id' and quo_print_flex = '1' ")->result();
    }
    function getpercentpartInquiry($id)
    {
        return $this->db->query("SELECT distinct(profit_percent), from v_hpp_profit
         where id_inquiry = '$id'")->result();
    }

    public function getinquirybysoflex()
    {
        $this->db->select('*');
        $this->db->from('log_inquiry');
        $this->db->where('log_inquiry.so_flex', "0");
        return $this->db->get()->result();
        //$query = $this->db->get();
        //return $query->result();
    }
    // public function insertinquiry($data)
    // {
    //     return $this->db->insert('log_inquiry', $data);
    // }

    // public function insertinquiry2eng($data2)
    // {
    //     return $this->db->insert('estimation_cost', $data2);
    // }

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

    // public function ubahinquiry($data, $id)
    // {
    //     $this->db->where('id_inquiry', $id);
    //     return $this->db->update('log_inquiry', $data);
    // }

    public function updateinquiry($objdata, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('log_inquiry', $objdata);
    }
    // public function update_qnNote($data, $id)
    // {
    //     $this->db->where('id_inquiry', $id);
    //     return $this->db->update('log_inquiry', $data);
    // }

    public function updatequotation($objdata, $qNo)
    {
        $this->db->where('quotation_no', $qNo);
        return $this->db->update('log_inquiry', $objdata);
    }

    public function update_q_print($data, $id)
    {
        $this->db->where('id_inquiry', $id);
        // $this->db->where('quo_print_dt', 'null');
        return $this->db->update('log_inquiry', $data);
    }

    // public function hapusdatainquiry($id)
    // {
    //     $this->db->where('id_inquiry', $id);
    //     return $this->db->delete('log_inquiry');
    // }
    // public function hapusdatainquirydetail($id)
    // {
    //     $this->db->where('id_inquiry_detail', $id);
    //     return $this->db->delete('log_inquiry_detail');
    // }
    // public function hapusalldatainquirydetail($id)
    // {
    //     $this->db->where('id_inquiry', $id);
    //     return $this->db->delete('log_inquiry_detail');
    // }

    public function getKodeQuotation()
    {
        date_default_timezone_set('Asia/Jakarta');

        $cd = date("ymd");
        //$inquiry_cd = 'INQ-' . $cd;
        $q = $this->db->query("select MAX(RIGHT(quotation_no,5)) as kd_max from log_inquiry");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%05s", $tmp);
            }
        } else {
            $kd = "00001";
        }
        return "QUO-" . $cd . $kd;
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



    function sumQuotation_price($id)
    {
        $this->db->select_sum('tot_quot_price');
        $this->db->where('id_inquiry', $id);
        // $this->db->where('id_inquiry_detail', $id2);

        $query = $this->db->get('v_hpp_profit');

        return $query->row()->tot_quot_price;
    }

    function sumprintQuotation_price($id)
    {
        $this->db->select_sum('tot_quot_price');
        $this->db->where('id_inquiry', $id);
        $this->db->where('quo_print_flex', '1');
        // $this->db->where('id_inquiry_detail', $id2);

        $query = $this->db->get('v_hpp_profit');

        return $query->row()->tot_quot_price;
    }

    // public function cancelinquirysts($data, $id)
    // {
    //     $this->db->where('id_inquiry', $id);
    //     return $this->db->update('log_inquiry', $data);
    // } 


    /* crud inquiry detail */

    // function create()
    // {
    // $this->db->insert("log_inquiry_detail",array(
    //     "id_inquiry"=>"",
    //     'flex_1' => '1',
    //     'inquiry_detail_cdt' => date("Y-m-d H:i:s"),
    //     'inquiry_detail_cby' => $this->session->userdata('user_logged')->fullname,

    // ));
    // return $this->db->insert_id();
    // }


    function update($id, $value, $modul)
    {
        $this->db->where(array("id_inquiry_detail" => $id));
        $this->db->update("log_inquiry_detail", array($modul => $value));
    }

    // function delete($id)
    // {
    //     $this->db->where("id_inquiry_detail", $id);
    // $this->db->delete("log_inquiry_detail");
    // }   



}


/* End of file Databrg_model.php */
