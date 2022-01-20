<?php
class Login_model extends CI_Model
{
  public function login($email, $password)
  {

    $email = $email;
    $password = md5($password);
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where(array('email' => $email, 'password' => $password, 'status' => 1));
    $query = $this->db->get();
    $user = $query->row();
    if ($user) {
      return $user;
    } else {
      return false;
    }
  }
}
