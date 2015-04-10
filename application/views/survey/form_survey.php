<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อีสานโพลออนไลน์</title>
<?php @session_start(); $all_session = $this->session->all_userdata();?>
<?php if(@$all_session['question_subject']['qh_id']==""){redirect('home','refresh');}?>
<?php 
	$this->db->where('qh_id',$all_session['question_subject']['qh_id']);
	$this->db->from('answer');
	$all_qh_id = $this->db->count_all_results();
	$all_qa_all = count(@$_SESSION['qa_all']);
	
	if($all_qa_all>$all_qh_id){ 
		echo '<script> alert("กรุณาอย่าเปิดโพลเกิน 1 แท็บ!");</script>';
		redirect('home','refresh');
	}
?>
<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/animetextstyle.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
#body_img {
 background-image:url(<?php echo base_url()?>images/bg-tail.jpg);
	position: absolute;
	width: 100%;
	z-index: 1;
	left: 0;
	top: 0;
	background-repeat: repeat;
	background-size: auto;
}
#body_survey_img {
 background-image:url(<?php echo base_url()?>images/bg-image.png);
	position: fixed;
	width: 100%;
	z-index: 1;
	left: 0;
	top: 0;
	background-repeat: repeat;
	background-size: auto;
}
#tabbar {
 background-image:url(<?php echo base_url()?>images/bg-tail.jpg);
	background-size: cover;
	position: absolute;
	width: 100%;
	height: 95px;
	z-index: 1;
	left: 0;
	top: 0;
}
#tabbar_sub {
	background-color: #000000;
	position: absolute;
	width: 100%;
	height: 5px;
	z-index: 1;
	left: 0;
	top: 95px;
}
.font_thaisanslite {
	font-family: thaisanslite;
	font-size: 18px;
}
.table_radius {
	border: solid 2px #dbdcde;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
}
.table_default {
	border: solid 1px #fbeed5;
	background-color: #fcf8e3;
	color: #c09853;
}
body {
	font-size: 13px;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: thaisanslite;
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
	border: dashed 1px #FF9900;
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
	height: 200%;
	background-color: black;
	z-index: 1001;
	-moz-opacity: 0.8;
	opacity: .80;
	filter: alpha(opacity=80);
}
.white_content_title {
	display: none;
	position: absolute;
	top: 5%;
	left: 20%;
	width: 60%;
	height: 50%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color: #F8F8F8;
	z-index: 1002;
	overflow: auto;
}
.white_content_category {
	display: none;
	position: fixed;
	top: 5%;
	left: 20%;
	width: 60%;
	height: 40%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color: #F8F8F8;
	z-index: 1002;
	overflow: auto;
}
.white_content_review {
	display: none;
	position: absolute;
	top: 5%;
	left: 20%;
	width: 60%;
	height: 30%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color: #F8F8F8;
	z-index: 1002;
	overflow: auto;
}
.white_content_question {
	display: none;
	position: fixed;
	top: 5%;
	left: 8%;
	width: 80%;
	height: 85%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color: #F8F8F8;
	z-index: 1002;
	overflow: auto;
}
.white_content_question_autopopup {
	position: fixed;
	top: 5%;
	left: 8%;
	width: 80%;
	height: 85%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color: #F8F8F8;
	z-index: 1002;
	overflow: auto;
}
.black_overlay_autopopup {
	position: fixed;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: black;
	z-index: 1001;
	-moz-opacity: 0.8;
	opacity: .80;
	filter: alpha(opacity=80);
}
.animated {
	-webkit-animation-fill-mode: both;
	-moz-animation-fill-mode: both;
	-ms-animation-fill-mode: both;
	-o-animation-fill-mode: both;
	animation-fill-mode: both;
	-webkit-animation-duration: 3s;
	-moz-animation-duration: 3s;
	-ms-animation-duration: 3s;
	-o-animation-duration: 3s;
	animation-duration: 3s;
}
.animated.hinge {
	-webkit-animation-duration: 3s;
	-moz-animation-duration: 3s;
	-ms-animation-duration: 3s;
	-o-animation-duration: 3s;
	animation-duration: 3s;
}
@-webkit-keyframes flash {
 0%, 50%, 100% {
opacity: 1;
}
25%, 75% {
opacity: 0;
}
}
 @-moz-keyframes flash {
 0%, 50%, 100% {
opacity: 1;
}
 25%, 75% {
opacity: 0;
}
}
 @-o-keyframes flash {
 0%, 50%, 100% {
opacity: 1;
}
 25%, 75% {
opacity: 0;
}
}
 @keyframes flash {
 0%, 50%, 100% {
opacity: 1;
}
 25%, 75% {
opacity: 0;
}
}
.flash {
	-webkit-animation-name: flash;
	-moz-animation-name: flash;
	-o-animation-name: flash;
	animation-name: flash;
}
/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes pulse {
 0% {
-webkit-transform: scale(1);
}
 50% {
-webkit-transform: scale(1.1);
}
 100% {
-webkit-transform: scale(1);
}
}
@-moz-keyframes pulse {
 0% {
-moz-transform: scale(1);
}
 50% {
-moz-transform: scale(1.1);
}
 100% {
-moz-transform: scale(1);
}
}
@-o-keyframes pulse {
 0% {
-o-transform: scale(1);
}
 50% {
-o-transform: scale(1.1);
}
 100% {
-o-transform: scale(1);
}
}
@keyframes pulse {
 0% {
transform: scale(1);
}
 50% {
transform: scale(1.1);
}
 100% {
transform: scale(1);
}
}
.pulse {
	-webkit-animation-name: pulse;
	-moz-animation-name: pulse;
	-o-animation-name: pulse;
	animation-name: pulse;
}
.rounded {
	border-top-left-radius: 50px 50px;
	border-top-right-radius: 50px 50px;
	border-bottom-left-radius: 50px 50px;
	border-bottom-right-radius: 50px 50px;
}
div#Footer {
	width: 100%;
	height: 130px;
	color: #ffffff;
	position: relative;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 0;
	padding-bottom: 0;
}
</style>
<?php
		$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
		$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
		$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
		$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"Windows");
		$macintosh  = stripos($_SERVER['HTTP_USER_AGENT'],"macintosh");
?>
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/all.min.js"></script>

</head>
<div id="music" data-role="view" data-title="ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน โปรแกรมแบบสำรวจข้อมูลภาคตะวันออกเฉียงเหนือ"></div>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" bgcolor="#FFFFFF" >
  <tr>
    <td align="center" width="100%"><?php if($webOS!=""||$macintosh!=""){ ?>
      <div style="position:absolute;top:5px; margin-right:80%"> <img src="<?php echo base_url()?>images/header/logo.png" /></div>
      <?php } ?>
      <p align="center">
      
      <h2>ECBER RESEARCH</h2>
      <div style="font-size:18px; position:relative;top:5px;"> ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน คณะวิทยาการจัดการ มหาวิทยาลัยขอนแก่น</div>
      <?php if($webOS!=""||$macintosh!=""){ ?>
      <div style="font-size:18px; position:relative;top:5px;"> เลขที่ 123 ถ.มิตรภาพ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40002  โทร.0-4320-2566 &nbsp;เว็บไซต์ www.ecberkku.com</div>
      <?php } ?>
      </p>
      <hr /></td>
  </tr>
</table>
<!--ตัวแปร รับค่า session ทั้งหมด--> 
<?php echo form_open('ci_manage_survey/keep_survey_db')?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="">
  <tr>
    <td valign="top"><div align="center" style="width:100%;">
        <table width="95%" align="center" cellpadding="2" cellspacing="2" bgcolor="#efeeee" class="table_radius" style="color:#000;">
          <tr>
            <td height="35" align="center"><strong>หัวข้อสำรวจ "<?php echo $all_session['heading']['title']?>"
              <input type="hidden" name="qh_id" id="qh_id" value="<?php echo $all_session['question_subject']['qh_id']?>">
              </strong></td>
          </tr>
          <tr>
            <td height="35" align="center"><strong>ประเภท
              <?php
			$this->db->where('sc_id',@$all_session['heading']['category']);
			$query = $this->db->get('survey_category');
	
			foreach ($query->result() as $row)
			{
				echo $row->sc_name;
			}
		?>
              </strong></td>
          </tr>
          <tr>
            <td height="35" align="center"><strong>รายละเอียด : <?php echo $all_session['heading']['detail']?></strong></td>
          </tr>
        </table>
      </div>
      <?php if(@$_SESSION['data_respondent']!=""){?>
      <table width="95%" align="center" cellpadding="2" cellspacing="2" class="table_radius" bgcolor="#ffffea">
        <tr>
          <td colspan="2"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius" >
              <tr>
                <td height="40" bgcolor="#d2d2d2"><div class="alert"><strong>&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลทั่วไป</strong></div></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td width="1%"></td>
          <td colspan="2" style="color:#000;"><?php for ($i = 0; $i < count(@$_SESSION['data_respondent']); $i++){?>
            <?php if(@$_SESSION['data_respondent'][$i]==1){?>
            <p><strong>เพศ</strong>
              <input name="1" type="radio" value="1" required  />
              ชาย
              <input name="1" type="radio" value="2" required  />
              หญิง</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==2){?>
            <p><strong>อายุ</strong>
              <select name="2" id="2" class="k-textbox" style="height:30px;width:80px;"  required >
                <option value="">เลือกอายุ</option>
                <?php for($n=17;$n<71;$n++){?>
                <option value="<?php echo $n ;?>"><?php echo $n ;?></option>
                <?php } ?>
              </select>
              ปี</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==3){?>
            <strong>อาชีพ</strong>
            <table width="750">
              <tr>
                <td><input name="3" type="radio" value="1" required />
                  รับราชการ / พนักงานรัฐวิสาหกิจ</td>
                <td><input name="3" type="radio" value="2" required />
                  นักเรียน / นักศึกษา</td>
                <td><input name="3" type="radio" value="3" required />
                  พนักงานบริษัทเอกชน</td>
                <td><input name="3" type="radio" value="4" required />
                  ค้าขาย / ธุรกิจส่วนตัว</td>
              </tr>
              <tr>
                <td><input name="3" type="radio" value="5" required />
                  รับจ้างทั่วไป/ใช้แรงงาน</td>
                <td><input name="3" type="radio" value="6" required />
                  พ่อบ้าน/แม่บ้าน</td>
                <td><input name="3" type="radio" value="7" required />
                  เกษตรกรรม</td>
                <td><input name="3" type="radio" value="8" required />
                  อื่นๆ</td>
              </tr>
            </table>
            <?php }if(@$_SESSION['data_respondent'][$i]==4){?>
            <strong>รายได้ส่วนตัวเฉลี่ยต่อเดือน</strong>
            <table width="750">
              <tr>
                <td><input name="4" type="radio" value="1" required />
                  ไม่เกิน 5,000 บาท</td>
                <td><input name="4" type="radio" value="2" required />
                  5,001 - 10,000 บาท</td>
                <td><input name="4" type="radio" value="3" required />
                  10,001 - 15,000 บาท</td>
              </tr>
              <tr>
                <td><input name="4" type="radio" value="4" required />
                  15,001 - 20,000 บาท</td>
                <td><input name="4" type="radio" value="5" required />
                  20,001 - 40,000 บาท</td>
                <td><input name="4" type="radio" value="6" required />
                  มากกว่า 40,001 บาทขึ้นไป</td>
              </tr>
            </table>
            <?php }if(@$_SESSION['data_respondent'][$i]==5){?>
            <strong>การศึกษา</strong>
            <table width="750">
              <tr>
                <td><input name="5" type="radio" value="1" required />
                  ประถมศึกษา / หรือต่ำกว่า</td>
                <td><input name="5" type="radio" value="2" required />
                  มัธยมศึกษาตอนต้น</td>
                <td><input name="5" type="radio" value="3" required />
                  มัธยมศึกษาตอนปลาย / ปวช.</td>
              </tr>
              <tr>
                <td><input name="5" type="radio" value="4" required />
                  อนุปริญญา / ปวส.</td>
                <td><input name="5" type="radio" value="5" required />
                  ปริญญาตรี</td>
                <td><input name="5" type="radio" value="6" required />
                  ปริญญาโท / ปริญญาเอก</td>
              </tr>
            </table>
            <?php }if(@$_SESSION['data_respondent'][$i]==6){?>
            <p><strong>สถานะภาพ</strong>
              <input name="6" type="radio" value="1" required />
              โสด
              <input name="6" type="radio" value="2" required />
              แต่งงานแล้ว
              <input name="6" type="radio" value="3" required />
              แยกกันอยู่
              <input name="6" type="radio" value="4" required />
              อย่าร้าง </p>
            <?php }if(@$_SESSION['data_respondent'][$i]==7){?>
<script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       } 
                  }
             };
             req.open("GET", "<?php echo base_url()?>index.php/history/localtion?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('province', -1);     
    </script>
            <p><strong>จังหวัด</strong>&nbsp;&nbsp;
              <span id="province"><select name="province" id="province"><option value='0'>- เลือกจังหวัด -</option></select></span>
              <!--<select name="province" id="province" style="height:30px;width:200px;">
                <option value=""> ----------- เลือกจังหวัด ---------- </option>
                <?php for($n=0;$n<count($province);$n++){?>
                <option value="<?php echo $province[$n]['PROVINCE_ID']?>"><?php echo $province[$n]['PROVINCE_NAME']?></option>
                <?php } ?>
              </select>-->
            </p>         
            <strong>อำเภอ</strong>&nbsp;&nbsp;
            <span id="amphur"></span>

                        <p><strong>เขตพื้นที่</strong>&nbsp;&nbsp;
              <input name="9" id="9" type="radio" value="1">
              เทศบาล
              <input name="9" id="9" type="radio" value="0" >
              อ.บ.ต. </p>
            
            <!--<span id="amphur"></span>-->
            
            <?php } ?>
            <?php } ?></td>
        </tr>
        <?php } ?>
        <?php if(@$_SESSION['temp_all']!=""){?>
        <tr>
          <td width="1%"></td>
          <td height="35"><table width="100%" align="center">
              <tr>
                <td><?php for($i=0;$i<count(@$_SESSION['temp_all']);$i++){?>
                  <br>
                  <strong>
                  <?php $no = $i+1;?>
                  </strong>
                  <?php 
				/*********************** เงื่อนไขของ mulitiple_only ***********************/
			if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_only"){ 
				if(@$_SESSION['temp_all'][$i]['check_mulitiple_only']!=""){
				$mark_mulitiple_only = "<span style='color:red;'> * บังคับตอบ </span>";
				$validation_mulitiple_only = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['question_mulitiple_only']."</strong>".@$mark_mulitiple_only;
				echo "<br>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++){
				$value_only = $a+1;
				echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio' value='$value_only' />";
				echo "<input type='hidden' name='mulitiple_only_number[$i]' id='mulitiple_only_number[$i]' value='$no'>";
				echo $arr[$a]."<br>";}
				if(@$_SESSION['temp_all'][$i]['other_mulitiple_only']!=""){
				echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio' value=''  />
				<input name='temp_open_mulitiple_only[$i]' id='temp_open_mulitiple_only[$i]' type='text' class='k-textbox' />";}

				echo "<input type='hidden' name='mulitiple_only_type[$i]' id='mulitiple_only_type[$i]' value='mulitiple_only'>";
				echo "<p><hr></p>";
       	 	
				/*********************** เงื่อนไขของ mulitiple_multiple ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_multiple"){
				if(@$_SESSION['temp_all'][$i]['check_mulitiple_multiple']!=""){
				$mark_mulitiple_multiple = "<span style='color:red;'> * บังคับตอบ </span>";}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['question_mulitiple_multiple']."</strong>".@$mark_mulitiple_multiple;
				echo "<br>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++){
				$value_multiple = $a+1;
				echo "<input name='mulitiple_multiple_value[$i][$value_multiple]' id='mulitiple_multiple_value[$i][$value_multiple]' type='checkbox' value='$value_multiple'/>";
				echo "<input type='hidden' name='mulitiple_multiple_number[$i]' id='mulitiple_multiple_number[$i]' value='$no'>";
				echo $arr[$a]."<br>";}
				if(@$_SESSION['temp_all'][$i]['other_mulitiple_multiple']!=""){
				echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />
				<input name='temp_open_mulitiple_multiple[$i]' id='temp_open_mulitiple_multiple[$i]' type='text' class='k-textbox' />";}
				echo "<p></p>";
				echo "<input type='hidden' name='mulitiple_multiple_type[$i]' id='mulitiple_multiple_type[$i]' value='mulitiple_multiple'>";
				echo "<input type='hidden' name='mulitiple_multiple_count[$i]' id='mulitiple_multiple_count[$i]' value='".count($arr)."'>";
				echo "<hr>";
            
				/*********************** เงื่อนไขของ comment ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="comment"){ 
				if(@$_SESSION['temp_all'][$i]['check_comment']!=""){
				$mark_comment = "<span style='color:red;'> * บังคับตอบ </span>";
				$validation_comment = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['comment']."</strong>".@$mark_comment;
				echo "<br>";
				echo "<br>";
				echo "<textarea name='comment_value[$i]' id='comment_value[$i]' ".@$validation_comment." style='width:50%; height:80px; ' class='k-textbox'></textarea>"."<p></p>";
				echo "<input type='hidden' name='comment_number[$i]' id='comment_number[$i]' value='$no'>";
				echo "<input type='hidden' name='comment_type[$i]' id='comment_type[$i]' value='comment'>";
				echo "<hr>";

            
				/*********************** เงื่อนไขของ ranking ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="ranking"){
				if(@$_SESSION['temp_all'][$i]['check_ranking']!=""){
				$mark_ranking = "<span style='color:red;'> * บังคับตอบ </span>";}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['question_ranking']."</strong>".@$mark_ranking;
				echo "<br>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
				$ranking_value = $k+1;
				echo "<p>"."<input name='ranking_value$k' id='ranking_value$k' type='number' class='k-textbox' style='width:50px;' value='".$ranking_value."'/>"." ".$arr[$k]."</p>";
				echo "<input type='hidden' name='ranking_number[$i]' id='ranking_number[$i]' value='$no'>";}
				echo "<input type='hidden' name='ranking_type[$i]' id='ranking_type[$i]' value='ranking'>";
				echo "<input type='hidden' name='ranking_count[$i]' id='ranking_count[$i]' value='".count($arr)."'>";
				echo "<hr>";
			
				/*********************** เงื่อนไขของ ranking_scale ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="ranking_scale"){ 
				if(@$_SESSION['temp_all'][$i]['check_ranking_scale']!=""){
				$mark_ranking_scale = "<span style='color:red;'>****</span>";
				$validation_ranking_scale = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['question_ranking_scale']."</strong>".@$mark_ranking_scale;
				echo "<br>";
				echo "<br>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($ranking_scale);$a++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$ranking_scale[$a]."</td>";}
				echo "</tr>";
  				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($answer_ranking_scale);$m++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_ranking_scale[$m]."</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($b=0;$b<count($arr);$b++){
				$ranking_scale_value = $b+1;
				echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale_value[$i][$m]' id='ranking_scale_value[$i][$m]' type='radio' value='$ranking_scale_value' ".@$validation_ranking_scale." /></td>";
				echo "<input type='hidden' name='ranking_scale_number[$i]' id='ranking_scale_number[$i]' value='$no'>";}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				echo "<input type='hidden' name='ranking_scale_type[$i]' id='ranking_scale_type[$i]' value='ranking_scale'>";
				echo "<input type='hidden' name='ranking_scale_count[$i]' id='ranking_scale_count[$i]' value='".count($answer_ranking_scale)."'>";
				echo "<hr>";		
				
				
				/*********************** เงื่อนไขของ matrix_only ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="matrix_only"){
				if(@$_SESSION['temp_all'][$i]['check_matrix_only']!=""){
				$mark_matrix_only = "<span style='color:red;'>****</span>";
				$validation_matrix_only = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['question_matrix_only']."</strong>".@$mark_matrix_only;
				echo "<br>";
				echo "<br>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_only);$k++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_only[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++){
				$matrix_only_value = $n+1;
				echo "<td bgcolor='#F4F4F4' align='center'><input name='matrix_only_value[$i][$k]' id='matrix_only_value[$i][$k]' type='radio' value='$matrix_only_value' ".@$validation_matrix_only."/></td>";
				echo "<input type='hidden' name='matrix_only_number[$i]' id='matrix_only_number[$i]' value='$no'>";}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				echo "<input type='hidden' name='matrix_only_type[$i]' id='matrix_only_type[$i]' value='matrix_only'>";
				echo "<input type='hidden' name='matrix_only_count[$i]' id='matrix_only_count[$i]' value='".count($answer_matrix_only)."'>";
				echo "<hr>";

				/*********************** เงื่อนไขของ matrix_multiple ***********************/
            }else if(@$_SESSION['temp_all'][$i]['type']=="matrix_multiple"){ 
				if(@$_SESSION['temp_all'][$i]['check_matrix_multiple']!=""){
				$mark_matrix_multiple = "<span style='color:red;'> * บังคับตอบ </span>";}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['question_matrix_multiple']."</strong>".@$mark_matrix_multiple;
				echo "<br>";
				echo "<br>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_multiple);$k++){
				$all_row = $k+1;
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_multiple[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++){
				$num = $n+1;
				echo "<td bgcolor='#F4F4F4' align='center'><input name='matrix_multiple_value[$i][$all_row][$n]' id='matrix_multiple_value[$i][$all_row][$n]' type='checkbox' value='$num' /></td>";}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				echo "<input type='hidden' name='matrix_multiple_number[$i]' id='matrix_multiple_number[$i]' value='$no'>";
				echo "<input type='hidden' name='matrix_multiple_type[$i]' id='matrix_multiple_type[$i]' value='matrix_multiple'>";
				echo "<input type='hidden' name='all_row[$i]' id='all_row[$i]' value='".count($answer_matrix_multiple)."'>";
				echo "<input type='hidden' name='all_column[$i]' id='all_column[$i]' value='".count($arr)."'>";
				echo "<hr>";

				/*********************** เงื่อนไขของ single_textbox ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="single_textbox"){ 
				if(@$_SESSION['temp_all'][$i]['check_single_textbox']!=""){
				$mark_single_textbox = "<span style='color:red;'> * บังคับตอบ </span>";
				$validation_single_textbox = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['question_single_textbox']."</strong>".@$mark_single_textbox;
				echo "<br>";
				echo "<br>";
				echo "<input name='single_textbox_value[$i]' id='single_textbox_value[$i]' class='k-textbox' ".@$validation_single_textbox.">"."<p></p>";
				echo "<input type='hidden' name='single_textbox_type[$i]' id='single_textbox_type[$i]' value='single_textbox'>";
				echo "<input type='hidden' name='single_textbox_number[$i]' id='single_textbox_number[$i]' value='$no'>";
				echo "<hr>";

				/*********************** เงื่อนไขของ mulitple_textbox ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="mulitple_textbox"){
				if(@$_SESSION['temp_all'][$i]['check_mulitple_textbox']!=""){
				$mark_mulitple_textbox = "<span style='color:red;'> * บังคับตอบ </span>";}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['question_mulitple_textbox']."</strong>".@$mark_mulitple_textbox;
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitple_textbox']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"." ".$arr[$k]."<br><input name='mulitple_textbox_value$k' id='mulitple_textbox_value$k' class='k-textbox'>"."</p>";
				}
				echo "<input type='hidden' name='mulitple_textbox_type[$i]' id='mulitple_textbox_type[$i]' value='mulitple_textbox'>";
				echo "<input type='hidden' name='mulitple_textbox_number[$i]' id='mulitple_textbox_number[$i]' value='$no'>";
				echo "<input type='hidden' name='mulitple_textbox_count[$i]' id='mulitple_textbox_count[$i]' value='".count($arr)."'>";
				echo "<hr>";
							
				/*********************** เงื่อนไขของ date_time ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="date_time"){
				if(@$_SESSION['temp_all'][$i]['check_date_time']!=""){
				$mark_date_time = "<span style='color:red;'>****</span>";}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['temp_all'][$i]['question_date_time']."</strong>".@$mark_date_time;
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"." ".$arr[$k]."<br><input name='date_value".$k."' id='date_value".$k."'> <input name='time_value".$k."' id='time_value".$k."' ></p>";
				echo "<input type='hidden' name='date_time_type[$i]' id='date_time_type[$i]' value='date_time'>";
				echo "<input type='hidden' name='date_time_number[$i]' id='date_time_number[$i]' value='$no'>";
				echo "<input type='hidden' name='date_time_count[$i]' id='date_time_count[$i]' value='".count($arr)."'>";
				}	
				echo "<hr>";			
            }?>
                  <?php } ?></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <?php } ?>
      <br>
      <table height="20px">
        <tr>
          <td></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius" >
        <tr>
          <td height="40" bgcolor="#d2d2d2"><div class="alert">&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $all_session['heading']['title']?></strong></div></td>
        </tr>
      </table>
      <table width="95%" align="center" cellpadding="2" cellspacing="2" class="table_radius" bgcolor="e9e9e9" style="color:#000;">
        <tr>
          <td width="1%"></td>
          <td height="35"><?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
            <br>
            <strong><?php echo $no = $i+1;?>.</strong>
            <?php 
				/*********************** เงื่อนไขของ mulitiple_only ***********************/
			if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){ 
				if(@$_SESSION['qa_all'][$i]['check_mulitiple_only']!=""){
				$mark_mulitiple_only[$i] = "<span style='color:red; font-size:9px;'> ( * บังคับตอบ) </span>";
				$validation_mulitiple_only[$i] = 'required';
				}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['question_mulitiple_only']."</strong>".@$mark_mulitiple_only[$i];
				echo "<br>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++){
				$value_only = $a+1;
				echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio' value='$value_only' ".@$validation_mulitiple_only[$i]." />";
				echo "<input type='hidden' name='mulitiple_only_number[$i]' id='mulitiple_only_number[$i]' value='$no'>";
				echo $arr[$a]."<br>";}
				if(@$_SESSION['qa_all'][$i]['other_mulitiple_only']!=""){
				echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio' value='' />
				<input name='open_mulitiple_only[$i]' id='open_mulitiple_only[$i]' type='text' class='k-textbox' />";}
				echo "<input type='hidden' name='mulitiple_only_type[$i]' id='mulitiple_only_type[$i]' value='mulitiple_only'>";
				echo "<p><hr></p>";
       	 	
				/*********************** เงื่อนไขของ mulitiple_multiple ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){
				if(@$_SESSION['qa_all'][$i]['check_mulitiple_multiple']!=""){
				$mark_mulitiple_multiple[$i] = "<span style='color:red;'> * บังคับตอบ </span>";
				$validation_mulitiple_multiple[$i] = 'required';
				}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['question_mulitiple_multiple']."</strong>".@$mark_mulitiple_multiple[$i];
				echo "<br>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++){
				$value_multiple = $a+1;
				echo "<input name='mulitiple_multiple_value[$i][$value_multiple]' id='mulitiple_multiple_value[$i][$value_multiple]' type='checkbox' value='$value_multiple'/>";
				echo "<input type='hidden' name='mulitiple_multiple_number[$i]' id='mulitiple_multiple_number[$i]' value='$no'>";
				echo $arr[$a]."<br>";}
				if(@$_SESSION['qa_all'][$i]['other_mulitiple_multiple']!=""){
				echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />
				<input name='open_mulitiple_multiple[$i]' id='open_mulitiple_multiple[$i]' type='text' class='k-textbox' />";}
				echo "<p></p>";
				echo "<input type='hidden' name='mulitiple_multiple_type[$i]' id='mulitiple_multiple_type[$i]' value='mulitiple_multiple'>";
				echo "<input type='hidden' name='mulitiple_multiple_count[$i]' id='mulitiple_multiple_count[$i]' value='".count($arr)."'>";
				echo "<hr>";
            
				/*********************** เงื่อนไขของ comment ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="comment"){ 
				if(@$_SESSION['qa_all'][$i]['check_comment']!=""){
				$mark_comment[$i] = "<span style='color:red;'> * บังคับตอบ </span>";
				$validation_comment[$i] = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['comment']."</strong>".@$mark_comment[$i];
				echo "<br>";
				echo "<br>";
				echo "<textarea name='comment_value[$i]' id='comment_value[$i]' ".@$validation_comment[$i]." style='width:50%; height:80px; ' class='k-textbox'></textarea>"."<p></p>";
				echo "<input type='hidden' name='comment_number[$i]' id='comment_number[$i]' value='$no'>";
				echo "<input type='hidden' name='comment_type[$i]' id='comment_type[$i]' value='comment'>";
				echo "<hr>";

            
				/*********************** เงื่อนไขของ ranking ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){
				if(@$_SESSION['qa_all'][$i]['check_ranking']!=""){
				$mark_ranking[$i] = "<span style='color:red;'> * บังคับตอบ </span>";
				$validation_ranking[$i] = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['question_ranking']."</strong>".@$mark_ranking[$i];
				echo "<br>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
				$ranking_value = $k+1;
				echo "<p>"."<input name='ranking_value".$k."' id='ranking_value".$k."' type='number' class='k-textbox' style='width:50px;' ".@$validation_ranking[$i]." value='0'/>"." ".$arr[$k]."</p>";
				echo "<input type='hidden' name='ranking_number[$i]' id='ranking_number[$i]' value='$no'>";}
				echo "<input type='hidden' name='ranking_type[$i]' id='ranking_type[$i]' value='ranking'>";
				echo "<input type='hidden' name='ranking_count[$i]' id='ranking_count[$i]' value='".count($arr)."'>";
				echo "<hr>";
			
				/*********************** เงื่อนไขของ ranking_scale ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){ 
				if(@$_SESSION['qa_all'][$i]['check_ranking_scale']!=""){
				$mark_ranking_scale[$i] = "<span style='color:red;'>****</span>";
				$validation_ranking_scale[$i] = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['question_ranking_scale']."</strong>".@$mark_ranking_scale[$i];
				echo "<br>";
				echo "<br>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($ranking_scale);$a++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$ranking_scale[$a]."</td>";}
				echo "</tr>";
  				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($answer_ranking_scale);$m++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_ranking_scale[$m]."</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($b=0;$b<count($arr);$b++){
				$ranking_scale_value = $b+1;
				echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale_value[$i][$m]' id='ranking_scale_value[$i][$m]' type='radio' value='$ranking_scale_value' ".@$validation_ranking_scale[$i]." /></td>";
				echo "<input type='hidden' name='ranking_scale_number[$i]' id='ranking_scale_number[$i]' value='$no'>";}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				echo "<input type='hidden' name='ranking_scale_type[$i]' id='ranking_scale_type[$i]' value='ranking_scale'>";
				echo "<input type='hidden' name='ranking_scale_count[$i]' id='ranking_scale_count[$i]' value='".count($answer_ranking_scale)."'>";
				echo "<hr>";		
				
				
				/*********************** เงื่อนไขของ matrix_only ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){
				if(@$_SESSION['qa_all'][$i]['check_matrix_only']!=""){
				$mark_matrix_only[$i] = "<span style='color:red;'>****</span>";
				$validation_matrix_only[$i] = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['question_matrix_only']."</strong>".@$mark_matrix_only[$i];
				echo "<br>";
				echo "<br>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_only);$k++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_only[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++){
				$matrix_only_value = $n+1;
				echo "<td bgcolor='#F4F4F4' align='center'><input name='matrix_only_value[$i][$k]' id='matrix_only_value[$i][$k]' type='radio' value='$matrix_only_value' ".@$validation_matrix_only[$i]."/></td>";
				echo "<input type='hidden' name='matrix_only_number[$i]' id='matrix_only_number[$i]' value='$no'>";}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				echo "<input type='hidden' name='matrix_only_type[$i]' id='matrix_only_type[$i]' value='matrix_only'>";
				echo "<input type='hidden' name='matrix_only_count[$i]' id='matrix_only_count[$i]' value='".count($answer_matrix_only)."'>";
				echo "<hr>";

				/*********************** เงื่อนไขของ matrix_multiple ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){ 
				if(@$_SESSION['qa_all'][$i]['check_matrix_multiple']!=""){
				$mark_matrix_multiple[$i] = "<span style='color:red;'> * บังคับตอบ </span>";}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['question_matrix_multiple']."</strong>".@$mark_matrix_multiple[$i];
				echo "<br>";
				echo "<br>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_multiple);$k++){
				$all_row = $k+1;
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_multiple[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++){
				$num = $n+1;
				echo "<td bgcolor='#F4F4F4' align='center'><input name='matrix_multiple_value[$i][$all_row][$n]' id='matrix_multiple_value[$i][$all_row][$n]' type='checkbox' value='$num' /></td>";}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				echo "<input type='hidden' name='matrix_multiple_number[$i]' id='matrix_multiple_number[$i]' value='$no'>";
				echo "<input type='hidden' name='matrix_multiple_type[$i]' id='matrix_multiple_type[$i]' value='matrix_multiple'>";
				echo "<input type='hidden' name='all_row[$i]' id='all_row[$i]' value='".count($answer_matrix_multiple)."'>";
				echo "<input type='hidden' name='all_column[$i]' id='all_column[$i]' value='".count($arr)."'>";
				echo "<hr>";

				/*********************** เงื่อนไขของ single_textbox ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="single_textbox"){ 
				if(@$_SESSION['qa_all'][$i]['check_single_textbox']!=""){
				$mark_single_textbox[$i] = "<span style='color:red;'> * บังคับตอบ </span>";
				$validation_single_textbox[$i] = 'required';}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['question_single_textbox']."</strong>".@$mark_single_textbox[$i];
				echo "<br>";
				echo "<br>";
				echo "<input name='single_textbox_value[$i]' id='single_textbox_value[$i]' class='k-textbox' ".@$validation_single_textbox[$i].">"."<p></p>";
				echo "<input type='hidden' name='single_textbox_type[$i]' id='single_textbox_type[$i]' value='single_textbox'>";
				echo "<input type='hidden' name='single_textbox_number[$i]' id='single_textbox_number[$i]' value='$no'>";
				echo "<hr>";

				/*********************** เงื่อนไขของ mulitple_textbox ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitple_textbox"){
				if(@$_SESSION['qa_all'][$i]['check_mulitple_textbox']!=""){
				$mark_mulitple_textbox[$i] = "<span style='color:red;'> * บังคับตอบ </span>";}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['question_mulitple_textbox']."</strong>".@$mark_mulitple_textbox[$i];
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitple_textbox']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"." ".$arr[$k]."<br><input name='mulitple_textbox_value$k' id='mulitple_textbox_value$k' class='k-textbox'>"."</p>";
				}
				echo "<input type='hidden' name='mulitple_textbox_type[$i]' id='mulitple_textbox_type[$i]' value='mulitple_textbox'>";
				echo "<input type='hidden' name='mulitple_textbox_number[$i]' id='mulitple_textbox_number[$i]' value='$no'>";
				echo "<input type='hidden' name='mulitple_textbox_count[$i]' id='mulitple_textbox_count[$i]' value='".count($arr)."'>";
				echo "<hr>";
							
				/*********************** เงื่อนไขของ date_time ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="date_time"){
				if(@$_SESSION['qa_all'][$i]['check_date_time']!=""){
				$mark_date_time[$i] = "<span style='color:red;'>****</span>";}
				echo "<strong style='font-size:18px;'>&nbsp;&nbsp;".@$_SESSION['qa_all'][$i]['question_date_time']."</strong>".@$mark_date_time[$i];
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"." ".$arr[$k]."<br><input name='date_value".$k."' id='date_value".$k."'> <input name='time_value".$k."' id='time_value".$k."' ></p>";
				echo "<input type='hidden' name='date_time_type[$i]' id='date_time_type[$i]' value='date_time'>";
				echo "<input type='hidden' name='date_time_number[$i]' id='date_time_number[$i]' value='$no'>";
				echo "<input type='hidden' name='date_time_count[$i]' id='date_time_count[$i]' value='".count($arr)."'>";
				}	
				echo "<hr>";			
            }?>
            <?php } ?></td>
        </tr>
        <tr></tr>
      </table>
      <table width="95%" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td align="center" bgcolor="#CCCDEF"><input type="submit" name="button" id="button" value="บันทึกข้อมูล" class="k-button" style="width:150px;"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><p>
      
      <div align="center" style="font-size:12px;">"ขอขอบพระคุณที่ท่านได้สละเวลาเพื่อร่วมแสดงความคิดเห็น"</div>
      </p></td>
  </tr>
</table>
<?php echo form_close()?>
<?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
<?php if(@$_SESSION['qa_all'][$i]['type']=="date_time"){?>
<?php 
	  $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
	  $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
	  for($k=0;$k<count($arr);$k++){
?>
<script>	
 
            $(document).ready(function () {
				// create DatePicker from input HTML element
                $("#date_value<?php echo $k;?>").kendoDatePicker();

              });
            $(document).ready(function () {
                // create TimePicker from input HTML element
                $("#time_value<?php echo $k;?>").kendoTimePicker();
              });


        </script>
<?php }}} ?>
</body>
<style scoped>
#music .head {
	display: block;
	margin: 1em;
	height: 110px;
	background: url(../../content/mobile/shared/mymusic.jpg) no-repeat center center;
    -webkit-background-size: 100% auto;
    background-size: 100% auto;
}
.km-ios #music .head {
    -webkit-border-radius: 10px;
    border-radius: 10px;
}
</style>
<script>
    //var app = new kendo.mobile.Application(document.body);
</script>

</html>
