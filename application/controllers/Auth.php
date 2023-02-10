<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

    $this->load->library('session');
	$this->load->model('model_auth');
	$this->load->helper('url');
		// $this->load->library('Auth_Ldap');
	}

    public function login()
	{
		$this->logged_in();
		// $ID_ATK_User = $this->input->post('ID_ATK_User');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$ldapconfig['host'] = '172.16.1.102';
        $ldapconfig['port'] = '389';
        $domain = '@brif';
        $ldapconfig['basedn'] = 'dc=int,dc=brifinance,dc=co,dc=id';
        $ldapconfig['usersdn'] = 'cn='.$username;
        $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
    
        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);          

        $dn="".$ldapconfig['usersdn'].",".$ldapconfig['basedn'];
        
        $bind=ldap_bind($ds, $username.$domain, $password);

		if (!$bind) {	
			echo '<script>alert("password/username salah")';
		}
		
		// var_dump($getdata);

        if ($bind == TRUE) {
			$email_exists = $this->model_auth->check_email($this->input->post('username'));		

           	if($email_exists == TRUE) {	
			$login = $this->model_auth->login($this->input->post('username'));
			$get =	$login;
			// var_dump($login);
           		if($get) {
           			$logged_in_sess = array(
           				'id' => $get['id'],
				        'username'  => $get['username'],
				        'logged_in' => TRUE
					);
					// var_dump($logged_in_sess);
					$this->session->set_userdata($logged_in_sess);
					redirect('dashboard');
        		}
           		else {
					var_dump($login);
           			$this->data['errors'] = 'Incorrect username/password combination';
           			$this->load->view('login', $this->data);
           		}
           	}
           	else {
				// var_dump($login);
           		$this->data['errors'] = 'Email does not exists';
           		$this->load->view('login', $this->data);
           	}
        }
        else {
            var_dump($login);
            $this->load->view('login');
        }	
	}

	public function logout()
	{
		$this->session->sess_destroy();
	    redirect('');
	}
	}
