<?php

class Room_model extends CI_model
{

  public function roomrate()
  {
    $query = $this->db->get( 'roomtype' );
    return $query->result();
  }

  public function roomcount()
  {
    /* SQL:
    SELECT t.rtype, t.rate, COUNT(*) jumlah_kamar
    FROM rooms r
    LEFT JOIN roomtype t ON (r.rtype=t.kode)
    GROUP BY r.rtype
    */

    $this->db->select('t.rtype, t.rate, COUNT(*) jumlah_kamar');
    $this->db->from('rooms r');
    $this->db->join('roomtype t', 'ON(r.rtype=t.kode)');
    $this->db->group_by('r.rtype');

    $query = $this->db->get();
    return $query->result();
  }

  public function roomlist()
  {
    /* SQL:
    SELECT r.room, t.rtype, t.rate
    FROM rooms r
    LEFT JOIN roomtype t ON (r.rtype=t.kode)
    */

    $this->db->select('r.room, t.rtype, t.rate');
    $this->db->from('rooms r');
    $this->db->join('roomtype t', 'ON(r.rtype=t.kode)');

    $query = $this->db->get();
    return $query->result();
  }

  public function roomview()
  {
    /* SQL:
    SELECT r.room, t.rtype, t.rate, v.dview
    FROM rooms r
    JOIN roomtype t ON (r.rtype=t.kode)
    JOIN views v ON r.dview=v.vcode
    */

    $this->db->select('r.room, t.rtype, t.rate, v.dview, rate+(rate*addv) vrate');
    $this->db->from('rooms r');
    $this->db->join('roomtype t', 'ON(r.rtype=t.kode)');
    $this->db->join('views v', 'ON(r.dview=v.vcode)');

    $query = $this->db->get();
    return $query->result();
  }

  public function roomvrate()
  {
    /* SQL:
    SELECT r.room, t.rtype, t.rate, v.dview, rate+(rate*addv) vrate
    FROM rooms r
    JOIN roomtype t ON (r.rtype=t.kode)
    JOIN views v ON r.dview=v.vcode
    */

    $this->db->select('r.room, t.rtype, t.rate, v.dview, rate+(rate*addv) vrate');
    $this->db->from('rooms r');
    $this->db->join('roomtype t', 'ON(r.rtype=t.kode)');
    $this->db->join('views v', 'ON(r.dview=v.vcode)');

    $query = $this->db->get();
    return $query->result();
  }
}

 ?>
