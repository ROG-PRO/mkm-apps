<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
    private $_table = "user";

    public $user_id;
    public $username;
    public $created_by;
    public $created_dt;

    public function tampil_user()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by('user_id', 'asc');

        return $this->db->get();
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("user_id" => $id));
    }
}
