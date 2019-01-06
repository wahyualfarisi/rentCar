<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_core');
    $this->load->helper('tanggal');
    $this->load->model('m_car_filter');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
      $data['getAllCar']      = $this->m_core->selectAll('tbl_mobil')->result();
      $data['kategorySewa']   = $this->m_core->selectAll('tbl_kategori_sewa')->result();
      $data['merk']           = $this->m_core->selectAll('merk')->result();
      $this->load->view('pelanggan/v_header');
      $this->load->view('pelanggan/v_home', $data);
      $this->load->view('pelanggan/v_footer');
  }

  function lokasi()
  {
    $id    = $this->input->post('id');
    $where = array('kategori_sewa' => $id );
    $data  = $this->m_core->selectWhere('tbl_wilayah', $where)->result();
    echo json_encode($data);
  }


  function carimobil()
  {

    $kategori_sewa = $this->input->get('kategori_sewa');
    $lokasi_sewa   = $this->input->get('lokasi_sewa');
    $tgl_ambil     = $this->input->get('tgl_ambil');
    $tgl_kembali   = $this->input->get('tgl_kembali');

    //data
    $data['kategorySewa']   = $this->m_core->selectAll('tbl_kategori_sewa')->result();

    if($kategori_sewa == 1){
      echo "<h1> Belum tersedia </h1>";
    }else if($kategori_sewa == 2){


      $data['transmisi_data']  = $this->m_car_filter->fetch_filter('transmisi');
      $data['type_data']       = $this->m_car_filter->fetch_filter('type');


      $this->load->view('pelanggan/v_header');
      $this->load->view('pelanggan/v_carimobil_luar', $data);
      $this->load->view('pelanggan/v_footer');

    }else{
      echo "<h1> Data not found </h1>";
    }
  }



  function fetch_car_luarkota($page)
  {
    $transmisi = $this->input->post('transmisi');
    $type      = $this->input->post('type');


    //load library
    $this->load->library('pagination');
    $config = array();
    $config['base_url']            = '#';
    $config['total_rows']          = $this->m_car_filter->count_all($transmisi, $type);
    $config['per_page']            = 3;
    $config['uri_segment']         = 3;
    $config['use_page_numbers']    = TRUE;
    $config['full_tag_open']       = '<ul class="pagination">';
    $config['full_tag_close']      = '</ul>';
    $config['first_tag_open']      = '<li class="page-item">';
    $config['first_tag_close']     = '</li>';
    $config['last_tag_open']       = '<li class="page-item">';
    $config['last_tag_close']      = '</li>';
    $config['next_link']           = 'next';
    $config['next_tag_open']       = '<li class="page-item">';
    $config['next_tag_close']      = '</li>';
    $config['prev_link']           = 'prev';
    $config['prev_tag_open']       = '<li class="page-item">';
    $config['prev_tag_close']      = '</li>';
    $config['cur_tag_open']        = '<li class="active"><a href="#">';
    $config['cur_tag_close']       = '</a> </li>';
    $config['num_tag_open']        = '<li class="page-item">';
    $config['num_tag_close']       = '</li>';
    $config['num_links']           = 3;
    $this->pagination->initialize($config);

    $page = $this->uri->segment(3);
    $start = ($page - 1) * $config['per_page'];
    $output = array(
        'pagination_link' => $this->pagination->create_links(),
        'car_list' => $this->m_car_filter->fetch_data($config['per_page'], $start, $transmisi, $type)
    );
      echo json_encode($output);



  }



}
