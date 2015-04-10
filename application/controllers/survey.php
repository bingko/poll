<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class survey extends CI_Controller {

	public function index()
	{
		@session_start();
		@session_destroy();
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		$this->session->unset_userdata('question_subject');//ลบ session ของ heading
		$this->session->unset_userdata('user_id');//ลบ session ของ heading
		
		$data['survey_category'] = $this->survey_model->survey_category();//ประเภทของแบบสอบถาม
		$data['survey_list'] = $this->survey_model->list_data_survey();//รายการแบบสำรวจทั้งหมด
		$data['question_subject'] = $this->survey_model->question_subject_old();//รายการแบบสำรวจทั้งหมด

		$this->load->view('head');
		$this->load->view('manage_survey/index',$data);
		$this->load->view('footer');
	}
	public function insert_survey()
	{
		$data['template_subject']=$this->survey_model->list_temp();
		$data['survey_category'] = $this->survey_model->survey_category();
		$data['province'] = $this->survey_model->province();
		$data['survey_category_session'] = $this->survey_model->survey_category_session();

		$this->load->view('head');
		$this->load->view('manage_survey/insert_survey',$data);
		$this->load->view('footer');
	}
	public function copy()
	{
		$data['template_subject']=$this->survey_model->list_temp();
    	$data['question_template']=$this->survey_model->list_q_temp();
    	$data['answer_template']=$this->survey_model->list_a_temp();
		$data['survey_category'] = $this->survey_model->survey_category();
		$data['province'] = $this->survey_model->province();
		$data['survey_category_session'] = $this->survey_model->survey_category_session();

		$this->load->view('head');
		$this->load->view('manage_survey/insert_survey_copy',$data);
		$this->load->view('footer');
	}
	public function update_survey()
	{
		$data['template_subject']=$this->survey_model->list_temp();
		$data['survey_category'] = $this->survey_model->survey_category();
		$data['province'] = $this->survey_model->province();
		$data['survey_category_session'] = $this->survey_model->survey_category_session();
		
		$this->load->view('head');
		$this->load->view('manage_survey/edit_survey_after',$data);
		$this->load->view('footer');
	}
	public function option_survey()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/option_survey');
		$this->load->view('footer');
	}
	public function option_survey_after()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/option_survey_after');
		$this->load->view('footer');
	}
	public function success_survey()
	{
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		@session_start();//strat session
		@session_destroy();//ลบ session ของ survey

		$this->load->view('head');
		$this->load->view('manage_survey/success_survey');
		$this->load->view('footer');
	}
	public function success_temp()
	{
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		@session_start();//strat session
		@session_destroy();//ลบ session ของ survey

		$this->load->view('head');
		$this->load->view('manage_survey/success_temp');
		$this->load->view('footer');
	}
	public function insert_survey_copy()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/insert_survey_copy');
		$this->load->view('footer');
	}
	public function form_survey()
	{
		$data['province'] = $this->survey_model->province();
		$data['amphur'] = $this->survey_model->amphur_all();
		$this->load->view('survey/form_survey',$data);
	}
	public function insert_template()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/insert_template');
		$this->load->view('footer');
	}
	public function update_template()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/update_template');
		$this->load->view('footer');
	}
	public function update_temp_insert_form()
	{
		$this->load->view('head');
		$this->load->view('manage_survey/update_temp_insert_form');
		$this->load->view('footer');
	}
	public function list_detail()
	{
		@session_start();
		@session_destroy();
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		$this->session->unset_userdata('question_subject');//ลบ session ของ heading

		$qh_id = $this->uri->segment(3);
		$qh_type = $this->uri->segment(4);

		if($qh_type==0){
			$data['subject_value'] = $this->survey_model->list_subject_value_follow($qh_id);
		}else{
			$data['subject_value'] = $this->survey_model->list_subject_value($qh_id);
		}

		$this->load->view('head');
		$this->load->view('survey/list_detail',$data);
		$this->load->view('footer');
	}
	public function list_detail_keep()
	{
		@session_start();
		@session_destroy();
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		$this->session->unset_userdata('question_subject');//ลบ session ของ heading


		$qh_id = $this->uri->segment(3);
		$data['keep'] = $this->user_model->keep();
		$data['subject_value'] = $this->survey_model->list_subject_value_follow($qh_id);


		$this->load->view('head');
		$this->load->view('survey/list_detail_keep',$data);
		$this->load->view('footer');
	}
	public function value_survey()
	{
		$data['province'] = $this->survey_model->province();
		$data['amphur'] = $this->survey_model->amphur();
		$qh_id = $this->uri->segment(3);
		$gv_map = $this->uri->segment(4);
		$data['subject_value'] = $this->survey_model->list_subject_value($qh_id,$gv_map);
		$data['value_survey'] = $this->survey_model->value_survey($qh_id,$gv_map);
		$this->load->view('survey/value_survey',$data);
	}
	public function test()
	{
		$this->load->view('test');
	}
	public function process_test()
	{
		$all_row = $_POST['all_row'];
		$all_column = $_POST['all_column'];

		for($i=1;$i<$all_column+1;$i++)
		{
			for($m=0;$m<$all_row;$m++)
			{
				echo "[$i][$m]==>".@$_POST['qa'][$i][$m];		
			}
			echo "<br>";			
		}
	}
	public function select_keep()
	{
		$all_session = $this->session->all_userdata();
		$qh_id = @$all_session['question_subject']['qh_id'];
		$data['keep_value'] = $this->survey_model->keep_value($qh_id);

		$data['keep'] = $this->user_model->list_data_user();

		$this->load->view('manage_survey/select_keep',$data);
	}
	public function create_template()
	{
		$data['template_subject']=$this->survey_model->list_temp();

		@session_start();
		@session_destroy();
		$this->load->view('head');
		$this->load->view('manage_survey/create_template',$data);
		$this->load->view('footer');
	}
	public function select_temp()
	{
		$data['template_subject']=$this->survey_model->list_temp();
		$this->load->view('manage_survey/select_temp',$data);
	}
	public function convert()
	{
		$qh_id = $this->uri->segment(3);
		$poll_open = $this->survey_model->poll_open($qh_id);
		if($poll_open[0]['poll_open']==0){
			$data = array(
				'qh_id' => $qh_id,
				'poll_open' => 1
			);
			$this->survey_model->convert_poll_open($data);
		}else{
			$data = array(
				'qh_id' => $qh_id,
				'poll_open' => 0
			);
			$this->survey_model->convert_poll_open($data);
		}
		redirect('home/index','refresh');
	}
	public function upload()
	{
		$qh_id = $this->uri->segment(3);
		$data['survey'] = $this->survey_model->select_question_subject($qh_id);

		$this->load->view('head');
		$this->load->view('survey/upload_file',$data);
		$this->load->view('footer');
	}
	public function upload_file()
	{
		$file = $_FILES["qh_file"]["tmp_name"];
		$name_file = date('YmdHis');
		$sername_file = substr($_FILES["qh_file"]["name"],-4);
		$file_new = $name_file.$sername_file;
		copy($_FILES["qh_file"]["tmp_name"],"pdf/".$file_new);

		$inpost = array(
			'qh_id' => $this->input->post('qh_id'),
			'qh_file' => $file_new
		);
		$this->survey_model->upload_file($inpost);
		redirect('home/index','refresh');	
	}
	public function file_delete()
	{
		$qh_id = $this->uri->segment(3);
		$inpost = array(
			'qh_id' => $qh_id,
			'qh_file' => ''
		);
		$this->survey_model->upload_file($inpost);
		redirect('survey/upload/'.$qh_id);
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */