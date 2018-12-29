<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_core');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
      $data['getAllCar'] = $this->m_core->selectAll('tbl_mobil')->result();
      $this->load->view('pelanggan/v_header');
      $this->load->view('pelanggan/v_home', $data);
      $this->load->view('pelanggan/v_footer');
  }


  function getCar()
  {

  }

}
