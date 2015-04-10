<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class respondent extends CI_Controller {

	public function select_data()
		{

			$data['selectdata']=$this->respondent_model->queryselect();
			
						## Return Value ##
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($data).')'; 
			print_r($_GET['callback'].$json);	
			//$this->load->view('manage_user/search_user',$data);


		}

	public function update_data()
		{

			$data_value=$this->uri->segment(3); 
			$data['selectdata']=$this->respondent_model->update_data($data_value);
			$this->load->view('home',$data);

		}
	public function data_insert()
		{
		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name)
		{
			$list_data = array(
				'sex' => $name->sex,
				'birthyear' => $name->birthyear,
				'address' => $name->address,
				'zone' => $name->zone,
				'province' => $name->province,
				'amphor' => $name->amphor,
				'tambon' => $name->tambon,
				'phone' => $name->phone,
				'mail' => $name->mail,
				'edu_bg' => $name->edu_bg,
				'job' => $name->job,
				
				'registry' => $name->registry
			);
			$return = $this->respondent_model->data_insert($list_data);
		}
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_data).')'; 
		print_r($_GET['callback'].$json);
		}
	public function data_update()
		{
			$data = $_GET['models'];
			$arr = json_decode($data);

			foreach($arr as $name)
			{
				$list_data = array(
					'res_id'=> $name->res_id,
					'birthyear' => $name->birthyear,
					'age' => $name->age,
					'address' => $name->address,
					'zone' => $name->zone,
					'province' => $name->province,
					'amphor' => $name->amphor,
					'tambon' => $name->tambon,
					'phone' => $name->phone,
					'mail' => $name->mail,
					'edu_bg' => $name->edu_bg,
					'job' => $name->job,
					'salary' => $name->salary,
					'registry' => $name->registry
				);
						//echo "<pre>";
						//print_r($product_2digits);
				$this->respondent_model->data_update($list_data);
			}
			## Return Value ##
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($arr).')'; 
			print_r($_GET['callback'].$json);
			
		}
		public function data_delete()
		{
			$data = $_GET['models'];
			$arr = json_decode($data);
			foreach($arr as $name)
			{
				$list_data = array(
					'res_id'=> $name->res_id,
					'birthyear' => $name->birthyear,
					'age' => $name->age,
					'address' => $name->address,
					'zone' => $name->zone,
					'province' => $name->province,
					'amphor' => $name->amphor,
					'tambon' => $name->tambon,
					'phone' => $name->phone,
					'mail' => $name->mail,
					'edu_bg' => $name->edu_bg,
					'job' => $name->job,
					'salary' => $name->salary,
					'registry' => $name->registry
				);
				$this->respondent_model->data_delete($list_data);
			}
			## Return Value ##
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($list_data).')'; 
			print_r($_GET['callback'].$json);
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */