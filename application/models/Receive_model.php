<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Receive_model extends CI_Model
{
    public  function rules()

    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ],
        ];
    }

    public function getdatareceive()
    {
        $this->db->select('*');
        $this->db->from('tbl_receive');
        $this->db->order_by('receive_cd', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdetailreceive()
    {
        $user = $this->session->userdata('user_logged')->username;
        $this->db->select('*');
        $this->db->from('receive_detail');
        $this->db->join('barang', 'barang.id_barang = receive_detail.id_barang');
        $this->db->join('unit', 'unit.id_unit = barang.id_unit');
        $this->db->where('receive_detail.flex', 0);
        $this->db->where('receive_detail.created_by', $user);
        $this->db->order_by('receive_detail.id_receive', 'asc');

        return $this->db->get();
    }



    function getdatareceivedetail($id)
    {
        return $this->db->query("SELECT * FROM tbl_receive WHERE receive_cd='$id'")->result();
    }

    function getdatapartdetail($id)
    {
        return $this->db->query("SELECT * from receive_detail t1
                inner join barang t2 on t2.id_barang = t1.id_barang
                inner join unit t3  on t3.id_unit = t2.id_unit
                where t1.receive_cd = '$id'")->result();
    }

    public function insertreceive($data)
    {
        return $this->db->insert('tbl_receive', $data);
    }

    public function datareceiveedit($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_receive');
        $this->db->where('receive_cd', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahreceive($data, $id)
    {
        $this->db->where('receive_cd', $id);
        return $this->db->update('tbl_receive', $data);
    }

    public function hapusdatareceive($id)
    {
        $this->db->where('receive_cd', $id);
        return $this->db->delete('tbl_receive');
    }

    public function deletedetailreceive($id)
    {
        return $this->db->delete('receive_detail', array("id_receive" => $id));
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('tbl_receive', array('receive_cd' => $id))->row();
        return $query;
    }
}


/* End of file Databrg_model.php */
