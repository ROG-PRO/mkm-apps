<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Config_model extends CI_Model
{
    private $_table = "config";

    public function getconfig($config)
    {
        return $this->db->get_where($this->_table, ["cfg_name" => $config])->row();
    }

    public function updateconfig($data, $config)
    {
        $this->db->where('cfg_name', $config);
        return $this->db->update($this->_table, $data);
    }
}
