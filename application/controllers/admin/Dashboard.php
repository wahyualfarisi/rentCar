<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('login') !== 1 ){
      redirect(base_url('admin') );
    }
    //Codeigniter : Write Less Do More
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('admin') );
  }


  function index()
  {
    $this->load->view('admin/v_header');
    $this->load->view('admin/v_dashboard');
    $this->load->view('admin/v_footer');
  }

}
