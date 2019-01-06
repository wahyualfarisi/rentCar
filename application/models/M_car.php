<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_car extends CI_Model{

  function car_result_luarkota()
  {
    $this->db->select('*');
    $this->db->from('tbl_mobil');
    $this->db->where('status_mobil', '0');
    return $this->db->get();
  }

}
