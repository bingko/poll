<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class survey_model extends CI_Model {

	public function list_data_survey()
	{
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		if(@$all_session['login']['user_type']==3){
			$user_id = $this->db->where('keep_value.user_id',@$all_session['login']['user_id']);
			$qh_id = $this->db->join('keep_value','keep_value.qh_id = question_subject.qh_id');
		}else if(@$all_session['login']['user_type']==2){
			$user_id = $this->db->where('question_subject.qh_user',@$all_session['login']['user_id']);
		}else if(@$all_session['login']['user_type']==""){
			$survey_open = $this->db->where('qh_type',1);
		}

		$this->db->join('survey_category','survey_category.sc_id = question_subject.qh_category');
		$this->db->join('user','user.user_id = question_subject.qh_user');
		@$qh_id;
		@$user_id;
		@$survey_open;
		$this->db->order_by('question_subject.qh_id','desc');
		$query = $this->db->get('question_subject');
		return $data['question_subject'] = $query->result_array();
	}
	public function list_data_poll()
	{
		$this->db->join('survey_category','survey_category.sc_id = question_subject.qh_category');
		$this->db->join('user','user.user_id = question_subject.qh_user');
		$this->db->where('poll_open',1);
		$this->db->order_by('question_subject.qh_id','desc');
		$query = $this->db->get('question_subject');
		return $data['question_subject'] = $query->result_array();
	}
	public function list_data_keep($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('keep_value');
		return $data['list_data_keep'] = $query->result_array();
	}
	public function survey_category()
	{
		$query = $this->db->get('survey_category');
		return $data['survey_category'] = $query->result_array();
	}
	public function survey_category_session()
	{
		$all_session = $this->session->all_userdata();// รับค่า session ทั้งหมด
		$this->db->where('sc_id',@$all_session['heading']['category']);
		$query = $this->db->get('survey_category');
		return $data['survey_category'] = $query->result_array();
	}
	public function id_max()
	{
		$this->db->select_max('qh_id');
		$query = $this->db->get('question_subject');
		return $data['id_max'] = $query->result_array();
	}
	public function insert_survey_db($question_subject)
	{
		$this->db->insert('question_subject',$question_subject);
	}
	public function edit_survey_db($question_subject)
	{
		$this->db->where('qh_id',$question_subject['qh_id']);
		$this->db->update('question_subject',$question_subject); 
	}
	public function delete_question_subject($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->delete('question_subject');
	}
	public function delete_question_general($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->delete('question_general');
	}
	public function delete_temp_survey_question($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->delete('question_temp_survey');
	}
	public function delete_question($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->delete('question');
	}
	public function delete_answer($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->delete('answer');
	}
	public function delete_question_template($temp_id)
	{
		$this->db->where('temp_id',$temp_id);
		$this->db->delete('question_template');
	}
	public function delete_answer_template($temp_id)
	{
		$this->db->where('temp_id',$temp_id);
		$this->db->delete('answer_template');
	}
	public function delete_temp_survey_answer($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->delete('answer_temp_survey');
	}
	public function delete_keep_value($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->delete('keep_value');
	}
	public function delete_keep_value_none()
	{
		$this->db->where('user_id'," ");
		$this->db->delete('keep_value');
	}
	public function inser_question_general($question_general)
	{
		$this->db->insert('question_general',$question_general);
	}
	public function insert_question($question)
	{
		$this->db->insert('question',$question);
	}
	public function insert_answer($answer)
	{
		$this->db->insert('answer',$answer);
	}
	public function insert_temp_question($question)
	{
		$this->db->insert('question_temp_survey',$question);
	}
	public function insert_temp_answer($answer)
	{
		$this->db->insert('answer_temp_survey',$answer);
	}
	public function logfile_survey($data_user)
	{
		$this->db->insert('logfile_survey',$data_user);
	}
	/*
	public function question_answer1($question_answer1)
	{
		$this->db->insert('question_answer1',$question_answer1);
	}
	public function question_answer2($question_answer2)
	{
		$this->db->insert('question_answer2',$question_answer2);
	}
	public function question_answer3($question_answer3)
	{
		$this->db->insert('question_answer3',$question_answer3);
	}
	public function question_answer4($question_answer4)
	{
		$this->db->insert('question_answer4',$question_answer4);
	}*/
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= select for update ======================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function select_question_subject($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_subject');
		return $data['select_question_subject'] = $query->result_array();
	}
	public function select_question_general($qh_id)
	{
		$this->db->order_by('qg_id','asc');
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_general');
		return $data['select_question_general'] = $query->result_array();
	}
	public function select_question($qh_id)
	{
		$this->db->order_by('q_number','ASC');
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question');
		return $data['select_question'] = $query->result_array();
	}
	public function select_temp_survey_question($qh_id)
	{
		$this->db->order_by('q_number','ASC');
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_temp_survey');
		return $data['select_temp_survey_question'] = $query->result_array();
	}
	public function select_answer($qh_id)
	{
		$this->db->order_by('a_number','ASC');
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('answer');
		return $data['select_answer'] = $query->result_array();
	}
	public function select_temp_survey_answer($qh_id)
	{
		$this->db->order_by('a_number','ASC');
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('answer_temp_survey');
		return $data['select_temp_survey_answer'] = $query->result_array();
	}
	public function keep_value($qh_id)
	{
		$this->db->order_by('kv_id','ASC');
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('keep_value');
		return $data['keep_value'] = $query->result_array();
	}
	#################################################
	public function select_question_answer1($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_answer1');
		return $data['select_question_answer1'] = $query->result_array();
	}
	public function select_question_answer2($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_answer2');
		return $data['select_question_answer2'] = $query->result_array();
	}
	public function select_question_answer3($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_answer3');
		return $data['select_question_answer3'] = $query->result_array();
	}
	public function select_question_answer4($qh_id)
	{
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_answer4');
		return $data['select_question_answer4'] = $query->result_array();
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Keep DB =========================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function insert_subject_value($subject_value)
	{
		$this->db->insert('subject_value',$subject_value);
	}
	public function insert_general_value($general_value)
	{
		$this->db->insert('general_value',$general_value);
	}
	public function inser_select_keep($keep)
	{
		$this->db->insert('keep_value',$keep);
	}
	public function update_select_keep($keep)
	{
		$this->db->insert('keep_value',$keep);
	}
	public function keep_survey_db($input)
	{
		$this->db->insert('ans_value',$input);
	}
	public function keep_temp_survey_db($input)
	{
		$this->db->insert('ans_temp_value',$input);
	}
	public function list_subject_value($qh_id)
	{
		$all_session = $this->session->all_userdata();
		$this->db->order_by('subject_value.sv_id','desc');
		
		if(@$all_session['login']['user_type']==1){
			//$this->db->join('user','user.user_id = subject_value.user_id');
		}else if(@$all_session['login']['user_type']==2){
			$this->db->where('subject_value.qh_id',$qh_id);
			$this->db->join('user','user.user_id = subject_value.user_id');
		}else if(@$all_session['login']['user_type']==3){
			$this->db->where('subject_value.user_id',$all_session['login']['user_id']);
			$this->db->join('user','user.user_id = subject_value.user_id');
		}
		
		$this->db->where('subject_value.qh_id',$qh_id);
		//$this->db->join('province','province.PROVINCE_ID = subject_value.sv_province');
		$query = $this->db->get('subject_value');
		return $data['list_subject_value'] = $query->result_array();
	}
	public function list_subject_value_follow($qh_id)
	{
		$all_session = $this->session->all_userdata();
		$this->db->order_by('subject_value.sv_id','desc');
		
		if(@$all_session['login']['user_type']==1){
			//$this->db->join('user','user.user_id = subject_value.user_id');
		}else if(@$all_session['login']['user_type']==2){
			$this->db->where('subject_value.qh_id',$qh_id);
			$this->db->join('user','user.user_id = subject_value.user_id');
		}else if(@$all_session['login']['user_type']==3){
			$this->db->where('subject_value.user_id',$all_session['login']['user_id']);
			$this->db->join('user','user.user_id = subject_value.user_id');
		}
		
		$this->db->where('subject_value.qh_id',$qh_id);
		//$this->db->join('province','province.PROVINCE_ID = subject_value.sv_province');
		$query = $this->db->get('subject_value');
		return $data['list_subject_value'] = $query->result_array();
	}
	public function value_survey($qh_id,$gv_map)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_map',$gv_map);
		$query = $this->db->get('general_value');
		return $data['value_survey'] = $query->result_array();
	}
	public function value_survey_mulitiple_multiple($qh_id,$sv_map)
	{
		$all_session = $this->session->all_userdata();

		$this->db->order_by('ans_number','asc');
		$this->db->where('qh_id',$qh_id);
		$this->db->where('ans_map',$sv_map);
		$this->db->where('type','mulitiple_multiple');
		$query = $this->db->get('ans_value');
		return $data['value_survey'] = $query->result_array();
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//======================================= Survey Template ===================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function list_data_temp()
	{
		$this->db->get('question_template');
		$query = $this->db->get('question_template');
		return $data['question_template'] = $query->result_array();
	}
	public function insert_question_temp($question)
	{
		$this->db->insert('question_template',$question);
	}
	public function insert_answer_temp($answer)
	{
		$this->db->insert('answer_template',$answer);
	}
	public function insert_temp_db($template_subject)
	{
		$this->db->insert('template_subject',$template_subject);
	}
	public function temp_id_max()
	{
		$this->db->select_max('temp_id');
		$query = $this->db->get('template_subject');
		return $data['temp_id_max'] = $query->result_array();
	}
	public function list_temp()
	{
		$query = $this->db->get('template_subject');
		return $data['template_subject'] = $query->result_array();
	}	
	public function list_q_temp()
	{
		$query = $this->db->get('question_template');
		return $data['question_template'] = $query->result_array();
	}	
	public function list_a_temp()
	{
		$query = $this->db->get('answer_template');
		return $data['answer_template'] = $query->result_array();
	}	
	public function select_temp_subject($temp_id)
	{
		$this->db->where('temp_id',$temp_id);
		$query = $this->db->get('template_subject');
		return $data['select_temp_subject'] = $query->result_array();
	}
	public function select_temp_question($temp_id)
	{
		$this->db->order_by('q_number','ASC');
		$this->db->where('temp_id',$temp_id);
		$query = $this->db->get('question_template');
		return $data['select_temp_question'] = $query->result_array();
	}
	public function select_temp_answer($temp_id)
	{
		$this->db->order_by('a_number','ASC');
		$this->db->where('temp_id',$temp_id);
		$query = $this->db->get('answer_template');
		return $data['select_temp_answer'] = $query->result_array();
	}
	public function delete_temp_subject($temp_id)
	{
		$this->db->where('temp_id',$temp_id);
		$this->db->delete('template_subject');
	}
	public function delete_temp_question($temp_id)
	{
		$this->db->where('temp_id',$temp_id);
		$this->db->delete('question_template');
	}
	public function delete_temp_answer($temp_id)
	{
		$this->db->where('temp_id',$temp_id);
		$this->db->delete('answer_template');
	}
	public function edit_temp_db($template_subject)
	{
		$this->db->where('temp_id',$template_subject['temp_id']);
		$this->db->update('template_subject',$template_subject); 
	}

	///////////////////////////////////////////////////////////////////////////////////////////////
	//====================================== Survey Category  ===================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function category_delete($list_data)
	{
		$this->db->where('sc_id',$list_data['sc_id']);
		$this->db->delete('survey_category');
	}

	public function category_insert($list_data)
	{
		$this->db->insert('survey_category',$list_data); 
	}
	public function category_update($list_data)
	{
		$this->db->where('sc_id',$list_data['sc_id']);
		$this->db->update('survey_category',$list_data); 
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//==================================== QuestionSubject Old  =================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function question_subject_old()
	{
		$query = $this->db->get('question_subject');
		return $query->result_array();
	}
	public function check_ip($qh_id,$ipAddress)
	{
		$qh_id = $this->db->where('qh_id',$qh_id);
		$ip_mac = $this->db->where('ip_mac',$ipAddress);
		$query = $this->db->get('subject_value');
		return $query->result_array();
	}
	public function province()
	{
		$this->db->order_by('province.PROVINCE_NAME	','asc');
		$query = $this->db->get_where('province', array('GEO_ID'=>3));
		return $data['province'] = $query->result_array();
	}
	public function amphur()
	{
		$this->db->order_by('amphur.AMPHUR_NAME	','asc');
		$query = $this->db->get_where('amphur', array('GEO_ID'=>3));
		return $data['amphur'] = $query->result_array();
	}
	public function amphur_all()
	{
		$this->db->order_by('amphur.AMPHUR_NAME	','asc');
		$this->db->where('amphur.GEO_ID','3');
		$this->db->join('province','province.PROVINCE_ID = amphur.PROVINCE_ID');
		$query = $this->db->get_where('amphur');
		return $data['amphur'] = $query->result_array();
	}
	public function delete_subject_value($qh_id,$map)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->where('sv_map',$map);
		$this->db->delete('subject_value'); 
	}
	public function delete_general_value($qh_id,$map)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->where('gv_map',$map);
		$this->db->delete('general_value'); 
	}
	public function delete_ans_value($qh_id,$map)
	{
		$this->db->where('qh_id',$qh_id);
		$this->db->where('ans_map',$map);
		$this->db->delete('ans_value'); 
	}
	public function history_login()
	{
		$this->db->order_by('logfile_login_id','desc');
		$query = $this->db->get('logfile_login');
		return $query->result_array();
	}
	public function history_survey()
	{
		$this->db->order_by('logfile_survey_id','desc');
		$query = $this->db->get('logfile_survey');
		return $query->result_array();
	}
	public function history_user()
	{
		$this->db->order_by('logfile_user_id','desc');
		$query = $this->db->get('logfile_user');
		return $query->result_array();
	}
	public function follow_keep($user_id)
	{
		$this->db->select('subject_value.qh_id,question_subject.qh_title,survey_category.sc_name');
		$this->db->where('subject_value.user_id',$user_id);
		$this->db->join('question_subject','question_subject.qh_id = subject_value.qh_id');
		$this->db->join('survey_category','survey_category.sc_id = question_subject.qh_category');
		$this->db->order_by('subject_value.sv_id','desc');
		$this->db->group_by('subject_value.qh_id');
		$query = $this->db->get('subject_value');
		return $query->result_array();
	}
	public function poll_open($qh_id)
	{
		$this->db->select('poll_open');
		$this->db->where('qh_id',$qh_id);
		$query = $this->db->get('question_subject');
		return $query->result_array();
	}
	public function convert_poll_open($data)
	{
		$this->db->where('qh_id',$data['qh_id']);
		$this->db->update('question_subject',$data); 
	}
	public function upload_file($inpost)
	{
		$this->db->where('qh_id',$inpost['qh_id']);
		$this->db->update('question_subject',$inpost); 
	}
}

