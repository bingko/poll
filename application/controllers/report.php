<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {


	public function index()
	{
		$this->load->view('head');
		$this->load->view('report/simple_report');
		$this->load->view('footer');
	}
	public function index2()
	{
		$this->load->view('head');
		$this->load->view('report/simple_report2');
		$this->load->view('footer');
	}
	public function review()
	{
		$data['province'] = $this->survey_model->province();
		@session_start();
		$data['survey_category_session'] = $this->survey_model->survey_category_session();
		$this->load->view('report/review_survey',$data);
	}
	public function list_rawdata()
	{
		@session_start();
		@session_destroy();
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		$this->session->unset_userdata('question_subject');//ลบ session ของ heading
		$this->session->unset_userdata('user_id');//ลบ session ของ heading

		$data['survey_list'] = $this->survey_model->list_data_survey();//รายการแบบสำรวจทั้งหมด

		$this->load->view('head');
		$this->load->view('report/rawdata',$data);
		$this->load->view('footer');
	}
	public function list_rawdata_graph()
	{
		@session_start();
		@session_destroy();
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		$this->session->unset_userdata('question_subject');//ลบ session ของ heading
		$this->session->unset_userdata('user_id');//ลบ session ของ heading

		$data['survey_list'] = $this->survey_model->list_data_survey();//รายการแบบสำรวจทั้งหมด

		$this->load->view('head');
		$this->load->view('report/rawdata_graph',$data);
		$this->load->view('footer');
	}
	public function rawdata_table()
	{
		@session_start();
		@session_destroy();

		$qh_id = $this->uri->segment(3);
		$data['general_value1'] = $this->report_model->general_value1($qh_id);
		$data['general_value2'] = $this->report_model->general_value2($qh_id);
		$data['general_value3'] = $this->report_model->general_value3($qh_id);
		$data['general_value4'] = $this->report_model->general_value4($qh_id);
		$data['general_value5'] = $this->report_model->general_value5($qh_id);
		$data['general_value6'] = $this->report_model->general_value6($qh_id);
		$data['keep_count'] = $this->report_model->keep_count($qh_id);

		$this->report_session_table($qh_id);	

		$this->load->view('head');
		$this->load->view('report/rawdata_table',$data);
		$this->load->view('footer');
	}
	public function show_graph()
	{
		@session_start();
		@session_destroy();

		$qh_id = $this->uri->segment(3);
		$data['general_value1'] = $this->report_model->general_value1($qh_id);
		$data['general_value2'] = $this->report_model->general_value2($qh_id);
		$data['general_value3'] = $this->report_model->general_value3($qh_id);
		$data['general_value4'] = $this->report_model->general_value4($qh_id);
		$data['general_value5'] = $this->report_model->general_value5($qh_id);
		$data['general_value6'] = $this->report_model->general_value6($qh_id);
		$data['keep_count'] = $this->report_model->keep_count($qh_id);

		$this->report_session_table($qh_id);	

		$this->load->view('head');
		$this->load->view('report/show_graph',$data);
		$this->load->view('footer');
	}
	public function print_rawdata_table()
	{
		$qh_id = $this->uri->segment(3);

		$data['question_subject'] = $this->report_model->question_subject($qh_id);

		$data['general_value1'] = $this->report_model->general_value1($qh_id);
		$data['general_value2'] = $this->report_model->general_value2($qh_id);
		$data['general_value3'] = $this->report_model->general_value3($qh_id);
		$data['general_value4'] = $this->report_model->general_value4($qh_id);
		$data['general_value5'] = $this->report_model->general_value5($qh_id);
		$data['general_value6'] = $this->report_model->general_value6($qh_id);
		$data['keep_count'] = $this->report_model->keep_count($qh_id);

		$this->report_session_table($qh_id);	

		$this->load->view('report/print_rawdata_table',$data);
	}
	public function excel_rawdata_table()
	{
		$qh_id = $this->uri->segment(3);

		$data['question_subject'] = $this->report_model->question_subject($qh_id);
		$data['subject_value'] = $this->report_model->subject_value($qh_id);		

		$data['general_value1'] = $this->report_model->general_value1($qh_id);
		$data['general_value2'] = $this->report_model->general_value2($qh_id);
		$data['general_value3'] = $this->report_model->general_value3($qh_id);
		$data['general_value4'] = $this->report_model->general_value4($qh_id);
		$data['general_value5'] = $this->report_model->general_value5($qh_id);
		$data['general_value6'] = $this->report_model->general_value6($qh_id);
		$data['general_value7'] = $this->report_model->general_value7($qh_id);

		$data['amphur'] = $this->survey_model->amphur();

		$this->report_session_table($qh_id);	
		$this->load->view('report/excel_rawdata_table',$data);

	}
	public function new_excel()
	{

		$qh_id = $this->uri->segment(3);
		$data['question_subject'] = $this->report_model->get_excel($qh_id);
		$data['question'] = $this->report_model->get_question($qh_id);

		for($i=0;$i<count($data['question']);$i++){
			$a_answer = str_replace("\n","/",@$data['question'][$i]['a_answer']);//เปลี่ยนจาก \n เป็น /
			$answer  = @split('/',$a_answer);//ตัด array โดยหา data จาก สัญญาลักณ์ /
			if(!empty($data['question'][$i]['q_other'])){
				$data['question'][$i]['count_answer'] = count($answer)+1;
			}else{
				$data['question'][$i]['count_answer'] = count($answer);
			}
		}

		for($gv_category=1;$gv_category<=7;$gv_category++){
			$data['general_value'][$gv_category] =  $this->report_model->get_general_value($qh_id,$gv_category);
		}

		// -- คนเก็บโพล -- // 
		$subject_value = $this->report_model->get_keep_value($qh_id);
		
		$j=0;
		for($i=0;$i<count($subject_value);$i++){

				if(($i-1)<0||$subject_value[$i]['sv_map']==$subject_value[$i-1]['sv_map']){
					if($j==0){
					$data['ans_value'][$j]['general_value'][0] = $data['general_value'][1][$j];
					$data['ans_value'][$j]['general_value'][1] = $data['general_value'][2][$j];
					$data['ans_value'][$j]['general_value'][2] = $data['general_value'][3][$j];
					$data['ans_value'][$j]['general_value'][3] = $data['general_value'][4][$j];
					$data['ans_value'][$j]['general_value'][4] = $data['general_value'][5][$j];
					$data['ans_value'][$j]['general_value'][5] = $data['general_value'][6][$j];
					$data['ans_value'][$j]['general_value'][6] = $data['general_value'][7][$j];
					}
					$data['ans_value'][$j][] = $subject_value[$i];			
				}else{
					$j++;
					$data['ans_value'][$j]['general_value'][0] = $data['general_value'][1][$j];
					$data['ans_value'][$j]['general_value'][1] = $data['general_value'][2][$j];
					$data['ans_value'][$j]['general_value'][2] = $data['general_value'][3][$j];
					$data['ans_value'][$j]['general_value'][3] = $data['general_value'][4][$j];
					$data['ans_value'][$j]['general_value'][4] = $data['general_value'][5][$j];
					$data['ans_value'][$j]['general_value'][5] = $data['general_value'][6][$j];
					$data['ans_value'][$j]['general_value'][6] = $data['general_value'][7][$j];
					$data['ans_value'][$j][] = $subject_value[$i];
				}	
		}
		// -- คำถามทั่วไป 7 ข้อ -- // 
		$data['province'] = $this->report_model->province_all();

		// echo "<pre>";
		// print_r($data['question']);
		// print_r($data['ans_value']);

		// exit();
		$this->load->view('report/new_excel',$data);

	}
	public function gen_excel()
	{
		/*$file_name = $this->uri->segment(3);
		$filepath = 'excel/'.$file_name.'.xls';
		if(file_exists($filepath)){
		    redirect('home/index');
		}else{
		    $excel_load = $this->report_model->excel_load($file_name);
			if(count($excel_load)==0){
				$input_array = array(
					'qh_id' => $file_name,
					'file_name' => $file_name
				);
				$this->db->insert('excel_load',$input_array);	
				// echo "123456789";
				// echo $Vdata = file_get_contents('https://www.google.co.th/');
				//echo file_put_contents("test.txt","Hello World. Testing!");		
			}	

		
		}
		//$Vdata = @file_get_contents(base_url().'index.php/report/excel_rawdata_table/'.$file_name);
		//file_put_contents('excel/'.$file_name.'.xls', $Vdata);
		
		$url  = base_url().'index.php/report/excel_rawdata_table/'.$file_name;
		$path = 'excel/'.$file_name.'.xls';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$data = curl_exec($ch);
		curl_close($ch);
		file_put_contents($path,$data);
		echo "ประมวลผลเสร็จเรียบร้อย...";*/
		$data['segment'] = $this->uri->segment(3);
		$this->load->view('report/load_page',$data);
	}
	public function pageframe()
	{
		$this->load->view('report/pageframe');
	}
	public function excel_time()
	{
		$data = $this->report_model->excel_time();
		$time = @split('[/:]',$data[0]['excel_time_stamp']);
		echo (($time[0].$time[1])-date('Hi'));
	}
	public function load_file(){
		$this->load->view('report/load_file');
	}
	public function excel_rawdata_tablesssssssssss()
	{
		$qh_id = $this->uri->segment(3);

		$data['question_subject'] = $this->report_model->question_subject($qh_id);

		$data['general_value1'] = $this->report_model->general_value1($qh_id);
		$data['general_value2'] = $this->report_model->general_value2($qh_id);
		$data['general_value3'] = $this->report_model->general_value3($qh_id);
		$data['general_value4'] = $this->report_model->general_value4($qh_id);
		$data['general_value5'] = $this->report_model->general_value5($qh_id);
		$data['general_value6'] = $this->report_model->general_value6($qh_id);
		$data['keep_count'] = $this->report_model->keep_count($qh_id);

		$this->report_session_table($qh_id);	

		$this->load->view('report/excel_rawdata_table',$data);
	}
	public function rawdata_graph()
	{
		$qh_id = $this->uri->segment(3);
		$data['general_value1'] = $this->report_model->general_value1($qh_id);
		$data['general_value2'] = $this->report_model->general_value2($qh_id);
		$data['general_value3'] = $this->report_model->general_value3($qh_id);
		$data['general_value4'] = $this->report_model->general_value4($qh_id);
		$data['general_value5'] = $this->report_model->general_value5($qh_id);
		$data['general_value6'] = $this->report_model->general_value6($qh_id);
		$data['keep_count'] = $this->report_model->keep_count($qh_id);

		$this->report_session_table($qh_id);

		$this->load->view('head');
		$this->load->view('report/rawdata_show_graph',$data);
		$this->load->view('footer');
	}
	public function report_session_table($qh_id)
    {
    	@session_start();

		$question_subject = $this->survey_model->select_question_subject($qh_id);
		$question_general = $this->survey_model->select_question_general($qh_id);
		$question = $this->survey_model->select_question($qh_id);
		$question_temp_survey = $this->survey_model->select_temp_survey_question($qh_id);
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
}

