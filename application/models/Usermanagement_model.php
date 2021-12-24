<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Usermanagement_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /* GET DATA */

    public function getdatauser_access_menu()
    {
        $this->db->select('*');
        $this->db->from('user_access_menu');
        $this->db->join('user_role', 'user_role.roleid = user_access_menu.role_id');
        // $this->db->join('user_sub_menu', 'user_sub_menu.menu_id = user_access_menu.menu_id');
        $this->db->order_by('user_access_menu.role_id', 'asc');
        $this->db->order_by('user_access_menu.menu_id', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdatauser_role()
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $this->db->order_by('roleid', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdatauser_sub_menu()
    {
        $this->db->select('*');
        $this->db->from('user_sub_menu');
        $this->db->order_by('id', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getdatauser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('user_id', 'asc');
        $this->db->join('user_role', 'user_role.roleid = user.role_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    /* Insert data */

    public function insertuser_access_menu($data)
    {
        return $this->db->insert('user_access_menu', $data);
    }

    public function insertuser_role($data)
    {
        return $this->db->insert('user_role', $data);
    }

    public function insertuser_sub_menu($data)
    {
        return $this->db->insert('user_sub_menu', $data);
    }

    public function insertuser($data)
    {
        return $this->db->insert('user', $data);
    }

    /* -------- Edit Data --------- */

    public function datauser_access_menuedit($id)
    {
        $this->db->select('*');
        $this->db->from('user_access_menu');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahuser_access_menu($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('user_access_menu', $data);
    }

    public function datauser_roleedit($id)
    {
        $this->db->select('*');
        $this->db->from('user_role');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahuser_role($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('user_role', $data);
    }

    public function datauser_sub_menuedit($id)
    {
        $this->db->select('*');
        $this->db->from('user_sub_menu');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahuser_sub_menu($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('user_sub_menu', $data);
    }

    public function datauseredit($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function ubahuser($data, $id)
    {
        $this->db->where('user_id', $id);
        return $this->db->update('user', $data);
    }

    /* Hapus data */

    public function hapusdatauser_access_menu($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_access_menu');
    }

    public function hapusdataUser_role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_role');
    }

    public function hapusdatauser_sub_menu($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_sub_menu');
    }

    public function hapusdatauser($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->delete('user');
    }

    /* Dropdown menu */

    public function select_user_role()
    {
        $this->db->select('*');
        $this->db->from('user_role');
        return $this->db->get();
    }

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function select_user_access_menu()
    {
        $this->db->select('*');
        $this->db->from('user_access_menu');
        $this->db->join('user_role', 'user_role.id = user_access_menu.role_id');
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


/* End of file model.php */
