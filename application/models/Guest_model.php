<?php 

/**
 *
 */
class Guest_model extends CI_model
{

  function __construct()
  {
    parent::__construct();
  }

  public function guestList( $where='' )
  {
    $this->db->select('guests.member_ID, members.nama, country.Country, guests.date_in, guests.date_out, guests.room');
    $this->db->join('members', 'guests.member_ID = members.member_ID');
    $this->db->join('country', 'members.negara = country.CC');
    if ( $where != '' )  $this->db->where( $where );
    $query = $this->db->get( 'guests' );
    return $query->result_array();
  }

  public function guestslist1()
  {
    /*SQL:
    SELECT g.member_ID, g.date_in, g.date_out, g.room, m.nama, m.alamat, m.kota, m.kodepos, m.negara, m.telepon, m.hp
    FROM guests g
    JOIN members m USING ( member_ID )
    JOIN country c ON ( m.negara = c.CC )
    WHERE date_out IS NULL
    */

    $this->db->select('g.member_ID, g.date_in, g.date_out, g.room, m.nama, m.alamat, m.kota, m.kodepos, m.negara, m.telepon, m.hp');
    $this->db->from('guests g');
    $this->db->join('members m', 'ON(g.member_ID = m.member_ID)');
    $this->db->join('country c','ON(m.negara = c.CC)');
    $this->db->where('date_out IS NULL');

    $query = $this->db->get();
    return $query->result();
  }
}

 ?>
