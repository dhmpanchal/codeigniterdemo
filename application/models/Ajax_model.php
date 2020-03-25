<?php
class Ajax_model extends CI_model
{
  public function fatch_countries()
  {
    $this->db->order_by("country_name","ASC");
    $q = $this->db->select()->from('res_country')->get();
    return $q->result();
  }
  public function fatch_states($country_id)
  {
    $this->db->where('country_id',$country_id);
    $this->db->order_by("state_name","ASC");
    $q = $this->db->select()->from('res_state')->get();
    $output = '<option value="">Select State</option>';

    foreach ($q->result() as $row) {
      $output .= '<option value="'.$row->ID.'">'.$row->state_name.'</option>';
    }
    return $output;
  }
  public function fatch_city($state_id)
  {
    $this->db->where('state_id',$state_id);
    $this->db->order_by("city_name","ASC");
    $q = $this->db->select()->from('res_city')->get();
    $output = '<option value="">Select City</option>';

    foreach ($q->result() as $row) {
      $output .= '<option value="'.$row->ID.'">'.$row->city_name.'</option>';
    }
    return $output;
  }
}
?>
