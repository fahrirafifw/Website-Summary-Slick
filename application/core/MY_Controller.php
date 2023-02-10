<?php 

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
}
class Admin_Controller extends MY_Controller 
{
	var $permission = array();

	public function __construct() 
	{
		parent::__construct();


		if(empty($this->session->userdata('logged_in'))) {
			$session_data = array('logged_in' => FALSE);
			$this->session->set_userdata($session_data);
		}
		else {
			$this->session->userdata('id');
		}
	}

	public function logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == TRUE) {
			redirect('index', 'refresh');
		}
	}

	public function not_logged_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_in'] == FALSE) {
			redirect('auth/login', 'refresh');
		}
	}
}