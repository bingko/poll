<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {


	public function list_data_user()
	{
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$user_type = $all_session['login']['user_type'];//ตัวแปร รับค่า value สถานะผู้ใช้งานของ session

		if($user_type==2){
			$this->db->where('user_type',3);
		}
		$this->db->where('user_status',1);
		$query = $this->db->get('user');
		return $data['list_data_user'] = $query->result_array();
	}
	public function insert_data_user($input_arr)
	{
		$this->db->insert('user',$input_arr); 
	}
	public function update_data_user($input_arr)
	{
		$this->db->where('user_id',$input_arr['user_id']);
		$this->db->update('user',$input_arr);
	}
	public function delete_data_user($input_arr)
	{
		$this->db->where('user_id',$input_arr['user_id']);
		$this->db->delete('user');
	}
	public function select_non_pass()
	{
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$user_type = $all_session['login']['user_type'];//ตัวแปร รับค่า value สถานะผู้ใช้งานของ session

		if($user_type==2){
			$this->db->where('user_type',3);
		}
		
		$this->db->select('user_id,user_title,user_name,user_address,user_tel,user_mail,user_url,user_username,user_status,user_type');
		$query = $this->db->get('user');
		return $data['select_non_pass'] = $query->result_array();
	}
	public function keep()
	{
		$this->db->where('user_type',3);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function logfile_user($data_user)
	{
		$this->db->insert('logfile_user',$data_user);
	}


}

