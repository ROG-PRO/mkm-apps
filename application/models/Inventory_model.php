<?php

defined('BASEPATH') or exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inventory_model
 *
 * @author jamaludin
 */
class Inventory_model extends CI_Model {

    private $_table = "inventory";

    public function getall() {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('lokasi', 'iv_lokid =  cd_lok');
        return $this->db->get()->result();
    }

    public function getbyitemno($item, $lok) {
        //$this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('lokasi', 'iv_lokid =  cd_lok');
        $this->db->where('iv_itemcode', $item);
        $this->db->where('iv_lokid', $lok);
        return $this->db->get()->row();
    }

    public function insertstock($data) {
        return $this->db->insert($this->_table, $data);
    }

    public function updatestock($data, $id) {
        $this->db->where('iv_id', $id);
        return $this->db->update($this->_table, $data);
    }

    public function stockin($lok, $itemcode, $itemname, $qty, $text) {
        $onstock = $this->getbyitemno($itemcode, $lok);
        if ($onstock) {
            $datastock = [
                "iv_qty" => $onstock->iv_qty + $qty
            ];
            $stock = $this->updatestock($datastock, $onstock->iv_id);
        } else {
            $datastock = [
                "iv_id" => uniqid(),
                "iv_lokid" => $lok,
                "iv_itemcode" => $itemcode,
                "iv_itemname" => $itemname,
                "iv_qty" => $qty,
                "iv_desc" => $text
            ];
            $stock = $this->insertstock($datastock);
        }

        if ($stock) {
            return true;
        } else {
            return false;
        }
    }

    public function stockout($lok, $itemcode, $itemname, $qty, $text) {
        $onstock = $this->getbyitemno($itemcode, $lok);
        if ($onstock > 0 && $onstock->iv_qty >= 0) {
            $datastock = [
                "iv_qty" => $onstock->iv_qty - $qty
            ];
            $stock = $this->updatestock($datastock, $onstock->iv_id);
            return true;
        } else {
            return false;
        }
    }

}
