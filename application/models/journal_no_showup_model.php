<?php
class Journal_no_showup_model extends CI_Model {

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
        return $this->db->insert('Journal_no_showup', $raw);
    }
    
    public function update($journal_no_showup_id, $raw)
    {
        $this->db->where('journal_no_showup_id', $journal_no_showup_id);
        foreach($raw as $key => $value)
        {
            $raw[$key] = $this->db->escape_str($value);
        }
    }
}