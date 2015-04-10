<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ci_survey extends CI_Controller {

	public function list_survey()
	{
		
/*
		foreach ($data->result_array() as $row)
			{
			   echo $row['qh_id'];
			   echo $row['qh_title'];
			   echo $row['qh_category'];
			}
			
			
		*/
			$data['selectdata']=$this->survey_model->list_survey();
			## Return Value ##
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($data).')'; 
			print_r($_GET['callback'].$json);
			
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */