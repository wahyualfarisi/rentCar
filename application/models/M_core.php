<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_core extends CI_Model{

  function selectAll($table)
  {
    return $this->db->get($table);
  }

  function selectWhere($table, $where)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where);

    return $this->db->get();
  }

}
