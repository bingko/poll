<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class history extends CI_Controller {

	public function index()
	{		
		$data['history_login'] = $this->survey_model->history_login();//รายการแบบสำรวจทั้งหมด
		$data['history_survey'] = $this->survey_model->history_survey();//รายการแบบสำรวจทั้งหมด
		$data['history_user'] = $this->survey_model->history_user();//รายการแบบสำรวจทั้งหมด

		$this->load->view('head');
		$this->load->view('history/index',$data);
		$this->load->view('footer');
	}
	public function keep()
	{
		$data['keep'] = $this->user_model->keep();//รายการแบบสำรวจทั้งหมด

		$this->load->view('head');
		$this->load->view('history/keep',$data);
		$this->load->view('footer');
	}
	public function follow_keep()
	{
		$user_id = $this->uri->segment(3);
		$data['survey'] = $this->survey_model->follow_keep($user_id);
		$data['keep'] = $this->user_model->keep();

		$this->load->view('head');
		$this->load->view('history/survey',$data);
		$this->load->view('footer');
	}
	public function localtion()
	{
	    header("content-type: text/html; charset=utf-8");
	    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
	    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	    header ("Cache-Control: no-cache, must-revalidate");
	    header ("Pragma: no-cache");

	    //include "config.php";
	    //conndb();

	    $data = $_GET['data'];
	    $val = $_GET['val'];


         if ($data=='province') { 
              echo "<select name='7' id='7' onChange=\"dochange('amphur', this.value)\" class=\"k-textbox\">";
              echo "<option value='0'>- เลือกจังหวัด -</option>\n";
              $result=mysql_query("select * from province where GEO_ID = 3 order by PROVINCE_NAME");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[PROVINCE_ID]' >$row[PROVINCE_NAME]</option>" ;
              }
         } else if ($data=='amphur') {
              echo "<select name='8' id='8' onChange=\"dochange('district', this.value)\" class=\"k-textbox\">";
              echo "<option value='0'>- เลือกอำเภอ -</option>\n";                             
              $result=mysql_query("SELECT * FROM amphur WHERE PROVINCE_ID= '$val' ORDER BY AMPHUR_NAME");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[AMPHUR_ID]\" >$row[AMPHUR_NAME]</option> " ;
              }
         } else if ($data=='district') {
              echo "<select name='district' class=\"k-textbox\">\n";
              echo "<option value='0'>- เลือกตำบล -</option>\n";
              $result=mysql_query("SELECT * FROM district WHERE AMPHUR_ID= '$val' ORDER BY DISTRICT_NAME");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[DISTRICT_ID]\" >$row[DISTRICT_NAME]</option> \n" ;
              }
         }
         echo "</select>\n";

        echo mysql_error();
        //closedb();
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */