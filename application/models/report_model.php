<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report_model extends CI_Model {


	public function question_subject($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_subject');
		return $query->result_array();
	}
	public function general_value_excel($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('general_value');
		return $query->result_array();
	}
	public function general_value1($qh_id)
	{
		$this->db->order_by('general_value.gv_map');
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_category',1);
		//$this->db->where('gv_value !=',0);
		$query = $this->db->get('general_value');
		return $query->result_array();
	}
	public function general_value2($qh_id)
	{
		$this->db->order_by('general_value.gv_map');
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_category',2);
		//$this->db->where('gv_value !=',0);
		//$this->db->group_by('gv_value');
		$query = $this->db->get('general_value');
		return $query->result_array();
	}
	public function general_value3($qh_id)
	{
		$this->db->order_by('general_value.gv_map');
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_category',3);
		//$this->db->where('gv_value !=',0);
		$query = $this->db->get('general_value');
		return $query->result_array();
	}
	public function general_value4($qh_id)
	{
		$this->db->order_by('general_value.gv_map');
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_category',4);
		//$this->db->where('gv_value !=',0);
		$query = $this->db->get('general_value');
		return $query->result_array();
	}
	public function general_value5($qh_id)
	{
		$this->db->order_by('general_value.gv_map');
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_category',5);
		//$this->db->where('gv_value !=',0);
		$query = $this->db->get('general_value');
		return $query->result_array();
	}
	public function general_value6($qh_id)
	{
		$this->db->order_by('general_value.gv_map');
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_category',6);
		//$this->db->where('gv_value !=',0);
		$query = $this->db->get('general_value');
		return $query->result_array();
	}
	public function general_value7($qh_id)
	{
		$this->db->order_by('general_value.gv_map');
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_category',7);
		$query = $this->db->get('general_value');
		return $query->result_array();
	}
	public function keep_count($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		return $this->db->count_all_results('subject_value');
	}
	public function json_data_type6($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->where('type','matrix_only');
		$query = $this->db->get('ans_value');
		return $query->result_array();
	}
	public function subject_value($qh_id)
	{
		$this->db->order_by('sv_id','asc');
		$this->db->select('user_id,sv_map');
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('subject_value');
		return $query->result_array();
	}
	public function excel_load($file_name)
	{
		$this->db->where('qh_id',$file_name);
		$query = $this->db->get('excel_load');
		return $query->result_array();
	}
	public function delete_excel_load($file_name)
	{
		$this->db->where('qh_id',$file_name);
		$this->db->delete('excel_load');
	}
	public function excel_time()
	{
		$query = $this->db->get('excel_time');
		return $query->result_array();
	}
	public function get_excel($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_subject');
		return $query->result_array();
	}
	public function get_keep_value($qh_id)
	{
		$this->db->order_by('subject_value.sv_map,ans_value.v_number','asc');
		$this->db->select('
				subject_value.sv_map,
				ans_value.v_number,
				ans_value.mt_number,
				ans_value.ans_number,
				ans_value.value,
				ans_value.value_open,
				ans_value.type,
				user.user_name,
				');
		$this->db->where('subject_value.qh_id',$qh_id);
		$this->db->join('ans_value','ans_value.ans_map = subject_value.sv_map','left');
		$this->db->join('user','user.user_id = subject_value.user_id','left');
		$query = $this->db->get('subject_value');
		return $query->result_array();
	}
	public function get_general_value($qh_id,$gv_category)
	{
		$this->db->select('
				general_value.gv_category,
				general_value.gv_value,
				general_value.gv_area,
				amphur.AMPHUR_NAME');
		$this->db->order_by('general_value.gv_map');
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_category',$gv_category);
		//$this->db->where('gv_value !=',0);
		$this->db->join('amphur','amphur.AMPHUR_ID = general_value.gv_data','left');
		$query = $this->db->get('general_value');
		return $query->result_array();
	}
	public function province_all()
	{
		$this->db->order_by('province.PROVINCE_ID','asc');
		$query = $this->db->get('province');
		return $query->result_array();
	}
	public function get_question($qh_id)
	{
		$this->db->select('
				question.qh_id,
				question.q_number,
				question.q_type,
				question.q_other,
				question.q_check,
				answer.a_answer
				');
		$this->db->order_by('question.q_number','asc');
		$this->db->where('question.qh_id',$qh_id);
		$this->db->where('answer.qh_id',$qh_id);
		$this->db->join('answer','answer.a_number = question.q_number');
		$query = $this->db->get('question');
		return $query->result_array();
	}
	public function get_keep_value_ByQuestion($qh_id,$i)
	{
		$this->db->order_by('subject_value.sv_map,ans_value.v_number','asc');
		$this->db->select('
				subject_value.sv_map,
				ans_value.v_number,
				ans_value.mt_number,
				ans_value.ans_number,
				ans_value.value,
				ans_value.value_open,
				ans_value.type,
				user.user_name,
				');
		$this->db->where('subject_value.qh_id',$qh_id);
		$this->db->where('ans_value.v_number',$i);
		$this->db->join('ans_value','ans_value.ans_map = subject_value.sv_map','left');
		$this->db->join('user','user.user_id = subject_value.user_id','left');
		$query = $this->db->get('subject_value');
		return $query->result_array();
	}
}

