<?php
class LoginModel extends CI_model
{
  public function is_authenticate($username,$password)
  {
    $q = $this->db->where(['username'=>$username,'password'=>$password])
                  ->get('users');
    if ($q->num_rows()) {
      return $q->row()->ID;
    }
    else {
      return False;
    }
  }
  public function create($post_data)
  {
    return $this->db->insert('users',$post_data);
  }
}
?>
