<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		
		$this->load->model('dashboard_model');
		

	}	

	/* sale report summary */

	public function index()
	{
		if ($this->account->isLoggedIn())
    	{
    		$data['metadata'] = metadata('Dashboard Login');

			$this->load->view('common/header', $data);
			$this->load->view('dashboard/dashboard',$data);
			$this->load->view('common/footer', $data);
		}

	}
	// public function daily_sale_report_summary()
	// {}
}

