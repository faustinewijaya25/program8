<?php 
use Restserver\Libraries\REST_Controller;

/**
 *
 */
class Guests extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('guest_model');
  }

  public function guestslist1_get()
  {
    $data = $this->guest_model->guestslist1();
    $this->response( [ 'guestList', $data], 200);
  }
}

 ?>
