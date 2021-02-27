<?php 
use Restserver\Libraries\REST_Controller;

/**
 *
 */
class Members extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('member_model');
  }

  public function memberslist1_get()
  {
    $data = $this->member_model->memberslist1();
    $this->response( [ 'members', $data], 200);
  }
}

 ?>
