<?php
class Web_enquiry_form_model extends CI_Model {

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
        if (!isset($raw['created_at'])) {
            $raw['created_at'] = microtime_to_mssql_time(microtime());
        }
        if (!isset($raw['deleted'])) {
            $raw['deleted'] = False;
        }
        return $this->db->insert('Web_enquiry_form', $raw);
    }
    
    public function update($web_enquiry_form_id, $raw)
    {
        $this->db->where('web_enquiry_form_id', $web_enquiry_form_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
        $raw['updated_at'] = microtime_to_mssql_time(microtime());
        return $this->db->update('Web_enquiry_form', $raw); 
    }
    
    public function get_by($pairs)
    {
        $query = $this->db->get_where('Web_enquiry_form', $pairs);
        return $query->result();
    }
    
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('Web_enquiry_form');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_twenty_entries($page)
    {
        $offset = ($page - 1) * 20;
        $greater_offset = ($page) * 20;
        $query = $this->db->query("SELECT * FROM (
                           SELECT Web_enquiry_form.web_enquiry_form_id,
                           Web_enquiry_form.customer_name,
                           Web_enquiry_form.customer_phone_no,
                           Web_enquiry_form.customer_age,
                           Web_enquiry_form.customer_email,
                           Web_enquiry_form.district_id,
                           Web_enquiry_form.ad_source_id,
                           Web_enquiry_form.enquiry_content_id,
                           Web_enquiry_form.details,
                           Web_enquiry_form.created_at,
                           District.district_name,
                           Brand.brand_name,
                           Ad_source.ad_source_name,
                           Enquiry_content.enquiry_content_name,
                           ROW_NUMBER() OVER (ORDER BY Web_enquiry_form.created_at) AS row_num
                           from Web_enquiry_form
                           INNER JOIN District ON Web_enquiry_form.district_id = District.district_id 
                           INNER JOIN Brand ON Web_enquiry_form.brand_id = Brand.brand_id 
                           INNER JOIN Ad_source ON Web_enquiry_form.ad_source_id = Ad_source.ad_source_id 
                           INNER JOIN Enquiry_content ON Web_enquiry_form.enquiry_content_id = Enquiry_content.enquiry_content_id 
                        ) AS result
                        WHERE row_num > {$offset} AND row_num <= {$greater_offset}");
        $result = $query->result();
        // remove microseconds
        foreach($result as $key=>$row)
        {
            $pattern = '/(.*):(\d{2}):(\d{2}).(\d{3})/';
            $replacement = '$1:$2';
            $result[$key]->created_at = preg_replace($pattern, $replacement, $row->created_at);;
        }
        return $result;
    }
    
    public function count_by($pairs)
    {
        $this->db->where($pairs);
        $this->db->from('Web_enquiry_form');
        return $this->db->count_all_results();
    }
}