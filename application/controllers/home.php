<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {


	public function index()
	{
		$data['survey_category'] = $this->survey_model->survey_category();//ประเภทของแบบสอบถาม
		$data['survey_list'] = $this->survey_model->list_data_survey();//รายการแบบสำรวจทั้งหมด
		$data['question_subject'] = $this->survey_model->question_subject_old();//รายการแบบสำรวจทั้งหมด''
		
		$yesterday = date("Y-m-d", time()+86400);
		$tomorrow = date("Y-m-d", time()-86400);

		for($i=0;$i<count($data['survey_list']);$i++){
			if($data['survey_list'][$i]['qh_startdate']!="0000-00-00"){
					if ($data['survey_list'][$i]['qh_startdate']>=$yesterday) {
						$data['survey_list'][$i]['qh_type']="2";
				}
			}
			if($data['survey_list'][$i]['qh_enddate']!="0000-00-00"){
				if ($data['survey_list'][$i]['qh_enddate']<=$tomorrow) {
					$data['survey_list'][$i]['qh_type']="2";
				}
			}
		}

		$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
		$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
		$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
		$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"Windows");
		$macintosh  = stripos($_SERVER['HTTP_USER_AGENT'],"macintosh");

		if( $iPod || $iPhone ){
		    //$this->login_mobile();
		    $all_session = $this->session->all_userdata();//strat session
			$this->session->unset_userdata('heading');//ลบ session ของ heading
			$this->session->unset_userdata('question_subject');//ลบ session ของ heading
			
			$this->load->view('head');
			$this->load->view('home/index',$data);
			$this->load->view('footer');
		}else if($iPad){
		    //$this->login_mobile();
		    $all_session = $this->session->all_userdata();//strat session
			$this->session->unset_userdata('heading');//ลบ session ของ heading
			$this->session->unset_userdata('question_subject');//ลบ session ของ heading
			
			$this->load->view('head');
			$this->load->view('home/index',$data);
			$this->load->view('footer');
		}else if($Android){
		    //$this->login_mobile();
		    $all_session = $this->session->all_userdata();//strat session
			$this->session->unset_userdata('heading');//ลบ session ของ heading
			$this->session->unset_userdata('question_subject');//ลบ session ของ heading
			
			$this->load->view('head');
			$this->load->view('home/index',$data);
			$this->load->view('footer');
		}else if($webOS){
			@session_start();
			@session_destroy();
			$all_session = $this->session->all_userdata();//strat session
			$this->session->unset_userdata('heading');//ลบ session ของ heading
			$this->session->unset_userdata('question_subject');//ลบ session ของ heading

			$this->load->view('head');
			$this->load->view('home/index',$data);
			$this->load->view('footer');
		}else if($macintosh){
			@session_start();
			@session_destroy();
			$all_session = $this->session->all_userdata();//strat session
			$this->session->unset_userdata('heading');//ลบ session ของ heading
			$this->session->unset_userdata('question_subject');//ลบ session ของ heading

			$this->load->view('head');
			$this->load->view('home/index',$data);
			$this->load->view('footer');
		}
	}
	public function list_survey()
	{
		@session_start();
		@session_destroy();
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		$this->session->unset_userdata('question_subject');//ลบ session ของ heading
		
		$data['survey_category'] = $this->survey_model->survey_category();//ประเภทของแบบสอบถาม
		$data['survey_list'] = $this->survey_model->list_data_survey();//รายการแบบสำรวจทั้งหมด
		$data['question_subject'] = $this->survey_model->question_subject_old();//รายการแบบสำรวจทั้งหมด

		$this->load->view('head');
		$this->load->view('home/list_open_survey',$data);
		$this->load->view('footer');
	}
	public function list_poll()
	{
		@session_start();
		@session_destroy();
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		$this->session->unset_userdata('question_subject');//ลบ session ของ heading
		
		$data['survey_category'] = $this->survey_model->survey_category();//ประเภทของแบบสอบถาม
		$data['survey_list'] = $this->survey_model->list_data_poll();//รายการแบบสำรวจทั้งหมด
		$data['question_subject'] = $this->survey_model->question_subject_old();//รายการแบบสำรวจทั้งหมด''

		$this->load->view('head');
		$this->load->view('home/list_open_poll',$data);
		$this->load->view('footer');
	}
	public function login_mobile()
	{	
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		if($all_session['login']['user_id']!=""){
			@session_start();
			@session_destroy();
			$all_session = $this->session->all_userdata();//strat session
			$this->session->unset_userdata('heading');//ลบ session ของ heading
			$this->session->unset_userdata('question_subject');//ลบ session ของ heading

			$data['survey_category'] = $this->survey_model->survey_category();//ประเภทของแบบสอบถาม
			$data['survey_list'] = $this->survey_model->list_data_survey();//รายการแบบสำรวจทั้งหมด
			$this->load->view('survey/mobile_survey',$data);
		}else{
			$this->load->view('login_mobile');
		}	
	}

}

