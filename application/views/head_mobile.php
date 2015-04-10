<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบจัดการแบบสอบถามอีสานโพล Online</title>
<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/popup.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/mobile.all.min.css" rel="stylesheet" />

<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/console.js"></script>
<script src="<?php echo base_url()?>js/web.min.js"></script>
<script src="<?php echo base_url()?>js/popup.js"></script>
<script src="<?php echo base_url()?>js/kendo.all.min.js"></script>

<style type="text/css">
#tabbar {
	background-image:url(<?php echo base_url()?>images/header/gradient.png);
	background-size:cover;
	position: absolute ;
	width: 100%;
	height: 95px;
	z-index: 1;
	left: 0;
	top: 0;	
	h1.fontface {font: 24px/28px 'CodaHeavy', Arial, sans-serif;letter-spacing: 0;}
}

#tabbar_sub {
	background-color:#fecd16;
	position: absolute;
	width: 100%;
	height: 5px;
	z-index: 1;
	left: 0;
	top: 95px;
}
.table_radius {
	border:solid 2px #dbdcde;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	background-color:#fff;
}
.table_default {
	border:solid 1px #fbeed5;
	background-color:#fcf8e3;
	color:#c09853;
}
body {
	font-size: 13px;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.survey_layer {
	border:dashed 1px #fbeed5;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
}
.black_overlay {
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: black;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}

.white_content_title {
	display: none;
	position: absolute;
	top: 5%;
	left: 20%;
	width: 60%;
	height: 30%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color:#F8F8F8;
	z-index:1002;
	overflow: auto;
}
.white_content_category {
	display: none;
	position: absolute;
	top: 5%;
	left: 20%;
	width: 60%;
	height: 30%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color:#F8F8F8;
	z-index:1002;
	overflow: auto;
}
.white_content_question {
	display: none;
	position: absolute;
	top: 5%;
	left: 8%;
	width: 80%;
	height: 85%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color:#F8F8F8;
	z-index:1002;
	overflow: auto;
}

/*  mobile styles */
@media screen and (max-device-width: 480px)
{
img
{
margin-bottom: 50px;
max-width: 100%;
height: auto;
}
#content 
{ 
margin-left: 20px; 
font-size: 32px;
}


</style>
<?php
//Detect special conditions devices
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"Windows");

//do something with this information
if( $iPod || $iPhone ){
    //echo "iPhone/iPod";
}else if($iPad){
    //echo "iPad";
}else if($Android){
    //echo "Android";
}else if($webOS){
    //echo "OS";
}
?>
</head>

<body>

<div id="tabbar">
<table width="100%">
  <tr>
    <td width="100%" align="center"><h1 class="fontface" align="center">ECBER'S POLL ONLINE</h1></td>  </tr>
</table>
</div>
<div id="tabbar_sub"></div>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php if($this->session->userdata('username')=="admin"){?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td bgcolor="#e5e8ea"><div id="menu-sprites"></div></td>
  </tr>
</table>
<script>
                $("#menu-sprites").kendoMenu({
                    dataSource: [
						{
                            text: "หน้าหลัก",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>',							
                        },
                        {
                            text: "จัดการผู้ใช้งาน",
							imageUrl: "<?php echo base_url()?>images/icon_menu/user.png",
							items: [
                                { text: "User creator survey",url: '<?php echo base_url()?>index.php/manage_user'},
                                { text: "User keep survey",url: '<?php echo base_url()?>index.php/manage_survey'},
                            ]
                        },
                        {
                            text: "จัดการระบบ Survey",
							imageUrl: "<?php echo base_url()?>images/icon_menu/survey.png",
							items: [
                                { text: "สร้างแบบสำรวจ", url: '<?php echo base_url()?>index.php/survey/insert_survey'},
                                { text: "ข้อมูลรายการแบบสำรวจ", url: '<?php echo base_url()?>index.php/survey'}
                            ]
                        },
						{
                            text: "รายงาน",
							imageUrl: "<?php echo base_url()?>images/icon_menu/report.png",
							items: [
                                { text: "รายงายข้อมูลจริง"},
                                { text: "รายงานข้อมูลปลายเปิด"},
                                { text: "รูปแบบ Grid Table"},
                                { text: "รูปแบบ Graph"},
                            ]
                        },
						{
                            text: "ส่งข้อมูลออก",
							imageUrl: "<?php echo base_url()?>images/icon_menu/export.png",
							items: [
                                { text: "รูปแบบ PDF",url: '<?php echo base_url()?>index.php/export/export_pdf'},
                                { text: "รูปแบบ Excel",url: '<?php echo base_url()?>index.php/export/export_excel'},
                            ]
                        },
						{
                            text: "ตั้งค่าระบบ",
							imageUrl: "<?php echo base_url()?>images/icon_menu/setting.png",
							items: [
                                { text: "จัดการข้อมูลประเภทแบบสอบถาม",url: '<?php echo base_url()?>index.php/manage_survey/category'},
                                { text: "รูปแบบฟอร์มการสำรวจ",url: '<?php echo base_url()?>index.php/manage_survey/edit_survey_form'},
                                { text: "ตั้งค่าทั่วไป"},
                            ]
                        },
						{
							text: "ออกจากระบบ",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>index.php/ci_login/logout',	
						}]
                });
</script>
<?php }else if($this->session->userdata('username')=="user"){?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td bgcolor="#e5e8ea"><div id="menu-sprites"></div></td>
  </tr>
</table>
<script>
                $("#menu-sprites").kendoMenu({
                    dataSource: [
						{
                            text: "หน้าหลัก",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>',							
                        },
                        {
                            text: "จัดการผู้ใช้งาน",
							imageUrl: "<?php echo base_url()?>images/icon_menu/user.png",
							items: [
                                { text: "User creator survey",url: '<?php echo base_url()?>index.php/manage_user'},
                                { text: "User keep survey",url: '<?php echo base_url()?>index.php/manage_survey'},
                            ]
                        },
                        {
                            text: "จัดการระบบ Survey",
							imageUrl: "<?php echo base_url()?>images/icon_menu/survey.png",
							items: [
                                { text: "สร้างแบบสำรวจ", url: '<?php echo base_url()?>index.php/survey/insert_survey'},
                                { text: "ข้อมูลรายการแบบสำรวจ", url: '<?php echo base_url()?>index.php/survey'}
                            ]
                        },
						{
							text: "ออกจากระบบ",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>index.php/ci_login/logout',	
						}]
                });
</script>
<?php }else if($this->session->userdata('username')=="keep"){?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td bgcolor="#e5e8ea"><div id="menu-sprites"></div></td>
  </tr>
</table>
<script>
                $("#menu-sprites").kendoMenu({
                    dataSource: [
						{
                            text: "หน้าหลัก",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>',							
                        },
						{
							text: "ออกจากระบบ",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>index.php/ci_login/logout',	
						}]
                });
</script>
<?php } ?>

