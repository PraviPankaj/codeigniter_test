<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		
	}

	public function index()
	{
		if ($this->account->isLoggedIn())
        {
        	
        	$this->output->set_status_header('401'); 
			$data['metadata'] = metadata('Permission Denied');
			$this->load->view('allerrors/permission', $data);
		}
	}
}