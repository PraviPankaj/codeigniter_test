<?php

class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	function read_user_by_email($email)
	{
		$this->db->select();
		$this->db->join('usertypes','users.userTypeID = usertypes.userTypeID');
		$this->db->where('userEmail', $email);
		$this->db->where('status', 1);
        $query = $this->db->get('users');
        return $query->row_array();
	}
	
	
}