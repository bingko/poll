<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class respondent extends CI_Controller {

		public function index()
		{
			$this->load->view('head');
			$this->load->view('manage_user/search_user');
			$this->load->view('footer');
		}
		public function select_data()
		{

			$data=$this->respondent_model->queryselect(); 

			for($i=0;$i<count($data);$i++){
			
			if($data[$i]['birthyear']!=""){
				$real_age = (date("Y")+543)-$data[$i]['birthyear'];
				$data[$i]['age'] = $real_age ;
				}
			else if($data[$i]['birthyear']==""){
				
				$data[$i]['age'] = " " ;
				}
			
			}
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($data).')'; 
			print_r($_GET['callback'].$json);
		
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
				'age' => $name->age,
				'address' => $name->address,
				
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
					'sex' => $name->sex,
					'birthyear' => $name->birthyear,
					'age' => $name->age,
					'address' => $name->address,
					
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
					'sex' => $name->sex,
					'birthyear' => $name->birthyear,
					'age' => $name->age,
					'address' => $name->address,
					
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
		public function upload_file()
		{
			
			move_uploaded_file($_FILES["upload_file"]["tmp_name"],$_FILES["upload_file"]["name"]);
			$objCSV = fopen($_FILES["upload_file"]["name"],"r");
			
			while($objArr = fgetcsv($objCSV))
			{
				$strSQL = "INSERT INTO respondent";
				$strSQL .="(sex,birthyear,age,address,zone,province,amphor,tambon,phone,mail,edu_bg,job,salary)";
				$strSQL .="VALUES ";
				$strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$objArr[5]."','".$objArr[6]."','".$objArr[7]."','".$objArr[8]."','".$objArr[9]."','".$objArr[10]."','".$objArr[11]."','".$objArr[12]."')";	
				$objQuery = mysql_query($strSQL);
			}
			
			redirect('respondent/index');
		}
		public function export_excel()
		{
			$this->db->order_by('res_id','desc');
			$data['respondent'] = $this->respondent_model->respondent();
			$this->load->view('manage_user/export_excel',$data);
		}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */