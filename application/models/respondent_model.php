<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class respondent_model extends CI_Model 
	{
		public function queryselect()
		{
		$this->db->join('province','province.PROVINCE_ID = respondent.province');
		//$this->db->join('amphur','amphur.AMPHUR_ID = respondent.amphor');
		$this->db->join('gender','gender.gender_id = respondent.sex');
		$query = $this->db->get('respondent');				//¤ÔÇÃÕè¨Ò¡db
		return $data['queryselect']=$query->result_array();
		}
		public function data_delete($list_data)
		{
			$this->db->where('res_id',$list_data['res_id']);
			$this->db->delete('respondent');
		}
		public function data_insert($list_data)
		{
			$this->db->insert('respondent',$list_data); 
		}
		public function data_update($list_data)
		{
			$this->db->where('res_id',$list_data['res_id']);
			$this->db->update('respondent',$list_data); 
		}
		public function respondent()
		{
			$this->db->join('province','province.PROVINCE_ID = respondent.province');
			$query = $this->db->get('respondent');
			return $query->result_array();
		}
	}