<?php

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function upload_image($filename, $ins_id,$folder_name) {
  
             $filePath = './appdata/'.$folder_name.'/' . $ins_id;
            $this->_mkdir($filePath);
            $file_name = str_replace(" ", "_", $filename);
            $newfile_name = preg_replace('/[^A-Za-z0-9]/', "", $file_name);
            $newfile_name = preg_replace("|[^a-zA-Z0-9./]|", "", $file_name);
            $config = array('allowed_types' => '*',
                'upload_path' => $filePath,
                'file_name' => $newfile_name);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('flag')) {
                $error = array('error' => $this->upload->display_errors());
            }

            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $value = array('flag' => $file_name);
            $this->db->where('id', $ins_id);
            $this->db->update('destinations', $value);
            
            
    }
    public function upload_image_logo($filename, $ins_id,$folder_name) {
  
             $filePath = './appdata/'.$folder_name.'/' . $ins_id;
            $this->_mkdir($filePath);
            $file_name = str_replace(" ", "_", $filename);
            $newfile_name = preg_replace('/[^A-Za-z0-9]/', "", $file_name);
            $newfile_name = preg_replace("|[^a-zA-Z0-9./]|", "", $file_name);
            $config = array('allowed_types' => '*',
                'upload_path' => $filePath,
                'file_name' => $newfile_name);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
            }

            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $value = array('logo' => $file_name);
            $this->db->where('id', $ins_id);
            $this->db->update('destinations', $value);
            
            
    }
    public function upload_image_provider($filename, $ins_id,$folder_name) {
  
             $filePath = './appdata/'.$folder_name.'/' . $ins_id;
            $this->_mkdir($filePath);
            $file_name = str_replace(" ", "_", $filename);
            $newfile_name = preg_replace('/[^A-Za-z0-9]/', "", $file_name);
            $newfile_name = preg_replace("|[^a-zA-Z0-9./]|", "", $file_name);
            $config = array('allowed_types' => '*',
                'upload_path' => $filePath,
                'file_name' => $newfile_name);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
            }

            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $value = array('image' => $file_name);
            $this->db->where('id', $ins_id);
            $this->db->update('providers', $value);
            
            
    }
    public function upload_directory_provider($filename, $ins_id,$folder_name) {
  
             $filePath = './appdata/'.$folder_name.'/' . $ins_id;
            $this->_mkdir($filePath);
            $file_name = str_replace(" ", "_", $filename);
            $newfile_name = preg_replace('/[^A-Za-z0-9]/', "", $file_name);
            $newfile_name = preg_replace("|[^a-zA-Z0-9./]|", "", $file_name);
            $config = array('allowed_types' => '*',
                'upload_path' => $filePath,
                'file_name' => $newfile_name);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('directory')) {
                $error = array('error' => $this->upload->display_errors());
            }

            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $value = array('directory' => $file_name);
            $this->db->where('id', $ins_id);
            $this->db->update('providers', $value);
            
            
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
   

}
