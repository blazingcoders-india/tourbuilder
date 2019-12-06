<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->model('login_model');
    }

    function index() {
      if($this->session->userdata('isUserLoggedIn')){
          redirect('admin');
      }
        $this->load->view('login/login_view');
    }

    function auth() {
       
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $validate = $this->login_model->validate($email, $password);
         
        if ($validate->num_rows() > 0) {
            $data = $validate->row_array();
            $id = $data['id'];            
            $first_name = $data['first_name'];            
            $sesdata = array(
                'user_id' => $id,
                'first_name' => $first_name,                
                'logged_in' => TRUE
            );
            $this->session->set_userdata('isUserLoggedIn', TRUE); 

            $this->session->set_userdata($sesdata);
            // access login for admin
            
                redirect('admin');
 
        } else {
            echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
            redirect('login');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
