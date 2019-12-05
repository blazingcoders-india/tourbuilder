<?php

class Base_Model extends CI_Model {
    /*     * *    Update table without set ** */

    public function update($table, $dataArray, $whereArray) {
        if (!empty($whereArray))
            $this->db->where($whereArray);
        $this->db->update($table, $dataArray);
        return $this->db->affected_rows();
    }

    /*     * *   Function to update table ** */

    public function adv_update($table, $dataArray, $whereArray) {
        if (is_array($whereArray))
            $this->db->where($whereArray);
        else
            $this->db->where('(' . $whereArray . ')');
        foreach ($dataArray as $key => $value) {
            $this->db->set($key, $value, FALSE);
        }
        $this->db->update($table);
        return $this->db->affected_rows();
    }

    /*     * *    Function to insert and get last insert id in return ** */

    public function insert($table, $insert_array) {
        $return_var = false;
        $this->db->trans_start();
        $insert_response = $this->db->insert($table, $insert_array);
        if ($insert_response) {
            $insert_id = $this->db->insert_id();
            $return_var = $insert_id;
        }
        $this->db->trans_complete();
        return $return_var;
    }

    /*     * *    Function to insert and get last insert id in return ** */

    public function insert_batch($table, $insert_array) {
        $return_var = false;
        $this->db->trans_start();
        $insert_response = $this->db->insert_batch($table, $insert_array);
        /* if ($insert_response) {
          $insert_id  = $this->db->insert_id();
          $return_var = $insert_id;
          } */
        $this->db->trans_complete();
        return TRUE;
    }

    /*     * *    Function to check exist record and insert and get last insert id in return ** */

    public function CheckExistAndInsert($table, $insert_array, $checkArray) {
        $count = $this->getCount($table, $checkArray);
        if (!$count) {
            $return_var = false;
            $this->db->trans_start();
            $insert_response = $this->db->insert($table, $insert_array);
            if ($insert_response) {
                $insert_id = $this->db->insert_id();
                $return_var = $insert_id;
            }
            $this->db->trans_complete();
            return $return_var;
        } else {
            return true;
        }
    }

    /*     * *    Function to check exist record and insert and get last insert id in return ** */

    public function CheckExistAndUpdate($table, $insert_array, $checkArray) {
        $count = $this->get_records($table, 'id', $checkArray, 'row_array');
        if (!empty($count) && $count['id']) {
            $return_var = false;
            $this->db->trans_start();
            $insert_response = $this->db->update($table, $insert_array, array('id' => $count['id']));
            if ($insert_response) {
                $insert_id = $this->db->insert_id();
                $return_var = $insert_id;
            }
            $this->db->trans_complete();
            return $return_var;
        } else {
            $this->db->trans_start();
            $this->db->insert($table, $insert_array);
            $this->db->trans_complete();
            return true;
        }
    }

    /*     * *    Function to get count  ** */

    public function getCount($table, $where) {
        if (is_array($where))
            $this->db->where($where);
        else
            $this->db->where('(' . $where . ')');
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    /*     * *    Function to get record by id  ** */

    public function getRow($table, $fields = array('*'), $where, $return = array('return' => 'row_object'), $remove_apos = true) {
        $this->db->select($fields, $remove_apos);
        if (is_array($where))
            $this->db->where($where);
        else
            $this->db->where('(' . $where . ')');
        $query = $this->db->get($table);
        return $query->$return['return']();
    }

    /*     * *	Function to get table rows with conditions and limit ** */

    public function getList($table, $fields = array('*'), $conditions = array(), $return = array('return' => 'result_array'), $sort_field = null, $order_by = 'desc', $group_by = array(), $limit_start = null, $limit_end = null, $remove_apos = true) {
        $this->db->select($fields, $remove_apos);
        $this->db->from($table);
        if (!empty($conditions)) {
            foreach ($conditions as $key => $cond) {

                if (!$cond['direct']) {
                    if (isset($cond['adv']))
                        $this->db->$cond['rule']($cond['field'], $cond['value'], $cond['adv']);
                    else
                        $this->db->$cond['rule']($cond['field'], $cond['value']);
                } else
                    $this->db->$cond['rule']($cond['value']);
            }
        }
        if (!$sort_field)
            $this->db->order_by('id', $order_by);
        else
            $this->db->order_by($sort_field, $order_by);
        if ($group_by)
            $this->db->group_by($group_by);

        if ($limit_start != '' || $limit_end != '')
            $this->db->limit($limit_start, $limit_end);

        $query = $this->db->get();
        return $query->$return['return']();
    }

    public function getCommonList($table, $fields = array('*'), $where = array(), $limit = '') {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where('is_active', '1');
        if (is_array($where))
            $this->db->where($where);
        if ($limit)
            $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

    /*     * * Function to get table rows with conditions and limit ** */

    public function getAdvanceList($table, $join_tables = array(), $fields = array('*'), $conditions = array(), $return = array('return' => 'result_array'), $sort_field = null, $order_by = 'desc', $group_by = array(), $limit_start = null, $limit_end = null, $remove_apos = true) {
        /*         * ** Paramenters *** */
        /*         * * 1 table = Main Table
          2 join_tables =    Join table name
          3 Fields = required fields
          4 conditions = Where Conditions
          5 return = return array
          6 sort_field
          7 order_by
          8 group_by
          9 limit_start=null
          10 limit_end=null
          11 apostrepe  *** */

        $this->db->select($fields, $remove_apos);
        $this->db->from($table);

        if (!empty($join_tables)) {
            foreach ($join_tables as $joins) {
                $this->db->join($joins['table_name'], $joins['table_condition'], $joins['table_type']);
            }
        }
        if (!empty($conditions)) {
            foreach ($conditions as $key => $cond) {

                if (!$cond['direct']) {
                    if (isset($cond['adv']))
                        $this->db->$cond['rule']($cond['field'], $cond['value'], $cond['adv']);
                    else
                        $this->db->$cond['rule']($cond['field'], $cond['value']);
                } else
                    $this->db->$cond['rule']($cond['value']);
            }
        }
        if ($group_by)
            $this->db->group_by($group_by);

        if ($return['return'] != 'num_rows') {
            if ($sort_field && $order_by)
                $this->db->order_by($sort_field, $order_by);
            if ($limit_start != '' || $limit_end != '')
                $this->db->limit($limit_start, $limit_end);
        }

        $query = $this->db->get();
        return $query->$return['return']();
    }

    /*     * * Function to get table rows with conditions and limit ** */
    /*     * ** Paramenters *** */
    /*     * * 1 table = Main Table
      2 join_tables =    Join table name
      3 Fields = required fields
      4 conditions = Where Conditions
      5 return = return array
      6 sort_field
      7 order_by
      8 group_by
      9 limit_start=null
      10 limit_end=null
      11 apostrepe  *** */

    /*     * * Condition params 
      0. direct
      1. Field
      2. value
      3. rule
      4. advance rule
     * * */

    public function get_advance_list($table, $join_tables = array(), $fields = array('*'), $conditions = array(), $return = 'result_array', $sort_field = null, $order_by = 'desc', $group_by = array(), $limit_start = null, $limit_end = null, $remove_apos = true) {
        $this->db->select($fields, $remove_apos);
        $this->db->from($table);

        if (!empty($join_tables)) {
            foreach ($join_tables as $joins) {
                if (!isset($joins[2]))
                    $joins[2] = 'left';
                $this->db->join($joins[0], $joins[1], $joins[2]);
            }
        }
        if (!empty($conditions)) {
            foreach ($conditions as $key => $cond) {
                if (!isset($cond[3]))
                    $cond[3] = "where";

                if ($cond[0]) {
                    if (isset($cond[4]))
                        $this->db->$cond[3]($cond[1], $cond[2], $cond[4]);
                    else
                        $this->db->$cond[3]($cond[1], $cond[2]);
                } else
                    $this->db->$cond[3]($cond[1]);
            }
        }
        if ($group_by)
            $this->db->group_by($group_by);

        if ($return != 'num_rows') {
            if ($sort_field && $order_by)
                $this->db->order_by($sort_field, $order_by);
            if ($limit_start != '' || $limit_end != '')
                $this->db->limit($limit_start, $limit_end);
        }

        $query = $this->db->get();
// echo $this->db->last_query();
 
        $return = ($return) ? $return : 'result_array';
        return $query->$return();
    }

    /*     * *	Function to get table rows with conditions and limit ** */

    public function get_records($table, $fields = array('*'), $conditions = array(), $return = 'result_array', $sort_field = null, $order_by = 'desc', $group_by = array(), $limit_start = null, $limit_end = null, $remove_apos = true) {
        $this->db->select($fields, $remove_apos);
        $this->db->from($table);
        if (!empty($conditions)) {
            foreach ($conditions as $key => $cond) {
                if (!isset($cond[3]))
                    $cond[3] = "where";

                if ($cond[0]) {
                    if (isset($cond[4]))
                        $this->db->$cond[3]($cond[1], $cond[2], $cond[4]);
                    else
                        $this->db->$cond[3]($cond[1], $cond[2]);
                } else
                    $this->db->$cond[3]($cond[1]);
            }
        }
        if (!$sort_field)
            $this->db->order_by('id', $order_by);
        else
            $this->db->order_by($sort_field, $order_by);
        if ($group_by)
            $this->db->group_by($group_by);

        if ($limit_start != '' || $limit_end != '')
            $this->db->limit($limit_start, $limit_end);

        $query = $this->db->get();
//        echo $this->db->last_query();
        $return = ($return) ? $return : 'result_array';
        return $query->$return();
    }

    public function get_record_by_id($table_name, $select, $where, $all_rec = false, $order_by = array()) {
        $this->db->select($select);
        if (is_array($where))
            $this->db->where($where);
        else
            $this->db->where('(' . $where . ')');
        if (!empty($order_by)) {
            if ($order_by['field'] && $order_by['sort'])
                $this->db->order_by($order_by['field'], $order_by['sort']);
        }
        $query = $this->db->get($table_name);
        if ($all_rec)
            return $query->result_array();
        else
            return $query->row_array();
    }

    /*     * *    Delete a record from table ** */

    public function delete($table, $where) {
        if (is_array($where)) {
            $this->db->where($where);
        } else {
            $this->db->where('(' . $where . ')');
        }
        $this->db->delete($table);
        return TRUE;
        /* $report            = array();
          $report['error']   = $this->db->_error_number();
          $report['message'] = $this->db->_error_message();
          if ($report !== 0) {
          return true;
          } else {
          return false;
          } */
    }

    function db_inactive($primary_key_value) {
        $primary_key_field = $this->get_primary_key();

        if ($primary_key_field === false)
            return false;

        $this->db->update($this->table_name, array(
            "is_active" => 0
                ), array(
            $primary_key_field => $primary_key_value
        ));
        if ($this->db->affected_rows() != 1)
            return false;
        else
            return true;
    }

    function db_active($primary_key_value) {
        $primary_key_field = $this->get_primary_key();

        if ($primary_key_field === false)
            return false;

        $this->db->update($this->table_name, array(
            "is_active" => 1
                ), array(
            $primary_key_field => $primary_key_value
        ));
        if ($this->db->affected_rows() != 1)
            return false;
        else
            return true;
    }

    function db_bulkdelete($primary_key_value) {
        $primary_key_field = $this->get_primary_key();

        if ($primary_key_field === false)
            return false;
        $this->db->delete($this->table_name, array(
            $primary_key_field => $primary_key_value
        ));
        if ($this->db->affected_rows() != 1)
            return false;
        else
            return true;
    }

    function db_updatestatus($primary_key_value, $status) {
        $primary_key_field = $this->get_primary_key();

        if ($primary_key_field === false)
            return false;

        $this->db->update($this->table_name, array(
            "is_active" => $status
                ), array(
            $primary_key_field => $primary_key_value
        ));
        if ($this->db->affected_rows() != 1)
            return false;
        else
            return true;
    }

    function db_get_parent_name($primary_key_value) {
        $primary_key_field = $this->get_primary_key();
        $query = "select  title FROM `" . $this->table_name . "` WHERE `" . $primary_key_field . "` = '" . $primary_key_value . "'";
        $result = $this->db->query($query);
        return $result;
    }

    /*     * * Function for find or save by id  ** */

    function findOrSaveById($tablename, $findfield = null, $finddata = '', $advenseSaveData = array(), $condition = array(), $name_field = '') {
        $this->db->select('id');
        $this->db->from($tablename);
        if (!empty($condition)) {
            foreach ($condition as $val => $con) {
                $this->db->where($val, $con);
            }
        } else {
            if ($findfield)
                $this->db->where($findfield, $finddata);
            else
                $this->db->where('name', $finddata);
        }
        $query = $this->db->get();
        $result = $query->row_array();
        if (!empty($result)) {
            return $result['id'];
        } else {
            $config = array(
                'field' => 'name',
                'title' => 'name',
                'table' => $tablename,
                'id' => 'id',
            );
            $this->load->library('slug', $config);
            $field = ($this->input->post($name_field)) ? $this->input->post($name_field) : $finddata;
            $data = array(
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'name' => ($this->input->post($name_field)) ? $this->input->post($name_field) : $finddata,
                'slug' => $this->slug->create_uri($field),
                'is_active' => 1
            );
            $data = array_merge($data, $advenseSaveData);
            $insert = $this->db->insert($tablename, $data);
            return $this->db->insert_id();
        }
    }

    //Curl Function Create
    function curl_connect($url, $data) {
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    function getCategories($type = null, $fields = array('*')) {
        $this->db->select($fields);
        $this->db->from('categories');
        if ($type == 'main')
            $this->db->where('parent_id', 0);
        if ($type == 'sub')
            $this->db->where('parent_id !=', 0);
        $this->db->where('is_active', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getSelectList($table, $where = array(), $default = array(), $fields = 'id,name') {
        $data = array();
        $field = explode(',', $fields);
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where('is_active', '1');
        $this->db->order_by($field[1], 'asc');
        if (is_array($where))
            $this->db->where($where);
        $query = $this->db->get();
        if (!empty($default)) {
            $data = $default;
        }
        foreach ($query->result_array() as $row) {
            $data[$row[$field[0]]] = ucfirst($row[$field[1]]);
        }
        return $data;
    }

    function getWidget($slug = NULL) {
        $this->db->select('content');
        $this->db->where('slug', $slug);
        $this->db->where('is_active', 1);
        $query = $this->db->get('widgets');
        return $query->row();
    }

    function getAggreate_value($table, $agg_fn, $field, $where) {
        $this->db->select($agg_fn . '(' . $field . ') as ' . $field);
        $this->db->where($where);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->row_array();
    }

    function findUserInfo($where, $fields = "*") {
        $this->db->select($fields);
        $this->db->where($where);
        $query = $this->db->get('users');
        $data['table'] = "users";
        $data['userInfo'] = $query->row();
        if (empty($data['userInfo'])) {
            $this->db->select($fields);
            $this->db->where($where);
            $query1 = $this->db->get('vendor_users');
            $data['userInfo'] = $query1->row();
            $data['table'] = "vendor_users";
        }
        return $data;
    }

    function findMultiUserInfo($where, $fields = "*", $multi = true) {
        $this->db->select($fields);
        $this->db->where($where);
        $query = $this->db->get('users');
        $data['user'] = $query->result_array();
        if ($multi) {
            $this->db->select($fields);
            $this->db->where($where);
            $query1 = $this->db->get('vendor_users');
            $data['vendor'] = $query1->result_array();

            $this->db->select($fields);
            $this->db->where($where);
            $query1 = $this->db->get('admin_users');
            $data['admin'] = $query1->result_array();
        }
        return $data;
    }

    function slug($data, $primary_key = "") {
        if (!empty($primary_key)) {
            return $this->slug->create_uri($data, $primary_key);
        } else {
            return $this->slug->create_uri($data);
        }
    }

}
