<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ci_manage_temp extends CI_Controller {

	public function list_temp()
	{				
		$data['template_subject']=$this->survey_model->list_temp();
		$this->load->view('manage_survey/select_temp',$data);
	}

	public function check_create()
	{
		@session_start();

			$input['heading'] = array(
				'temp_title' => $this->input->post('temp_title'),
				'temp_detail' => $this->input->post('temp_detail')
			);

			$this->session->set_userdata($input);
			redirect('survey/insert_template');

	}
	public function list_data_create()
	{
		$input['heading'] = array(
			'temp_title' => $this->input->post('temp_title'),
			'temp_detail' => $this->input->post('temp_detail')
		);
			
		$this->session->set_userdata($input);
		redirect('survey/insert_template');
	}
	public function list_data_create_update()
	{
			$input['heading'] = array(
			'title' => $this->input->post('title'),
			'detail' => $this->input->post('detail')
		);
		$this->session->set_userdata($input);
		redirect('survey/update_template');
	}
	public function list_check_category()
	{		
		@session_start();
		@$_SESSION['data_respondent'] = $this->input->post('data_respondent');
		redirect('survey/insert_template','refresh');
	}
	public function list_check_category_update()
	{		
		@session_start();
		@$_SESSION['data_respondent'] = $this->input->post('data_respondent');
		redirect('survey/update_survey','refresh');
	}
	public function question_subject()
	{
		$input['question_subject'] = array(
			'qh_startdate' => $this->input->post('qh_startdate'),
			'qh_enddate' => $this->input->post('qh_enddate'),
			'qh_type' => $this->input->post('qh_type'),
			'qh_ip' => $this->input->post('qh_ip'),
			'qh_url' => $this->input->post('qh_url')
		);
		$this->session->set_userdata($input);
		$this->insert_survey_db();
	}
	public function question_subject_after()
	{	
		$all_session = $this->session->all_userdata();
		$qh_id = $all_session['question_subject']['qh_id'];
		
		$this->survey_model->delete_question_template($qh_id);
		$this->survey_model->delete_answer_template($qh_id);

		$input['question_subject'] = array(
			'qh_id' => $qh_id,
			'qh_startdate' => $this->input->post('qh_startdate'),
			'qh_enddate' => $this->input->post('qh_enddate'),
			'qh_type' => $this->input->post('qh_type'),
			'qh_ip' => $this->input->post('qh_ip'),
			'qh_url' => $this->input->post('qh_url')
		);
		$this->session->set_userdata($input);
		$this->edit_survey_db();
	}
	public function temp_subject_after()
	{	
		$all_session = $this->session->all_userdata();
		$temp_id = $all_session['heading']['temp_id'];
		
		$this->survey_model->delete_question_template($temp_id);
		$this->survey_model->delete_answer_template($temp_id);

		$this->edit_temp_db();
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Add Session ==================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function mulitiple_only()
	{		
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_mulitiple_only' => $this->input->post('question_mulitiple_only'),
			'answer_mulitiple_only' => $this->input->post('answer_mulitiple_only'),
			'other_mulitiple_only' => $this->input->post('other_mulitiple_only'),
			'check_mulitiple_only' => $this->input->post('check_mulitiple_only'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "mulitiple_only"
		);
		redirect('survey/insert_template','refresh');
	}
	public function mulitiple_multiple()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_mulitiple_multiple' => $this->input->post('question_mulitiple_multiple'),
			'answer_mulitiple_multiple' => $this->input->post('answer_mulitiple_multiple'),
			'other_mulitiple_multiple' => $this->input->post('other_mulitiple_multiple'),
			'check_mulitiple_multiple' => $this->input->post('check_mulitiple_multiple'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "mulitiple_multiple"
		);
		redirect('survey/insert_template','refresh');		
	}
	public function comment()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'comment' => $this->input->post('comment'),
			'check_comment' => $this->input->post('check_comment'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "comment"
		);
		redirect('survey/insert_template','refresh');
	}
	public function ranking()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_ranking' => $this->input->post('question_ranking'),
			'answer_ranking' => $this->input->post('answer_ranking'),
			'other_ranking' => $this->input->post('other_ranking'),
			'check_ranking' => $this->input->post('check_ranking'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "ranking"
		);
		redirect('survey/insert_template','refresh');
	}
	public function ranking_scale()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_ranking_scale' => $this->input->post('question_ranking_scale'),
			'answer_ranking_scale' => $this->input->post('answer_ranking_scale'),
			'ranking_scale' => $this->input->post('ranking_scale'),
			'ranking_scale_weight' => $this->input->post('ranking_scale_weight'),
			'other_ranking_scale' => $this->input->post('other_ranking_scale'),
			'check_ranking_scale' => $this->input->post('check_ranking_scale'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "ranking_scale"
		);
		redirect('survey/insert_template','refresh');
	}
	public function matrix_only()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_matrix_only' => $this->input->post('question_matrix_only'),
			'answer_matrix_only' => $this->input->post('answer_matrix_only'),
			'ranking_matrix_only' => $this->input->post('ranking_matrix_only'),
			'other_matrix_only' => $this->input->post('other_matrix_only'),
			'check_matrix_only' => $this->input->post('check_matrix_only'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "matrix_only"
		);
		redirect('survey/insert_template','refresh');
	}
	public function matrix_multiple()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_matrix_multiple' => $this->input->post('question_matrix_multiple'),
			'answer_matrix_multiple' => $this->input->post('answer_matrix_multiple'),
			'ranking_matrix_multiple' => $this->input->post('ranking_matrix_multiple'),
			'other_matrix_multiple' => $this->input->post('other_matrix_multiple'),
			'check_matrix_multiple' => $this->input->post('check_matrix_multiple'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "matrix_multiple"
		);
		redirect('survey/insert_template','refresh');
	}
	public function single_textbox()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_single_textbox' => $this->input->post('question_single_textbox'),
			'other_single_textbox' => $this->input->post('other_single_textbox'),
			'check_single_textbox' => $this->input->post('check_single_textbox'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "single_textbox"
		);
		redirect('survey/insert_template','refresh');
	}
	public function mulitple_textbox()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_mulitple_textbox' => $this->input->post('question_mulitple_textbox'),
			'answer_mulitple_textbox' => $this->input->post('answer_mulitple_textbox'),
			'other_mulitple_textbox' => $this->input->post('other_mulitple_textbox'),
			'check_mulitple_textbox' => $this->input->post('check_mulitple_textbox'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "mulitple_textbox"
		);
		redirect('survey/insert_template','refresh');
	}
	public function date_time()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_date_time' => $this->input->post('question_date_time'),
			'answer_date_time' => $this->input->post('answer_date_time'),
			'other_date_time' => $this->input->post('other_date_time'),
			'check_date_time' => $this->input->post('check_date_time'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "date_time"
		);
		redirect('survey/insert_template','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Update Session ==================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function mulitiple_only_update()
	{		
		@session_start();	
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_mulitiple_only' => $this->input->post('question_mulitiple_only'),
			'answer_mulitiple_only' => $this->input->post('answer_mulitiple_only'),
			'other_mulitiple_only' => $this->input->post('other_mulitiple_only'),
			'check_mulitiple_only' => $this->input->post('check_mulitiple_only'),
			'number' => $number,
			'type' => "mulitiple_only"
		);
		redirect('survey/insert_template','refresh');
	}
	public function mulitiple_multiple_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_mulitiple_multiple' => $this->input->post('question_mulitiple_multiple'),
			'answer_mulitiple_multiple' => $this->input->post('answer_mulitiple_multiple'),
			'other_mulitiple_multiple' => $this->input->post('other_mulitiple_multiple'),
			'check_mulitiple_multiple' => $this->input->post('check_mulitiple_multiple'),
			'number' => $number,
			'type' => "mulitiple_multiple"
		);
		redirect('survey/insert_template','refresh');		
	}
	public function comment_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'comment' => $this->input->post('comment'),
			'check_comment' => $this->input->post('check_comment'),
			'number' => $number,
			'type' => "comment"
		);
		redirect('survey/insert_template','refresh');
	}
	public function ranking_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_ranking' => $this->input->post('question_ranking'),
			'answer_ranking' => $this->input->post('answer_ranking'),
			'other_ranking' => $this->input->post('other_ranking'),
			'check_ranking' => $this->input->post('check_ranking'),
			'number' => $number,
			'type' => "ranking"
		);
		redirect('survey/insert_template','refresh');
	}
	public function ranking_scale_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_ranking_scale' => $this->input->post('question_ranking_scale'),
			'answer_ranking_scale' => $this->input->post('answer_ranking_scale'),
			'ranking_scale' => $this->input->post('ranking_scale'),
			'ranking_scale_weight' => $this->input->post('ranking_scale_weight'),
			'other_ranking_scale' => $this->input->post('other_ranking_scale'),
			'check_ranking_scale' => $this->input->post('check_ranking_scale'),
			'number' => $number,
			'type' => "ranking_scale"
		);
		redirect('survey/insert_template','refresh');
	}
	public function matrix_only_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_matrix_only' => $this->input->post('question_matrix_only'),
			'answer_matrix_only' => $this->input->post('answer_matrix_only'),
			'ranking_matrix_only' => $this->input->post('ranking_matrix_only'),
			'other_matrix_only' => $this->input->post('other_matrix_only'),
			'check_matrix_only' => $this->input->post('check_matrix_only'),
			'number' => $number,
			'type' => "matrix_only"
		);
		redirect('survey/insert_template','refresh');
	}
	public function matrix_multiple_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_matrix_multiple' => $this->input->post('question_matrix_multiple'),
			'answer_matrix_multiple' => $this->input->post('answer_matrix_multiple'),
			'ranking_matrix_multiple' => $this->input->post('ranking_matrix_multiple'),
			'other_matrix_multiple' => $this->input->post('other_matrix_multiple'),
			'check_matrix_multiple' => $this->input->post('check_matrix_multiple'),
			'number' => $number,
			'type' => "matrix_multiple"
		);
		redirect('survey/insert_template','refresh');
	}
	public function single_textbox_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_single_textbox' => $this->input->post('question_single_textbox'),
			'other_single_textbox' => $this->input->post('other_single_textbox'),
			'check_single_textbox' => $this->input->post('check_single_textbox'),
			'number' => $number,
			'type' => "single_textbox"
		);
		redirect('survey/insert_template','refresh');
	}
	public function mulitple_textbox_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_mulitple_textbox' => $this->input->post('question_mulitple_textbox'),
			'answer_mulitple_textbox' => $this->input->post('answer_mulitple_textbox'),
			'other_mulitple_textbox' => $this->input->post('other_mulitple_textbox'),
			'check_mulitple_textbox' => $this->input->post('check_mulitple_textbox'),
			'number' => $number,
			'type' => "mulitple_textbox"
		);
		redirect('survey/insert_template','refresh');
	}
	public function date_time_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);
		
		@$_SESSION['temp_all'][$arr] = array(
			'question_date_time' => $this->input->post('question_date_time'),
			'answer_date_time' => $this->input->post('answer_date_time'),
			'other_date_time' => $this->input->post('other_date_time'),
			'check_date_time' => $this->input->post('check_date_time'),
			'number' => $number,
			'type' => "date_time"
		);
		redirect('survey/insert_template','refresh');
	}
		///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Update Session Insert_form==========================//
	//////////////////////////////////////////////////////////////////////////////////////////////////
	public function mulitiple_only_update_insertform()
	{		
		@session_start();	
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_mulitiple_only' => $this->input->post('question_mulitiple_only'),
			'answer_mulitiple_only' => $this->input->post('answer_mulitiple_only'),
			'other_mulitiple_only' => $this->input->post('other_mulitiple_only'),
			'check_mulitiple_only' => $this->input->post('check_mulitiple_only'),
			'number' => $number,
			'type' => "mulitiple_only"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function mulitiple_multiple_update_insertform()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_mulitiple_multiple' => $this->input->post('question_mulitiple_multiple'),
			'answer_mulitiple_multiple' => $this->input->post('answer_mulitiple_multiple'),
			'other_mulitiple_multiple' => $this->input->post('other_mulitiple_multiple'),
			'check_mulitiple_multiple' => $this->input->post('check_mulitiple_multiple'),
			'number' => $number,
			'type' => "mulitiple_multiple"
		);
		redirect('survey/insert_survey','refresh');		
	}
	public function comment_update_insertform()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'comment' => $this->input->post('comment'),
			'check_comment' => $this->input->post('check_comment'),
			'number' => $number,
			'type' => "comment"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function ranking_update_insertform()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_ranking' => $this->input->post('question_ranking'),
			'answer_ranking' => $this->input->post('answer_ranking'),
			'other_ranking' => $this->input->post('other_ranking'),
			'check_ranking' => $this->input->post('check_ranking'),
			'number' => $number,
			'type' => "ranking"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function ranking_scale_update_insertform()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_ranking_scale' => $this->input->post('question_ranking_scale'),
			'answer_ranking_scale' => $this->input->post('answer_ranking_scale'),
			'ranking_scale' => $this->input->post('ranking_scale'),
			'ranking_scale_weight' => $this->input->post('ranking_scale_weight'),
			'other_ranking_scale' => $this->input->post('other_ranking_scale'),
			'check_ranking_scale' => $this->input->post('check_ranking_scale'),
			'number' => $number,
			'type' => "ranking_scale"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function matrix_only_update_insertform()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_matrix_only' => $this->input->post('question_matrix_only'),
			'answer_matrix_only' => $this->input->post('answer_matrix_only'),
			'ranking_matrix_only' => $this->input->post('ranking_matrix_only'),
			'other_matrix_only' => $this->input->post('other_matrix_only'),
			'check_matrix_only' => $this->input->post('check_matrix_only'),
			'number' => $number,
			'type' => "matrix_only"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function matrix_multiple_update_insertform()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_matrix_multiple' => $this->input->post('question_matrix_multiple'),
			'answer_matrix_multiple' => $this->input->post('answer_matrix_multiple'),
			'ranking_matrix_multiple' => $this->input->post('ranking_matrix_multiple'),
			'other_matrix_multiple' => $this->input->post('other_matrix_multiple'),
			'check_matrix_multiple' => $this->input->post('check_matrix_multiple'),
			'number' => $number,
			'type' => "matrix_multiple"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function single_textbox_update_insertform()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_single_textbox' => $this->input->post('question_single_textbox'),
			'other_single_textbox' => $this->input->post('other_single_textbox'),
			'check_single_textbox' => $this->input->post('check_single_textbox'),
			'number' => $number,
			'type' => "single_textbox"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function mulitple_textbox_update_insertform()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_mulitple_textbox' => $this->input->post('question_mulitple_textbox'),
			'answer_mulitple_textbox' => $this->input->post('answer_mulitple_textbox'),
			'other_mulitple_textbox' => $this->input->post('other_mulitple_textbox'),
			'check_mulitple_textbox' => $this->input->post('check_mulitple_textbox'),
			'number' => $number,
			'type' => "mulitple_textbox"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function date_time_update_insertform()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);
		
		@$_SESSION['temp_all'][$arr] = array(
			'question_date_time' => $this->input->post('question_date_time'),
			'answer_date_time' => $this->input->post('answer_date_time'),
			'other_date_time' => $this->input->post('other_date_time'),
			'check_date_time' => $this->input->post('check_date_time'),
			'number' => $number,
			'type' => "date_time"
		);
		redirect('survey/insert_survey','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Add Session After ==================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function mulitiple_only_after()
	{		
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_mulitiple_only' => $this->input->post('question_mulitiple_only'),
			'answer_mulitiple_only' => $this->input->post('answer_mulitiple_only'),
			'other_mulitiple_only' => $this->input->post('other_mulitiple_only'),
			'check_mulitiple_only' => $this->input->post('check_mulitiple_only'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "mulitiple_only"
		);
		redirect('survey/update_template','refresh');
	}
	public function mulitiple_multiple_after()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_mulitiple_multiple' => $this->input->post('question_mulitiple_multiple'),
			'answer_mulitiple_multiple' => $this->input->post('answer_mulitiple_multiple'),
			'other_mulitiple_multiple' => $this->input->post('other_mulitiple_multiple'),
			'check_mulitiple_multiple' => $this->input->post('check_mulitiple_multiple'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "mulitiple_multiple"
		);
		redirect('survey/update_template','refresh');		
	}
	public function comment_after()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'comment' => $this->input->post('comment'),
			'check_comment' => $this->input->post('check_comment'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "comment"
		);
		redirect('survey/update_template','refresh');
	}
	public function ranking_after()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_ranking' => $this->input->post('question_ranking'),
			'answer_ranking' => $this->input->post('answer_ranking'),
			'other_ranking' => $this->input->post('other_ranking'),
			'check_ranking' => $this->input->post('check_ranking'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "ranking"
		);
		redirect('survey/update_template','refresh');
	}
	public function ranking_scale_after()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_ranking_scale' => $this->input->post('question_ranking_scale'),
			'answer_ranking_scale' => $this->input->post('answer_ranking_scale'),
			'ranking_scale' => $this->input->post('ranking_scale'),
			'ranking_scale_weight' => $this->input->post('ranking_scale_weight'),
			'other_ranking_scale' => $this->input->post('other_ranking_scale'),
			'check_ranking_scale' => $this->input->post('check_ranking_scale'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "ranking_scale"
		);
		redirect('survey/update_template','refresh');
	}
	public function matrix_only_after()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_matrix_only' => $this->input->post('question_matrix_only'),
			'answer_matrix_only' => $this->input->post('answer_matrix_only'),
			'ranking_matrix_only' => $this->input->post('ranking_matrix_only'),
			'other_matrix_only' => $this->input->post('other_matrix_only'),
			'check_matrix_only' => $this->input->post('check_matrix_only'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "matrix_only"
		);
		redirect('survey/update_template','refresh');
	}
	public function matrix_multiple_after()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_matrix_multiple' => $this->input->post('question_matrix_multiple'),
			'answer_matrix_multiple' => $this->input->post('answer_matrix_multiple'),
			'ranking_matrix_multiple' => $this->input->post('ranking_matrix_multiple'),
			'other_matrix_multiple' => $this->input->post('other_matrix_multiple'),
			'check_matrix_multiple' => $this->input->post('check_matrix_multiple'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "matrix_multiple"
		);
		redirect('survey/update_template','refresh');
	}
	public function single_textbox_after()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_single_textbox' => $this->input->post('question_single_textbox'),
			'other_single_textbox' => $this->input->post('other_single_textbox'),
			'check_single_textbox' => $this->input->post('check_single_textbox'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "single_textbox"
		);
		redirect('survey/update_template','refresh');
	}
	public function mulitple_textbox_after()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_mulitple_textbox' => $this->input->post('question_mulitple_textbox'),
			'answer_mulitple_textbox' => $this->input->post('answer_mulitple_textbox'),
			'other_mulitple_textbox' => $this->input->post('other_mulitple_textbox'),
			'check_mulitple_textbox' => $this->input->post('check_mulitple_textbox'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "mulitple_textbox"
		);
		redirect('survey/update_template','refresh');
	}
	public function date_time_after()
	{
		@session_start();
		@$_SESSION['temp_all'][] = array(
			'question_date_time' => $this->input->post('question_date_time'),
			'answer_date_time' => $this->input->post('answer_date_time'),
			'other_date_time' => $this->input->post('other_date_time'),
			'check_date_time' => $this->input->post('check_date_time'),
			'number' => count(@$_SESSION['temp_all'])+1,
			'type' => "date_time"
		);
		redirect('survey/update_template','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Update Session After ==================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function mulitiple_only_update_after()
	{		
		@session_start();	
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_mulitiple_only' => $this->input->post('question_mulitiple_only'),
			'answer_mulitiple_only' => $this->input->post('answer_mulitiple_only'),
			'other_mulitiple_only' => $this->input->post('other_mulitiple_only'),
			'check_mulitiple_only' => $this->input->post('check_mulitiple_only'),
			'number' => $number,
			'type' => "mulitiple_only"
		);
		redirect('survey/update_template','refresh');
	}
	public function mulitiple_multiple_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_mulitiple_multiple' => $this->input->post('question_mulitiple_multiple'),
			'answer_mulitiple_multiple' => $this->input->post('answer_mulitiple_multiple'),
			'other_mulitiple_multiple' => $this->input->post('other_mulitiple_multiple'),
			'check_mulitiple_multiple' => $this->input->post('check_mulitiple_multiple'),
			'number' => $number,
			'type' => "mulitiple_multiple"
		);
		redirect('survey/update_template','refresh');		
	}
	public function comment_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'comment' => $this->input->post('comment'),
			'check_comment' => $this->input->post('check_comment'),
			'number' => $number,
			'type' => "comment"
		);
		redirect('survey/update_template','refresh');
	}
	public function ranking_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_ranking' => $this->input->post('question_ranking'),
			'answer_ranking' => $this->input->post('answer_ranking'),
			'other_ranking' => $this->input->post('other_ranking'),
			'check_ranking' => $this->input->post('check_ranking'),
			'number' => $number,
			'type' => "ranking"
		);
		redirect('survey/update_template','refresh');
	}
	public function ranking_scale_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_ranking_scale' => $this->input->post('question_ranking_scale'),
			'answer_ranking_scale' => $this->input->post('answer_ranking_scale'),
			'ranking_scale' => $this->input->post('ranking_scale'),
			'ranking_scale_weight' => $this->input->post('ranking_scale_weight'),
			'other_ranking_scale' => $this->input->post('other_ranking_scale'),
			'check_ranking_scale' => $this->input->post('check_ranking_scale'),
			'number' => $number,
			'type' => "ranking_scale"
		);
		redirect('survey/update_template','refresh');
	}
	public function matrix_only_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_matrix_only' => $this->input->post('question_matrix_only'),
			'answer_matrix_only' => $this->input->post('answer_matrix_only'),
			'ranking_matrix_only' => $this->input->post('ranking_matrix_only'),
			'other_matrix_only' => $this->input->post('other_matrix_only'),
			'check_matrix_only' => $this->input->post('check_matrix_only'),
			'number' => $number,
			'type' => "matrix_only"
		);
		redirect('survey/update_template','refresh');
	}
	public function matrix_multiple_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_matrix_multiple' => $this->input->post('question_matrix_multiple'),
			'answer_matrix_multiple' => $this->input->post('answer_matrix_multiple'),
			'ranking_matrix_multiple' => $this->input->post('ranking_matrix_multiple'),
			'other_matrix_multiple' => $this->input->post('other_matrix_multiple'),
			'check_matrix_multiple' => $this->input->post('check_matrix_multiple'),
			'number' => $number,
			'type' => "matrix_multiple"
		);
		redirect('survey/update_template','refresh');
	}
	public function single_textbox_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_single_textbox' => $this->input->post('question_single_textbox'),
			'other_single_textbox' => $this->input->post('other_single_textbox'),
			'check_single_textbox' => $this->input->post('check_single_textbox'),
			'number' => $number,
			'type' => "single_textbox"
		);
		redirect('survey/update_template','refresh');
	}
	public function mulitple_textbox_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);

		@$_SESSION['temp_all'][$arr] = array(
			'question_mulitple_textbox' => $this->input->post('question_mulitple_textbox'),
			'answer_mulitple_textbox' => $this->input->post('answer_mulitple_textbox'),
			'other_mulitple_textbox' => $this->input->post('other_mulitple_textbox'),
			'check_mulitple_textbox' => $this->input->post('check_mulitple_textbox'),
			'number' => $number,
			'type' => "mulitple_textbox"
		);
		redirect('survey/update_template','refresh');
	}
	public function date_time_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['temp_all'][$arr]['number'];
		unset($_SESSION['temp_all'][$arr]);
		
		@$_SESSION['temp_all'][$arr] = array(
			'question_date_time' => $this->input->post('question_date_time'),
			'answer_date_time' => $this->input->post('answer_date_time'),
			'other_date_time' => $this->input->post('other_date_time'),
			'check_date_time' => $this->input->post('check_date_time'),
			'number' => $number,
			'type' => "date_time"
		);
		redirect('survey/update_survey','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Update Session ==================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function edit_session()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		$this->load->view('head');
		$this->load->view('manage_survey/update_temp_insert_form');
		$this->load->view('footer');
	}
	public function unset_session()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		unset($_SESSION['temp_all'][$arr]['type']);
		redirect('survey/insert_survey','refresh');
	}
	public function edit_temp_after()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		$this->load->view('head');
		$this->load->view('manage_survey/update_temp_after');
		$this->load->view('footer');
	}
	public function unset_temp_after()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		unset($_SESSION['temp_all'][$arr]['type']);
		redirect('survey/update_template','refresh');
	}
	public function edit_temp()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		$this->load->view('head');
		$this->load->view('manage_survey/update_temp');
		$this->load->view('footer');
	}
	public function unset_temp()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		unset($_SESSION['temp_all'][$arr]['type']);
		redirect('survey/insert_template','refresh');
	}
	public function edit_session_after()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		$this->load->view('head');
		$this->load->view('manage_survey/update_temp_after');
		$this->load->view('footer');
	}
	public function unset_session_after()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		unset($_SESSION['temp_all'][$arr]['type']);
		redirect('survey/update_suvey_after','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Manage To DB ======================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function insert_temp_db()
	{
		@session_start();


		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$all_session['heading'];// ข้อมูลของแบบสอบถาม

		$template_subject = array(

			'temp_title' => $all_session['heading']['temp_title'],
			'temp_detail' => $all_session['heading']['temp_detail'],
			'temp_createdate' => date('Y-m-d H:i:s')

		);
		$this->survey_model->insert_temp_db($template_subject);
		$this->insert_question_answer();
	}
	public function edit_temp_db()
	{
		@session_start();
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด	

		$temp_id = $all_session['heading']['temp_id'];

		$this->update_temp_question_answer();

		
	}
	public function update_temp_question_answer()
	{
		@session_start();
		$all_question_answer = count(@$_SESSION['temp_all']);// count จำนวนข้อมูลทั้งหมด
		$temp_id_max = $this->survey_model->temp_id_max();

		for($i=0;$i<$all_question_answer;$i++)
		{
			$question = array(
				'temp_id' => $temp_id_max[0]['temp_id'],
				'q_question' => @$_SESSION['temp_all'][$i]['question_matrix_only'].@$_SESSION['temp_all'][$i]['question_matrix_multiple'].@$_SESSION['temp_all'][$i]['question_ranking_scale'].@$_SESSION['temp_all'][$i]['comment'].@$_SESSION['temp_all'][$i]['question_single_textbox'].@$_SESSION['temp_all'][$i]['question_mulitiple_only'].@$_SESSION['temp_all'][$i]['question_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['question_ranking'].@$_SESSION['temp_all'][$i]['question_mulitple_textbox'].@$_SESSION['temp_all'][$i]['question_date_time'],
				'q_other' => @$_SESSION['temp_all'][$i]['other_matrix_only'].@$_SESSION['temp_all'][$i]['other_matrix_multiple'].@$_SESSION['temp_all'][$i]['other_ranking_scale'].@$_SESSION['temp_all'][$i]['other_comment'].@$_SESSION['temp_all'][$i]['other_single_textbox'].@$_SESSION['temp_all'][$i]['other_mulitiple_only'].@$_SESSION['temp_all'][$i]['other_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['other_ranking'].@$_SESSION['temp_all'][$i]['other_mulitple_textbox'].@$_SESSION['temp_all'][$i]['other_date_time'],
				'q_check' => @$_SESSION['temp_all'][$i]['check_matrix_only'].@$_SESSION['temp_all'][$i]['check_matrix_multiple'].@$_SESSION['temp_all'][$i]['check_ranking_scale'].@$_SESSION['temp_all'][$i]['check_comment'].@$_SESSION['temp_all'][$i]['check_single_textbox'].@$_SESSION['temp_all'][$i]['check_mulitiple_only'].@$_SESSION['temp_all'][$i]['check_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['check_ranking'].@$_SESSION['temp_all'][$i]['check_mulitple_textbox'].@$_SESSION['temp_all'][$i]['check_date_time'],
				'q_number' => @$_SESSION['temp_all'][$i]['number'],
				'q_type' => @$_SESSION['temp_all'][$i]['type']
			);
			$answer = array(
				'temp_id' => $temp_id_max[0]['temp_id'],
				'a_answer' => @$_SESSION['temp_all'][$i]['answer_matrix_only'].@$_SESSION['temp_all'][$i]['answer_matrix_multiple'].@$_SESSION['temp_all'][$i]['answer_ranking_scale'].@$_SESSION['temp_all'][$i]['answer_mulitiple_only'].@$_SESSION['temp_all'][$i]['answer_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['answer_ranking'].@$_SESSION['temp_all'][$i]['answer_mulitple_textbox'].@$_SESSION['temp_all'][$i]['answer_date_time'],
				'a_scale' => @$_SESSION['temp_all'][$i]['ranking_scale'],
				'a_weight' => @$_SESSION['temp_all'][$i]['ranking_scale_weight'],
				'a_ranking' => @$_SESSION['temp_all'][$i]['ranking_matrix_only'].@$_SESSION['temp_all'][$i]['ranking_matrix_multiple'],
				'a_number' => @$_SESSION['temp_all'][$i]['number'],
				'a_type' => @$_SESSION['temp_all'][$i]['type']
			);

			$this->survey_model->insert_question_temp($question);
			$this->survey_model->insert_answer_temp($answer);
		}

		redirect('survey/success_temp','refresh');
	}
	public function inser_question_general()
	{
		@session_start();
		$id_max = $this->survey_model->id_max();// ค่ามากที่สุดของ id

		for($i=0;$i<count(@$_SESSION['data_respondent']);$i++){
			
			$question_general = array(
				'qh_id' => $id_max[0]['qh_id'],
				'qg_category' => $_SESSION['data_respondent'][$i]
			);
			$this->survey_model->inser_question_general($question_general);
		}
		$this->insert_question_answer();
	}
	public function edit_question_general()
	{
		@session_start();
		$all_session = $this->session->all_userdata();
		$qh_id = $all_session['question_subject']['qh_id'];

		for($i=0;$i<count(@$_SESSION['data_respondent']);$i++){
			
			$question_general = array(
				'qh_id' => $qh_id,
				'qg_category' => $_SESSION['data_respondent'][$i]
			);
			$this->survey_model->inser_question_general($question_general);
		}
		$this->insert_question_answer();
	}
	public function insert_question_answer()
	{
		@session_start();
		$all_question_answer = count(@$_SESSION['temp_all']);// count จำนวนข้อมูลทั้งหมด
		$all_session = $this->session->all_userdata();
		$temp_id_max = $this->survey_model->temp_id_max();// ค่ามากที่สุดของ id
		
		for($i=0;$i<$all_question_answer;$i++)
		{
			$question = array(
				'temp_id' => $temp_id_max[0]['temp_id'],
				'q_question' => @$_SESSION['temp_all'][$i]['question_matrix_only'].@$_SESSION['temp_all'][$i]['question_matrix_multiple'].@$_SESSION['temp_all'][$i]['question_ranking_scale'].@$_SESSION['temp_all'][$i]['comment'].@$_SESSION['temp_all'][$i]['question_single_textbox'].@$_SESSION['temp_all'][$i]['question_mulitiple_only'].@$_SESSION['temp_all'][$i]['question_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['question_ranking'].@$_SESSION['temp_all'][$i]['question_mulitple_textbox'].@$_SESSION['temp_all'][$i]['question_date_time'],
				'q_other' => @$_SESSION['temp_all'][$i]['other_matrix_only'].@$_SESSION['temp_all'][$i]['other_matrix_multiple'].@$_SESSION['temp_all'][$i]['other_ranking_scale'].@$_SESSION['temp_all'][$i]['other_comment'].@$_SESSION['temp_all'][$i]['other_single_textbox'].@$_SESSION['temp_all'][$i]['other_mulitiple_only'].@$_SESSION['temp_all'][$i]['other_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['other_ranking'].@$_SESSION['temp_all'][$i]['other_mulitple_textbox'].@$_SESSION['temp_all'][$i]['other_date_time'],
				'q_check' => @$_SESSION['temp_all'][$i]['check_matrix_only'].@$_SESSION['temp_all'][$i]['check_matrix_multiple'].@$_SESSION['temp_all'][$i]['check_ranking_scale'].@$_SESSION['temp_all'][$i]['check_comment'].@$_SESSION['temp_all'][$i]['check_single_textbox'].@$_SESSION['temp_all'][$i]['check_mulitiple_only'].@$_SESSION['temp_all'][$i]['check_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['check_ranking'].@$_SESSION['temp_all'][$i]['check_mulitple_textbox'].@$_SESSION['temp_all'][$i]['check_date_time'],
				'q_number' => @$_SESSION['temp_all'][$i]['number'],
				'q_type' => @$_SESSION['temp_all'][$i]['type']
			);
			$answer = array(
				'temp_id' => $temp_id_max[0]['temp_id'],
				'a_answer' => @$_SESSION['temp_all'][$i]['answer_matrix_only'].@$_SESSION['temp_all'][$i]['answer_matrix_multiple'].@$_SESSION['temp_all'][$i]['answer_ranking_scale'].@$_SESSION['temp_all'][$i]['answer_mulitiple_only'].@$_SESSION['temp_all'][$i]['answer_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['answer_ranking'].@$_SESSION['temp_all'][$i]['answer_mulitple_textbox'].@$_SESSION['temp_all'][$i]['answer_date_time'],
				'a_scale' => @$_SESSION['temp_all'][$i]['ranking_scale'],
				'a_weight' => @$_SESSION['temp_all'][$i]['ranking_scale_weight'],
				'a_ranking' => @$_SESSION['temp_all'][$i]['ranking_matrix_only'].@$_SESSION['temp_all'][$i]['ranking_matrix_multiple'],
				'a_number' => @$_SESSION['temp_all'][$i]['number'],
				'a_type' => @$_SESSION['temp_all'][$i]['type']
			);

			$this->survey_model->insert_question_temp($question);
			$this->survey_model->insert_answer_temp($answer);
		}

		redirect('survey/success_temp','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Categories ======================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
  	public function survey_category()
    {
        $this->load->model('survey_category');
        $data['survey_category'] = $this->survey_model->survey_category(); 
    }

        public function select_temp()
    {
    	@session_start();
    	
    	$data['template_subject']=$this->survey_model->list_temp();
    	$data['question_template']=$this->survey_model->list_q_temp();
    	$data['answer_template']=$this->survey_model->list_a_temp();
    	$max['template_subject']=$this->survey_model->temp_id_max();
	    $count_temp = $max['template_subject'][0]['temp_id'];
    	$post_value = array(
			'temp_id' => $this->input->post('temp_id')
    	);
		for($i=0;$i<$count_temp;$i++){
		if(@$post_value['temp_id'][$i]==@$data['template_subject'][$i]['temp_id'])
		{
    		if(@$data['question_template'][$i]['q_type']=="mulitiple_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_only' => $data['question_template'][$i]['q_question'],
					'answer_mulitiple_only' => $data['answer_template'][$i]['a_answer'],
					'other_mulitiple_only' => $data['question_template'][$i]['q_other'],
					'check_mulitiple_only' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "mulitiple_only"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="mulitiple_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_multiple' => $data['question_template'][$i]['q_question'],
					'answer_mulitiple_multiple' => $data['answer_template'][$i]['a_answer'],
					'other_mulitiple_multiple' => $data['question_template'][$i]['q_other'],
					'check_mulitiple_multiple' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "mulitiple_multiple"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="comment")
			{
				@$_SESSION['temp_all'][] = array(
					'comment' => $data['question_template'][$i]['q_question'],
					'check_comment' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "comment"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="ranking")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking' => $data['question_template'][$i]['q_question'],
					'answer_ranking' => $data['answer_template'][$i]['a_answer'],
					'other_ranking' => $data['question_template'][$i]['q_other'],
					'check_ranking' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "ranking"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="ranking_scale")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking_scale' => $data['question_template'][$i]['q_question'],
					'answer_ranking_scale' => $data['answer_template'][$i]['a_answer'],
					'ranking_scale' => $data['answer_template'][$i]['a_scale'],
					'ranking_scale_weight' => $data['answer_template'][$i]['a_weight'],
					'other_ranking_scale' => $data['question_template'][$i]['q_other'],
					'check_ranking_scale' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "ranking_scale"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="matrix_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_only' => $data['question_template'][$i]['q_question'],
					'answer_matrix_only' => $data['answer_template'][$i]['a_answer'],
					'ranking_matrix_only' => $data['answer_template'][$i]['a_ranking'],
					'other_matrix_only' => $data['question_template'][$i]['q_other'],
					'check_matrix_only' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "matrix_only"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="matrix_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_multiple' => $data['question_template'][$i]['q_question'],
					'answer_matrix_multiple' => $data['answer_template'][$i]['a_answer'],
					'ranking_matrix_multiple' => $data['answer_template'][$i]['a_ranking'],
					'other_matrix_multiple' => $data['question_template'][$i]['q_other'],
					'check_matrix_multiple' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "matrix_multiple"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="single_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_single_textbox' => $data['question_template'][$i]['q_question'],
					'other_single_textbox' => $data['question_template'][$i]['q_other'],
					'check_single_textbox' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "single_textbox"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="mulitple_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitple_textbox' => $data['question_template'][$i]['q_question'],
					'answer_mulitple_textbox' => $data['answer_template'][$i]['a_answer'],
					'other_mulitple_textbox' => $data['question_template'][$i]['q_other'],
					'check_mulitple_textbox' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "mulitple_textbox"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="date_time")
			{
				@$_SESSION['temp_all'][] = array(
					'question_date_time' => $data['question_template'][$i]['q_question'],
					'answer_date_time' => $data['answer_template'][$i]['a_answer'],
					'other_date_time' => $data['question_template'][$i]['q_other'],
					'check_date_time' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "date_time"
				);
			}
		
			
		}
		}
		redirect('survey/insert_survey','refresh');

    }
   public function select_temp_after()
    {
    	@session_start();
    	
    	$data['template_subject']=$this->survey_model->list_temp();
    	$data['question_template']=$this->survey_model->list_q_temp();
    	$data['answer_template']=$this->survey_model->list_a_temp();
    	$max['template_subject']=$this->survey_model->temp_id_max();
    	$count_temp = $max['template_subject'][0]['temp_id'];
    	
    	$post_value = array(
			'temp_id' => $this->input->post('temp_id')
    	);
		for($i=0;$i<$count_temp;$i++){
		if(@$post_value['temp_id'][$i]==$data['template_subject'][$i]['temp_id'])
		{
    		if(@$data['question_template'][$i]['q_type']=="mulitiple_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_only' => $data['question_template'][$i]['q_question'],
					'answer_mulitiple_only' => $data['answer_template'][$i]['a_answer'],
					'other_mulitiple_only' => $data['question_template'][$i]['q_other'],
					'check_mulitiple_only' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "mulitiple_only"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="mulitiple_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_multiple' => $data['question_template'][$i]['q_question'],
					'answer_mulitiple_multiple' => $data['answer_template'][$i]['a_answer'],
					'other_mulitiple_multiple' => $data['question_template'][$i]['q_other'],
					'check_mulitiple_multiple' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "mulitiple_multiple"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="comment")
			{
				@$_SESSION['temp_all'][] = array(
					'comment' => $data['question_template'][$i]['q_question'],
					'check_comment' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "comment"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="ranking")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking' => $data['question_template'][$i]['q_question'],
					'answer_ranking' => $data['answer_template'][$i]['a_answer'],
					'other_ranking' => $data['question_template'][$i]['q_other'],
					'check_ranking' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "ranking"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="ranking_scale")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking_scale' => $data['question_template'][$i]['q_question'],
					'answer_ranking_scale' => $data['answer_template'][$i]['a_answer'],
					'ranking_scale' => $data['answer_template'][$i]['a_scale'],
					'ranking_scale_weight' => $data['answer_template'][$i]['a_weight'],
					'other_ranking_scale' => $data['question_template'][$i]['q_other'],
					'check_ranking_scale' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "ranking_scale"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="matrix_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_only' => $data['question_template'][$i]['q_question'],
					'answer_matrix_only' => $data['answer_template'][$i]['a_answer'],
					'ranking_matrix_only' => $data['answer_template'][$i]['a_ranking'],
					'other_matrix_only' => $data['question_template'][$i]['q_other'],
					'check_matrix_only' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "matrix_only"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="matrix_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_multiple' => $data['question_template'][$i]['q_question'],
					'answer_matrix_multiple' => $data['answer_template'][$i]['a_answer'],
					'ranking_matrix_multiple' => $data['answer_template'][$i]['a_ranking'],
					'other_matrix_multiple' => $data['question_template'][$i]['q_other'],
					'check_matrix_multiple' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "matrix_multiple"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="single_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_single_textbox' => $data['question_template'][$i]['q_question'],
					'other_single_textbox' => $data['question_template'][$i]['q_other'],
					'check_single_textbox' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "single_textbox"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="mulitple_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitple_textbox' => $data['question_template'][$i]['q_question'],
					'answer_mulitple_textbox' => $data['answer_template'][$i]['a_answer'],
					'other_mulitple_textbox' => $data['question_template'][$i]['q_other'],
					'check_mulitple_textbox' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "mulitple_textbox"
				);
			}
			if(@$data['question_template'][$i]['q_type']=="date_time")
			{
				@$_SESSION['temp_all'][] = array(
					'question_date_time' => $data['question_template'][$i]['q_question'],
					'answer_date_time' => $data['answer_template'][$i]['a_answer'],
					'other_date_time' => $data['question_template'][$i]['q_other'],
					'check_date_time' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "date_time"
				);
			}
		
			
		}
		}
		redirect('survey/update_survey','refresh');

    }
    public function select_temp_update()
    {
    	@session_start();
    	
    	$data['template_subject']=$this->survey_model->list_temp();
    	$data['question_template']=$this->survey_model->list_q_temp();
    	$data['answer_template']=$this->survey_model->list_a_temp();

    	$post_value = array(
			'temp_id' => $this->input->post('temp_id')
    	);
		for($i=0;$i<count($data['template_subject']);$i++){
		if(@$post_value['temp_id'][$i]==$data['template_subject'][$i]['temp_id'])
		{


    		if($data['question_template'][$i]['q_type']=="mulitiple_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_only' => $data['question_template'][$i]['q_question'],
					'answer_mulitiple_only' => $data['answer_template'][$i]['a_answer'],
					'other_mulitiple_only' => $data['question_template'][$i]['q_other'],
					'check_mulitiple_only' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "mulitiple_only"
				);
			}
			if($data['question_template'][$i]['q_type']=="mulitiple_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_multiple' => $data['question_template'][$i]['q_question'],
					'answer_mulitiple_multiple' => $data['answer_template'][$i]['a_answer'],
					'other_mulitiple_multiple' => $data['question_template'][$i]['q_other'],
					'check_mulitiple_multiple' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "mulitiple_multiple"
				);
			}
			if($data['question_template'][$i]['q_type']=="comment")
			{
				@$_SESSION['temp_all'][] = array(
					'comment' => $data['question_template'][$i]['q_question'],
					'check_comment' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "comment"
				);
			}
			if($data['question_template'][$i]['q_type']=="ranking")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking' => $data['question_template'][$i]['q_question'],
					'answer_ranking' => $data['answer_template'][$i]['a_answer'],
					'other_ranking' => $data['question_template'][$i]['q_other'],
					'check_ranking' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "ranking"
				);
			}
			if($data['question_template'][$i]['q_type']=="ranking_scale")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking_scale' => $data['question_template'][$i]['q_question'],
					'answer_ranking_scale' => $data['answer_template'][$i]['a_answer'],
					'ranking_scale' => $data['answer_template'][$i]['a_scale'],
					'ranking_scale_weight' => $data['answer_template'][$i]['a_weight'],
					'other_ranking_scale' => $data['question_template'][$i]['q_other'],
					'check_ranking_scale' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "ranking_scale"
				);
			}
			if($data['question_template'][$i]['q_type']=="matrix_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_only' => $data['question_template'][$i]['q_question'],
					'answer_matrix_only' => $data['answer_template'][$i]['a_answer'],
					'ranking_matrix_only' => $data['answer_template'][$i]['a_ranking'],
					'other_matrix_only' => $data['question_template'][$i]['q_other'],
					'check_matrix_only' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "matrix_only"
				);
			}
			if($data['question_template'][$i]['q_type']=="matrix_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_multiple' => $data['question_template'][$i]['q_question'],
					'answer_matrix_multiple' => $data['answer_template'][$i]['a_answer'],
					'ranking_matrix_multiple' => $data['answer_template'][$i]['a_ranking'],
					'other_matrix_multiple' => $data['question_template'][$i]['q_other'],
					'check_matrix_multiple' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "matrix_multiple"
				);
			}
			if($data['question_template'][$i]['q_type']=="single_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_single_textbox' => $data['question_template'][$i]['q_question'],
					'other_single_textbox' => $data['question_template'][$i]['q_other'],
					'check_single_textbox' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "single_textbox"
				);
			}
			if($data['question_template'][$i]['q_type']=="mulitple_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitple_textbox' => $data['question_template'][$i]['q_question'],
					'answer_mulitple_textbox' => $data['answer_template'][$i]['a_answer'],
					'other_mulitple_textbox' => $data['question_template'][$i]['q_other'],
					'check_mulitple_textbox' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "mulitple_textbox"
				);
			}
			if($data['question_template'][$i]['q_type']=="date_time")
			{
				@$_SESSION['temp_all'][] = array(
					'question_date_time' => $data['question_template'][$i]['q_question'],
					'answer_date_time' => $data['answer_template'][$i]['a_answer'],
					'other_date_time' => $data['question_template'][$i]['q_other'],
					'check_date_time' => $data['question_template'][$i]['q_check'],
					'number' => $data['question_template'][$i]['q_number'],
					'type' => "date_time"
				);
			}
		}
		}
		redirect('survey/update_survey','refresh');

    }
    public function delete_temp_db()
	{
		$temp_id = $this->uri->segment(3);

		$delete_temp_subject = $this->survey_model->delete_temp_subject($temp_id);
		$delete_temp_question = $this->survey_model->delete_temp_question($temp_id);
		$delete_temp_answer = $this->survey_model->delete_temp_answer($temp_id);
		redirect('survey/create_template','refresh');
	}
	public function update_temp_db()
	{
		@session_start();
		$all_session = $this->session->all_userdata();
		$temp_id = $this->uri->segment(3);
		$temp_subject = $this->survey_model->select_temp_subject($temp_id);
		$temp_question = $this->survey_model->select_temp_question($temp_id);
		$temp_answer = $this->survey_model->select_temp_answer($temp_id);

		#################### session subject ####################
		$all_session['heading'] = array(
				'temp_id'=> $temp_id,
				'title' => $temp_subject[0]['temp_title'],
				'detail' => $temp_subject[0]['temp_detail']
		);
		$this->session->set_userdata($all_session);

		#################### session general ####################

		for($i=0;$i<count($temp_question);$i++)
		{
			if($temp_question[$i]['q_type']=="mulitiple_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_only' => $temp_question[$i]['q_question'],
					'answer_mulitiple_only' => $temp_answer[$i]['a_answer'],
					'other_mulitiple_only' => $temp_question[$i]['q_other'],
					'check_mulitiple_only' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "mulitiple_only"
				);
			}
			if($temp_question[$i]['q_type']=="mulitiple_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_multiple' => $temp_question[$i]['q_question'],
					'answer_mulitiple_multiple' => $temp_answer[$i]['a_answer'],
					'other_mulitiple_multiple' => $temp_question[$i]['q_other'],
					'check_mulitiple_multiple' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "mulitiple_multiple"
				);
			}
			if($temp_question[$i]['q_type']=="comment")
			{
				@$_SESSION['temp_all'][] = array(
					'comment' => $temp_question[$i]['q_question'],
					'check_comment' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "comment"
				);
			}
			if($temp_question[$i]['q_type']=="ranking")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking' => $temp_question[$i]['q_question'],
					'answer_ranking' => $temp_answer[$i]['a_answer'],
					'other_ranking' => $temp_question[$i]['q_other'],
					'check_ranking' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "ranking"
				);
			}
			if($temp_question[$i]['q_type']=="ranking_scale")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking_scale' => $temp_question[$i]['q_question'],
					'answer_ranking_scale' => $temp_answer[$i]['a_answer'],
					'ranking_scale' => $temp_answer[$i]['a_scale'],
					'ranking_scale_weight' => $temp_answer[$i]['a_weight'],
					'other_ranking_scale' => $temp_question[$i]['q_other'],
					'check_ranking_scale' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "ranking_scale"
				);
			}
			if($temp_question[$i]['q_type']=="matrix_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_only' => $temp_question[$i]['q_question'],
					'answer_matrix_only' => $temp_answer[$i]['a_answer'],
					'ranking_matrix_only' => $temp_answer[$i]['a_ranking'],
					'other_matrix_only' => $temp_question[$i]['q_other'],
					'check_matrix_only' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "matrix_only"
				);
			}
			if($temp_question[$i]['q_type']=="matrix_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_multiple' => $temp_question[$i]['q_question'],
					'answer_matrix_multiple' => $temp_answer[$i]['a_answer'],
					'ranking_matrix_multiple' => $temp_answer[$i]['a_ranking'],
					'other_matrix_multiple' => $temp_question[$i]['q_other'],
					'check_matrix_multiple' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "matrix_multiple"
				);
			}
			if($temp_question[$i]['q_type']=="single_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_single_textbox' => $temp_question[$i]['q_question'],
					'other_single_textbox' => $temp_question[$i]['q_other'],
					'check_single_textbox' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "single_textbox"
				);
			}
			if($temp_question[$i]['q_type']=="mulitple_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitple_textbox' => $temp_question[$i]['q_question'],
					'answer_mulitple_textbox' => $temp_answer[$i]['a_answer'],
					'other_mulitple_textbox' => $temp_question[$i]['q_other'],
					'check_mulitple_textbox' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "mulitple_textbox"
				);
			}
			if($temp_question[$i]['q_type']=="date_time")
			{
				@$_SESSION['temp_all'][] = array(
					'question_date_time' => $temp_question[$i]['q_question'],
					'answer_date_time' => $temp_answer[$i]['a_answer'],
					'other_date_time' => $temp_question[$i]['q_other'],
					'check_date_time' => $temp_question[$i]['q_check'],
					'number' => $temp_question[$i]['q_number'],
					'type' => "date_time"
				);
			}
		}
		redirect('survey/update_template','refresh');
	}
}

