<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ci_manage_survey extends CI_Controller {

	public function list_data_survey()
	{				
		$data['selectdata']=$this->survey_model->list_data_survey();
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_data_survey).')'; 
		print_r($_GET['callback'].$json);
	}
	public function check_create()
	{
		@session_start();
		@session_destroy();
		$check_create = $this->input->post('check_create');
		if($check_create == 1){
			$input['heading'] = array(
				'title' => $this->input->post('title'),
				'category' => $this->input->post('category'),
				'detail' => $this->input->post('detail')
			);
			$this->session->set_userdata($input);
			redirect('survey/insert_survey');
		}else{
			$input['heading'] = array(
				'title' => $this->input->post('title_copy'),
				'category' => $this->input->post('category_copy'),
				'detail' => $this->input->post('detail_copy'),
			);
			$this->session->set_userdata($input);

			$qh_id = $this->input->post('title_copy_old');
			$this->question_subject_old($qh_id);
			redirect('survey/insert_survey');
		}
	}
	public function question_subject_old($qh_id)
	{
		@session_start();
		$question_subject = $this->survey_model->select_question_subject($qh_id);
		$question_general = $this->survey_model->select_question_general($qh_id);
		$question = $this->survey_model->select_question($qh_id);
		$answer = $this->survey_model->select_answer($qh_id);
		#################### session general ####################
		for($i=0;$i<count($question_general);$i++)
		{		
			$qg_category[] = $question_general[$i]['qg_category'];	
		}
		@$_SESSION['data_respondent'] = $qg_category;
		#################### session general ####################

		for($i=0;$i<count($question);$i++)
		{
			if($question[$i]['q_type']=="mulitiple_only")
			{
				@$_SESSION['qa_all'][] = array(
					'question_mulitiple_only' => $question[$i]['q_question'],
					'answer_mulitiple_only' => $answer[$i]['a_answer'],
					'other_mulitiple_only' => $question[$i]['q_other'],
					'check_mulitiple_only' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "mulitiple_only"
				);
			}
			if($question[$i]['q_type']=="mulitiple_multiple")
			{
				@$_SESSION['qa_all'][] = array(
					'question_mulitiple_multiple' => $question[$i]['q_question'],
					'answer_mulitiple_multiple' => $answer[$i]['a_answer'],
					'other_mulitiple_multiple' => $question[$i]['q_other'],
					'check_mulitiple_multiple' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "mulitiple_multiple"
				);
			}
			if($question[$i]['q_type']=="comment")
			{
				@$_SESSION['qa_all'][] = array(
					'comment' => $question[$i]['q_question'],
					'check_comment' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "comment"
				);
			}
			if($question[$i]['q_type']=="ranking")
			{
				@$_SESSION['qa_all'][] = array(
					'question_ranking' => $question[$i]['q_question'],
					'answer_ranking' => $answer[$i]['a_answer'],
					'other_ranking' => $question[$i]['q_other'],
					'check_ranking' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "ranking"
				);
			}
			if($question[$i]['q_type']=="ranking_scale")
			{
				@$_SESSION['qa_all'][] = array(
					'question_ranking_scale' => $question[$i]['q_question'],
					'answer_ranking_scale' => $answer[$i]['a_answer'],
					'ranking_scale' => $answer[$i]['a_scale'],
					'ranking_scale_weight' => $answer[$i]['a_weight'],
					'other_ranking_scale' => $question[$i]['q_other'],
					'check_ranking_scale' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "ranking_scale"
				);
			}
			if($question[$i]['q_type']=="matrix_only")
			{
				@$_SESSION['qa_all'][] = array(
					'question_matrix_only' => $question[$i]['q_question'],
					'answer_matrix_only' => $answer[$i]['a_answer'],
					'ranking_matrix_only' => $answer[$i]['a_ranking'],
					'other_matrix_only' => $question[$i]['q_other'],
					'check_matrix_only' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "matrix_only"
				);
			}
			if($question[$i]['q_type']=="matrix_multiple")
			{
				@$_SESSION['qa_all'][] = array(
					'question_matrix_multiple' => $question[$i]['q_question'],
					'answer_matrix_multiple' => $answer[$i]['a_answer'],
					'ranking_matrix_multiple' => $answer[$i]['a_ranking'],
					'other_matrix_multiple' => $question[$i]['q_other'],
					'check_matrix_multiple' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "matrix_multiple"
				);
			}
			if($question[$i]['q_type']=="single_textbox")
			{
				@$_SESSION['qa_all'][] = array(
					'question_single_textbox' => $question[$i]['q_question'],
					'other_single_textbox' => $question[$i]['q_other'],
					'check_single_textbox' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "single_textbox"
				);
			}
			if($question[$i]['q_type']=="mulitple_textbox")
			{
				@$_SESSION['qa_all'][] = array(
					'question_mulitple_textbox' => $question[$i]['q_question'],
					'answer_mulitple_textbox' => $answer[$i]['a_answer'],
					'other_mulitple_textbox' => $question[$i]['q_other'],
					'check_mulitple_textbox' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "mulitple_textbox"
				);
			}
			if($question[$i]['q_type']=="date_time")
			{
				@$_SESSION['qa_all'][] = array(
					'question_date_time' => $question[$i]['q_question'],
					'answer_date_time' => $answer[$i]['a_answer'],
					'other_date_time' => $question[$i]['q_other'],
					'check_date_time' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "date_time"
				);
			}
		}
	}
	public function list_data_create()
	{
		$input['heading'] = array(
			'title' => $this->input->post('title'),
			'category' => $this->input->post('category'),
			'detail' => $this->input->post('detail')
		);
		$this->session->set_userdata($input);
		redirect('survey/insert_survey');
	}
	public function list_data_create_update()
	{
		$input['heading'] = array(
			'title' => $this->input->post('title'),
			'category' => $this->input->post('category'),
			'detail' => $this->input->post('detail')
		);
		$this->session->set_userdata($input);
		redirect('survey/update_survey');
	}

	public function list_check_category()
	{		
		@session_start();
		@$_SESSION['data_respondent'] = $this->input->post('data_respondent');
		redirect('survey/insert_survey','refresh');
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
		
		$this->survey_model->delete_question($qh_id);
		$this->survey_model->delete_temp_survey_question($qh_id);
		$this->survey_model->delete_answer($qh_id);
		$this->survey_model->delete_temp_survey_answer($qh_id);
		$this->survey_model->delete_question_general($qh_id);
		$this->survey_model->delete_keep_value($qh_id);
		$this->survey_model->delete_keep_value_none();

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
		///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Catagories ==================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function list_category()
	{		
		$data=$this->survey_model->survey_category(); 
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($data).')'; 
		print_r($_GET['callback'].$json);
	}
	public function category_insert()
	{
		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name)
		{
			$list_data = array(
				'sc_name' => $name->sc_name,
				'sc_desc' => $name->sc_desc
			);
			$return = $this->survey_model->category_insert($list_data);
		}
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_data).')'; 
		print_r($_GET['callback'].$json);
		}
		public function category_update()
		{
			$data = $_GET['models'];
			$arr = json_decode($data);

			foreach($arr as $name)
			{
				$list_data = array(
					'sc_id'=> $name->sc_id,
					'sc_name' => $name->sc_name,
					'sc_desc' => $name->sc_desc

				);
						//echo "<pre>";
						//print_r($product_2digits);
				$this->survey_model->category_update($list_data);
			}
			## Return Value ##
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($arr).')'; 
			print_r($_GET['callback'].$json);
			
		}
		public function category_delete()
		{
			$data = $_GET['models'];
			$arr = json_decode($data);
			foreach($arr as $name)
			{
				$list_data = array(
					'sc_id'=> $name->sc_id,
					'sc_name' => $name->sc_name,
					'sc_desc' => $name->sc_desc
				);
				$this->survey_model->category_delete($list_data);
			}
			## Return Value ##
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($list_data).')'; 
			print_r($_GET['callback'].$json);
		}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Add Session ==================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function mulitiple_only()
	{		
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_mulitiple_only' => $this->input->post('question_mulitiple_only'),
			'answer_mulitiple_only' => $this->input->post('answer_mulitiple_only'),
			'other_mulitiple_only' => $this->input->post('other_mulitiple_only'),
			'check_mulitiple_only' => $this->input->post('check_mulitiple_only'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "mulitiple_only"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function mulitiple_multiple()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_mulitiple_multiple' => $this->input->post('question_mulitiple_multiple'),
			'answer_mulitiple_multiple' => $this->input->post('answer_mulitiple_multiple'),
			'other_mulitiple_multiple' => $this->input->post('other_mulitiple_multiple'),
			'check_mulitiple_multiple' => $this->input->post('check_mulitiple_multiple'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "mulitiple_multiple"
		);
		redirect('survey/insert_survey','refresh');		
	}
	public function comment()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'comment' => $this->input->post('comment'),
			'check_comment' => $this->input->post('check_comment'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "comment"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function ranking()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_ranking' => $this->input->post('question_ranking'),
			'answer_ranking' => $this->input->post('answer_ranking'),
			'other_ranking' => $this->input->post('other_ranking'),
			'check_ranking' => $this->input->post('check_ranking'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "ranking"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function ranking_scale()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_ranking_scale' => $this->input->post('question_ranking_scale'),
			'answer_ranking_scale' => $this->input->post('answer_ranking_scale'),
			'ranking_scale' => $this->input->post('ranking_scale'),
			'ranking_scale_weight' => $this->input->post('ranking_scale_weight'),
			'other_ranking_scale' => $this->input->post('other_ranking_scale'),
			'check_ranking_scale' => $this->input->post('check_ranking_scale'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "ranking_scale"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function matrix_only()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_matrix_only' => $this->input->post('question_matrix_only'),
			'answer_matrix_only' => $this->input->post('answer_matrix_only'),
			'ranking_matrix_only' => $this->input->post('ranking_matrix_only'),
			'other_matrix_only' => $this->input->post('other_matrix_only'),
			'check_matrix_only' => $this->input->post('check_matrix_only'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "matrix_only"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function matrix_multiple()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_matrix_multiple' => $this->input->post('question_matrix_multiple'),
			'answer_matrix_multiple' => $this->input->post('answer_matrix_multiple'),
			'ranking_matrix_multiple' => $this->input->post('ranking_matrix_multiple'),
			'other_matrix_multiple' => $this->input->post('other_matrix_multiple'),
			'check_matrix_multiple' => $this->input->post('check_matrix_multiple'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "matrix_multiple"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function single_textbox()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_single_textbox' => $this->input->post('question_single_textbox'),
			'other_single_textbox' => $this->input->post('other_single_textbox'),
			'check_single_textbox' => $this->input->post('check_single_textbox'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "single_textbox"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function mulitple_textbox()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_mulitple_textbox' => $this->input->post('question_mulitple_textbox'),
			'answer_mulitple_textbox' => $this->input->post('answer_mulitple_textbox'),
			'other_mulitple_textbox' => $this->input->post('other_mulitple_textbox'),
			'check_mulitple_textbox' => $this->input->post('check_mulitple_textbox'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "mulitple_textbox"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function date_time()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_date_time' => $this->input->post('question_date_time'),
			'answer_date_time' => $this->input->post('answer_date_time'),
			'other_date_time' => $this->input->post('other_date_time'),
			'check_date_time' => $this->input->post('check_date_time'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "date_time"
		);
		redirect('survey/insert_survey','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Update Session ==================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function mulitiple_only_update()
	{		
		@session_start();	
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_mulitiple_only' => $this->input->post('question_mulitiple_only'),
			'answer_mulitiple_only' => $this->input->post('answer_mulitiple_only'),
			'other_mulitiple_only' => $this->input->post('other_mulitiple_only'),
			'check_mulitiple_only' => $this->input->post('check_mulitiple_only'),
			'number' => $number,
			'type' => "mulitiple_only"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function mulitiple_multiple_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_mulitiple_multiple' => $this->input->post('question_mulitiple_multiple'),
			'answer_mulitiple_multiple' => $this->input->post('answer_mulitiple_multiple'),
			'other_mulitiple_multiple' => $this->input->post('other_mulitiple_multiple'),
			'check_mulitiple_multiple' => $this->input->post('check_mulitiple_multiple'),
			'number' => $number,
			'type' => "mulitiple_multiple"
		);
		redirect('survey/insert_survey','refresh');		
	}
	public function comment_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'comment' => $this->input->post('comment'),
			'check_comment' => $this->input->post('check_comment'),
			'number' => $number,
			'type' => "comment"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function ranking_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_ranking' => $this->input->post('question_ranking'),
			'answer_ranking' => $this->input->post('answer_ranking'),
			'other_ranking' => $this->input->post('other_ranking'),
			'check_ranking' => $this->input->post('check_ranking'),
			'number' => $number,
			'type' => "ranking"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function ranking_scale_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
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
	public function matrix_only_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
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
	public function matrix_multiple_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
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
	public function single_textbox_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_single_textbox' => $this->input->post('question_single_textbox'),
			'other_single_textbox' => $this->input->post('other_single_textbox'),
			'check_single_textbox' => $this->input->post('check_single_textbox'),
			'number' => $number,
			'type' => "single_textbox"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function mulitple_textbox_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_mulitple_textbox' => $this->input->post('question_mulitple_textbox'),
			'answer_mulitple_textbox' => $this->input->post('answer_mulitple_textbox'),
			'other_mulitple_textbox' => $this->input->post('other_mulitple_textbox'),
			'check_mulitple_textbox' => $this->input->post('check_mulitple_textbox'),
			'number' => $number,
			'type' => "mulitple_textbox"
		);
		redirect('survey/insert_survey','refresh');
	}
	public function date_time_update()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);
		
		@$_SESSION['qa_all'][$arr] = array(
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
		@$_SESSION['qa_all'][] = array(
			'question_mulitiple_only' => $this->input->post('question_mulitiple_only'),
			'answer_mulitiple_only' => $this->input->post('answer_mulitiple_only'),
			'other_mulitiple_only' => $this->input->post('other_mulitiple_only'),
			'check_mulitiple_only' => $this->input->post('check_mulitiple_only'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "mulitiple_only"
		);
		redirect('survey/update_survey','refresh');
	}
	public function mulitiple_multiple_after()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_mulitiple_multiple' => $this->input->post('question_mulitiple_multiple'),
			'answer_mulitiple_multiple' => $this->input->post('answer_mulitiple_multiple'),
			'other_mulitiple_multiple' => $this->input->post('other_mulitiple_multiple'),
			'check_mulitiple_multiple' => $this->input->post('check_mulitiple_multiple'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "mulitiple_multiple"
		);
		redirect('survey/update_survey','refresh');		
	}
	public function comment_after()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'comment' => $this->input->post('comment'),
			'check_comment' => $this->input->post('check_comment'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "comment"
		);
		redirect('survey/update_survey','refresh');
	}
	public function ranking_after()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_ranking' => $this->input->post('question_ranking'),
			'answer_ranking' => $this->input->post('answer_ranking'),
			'other_ranking' => $this->input->post('other_ranking'),
			'check_ranking' => $this->input->post('check_ranking'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "ranking"
		);
		redirect('survey/update_survey','refresh');
	}
	public function ranking_scale_after()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_ranking_scale' => $this->input->post('question_ranking_scale'),
			'answer_ranking_scale' => $this->input->post('answer_ranking_scale'),
			'ranking_scale' => $this->input->post('ranking_scale'),
			'ranking_scale_weight' => $this->input->post('ranking_scale_weight'),
			'other_ranking_scale' => $this->input->post('other_ranking_scale'),
			'check_ranking_scale' => $this->input->post('check_ranking_scale'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "ranking_scale"
		);
		redirect('survey/update_survey','refresh');
	}
	public function matrix_only_after()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_matrix_only' => $this->input->post('question_matrix_only'),
			'answer_matrix_only' => $this->input->post('answer_matrix_only'),
			'ranking_matrix_only' => $this->input->post('ranking_matrix_only'),
			'other_matrix_only' => $this->input->post('other_matrix_only'),
			'check_matrix_only' => $this->input->post('check_matrix_only'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "matrix_only"
		);
		redirect('survey/update_survey','refresh');
	}
	public function matrix_multiple_after()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_matrix_multiple' => $this->input->post('question_matrix_multiple'),
			'answer_matrix_multiple' => $this->input->post('answer_matrix_multiple'),
			'ranking_matrix_multiple' => $this->input->post('ranking_matrix_multiple'),
			'other_matrix_multiple' => $this->input->post('other_matrix_multiple'),
			'check_matrix_multiple' => $this->input->post('check_matrix_multiple'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "matrix_multiple"
		);
		redirect('survey/update_survey','refresh');
	}
	public function single_textbox_after()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_single_textbox' => $this->input->post('question_single_textbox'),
			'other_single_textbox' => $this->input->post('other_single_textbox'),
			'check_single_textbox' => $this->input->post('check_single_textbox'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "single_textbox"
		);
		redirect('survey/update_survey','refresh');
	}
	public function mulitple_textbox_after()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_mulitple_textbox' => $this->input->post('question_mulitple_textbox'),
			'answer_mulitple_textbox' => $this->input->post('answer_mulitple_textbox'),
			'other_mulitple_textbox' => $this->input->post('other_mulitple_textbox'),
			'check_mulitple_textbox' => $this->input->post('check_mulitple_textbox'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "mulitple_textbox"
		);
		redirect('survey/update_survey','refresh');
	}
	public function date_time_after()
	{
		@session_start();
		@$_SESSION['qa_all'][] = array(
			'question_date_time' => $this->input->post('question_date_time'),
			'answer_date_time' => $this->input->post('answer_date_time'),
			'other_date_time' => $this->input->post('other_date_time'),
			'check_date_time' => $this->input->post('check_date_time'),
			'number' => count(@$_SESSION['qa_all'])+1,
			'type' => "date_time"
		);
		redirect('survey/update_survey','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Update Session After ==================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function mulitiple_only_update_after()
	{		
		@session_start();	
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_mulitiple_only' => $this->input->post('question_mulitiple_only'),
			'answer_mulitiple_only' => $this->input->post('answer_mulitiple_only'),
			'other_mulitiple_only' => $this->input->post('other_mulitiple_only'),
			'check_mulitiple_only' => $this->input->post('check_mulitiple_only'),
			'number' => $number,
			'type' => "mulitiple_only"
		);
		redirect('survey/update_survey','refresh');
	}
	public function mulitiple_multiple_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_mulitiple_multiple' => $this->input->post('question_mulitiple_multiple'),
			'answer_mulitiple_multiple' => $this->input->post('answer_mulitiple_multiple'),
			'other_mulitiple_multiple' => $this->input->post('other_mulitiple_multiple'),
			'check_mulitiple_multiple' => $this->input->post('check_mulitiple_multiple'),
			'number' => $number,
			'type' => "mulitiple_multiple"
		);
		redirect('survey/update_survey','refresh');		
	}
	public function comment_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'comment' => $this->input->post('comment'),
			'check_comment' => $this->input->post('check_comment'),
			'number' => $number,
			'type' => "comment"
		);
		redirect('survey/update_survey','refresh');
	}
	public function ranking_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_ranking' => $this->input->post('question_ranking'),
			'answer_ranking' => $this->input->post('answer_ranking'),
			'other_ranking' => $this->input->post('other_ranking'),
			'check_ranking' => $this->input->post('check_ranking'),
			'number' => $number,
			'type' => "ranking"
		);
		redirect('survey/update_survey','refresh');
	}
	public function ranking_scale_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_ranking_scale' => $this->input->post('question_ranking_scale'),
			'answer_ranking_scale' => $this->input->post('answer_ranking_scale'),
			'ranking_scale' => $this->input->post('ranking_scale'),
			'ranking_scale_weight' => $this->input->post('ranking_scale_weight'),
			'other_ranking_scale' => $this->input->post('other_ranking_scale'),
			'check_ranking_scale' => $this->input->post('check_ranking_scale'),
			'number' => $number,
			'type' => "ranking_scale"
		);
		redirect('survey/update_survey','refresh');
	}
	public function matrix_only_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_matrix_only' => $this->input->post('question_matrix_only'),
			'answer_matrix_only' => $this->input->post('answer_matrix_only'),
			'ranking_matrix_only' => $this->input->post('ranking_matrix_only'),
			'other_matrix_only' => $this->input->post('other_matrix_only'),
			'check_matrix_only' => $this->input->post('check_matrix_only'),
			'number' => $number,
			'type' => "matrix_only"
		);
		redirect('survey/update_survey','refresh');
	}
	public function matrix_multiple_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_matrix_multiple' => $this->input->post('question_matrix_multiple'),
			'answer_matrix_multiple' => $this->input->post('answer_matrix_multiple'),
			'ranking_matrix_multiple' => $this->input->post('ranking_matrix_multiple'),
			'other_matrix_multiple' => $this->input->post('other_matrix_multiple'),
			'check_matrix_multiple' => $this->input->post('check_matrix_multiple'),
			'number' => $number,
			'type' => "matrix_multiple"
		);
		redirect('survey/update_survey','refresh');
	}
	public function single_textbox_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_single_textbox' => $this->input->post('question_single_textbox'),
			'other_single_textbox' => $this->input->post('other_single_textbox'),
			'check_single_textbox' => $this->input->post('check_single_textbox'),
			'number' => $number,
			'type' => "single_textbox"
		);
		redirect('survey/update_survey','refresh');
	}
	public function mulitple_textbox_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);

		@$_SESSION['qa_all'][$arr] = array(
			'question_mulitple_textbox' => $this->input->post('question_mulitple_textbox'),
			'answer_mulitple_textbox' => $this->input->post('answer_mulitple_textbox'),
			'other_mulitple_textbox' => $this->input->post('other_mulitple_textbox'),
			'check_mulitple_textbox' => $this->input->post('check_mulitple_textbox'),
			'number' => $number,
			'type' => "mulitple_textbox"
		);
		redirect('survey/update_survey','refresh');
	}
	public function date_time_update_after()
	{
		@session_start();
		$arr = $this->input->post('chanel');
		$number = $_SESSION['qa_all'][$arr]['number'];
		unset($_SESSION['qa_all'][$arr]);
		
		@$_SESSION['qa_all'][$arr] = array(
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
		$this->load->view('manage_survey/update_survey');
		$this->load->view('footer');
	}
	public function edit_session_after()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		$this->load->view('head');
		$this->load->view('manage_survey/update_survey_after');
		$this->load->view('footer');
	}
	public function unset_session()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		unset($_SESSION['qa_all'][$arr]['type']);
		redirect('survey/insert_survey','refresh');
	}
	public function unset_session_after()
	{
		@session_start();
		$arr = $this->uri->segment(3);
		unset($_SESSION['qa_all'][$arr]['type']);
		redirect('survey/update_survey','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Manage To DB ======================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function insert_survey_db()
	{
		@session_start();
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		
		$question_subject = array(
			'qh_title' => $all_session['heading']['title'],
			'qh_category' => $all_session['heading']['category'],
			'qh_detail' => $all_session['heading']['detail'],
			'qh_createdate' => date('Y-m-d H:i:s'),
			'qh_startdate' => @$all_session['question_subject']['qh_startdate'],
			'qh_enddate' => @$all_session['question_subject']['qh_enddate'],
			'qh_user' => @$all_session['login']['user_id'],
			'qh_type' => @$all_session['question_subject']['qh_type'],
			'qh_ip' => @$all_session['question_subject']['qh_ip'],
			'qh_url' => @$all_session['question_subject']['qh_url']
		);
		$this->survey_model->insert_survey_db($question_subject);
		$this->inser_question_general();
	}
	public function edit_survey_db()
	{
		@session_start();
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด		
		$qh_id = $all_session['question_subject']['qh_id'];
		$question_subject = array(
			'qh_id' => $qh_id,
			'qh_title' => $all_session['heading']['title'],
			'qh_title' => $all_session['heading']['title'],
			'qh_category' => $all_session['heading']['category'],
			'qh_detail' => $all_session['heading']['detail'],
			'qh_createdate' => date('Y-m-d H:i:s'),
			'qh_startdate' => @$all_session['question_subject']['qh_startdate'],
			'qh_enddate' => @$all_session['question_subject']['qh_enddate'],
			'qh_type' => @$all_session['question_subject']['qh_type'],
			'qh_ip' => @$all_session['question_subject']['qh_ip'],
			'qh_url' => @$all_session['question_subject']['qh_url']
		);
		$this->survey_model->edit_survey_db($question_subject);
		$this->edit_question_general();
	}
	public function inser_question_general()
	{
		@session_start();
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$id_max = $this->survey_model->id_max();// ค่ามากที่สุดของ id
		$all_keep = $this->user_model->list_data_user();

		for($i=0;$i<count(@$_SESSION['data_respondent']);$i++){
			
			$question_general = array(
				'qh_id' => $id_max[0]['qh_id'],
				'qg_category' => @$_SESSION['data_respondent'][$i]
			);
			$this->survey_model->inser_question_general($question_general);
		}
		for($i=0;$i<count($all_keep);$i++)
		{
			$keep = array(
				'qh_id' => $id_max[0]['qh_id'],
				'user_id' => @$all_session['user_id'][$i]
			);
			$this->survey_model->inser_select_keep($keep);
		}
		$this->insert_temp_question_answer();
		
	}
	public function edit_question_general()
	{
		@session_start();
		$all_session = $this->session->all_userdata();
		$qh_id = $all_session['question_subject']['qh_id'];
		$all_keep = $this->user_model->list_data_user();

		for($i=0;$i<count(@$_SESSION['data_respondent']);$i++)
		{			
			$question_general = array(
				'qh_id' => $qh_id,
				'qg_category' => @$_SESSION['data_respondent'][$i]
			);
			$this->survey_model->inser_question_general($question_general);
		}
		for($i=0;$i<count($all_keep);$i++)
		{
			$keep = array(
				'qh_id' => $qh_id,
				'user_id' => @$all_session['user_id'][$i]
			);
			$this->db->insert('keep_value',$keep);
		}
		$this->update_temp_question_answer();
	}
	public function insert_temp_question_answer()
	{
		@session_start();
		$all_question_answer = count(@$_SESSION['temp_all']);// count จำนวนข้อมูลทั้งหมด
		$id_max = $this->survey_model->id_max();

		for($i=0;$i<$all_question_answer;$i++)
		{
			$question = array(
				'qh_id' => $id_max[0]['qh_id'],
				'q_question' => @$_SESSION['temp_all'][$i]['question_matrix_only'].@$_SESSION['temp_all'][$i]['question_matrix_multiple'].@$_SESSION['temp_all'][$i]['question_ranking_scale'].@$_SESSION['temp_all'][$i]['comment'].@$_SESSION['temp_all'][$i]['question_single_textbox'].@$_SESSION['temp_all'][$i]['question_mulitiple_only'].@$_SESSION['temp_all'][$i]['question_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['question_ranking'].@$_SESSION['temp_all'][$i]['question_mulitple_textbox'].@$_SESSION['temp_all'][$i]['question_date_time'],
				'q_other' => @$_SESSION['temp_all'][$i]['other_matrix_only'].@$_SESSION['temp_all'][$i]['other_matrix_multiple'].@$_SESSION['temp_all'][$i]['other_ranking_scale'].@$_SESSION['temp_all'][$i]['other_comment'].@$_SESSION['temp_all'][$i]['other_single_textbox'].@$_SESSION['temp_all'][$i]['other_mulitiple_only'].@$_SESSION['temp_all'][$i]['other_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['other_ranking'].@$_SESSION['temp_all'][$i]['other_mulitple_textbox'].@$_SESSION['temp_all'][$i]['other_date_time'],
				'q_check' => @$_SESSION['temp_all'][$i]['check_matrix_only'].@$_SESSION['temp_all'][$i]['check_matrix_multiple'].@$_SESSION['temp_all'][$i]['check_ranking_scale'].@$_SESSION['temp_all'][$i]['check_comment'].@$_SESSION['temp_all'][$i]['check_single_textbox'].@$_SESSION['temp_all'][$i]['check_mulitiple_only'].@$_SESSION['temp_all'][$i]['check_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['check_ranking'].@$_SESSION['temp_all'][$i]['check_mulitple_textbox'].@$_SESSION['temp_all'][$i]['check_date_time'],
				'q_number' => @$_SESSION['temp_all'][$i]['number'],
				'q_type' => @$_SESSION['temp_all'][$i]['type']
			);
			$answer = array(
				'qh_id' => $id_max[0]['qh_id'],
				'a_answer' => @$_SESSION['temp_all'][$i]['answer_matrix_only'].@$_SESSION['temp_all'][$i]['answer_matrix_multiple'].@$_SESSION['temp_all'][$i]['answer_ranking_scale'].@$_SESSION['temp_all'][$i]['answer_mulitiple_only'].@$_SESSION['temp_all'][$i]['answer_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['answer_ranking'].@$_SESSION['temp_all'][$i]['answer_mulitple_textbox'].@$_SESSION['temp_all'][$i]['answer_date_time'],
				'a_scale' => @$_SESSION['temp_all'][$i]['ranking_scale'],
				'a_weight' => @$_SESSION['temp_all'][$i]['ranking_scale_weight'],
				'a_ranking' => @$_SESSION['temp_all'][$i]['ranking_matrix_only'].@$_SESSION['temp_all'][$i]['ranking_matrix_multiple'],
				'a_number' => @$_SESSION['temp_all'][$i]['number'],
				'a_type' => @$_SESSION['temp_all'][$i]['type']
			);

			$this->survey_model->insert_temp_question($question);
			$this->survey_model->insert_temp_answer($answer);
		}

		$this->insert_question_answer();
	}
	public function insert_question_answer()
	{
		@session_start();
		$all_question_answer = count(@$_SESSION['qa_all']);// count จำนวนข้อมูลทั้งหมด
		$id_max = $this->survey_model->id_max();

		for($i=0;$i<$all_question_answer;$i++)
		{
			$question = array(
				'qh_id' => $id_max[0]['qh_id'],
				'q_question' => @$_SESSION['qa_all'][$i]['question_matrix_only'].@$_SESSION['qa_all'][$i]['question_matrix_multiple'].@$_SESSION['qa_all'][$i]['question_ranking_scale'].@$_SESSION['qa_all'][$i]['comment'].@$_SESSION['qa_all'][$i]['question_single_textbox'].@$_SESSION['qa_all'][$i]['question_mulitiple_only'].@$_SESSION['qa_all'][$i]['question_mulitiple_multiple'].@$_SESSION['qa_all'][$i]['question_ranking'].@$_SESSION['qa_all'][$i]['question_mulitple_textbox'].@$_SESSION['qa_all'][$i]['question_date_time'],
				'q_other' => @$_SESSION['qa_all'][$i]['other_matrix_only'].@$_SESSION['qa_all'][$i]['other_matrix_multiple'].@$_SESSION['qa_all'][$i]['other_ranking_scale'].@$_SESSION['qa_all'][$i]['other_comment'].@$_SESSION['qa_all'][$i]['other_single_textbox'].@$_SESSION['qa_all'][$i]['other_mulitiple_only'].@$_SESSION['qa_all'][$i]['other_mulitiple_multiple'].@$_SESSION['qa_all'][$i]['other_ranking'].@$_SESSION['qa_all'][$i]['other_mulitple_textbox'].@$_SESSION['qa_all'][$i]['other_date_time'],
				'q_check' => @$_SESSION['qa_all'][$i]['check_matrix_only'].@$_SESSION['qa_all'][$i]['check_matrix_multiple'].@$_SESSION['qa_all'][$i]['check_ranking_scale'].@$_SESSION['qa_all'][$i]['check_comment'].@$_SESSION['qa_all'][$i]['check_single_textbox'].@$_SESSION['qa_all'][$i]['check_mulitiple_only'].@$_SESSION['qa_all'][$i]['check_mulitiple_multiple'].@$_SESSION['qa_all'][$i]['check_ranking'].@$_SESSION['qa_all'][$i]['check_mulitple_textbox'].@$_SESSION['qa_all'][$i]['check_date_time'],
				'q_number' => @$_SESSION['qa_all'][$i]['number'],
				'q_type' => @$_SESSION['qa_all'][$i]['type']
			);
			$answer = array(
				'qh_id' => $id_max[0]['qh_id'],
				'a_answer' => @$_SESSION['qa_all'][$i]['answer_matrix_only'].@$_SESSION['qa_all'][$i]['answer_matrix_multiple'].@$_SESSION['qa_all'][$i]['answer_ranking_scale'].@$_SESSION['qa_all'][$i]['answer_mulitiple_only'].@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple'].@$_SESSION['qa_all'][$i]['answer_ranking'].@$_SESSION['qa_all'][$i]['answer_mulitple_textbox'].@$_SESSION['qa_all'][$i]['answer_date_time'],
				'a_scale' => @$_SESSION['qa_all'][$i]['ranking_scale'],
				'a_weight' => @$_SESSION['qa_all'][$i]['ranking_scale_weight'],
				'a_ranking' => @$_SESSION['qa_all'][$i]['ranking_matrix_only'].@$_SESSION['qa_all'][$i]['ranking_matrix_multiple'],
				'a_number' => @$_SESSION['qa_all'][$i]['number'],
				'a_type' => @$_SESSION['qa_all'][$i]['type']
			);
			$this->survey_model->insert_question($question);
			$this->survey_model->insert_answer($answer);
		}
		/*Start logfile*/
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$data_user = array(
			'logfile_survey_user' => $all_session['login']['user_name'],
			'logfile_survey_what' => "สร้างแบบฟอร์มแบบสำรวจ",
			'logfile_survey_form' => $id_max[0]['qh_id'],
			'logfile_survey_time' => date('H:i:s'),
			'logfile_survey_date' => date('Y-m-d')
		);
		$this->survey_model->logfile_survey($data_user);
		/*End logfile*/

		redirect('survey/success_survey','refresh');
	}
	public function update_temp_question_answer()
	{
		@session_start();
		$all_question_answer = count(@$_SESSION['temp_all']);// count จำนวนข้อมูลทั้งหมด
		$id_max = $this->survey_model->id_max();

		for($i=0;$i<$all_question_answer;$i++)
		{
			$question = array(
				'qh_id' => $id_max[0]['qh_id'],
				'q_question' => @$_SESSION['temp_all'][$i]['question_matrix_only'].@$_SESSION['temp_all'][$i]['question_matrix_multiple'].@$_SESSION['temp_all'][$i]['question_ranking_scale'].@$_SESSION['temp_all'][$i]['comment'].@$_SESSION['temp_all'][$i]['question_single_textbox'].@$_SESSION['temp_all'][$i]['question_mulitiple_only'].@$_SESSION['temp_all'][$i]['question_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['question_ranking'].@$_SESSION['temp_all'][$i]['question_mulitple_textbox'].@$_SESSION['temp_all'][$i]['question_date_time'],
				'q_other' => @$_SESSION['temp_all'][$i]['other_matrix_only'].@$_SESSION['temp_all'][$i]['other_matrix_multiple'].@$_SESSION['temp_all'][$i]['other_ranking_scale'].@$_SESSION['temp_all'][$i]['other_comment'].@$_SESSION['temp_all'][$i]['other_single_textbox'].@$_SESSION['temp_all'][$i]['other_mulitiple_only'].@$_SESSION['temp_all'][$i]['other_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['other_ranking'].@$_SESSION['temp_all'][$i]['other_mulitple_textbox'].@$_SESSION['temp_all'][$i]['other_date_time'],
				'q_check' => @$_SESSION['temp_all'][$i]['check_matrix_only'].@$_SESSION['temp_all'][$i]['check_matrix_multiple'].@$_SESSION['temp_all'][$i]['check_ranking_scale'].@$_SESSION['temp_all'][$i]['check_comment'].@$_SESSION['temp_all'][$i]['check_single_textbox'].@$_SESSION['temp_all'][$i]['check_mulitiple_only'].@$_SESSION['temp_all'][$i]['check_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['check_ranking'].@$_SESSION['temp_all'][$i]['check_mulitple_textbox'].@$_SESSION['temp_all'][$i]['check_date_time'],
				'q_number' => @$_SESSION['temp_all'][$i]['number'],
				'q_type' => @$_SESSION['temp_all'][$i]['type']
			);
			$answer = array(
				'qh_id' => $id_max[0]['qh_id'],
				'a_answer' => @$_SESSION['temp_all'][$i]['answer_matrix_only'].@$_SESSION['temp_all'][$i]['answer_matrix_multiple'].@$_SESSION['temp_all'][$i]['answer_ranking_scale'].@$_SESSION['temp_all'][$i]['answer_mulitiple_only'].@$_SESSION['temp_all'][$i]['answer_mulitiple_multiple'].@$_SESSION['temp_all'][$i]['answer_ranking'].@$_SESSION['temp_all'][$i]['answer_mulitple_textbox'].@$_SESSION['temp_all'][$i]['answer_date_time'],
				'a_scale' => @$_SESSION['temp_all'][$i]['ranking_scale'],
				'a_weight' => @$_SESSION['temp_all'][$i]['ranking_scale_weight'],
				'a_ranking' => @$_SESSION['temp_all'][$i]['ranking_matrix_only'].@$_SESSION['temp_all'][$i]['ranking_matrix_multiple'],
				'a_number' => @$_SESSION['temp_all'][$i]['number'],
				'a_type' => @$_SESSION['temp_all'][$i]['type']
			);

			$this->survey_model->insert_temp_question($question);
			$this->survey_model->insert_temp_answer($answer);
		}

		$this->update_question_answer();
	}
	public function update_question_answer()
	{
		@session_start();
		$all_session = $this->session->all_userdata();
		$all_question_answer = count(@$_SESSION['qa_all']);// count จำนวนข้อมูลทั้งหมด
		$qh_id = $all_session['question_subject']['qh_id'];

		for($i=0;$i<$all_question_answer;$i++)
		{
			$question = array(
				'qh_id' => $qh_id,
				'q_question' => @$_SESSION['qa_all'][$i]['question_matrix_only'].@$_SESSION['qa_all'][$i]['question_matrix_multiple'].@$_SESSION['qa_all'][$i]['question_ranking_scale'].@$_SESSION['qa_all'][$i]['comment'].@$_SESSION['qa_all'][$i]['question_single_textbox'].@$_SESSION['qa_all'][$i]['question_mulitiple_only'].@$_SESSION['qa_all'][$i]['question_mulitiple_multiple'].@$_SESSION['qa_all'][$i]['question_ranking'].@$_SESSION['qa_all'][$i]['question_mulitple_textbox'].@$_SESSION['qa_all'][$i]['question_date_time'],
				'q_other' => @$_SESSION['qa_all'][$i]['other_matrix_only'].@$_SESSION['qa_all'][$i]['other_matrix_multiple'].@$_SESSION['qa_all'][$i]['other_ranking_scale'].@$_SESSION['qa_all'][$i]['other_comment'].@$_SESSION['qa_all'][$i]['other_single_textbox'].@$_SESSION['qa_all'][$i]['other_mulitiple_only'].@$_SESSION['qa_all'][$i]['other_mulitiple_multiple'].@$_SESSION['qa_all'][$i]['other_ranking'].@$_SESSION['qa_all'][$i]['other_mulitple_textbox'].@$_SESSION['qa_all'][$i]['other_date_time'],
				'q_check' => @$_SESSION['qa_all'][$i]['check_matrix_only'].@$_SESSION['qa_all'][$i]['check_matrix_multiple'].@$_SESSION['qa_all'][$i]['check_ranking_scale'].@$_SESSION['qa_all'][$i]['check_comment'].@$_SESSION['qa_all'][$i]['check_single_textbox'].@$_SESSION['qa_all'][$i]['check_mulitiple_only'].@$_SESSION['qa_all'][$i]['check_mulitiple_multiple'].@$_SESSION['qa_all'][$i]['check_ranking'].@$_SESSION['qa_all'][$i]['check_mulitple_textbox'].@$_SESSION['qa_all'][$i]['check_date_time'],
				'q_number' => @$_SESSION['qa_all'][$i]['number'],
				'q_type' => @$_SESSION['qa_all'][$i]['type']
			);
			$answer = array(
				'qh_id' => $qh_id,
				'a_answer' => @$_SESSION['qa_all'][$i]['answer_matrix_only'].@$_SESSION['qa_all'][$i]['answer_matrix_multiple'].@$_SESSION['qa_all'][$i]['answer_ranking_scale'].@$_SESSION['qa_all'][$i]['answer_mulitiple_only'].@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple'].@$_SESSION['qa_all'][$i]['answer_ranking'].@$_SESSION['qa_all'][$i]['answer_mulitple_textbox'].@$_SESSION['qa_all'][$i]['answer_date_time'],
				'a_scale' => @$_SESSION['qa_all'][$i]['ranking_scale'],
				'a_weight' => @$_SESSION['qa_all'][$i]['ranking_scale_weight'],
				'a_ranking' => @$_SESSION['qa_all'][$i]['ranking_matrix_only'].@$_SESSION['qa_all'][$i]['ranking_matrix_multiple'],
				'a_number' => @$_SESSION['qa_all'][$i]['number'],
				'a_type' => @$_SESSION['qa_all'][$i]['type']
			);
			$this->survey_model->insert_question($question);
			$this->survey_model->insert_answer($answer);
		}
		/*Start logfile*/
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$data_user = array(
			'logfile_survey_user' => $all_session['login']['user_name'],
			'logfile_survey_what' => "แก้ไขแบบฟอร์มแบบสำรวจ",
			'logfile_survey_form' => $qh_id,
			'logfile_survey_time' => date('H:i:s'),
			'logfile_survey_date' => date('Y-m-d')
		);
		$this->survey_model->logfile_survey($data_user);
		/*End logfile*/
		
		redirect('survey/success_survey','refresh');
	}
	public function update_survey_db()
	{
	         @session_start();
		$all_session = $this->session->all_userdata();
		$qh_id = $this->uri->segment(3);
		$question_subject = $this->survey_model->select_question_subject($qh_id);
		$question_general = $this->survey_model->select_question_general($qh_id);
		$question_temp_survey = $this->survey_model->select_temp_survey_question($qh_id);
		$question = $this->survey_model->select_question($qh_id);
		$answer_temp_survey = $this->survey_model->select_temp_survey_answer($qh_id);
		$answer = $this->survey_model->select_answer($qh_id);
		$keep_value = $this->survey_model->keep_value($qh_id);

		#################### session keep ####################
	/*
		$i=0;
		foreach($keep_value as $keep_value)
		{
			$input['user_id_affter'][$i] = array(
				$i => $keep_value['user_id']
			);
                       echo $input['user_id_affter'][$i];			
			$this->session->set_userdata($input);
		 $i++;
		}
  */

    	#################### session keep ####################
		#################### session subject ####################
		$input['heading'] = array(
				'title' => $question_subject[0]['qh_title'],
				'category' => $question_subject[0]['qh_category'],
				'detail' => $question_subject[0]['qh_detail']
		);
		$this->session->set_userdata($input);
		$input['question_subject'] = array(
			'qh_id' => $question_subject[0]['qh_id'],
			'qh_startdate' => $question_subject[0]['qh_startdate'],
			'qh_enddate' => $question_subject[0]['qh_enddate'],
			'qh_type' => $question_subject[0]['qh_type'],
			'qh_ip' => $question_subject[0]['qh_ip'],
			'qh_url' => $question_subject[0]['qh_url']
		);
		$this->session->set_userdata($input);
		#################### session subject ####################
		#################### session general ####################
		for($i=0;$i<count($question_general);$i++)
		{		
			$qg_category[] = $question_general[$i]['qg_category'];	
		}
		@$_SESSION['data_respondent'] = $qg_category;
		#################### session general ####################
		
		for($i=0;$i<count($question_temp_survey);$i++)
		{
			if($question_temp_survey[$i]['q_type']=="mulitiple_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_only' => $question_temp_survey[$i]['q_question'],
					'answer_mulitiple_only' => $answer_temp_survey[$i]['a_answer'],
					'other_mulitiple_only' => $question_temp_survey[$i]['q_other'],
					'check_mulitiple_only' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "mulitiple_only"
				);
			}
			if($question_temp_survey[$i]['q_type']=="mulitiple_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_multiple' => $question_temp_survey[$i]['q_question'],
					'answer_mulitiple_multiple' => $answer_temp_survey[$i]['a_answer'],
					'other_mulitiple_multiple' => $question_temp_survey[$i]['q_other'],
					'check_mulitiple_multiple' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "mulitiple_multiple"
				);
			}
			if($question_temp_survey[$i]['q_type']=="comment")
			{
				@$_SESSION['temp_all'][] = array(
					'comment' => $question_temp_survey[$i]['q_question'],
					'check_comment' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "comment"
				);
			}
			if($question_temp_survey[$i]['q_type']=="ranking")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking' => $question_temp_survey[$i]['q_question'],
					'answer_ranking' => $answer_temp_survey[$i]['a_answer'],
					'other_ranking' => $question_temp_survey[$i]['q_other'],
					'check_ranking' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "ranking"
				);
			}
			if($question_temp_survey[$i]['q_type']=="ranking_scale")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking_scale' => $question_temp_survey[$i]['q_question'],
					'answer_ranking_scale' => $answer_temp_survey[$i]['a_answer'],
					'ranking_scale' => $answer_temp_survey[$i]['a_scale'],
					'ranking_scale_weight' => $answer_temp_survey[$i]['a_weight'],
					'other_ranking_scale' => $question_temp_survey[$i]['q_other'],
					'check_ranking_scale' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "ranking_scale"
				);
			}
			if($question_temp_survey[$i]['q_type']=="matrix_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_only' => $question_temp_survey[$i]['q_question'],
					'answer_matrix_only' => $answer_temp_survey[$i]['a_answer'],
					'ranking_matrix_only' => $answer_temp_survey[$i]['a_ranking'],
					'other_matrix_only' => $question_temp_survey[$i]['q_other'],
					'check_matrix_only' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "matrix_only"
				);
			}
			if($question_temp_survey[$i]['q_type']=="matrix_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_multiple' => $question_temp_survey[$i]['q_question'],
					'answer_matrix_multiple' => $answer_temp_survey[$i]['a_answer'],
					'ranking_matrix_multiple' => $answer_temp_survey[$i]['a_ranking'],
					'other_matrix_multiple' => $question_temp_survey[$i]['q_other'],
					'check_matrix_multiple' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "matrix_multiple"
				);
			}
			if($question_temp_survey[$i]['q_type']=="single_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_single_textbox' => $question_temp_survey[$i]['q_question'],
					'other_single_textbox' => $question_temp_survey[$i]['q_other'],
					'check_single_textbox' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "single_textbox"
				);
			}
			if($question_temp_survey[$i]['q_type']=="mulitple_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitple_textbox' => $question_temp_survey[$i]['q_question'],
					'answer_mulitple_textbox' => $answer_temp_survey[$i]['a_answer'],
					'other_mulitple_textbox' => $question_temp_survey[$i]['q_other'],
					'check_mulitple_textbox' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "mulitple_textbox"
				);
			}
			if($question_temp_survey[$i]['q_type']=="date_time")
			{
				@$_SESSION['temp_all'][] = array(
					'question_date_time' => $question_temp_survey[$i]['q_question'],
					'answer_date_time' => $answer_temp_survey[$i]['a_answer'],
					'other_date_time' => $question_temp_survey[$i]['q_other'],
					'check_date_time' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "date_time"
				);
			}
		}

		for($i=0;$i<count($question);$i++)
		{
			if($question[$i]['q_type']=="mulitiple_only")
			{
				@$_SESSION['qa_all'][] = array(
					'question_mulitiple_only' => $question[$i]['q_question'],
					'answer_mulitiple_only' => $answer[$i]['a_answer'],
					'other_mulitiple_only' => $question[$i]['q_other'],
					'check_mulitiple_only' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "mulitiple_only"
				);
			}
			if($question[$i]['q_type']=="mulitiple_multiple")
			{
				@$_SESSION['qa_all'][] = array(
					'question_mulitiple_multiple' => $question[$i]['q_question'],
					'answer_mulitiple_multiple' => $answer[$i]['a_answer'],
					'other_mulitiple_multiple' => $question[$i]['q_other'],
					'check_mulitiple_multiple' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "mulitiple_multiple"
				);
			}
			if($question[$i]['q_type']=="comment")
			{
				@$_SESSION['qa_all'][] = array(
					'comment' => $question[$i]['q_question'],
					'check_comment' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "comment"
				);
			}
			if($question[$i]['q_type']=="ranking")
			{
				@$_SESSION['qa_all'][] = array(
					'question_ranking' => $question[$i]['q_question'],
					'answer_ranking' => $answer[$i]['a_answer'],
					'other_ranking' => $question[$i]['q_other'],
					'check_ranking' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "ranking"
				);
			}
			if($question[$i]['q_type']=="ranking_scale")
			{
				@$_SESSION['qa_all'][] = array(
					'question_ranking_scale' => $question[$i]['q_question'],
					'answer_ranking_scale' => $answer[$i]['a_answer'],
					'ranking_scale' => $answer[$i]['a_scale'],
					'ranking_scale_weight' => $answer[$i]['a_weight'],
					'other_ranking_scale' => $question[$i]['q_other'],
					'check_ranking_scale' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "ranking_scale"
				);
			}
			if($question[$i]['q_type']=="matrix_only")
			{
				@$_SESSION['qa_all'][] = array(
					'question_matrix_only' => $question[$i]['q_question'],
					'answer_matrix_only' => $answer[$i]['a_answer'],
					'ranking_matrix_only' => $answer[$i]['a_ranking'],
					'other_matrix_only' => $question[$i]['q_other'],
					'check_matrix_only' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "matrix_only"
				);
			}
			if($question[$i]['q_type']=="matrix_multiple")
			{
				@$_SESSION['qa_all'][] = array(
					'question_matrix_multiple' => $question[$i]['q_question'],
					'answer_matrix_multiple' => $answer[$i]['a_answer'],
					'ranking_matrix_multiple' => $answer[$i]['a_ranking'],
					'other_matrix_multiple' => $question[$i]['q_other'],
					'check_matrix_multiple' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "matrix_multiple"
				);
			}
			if($question[$i]['q_type']=="single_textbox")
			{
				@$_SESSION['qa_all'][] = array(
					'question_single_textbox' => $question[$i]['q_question'],
					'other_single_textbox' => $question[$i]['q_other'],
					'check_single_textbox' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "single_textbox"
				);
			}
			if($question[$i]['q_type']=="mulitple_textbox")
			{
				@$_SESSION['qa_all'][] = array(
					'question_mulitple_textbox' => $question[$i]['q_question'],
					'answer_mulitple_textbox' => $answer[$i]['a_answer'],
					'other_mulitple_textbox' => $question[$i]['q_other'],
					'check_mulitple_textbox' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "mulitple_textbox"
				);
			}
			if($question[$i]['q_type']=="date_time")
			{
				@$_SESSION['qa_all'][] = array(
					'question_date_time' => $question[$i]['q_question'],
					'answer_date_time' => $answer[$i]['a_answer'],
					'other_date_time' => $question[$i]['q_other'],
					'check_date_time' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "date_time"
				);
			}
		}
		redirect('survey/update_survey','refresh');
	}
	public function delete_survey_db()
	{
		$qh_id = $this->uri->segment(3);

		/*Start logfile*/
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$data_user = array(
				'logfile_survey_user' => $all_session['login']['user_name'],
				'logfile_survey_what' => "ลบแบบฟอร์มแบบสำรวจ",
				'logfile_survey_form' => $qh_id,
				'logfile_survey_time' => date('H:i:s'),
				'logfile_survey_date' => date('Y-m-d')
		);
		$this->survey_model->logfile_survey($data_user);
		/*End logfile*/

		$delete_question_subject = $this->survey_model->delete_question_subject($qh_id);
		$delete_question_general = $this->survey_model->delete_question_general($qh_id);
		$delete_question = $this->survey_model->delete_question($qh_id);
		$delete_answer = $this->survey_model->delete_answer($qh_id);
		redirect('home','refresh');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Form Keep & User ======================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function select_survey_db()
	{		
		@session_start();
		@$_SESSION['test'][] = array('test_session' => 'test_session');
		
		$all_session = $this->session->all_userdata();
		$ipAddress = $all_session['session_id'];
		$qh_id = $this->uri->segment(3);				
			if(@$all_session['login']['user_type']==3){
				$check_ip = 0;
			}else{
				$arr_id = $this->survey_model->check_ip($qh_id,$ipAddress);
				$check_ip = count($arr_id);
			}
		$question_subject = $this->survey_model->select_question_subject($qh_id);
		
			if($question_subject[0]['qh_ip'] == 1 && $check_ip != 0){
				echo "<p>&nbsp;</p><div align='center'><strong style='color:green;'>คุณได้ทำการสำรวจเสร็จแล้วในหัวข้อนี้</strong></div><p>&nbsp;</p>";
				echo "<meta http-equiv='refresh' content='3;URL=".base_url()."index.php/report/show_graph/".$qh_id."'>";
			}else{
	
			$question_general = $this->survey_model->select_question_general($qh_id);
			$question_temp_survey = $this->survey_model->select_temp_survey_question($qh_id);
			$question = $this->survey_model->select_question($qh_id);
			$answer_temp_survey = $this->survey_model->select_temp_survey_answer($qh_id);
			$answer = $this->survey_model->select_answer($qh_id);
			#################### session subject ####################
			$input['heading'] = array(
					'title' => $question_subject[0]['qh_title'],
					'category' => $question_subject[0]['qh_category'],
					'detail' => $question_subject[0]['qh_detail']
			);
			$this->session->set_userdata($input);
	
			$input['question_subject'] = array(
				'qh_id' => $question_subject[0]['qh_id'],
				'qh_startdate' => $question_subject[0]['qh_startdate'],
				'qh_enddate' => $question_subject[0]['qh_enddate'],
				'qh_type' => $question_subject[0]['qh_type'],
				'qh_ip' => $question_subject[0]['qh_ip'],
				'qh_url' => $question_subject[0]['qh_url']
			);
			$this->session->set_userdata($input);
			#################### session subject ####################
			#################### session general ####################
			for($i=0;$i<count($question_general);$i++)
			{		
				$qg_category[] = $question_general[$i]['qg_category'];	
			}
			@$_SESSION['data_respondent'] = $qg_category;
			#################### session general ####################
			for($i=0;$i<count($question_temp_survey);$i++)
			{
				if($question_temp_survey[$i]['q_type']=="mulitiple_only")
				{
					@$_SESSION['temp_all'][] = array(
						'question_mulitiple_only' => $question_temp_survey[$i]['q_question'],
						'answer_mulitiple_only' => $answer_temp_survey[$i]['a_answer'],
						'other_mulitiple_only' => $question_temp_survey[$i]['q_other'],
						'check_mulitiple_only' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "mulitiple_only"
					);
				}
				if($question_temp_survey[$i]['q_type']=="mulitiple_multiple")
				{
					@$_SESSION['temp_all'][] = array(
						'question_mulitiple_multiple' => $question_temp_survey[$i]['q_question'],
						'answer_mulitiple_multiple' => $answer_temp_survey[$i]['a_answer'],
						'other_mulitiple_multiple' => $question_temp_survey[$i]['q_other'],
						'check_mulitiple_multiple' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "mulitiple_multiple"
					);
				}
				if($question_temp_survey[$i]['q_type']=="comment")
				{
					@$_SESSION['temp_all'][] = array(
						'comment' => $question_temp_survey[$i]['q_question'],
						'check_comment' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "comment"
					);
				}
				if($question_temp_survey[$i]['q_type']=="ranking")
				{
					@$_SESSION['temp_all'][] = array(
						'question_ranking' => $question_temp_survey[$i]['q_question'],
						'answer_ranking' => $answer_temp_survey[$i]['a_answer'],
						'other_ranking' => $question_temp_survey[$i]['q_other'],
						'check_ranking' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "ranking"
					);
				}
				if($question_temp_survey[$i]['q_type']=="ranking_scale")
				{
					@$_SESSION['temp_all'][] = array(
						'question_ranking_scale' => $question_temp_survey[$i]['q_question'],
						'answer_ranking_scale' => $answer_temp_survey[$i]['a_answer'],
						'ranking_scale' => $answer_temp_survey[$i]['a_scale'],
						'ranking_scale_weight' => $answer_temp_survey[$i]['a_weight'],
						'other_ranking_scale' => $question_temp_survey[$i]['q_other'],
						'check_ranking_scale' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "ranking_scale"
					);
				}
				if($question_temp_survey[$i]['q_type']=="matrix_only")
				{
					@$_SESSION['temp_all'][] = array(
						'question_matrix_only' => $question_temp_survey[$i]['q_question'],
						'answer_matrix_only' => $answer_temp_survey[$i]['a_answer'],
						'ranking_matrix_only' => $answer_temp_survey[$i]['a_ranking'],
						'other_matrix_only' => $question_temp_survey[$i]['q_other'],
						'check_matrix_only' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "matrix_only"
					);
				}
				if($question_temp_survey[$i]['q_type']=="matrix_multiple")
				{
					@$_SESSION['temp_all'][] = array(
						'question_matrix_multiple' => $question_temp_survey[$i]['q_question'],
						'answer_matrix_multiple' => $answer_temp_survey[$i]['a_answer'],
						'ranking_matrix_multiple' => $answer_temp_survey[$i]['a_ranking'],
						'other_matrix_multiple' => $question_temp_survey[$i]['q_other'],
						'check_matrix_multiple' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "matrix_multiple"
					);
				}
				if($question_temp_survey[$i]['q_type']=="single_textbox")
				{
					@$_SESSION['temp_all'][] = array(
						'question_single_textbox' => $question_temp_survey[$i]['q_question'],
						'other_single_textbox' => $question_temp_survey[$i]['q_other'],
						'check_single_textbox' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "single_textbox"
					);
				}
				if($question_temp_survey[$i]['q_type']=="mulitple_textbox")
				{
					@$_SESSION['temp_all'][] = array(
						'question_mulitple_textbox' => $question_temp_survey[$i]['q_question'],
						'answer_mulitple_textbox' => $answer_temp_survey[$i]['a_answer'],
						'other_mulitple_textbox' => $question_temp_survey[$i]['q_other'],
						'check_mulitple_textbox' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "mulitple_textbox"
					);
				}
				if($question_temp_survey[$i]['q_type']=="date_time")
				{
					@$_SESSION['temp_all'][] = array(
						'question_date_time' => $question_temp_survey[$i]['q_question'],
						'answer_date_time' => $answer_temp_survey[$i]['a_answer'],
						'other_date_time' => $question_temp_survey[$i]['q_other'],
						'check_date_time' => $question_temp_survey[$i]['q_check'],
						'number' => $question_temp_survey[$i]['q_number'],
						'type' => "date_time"
					);
				}
			}
			for($i=0;$i<count($question);$i++)
			{
				if($question[$i]['q_type']=="mulitiple_only")
				{
					@$_SESSION['qa_all'][] = array(
						'question_mulitiple_only' => $question[$i]['q_question'],
						'answer_mulitiple_only' => $answer[$i]['a_answer'],
						'other_mulitiple_only' => $question[$i]['q_other'],
						'check_mulitiple_only' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "mulitiple_only"
					);
				}
				if($question[$i]['q_type']=="mulitiple_multiple")
				{
					@$_SESSION['qa_all'][] = array(
						'question_mulitiple_multiple' => $question[$i]['q_question'],
						'answer_mulitiple_multiple' => $answer[$i]['a_answer'],
						'other_mulitiple_multiple' => $question[$i]['q_other'],
						'check_mulitiple_multiple' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "mulitiple_multiple"
					);
				}
				if($question[$i]['q_type']=="comment")
				{
					@$_SESSION['qa_all'][] = array(
						'comment' => $question[$i]['q_question'],
						'check_comment' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "comment"
					);
				}
				if($question[$i]['q_type']=="ranking")
				{
					@$_SESSION['qa_all'][] = array(
						'question_ranking' => $question[$i]['q_question'],
						'answer_ranking' => $answer[$i]['a_answer'],
						'other_ranking' => $question[$i]['q_other'],
						'check_ranking' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "ranking"
					);
				}
				if($question[$i]['q_type']=="ranking_scale")
				{
					@$_SESSION['qa_all'][] = array(
						'question_ranking_scale' => $question[$i]['q_question'],
						'answer_ranking_scale' => $answer[$i]['a_answer'],
						'ranking_scale' => $answer[$i]['a_scale'],
						'ranking_scale_weight' => $answer[$i]['a_weight'],
						'other_ranking_scale' => $question[$i]['q_other'],
						'check_ranking_scale' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "ranking_scale"
					);
				}
				if($question[$i]['q_type']=="matrix_only")
				{
					@$_SESSION['qa_all'][] = array(
						'question_matrix_only' => $question[$i]['q_question'],
						'answer_matrix_only' => $answer[$i]['a_answer'],
						'ranking_matrix_only' => $answer[$i]['a_ranking'],
						'other_matrix_only' => $question[$i]['q_other'],
						'check_matrix_only' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "matrix_only"
					);
				}
				if($question[$i]['q_type']=="matrix_multiple")
				{
					@$_SESSION['qa_all'][] = array(
						'question_matrix_multiple' => $question[$i]['q_question'],
						'answer_matrix_multiple' => $answer[$i]['a_answer'],
						'ranking_matrix_multiple' => $answer[$i]['a_ranking'],
						'other_matrix_multiple' => $question[$i]['q_other'],
						'check_matrix_multiple' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "matrix_multiple"
					);
				}
				if($question[$i]['q_type']=="single_textbox")
				{
					@$_SESSION['qa_all'][] = array(
						'question_single_textbox' => $question[$i]['q_question'],
						'other_single_textbox' => $question[$i]['q_other'],
						'check_single_textbox' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "single_textbox"
					);
				}
				if($question[$i]['q_type']=="mulitple_textbox")
				{
					@$_SESSION['qa_all'][] = array(
						'question_mulitple_textbox' => $question[$i]['q_question'],
						'answer_mulitple_textbox' => $answer[$i]['a_answer'],
						'other_mulitple_textbox' => $question[$i]['q_other'],
						'check_mulitple_textbox' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "mulitple_textbox"
					);
				}
				if($question[$i]['q_type']=="date_time")
				{
					@$_SESSION['qa_all'][] = array(
						'question_date_time' => $question[$i]['q_question'],
						'answer_date_time' => $answer[$i]['a_answer'],
						'other_date_time' => $question[$i]['q_other'],
						'check_date_time' => $question[$i]['q_check'],
						'number' => $question[$i]['q_number'],
						'type' => "date_time"
					);
				}
			}
			$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
			$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
			$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
			$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
			$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"Windows");
			$macintosh  = stripos($_SERVER['HTTP_USER_AGENT'],"macintosh");
			if($iPod || $iPhone || $iPad || $Android){
				redirect('survey/form_survey/#index','refresh');
			}else{
				redirect('survey/form_survey/','refresh');
			}

		}
	}
	public function keep_survey_db()
	{
		@session_start();
		$all_session = $this->session->all_userdata();
		$ipAddress = $all_session['session_id'];
		$qh_id = $this->input->post('qh_id');

		$t = microtime(true);
		$micro = sprintf("%06d",($t - floor($t)) * 1000000);
		$d = new DateTime(date('Y-m-d H:i:s.'.$micro,$t));
		$date_now = $d->format('YmdHisu');
		
		if(@$all_session['login']['user_type']==3){
			$check_ip = 0;
		}else{
			$arr_id = $this->survey_model->check_ip($qh_id,$ipAddress);
			$check_ip = count($arr_id);
		}
		//if($check_ip == 0){
		$subject_value = array(
			'qh_id' => $this->input->post('qh_id'),
			'sv_date' => date('Y-m-d'),
			'sv_time' => date('H:i:s'),
			'user_id' => @$all_session['login']['user_id'],
			'ip_mac' => $ipAddress,
			'sv_map' => $date_now,
			'sv_province' => $this->input->post('7') // 7=ชื่อnameของช่องจังหวัดในหน้าform_survey			
		);
		$this->survey_model->insert_subject_value($subject_value);
		for($i=1;$i<8;$i++)
		{
				$general_value = array(
				'qh_id' => $this->input->post('qh_id'),
				'gv_category' => $i,
				'gv_value' => $this->input->post($i),
				'gv_data' => @$this->input->post('8'),
				'gv_area' => @$this->input->post('9'),
				'gv_map' => $date_now,
			);
			$this->survey_model->insert_general_value($general_value);
		}

		for($i=0;$i<count(@$_SESSION['temp_all']);$i++)
		{
			if(@$_POST['mulitiple_only_type'][$i]=='mulitiple_only')
			{
				
				$input = array(
					'qh_id' => $this->input->post('qh_id'),
					'v_number' => @$_POST['mulitiple_only_number'][$i],
					'ans_number' => "",
					'value' => @$_POST['mulitiple_only_value'][$i].@$_POST['open_mulitiple_only'],
					'ans_map' => $date_now,
					'type' => 'mulitiple_only'
				);
				$this->survey_model->keep_temp_survey_db($input);			
			}
			if(@$_POST['mulitiple_multiple_type'][$i]=='mulitiple_multiple')
			{
				$mulitiple_multiple_count = @$_POST['mulitiple_multiple_count'][$i];
				for($m=0;$m<$mulitiple_multiple_count;$m++)
				{
					$no = $m+1;
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['mulitiple_multiple_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['mulitiple_multiple_value'][$i][$no],
						'ans_map' => $date_now,
						'type' => 'mulitiple_multiple'
					);
					//$this->survey_model->keep_temp_survey_db($input);

				}
					
			}
			if(@$_POST['comment_type'][$i]=='comment')
			{
				$input = array(
					'qh_id' => $this->input->post('qh_id'),
					'v_number' => @$_POST['comment_number'][$i],
					'ans_number' => "",
					'value' => @$_POST['comment_value'][$i],
					'ans_map' => $date_now,
					'type' => 'comment'
				);
				$this->survey_model->keep_temp_survey_db($input);	
			}
			if(@$_POST['ranking_type'][$i]=='ranking')
			{
				
				$ranking_count = @$_POST['ranking_count'][$i];
				for($m=0;$m<$ranking_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['ranking_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['ranking_value'.$m.''],
						'ans_map' => $date_now,
						'type' => 'ranking'
					);
					$this->survey_model->keep_temp_survey_db($input);	
				}
					
			}
			if(@$_POST['ranking_scale_type'][$i]=='ranking_scale')
			{
				
				$ranking_scale_count = @$_POST['ranking_scale_count'][$i];
				for($m=0;$m<$ranking_scale_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['ranking_scale_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['ranking_scale_value'][$i][$m],
						'ans_map' => $date_now,
						'type' => 'ranking_scale'
					);
					$this->survey_model->keep_temp_survey_db($input);	
				}				
			}
			if(@$_POST['matrix_only_type'][$i]=='matrix_only')
			{
				
				$matrix_only_count = @$_POST['matrix_only_count'][$i];
				for($m=0;$m<$matrix_only_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['matrix_only_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['matrix_only_value'][$i][$m],
						'ans_map' => $date_now,
						'type' => 'matrix_only'
					);
					$this->survey_model->keep_temp_survey_db($input);	
				}				
			}
			if(@$_POST['matrix_multiple_type'][$i]=='matrix_multiple')
			{
				$all_row = $_POST['all_row'][$i];
				$all_column = $_POST['all_column'][$i];

				for($n=1;$n<$all_row+1;$n++)
				{
					for($m=0;$m<$all_column;$m++)
					{
						$input = array(
							'qh_id' => $this->input->post('qh_id'),
							'v_number' => @$_POST['matrix_multiple_number'][$i],
							'mt_number' => $m+1,
							'ans_number' => $n,
							'value' => @$_POST['matrix_multiple_value'][$i][$n][$m],
							'ans_map' => $date_now,
							'type' => 'matrix_multiple'
						);
						$this->survey_model->keep_temp_survey_db($input);					
					}					
				}
				/*for($m=0;$m<$all_row;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['matrix_multiple_number'][$i],
						'mt_number' => @$_POST['matrix_multiple_mt'.$m.''],
						'ans_number' => $m+1,
						'value' => @$_POST['matrix_multiple_value'.$m.''],
						'ans_map' => $date_now,
						'type' => 'matrix_multiple'
					);
					$this->survey_model->keep_temp_survey_db($input);	
				}*/			
			}
			if(@$_POST['single_textbox_type'][$i]=='single_textbox')
			{
				$input = array(
					'qh_id' => $this->input->post('qh_id'),
					'v_number' => @$_POST['single_textbox_number'][$i],
					'ans_number' => "",
					'value' => @$_POST['single_textbox_value'][$i],
					'ans_map' => $date_now,
					'type' => 'single_textbox'
				);
				$this->survey_model->keep_temp_survey_db($input);	
			}
			if(@$_POST['mulitple_textbox_type'][$i]=='mulitple_textbox')
			{
				
				$mulitple_textbox_count = @$_POST['mulitple_textbox_count'][$i];
				for($m=0;$m<$mulitple_textbox_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['mulitple_textbox_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['mulitple_textbox_value'.$m.''],
						'ans_map' => $date_now,
						'type' => 'mulitple_textbox'
					);
					$this->survey_model->keep_temp_survey_db($input);	
				}				
			}
			if(@$_POST['date_time_type'][$i]=='date_time')
			{
				
				$date_time_count = @$_POST['date_time_count'][$i];
				for($m=0;$m<$date_time_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['date_time_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['date_value'.$m.'']." ".@$_POST['time_value'.$m.''],
						'ans_map' => $date_now,
						'type' => 'date_time'
					);
					$this->survey_model->keep_temp_survey_db($input);	
				}				
			}
		}

		for($i=0;$i<count(@$_SESSION['qa_all']);$i++)
		{
			if(@$_POST['mulitiple_only_type'][$i]=='mulitiple_only')
			{
				if(@$_POST['mulitiple_only_value'][$i]==""){
					@$value = 0;
				}else{
					@$value = @$_POST['mulitiple_only_value'][$i];
				}

				$input = array(
					'qh_id' => $this->input->post('qh_id'),
					'v_number' => @$_POST['mulitiple_only_number'][$i],
					'ans_number' => "",
					'value' => @$value,
					'value_open' => @$_POST['open_mulitiple_only'][$i],
					'ans_map' => $date_now,
					'type' => 'mulitiple_only'
				);
				
				$this->survey_model->keep_survey_db($input);			
			}
			if(@$_POST['mulitiple_multiple_type'][$i]=='mulitiple_multiple')
			{
				$mulitiple_multiple_count = @$_POST['mulitiple_multiple_count'][$i];
				for($m=0;$m<$mulitiple_multiple_count;$m++)
				{
					$no = $m+1;
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['mulitiple_multiple_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['mulitiple_multiple_value'][$i][$no],
						'value_open' => @$_POST['open_mulitiple_multiple'][$i],
						'ans_map' => $date_now,
						'type' => 'mulitiple_multiple'
					);	
					
				$this->survey_model->keep_survey_db($input);	
				}
					
			}
			if(@$_POST['comment_type'][$i]=='comment')
			{
				$input = array(
					'qh_id' => $this->input->post('qh_id'),
					'v_number' => @$_POST['comment_number'][$i],
					'ans_number' => "",
					'value' => @$_POST['comment_value'][$i],
					'ans_map' => $date_now,
					'type' => 'comment'
				);
				
				$this->survey_model->keep_survey_db($input);	
			}
			if(@$_POST['ranking_type'][$i]=='ranking')
			{
				
				$ranking_count = @$_POST['ranking_count'][$i];
				for($m=0;$m<$ranking_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['ranking_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['ranking_value'.$m.''],
						'ans_map' => $date_now,
						'type' => 'ranking'
					);
					
				$this->survey_model->keep_survey_db($input);	
				}
					
			}
			if(@$_POST['ranking_scale_type'][$i]=='ranking_scale')
			{
				
				$ranking_scale_count = @$_POST['ranking_scale_count'][$i];
				for($m=0;$m<$ranking_scale_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['ranking_scale_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['ranking_scale_value'][$i][$m],
						'ans_map' => $date_now,
						'type' => 'ranking_scale'
					);
					
				$this->survey_model->keep_survey_db($input);	
				}				
			}
			if(@$_POST['matrix_only_type'][$i]=='matrix_only')
			{
				
				$matrix_only_count = @$_POST['matrix_only_count'][$i];
				for($m=0;$m<$matrix_only_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['matrix_only_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['matrix_only_value'][$i][$m],
						'ans_map' => $date_now,
						'type' => 'matrix_only'
					);
					
				$this->survey_model->keep_survey_db($input);	
				}				
			}
			if(@$_POST['matrix_multiple_type'][$i]=='matrix_multiple')
			{
				$all_row = $_POST['all_row'][$i];
				$all_column = $_POST['all_column'][$i];

				for($n=1;$n<$all_row+1;$n++)
				{
					for($m=0;$m<$all_column;$m++)
					{
						$input = array(
							'qh_id' => $this->input->post('qh_id'),
							'v_number' => @$_POST['matrix_multiple_number'][$i],
							'mt_number' => $m+1,
							'ans_number' => $n,
							'value' => @$_POST['matrix_multiple_value'][$i][$n][$m],
							'ans_map' => $date_now,
							'type' => 'matrix_multiple'
						);
						
				$this->survey_model->keep_survey_db($input);					
					}					
				}
				/*for($m=0;$m<$all_row;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['matrix_multiple_number'][$i],
						'mt_number' => @$_POST['matrix_multiple_mt'.$m.''],
						'ans_number' => $m+1,
						'value' => @$_POST['matrix_multiple_value'.$m.''],
						'ans_map' => $date_now,
						'type' => 'matrix_multiple'
					);
					$this->survey_model->keep_survey_db($input);	
				}*/			
			}
			if(@$_POST['single_textbox_type'][$i]=='single_textbox')
			{
				$input = array(
					'qh_id' => $this->input->post('qh_id'),
					'v_number' => @$_POST['single_textbox_number'][$i],
					'ans_number' => "",
					'value' => @$_POST['single_textbox_value'][$i],
					'ans_map' => $date_now,
					'type' => 'single_textbox'
				);
				
				$this->survey_model->keep_survey_db($input);	
			}
			if(@$_POST['mulitple_textbox_type'][$i]=='mulitple_textbox')
			{
				
				$mulitple_textbox_count = @$_POST['mulitple_textbox_count'][$i];
				for($m=0;$m<$mulitple_textbox_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['mulitple_textbox_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['mulitple_textbox_value'.$m.''],
						'ans_map' => $date_now,
						'type' => 'mulitple_textbox'
					);
					
				$this->survey_model->keep_survey_db($input);	
				}				
			}
			if(@$_POST['date_time_type'][$i]=='date_time')
			{
				
				$date_time_count = @$_POST['date_time_count'][$i];
				for($m=0;$m<$date_time_count;$m++)
				{
					$input = array(
						'qh_id' => $this->input->post('qh_id'),
						'v_number' => @$_POST['date_time_number'][$i],
						'ans_number' => $m+1,
						'value' => @$_POST['date_value'.$m.'']." ".@$_POST['time_value'.$m.''],
						'ans_map' => $date_now,
						'type' => 'date_time'
					);
					
				$this->survey_model->keep_survey_db($input);	
				}				
			}
		}
		
		redirect('report/show_graph/'.$qh_id.'');  

		//}else{
			//echo "<p><div align='center'><strong style='color:green;'>คุณได้ทำการสำรวจเสร็จแล้วในหัวข้อนี้</strong></div></p>";
			//echo "<meta http-equiv='refresh' content='3;URL=".base_url()."index.php/home/index'>";
		//}

		
	}
	public function ans_value()
	{
		@session_start();
		$qh_id = $this->uri->segment(3);
		$sv_map = $this->uri->segment(4);
		$question_subject = $this->survey_model->select_question_subject($qh_id);
		$question_general = $this->survey_model->select_question_general($qh_id);
		$question_temp_survey = $this->survey_model->select_temp_survey_question($qh_id);
		$question = $this->survey_model->select_question($qh_id);
		$answer_temp_survey = $this->survey_model->select_temp_survey_answer($qh_id);
		$answer = $this->survey_model->select_answer($qh_id);
		#################### session subject ####################
		$input['heading'] = array(
				'title' => $question_subject[0]['qh_title'],
				'category' => $question_subject[0]['qh_category'],
				'detail' => $question_subject[0]['qh_detail']
		);
		$this->session->set_userdata($input);

		$input['question_subject'] = array(
			'qh_id' => $question_subject[0]['qh_id'],
			'qh_startdate' => $question_subject[0]['qh_startdate'],
			'qh_enddate' => $question_subject[0]['qh_enddate'],
			'qh_type' => $question_subject[0]['qh_type'],
			'qh_ip' => $question_subject[0]['qh_ip'],
			'qh_url' => $question_subject[0]['qh_url']
		);
		$this->session->set_userdata($input);
		#################### session subject ####################
		#################### session general ####################
		for($i=0;$i<count($question_general);$i++)
		{		
			$qg_category[] = $question_general[$i]['qg_category'];	
		}
		@$_SESSION['data_respondent'] = $qg_category;
		#################### session general ####################
		for($i=0;$i<count($question_temp_survey);$i++)
		{
			if($question_temp_survey[$i]['q_type']=="mulitiple_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_only' => $question_temp_survey[$i]['q_question'],
					'answer_mulitiple_only' => $answer_temp_survey[$i]['a_answer'],
					'other_mulitiple_only' => $question_temp_survey[$i]['q_other'],
					'check_mulitiple_only' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "mulitiple_only"
				);
			}
			if($question_temp_survey[$i]['q_type']=="mulitiple_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitiple_multiple' => $question_temp_survey[$i]['q_question'],
					'answer_mulitiple_multiple' => $answer_temp_survey[$i]['a_answer'],
					'other_mulitiple_multiple' => $question_temp_survey[$i]['q_other'],
					'check_mulitiple_multiple' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "mulitiple_multiple"
				);
			}
			if($question_temp_survey[$i]['q_type']=="comment")
			{
				@$_SESSION['temp_all'][] = array(
					'comment' => $question_temp_survey[$i]['q_question'],
					'check_comment' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "comment"
				);
			}
			if($question_temp_survey[$i]['q_type']=="ranking")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking' => $question_temp_survey[$i]['q_question'],
					'answer_ranking' => $answer_temp_survey[$i]['a_answer'],
					'other_ranking' => $question_temp_survey[$i]['q_other'],
					'check_ranking' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "ranking"
				);
			}
			if($question_temp_survey[$i]['q_type']=="ranking_scale")
			{
				@$_SESSION['temp_all'][] = array(
					'question_ranking_scale' => $question_temp_survey[$i]['q_question'],
					'answer_ranking_scale' => $answer_temp_survey[$i]['a_answer'],
					'ranking_scale' => $answer_temp_survey[$i]['a_scale'],
					'ranking_scale_weight' => $answer_temp_survey[$i]['a_weight'],
					'other_ranking_scale' => $question_temp_survey[$i]['q_other'],
					'check_ranking_scale' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "ranking_scale"
				);
			}
			if($question_temp_survey[$i]['q_type']=="matrix_only")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_only' => $question_temp_survey[$i]['q_question'],
					'answer_matrix_only' => $answer_temp_survey[$i]['a_answer'],
					'ranking_matrix_only' => $answer_temp_survey[$i]['a_ranking'],
					'other_matrix_only' => $question_temp_survey[$i]['q_other'],
					'check_matrix_only' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "matrix_only"
				);
			}
			if($question_temp_survey[$i]['q_type']=="matrix_multiple")
			{
				@$_SESSION['temp_all'][] = array(
					'question_matrix_multiple' => $question_temp_survey[$i]['q_question'],
					'answer_matrix_multiple' => $answer_temp_survey[$i]['a_answer'],
					'ranking_matrix_multiple' => $answer_temp_survey[$i]['a_ranking'],
					'other_matrix_multiple' => $question_temp_survey[$i]['q_other'],
					'check_matrix_multiple' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "matrix_multiple"
				);
			}
			if($question_temp_survey[$i]['q_type']=="single_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_single_textbox' => $question_temp_survey[$i]['q_question'],
					'other_single_textbox' => $question_temp_survey[$i]['q_other'],
					'check_single_textbox' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "single_textbox"
				);
			}
			if($question_temp_survey[$i]['q_type']=="mulitple_textbox")
			{
				@$_SESSION['temp_all'][] = array(
					'question_mulitple_textbox' => $question_temp_survey[$i]['q_question'],
					'answer_mulitple_textbox' => $answer_temp_survey[$i]['a_answer'],
					'other_mulitple_textbox' => $question_temp_survey[$i]['q_other'],
					'check_mulitple_textbox' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "mulitple_textbox"
				);
			}
			if($question_temp_survey[$i]['q_type']=="date_time")
			{
				@$_SESSION['temp_all'][] = array(
					'question_date_time' => $question_temp_survey[$i]['q_question'],
					'answer_date_time' => $answer_temp_survey[$i]['a_answer'],
					'other_date_time' => $question_temp_survey[$i]['q_other'],
					'check_date_time' => $question_temp_survey[$i]['q_check'],
					'number' => $question_temp_survey[$i]['q_number'],
					'type' => "date_time"
				);
			}
		}
		
		for($i=0;$i<count($question);$i++)
		{
			if($question[$i]['q_type']=="mulitiple_only")
			{
				@$_SESSION['qa_all'][] = array(
					'question_mulitiple_only' => $question[$i]['q_question'],
					'answer_mulitiple_only' => $answer[$i]['a_answer'],
					'other_mulitiple_only' => $question[$i]['q_other'],
					'check_mulitiple_only' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "mulitiple_only"
				);
			}
			if($question[$i]['q_type']=="mulitiple_multiple")
			{
				@$_SESSION['qa_all'][] = array(
					'question_mulitiple_multiple' => $question[$i]['q_question'],
					'answer_mulitiple_multiple' => $answer[$i]['a_answer'],
					'other_mulitiple_multiple' => $question[$i]['q_other'],
					'check_mulitiple_multiple' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "mulitiple_multiple"
				);
			}
			if($question[$i]['q_type']=="comment")
			{
				@$_SESSION['qa_all'][] = array(
					'comment' => $question[$i]['q_question'],
					'check_comment' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "comment"
				);
			}
			if($question[$i]['q_type']=="ranking")
			{
				@$_SESSION['qa_all'][] = array(
					'question_ranking' => $question[$i]['q_question'],
					'answer_ranking' => $answer[$i]['a_answer'],
					'other_ranking' => $question[$i]['q_other'],
					'check_ranking' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "ranking"
				);
			}
			if($question[$i]['q_type']=="ranking_scale")
			{
				@$_SESSION['qa_all'][] = array(
					'question_ranking_scale' => $question[$i]['q_question'],
					'answer_ranking_scale' => $answer[$i]['a_answer'],
					'ranking_scale' => $answer[$i]['a_scale'],
					'ranking_scale_weight' => $answer[$i]['a_weight'],
					'other_ranking_scale' => $question[$i]['q_other'],
					'check_ranking_scale' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "ranking_scale"
				);
			}
			if($question[$i]['q_type']=="matrix_only")
			{
				@$_SESSION['qa_all'][] = array(
					'question_matrix_only' => $question[$i]['q_question'],
					'answer_matrix_only' => $answer[$i]['a_answer'],
					'ranking_matrix_only' => $answer[$i]['a_ranking'],
					'other_matrix_only' => $question[$i]['q_other'],
					'check_matrix_only' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "matrix_only"
				);
			}
			if($question[$i]['q_type']=="matrix_multiple")
			{
				@$_SESSION['qa_all'][] = array(
					'question_matrix_multiple' => $question[$i]['q_question'],
					'answer_matrix_multiple' => $answer[$i]['a_answer'],
					'ranking_matrix_multiple' => $answer[$i]['a_ranking'],
					'other_matrix_multiple' => $question[$i]['q_other'],
					'check_matrix_multiple' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "matrix_multiple"
				);
			}
			if($question[$i]['q_type']=="single_textbox")
			{
				@$_SESSION['qa_all'][] = array(
					'question_single_textbox' => $question[$i]['q_question'],
					'other_single_textbox' => $question[$i]['q_other'],
					'check_single_textbox' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "single_textbox"
				);
			}
			if($question[$i]['q_type']=="mulitple_textbox")
			{
				@$_SESSION['qa_all'][] = array(
					'question_mulitple_textbox' => $question[$i]['q_question'],
					'answer_mulitple_textbox' => $answer[$i]['a_answer'],
					'other_mulitple_textbox' => $question[$i]['q_other'],
					'check_mulitple_textbox' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "mulitple_textbox"
				);
			}
			if($question[$i]['q_type']=="date_time")
			{
				@$_SESSION['qa_all'][] = array(
					'question_date_time' => $question[$i]['q_question'],
					'answer_date_time' => $answer[$i]['a_answer'],
					'other_date_time' => $question[$i]['q_other'],
					'check_date_time' => $question[$i]['q_check'],
					'number' => $question[$i]['q_number'],
					'type' => "date_time"
				);
			}
		}
		redirect('survey/value_survey/'.$qh_id.'/'.$sv_map.'','refresh');
	}
	public function delete_ans_value()
	{
		$qh_id = $this->uri->segment(3);
		$map = $this->uri->segment(4);

		$this->survey_model->delete_subject_value($qh_id,$map);
		$this->survey_model->delete_general_value($qh_id,$map);
		$this->survey_model->delete_ans_value($qh_id,$map);

		redirect('survey/list_detail/'.$qh_id.'');
	}
	///////////////////////////////////////////////////////////////////////////////////////////////
	//========================================= Categories ======================================//
	///////////////////////////////////////////////////////////////////////////////////////////////
  	public function survey_category()
    {
        $this->load->model('survey_category');
        $data['survey_category'] = $this->survey_model->survey_category(); 
    }
    public function select_keep()
    {
    	$post_value = array(
    		'user_id' => $this->input->post('user_id')
    	);
    	$this->session->set_userdata($post_value);
    	redirect('survey/select_keep/close');
    }
}

