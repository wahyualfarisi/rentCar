<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdmin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_core');
    if($this->session->userdata('login') === 1){
     redirect(base_url('admin/Dashboard') );
    }

  }

  function index()
  {
    $this->load->view('v_administrator_login');
  }

  function actionLogin()
  {
    $email = $this->input->post('email');
    $pass  = $this->input->post('password');
    $akses = $this->input->post('akses');

    $where = array(
      'kode_operator' => $email,
      'password'      => md5($pass),
      'hak_akses'     => $akses
    );
    $cekData = $this->m_core->selectWhere('tbl_operator', $where);
    if($cekData->num_rows() > 0 ){
      $createSession = array(
        'akses' => $akses,
        'email' => $email,
        'login' => 1
      );
      $this->session->set_userdata($createSession);
      redirect(base_url('admin/Dashboard') );
    }



  }

  function logout()
  {
    $this->session->sess_destroy('login');
    redirect(base_url('admin') );
    // echo "hello";
  }

}
