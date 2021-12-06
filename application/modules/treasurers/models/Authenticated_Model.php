<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticated_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function authenticate($username, $password, $received_by) {
        $ci = & get_instance();
		try
		{
			if (empty($username) || empty($password))
			{
				throw new Exception(REQUIRED_FIELD);
			}
	
			// check if username exists
			$this->db->select('u.*,'.'p.Position');
			$this->db->from('tbl_users u');
			$this->db->join('tbl_position p', 'p.ID = u.Position_ID', 'left');
			$this->db->where('Username', $username);
			$qry_username = $this->db->get();

			$get_user = $qry_username->row();
			if ($qry_username->num_rows() <= 0)
			{
				throw new Exception(NO_USERNAME_FOUND);
			}

			// check if current account is enabled/disabled
			if ($get_user->Enable <= 0)
			{
				throw new Exception(ACCOUNT_DISABLED);
			}

			// hash password
			$pass = sha1($get_user->Salt ." ". $password ." ". $get_user->Salt);
			if (($username != $get_user->Username) || ($pass != $get_user->Password))
			{
				throw new Exception(INVALID_PASSWORD);
			}
			$user = strtoupper($get_user->First_name." ".($get_user->Middle_name)[0].". ".$get_user->Last_name);
			if($user != strtoupper($received_by))
			{
				throw new Exception(WRONG_USER);
			}
			
			$error = array('user_details' => $get_user, 'has_error' => false);
			echo json_encode($error); 
		}
		catch(Exception $ex)
		{
			$error = array('error_message' => $ex->getMessage(), 'has_error' => true); 
			echo json_encode($error);
		}
    }
}