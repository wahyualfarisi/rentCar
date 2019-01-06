<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_car_filter extends CI_Model{

  function fetch_filter($filter)
  {
    $this->db->distinct();
    $this->db->select($filter);
    $this->db->from('tbl_mobil');
    $this->db->where('status_mobil', '0');
    $this->db->order_by($filter, 'ASC');
    return $this->db->get();
  }

  function make_query($transmisi, $type)
  {
    $query = "SELECT * FROM tbl_mobil WHERE status_mobil = '0' ";

    if(isset($transmisi) )
    {
      $transmisi_filter = implode("','", $transmisi);
      $query .= " AND transmisi IN('".$transmisi_filter."')";
    }
    if(isset($type) )
    {
      $type_filter  = implode("','", $type);
      $query .= "AND type IN('".$type_filter."')";
    }

    return $query;

  }

  function count_all($transmisi, $type)
  {
    $query = $this->make_query($transmisi, $type);
    $data  = $this->db->query($query);
    return $data->num_rows();
  }

  function fetch_data($limit, $start, $transmisi, $type)
  {
    $query  = $this->make_query($transmisi, $type);
    $query .= ' LIMIT '.$start.', '.$limit;
    $data   = $this->db->query($query);

    $output = '';
    if($data->num_rows() > 0 )
    {

      foreach($data->result() as $key)
      {
        $output .= '

        <div class="single-car-wrap">
            <div class="row">

                <div class="col-lg-5">
                    <div class="car-list-thumb" style="background-image: url('.base_url('assets/users/images/'.$key->foto_mobil).');" ></div>
                </div>



                <div class="col-lg-7">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="car-list-info">
                                <h2><a href="#">'.$key->merk.' '. $key->type.'</a></h2>
                                <h6><a href="#">'.$key->nomor_polisi.'</a></h6>
                                <h5 id="harga_mobil" >Rp. '.number_format($key->biaya_luar_kota) .'/ perhari</h5>
                                <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean inorci luctus et ultrices posuere cubilia.</p>
                                <ul class="car-info-list">
                                    <li>'.$key->merk.'</li>
                                    <li>'.$key->transmisi.'</li>
                                </ul>
                                <p class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star unmark"></i>
                                </p>
                                <a href="#" class="rent-btn" id="pilih_mobil" >Pilih</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        ';
      }



    }else {
        $output = '<h1> No Data Found </h1>';
    }
    return $output;

  }

}
