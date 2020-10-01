<?php

class Users_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	function read_user_list()
	{
		$this->db->select();
		$this->db->join('usertypes','users.userTypeID = usertypes.userTypeID');
		$this->db->where('usertypes.userTypeKey', 'User');
        $query = $this->db->get('users');
        return $query->result_array();
	}

	function authorize_user($userID, $change_status)
	{
		$status = 0;
		if ($change_status == 'authorize') {
			$status = 1;
		}
		else if ($change_status == 'activate') {
			$status = 1;
		}
		else
		{
			$status = 2;
		}
		$this->db->where('userID', $userID);
		$this->db->set('status',$status);
		$this->db->update('users');

		if ($this->db->trans_status() === TRUE)
		{
		 	return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function read_user_by_id($userID)
	{
		$this->db->select();
		$this->db->where('userID', $userID);
		$query = $this->db->get('users');

		return $query->row_array();
	}
	function create_user($userFirstName,$userEmail, $userAddress, $userPassword)
	{
		$user_data=array( 
							'userFirstName'		=> $userFirstName,
							'userTypeID'		=> 2,
							'userEmail'			=> $userEmail,
							'userAddress'		=> $userAddress,
							'userPassword'		=> $userPassword,
							'status'			=> 0
							);
			
		$this->db->insert('users', $user_data);

		return $this->db->insert_id();
	}

	function user_exists($userEmail)
	{
		$query = $this->db->get_where('users',array(
															'userEmail'		=> $userEmail
		                	         					  )
		                              );

		if($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function update_user($userID, $userFirstName, $userAddress, $userPassword){

		$users_update = array( 
									'userFirstName'		=> $userFirstName,
									'userAddress'		=> $userAddress,
									'userPassword'		=> $userPassword
									
			);

		$this->db->where('userID',$userID);
		$this->db->update('users',$users_update);

		if ($this->db->trans_status() === TRUE)
		{
		 	return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}