<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {

    public function loginQuery($where)
    {
        return $this->db->select('*')->from("tbl_users")->where($where)->get();
    }

    public function insertUser($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}