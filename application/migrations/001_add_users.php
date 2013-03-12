<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Users extends CI_Migration {
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->load->database();
        echo 'hello';
    }

	public function up()
	{
        $query = $this->db->query('
CREATE TABLE Users
(user_id int NOT NULL IDENTITY(1,1),
username char(25) NOT NULL,
password char(25) NOT NULL,
display_name char(50) NOT NULL,
deleted bit NOT NULL,
inactive bit NOT NULL,
PRIMARY KEY (user_id),
UNIQUE (username, password))');
        $this->db->query($query);
	}

	public function down()
	{
        $query = $this->db->query('
DROP TABLE Users');
        $this->db->query($query);
	}
}