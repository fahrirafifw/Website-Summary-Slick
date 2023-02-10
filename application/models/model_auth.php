<?php 

class Model_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_email($username) 
	{
		if($username) {
			$sql = 'SELECT * FROM user WHERE username = ?';
			$query = $this->db->query($sql, array($username));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}
		// if($username) {
		// 	$sql = 'SELECT * FROM users WHERE cabang = ?';
		// 	$query = $this->db->query($sql, array($username));
		// 	$result = $query->num_rows();
		// 	return $result;
		// }
		return false;
	}
	/* 
		This function checks if the email and password matches with the database
	*/
	public function login($username) {
		if($username) {
			$sql = "SELECT * FROM user WHERE username = ?";
			$query = $this->db->query($sql, array($username));

			if($query->num_rows() == 1) {
				$result = $query->row_array();

				// $hash_password = password_verify($password, $result['password']);
				// if($hash_password === true) {
					return $result;	
				// }
				// else {
				// 	return false;
				// }
			}
			else {
				return false;
			}
		}
	}

	public function session(){

	}

	public function check_cabang($username) 
	{
		return $this->db->get_where('users',array('username'=>$username))->result_array();
	}
}