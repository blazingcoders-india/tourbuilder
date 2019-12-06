<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 

 function profile_img($user_id=''){
     $CI = get_instance();
      
     $sql="SELECT * FROM users WHERE id=".$user_id."";
    
    $data = $CI->db->query($sql)->result_array();
     
     return $data;
     
 } 