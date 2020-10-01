<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		
		$this->load->model('users_model');
		$this->load->library('form_validation');
		$this->load->helper('form_message');
		

	}	

	/* sale report summary */

	public function index()
	{
		if ($this->account->isLoggedIn())
    	{
    		$data['metadata'] = metadata('User List');
    		$data['user_list'] = $this->users_model->read_user_list();
			$this->load->view('common/header', $data);
			$this->load->view('user/user',$data);
			$this->load->view('common/footer', $data);
		}

	}

	function authorize_users($userID,$change_status)
	{
		if ($this->account->isLoggedIn())
        {
        	if(($this->session->userdata('userType') == 'admin'))
	        {
	        	$this->load->library('form_validation');
				$this->load->helper('form_message');
				if ($this->input->post('confirmAuthorize')==1) 
				{
				    
				    				
					if($this->users_model->authorize_user($userID, $change_status))
					{
						
						//$data['form_message']['authorizeUserForm'] = form_message('success','User Authorized successfully');
						redirect(base_url().'users');
					}
						
				}					

				$data['change_status'] = $change_status;
				$data['users'] = $this->users_model->read_user_by_id($userID);
				$data['metadata'] = metadata('Authorize users');

				$this->load->view('common/header', $data);
				$this->load->view('user/authorize_user', $data);
				$this->load->view('common/footer', $data);
			}
			else
			{
				redirect(base_url().'dashboard');
			}
		}
	}
	// public function daily_sale_report_summary()
	// {}

	function add_user()
	{
		
    	$userFirstName = $this->input->post('userFirstName');
    	$userAddress = $this->input->post('userAddress');
    	$userEmail = $this->input->post('userEmail');	
    	$userPassword = $this->input->post('userPassword');	
    	$confirmPassword = $this->input->post('confirmPassword');
		
		$this->form_validation->set_rules('userFirstName','Name','required|trim');
		$this->form_validation->set_rules('userAddress','Address','required|trim');
		$this->form_validation->set_rules('userEmail','Email','required|trim');
		$this->form_validation->set_rules('userPassword','Password','required|trim');
		$this->form_validation->set_rules('confirmPassword','Confirm Password','required|trim');
		
		if($this->form_validation->run())
		{
			if($userPassword == $confirmPassword)
			{
				if(! $this->users_model->user_exists($userEmail))
				{
					if($userID = $this->users_model->create_user($userFirstName,$userEmail, $userAddress, $userPassword))
					{
						if(! empty($userID))
						{
							create_form_message('success', 'addUserForm', "User Added Successfully");
						}
					}
				}
				else
				{
					create_form_message('warning', 'addUserForm', "Email Already exist with another user");
				}
			}
			else
			{
				create_form_message('warning', 'addUserForm', "Password does not match");
			}
		}

		else
		{
			create_form_message('validation', 'addUserForm', validation_errors());
		}

		$data['metadata'] = metadata('Add User');

		$this->load->view('user/add_user', $data);
		
	}
	

	function profile_edit()
	{
		if ($this->account->isLoggedIn())
        {
        	if(($this->session->userdata('userType') == 'user'))
	        {
	            $userID = $this->session->userdata('userID');
	            
	            $config['upload_path'] = './uploads/';
	            $config['allowed_types'] = 'gif|jpg|png|jpeg';
	            $config['max_size'] = '';
	            $config['max_width']  = '';
	            $config['max_height']  = '';
	            $this->load->library('upload', $config);
		    	$userFirstName = $this->input->post('userFirstName');
		    	$userAddress = $this->input->post('userAddress');
		    	$userPassword = $this->input->post('userPassword');	
				
				$this->form_validation->set_rules('userFirstName','Name','required|trim');
				$this->form_validation->set_rules('userAddress','Address','required|trim');
				$this->form_validation->set_rules('userPassword','Password','required|trim');
				
				if($this->form_validation->run())
				{
					$user_data = $this->users_model->read_user_by_id($userID);
				
					$dname = explode(".", $_FILES['filename']['name']);
	                $ext = end($dname);
	                $_FILES['filename']['name'] = strtolower('profile_'.date('YmdHis').'.'.$ext);
	                if ( ! $this->upload->do_upload('filename'))
	                {
	                    //print_r($this->upload->display_errors());
	                    $error = array('error' => $this->upload->display_errors());
	                    $userImage = $user_data['userImage'];
	                }
	                else
	                {
	                    $data = array('upload_data' => $this->upload->data());
	                    $data_upload=$this->upload->data();
	                    $userImage = $data_upload['file_name'];
	                    //echo $imageName;
	                }
					if($this->users_model->update_user($userID, $userFirstName, $userAddress, $userPassword, $userImage))
					{
						create_form_message('success', 'updateUserForm', "User Updated Successfully");
						
					}
					
					
					
				}

				else
				{
					create_form_message('validation', 'updateUserForm', validation_errors());
				}

				$data['metadata'] = metadata('Update User');
				$data['users'] = $this->users_model->read_user_by_id($userID);
				
				$this->load->view('common/header', $data);
				$this->load->view('user/update_user', $data);
				$this->load->view('common/footer', $data);
			}
			else
			{
				redirect(base_url().'dashboard');
			}
		}
		
	}
}

