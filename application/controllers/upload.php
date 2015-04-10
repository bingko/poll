<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upload extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('upload/excel_to_sql');
	}
	public function upload()
	{
		
	//*** Get Document Path ***//
	//$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp
	$OpenFile = "import_data.csv";
	//*** Create Exce.Application ***//
	$xlApp = new COM("Excel.Application");
	//$xlBook = $xlApp->Workbooks->Open($strPath."/".$OpenFile);
	$xlBook = $xlApp->Workbooks->Open(realpath($OpenFile));

	$xlSheet1 = $xlBook->Worksheets(1);	

	//*** Insert to MySQL Database ***//
	$objConnect = mysql_connect("localhost","root","t-tech;2012") or die("Error Connect to Database");
	$objDB = mysql_select_db("survey");
	mysql_query("SET character_set_results=tis620");
	mysql_query("SET character_set_client=tis620");
	mysql_query("SET character_set_connection=tis620");

	for($i=1;$i<=2000;$i++){
		If(trim($xlSheet1->Cells->Item($i,1)) != "")
		{
			$strSQL = "";
			$strSQL .= "INSERT INTO respondent ";
			$strSQL .= "(sex,birthyear,age,address,zone,province,amphor,tambon,phone,mail,edu_bg,job,salary) ";
			$strSQL .= "VALUES ";
			$strSQL .= "('".$xlSheet1->Cells->Item($i,1)."','".$xlSheet1->Cells->Item($i,2)."' ";
			$strSQL .= ",'".$xlSheet1->Cells->Item($i,3)."','".$xlSheet1->Cells->Item($i,4)."' ";
			$strSQL .= ",'".$xlSheet1->Cells->Item($i,5)."','".$xlSheet1->Cells->Item($i,6)."' ";
			$strSQL .= ",'".$xlSheet1->Cells->Item($i,7)."','".$xlSheet1->Cells->Item($i,8)."' ";
			$strSQL .= ",'".$xlSheet1->Cells->Item($i,9)."','".$xlSheet1->Cells->Item($i,10)."' ";
			$strSQL .= ",'".$xlSheet1->Cells->Item($i,11)."','".$xlSheet1->Cells->Item($i,12)."' ";
			$strSQL .= ",'".$xlSheet1->Cells->Item($i,13)."') ";
			
			mysql_query($strSQL);
		}
	}
	
	//*** Close MySQL ***//
	@mysql_close($objConnect);

	//*** Close & Quit ***//
	$xlApp->Application->Quit();
	$xlApp = null;
	$xlBook = null;
	$xlSheet1 = null;
	echo "Data Import/Inserted.";


	header("Location: http://www.google.com");

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */