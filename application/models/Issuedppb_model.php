<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');


class Issuedppb_model extends CI_Model
{
    private $_table2 = "ppb_detail";

    

    public function getdataissuedPPB()
    {
        $this->db->select('*');
        $this->db->from('ppb');
        $this->db->order_by('ppb_id', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getmrbyso($sono)
    {
        $this->db->select('*');
        $this->db->from('mr');
        $this->db->join('socustomer','socustomer.so_no = mr.so_number','left');
        $this->db->join('customer','customer.customer_cd2 = socustomer.so_customerid','left');
        $this->db->where('mr.so_number',$sono);
        $this->db->order_by('mr.mr_id', 'asc');
        return $this->db->get()->row();
        // $query = $this->db->get();
        // return $query->result_array();
    }

    public function getppbdetail()
    {
        $this->db->select('*');
        $this->db->from('ppb_detail');
        $this->db->order_by('ppb_detail_id', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getmrdetailbyso($sono)
    {
        $this->db->select('*');
        $this->db->from('mr_detail');
        $this->db->where('so_number',$sono);
        $this->db->order_by('mr_detail_id', 'asc');
        return $this->db->get()->result();
        // $query = $this->db->get();
        // return $query->result_array();
    }
    
    public function getbyppbflex()
    {
        $this->db->select('*');
        $this->db->from('ppb_detail');
        $this->db->where('ppb_detail_flex', "0");
        return $this->db->get()->result();
        //$query = $this->db->get();
        //return $query->result();
    }
    public function insertissuedppb($data)
    {
        return $this->db->insert('ppb', $data);
    }

    

    public function datappbedit($id)
    {
        $this->db->select('*');
        $this->db->from('ppb');
        $this->db->join('customer', 'customer.customer_cd = log_inquiry.cust_cd');
        $this->db->where('log_inquiry.id_inquiry', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getDetailppb($id)
    {
        return $this->db->query("SELECT * from ppb 

            where ppb_no = '$id'")->result();
    }

    public function getDetailpartppb($id)
    {
        $this->db->select('*');
        $this->db->from('ppb_detail');
        // $this->db->join('unit', 'unit.id_unit = log_inquiry_detail.id_unit');
        $this->db->where('ppb_no', $id);
        // $this->db->where('ppb_detail_flex', '1');
        $query = $this->db->get();
        return $query->result();
    }
    public function detailmr()
    {
        $this->db->select('*');
        $this->db->from('mr_detail');

        $this->db->where('mr_flex_1', '0');
        $query = $this->db->get();
        return $query->result();
    }


    // public function insertppbdetail($data)
    // {
    //     $this->db->insert('ppb_detail', $data);

    // }

    public function insertppbdetail($data)
    {
        return $this->db->insert_batch($this->_table2, $data);
    }

    public function updateppbdetail($data)
    {
        $this->db->where('ppb_detail_flex', '0');
        return $this->db->update('ppb_detail', $data);
    }

    public function updatesocustflex($sodata,$so_number)
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
    

    public function getKodePPB()
    {
        date_default_timezone_set('Asia/Jakarta');

        $cd = date("ymd");
        //$inquiry_cd = 'INQ-' . $cd;
        $q = $this->db->query("select MAX(RIGHT(ppb_no,5)) as kd_max from ppb");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%05s", $tmp);
            }
        } else {
            $kd = "00001";
        }
        return "PPB-" . $cd . $kd;
    }
    

    public function select_kodemtltype()
    {
        $this->db->select('*');
        $this->db->from('mtl_type');
        return $this->db->get();
    }

    public function select_sono()
    {
        $this->db->select('*');
        $this->db->where('mr_status',0);
        $this->db->from('mr');
        return $this->db->get();
    }

    
    /* crud inquiry detail */

//     function create($uri4)
//     {
//         $this->db->insert("mr_detail", array(
//             'so_number' => $uri4,
//             'mr_flex_1'=> '1',
//             'mr_created_by' => $this->session->userdata('user_logged')->fullname,
//             'mr_created_dt' => date("Y-m-d H:i:s"),
//             // 'so_number' => $uri4
//     ));
//     return $this->db->insert_id();
// }


//     function update($id, $value, $modul)
//     {
//     $this->db->where(array("mr_detail_id"=>$id));
//         $this->db->update("mr_detail", array($modul => $value));
//     }

//     function delete($id){
// 		$this->db->where("mr_detail_id",$id);
// 		$this->db->delete("mr_detail");
// 	}

    function delete_ppb_detail($ppb_no)
    {
      $this->db->where("ppb_no",$ppb_no);
      return $this->db->delete("ppb_detail");
  }
  function delete_ppb($ppb_no)
  {
      $this->db->where("ppb_no",$ppb_no);
      return $this->db->delete("ppb");
  }
  public function updateppbsts($so_no,$data)
  {
    $this->db->where('so_number', $so_no);
    return $this->db->update('mr', $data);

}  
}


/* End of file Databrg_model.php */
