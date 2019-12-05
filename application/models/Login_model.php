<?php
class Login_model extends CI_Model{
 
  function validate($email,$password){
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $this->db->where('is_active',1);
    $result = $this->db->get('users',1);
    
    return $result;
  }
}
 ?>