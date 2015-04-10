<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/popup.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/animetextstyle.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/all.min.js"></script>

<script src="<?php echo base_url()?>js/web.min.js"></script>
<script src="<?php echo base_url()?>js/console.js"></script>
<script src="<?php echo base_url()?>js/popup.js"></script>
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
	font-family:thaisanslite;
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
</style>
<?php @session_start(); $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_radius">
  <tr>
    <td valign="top">
    <table width="90%" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td height="35" align="center"><strong>หัวข้อแบบสอบถาม <?php echo $all_session['heading']['title']?></strong></td>
      </tr>
      <tr>
        <td height="35" align="center"><strong>ประเภทแบบสอบถาม <?php echo @$survey_category_session[0]['sc_name']?></strong></td>
      </tr>
      <tr>
        <td height="35" align="center"><strong>รายละเอียดแบบสอบถาม <?php echo $all_session['heading']['detail']?></strong></td>
      </tr>
    </table>
    <div id="light_title" class="white_content_title" align="left">
    <?php echo form_open('ci_manage_survey/list_data_create')?>
	<table width="90%" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td height="35" colspan="2"><h1>แก้ไขหัวข้อแบบสอบถาม</h1></td>
        </tr>
      <tr>
        <td width="35%" height="35"><strong>หัวข้อแบบสอบถาม</strong></td>
        <td width="65%" height="35">
        <input type="text" name="title" id="title" class="k-textbox" style="width:100%;" value="<?php echo $all_session['heading']['title']?>"/>
        </td>
      </tr>
      <tr>
        <td height="35"><strong>ประเภทแบบสอบถาม</strong></td>
        <td height="35">
	<select name="category" id="category" class="k-textbox" style="height:30px;width:100%;" required validationMessage="">
	<option value="<?php echo $all_session['heading']['category']?>"><?php echo $all_session['heading']['category']?></option>
	<option value="เศรษฐกิจ">เศรษฐกิจ</option>
	<option value="การเมือง">การเมือง</option>
	<option value="สังคม">สังคม</option>
	</select>
        </td>
      </tr>
      <tr>
        <td height="35" valign="top"><strong>รายละเอียดแบบสอบถาม</strong></td>
        <td height="35">
        <textarea name="detail" id="detail" cols="45" rows="3" class="k-textbox" style="width:100%;"><?php echo $all_session['heading']['detail']?></textarea>
        </td>
      </tr>
      <tr>
        <td height="35" colspan="2" align="right">
        <input name="Submit" type="submit" value="บันทึก" class="k-button" style="width:100px;"/>
        <a href = "javascript:void(0)" onclick = "document.getElementById('light_title').style.display='none';document.getElementById('fade').style.display='none'"><input type="reset" name="Reset" id="button" value="ยกเลิก" class="k-button" style="width:100px;"/></a>
        </td>
        </tr>
    </table>
    <?php echo form_close()?>
	</div>
    <P></P>
    <?php if(count(@$_SESSION['data_respondent'])!="0"){?>
    <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
      <tr>
        <td colspan="2">
		<?php for ($i = 0; $i < count(@$_SESSION['data_respondent']); $i++){?>
        <?php foreach($value_survey as $row_value_survey){?>
        <?php if($row_value_survey['gv_category']==1)
		{
			if($row_value_survey['gv_value']==1){
				$man = "checked='checked'";
			}
			else{
				$female = "checked='checked'";
			}
		}
		if($row_value_survey['gv_category']==2)
		{
			$value_age = $row_value_survey['gv_value'];
		}
		if($row_value_survey['gv_category']==3)
		{
			if($row_value_survey['gv_value']==1){
				$posetion1 = "checked='checked'";
			}if($row_value_survey['gv_value']==2){
				$posetion2 = "checked='checked'";
			}if($row_value_survey['gv_value']==3){
				$posetion3 = "checked='checked'";
			}if($row_value_survey['gv_value']==4){
				$posetion4 = "checked='checked'";
			}if($row_value_survey['gv_value']==5){
				$posetion5 = "checked='checked'";
			}if($row_value_survey['gv_value']==6){
				$posetion6 = "checked='checked'";
			}if($row_value_survey['gv_value']==7){
				$posetion7 = "checked='checked'";
			}if($row_value_survey['gv_value']==8){
				$posetion8 = "checked='checked'";
			}
		}
		if($row_value_survey['gv_category']==4)
		{
			if($row_value_survey['gv_value']==1)
			{
				$monny1 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==2)
			{
				$monny2 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==3)
			{
				$monny3 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==4)
			{
				$monny4 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==5)
			{
				$monny5 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==6)
			{
				$monny6 = "checked='checked'";
			}
		}
		if($row_value_survey['gv_category']==5)
		{
			if($row_value_survey['gv_value']==1)
			{
				$education1 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==2)
			{
				$education2 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==3)
			{
				$education3 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==4)
			{
				$education4 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==5)
			{
				$education5 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==6)
			{
				$education6 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==7)
			{
				$education7 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==8)
			{
				$education8 = "checked='checked'";
			}
		}
		if($row_value_survey['gv_category']==6)
		{
			if($row_value_survey['gv_value']==1)
			{
				$status1 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==2)
			{
				$status2 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==3)
			{
				$status3 = "checked='checked'";
			}
			if($row_value_survey['gv_value']==4)
			{
				$status4 = "checked='checked'";
			}
		}
		if($row_value_survey['gv_category']==7)
		{
			$value_province = $row_value_survey['gv_value'];
			$value_data = $row_value_survey['gv_data'];
			$value_area = $row_value_survey['gv_area'];
		}
		
		?>
        <?php } ?>       
			<?php if(@$_SESSION['data_respondent'][$i]==1){?>
            <p><strong>เพศ</strong> <input name="1" type="radio" <?php echo @$man?>/>ชาย <input name="1" type="radio" <?php echo @$female?>/>หญิง</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==2){?>
            <p><strong>อายุ</strong> 
            <select name="2" id="2" class="k-textbox" style="height:30px;width:80px;" required validationMessage="">
            <option value="<?php echo @$value_age?>"><?php echo @$value_age?></option>
            <?php for($n=1;$n<100;$n++){?>
            <option value="<?php echo $n ;?>"><?php echo $n ;?></option>
            <?php } ?>
            </select> ปี</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==3){?>
            <strong>อาชีพ</strong>
            <table width="750"><tr><td>
             <input name="3" type="radio" <?php echo @$posetion1?>/>รับราชการ / พนักงานรัฐวิสาหกิจ</td><td>
             <input name="3" type="radio" <?php echo @$posetion2?>/>นักเรียน / นักศึกษา</td><td>
             <input name="3" type="radio" <?php echo @$posetion3?>/>พนักงานบริษัทเอกชน</td><td>
             <input name="3" type="radio" <?php echo @$posetion4?>/>ค้าขาย / ธุรกิจส่วนตัว</td></tr><tr><td>
             <input name="3" type="radio" <?php echo @$posetion5?>/>รับจ้างทั่วไป/ใช้แรงงาน</td><td>
             <input name="3" type="radio" <?php echo @$posetion6?>/>พ่อบ้าน/แม่บ้าน</td><td>
             <input name="3" type="radio" <?php echo @$posetion7?>/>เกษตรกรรม</td><td>
             <input name="3" type="radio" <?php echo @$posetion8?>/>อื่นๆ</td></tr></table>

            <?php }if(@$_SESSION['data_respondent'][$i]==4){?>
            <strong>รายได้ส่วนตัวเฉลี่ยต่อเดือน</strong>
            <table width="750"><tr><td>
            <input name="4" type="radio" <?php echo @$monny1?>/>ไม่เกิน 5,000 บาท</td><td>
            <input name="4" type="radio" <?php echo @$monny2?>/>5,001 - 10,000 บาท</td><td>
            <input name="4" type="radio" <?php echo @$monny3?>/>10,001 - 15,000 บาท</td></tr><tr><td>
            <input name="4" type="radio" <?php echo @$monny4?>/>15,001 - 20,000 บาท</td><td>
            <input name="4" type="radio" <?php echo @$monny5?>/>20,001 - 40,000 บาท</td><td>
            <input name="4" type="radio" <?php echo @$monny6?>/>มากกว่า 40,001 บาทขึ้นไป</td></tr></table>

            <?php }if(@$_SESSION['data_respondent'][$i]==5){?>
            <strong>การศึกษา</strong>
            <table width="750"><tr><td>
             <input name="5" type="radio" <?php echo @$education1?>/>ประถมศึกษา / หรือต่ำกว่า</td><td>
             <input name="5" type="radio" <?php echo @$education2?>/>มัธยมศึกษาตอนต้น</td><td>
             <input name="5" type="radio" <?php echo @$education3?>/>มัธยมศึกษาตอนปลาย / ปวช.</td></tr><tr><td>
             <input name="5" type="radio" <?php echo @$education4?>/>อนุปริญญา / ปวส.</td><td>
             <input name="5" type="radio" <?php echo @$education5?>/>ปริญญาตรี</td><td>
             <input name="5" type="radio" <?php echo @$education6?>/>ปริญญาโท / ปริญญาเอก</td></tr></table>

            <?php }if(@$_SESSION['data_respondent'][$i]==6){?>
            <p><strong>สถานะภาพ</strong>
            <input name="6" type="radio" <?php echo @$status1?>/>โสด
            <input name="6" type="radio" <?php echo @$status2?>/>แต่งงานแล้ว
            <input name="6" type="radio" <?php echo @$status3?>/>แยกกันอยู่
            <input name="6" type="radio" <?php echo @$status4?>/>อย่าร้าง</p>   
            <?php }if(@$_SESSION['data_respondent'][$i]==7){?>
            <p><strong>จังหวัด</strong>&nbsp;&nbsp;
            <?php for($n=0;$n<count($province);$n++){
		            if (@$province[$n]['PROVINCE_ID']==$value_province){
		            	echo $province[$n]['PROVINCE_NAME'];
		            	}
		            else {
		            	echo " ";
		            	}
			} ?>
			</p>
            <p><strong>เขต</strong>&nbsp;&nbsp;
            <?php if(@$value_area==0){echo "นอกเมือง";}else{echo "ในเมือง";}?>
            </p>
            <p><strong>อำเภอ</strong>&nbsp;&nbsp;
            <?php for($n=0;$n<count($amphur);$n++){
		            if (@$amphur[$n]['AMPHUR_ID']==$value_data){
		            	echo $amphur[$n]['AMPHUR_NAME'];
		            	}
		            else {
		            	echo " ";
		            	}
			} ?>
           <?php  } 
        } ?>
        </p>
        <p>&nbsp;</p>
        </td>
      </tr>
      <tr></tr>
    </table>
    <?php } ?>

    <div id="light_category" class="white_content_title" align="left">
	<?php echo form_open('ci_manage_survey/list_check_category_update')?>
      <?php for ($i = 0; $i < count(@$_SESSION['data_respondent']); $i++){?>
			<?php 
			if(@$_SESSION['data_respondent'][$i]==1){
				$respondent1 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==2){
				$respondent2 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==3){
				$respondent3 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==4){
				$respondent4 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==5){
				$respondent5 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==6){
				$respondent6 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==7){
				$respondent7 = 'checked="checked"';
            }?>
        <?php } ?>
      <table width="90%" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td height="35" colspan="6"><h1>ข้อมูลทั่วไปของผู้ตอบ</h1></td>
        </tr>
        <tr>
          <td height="35"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="1" <?php echo @$respondent1?>/></td>
          <td>เพศ</td>
          <td><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="2" <?php echo @$respondent2?>/></td>
          <td>อายุ</td>
          <td><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="3" <?php echo @$respondent3?>/></td>
          <td>อาชีพ</td>
        </tr>
        <tr>
          <td height="35"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="4" <?php echo @$respondent4?>/></td>
          <td>รายได้</td>
          <td><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="5" <?php echo @$respondent5?>/></td>
          <td>การศึกษา</td>
          <td><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="6" <?php echo @$respondent6?>/></td>
          <td height="35">สถานะภาพ</td>
        </tr>
          <tr>
            <td width="3%" height="35" bgcolor="#D2DBDE"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="7" <?php echo @$respondent7?>/></td>
            <td width="31%" bgcolor="#D2DBDE">จังหวัด</td>
         </tr>
        <tr>
          <td height="35" valign="top">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="35">&nbsp;</td>
        </tr>
        <tr>
          <td height="35" colspan="6" align="right">
			<input name="Submit2" type="submit" value="บันทึก" class="k-button" style="width:100px;"/>
			<a href = "javascript:void(0)" onclick = "document.getElementById('light_category').style.display='none';document.getElementById('fade').style.display='none'"><input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:100px;"/></a></td>
        </tr>
      </table>
      <?php echo form_close()?>
    </div>
    <p></p>
    
    <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
      <tr></tr>
      <tr>
        <td height="35">  
		<?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>        
       		<?php 
			$no = $i+1;
			echo "<strong>".$no.". </strong>";
				/*********************** เงื่อนไขของ mulitiple_only ***********************/
			if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){ 
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('type','mulitiple_only');
				$query = $this->db->get('ans_value');
				$result = $query->result_array();
				foreach ($result as $mulitiple_only_row)
				$all_value_mulitiple_only = $mulitiple_only_row['value'];				
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_only']."</strong>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_only_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				if($mulitiple_only_row['value_open']==""){	
					for($a=0;$a<count($mulitiple_only_value);$a++){
						if($a == $all_value_mulitiple_only-1){
							echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio' checked='checked'/>";
							}else{
							echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio'/>";
							}	
						echo $mulitiple_only_value[$a]."<br>";
					}
				}else{
					for($a=0;$a<=count($mulitiple_only_value);$a++){		
						if($a != count($mulitiple_only_value)){
							echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio'/>";
							echo $mulitiple_only_value[$a]."<br>";		
						}else{
							echo "<input name='mulitiple_only_value[$i]' id='mulitiple_only_value[$i]' type='radio' checked='checked'/>";
							echo "<input type='text' value='".$mulitiple_only_row['value_open']."' class='k-textbox'><br>";
						}
					}
				}
				
				$value = @$_SESSION['qa_all'][$i]['question_mulitiple_only'];
				if(is_numeric($value)){
					echo "<input name='mulitiple_only_value' id='mulitiple_only_value' type='radio' checked='checked'/><input name='open_mulitiple_only' id='open_mulitiple_only' type='text' class='k-textbox' value='$value' />";
				}else{
					
				}
				echo "<p></p>";
       	 	
				/*********************** เงื่อนไขของ mulitiple_multiple ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_multiple']."</strong>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_multiple_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				
				for($a=0;$a<count($mulitiple_multiple_value);$a++){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$a+1);
				$this->db->where('type','mulitiple_multiple');
				$query = $this->db->get('ans_value');
				$result = $query->result_array();
				foreach ($result as $mulitiple_multiple_row)
				$all_value_mulitiple_multiple = $mulitiple_multiple_row['value'];	
					
				if($a == $all_value_mulitiple_multiple-1){
					echo "<input name='mulitiple_multiple_value[$i]' id='mulitiple_multiple_value[$i]' type='checkbox' checked='checked'/>";
					}else{
					echo "<input name='mulitiple_multiple_value[$i]' id='mulitiple_multiple_value[$i]' type='checkbox'/>";
					}
					echo $mulitiple_multiple_value[$a]."<br>";
				}
				if($mulitiple_multiple_row['value_open']!=""){
					echo "<input name='mulitiple_multiple_value[$i]' id='mulitiple_multiple_value[$i]' type='checkbox' checked='checked'/>";
					echo "<input type='text' value='".$mulitiple_multiple_row['value_open']."' class='k-textbox'><br>";
					
				
				}
				
				$value = @$_SESSION['qa_all'][$i]['question_mulitiple_multiple'];
				echo is_numeric($value);
				if(is_numeric($value)){
					
					if(@$_SESSION['qa_all'][$i]['other_mulitiple_multiple']!=""){
					echo "<input name='mulitiple_multiple_value' id='mulitiple_multiple_value' type='checkbox' checked='checked'/>
					<input name='open_mulitiple_multiple_value' id='open_mulitiple_multiple_value' type='text' class='k-textbox' value='$value'/>";}
					
				}					
				echo "<p></p>";
            
				/*********************** เงื่อนไขของ comment ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="comment"){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('type','comment');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $comment_row)
				$all_value_comment = $comment_row->value;
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['comment']."</strong>";
				echo "<br>";
				echo "<textarea name='comment_value' id='comment_value' style='width:50%; height:80px;' class='k-textbox'>".$all_value_comment."</textarea>"."<p></p>";
            
				/*********************** เงื่อนไขของ ranking ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking']."</strong>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$ranking_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($ranking_value);$k++){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('type','ranking');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $ranking_row)
				$all_value_ranking = $ranking_row->value;
				echo "<p>"."<input name='ranking_value[$i]' id='ranking_value[$i]' type='number' value='$all_value_ranking' class='k-textbox' style='width:50px;'/>"." ".$ranking_value[$k]."</p>";}
			
				/*********************** เงื่อนไขของ ranking_scale ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){ 
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking_scale']."</strong>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$a]."</td>";}
				echo "</tr>";
  				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($answer_ranking_scale);$m++){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$m+1);
				$this->db->where('type','ranking_scale');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $ranking_scale_row)
				$all_value_ranking_scale = $ranking_scale_row->value;
					
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_ranking_scale[$m]."</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($b=0;$b<count($arr);$b++)
				{
					if($b == $all_value_ranking_scale-1){
					echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[$i][$m][$b]' id='ranking_scale[$i][$m][$b]' type='radio' checked='checked'/></td>";
					}else{
					echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[$i][$m][$b]' id='ranking_scale[$i][$m][$b]' type='radio'/></td>";
					}
					//echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='radio'/></td>";
				}
				echo "</tr>";}
				echo "</table>"."<p></p>";		
						
				/*********************** เงื่อนไขของ matrix_only ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_only']."</strong>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_only);$k++){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('type','matrix_only');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $matrix_only_row)
				$all_value_matrix_only = $matrix_only_row->value;			
				
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_only[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++)
				{
					if($n == $all_value_matrix_only-1){
					echo "<td bgcolor='#F4F4F4' align='center'><input name='matrix_only[$i][$k][$n]' id='matrix_only[$i][$k][$n]' type='radio' checked='checked'/></td>";
					}else{
					echo "<td bgcolor='#F4F4F4' align='center'><input name='matrix_only[$i][$k][$n]' id='matrix_only[$i][$k][$n]' type='radio'/></td>";
					}
					//echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='radio' /></td>";
				}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				
				/*********************** เงื่อนไขของ matrix_multiple ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){ 
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_multiple']."</strong>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$ranking_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($ranking_matrix_multiple);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$ranking_matrix_multiple[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_multiple);$k++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_multiple[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++)
				{
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('ans_map',$this->uri->segment(4));
					$this->db->where('v_number',$no);
					$this->db->where('ans_number',$k+1);
					$this->db->where('mt_number',$n+1);
					$this->db->where('type','matrix_multiple');
					$query = $this->db->get('ans_value');
					foreach ($query->result() as $matrix_multiple_row)
					$all_value_matrix_multiple = $matrix_multiple_row->value;
					
					if($n == $all_value_matrix_multiple-1){
					echo "<td bgcolor='#F4F4F4' align='center'><input name='matrix_multiple_value[$i][$k][$n]' id='matrix_multiple_value[$i][$k][$n]' type='checkbox' checked='checked'/></td>";
					}else{
					echo "<td bgcolor='#F4F4F4' align='center'><input name='matrix_multiple_value[$i][$k][$n]' id='matrix_multiple_value[$i][$k][$n]' type='checkbox'/></td>";
					}
					//echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='checkbox' /></td>";
				}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				
				/*********************** เงื่อนไขของ single_textbox ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="single_textbox"){ 
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_single_textbox']."</strong>";
				echo "<br>";
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('type','single_textbox');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $single_textbox_row)
				$all_value_single_textbox = $single_textbox_row->value;
				
				echo "<input name='single_textbox_value[$i]' id='single_textbox_value[$i]' value='$all_value_single_textbox' class='k-textbox'>"."<p></p>";
				
				
						
				/*********************** เงื่อนไขของ mulitple_textbox ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitple_textbox"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitple_textbox']."</strong>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitple_textbox']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
					
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('type','mulitple_textbox');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $mulitple_textbox_row)
				$all_value_mulitple_textbox = $mulitple_textbox_row->value;
				
				echo "<p>"." ".$arr[$k]."<br><input name='mulitple_textbox_value[$i][$k]' id='mulitple_textbox_value[$i][$k]' class='k-textbox' value='$all_value_mulitple_textbox'>"."</p>";
				}
							
				/*********************** เงื่อนไขของ date_time ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="date_time"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_date_time']."</strong>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
					
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('type','date_time');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $date_time_row)
				$all_value_date_time = $date_time_row->value;
				$chang_data = @split(' ',@$all_value_date_time);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				
				
				echo "<p>"." ".@$arr[$k]."<br><input name='date_value$i$k' id='date_value$i$k' value='$chang_data[0]' > <input name='time_value$i$k' id='time_value$i$k' value='@$chang_data[1]' ></p>";
				}				
            }?>
            
		<?php } ?>   
            
        </td>
      </tr>
      <tr></tr>
    </table>
    <p>&nbsp;</p>
    <div id="light_question" class="white_content_question" align="left">
      <script>
    function showPage(showdiv){
        $('#midRight > div').hide()  
        $(showdiv).show();    
    }
    </script>
    <table width="100%" align="center" class="table_radius">
          <tr>
            <td width="30%" valign="top" bgcolor="#d2dbde" style="-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;">
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page1')"><img src="<?php echo base_url()?>images/icon_menu/icon_1.png" width="15"/> Mulitiple Choice (Only One Answer)</a>
            </p>
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page2')"><img src="<?php echo base_url()?>images/icon_menu/icon_2.png" width="15"/> Mulitiple Choice (Multiple Answer)</a>
            </p>
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page3')"><img src="<?php echo base_url()?>images/icon_menu/icon_3.png" width="15"/> Comment</a>
            </p>
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page4')"><img src="<?php echo base_url()?>images/icon_menu/icon_4.png" width="15"/> Ranking</a>
            </p>
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page5')"><img src="<?php echo base_url()?>images/icon_menu/icon_5.png" width="15"/> Ranking Scale</a>
            </p>
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page6')"><img src="<?php echo base_url()?>images/icon_menu/icon_6.png" width="15"/> Matrix of Choice (Only One Answer)</a>
            </p>
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page7')"><img src="<?php echo base_url()?>images/icon_menu/icon_7.png" width="15"/> Matrix of Choice (Multiple Answer)</a>
            </p>
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page8')"><img src="<?php echo base_url()?>images/icon_menu/icon_8.png" width="15"/> Single Textboxes</a>
            </p>
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page9')"><img src="<?php echo base_url()?>images/icon_menu/icon_9.png" width="15"/> Mulitple Textboxes</a>
            </p>
            <p>&nbsp;
            	<a style="cursor:pointer;" onclick="showPage('#home_page10')"><img src="<?php echo base_url()?>images/icon_menu/icon_10.png" width="15"/> Date and Time</a>
            </p>
            </td>
            <td width="70%" valign="top">
            <div id="midRight">
            <div id="home_page1" style="display:none;">
            <?php echo form_open('ci_manage_survey/mulitiple_only')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท Mulitiple Choice (Only One Answer)</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_mulitiple_only" id="question_mulitiple_only" type="text" class="k-textbox" style="width:80%" /></td>
              </tr>
			  <tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
			  <tr>
                <td><textarea name="answer_mulitiple_only" id="answer_mulitiple_only" class="k-textbox" style="width:70%; height:200px;"></textarea></td>
              </tr>
			  <tr>
                <td class="table_default"><input name="other_mulitiple_only" type="checkbox" value="other" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="check_mulitiple_only" type="checkbox" value="check" />บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>
            </div>
            <div id="home_page2" style="display:none;">
            <?php echo form_open('ci_manage_survey/mulitiple_multiple')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท Mulitiple Choice (Multiple Answer)</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_mulitiple_multiple" id="question_mulitiple_multiple" type="text" class="k-textbox" style="width:80%" /></td>
              </tr>
			  <tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
			  <tr>
                <td><textarea name="answer_mulitiple_multiple" id="answer_mulitiple_multiple" class="k-textbox" style="width:70%; height:200px;"></textarea></td>
              </tr>
              <tr>
                <td class="table_default"><input name="other_mulitiple_multiple" type="checkbox" value="other" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="check_mulitiple_multiple" type="checkbox" value="check" />บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>
            </div>
            <div id="home_page3" style="display:none;">
            <?php echo form_open('ci_manage_survey/comment')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท Comment</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="comment" id="comment" type="text" class="k-textbox" style="width:80%;" /></td>
              </tr>
			  <tr>
                <td class="table_default"><input name="check_comment" type="checkbox" value="check" />บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>
            </div>
            <div id="home_page4" style="display:none;">
            <?php echo form_open('ci_manage_survey/ranking')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท Ranking</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_ranking" id="question_ranking" type="text" class="k-textbox" style="width:80%" /></td>
              </tr>
			  <tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
			  <tr>
                <td><textarea name="answer_ranking" id="answer_ranking" class="k-textbox" style="width:70%; height:200px;"></textarea></td>
              </tr>
              <tr>
                <td class="table_default"><input name="other_ranking" type="checkbox" value="other" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="check_ranking" type="checkbox" value="check" />บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>            
            </div>
            <div id="home_page5" style="display:none;">
            <?php echo form_open('ci_manage_survey/ranking_scale')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท Ranking Scale</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_ranking_scale" id="question_ranking_scale" type="text" class="k-textbox" style="width:80%" /></td>
              </tr>
			  <tr>
                <td><strong>รายละเอียด</strong></td>
              </tr>
                <td width="70%" >
                <textarea name="answer_ranking_scale" id="answer_ranking_scale" cols="35" rows="8" class="k-textbox" style="width:100%;"></textarea>
                </td>
             </tr>
             <tr>
             	<td><strong>เกณฑ์</strong></td>
             </tr>
			<tr>
				<td width="70%"><textarea name="ranking_scale" id="ranking_scale" cols="35" rows="8" class="k-textbox" style="width:100%;"></textarea></td>
			</tr>
             <tr>
             	<td><strong>ค่าน้ำหนัก</strong></td>
             </tr>
			<tr>
				<td width="70%"><textarea name="ranking_scale_weight" id="ranking_scale_weight" cols="35" rows="8" class="k-textbox" style="width:100%;"></textarea></td>
			</tr>
 			  <tr>
                <td class="table_default"><input name="other_ranking_scale" type="checkbox" value="other" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="check_ranking_scale" type="checkbox" value="check" />บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>
            </div>
            <div id="home_page6" style="display:none;">
			<?php echo form_open('ci_manage_survey/matrix_only')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท Matrix of Choice (Only One Answer)</strong></td>
              </tr>
              <tr>
                <td><input name="question_matrix_only" id="question_matrix_only" type="text" class="k-textbox" style="width:80%" /></td>
              </tr>
              <tr>
                  <td></td>
			  <tr>
                <td width="70%" >ตัวเลือกแนวตั้ง<br />
                <textarea name="answer_matrix_only" id="answer_matrix_only" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea>
                </td>
             </tr>
			<tr>
                <td width="70%" >ตัวเลือกแนวนอน<br />
                <textarea name="ranking_matrix_only" id="ranking_matrix_only" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea>
                </td>
             </tr>
             <tr>
                <td class="table_default"><input name="other_matrix_only" type="checkbox" value="other" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="check_matrix_only" type="checkbox" value="check" />บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>
            </div>
            <div id="home_page7" style="display:none;">
            <?php echo form_open('ci_manage_survey/matrix_multiple')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท Matrix of Choice (Multiple Answer)</strong></td>
              </tr>
              <tr>
                <td><input name="question_matrix_multiple" id="question_matrix_multiple" type="text" class="k-textbox" style="width:80%" /></td>
              </tr>
              <tr>
                  <td></td>
			  <tr>
                <td width="70%" >ตัวเลือกแนวตั้ง<br />

                <textarea name="answer_matrix_multiple" id="answer_matrix_multiple" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea>
                </td>
             </tr>
             			  <tr>
                <td width="70%" >ตัวเลือกแนวนอน<br />

                <textarea name="ranking_matrix_multiple" id="ranking_matrix_multiple" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea>
                </td>
             </tr>
             <tr>
                <td class="table_default"><input name="other_matrix_multiple" type="checkbox" value="other" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="check_matrix_multiple" type="checkbox" value="check" />บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>
            </div>          
            <div id="home_page8" style="display:none;">
			<?php echo form_open('ci_manage_survey/single_textbox')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ปรเภท Single Textboxes</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
				<td><input name="question_single_textbox" id="question_single_textbox" type="text" class="k-textbox" style="width:80%" /></td>
              </tr>
              <tr>
                <td class="table_default"><input name="other_single_textbox" type="checkbox" value="other" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="check_single_textbox" type="checkbox" value="check" />บังคับให้ตอบคำถามนี้</td>
              </tr>
			<tr>
                <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>            
            </div>
            
            <div id="home_page9" style="display:none;">
			<?php echo form_open('ci_manage_survey/mulitple_textbox')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท Mulitple Textboxes</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_mulitple_textbox" id="question_mulitple_textbox" type="text" class="k-textbox" style="width:80%" /></td>
              </tr>
				<tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
				<tr>
                <td width="70%" >
                <textarea name="answer_mulitple_textbox" id="answer_mulitple_textbox" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea>
                </td>
             </tr>
             <tr>
                <td class="table_default"><input name="other_mulitple_textbox" type="checkbox" value="other" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="check_mulitple_textbox" type="checkbox" value="check" />บังคับให้ตอบคำถามนี้</td>
              </tr>
              <tr>
                <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>
            </div>
            
            <div id="home_page10" style="display:none;">
            <?php echo form_open('ci_manage_survey/date_time')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท Date and Time</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td>
                <input name="question_date_time" id="question_date_time" type="text" class="k-textbox" style="width:80%" />
                </td>
              </tr>
              <tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
                <td width="70%" >
                <textarea name="answer_date_time" id="answer_date_time" class="k-textbox" cols="45" rows="10" style="width:100%;"></textarea>
                </td>
			</tr>
			<tr>
                <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>
            </div>
			</div>
            </td>
          </tr>
        </table>
        <table width="100%">
        <tr>
          	<td align="right">
            <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'"><input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/></a></td>
       	  </tr>
        </table>
  </div>
    <p>&nbsp;</p>
    </td>
  </tr>
</table>
<?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
<?php if(@$_SESSION['qa_all'][$i]['type']=="date_time"){?>
<?php 
	  $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
	  $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
	  for($k=0;$k<count($arr);$k++){
?>
				
        <script>	
 
            $(document).ready(function () {
				// create DatePicker from input HTML element
                $("#date_value<?php echo $i ?><?php echo $k ?>").kendoDatePicker();

              });
            $(document).ready(function () {
                // create TimePicker from input HTML element
                $("#time_value<?php echo $i ?><?php echo $k ?>").kendoTimePicker();
              });


        </script>
<?php }}} ?>
<?php
		@session_start();
		@session_destroy();
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		$this->session->unset_userdata('question_subject');//ลบ session ของ heading
		$this->session->unset_userdata('user_id');//ลบ session ของ heading
?>


