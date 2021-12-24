<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Databrg_model extends CI_Model
{

    public function getdatabrg()
    {
        $this->db->select('barang.id_barang, barang.part_no, barang.part_nm, brand.nm_brand, kategori.nm_kategori, barang.min_stok, unit.nm_unit, status_brg.nm_status, lokasi.cd_lok, barang.price, barang.created_dt, tbl_section.section_cd');
        $this->db->from('barang');
        $this->db->join('unit', 'unit.id_unit = barang.id_unit', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('brand', 'brand.id_brand = barang.id_brand', 'left');
        $this->db->join('tbl_section', 'tbl_section.id_section = barang.id_section', 'left');
        $this->db->join('status_brg', 'status_brg.id_status = barang.id_status', 'left');
        $this->db->join('lokasi', 'lokasi.id_lok = barang.id_lok', 'left');
        $this->db->order_by('barang.id_barang', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertbrg($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function databrgedit($id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_barang', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahbrg($data, $id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->update('barang', $data);
    }

    public function hapusdatabrg($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->delete('barang');
    }

    public function select_lokasi()
    {
        $this->db->select('*');
        $this->db->from('lokasi');
        return $this->db->get();
    }
    public function select_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get();
    }
    public function select_section()
    {
        $this->db->select('*');
        $this->db->from('tbl_section');
        return $this->db->get();
    }
    public function select_unit()
    {
        $this->db->select('*');
        $this->db->from('unit');
        return $this->db->get();
    }
    public function select_status()
    {
        $this->db->select('*');
        $this->db->from('status_brg');
        return $this->db->get();
    }
    public function select_brand()
    {
        $this->db->select('*');
        $this->db->from('brand');
        return $this->db->get();
    }

    /* dropdown menu *

    public function form_dropdown()
    {
        $this->load->view("reg_form");
    }
    public function insert_in_db($data)
    {
        $this->db->insert('dropdown_value', $data);
        if ($this->db->affected_rows() > 1) {
            return true;
        } else {
            return false;
        }
    }
    public function read_from_db($data)
    {
        $condition = "dropdown_single =" . "'" . $data['dropdown_single'] . "' AND " . "dropdown_multi =" . "'" . $data['dropdown_multi'] . "'";
        $this->db->select('*');
        $this->db->from('dropdown_value');
        $this->db->where($condition);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }*/
}


/* End of file Databrg_model.php */
