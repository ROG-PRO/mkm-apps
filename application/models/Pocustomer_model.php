<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pocustomer_model extends CI_Model
{
    private $_table1 = "pocustomer";

    public function getall()
    {
        $this->db->select('*');
        $this->db->from($this->_table1);
        $this->db->join('customer', 'po_customerid =  customer_cd');
        $this->db->join('socustomer', 'po_pono =  so_pono', 'left');
        $this->db->join('log_inquiry', 'log_inquiry.id_inquiry =  pocustomer.id_inquiry', 'left');
        $this->db->where('log_inquiry.inquiry_status >=', '2');
        return $this->db->get()->result();
    }

    public function getdatapocustomer()
    {
        $this->db->select('*');
        $this->db->from($this->_table1);
        $this->db->order_by('id_pocustomer', 'desc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getpobypodflex()
    {
        $this->db->select('*');
        $this->db->from('podetail');
        $this->db->where('podetail.pod_flex', '0');
        // $this->db->where('log_inquiry.inquiry_status', "1");
        return $this->db->get()->result();
        //$query = $this->db->get();
        //return $query->result();
    }

    public function detailPo()
    {
        $this->db->select('*');
        $this->db->from('podetail');
        // $this->db->join('unit', 'unit.id_unit = log_inquiry_detail.id_unit');
        //$this->db->where('id_inquiry', $id);
        $this->db->where('pod_flex', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertpocustomer($data)
    {
        return $this->db->insert('pocustomer', $data);
    }

    public function updatepocustomerdetail($objdata, $user)
    {
        $this->db->where('pod_flex', 0);
        $this->db->where('pod_createdby', $user);
        return $this->db->update('podetail', $objdata);
    }

    public function insertdetail($data)
    {
        return $this->db->insert_batch('podetail', $data);
    }

    public function datapocustomeredit($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table1);
        $this->db->where('id_pocustomer', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahpocustomer($data, $id)
    {
        $this->db->where('po_no', $id);
        return $this->db->update('pocustomer', $data);
    }

    public function hapusdatapocustomer($id)
    {
        $this->db->where('id_pocustomer', $id);
        return $this->db->delete('pocustomer');
    }

    public function hapuspodetail($id)
    {
        $this->db->where('pod_id', $id);
        return $this->db->delete('podetail');
    }

    public function insertcsv($data)
    {
        return $this->db->insert('pocustomer', $data);
    }

    /**
     * Fungsi untuk menampilkan data dari database.
     *
     */

    public function select_unit()
    {
        $this->db->select('*');
        $this->db->from('unit');
        return $this->db->get();
    }
    public function select_customer()
    {
        $this->db->select('*');
        $this->db->from('customer');
        return $this->db->get();
    }



    public function newPOid()
    {
        date_default_timezone_set('Asia/Jakarta');

        $cd = date("ymd");
        //$inquiry_cd = 'INQ-' . $cd;
        $q = $this->db->query("select MAX(RIGHT(po_no,5)) as kd_max from pocustomer");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%05s", $tmp);
            }
        } else {
            $kd = "00001";
        }
        return "PO-" . $cd . $kd;
    }

    public function getbyno($no)
    {
        //$this->db->select('*');
        $this->db->from($this->_table1);
        $this->db->join('customer', 'po_customerid = customer_cd');
        $this->db->where('po_no', $no);
        return $this->db->get()->row();
    }

    public function getdetailpart($no)
    {
        $where = array('pod_pono =' => $no);
        return $this->db->get_where("podetail", $where)->result();
    }
}


/* End of file Databrg_model.php */
