<?php
class Authentication_by_Post_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function create($raw)
    {
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        if (!isset($raw['deleted'])) {
            $raw['deleted'] = False;
        }
        return $this->db->insert('Authentication_by_Post', $raw);
    }
    
    public function update($authentication_by_Post_id, $raw)
    {
        $this->db->where('authentication_by_Post_id', $authentication_by_Post_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Authentication_by_Post', $raw); 
    }
    
    public function delete($pairs)
    {
        $this->db->delete('Authentication_by_Post', $pairs); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Authentication_by_Post', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('Authentication_by_Post');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_controller_methods($post_id)
    {
        $this->db->select('post_id, controller, controller_method, http_method');
        $this->db->from('Authentication_by_Post');
        $this->db->order_by('controller desc, controller_method desc, http_method desc');
        $query = $this->db->get();
        $result = $query->result();
        return $this->organise_controller_methods($result);
    }
    
    public function create_controller_for_post($post_id, $controller, $methods) {
        // divide controller methods and html methods using regular expression
        $controller_methods = preg_split("/[\s,]+/", $methods);
        foreach ($controller_methods as $controller_method)
        {
            $result;
            preg_match_all('/^([a-z]+)\[[a-z|]+\]$/', $controller_method, $result);
            $c_method = $result[1][0];

            $result;
            preg_match_all('/^[a-z]+\[([a-z|]+)\]$/', $controller_method, $result);
            $http_methods_string = $result[1][0];
            $http_methods = preg_split("/[\s|]+/", $http_methods_string);
            // create entries in db
            foreach ($http_methods as $http_method)
            {
                $this->Authentication_by_post_model->create(array('post_id'=>$post_id,
                                                                 'controller'=>$controller,
                                                                 'controller_method'=>$c_method,
                                                                 'http_method'=>$http_method,
                                                                 'created_at'=>microtime_to_mssql_time(microtime())));
            }
        }
    }
    
    public function edit_controller_for_post($post_id, $controller, $methods) {
        $this->delete_controller_for_post($post_id, $controller);
        $this->create_controller_for_post($post_id, $controller, $methods);
    }
    
    public function search_controller_methods($post_id, $controller) {
        $result = $this->Authentication_by_post_model->get_by(array('post_id'=>$post_id,
                                                                    'controller'=>$controller));
        return $this->organise_controller_methods($result);
    }
    
    private function organise_controller_methods($result)
    {
        $organised_result = array();
        for ($i = 0; $i<count($result); $i++)
        {
            if (!array_key_exists($result[$i]->controller, $organised_result)) $organised_result[$result[$i]->controller] = array();
            if (!array_key_exists($result[$i]->controller_method, $organised_result[$result[$i]->controller])) 
                    $organised_result[$result[$i]->controller][$result[$i]->controller_method] = array();
            array_push($organised_result[$result[$i]->controller][$result[$i]->controller_method], $result[$i]->http_method);
        }
        $return_array = array();
        foreach ($organised_result as $controller=>$controller_methods)
        {
            $controller_methods_array = array();
            foreach ($controller_methods as $controller_method=>$http_methods)
            {
                $http_methods_string = implode("|", $http_methods);
                $controller_methods_array[] = $controller_method.'['.$http_methods_string.']';
            }
            $controller_methods_string = implode(",", $controller_methods_array);
            array_push($return_array, array('controller'=>$controller,
                                                   'controller_methods'=>$controller_methods_string));
        }
        return $return_array;
    }
    
    public function delete_controller_for_post($post_id, $controller)
    {
        $this->delete(array('post_id'=>$post_id,
                            'controller'=>$controller));
    }
}