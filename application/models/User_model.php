<?php
class User_model extends CI_model
{
  public function get_feedbacks()
  {
    $query = $this->db->select()
                      ->from('feedbaks')
                      ->get();
    return $query->result();
  }
}
?>
