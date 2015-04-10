<?php
ob_start();
?>
<html>
<head>
<title>ECBER Excel.Application</title>
</head>
<body>
<?php
	//*** Get Document Path ***//
	$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp
	$OpenFile = "import_data.csv";
	//*** Create Exce.Application ***//
	$xlApp = new COM("Excel.Application");
	$xlBook = $xlApp->Workbooks->Open($strPath."/".$OpenFile);
	//$xlBook = $xlApp->Workbooks->Open(realpath($OpenFile));

	$xlSheet1 = $xlBook->Worksheets(1);	

	//*** Insert to MySQL Database ***//
	$objConnect = mysql_connect("localhost","root","t-tech;2012") or die("Error Connect to Database");
	$objDB = mysql_select_db("survey");
	mysql_query("SET character_set_results=tis620");
	mysql_query("SET character_set_client=tis620");
	mysql_query("SET character_set_connection=tis620");

	for($i=4001;$i<=6000;$i++){
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
?>
Data Import/Inserted.

<?php
header("Location: http://www.google.com");
?>

</body>
</html>