<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /* GET DATA */

    public function getdataproduct()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('unit', 'unit.id_unit = product.id_unit');
        $this->db->join('customer', 'customer.id_customer = product.id_customer');
        $this->db->order_by('product.id_product', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdatabrand()
    {
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->order_by('id_brand', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdataunit()
    {
        $this->db->select('*');
        $this->db->from('unit');
        $this->db->order_by('id_unit', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdatalokasi()
    {
        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->order_by('id_lok', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdataprocess()
    {
        $this->db->select('*');
        $this->db->from('process');
        $this->db->order_by('id_process', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdatasection()
    {
        $this->db->select('*');
        $this->db->from('tbl_section');
        $this->db->order_by('id_section', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdatakategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdatamachine()
    {
        $this->db->select('*');
        $this->db->from('machine');
        $this->db->order_by('id_machine', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getdatacustomers()
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->order_by('id_customer', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getdatamtltype()
    {
        $this->db->select('*');
        $this->db->from('mtl_type');
        $this->db->order_by('mtl_type_id', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }
    /* Insert data */

    public function insertproduct($data)
    {
        return $this->db->insert('product', $data);
    }

    public function insertunit($data)
    {
        return $this->db->insert('unit', $data);
    }

    public function insertbrand($data)
    {
        return $this->db->insert('brand', $data);
    }

    public function insertlokasi($data)
    {
        return $this->db->insert('lokasi', $data);
    }

    public function insertprocess($data)
    {
        return $this->db->insert('process', $data);
    }

    public function insertsection($data)
    {
        return $this->db->insert('tbl_section', $data);
    }

    public function insertkategori($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function insertmachine($data)
    {
        return $this->db->insert('machine', $data);
    }
    public function insertcustomer($data)
    {
        return $this->db->insert('customer', $data);
    }
    public function insertmtltype($data)
    {
        return $this->db->insert('mtl_type', $data);
    }
    /* -------- Edit Data --------- */

    public function dataproductedit($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id_product', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahproduct($data, $id)
    {
        $this->db->where('id_product', $id);
        return $this->db->update('product', $data);
    }

    public function dataunitedit($id)
    {
        $this->db->select('*');
        $this->db->from('unit');
        $this->db->where('id_unit', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahunit($data, $id)
    {
        $this->db->where('id_unit', $id);
        return $this->db->update('unit', $data);
    }

    public function databrandedit($id)
    {
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->where('id_brand', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahbrand($data, $id)
    {
        $this->db->where('id_brand', $id);
        return $this->db->update('brand', $data);
    }

    public function datalokasiedit($id)
    {
        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->where('id_lok', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahlokasi($data, $id)
    {
        $this->db->where('id_lok', $id);
        return $this->db->update('lokasi', $data);
    }

    public function dataprocessedit($id)
    {
        $this->db->select('*');
        $this->db->from('process');
        $this->db->where('id_process', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahprocess($data, $id)
    {
        $this->db->where('id_process', $id);
        return $this->db->update('process', $data);
    }

    public function datasectionedit($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_section');
        $this->db->where('id_section', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahsection($data, $id)
    {
        $this->db->where('id_section', $id);
        return $this->db->update('tbl_section', $data);
    }

    public function datakategoriedit($id)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahkategori($data, $id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->update('kategori', $data);
    }

    public function datamachineedit($id)
    {
        $this->db->select('*');
        $this->db->from('machine');
        $this->db->where('id_machine', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahmachine($data, $id)
    {
        $this->db->where('id_machine', $id);
        return $this->db->update('machine', $data);
    }
    public function datacustomeredit($id)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('id_customer', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahcustomer($data, $id)
    {
        $this->db->where('id_customer', $id);
        return $this->db->update('customer', $data);
    }
    public function datamtltypeedit($id)
    {
        $this->db->select('*');
        $this->db->from('mtl_type');
        $this->db->where('mtl_type_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function ubahmtltype($data, $id)
    {
        $this->db->where('mtl_type_id', $id);
        return $this->db->update('mtl_type', $data);
    }
    /* Hapus data */

    public function hapusdataproduct($id)
    {
        $this->db->where('id_product', $id);
        return $this->db->delete('product');
    }

    public function hapusdataunit($id)
    {
        $this->db->where('id_unit', $id);
        return $this->db->delete('unit');
    }

    public function hapusdatabrand($id)
    {
        $this->db->where('id_brand', $id);
        return $this->db->delete('brand');
    }

    public function hapusdatalokasi($id)
    {
        $this->db->where('id_lok', $id);
        return $this->db->delete('lokasi');
    }

    public function hapusdataprocess($id)
    {
        $this->db->where('id_process', $id);
        return $this->db->delete('process');
    }

    public function hapusdatasection($id)
    {
        $this->db->where('id_section', $id);
        return $this->db->delete('tbl_section');
    }

    public function hapusdatakategori($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori');
    }

    public function hapusdatamachine($id)
    {
        $this->db->where('id_machine', $id);
        return $this->db->delete('machine');
    }
    public function hapusdatacustomer($id)
    {
        $this->db->where('id_customer', $id);
        return $this->db->delete('customer');
    }
    public function hapusdatamtltype($id)
    {
        $this->db->where('mtl_type_id', $id);
        return $this->db->delete('mtl_type');
    }
    /* Dropdown menu */

    public function select_unit()
    {
        $this->db->select('*');
        $this->db->from('unit');
        return $this->db->get();
    }

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function select_customer()
    {
        $this->db->select('*');
        $this->db->from('customer');
        return $this->db->get();
    }
    public function select_sono()
    {
        $this->db->select('*');
        $this->db->from('mr');
        return $this->db->get();
    }

    public function select_product()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('unit', 'unit.id_unit = product.id_unit');
        $this->db->join('customer', 'customer.id_customer = product.id_customer');

        return $this->db->get();
    }
}


/* End of file Brand_model.php */
