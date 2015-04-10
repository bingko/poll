<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />

<style type="text/css">
#body_img	{
	background-image:url(<?php echo base_url()?>images/bg-tail.jpg);
	position: absolute ;
	width: 100%;
	z-index: 1;
	left: 0;
	top: 0;
	background-repeat:repeat;
	background-size:auto ;
	}
#body_survey_img	{
	background-image:url(<?php echo base_url()?>images/bg-image.png);
	position:fixed ;
	width: 100%;
	z-index: 1;
	left: 0;
	top: 0;
	background-repeat:repeat;
	background-size:auto ;
	}
#tabbar {
	background-image:url(<?php echo base_url()?>images/bg-tail.jpg);
	background-size:cover;
	position: absolute ;
	width: 100%;
	height: 95px;
	z-index: 1;
	left: 0;
	top: 0;	
}

#tabbar_sub {
	background-color:#000000;
	position: absolute;
	width: 100%;
	height: 5px;
	z-index: 1;
	left: 0;
	top: 95px;
}
.font_thaisanslite {
 	font-family:thaisanslite; 
	font-size:18px; 
}
.table_radius {
	border:solid 2px #dbdcde;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	
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
	border:dashed 1px #FF9900;
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
	height: 50%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color:#F8F8F8;
	z-index:1002;
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
	background-color:#F8F8F8;
	z-index:1002;
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
	background-color:#F8F8F8;
	z-index:1002;
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
	background-color:#F8F8F8;
	z-index:1002;
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
	background-color:#F8F8F8;
	z-index:1002;
	overflow: auto;
}
.black_overlay_autopopup {
	position: fixed;
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
.animated{-webkit-animation-fill-mode:both;-moz-animation-fill-mode:both;-ms-animation-fill-mode:both;-o-animation-fill-mode:both;animation-fill-mode:both;-webkit-animation-duration:3s;-moz-animation-duration:3s;-ms-animation-duration:3s;-o-animation-duration:3s;animation-duration:3s;}.animated.hinge{-webkit-animation-duration:3s;-moz-animation-duration:3s;-ms-animation-duration:3s;-o-animation-duration:3s;animation-duration:3s;}@-webkit-keyframes flash {
	0%, 50%, 100% {opacity: 1;}	25%, 75% {opacity: 0;}
}

@-moz-keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

@-o-keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

@keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

.flash {
	-webkit-animation-name: flash;
	-moz-animation-name: flash;
	-o-animation-name: flash;
	animation-name: flash;
}
/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes pulse {
    0% { -webkit-transform: scale(1); }	
	50% { -webkit-transform: scale(1.1); }
    100% { -webkit-transform: scale(1); }
}
@-moz-keyframes pulse {
    0% { -moz-transform: scale(1); }	
	50% { -moz-transform: scale(1.1); }
    100% { -moz-transform: scale(1); }
}
@-o-keyframes pulse {
    0% { -o-transform: scale(1); }	
	50% { -o-transform: scale(1.1); }
    100% { -o-transform: scale(1); }
}
@keyframes pulse {
    0% { transform: scale(1); }	
	50% { transform: scale(1.1); }
    100% { transform: scale(1); }
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
div#Footer
    {
        width: 100%;
        height: 130px;
       	color: #ffffff;
        position:relative;
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
<?php if($iPod || $iPhone || $iPad || $Android){?>
<link href="<?php echo base_url()?>css/mobile.all.min.css" rel="stylesheet" />
<?php }?>
<div id="music" data-role="view" data-title="ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน โปรแกรมแบบสำรวจข้อมูลภาคตะวันออกเฉียงเหนือ"></div>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%">
<tr>
<td align="center">
<div style="position:absolute;top:5px;left:20px;">
<img src="<?php echo base_url()?>images/header/logo.png" /></div>
<p align="center">
<div style="font-size:18px;">ECBER RESEARCH</div><br />
<div style="font-size:10px;">ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน คณะวิทยาการจัดการ มหาวิทยาลัยขอนแก่น<br />
เลขที่ 123 ถ.มิตรภาพ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40002  โทร.0-4320-2566 &nbsp;เว็บไซต์ www.ecberkku.com</div>
</p>
<hr />
</td>
</tr>
</table>
<?php @session_start(); $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด-->
<?php echo form_open('ci_manage_survey/keep_survey_db')?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="">
  <tr>
    <td valign="top">
    <table width="95%" align="center" cellpadding="2" cellspacing="2" bgcolor="#efeeee" class="table_radius">
      <tr>
        <td height="35" align="center"><strong>หัวข้อแบบสอบถาม <?php echo $all_session['heading']['title']?>
          <input type="hidden" name="qh_id" id="qh_id" value="<?php echo $all_session['question_subject']['qh_id']?>">
        </strong></td>
      </tr>
      <tr>
        <td height="35" align="center"><strong>ประเภทแบบสอบถาม <?php echo @$survey_category_session[0]['sc_name']?></strong></td>
      </tr>
      <tr>
        <td height="35" align="center"><strong>รายละเอียดแบบสอบถาม <?php echo $all_session['heading']['detail']?></strong></td>
      </tr>
    </table>
    <p></p>
        <table width="95%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius" >
          <tr>
      <td width="1%"></td>
          <td height="40" bgcolor="#ffffff">
    <div class="alert"><strong>&nbsp;&nbsp;ข้อมูลทั่วไป</strong></div>
    </td>      </tr>
    </table>
    <table width="95%" align="center" cellpadding="2" cellspacing="2" class="table_radius" bgcolor="#fffde4">

      <tr height="10px">
      <td></td>
      </tr>
      <tr>
      <td width="1%"></td>
        <td colspan="2">
		<?php for ($i = 0; $i < count(@$_SESSION['data_respondent']); $i++){?>
			<?php if(@$_SESSION['data_respondent'][$i]==1){?>
            <p><strong>เพศ</strong> <input name="1" type="radio" value="1" required validationMessage="" />ชาย <input name="1" type="radio" value="2" required validationMessage="" />หญิง</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==2){?>
            <p><strong>อายุ</strong> 
            <select name="2" id="2" class="k-textbox" style="height:30px;width:80px;" required validationMessage="">
            <option value="">เลือกอายุ</option>
            <?php for($n=1;$n<100;$n++){?>
            <option value="<?php echo $n ;?>"><?php echo $n ;?></option>
            <?php } ?>
            </select> ปี</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==3){?>
            <p><strong>อาชีพ</strong>
            <input name="3" type="radio" value="1" required validationMessage="" />นักศึกษา
            <input name="3" type="radio" value="2" required validationMessage="" />อาจารย์
            <input name="3" type="radio" value="3" required validationMessage="" />บุคลากรสายสนับสนุน
            <input name="3" type="radio" value="4" required validationMessage="" />บุคคลทั่วไป</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==4){?>
            <p><strong>รายได้ส่วนตัวเฉลี่ยนต่อเดือน</strong>
            <input name="4" type="radio" value="1" required validationMessage="" />ไม่เกิน 5,000 บาท
            <input name="4" type="radio" value="2" required validationMessage="" />5,001 - 10,000 บาท
            <input name="4" type="radio" value="3" required validationMessage="" />10,001 - 15,000 บาท
            <input name="4" type="radio" value="4" required validationMessage="" />15,001 - 20,000 บาท
            <input name="4" type="radio" value="5" required validationMessage="" />20,001 - 25,000 บาท
            <input name="4" type="radio" value="6" required validationMessage="" />25,001 บาทขึ้นไป</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==5){?>
            <p><strong>การศึกษา</strong>
            <input name="5" type="radio" value="1" required validationMessage="" />ต่ำกว่า ม.6
            <input name="5" type="radio" value="2" required validationMessage="" />ปริญาตรี
            <input name="5" type="radio" value="3" required validationMessage="" />ปริญาโท
            <input name="5" type="radio" value="4" required validationMessage="" />ปริญาเอก</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==6){?>
            <p><strong>สถานะภาพ</strong>
            <input name="6" type="radio" value="1" required validationMessage="" />โสด
            <input name="6" type="radio" value="2" required validationMessage="" />แต่งงานแล้ว
            <input name="6" type="radio" value="3" required validationMessage="" />แยกกันอยู่
            <input name="6" type="radio" value="4" required validationMessage="" />อย่าร้าง     </p>
            <?php }if(@$_SESSION['data_respondent'][$i]==7){?>
            <p><strong>จังหวัด</strong>&nbsp;&nbsp;
            <select name="7" id="7" class="k-textbox" style="height:30px;width:200px;" required validationMessage="">
            <option value="">เลือกจังหวัด</option>
            <?php for($n=0;$n<count($province);$n++){?>
            <option value="<?php echo $province[$n]['PROVINCE_ID']?>"><?php echo $province[$n]['PROVINCE_NAME']?></option>
            <?php } ?>
            </select></p>          
                   
            <?php } ?>
        <?php } ?>
        <p>&nbsp;</p>
        </td>
      </tr>
  </table>
  <p> </p>
    <table width="95%" align="center" cellpadding="2" cellspacing="2" class="table_radius" bgcolor="fffde4">
      <tr>
      <td width="1%"></td>
        <td height="35"> 
      
		<?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
        <br><strong><?php echo $no = $i+1;?>.</strong>
       		<?php 
				/*********************** เงื่อนไขของ mulitiple_only ***********************/
			if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){ 
				if(@$_SESSION['qa_all'][$i]['check_mulitiple_only']!=""){
				$mark_mulitiple_only = "<span style='color:red;'>***</span>";
				$validation_mulitiple_only = 'required validationMessage=""';}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_only']."</strong>".@$mark_mulitiple_only;
				echo "<br>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++){
				$value_only = $a+1;
				echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio' value='$value_only' />";
				echo "<input type='hidden' name='mulitiple_only_number[$i]' id='mulitiple_only_number[$i]' value='$no'>";
				echo $arr[$a]."<br>";}
				if(@$_SESSION['qa_all'][$i]['other_mulitiple_only']!=""){
				echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio' value='' $validation_mulitiple_only/>
				<input name='open_mulitiple_only' id='open_mulitiple_only' type='text' class='k-textbox' />";}
				echo "<input type='hidden' name='mulitiple_only_type[$i]' id='mulitiple_only_type[$i]' value='mulitiple_only'>";
				echo "<p><hr></p>";
       	 	
				/*********************** เงื่อนไขของ mulitiple_multiple ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){
				if(@$_SESSION['qa_all'][$i]['check_mulitiple_multiple']!=""){
				$mark_mulitiple_multiple = "<span style='color:red;'>***</span>";}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_multiple']."</strong>".@$mark_mulitiple_multiple;
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
				<input name='open_mulitiple_multiple' id='open_mulitiple_multiple' type='text' class='k-textbox' />";}
				echo "<p></p>";
				echo "<input type='hidden' name='mulitiple_multiple_type[$i]' id='mulitiple_multiple_type[$i]' value='mulitiple_multiple'>";
				echo "<input type='hidden' name='mulitiple_multiple_count[$i]' id='mulitiple_multiple_count[$i]' value='".count($arr)."'>";
				echo "<hr>";
            
				/*********************** เงื่อนไขของ comment ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="comment"){ 
				if(@$_SESSION['qa_all'][$i]['check_comment']!=""){
				$mark_comment = "<span style='color:red;'>***</span>";
				$validation_comment = 'required validationMessage=""';}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['comment']."</strong>".@$mark_comment;
				echo "<br>";
				echo "<br>";
				echo "<textarea name='comment_value[$i]' id='comment_value[$i]' ".@$validation_comment." style='width:50%; height:80px; ' class='k-textbox'></textarea>"."<p></p>";
				echo "<input type='hidden' name='comment_number[$i]' id='comment_number[$i]' value='$no'>";
				echo "<input type='hidden' name='comment_type[$i]' id='comment_type[$i]' value='comment'>";
				echo "<hr>";

            
				/*********************** เงื่อนไขของ ranking ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){
				if(@$_SESSION['qa_all'][$i]['check_ranking']!=""){
				$mark_ranking = "<span style='color:red;'>***</span>";}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking']."</strong>".@$mark_ranking;
				echo "<br>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
				$ranking_value = $k+1;
				echo "<p>"."<input name='ranking_value$k' id='ranking_value$k' type='number' class='k-textbox' style='width:50px;' value='".$ranking_value."'/>"." ".$arr[$k]."</p>";
				echo "<input type='hidden' name='ranking_number[$i]' id='ranking_number[$i]' value='$no'>";}
				echo "<input type='hidden' name='ranking_type[$i]' id='ranking_type[$i]' value='ranking'>";
				echo "<input type='hidden' name='ranking_count[$i]' id='ranking_count[$i]' value='".count($arr)."'>";
				echo "<hr>";
			
				/*********************** เงื่อนไขของ ranking_scale ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){ 
				if(@$_SESSION['qa_all'][$i]['check_ranking_scale']!=""){
				$mark_ranking_scale = "<span style='color:red;'>****</span>";
				$validation_ranking_scale = 'required validationMessage=""';}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking_scale']."</strong>".@$mark_ranking_scale;
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
				echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale_value[$i][$m]' id='ranking_scale_value[$i][$m]' type='radio' value='$ranking_scale_value' ".@$validation_ranking_scale." /></td>";
				echo "<input type='hidden' name='ranking_scale_number[$i]' id='ranking_scale_number[$i]' value='$no'>";}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				echo "<input type='hidden' name='ranking_scale_type[$i]' id='ranking_scale_type[$i]' value='ranking_scale'>";
				echo "<input type='hidden' name='ranking_scale_count[$i]' id='ranking_scale_count[$i]' value='".count($answer_ranking_scale)."'>";
				echo "<hr>";		
				
				
				/*********************** เงื่อนไขของ matrix_only ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){
				if(@$_SESSION['qa_all'][$i]['check_matrix_only']!=""){
				$mark_matrix_only = "<span style='color:red;'>****</span>";
				$validation_matrix_only = 'required validationMessage=""';}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_only']."</strong>".@$mark_matrix_only;
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
				echo "<td bgcolor='#F4F4F4' align='center'><input name='matrix_only_value[$i][$k]' id='matrix_only_value[$i][$k]' type='radio' value='$matrix_only_value' ".@$validation_matrix_only."/></td>";
				echo "<input type='hidden' name='matrix_only_number[$i]' id='matrix_only_number[$i]' value='$no'>";}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				echo "<input type='hidden' name='matrix_only_type[$i]' id='matrix_only_type[$i]' value='matrix_only'>";
				echo "<input type='hidden' name='matrix_only_count[$i]' id='matrix_only_count[$i]' value='".count($answer_matrix_only)."'>";
				echo "<hr>";

				/*********************** เงื่อนไขของ matrix_multiple ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){ 
				if(@$_SESSION['qa_all'][$i]['check_matrix_multiple']!=""){
				$mark_matrix_multiple = "<span style='color:red;'>***</span>";}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_multiple']."</strong>".@$mark_matrix_multiple;
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
				$mark_single_textbox = "<span style='color:red;'>***</span>";
				$validation_single_textbox = 'required validationMessage=""';}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_single_textbox']."</strong>".@$mark_single_textbox;
				echo "<br>";
				echo "<br>";
				echo "<input name='single_textbox_value[$i]' id='single_textbox_value[$i]' class='k-textbox' ".@$validation_single_textbox.">"."<p></p>";
				echo "<input type='hidden' name='single_textbox_type[$i]' id='single_textbox_type[$i]' value='single_textbox'>";
				echo "<input type='hidden' name='single_textbox_number[$i]' id='single_textbox_number[$i]' value='$no'>";
				echo "<hr>";

				/*********************** เงื่อนไขของ mulitple_textbox ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitple_textbox"){
				if(@$_SESSION['qa_all'][$i]['check_mulitple_textbox']!=""){
				$mark_mulitple_textbox = "<span style='color:red;'>***</span>";}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitple_textbox']."</strong>".@$mark_mulitple_textbox;
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
				$mark_date_time = "<span style='color:red;'>****</span>";}
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_date_time']."</strong>".@$mark_date_time;
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
            
		<?php } ?>   
            
        </td>
      </tr>
      <tr></tr>
    </table>
    <table width="95%" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td align="center" bgcolor="#CCCCCC">
        <input type="submit" name="button" id="button" value="บันทึกข้อมูล" class="k-button" style="width:150px;">
        </td>
      </tr>
    </table>
    </td>
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
    var app = new kendo.mobile.Application(document.body);
</script>