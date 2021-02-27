<?php

/**
 *
 */
class Guest extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('guest_model');
  }

  public function guestlist( $checkin = '')
  {
    if ( $checkin == ''){
      $where = '';
    }
    else {
      $where = "(MONTH(date_in) = ". $checkin .")";
    }
    $data['judul'] = "PWEB Hotel - Guests List";
    $data['guests'] = $this->guest_model->guestlist( $where );
    $this->load->view('layout/header.php');
    $this->load->view('guestlist', $data);
    $this->load->view('layout/footer.php');
  }
}

 ?>
