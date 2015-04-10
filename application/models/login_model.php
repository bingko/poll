<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {


	public function login($data_login)
	{
		$this->db->where('user_username',$data_login['username']);
		$this->db->where('user_password',$data_login['password']);
		$this->db->where('user_status',1);
		$query = $this->db->get('user');
	//	echo $this->db->last_query();
	//	exit();
		foreach($query->result_array() as $row)
		return $row;
	}
	public function logfile_login($data_user)
	{
		$this->db->insert('logfile_login',$data_user);
	}


}

