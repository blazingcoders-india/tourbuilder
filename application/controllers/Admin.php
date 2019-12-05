<?php

class Admin extends CI_Controller {
private $upload_path = "./appdata/temp_provider";
    function __construct() {
        parent::__construct();
         $this->load->helper('common_helper');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper("file"); // load the helper
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('Base_Model');
        $this->load->model('Home_model'); 
        
        $this->is_loggedin();
    }

    function index() {      
         
        $data = '';
        $this->load->view('admin/header');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }
   
     public function clients_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['clients'] = $this->Base_Model->get_records('clients', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/clients/list', $data);
        $this->load->view('admin/footer');
    }

    public function clients_add($id = '') {
        
       

        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
        if(!empty($id)){
        $where[] = array(TRUE, 'id', $id);
        $data['clients'] = $this->Base_Model->get_records('clients', '', $where, 'row', 'id', 'desc', ''); 
        }
        $data['tags'] = $this->Base_Model->get_records('tags', '', '', '', 'id', 'desc', ''); 

        $this->load->view('admin/clients/add', $data);
        $this->load->view('admin/footer');
    }

    public function clients_save() {
        $email_implode='';
        $phone_implode='';
        $tag_implode='';
         $emails = $this->input->post('email[]');
         $phones = $this->input->post('phone[]');
         $tags = $this->input->post('tag_id[]');
         
            if(!empty($emails)){
            foreach ($emails as $value) {
                $email[] = $value;
            }

            $email_implode = implode(',', $email);
            }
             if(!empty($phones)){
            foreach ($phones as $value) {
                $phone[] = $value;
            }

            $phone_implode = implode(',', $phone);
            }
             if(!empty($tags)){
            foreach ($tags as $value) {
                $tag[] = $value;
            }

            $tag_implode = implode(',', $tag);
            }
            
            
        $create_date = date('Y-m-d', strtotime($this->input->post('create_date')));

        $data = array(
             
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'short_name' => $this->input->post('short_name'),
            'notes' => $this->input->post('notes'),
            'email' => $email_implode,
            'phone' => $phone_implode,
            //'tour_link' => $this->input->post('tour_link'),
            'create_date' => $create_date,    
            'tag_id' => $tag_implode,
            'is_active' => 1,
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('clients', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('clients', $data);
            $ins_id = $this->db->insert_id();
        }


    
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/clients_list');
    }
      public function clients_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('clients', array('id' => $id));
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/clients_list');
    }
      public function clients_view($id) {
        $data = '';
        $where[] = array(TRUE, 'id', $id);
        $data['client_details'] = $this->Base_Model->get_records('clients', '', $where, 'row', 'id', 'desc', '');
        $this->load->view('admin/header');
        $this->load->view('admin/clients/view', $data);
        $this->load->view('admin/footer');
    }
     public function zones_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $where='';
        if(!empty($this->session->userdata('destination_id'))){
            $where[] = array(TRUE, 'destination_id', $this->session->userdata('destination_id'));
        }
        
        
         $joins = array(
            array('destinations as d', 'd.id = z.destination_id'),
        );
        $fields = array('z.*', 'd.short_name as destination_short_name');
        // Banner Section
        
        $where[] = array(true, 'z.is_active', 1);
        if(!empty($this->session->userdata('destination_id'))){
            $where[] = array(true, 'z.destination_id', $this->session->userdata('destination_id'));
        }
        $data['zones'] = $this->Base_Model->get_advance_list('zones as z', $joins, $fields, $where, '', '', '', '');
        $this->load->view('admin/zones/list', $data);
        $this->load->view('admin/footer');
    }

    public function zones_add($id = '') {
        
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
          $where_destination[] = array(TRUE, 'is_active', 1);
        $data['destinations'] = $this->Base_Model->get_records('destinations', '', $where_destination, '', 'id', 'desc', ''); 
        if(!empty($id)){
        $where[] = array(TRUE, 'id', $id);
        $data['zones'] = $this->Base_Model->get_records('zones', '', $where, 'row', 'id', 'desc', ''); 
        }
        $this->load->view('admin/zones/add', $data);
        $this->load->view('admin/footer');
    }
     public function zones_save() {

         
        $data = array(                  
            'destination_id' => $this->input->post('destination_id'),
            'full_name' => $this->input->post('full_name'),
            'short_name' => $this->input->post('short_name'),
            'gps_latitude' => $this->input->post('gps_latitude'),
            'gps_longitude' => $this->input->post('gps_longitude'),
            'proposal' => $this->input->post('proposal'),
            'roadbook' => $this->input->post('roadbook'),
            'is_active' => 1
            
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('zones', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('zones', $data);
            $ins_id = $this->db->insert_id();
        }


        if (!empty($_FILES['file_name']['name'])) {

            $this->load->helper('url');
            $this->load->library('upload');

            $filePath = './appdata/zones/' . $ins_id;

            $this->_mkdir($filePath);
            $file_name = str_replace(" ", "_", $_FILES['file_name']['name']);

            $newfile_name = preg_replace('/[^A-Za-z0-9]/', "", $file_name);
            $newfile_name = preg_replace("|[^a-zA-Z0-9./]|", "", $file_name);
            $config = array('allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $filePath,
                'file_name' => $newfile_name);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file_name')) {
                $error = array('error' => $this->upload->display_errors());
            }
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $value = array('file_name' => $file_name);
            $this->db->where('id', $ins_id);
            $this->db->update('zones', $value);
        }
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/zones_list');
    }
    public function zones_delete($id) {
          $this->db->where('id', $id);
          $this->db->delete('zones', array('id' => $id));
          $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/zones_list');
    }
     
     public function destinations_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['destinations'] = $this->Base_Model->get_records('destinations', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/destinations/list', $data);
        $this->load->view('admin/footer');
    }

    public function destinations_add($id = '') {
        
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
        if(!empty($id)){
        $where[] = array(TRUE, 'id', $id);
        $data['destinations'] = $this->Base_Model->get_records('destinations', '', $where, 'row', 'id', 'desc', ''); 
        }
        $this->load->view('admin/destinations/add', $data);
        $this->load->view('admin/footer');
    }
     public function destinations_save() {

         
        $data = array(                  
            'full_name' => $this->input->post('full_name'),
            'short_name' => $this->input->post('short_name'),
            'is_active' => 1
            
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('destinations', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('destinations', $data);
            $ins_id = $this->db->insert_id();
        }


   if (!empty($_FILES['flag']['name'])) {
       
                 $this->Home_model->upload_image($_FILES['flag']['name'],$ins_id,'destination_flag');
           
             }
   if (!empty($_FILES['logo']['name'])) {
       
                 $this->Home_model->upload_image_logo($_FILES['logo']['name'],$ins_id,'destination_logo');
           
             }
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/destinations_list');
    }
    public function destinations_delete($id) {
          $this->db->where('id', $id);
          $this->db->delete('destinations', array('id' => $id));
          $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/destinations_list');
    }
 
    
     public function users_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['users'] = $this->Base_Model->get_records('users', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/users/list', $data);
        $this->load->view('admin/footer');
    }

    public function users_add($id = '') {
        
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
        if(!empty($id)){
        $where[] = array(TRUE, 'id', $id);
        $data['users'] = $this->Base_Model->get_records('users', '', $where, 'row', 'id', 'desc', ''); 
        }
        $this->load->view('admin/users/add', $data);
        $this->load->view('admin/footer');
    }
     public function users_save() {
 
        $data = array(         
             'created' => date('Y-m-d H:i:s'), 
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'is_active' => 1
            
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('users', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('users', $data);
            $ins_id = $this->db->insert_id();
        }

 
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/users_list');
    }
    public function users_delete($id) {
          $this->db->where('id', $id);
          $this->db->delete('users', array('id' => $id));
          $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/users_list');
    }
    
    
    
     public function type_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['type'] = $this->Base_Model->get_records('type', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/type/list', $data);
        $this->load->view('admin/footer');
    }

    public function type_add($id = '') {
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
        $where[] = array(TRUE, 'id', $id);
        $data['type'] = $this->Base_Model->get_records('type', '', $where, 'row', 'id', 'desc', '');
       

        $this->load->view('admin/type/add', $data);
        $this->load->view('admin/footer');
    }
     public function type_save() {
  
        $data = array(
            'created' => date('Y-m-d H:i:s'),          
            'name' => $this->input->post('name'),                     
            'is_active' => 1,
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('type', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('type', $data);
            $ins_id = $this->db->insert_id();
        }


       
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/type_list');
    }
     public function type_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('type', array('id' => $id));
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/type_list');
    }
 
     public function categories_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['categories'] = $this->Base_Model->get_records('categories', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/categories/list', $data);
        $this->load->view('admin/footer');
    }

    public function categories_add($id = '') {
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
        $where[] = array(TRUE, 'id', $id);
        $data['categories'] = $this->Base_Model->get_records('categories', '', $where, 'row', 'id', 'desc', '');
        $this->load->view('admin/categories/add', $data);
        $this->load->view('admin/footer');
    }
     public function categories_save() {
  
        $data = array(
            'created' => date('Y-m-d H:i:s'),          
            'name' => $this->input->post('name'),                     
            'is_active' => 1,
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('categories', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('categories', $data);
            $ins_id = $this->db->insert_id();
        }


       
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/categories_list');
    }
     public function categories_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories', array('id' => $id));
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/categories_list');
    }
    
    
     public function providers_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
         $where='';
         
        
        
         $joins = array(
            array('destinations as d', 'd.id = p.destination_id'),
            array('type as t', 't.id = p.type_id'),
            array('categories as c', 'c.id = p.category_id'),
        );
        $fields = array('p.*', 'd.short_name as destination_short_name','t.name as type_name','c.name as category_name');
        // Banner Section
        
        $where[] = array(true, 'p.is_active', 1);
        if(!empty($this->session->userdata('destination_id'))){
            $where[] = array(true, 'p.destination_id', $this->session->userdata('destination_id'));
        }
        $data['providers'] = $this->Base_Model->get_advance_list('providers as p', $joins, $fields, $where, '', '', '', ''); 
        $this->load->view('admin/providers/list', $data);
        $this->load->view('admin/footer');
    }

    public function providers_add($id = '') {
        
        $this->is_loggedin();
        $data = '';
        $data['products']='';
        $this->load->view('admin/header');
        $where_destination[] = array(TRUE, 'is_active', 1);
        $where_type[] = array(TRUE, 'is_active', 1);
         if(!empty($this->session->userdata('destination_id'))){
            $where_zone[] = array(TRUE, 'destination_id', $this->session->userdata('destination_id'));
        }
        $where_zone[] = array(TRUE, 'is_active', 1);
        $where_category[] = array(TRUE, 'is_active', 1);
        $data['destinations'] = $this->Base_Model->get_records('destinations', '', $where_destination, '', 'id', 'desc', ''); 
        $data['type'] = $this->Base_Model->get_records('type', '', $where_type, '', 'id', 'desc', ''); 
        $data['categories'] = $this->Base_Model->get_records('categories', '', $where_category, '', 'id', 'desc', ''); 
        $data['zones'] = $this->Base_Model->get_records('zones', '', $where_zone, '', 'id', 'desc', ''); 
        if(!empty($id)){
        $where[] = array(TRUE, 'id', $id);
        $data['providers'] = $this->Base_Model->get_records('providers', '', $where, 'row', 'id', 'desc', ''); 
        }
        if(!empty($data['providers']->id)){
             $where_products[] = array(TRUE, 'provider_id', $data['providers']->id);
        $data['products'] = $this->Base_Model->get_records('products', '', $where_products, '', 'id', 'desc', ''); 
        
        }
      $data['meal_plan'] = $this->Base_Model->get_records('meal_plan', '', '', '', 'id', 'desc', ''); 

        $this->load->view('admin/providers/add', $data);
        $this->load->view('admin/footer');
    }
     public function providers_save() {
           $filesCount = count($this->input->post('file_name'));
          
         if(!empty($this->input->post('favourites'))){
            $favourites=$this->input->post('favourites');
        }else{
            $favourites=0;
        }
         $email_implode='';
        $phone_implode='';
         $emails = $this->input->post('email[]');
        
         $phones = $this->input->post('phone[]');
            if(!empty($emails)){
            foreach ($emails as $value) {
                $email[] = $value;
            }

            $email_implode = implode(',', $email);
            }
             if(!empty($phones)){
            foreach ($phones as $value) {
                $phone[] = $value;
            }

            $phone_implode = implode(',', $phone);
            }
 $create_date = date('Y-m-d', strtotime($this->input->post('create_date')));
         
        $data = array(                  
            'destination_id' => $this->input->post('destination_id'),
            'full_name' => $this->input->post('full_name'),
            'short_name' => $this->input->post('short_name'),
            'zone_id' => $this->input->post('zone_id'),
            'category_id' => $this->input->post('category_id'),
            'type_id' => $this->input->post('type_id'),
            'notes' => $this->input->post('notes'),
            'create_date' => $create_date,
//            'client_link' => $this->input->post('client_link'),
            'web_link' => $this->input->post('web_link'),
            'email' => $email_implode,
            'phone' => $phone_implode,
            'favourites' => $favourites,
            'is_active' => 1
            
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('providers', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('providers', $data);
            $ins_id = $this->db->insert_id();
        }


       if (!empty($_FILES['image']['name'])) {
       
                 $this->Home_model->upload_image_provider($_FILES['image']['name'],$ins_id,'providers_image');
           
             }
   
             
                for ($i = 0; $i < $filesCount; $i++) {
                if (file_exists($this->upload_path . "/" . $this->input->post('file_name')[$i])) {
                      $temp_path = './appdata/temp_provider/'.$this->input->post('file_name')[$i];
                                            $temp_path = './appdata/temp_provider/'.$this->input->post('file_name')[$i];

                     $newpaths = './appdata/providers_directory/'.$ins_id;
                     $dest = $this->_mkdir($newpaths, 711, TRUE);
                     $newpath = $newpaths.'/'.$this->input->post('file_name')[$i];

        if (!copy($temp_path, $newpath)) {
            echo "failed to copy $newpath...\n";
             
        } else {
            echo 2;
             
            
        }
                    
                    $images[] = $this->input->post('file_name')[$i];
                     
                }
            }
             $fileName = implode(',', $images);
                if (!empty($this->input->post('implode'))) {
            
                $value = array('file_name' => $this->input->post('implode') . ',' . $fileName);
                 
            } else {
                $value = array('file_name' => $fileName);
            }
         
          
            $this->db->where('id', $ins_id);
            $this->db->update('providers', $value);
               
            
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/providers_add/'.$ins_id);
    }
    public function providers_delete($id) {
          $this->db->where('id', $id);
          $this->db->delete('providers', array('id' => $id));
          $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/providers_list');
    }
    
      public function tags_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['tags'] = $this->Base_Model->get_records('tags', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/tags/list', $data);
        $this->load->view('admin/footer');
    }

    public function tags_add($id = '') {
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
         $where_client[] = array(TRUE, 'is_active', 1);
        $data['clients'] = $this->Base_Model->get_records('clients', '', $where_client, '', 'id', 'desc', ''); 
       
        $where[] = array(TRUE, 'id', $id);
        $data['tags'] = $this->Base_Model->get_records('tags', '', $where, 'row', 'id', 'desc', '');
       

        $this->load->view('admin/tags/add', $data);
        $this->load->view('admin/footer');
    }
     public function tags_save() {
//         $imp_value='';
//         $array_value=$this->input->post('temp[]');
//           if(!empty($array_value)){
//        foreach($array_value as $value){
//           $temp[] = $value;
//        }
//          $imp_value = implode(',', $temp);
//           }
        $data = array(
            'created' => date('Y-m-d H:i:s'),          
            'name' => $this->input->post('name'),                     
            'description' => $this->input->post('description'),                     
                              
            'is_active' => 1,
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tags', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('tags', $data);
            $ins_id = $this->db->insert_id();
        }


       
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/tags_list');
    }
     public function tags_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tags', array('id' => $id));
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/tags_list');
    }

    
      public function meal_plan_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['meal_plan'] = $this->Base_Model->get_records('meal_plan', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/meal_plan/list', $data);
        $this->load->view('admin/footer');
    }

    public function meal_plan_add($id = '') {
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
        $where[] = array(TRUE, 'id', $id);
        $data['meal_plan'] = $this->Base_Model->get_records('meal_plan', '', $where, 'row', 'id', 'desc', '');
        $this->load->view('admin/meal_plan/add', $data);
        $this->load->view('admin/footer');
    }
     public function meal_plan_save() {
  
        $data = array(
            'created' => date('Y-m-d H:i:s'),          
            'name' => $this->input->post('name'),                     
            'french_name' => $this->input->post('french_name'),                     
            'is_active' => 1,
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('meal_plan', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('meal_plan', $data);
            $ins_id = $this->db->insert_id();
        }


       
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/meal_plan_list');
    }
     public function meal_plan_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('meal_plan', array('id' => $id));
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/meal_plan_list');
    }
    
    
     public function products_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        
        
            
        
        
         $joins = array(
            array('meal_plan as m', 'm.id = p.meal_plan_id'),
        );
        $fields = array('p.*', 'm.name as meal_plan_name');
        // Banner Section
        
        $where[] = array(true, 'p.is_active', 1);
        
        $data['products'] = $this->Base_Model->get_advance_list('products as p', $joins, $fields, $where, '', '', '', '');
        $this->load->view('admin/products/list', $data);
        $this->load->view('admin/footer');
    }

    public function products_add($id = '') {
        
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
          $where_meal_plan[] = array(TRUE, 'is_active', 1);
        $data['meal_plan'] = $this->Base_Model->get_records('meal_plan', '', $where_meal_plan, '', 'id', 'desc', ''); 
        if(!empty($id)){
        $where[] = array(TRUE, 'id', $id);
        $data['products'] = $this->Base_Model->get_records('products', '', $where, 'row', 'id', 'desc', ''); 
        }
        $this->load->view('admin/products/add', $data);
        $this->load->view('admin/footer');
    }
     public function products_save() {
                    $net_per_night=$this->input->post('net_per_night');

//        if(!empty($this->input->post('net_per_night'))){
//            $net_per_night=$this->input->post('net_per_night');
//        }else{
//            $net_per_night=0;
//        }
        if(!empty($this->input->post('obsolete'))){
            $obsolete=$this->input->post('obsolete');
        }else{
            $obsolete=0;
        }
         
        $data = array(    
             'created' => date('Y-m-d H:i:s'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'provider_id' => $this->input->post('provider_id'),
            'net_rate' => $this->input->post('net_rate'),
            'net_per_night' =>$net_per_night,
            'meal_plan_id' => $this->input->post('meal_plan_id'),
            'obsolete' => $obsolete, 
            'is_active' => 1
            
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('products', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('products', $data);
            $ins_id = $this->db->insert_id();
        }


        
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/providers_add/'.$this->input->post('provider_id'));
    }
    public function products_delete($id,$provider_id) {
          $this->db->where('id', $id);
          $this->db->delete('products', array('id' => $id));
          $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/providers_add/'.$provider_id);
    }
    
     public function tours_status_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['tours_status'] = $this->Base_Model->get_records('tours_status', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/tours_status/list', $data);
        $this->load->view('admin/footer');
    }

    public function tours_status_add($id = '') {
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
        $where[] = array(TRUE, 'id', $id);
        $data['tours_status'] = $this->Base_Model->get_records('tours_status', '', $where, 'row', 'id', 'desc', '');
       

        $this->load->view('admin/tours_status/add', $data);
        $this->load->view('admin/footer');
    }
     public function tours_status_save() {
  
        $data = array(
            'created' => date('Y-m-d H:i:s'),          
            'name' => $this->input->post('name'),                     
            'is_active' => 1,
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tours_status', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('tours_status', $data);
            $ins_id = $this->db->insert_id();
        }


       
        $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        redirect('admin/tours_status_list');
    }
     public function tours_status_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tours_status', array('id' => $id));
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/tours_status_list');
    }
     public function tours_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['tours_info'] = $this->Base_Model->get_records('tours_info', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/tours/list', $data);
        $this->load->view('admin/footer');
    }
     public function tours_add($id = '') {
                   

        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
        $where[] = array(TRUE, 'id', $id);
        $data['tours_info'] = $this->Base_Model->get_records('tours_info', '', $where, 'row', 'id', 'desc', '');   
        $where_clients[] = array(TRUE, 'is_active', 1);
        $where_status[] = array(TRUE, 'is_active', 1);
        $data['clients'] = $this->Base_Model->get_records('clients', '', $where_clients, '', 'id', 'desc', ''); 
        $data['tours_status'] = $this->Base_Model->get_records('tours_status', '', $where_status, '', 'id', 'ASC', ''); 
        $this->load->view('admin/tours/add', $data);
        $this->load->view('admin/footer');
    }
       public function tours_info_save() {
            
         $create_date = date('Y-m-d', strtotime($this->input->post('create_date')));
 
        $data = array(                
            'client_id' => $this->input->post('client_id'),                     
            'tour_id' => $this->input->post('tour_id'),                     
            'tour_name' => $this->input->post('tour_name'),                     
            'create_date' => $create_date,             
            'pax' => $this->input->post('pax'),                     
            'lodging_type' => $this->input->post('lodging_type'),                     
            'tour_status_id' => $this->input->post('tour_status_id'),                    
            'is_active' => 1,
        );
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tours_info', $data);
            $ins_id = $this->input->post('id');
        } else {
            $this->db->insert('tours_info', $data);
            $ins_id = $this->db->insert_id();
        }
         if (!empty($_FILES['file_name']['name'])) {

            $this->load->helper('url');
            $this->load->library('upload');

            $filePath = './appdata/tours_info/' . $ins_id;

            $this->_mkdir($filePath);
            $file_name = str_replace(" ", "_", $_FILES['file_name']['name']);

            $newfile_name = preg_replace('/[^A-Za-z0-9]/', "", $file_name);
            $newfile_name = preg_replace("|[^a-zA-Z0-9./]|", "", $file_name);
            $config = array('allowed_types' => '*',
                'upload_path' => $filePath,
                'file_name' => $newfile_name);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             
            if (!$this->upload->do_upload('file_name')) {
                $error = array('error' => $this->upload->display_errors());
                 
            }
            $upload_data = $this->upload->data();
             
            $file_name = $upload_data['file_name'];
            $value = array('file_name' => $file_name);
            $this->db->where('id', $ins_id);
            $this->db->update('tours_info', $value);
        }

if(!empty($this->input->post('save_and_continue'))){
    $this->session->set_flashdata('tour_info', 'Your data inserted Successfully..');
    redirect('admin/tours_add/'.$ins_id);
}elseif(!empty($this->input->post('save'))){
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
     redirect('admin/tours_list');
}
       
        
        
       
    }
     public function tours_info_notes_save() {
            if($this->input->post('id')){        
        $data = array(        
                         
            'notes' => $this->input->post('notes'),                     
            
        );
        
        if (!empty($this->input->post('id'))) {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tours_info', $data);
            $ins_id = $this->input->post('id');
        }  

if(!empty($this->input->post('save_and_continue'))){
    $this->session->set_flashdata('tour_info_notes', 'Your data inserted Successfully..');
    redirect('admin/tours_add/'.$ins_id);
}elseif(!empty($this->input->post('save'))){
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
     redirect('admin/tours_list');
}
       
            }
        
       
    }
     public function tours_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tours_info', array('id' => $id));
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/tours_list');
    }
    
      public function tours_info_list() {
        $this->is_loggedin();
        $this->load->view('admin/header');
        $data['tours_info'] = $this->Base_Model->get_records('tours_info', '', '', '', 'id', 'desc', '');
        $this->load->view('admin/tours_info/list', $data);
        $this->load->view('admin/footer');
    }

    public function tours_info_add($id = '') {
        $this->is_loggedin();
        $data = '';
        $this->load->view('admin/header');
        $where[] = array(TRUE, 'id', $id);
        $data['tours_info'] = $this->Base_Model->get_records('tours_info', '', $where, 'row', 'id', 'desc', '');   
        $where_clients[] = array(TRUE, 'is_active', 1);
        $where_status[] = array(TRUE, 'is_active', 1);
        $data['clients'] = $this->Base_Model->get_records('clients', '', $where_clients, '', 'id', 'desc', ''); 
        $data['tours_status'] = $this->Base_Model->get_records('tours_status', '', $where_status, '', 'id', 'desc', ''); 
        $this->load->view('admin/tours_info/add', $data);
        $this->load->view('admin/footer');
    }
    
     public function tours_info_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tours_info', array('id' => $id));
        $this->session->set_flashdata('message', 'Your data deleted Successfully..');
        redirect('admin/tours_info_list');
    }
 
    
      public function deleteimg($file = '', $id = '') {
 
        
        $detail = $this->db->select('file_name')->from('providers')
                        ->where("file_name LIKE '%$file%'")->where("id", $id)->get()->row();

        $explode = explode(',', $detail->file_name);
     
        $result = $this->remove_element($explode, $file);

        $fileName = implode(',', $result);


        $value = array('file_name' => $fileName);

        $this->db->where('id', $id);
        $this->db->update('providers', $value);
        $this->session->set_flashdata('message', 'Your Image deleted Successfully..');
        redirect('admin/providers_add/'.$id);
 
    }
    public function deleteimg_logo($file = '', $id = '') {
 
        
       $data = array('logo' => '');
        $this->db->where('id', $id);        
        $this->db->update('destinations', $data);
        $this->session->set_flashdata('message', 'Your Image deleted Successfully..');
        redirect('admin/destinations_add/'.$id);
 
    }
    public function deleteimg_flag($file = '', $id = '') {
 
         $data = array('flag' => '');
        $this->db->where('id', $id);        
        $this->db->update('destinations', $data);

 
        $this->session->set_flashdata('message', 'Your Image deleted Successfully..');
        redirect('admin/destinations_add/'.$id);
 
    }
    
    public function remove_element($array, $value) {
        return array_diff($array, (is_array($value) ? $value : array($value)));
    }
        public function uploadimage() {
        if (!empty($_FILES['file']['name'])) {
            $filePath = './appdata/temp_provider';
            $this->_mkdir($filePath);


            $file_name = str_replace(" ", "_", $_FILES['file']['name']);

            $newfile_name = preg_replace('/[^A-Za-z0-9]/', "", $file_name);
            $newfile_name = preg_replace("|[^a-zA-Z0-9./]|", "", $file_name);
            $config = array('allowed_types' => '*',
                'upload_path' => $filePath,
                'file_name' => $newfile_name);

            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {

                $error = array('error' => $this->upload->display_errors());
            } else {
                $upload_data = $this->upload->data();
                $str = $upload_data['file_name'];
                echo ltrim($str, " ");
            }
        }
    }
       public function removeimage() {
        $file = $this->input->post('file');


        if ($file && file_exists($this->upload_path . "/" . $file)) {
            unlink($this->upload_path . "/" . $file);
        }
    }
    function _mkdir($target) {
        // from php.net/mkdir user contributed notes
        if (file_exists($target)) {
            if (!@is_dir($target)) {
                echo 1;
                die;
            } else {
                return true;
            }
        }

        // Attempting to create the directory may clutter up our display.
        if (@mkdir($target)) {
            $stat = @stat(dirname($target));
            $dir_perms = $stat['mode'] & 0007777;  // Get the permission bits.
            @chmod($target, $dir_perms);
            return true;
        } else {
            if (is_dir(dirname($target))) {
                return false;
            }
        }

        // If the above failed, attempt to create the parent node, then try again.
        if ($this->_mkdir(dirname($target))) {
            return $this->_mkdir($target);
        }

        return false;
    }

    function check_email() {

        $email = trim($this->input->post('email'));
        $this->db->where('email', $email);
        $query = $this->db->get('users')->result_array();

        if (count($query) > 0) {
            echo json_encode(FALSE);
            die;
        } else {
            echo json_encode(TRUE);
            die;
        }
    }
    public function session_set(){
        
      if($_REQUEST['destination_id']==''){
          $this->session->unset_userdata('destination_id');

          echo 1;
      }else{
        $this->session->set_userdata('destination_id',$_REQUEST['destination_id']);
         echo 1;
      }

    }
    public function get_client_name(){
          $where[] = array(TRUE, 'id', $_REQUEST['client_id']);
            $clients = $this->Base_Model->get_records('clients', '', $where, 'row', 'id', 'desc', ''); 
           $tour_name= $clients->first_name.' '.$clients->last_name;
            echo json_encode($tour_name);
      
    }
    public function get_tour_id(){
     
      $where[] = array(TRUE, 'id', $_REQUEST['client_id']);
     $clients = $this->Base_Model->get_records('clients', '', $where, 'row', 'id', 'desc', ''); 
    $tour_name= $clients->first_name.' '.$clients->last_name;
    
    $tours_info = $this->Base_Model->get_records('tours_info', '', '', 'row', 'id', 'desc', '',1); 
   if(empty($tours_info)){
       $tourcount=1;
   }else{
    $tourcount=$tours_info->id+1;

   }
   $where_destinations[] = array(TRUE, 'id', $this->session->userdata('destination_id'));
    $destinations = $this->Base_Model->get_records('destinations', '', $where_destinations, 'row', 'id', 'desc', ''); 
    
    $tour_id=$destinations->short_name.'-'.$tourcount.'-'.$clients->short_name;
   
   echo json_encode($tour_id);
    }

    function is_loggedin() {
         
        if (empty($this->session->userdata('isUserLoggedIn'))) {
            redirect('login', 'refresh');
        }
    }

}
