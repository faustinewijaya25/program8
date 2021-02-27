<?php

/**
 *
 */
class Member_model extends CI_model
{

  function __construct()
  {
    parent::__construct();
  }

  public function memberlist( $where='' )
  {
    $this->db->select('members.member_ID, members.nama, country.Country, members.kota, members.alamat');
    $this->db->join('country', 'members.negara = country.CC');
    if ( $where != '' )  $this->db->where( $where );
    $query = $this->db->get( 'members' );
    return $query->result_array();
  }

  public function memberslist1()
  {
    /*SQL:
    SELECT m.member_ID, m.nama, m.alamat, m.kota, m.kodepos, m.negara, m.telepon, m.hp
    FROM members m
    JOIN country c ON ( m.negara = c.CC )
    */

    $this->db->select('m.member_ID, m.nama, m.alamat, m.kota, m.kodepos, m.negara, m.telepon, m.hp');
    $this->db->from('members m');
    $this->db->join('country c','m.negara = c.CC');

    $query = $this->db->get();
    return $query->result();
  }
}

 ?>
