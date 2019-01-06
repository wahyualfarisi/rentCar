<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_core');
    if($this->session->userdata('login') != 1){
      redirect('admin');
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if(isset($_GET['plat']) ){
      $where_get = array(
        'status_no_polisi' => $_GET['plat']
      );

    }else if(isset($_GET['merk']) ){
      $where_get = array(
        'merk' => $_GET['merk']
      );
    }
    else{
      $where_get = null;
    }
    $toyota = array('merk' => 'TOYOTA');
    $honda  = array('merk' => 'HONDA');
    $suzuki = array('merk' => 'SUZUKI');

    $this->load->view('admin/v_header');
    $data['getAllKendaraan'] = $this->m_core->selectWhere('tbl_mobil', $where_get);
    $data['rowsToyota']      = $this->m_core->selectWhere('tbl_mobil', $toyota);
    $data['rowsHonda']       = $this->m_core->selectWhere('tbl_mobil', $honda);
    $data['rowsSuzuki']      = $this->m_core->selectWhere('tbl_mobil', $suzuki);
    $this->load->view('admin/v_kendaraan', $data);
    $this->load->view('admin/v_footer');
  }

}
