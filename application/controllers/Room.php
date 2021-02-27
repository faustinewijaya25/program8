<?php

/**
 *
 */
class Room extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('room_model');
  }

  public function roomlist( $lantai = '' )
  {
    if ( $lantai == '' ) {
      $where = '';
    } else {
      $where = "rooms.room LIKE '". $lantai ."__%'";
    }
    $data['judul'] = "PWeb Hotel - Room List";
    $data['rooms'] = $this->room_model->roomList( $where );

  ;
    $this->load->view("layout/header.php");
    $this->load->view("roomlist", $data);
    $this->load->view("layout/footer.php");
  }
}
