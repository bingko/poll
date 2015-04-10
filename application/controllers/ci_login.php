<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ci_login extends CI_Controller {

	public function login()
	{
		$data_login = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		$data['login'] = $this->login_model->login($data_login);

		$this->session->set_userdata($data);//เอา array ที่ query มาใส่ใน session
		$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด

		if($all_session['login']['user_id']!=""){
			
			/*Start logfile*/
			$data_user = array(
				'logfile_login_user' => $all_session['login']['user_name'],
				'logfile_login_time' => date('H:i:s'),
				'logfile_login_date' => date('Y-m-d')
			);
			$this->login_model->logfile_login($data_user);
			/*End logfile*/

			redirect('home','refresh');
		}else{
			echo "<script>javascript:alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');</script>";
			redirect('home','refresh');
		}
	}
	public function logout()
	{
		@session_start();
		@session_destroy();
		$this->session->sess_destroy();	
		redirect('home','refresh');
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */