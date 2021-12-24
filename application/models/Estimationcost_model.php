<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Estimationcost_model extends CI_Model
{

    // public function getdataestimationcost()
    // {
    //     $this->db->select('*');
    //     $this->db->from('log_inquiry');
    //     $this->db->join('log_inquiry', 'log_inquiry.id_inquiry = estimation_cost.id_inquiry');
    //     //$this->db->join('countinqcal', 'countinqcal.id_inquiry = countinqcal.id_inquiry', 'left');
    //     $this->db->order_by('estimation_cost.id_estimation', 'asc');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    public function getdataestimationcost()
    {
        $this->db->select('*');
        $this->db->from('estimation_cost');
        $this->db->join('log_inquiry', 'log_inquiry.id_inquiry = estimation_cost.id_inquiry');
        $this->db->join('countinqesti', 'countinqesti.id_inquiry = estimation_cost.id_inquiry');
        $this->db->order_by('estimation_cost.id_estimation', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countbyInquiry($id)
    {
        $this->db->select('*,count(id_inquiry) as total');
        $this->db->where('id_inquiry', $id);
        $this->db->group_by('id_inquiry');
        $this->db->order_by('total', 'desc');
        $hasil = $this->db->get('log_inquiry_detail');
        return $hasil;
    }


    function getDetailInquiry($id)
    {
        return $this->db->query("SELECT * from log_inquiry t1
            inner join customer t2 on t2.customer_cd = t1.cust_cd
            where t1.id_inquiry = '$id'")->result();
    }
    function getDetailestimation($id2)
    {
        return $this->db->query("SELECT * from log_inquiry_detail
            where id_inquiry_detail = '$id2' ")->result();
    }

    function getDetailpartInquiry($id)
    {
        return $this->db->query("SELECT * from log_inquiry_detail
         where id_inquiry_detail = '$id'")->result();
    }
    function getDetailpartInquiry2($id)
    {
        return $this->db->query("SELECT * from log_inquiry_detail
         where id_inquiry in ('$id' , '') ")->result();
    }
    function mp_getDetailTools($id)
    {
        return $this->db->query("SELECT * , (price / tool_qty)as tot_amount from tools t1
            left join barang t2 on t2.id_barang=t1.id_barang
            left join unit t3 on t3.id_unit= t2.id_unit
 left join log_inquiry_detail t4 on t4.id_inquiry_detail = t1.id_inquiry_detail
            where t1.id_inquiry = '$id' ")->result();
    }
    function getDetailTools($id2)
    {
        return $this->db->query("SELECT * , (price / tool_qty)as tot_amount from tools t1
            left join barang t2 on t2.id_barang=t1.id_barang
            left join unit t3 on t3.id_unit= t2.id_unit
            left join log_inquiry_detail t4 on t4.id_inquiry_detail = t1.id_inquiry_detail
            where t1.id_inquiry_detail = '$id2' ")->result();
    }

    function mp_getDetailmaterials($id, $id2)

    {
        return $this->db->query("SELECT *  from raw_material t1
            left join barang t2 on t2.id_barang=t1.id_barang
            left join unit t3 on t3.id_unit= t2.id_unit
            left join log_inquiry_detail t4 on t4.id_inquiry_detail = t1.id_inquiry_detail
            where t1.id_inquiry = '$id' and t1.id_inquiry_detail = '$id2'")->result();
    }

    function mp_getDetailprocess($id, $id2)

    {
        return $this->db->query("SELECT * ,(t1.mc_time * t3.cost_machine/60) tot_amount from process_detail t1
            inner join process t2 on t2.id_process = t1.id_process
            inner join machine t3 on t3.id_machine = t1.id_machine
            -- inner join barang t4 on t4.id_barang = t1.id_barang
            -- inner join raw_material t5 on t5.id_inquiry_detail = t1.id_inquiry_detail and t5.id_barang = t1.id_barang
            where t1.id_inquiry =  '$id' and t1.id_inquiry_detail = '$id2' ")->result();
    }

    function jo_getdetailmaterials($id, $id2)

    {
        return $this->db->query("SELECT *  from raw_material t1
            left join barang t2 on t2.id_barang=t1.id_barang
            left join unit t3 on t3.id_unit= t2.id_unit
            left join log_inquiry_detail t4 on t4.id_inquiry_detail = t1.id_inquiry_detail
            where t1.id_inquiry = '$id' and t1.id_inquiry_detail = '$id2'")->result();
    }

    function jo_getdetailmaterialsedit($id_rm)
    {
        $this->db->select('*');
        $this->db->from('raw_material');
        $this->db->where('id_rm', $id_rm);
        $query = $this->db->get();
        return $query->row_array();
    }

    function jo_getdetailprocessedit($id_process_dtl)
    {
        $this->db->select('*');
        $this->db->from('process_detail');
        $this->db->where('id_process_detail', $id_process_dtl);
        $query = $this->db->get();
        return $query->row_array();
    }
    function getDetailInq($id_inq)
    {
        $this->db->select('
        log_inquiry.eng_approve,
        log_inquiry.type_prod,
        log_inquiry_detail.id_inquiry,
        log_inquiry_detail.id_inquiry_detail,
        log_inquiry_detail.inq_part_no,
        log_inquiry_detail.inq_part_nm, 
        log_inquiry_detail.inq_incld_mtl,
        log_inquiry_detail.inq_drawing,
        log_inquiry_detail.inq_drawing_rev1,
        log_inquiry_detail.inq_drawing_rev2,
        log_inquiry_detail.inq_drawing_rev3,
        log_inquiry_detail.inq_incld_mtl
        ');
        $this->db->from('log_inquiry');
        $this->db->join('log_inquiry_detail', 'log_inquiry_detail.id_inquiry = log_inquiry.id_inquiry');
        $this->db->where('log_inquiry_detail.id_inquiry', $id_inq);
        $query = $this->db->get();
        return $query->row_array();
    }

    function jo_getdetailtoolsedit($id_tool)
    {
        $this->db->select('*,TOOL_NM(id_barang)as tool_nm');
        $this->db->from('tools');
        $this->db->where('id_tool', $id_tool);
        $query = $this->db->get();
        return $query->row_array();
    }
    function jo_getdetailotheredit($id)
    {
        $this->db->select('*');
        $this->db->from('log_inquiry_detail');
        $this->db->where('id_inquiry_detail', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    function jo_getDetailprocess($id, $id2)

    {
        return $this->db->query("SELECT *  from process_detail t1
            left join process t2 on t2.id_process = t1.id_process
            left join machine t3 on t3.id_machine = t1.id_machine
            inner join barang t4 on t4.id_barang = t1.id_barang
            inner join raw_material t5 on t5.id_inquiry_detail = t1.id_inquiry_detail and t5.id_barang = t1.id_barang
            where t1.id_inquiry =  '$id' and t1.id_inquiry_detail = '$id2' ")->result();
    }

    function toolsCost($id2)
    {
        $this->db->select_sum('tot_amount');
        $this->db->where('id_inquiry_detail', $id2);
        // $this->db->where('id_inquiry_detail', $id2);
        $query = $this->db->get('tools_totamount');

        return $query->row()->tot_amount;
    }

    function rmCost($id)
    {
        $this->db->select_sum('tot_amount');
        $this->db->where('id_inquiry', $id);
        $query = $this->db->get('rm_totcost');

        return $query->row()->tot_amount;
    }

    function jo_rmCost($id, $id2)
    {
        $this->db->select_sum('mtl_amount');
        $this->db->where('id_inquiry', $id);
        $this->db->where('id_inquiry_detail', $id2);
        $query = $this->db->get('v_mtlcost3');

        return $query->row()->mtl_amount;
    }

    function jo_costtotal($id)
    {
        $this->db->select_sum('cost_total');
        $this->db->where('id_inquiry', $id);
        // $this->db->where('id_inquiry_detail', $id2);

        $query = $this->db->get('v_jo_costtotal');

        return $query->row()->cost_total;
    }

    function jo_grcosttotal($id)
    {
        $this->db->select_sum('Grcost_total');
        $this->db->where('id_inquiry', $id);
        // $this->db->where('id_inquiry_detail', $id2);

        $query = $this->db->get('v_jo_grcosttotal');

        return $query->row()->Grcost_total;
    }

    function jo_costgndtotal($id)
    {
        $this->db->select_sum('grand_total');
        $this->db->where('id_inquiry', $id);
        // $this->db->where('id_inquiry_detail', $id2);

        $query = $this->db->get('v_jo_costtotal');

        return $query->row()->grand_total;
    }




    function processCost($id)
    {
        $this->db->select_sum('tot_amount');
        $this->db->where('id_inquiry', $id);
        $query = $this->db->get('process_totamount');

        return $query->row()->tot_amount;
    }

    function jo_processCost($id, $id2)
    {
        $this->db->select_sum('process_amount');
        $this->db->where('id_inquiry', $id);
        $this->db->where('id_inquiry_detail', $id2);
        $query = $this->db->get('v_processcost2');

        return $query->row()->process_amount;
    }


    public function dataestimationcostedit($id)
    {
        $this->db->select('*');
        $this->db->from('estimation_cost');
        $this->db->where('id_estimation', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //Insert Function

    public function insertestimationcost($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    // edit function

    public function updateestimationcost($objdata, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('estimation_cost', $objdata);
    }
    public function update_jo_mtl_cost($data, $id_rm)
    {
        $this->db->where('id_rm', $id_rm);
        return $this->db->update('raw_material', $data);
    }
    public function update_jo_tool_cost($data, $id_tool)
    {
        $this->db->where('id_tool', $id_tool);
        return $this->db->update('tools', $data);
    }
    public function update_jo_process_cost($data, $id)
    {
        $this->db->where('id_process_detail', $id);
        return $this->db->update('process_detail', $data);
    }


    public function update_inqdtl_cost($objdata, $id)
    {
        $this->db->where('id_inquiry_detail', $id);
        return $this->db->update('log_inquiry_detail', $objdata);
    }

    public function updateinquirysts($data, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('log_inquiry', $data);
    }

    public function updateestimationsts($objdata, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('estimation_cost', $objdata);
    }

    public function updatetypeprod($data, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('log_inquiry', $data);
    }

    public function hapusdataestimationcost($id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->delete('estimation_cost');
    }


    public function jo_delete_tool($id_tool)
    {
        $this->db->where('id_tool', $id_tool);
        //$this->db->where('id_inquiry', $id_inquiry);
        return $this->db->delete('tools');
    }

    public function jo_delete_rm($id_rm)
    {
        $this->db->where('id_rm', $id_rm);
        //$this->db->where('id_inquiry', $id_inquiry);
        return $this->db->delete('raw_material');
    }

    public function jo_delete_process($id)
    {
        $this->db->where('id_process_detail', $id);
        //$this->db->where('id_inquiry', $id_inquiry);
        return $this->db->delete('process_detail');
    }
    function deleteestimationcost($table, $data)
    {
        $this->db->delete($table, $data);
    }

    //recalculate
    public function recalculate_estimationcost($objdata, $id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->update('log_inquiry_detail', $objdata);
    }

    public function delete_costprocess($id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->delete('process_detail');
    }
    public function delete_costtools($id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->delete('tools');
    }
    public function delete_costrm($id)
    {
        $this->db->where('id_inquiry', $id);
        return $this->db->delete('raw_material');
    }

    // dropdown  function

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

    public function select_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->get();
    }
    public function select_tools()
    {
        $tools = array('199', '200');
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where_in('id_kategori', $tools);
        return $this->db->get();
    }
    public function select_material()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_kategori', '198');
        // 198 is id for MTL kategory
        return $this->db->get();
    }
    public function select_mtlprocess($id2)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('raw_material', 'raw_material.id_barang = barang.id_barang');
        $this->db->where('raw_material.id_inquiry_detail', $id2);
        return $this->db->get();
    }
    public function select_process()
    {
        $this->db->select('*');
        $this->db->from('process');
        return $this->db->get();
    }
    public function select_machineType()
    {
        $this->db->select('*');
        $this->db->from('machine');
        return $this->db->get();
    }
}
/* End of file Databrg_model.php */
