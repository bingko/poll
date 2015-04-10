<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ci_manage_user extends CI_Controller {

	public function list_data_user()
	{
		$list_data_user = $this->user_model->list_data_user();
		
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_data_user).')'; 
		print_r($_GET['callback'].$json);
	}
	public function select_non_pass()
	{
		$select_non_pass = $this->user_model->select_non_pass();		
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($select_non_pass).')'; 
		print_r($_GET['callback'].$json);
	}

	public function insert_data_user()
	{
		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name)
		$name->user_status;
		$name->user_type;

		if($name->user_status==""){	
			$user_status = 1;
		}else{
			$user_status = $name->user_status;
		}
		if($name->user_type==""){	
			$user_type = 3;
		}else{
			$user_type = $name->user_type;
		}
		$input_arr = array(
			'user_title' => $name->user_title,
			'user_name' => $name->user_name,
			'user_address' => $name->user_address,
			'user_tel' => $name->user_tel,
			'user_mail' => $name->user_mail,
			'user_url' => $name->user_url,
			'user_username' => $name->user_username,
			'user_password' => md5($name->user_password),
			'user_status' => $user_status,
			'user_type' => $user_type
		);

		$list_data_user = $this->user_model->list_data_user();
		for($i=0;$i<count($list_data_user);$i++){
			if($input_arr['user_username']==@$list_data_user[$i]['user_username']){
					$this->alert_msg();
					break;
		} 
		}

		$insert_data_user = $this->user_model->insert_data_user($input_arr);

		/*Start logfile*/
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$data_user = array(
			'logfile_user_user' => $all_session['login']['user_name'],
			'logfile_user_what' => "เพิ่มผู้ใช้งาน",
			'logfile_user_form' => $input_arr['user_username'],
			'logfile_user_time' => date('H:i:s'),
			'logfile_user_date' => date('Y-m-d')
		);
		$this->user_model->logfile_user($data_user);
		/*End logfile*/

		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($input_arr).')'; 
		print_r($_GET['callback'].$json);
	}
	public function update_data_user()
	{
		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name)

		if(!isset($name->user_password)){
			$input_arr = array(
			'user_id' => $name->user_id,
			'user_title' => $name->user_title,
			'user_name' => $name->user_name,
			'user_address' => $name->user_address,
			'user_tel' => $name->user_tel,
			'user_mail' => $name->user_mail,
			'user_url' => $name->user_url,
			'user_username' => $name->user_username,
			'user_status' => $name->user_status,
			'user_type' => $name->user_type
			);		
		} 
		else {
			$input_arr = array(
			'user_id' => $name->user_id,
			'user_title' => $name->user_title,
			'user_name' => $name->user_name,
			'user_address' => $name->user_address,
			'user_tel' => $name->user_tel,
			'user_mail' => $name->user_mail,
			'user_url' => $name->user_url,
			'user_username' => $name->user_username,
			'user_password' => md5($name->user_password),
			'user_status' => $name->user_status,
			'user_type' => $name->user_type
			);
		}
		

		$update_data_user = $this->user_model->update_data_user($input_arr);

		/*Start logfile*/
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$data_user = array(
			'logfile_user_user' => $all_session['login']['user_name'],
			'logfile_user_what' => "แก้ไขผู้ใช้งาน",
			'logfile_user_form' => $input_arr['user_username'],
			'logfile_user_time' => date('H:i:s'),
			'logfile_user_date' => date('Y-m-d')
		);
		$this->user_model->logfile_user($data_user);
		/*End logfile*/


		## Return Value ##
		
			$input_return = array(
			'user_id' => $name->user_id,
			'user_title' => $name->user_title,
			'user_name' => $name->user_name,
			'user_address' => $name->user_address,
			'user_tel' => $name->user_tel,
			'user_mail' => $name->user_mail,
			'user_url' => $name->user_url,
			'user_username' => $name->user_username,
			'user_status' => $name->user_status,
			'user_type' => $name->user_type
			);

		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($input_return).')'; 
		print_r($_GET['callback'].$json);
	}
	public function delete_data_user()
	{
		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name)

		$input_arr = array(
			'user_id' => $name->user_id,
			'user_username' => $name->user_username
		);
		$delete_data_user = $this->user_model->delete_data_user($input_arr);

		/*Start logfile*/
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด
		$data_user = array(
			'logfile_user_user' => $all_session['login']['user_name'],
			'logfile_user_what' => "ลบผู้ใช้งาน",
			'logfile_user_form' => $input_arr['user_username'],
			'logfile_user_time' => date('H:i:s'),
			'logfile_user_date' => date('Y-m-d')
		);
		$this->user_model->logfile_user($data_user);
		/*End logfile*/

		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($input_arr).')'; 
		print_r($_GET['callback'].$json);
	}
	public function alert_msg()
	{
		echo "<script>javascript:alert('ชื่อผู้ใช้งานนี้ถูกใช้แล้ว');</script>";
		redirect('manage_user/user','refresh');
	}
}

