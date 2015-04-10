<?php @session_start(); $all_session = $this->session->all_userdata(); 
?>
<!--ตัวแปร รับค่า session ทั้งหมด-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_default">
  <tr>
    <td align="center" bgcolor="#eaeaea"><table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="36" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
          <td width="36" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
          <td width="36" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
          <td width="36" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
          <td width="36" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
          <td width="36" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step1.png"/></td>
          <td width="36"><img src="<?php echo base_url()?>images/step2.png"/></td>
          <td width="36"><img src="<?php echo base_url()?>images/step3.png"/></td>
          <td width="32"><img src="<?php echo base_url()?>images/step.png"/></td>
          <td width="32"><img src="<?php echo base_url()?>images/step.png"/></td>
          <td width="32"><img src="<?php echo base_url()?>images/step.png"/></td>
          <td width="32"><img src="<?php echo base_url()?>images/step.png"/></td>
          <td width="32"><img src="<?php echo base_url()?>images/step.png"/></td>
        </tr>
      </table></td>
  </tr>
</table>
<p>
<p>
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius" >
  <tr>

    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;&nbsp;สร้างแบบสอบถามใหม่</strong></div>
    </td>
  </tr>
  <tr>
    <td valign="top"  background="<?php echo base_url()?>images/bg_survey.png"><?php 
	$popup_review = array(
		'width'      => '900',
		'height'     => '900',
		'scrollbars' => 'yes',
		//'status'     => 'yes',
		//'resizable'  => 'yes',
		'screenx'    => '0',
		'screeny'    => '0'
	);
?>


      <div align="center">
        <p><?php echo anchor_popup('report/review','<input type="button" class="k-button" value="แสดงตัวอย่าง" style="width:150px;"/>',$popup_review);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo anchor('survey/option_survey','<input type="button" class="k-button" value="ตั้งค่าแบบสอบถามและบันทึกข้อมูล" />');?></p>
      </div>

      <!-- Header : หัวข้อ/รายละเอียด/ประเภท -->
      <table width="90%" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="right"><a href = "javascript:void(0)" onclick = "document.getElementById('light_title').style.display='block';document.getElementById('fade').style.display='block'">
            <input type="submit" name="button" id="button" value="แก้ไขข้อมูล" class="k-button" />
            </a>
            <div id="fade" class="black_overlay"></div></td>
        </tr>
        <tr></tr>
      </table>
      <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
        <tr>
          <td width="21%" height="35"><strong>หัวข้อแบบสอบถาม</strong></td>
          <td width="79%" height="35"><?php echo @$all_session['heading']['title']?></td>
        </tr>
        <tr>
          <td height="35"><strong>ประเภทแบบสอบถาม</strong></td>
          <td height="35"><?php echo @$survey_category_session[0]['sc_name']?></td>
        </tr>
        <tr>
          <td height="35"><strong>รายละเอียดแบบสอบถาม</strong></td>
          <td height="35"><?php echo @$all_session['heading']['detail']?></td>
        </tr>
      </table>
      <div id="light_title" class="white_content_title" align="left">
	  <?php echo form_open('ci_manage_survey/list_data_create')?>
        <table width="90%" align="center" cellpadding="2" cellspacing="2">
          <tr>
            <td height="35"><h1>แก้ไขหัวข้อแบบสอบถาม</h1></td>
          </tr>
          <tr>
            <td height="35"><strong>หัวข้อแบบสอบถาม</strong>
              <input type="text" name="title" id="title" class="k-textbox" style="width:100%;" value="<?php echo @$all_session['heading']['title']?>"/></td>
          </tr>
          <tr>
            <td height="35"><strong>ประเภทแบบสอบถาม</strong>
              <select name="category" id="category" class="k-textbox" style="height:30px;width:100%;" required validationMessage="">
                <option value="<?php echo @$all_session['heading']['category']?>"><?php echo @$survey_category_session[0]['sc_name']?></option>
                <?php foreach($survey_category as $survey_category){?>
                <option value="<?php echo $survey_category['sc_id']?>"><?php echo @$survey_category['sc_name']?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td height="35" valign="top"><strong>รายละเอียดแบบสอบถาม</strong>
              <textarea name="detail" id="detail" cols="45" rows="3" class="k-textbox" style="width:100%;"><?php echo @$all_session['heading']['detail']?></textarea></td>
          </tr>
          <tr>
            <td height="35" align="right"><input name="Submit" type="submit" value="บันทึก" class="k-button" style="width:100px;"/>
              <a href = "javascript:void(0)" onclick = "document.getElementById('light_title').style.display='none';document.getElementById('fade').style.display='none'">
              <input type="reset" name="Reset" id="button" value="ยกเลิก" class="k-button" style="width:100px;"/>
              </a></td>
          </tr>
        </table>
        <?php echo form_close()?> </div>
      <P></P>


   <!--  ข้อมูลทั่วไป -->

      <table width="90%" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="right"><a href = "javascript:void(0)" onclick = "document.getElementById('light_category').style.display='block';document.getElementById('fade').style.display='block'">
            <input type="submit" name="button2" id="button2" value="เพิ่มข้อมูลทั่วไป" class="k-button" />
            </a>
            <div id="fade2" class="black_overlay"></div></td>
        </tr>
      </table>
   
         <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
        <tr>
          <td colspan="2"><?php for ($i = 0; $i < count(@$_SESSION['data_respondent']); $i++){?>
            <?php if(@$_SESSION['data_respondent'][$i]==1){?>
            <p><strong>เพศ</strong>
              <input name="" type="radio" value="" />
              ชาย
              <input name="" type="radio" value="" />
              หญิง
            
            <p>
              <?php }if(@$_SESSION['data_respondent'][$i]==2){?>
            
            <p><strong>อายุ</strong>
              <input name="" type="text" class="k-textbox" style="width:30px;"/>
              ปี
            
            <p>
              <?php }if(@$_SESSION['data_respondent'][$i]==3){?>
            
            <p><strong>อาชีพ</strong>
              <input name="" type="radio" />
              นักศึกษา
              <input name="" type="radio" />
              อาจารย์
              <input name="" type="radio" />
              บุคลากรสายสนับสนุน
              <input name="" type="radio" />
              บุคคลทั่วไป
            
            <p>
              <?php }if(@$_SESSION['data_respondent'][$i]==4){?>
            
            <p><strong>รายได้ส่วนตัวเฉลี่ยต่อเดือน</strong>
              <input name="" type="radio" />
              ไม่เกิน 5,000 บาท
              <input name="" type="radio" />
              5,001 - 10,000 บาท
              <input name="" type="radio" />
              10,001 - 15,000 บาท
              <input name="" type="radio" />
              15,001 - 20,000 บาท
              <input name="" type="radio" />
              20,001 - 25,000 บาท
              <input name="" type="radio" />
              25,001 บาทขึ้นไป
            
            <p>
              <?php }if(@$_SESSION['data_respondent'][$i]==5){?>
            
            <p><strong>การศึกษา</strong>
              <input name="" type="radio" />
              ต่ำกว่า ม.6
              <input name="" type="radio" />
              ปริญาตรี
              <input name="" type="radio" />
              ปริญาโท
              <input name="" type="radio" />
              ปริญาเอก
            
            <p>
              <?php }if(@$_SESSION['data_respondent'][$i]==6){?>
            
            <p><strong>สถานะภาพ</strong>
              <input name="" type="radio" />
              โสด
              <input name="" type="radio" />
              แต่งงานแล้ว
              <input name="" type="radio" />
              แยกกันอยู่
              <input name="" type="radio" />
              อย่าร้าง
            
            <p>
              <?php }if(@$_SESSION['data_respondent'][$i]==7){?>
            
            <p><strong>จังหวัด</strong>&nbsp;&nbsp;
            <select name="province" id="province" class="k-textbox" style="height:30px;width:200px;">
            <option value="">---------- เลือกจังหวัด ----------</option>
            <?php for($i=0;$i<count($province);$i++){?>
            <option value="<?php echo $province[$i]['PROVINCE_ID']?>"><?php echo $province[$i]['PROVINCE_NAME']?></option>
            <?php } ?>
            </select>
            
            <p>
              <?php } ?>
              <?php } ?>
      </td>
      </tr>
      
      <tr>  
      <td>    
            <p>
            <div align="center" style="color:#CCCCCC; font-size:22px;">พื้นที่ข้อมูลทั่วไป ของแบบสำรวจ</div>
            </p></td>
        </tr>
      </table>
<!-- พื้นที่แทรกTemp -->
   <!---- แทรก Temp ---->
          <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
      <tr>
        <td height="35"><table width="100%" align="center">
      

		<?php for($i=0;$i<count(@$_SESSION['temp_all']);$i++){?>

       		<?php 
				/*********************** เงื่อนไขของ mulitiple_only ***********************/
			if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_only"){ 
				if(@$_SESSION['temp_all'][$i]['check_mulitiple_only']!=""){$mark_mulitiple_only = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_mulitiple_only."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_mulitiple_only']."</strong>";
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($a=0;$a<count($arr);$a++){
				echo "<input name='other_mulitiple_only' id='other_mulitiple_only' type='radio' value='' />";
				echo $arr[$a]."<br>";}
				if(@$_SESSION['temp_all'][$i]['other_mulitiple_only']!=""){
				echo "<input name='other_mulitiple_only' id='other_mulitiple_only' type='radio' value='' />
				<input name='open_mulitiple_only' id='open_mulitiple_only' type='text' class='k-textbox' />";}
				echo "<br><hr style='border:solid 1px #000000;'>";
       	 		echo "</td></tr>";
			
				/*********************** เงื่อนไขของ mulitiple_multiple ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_multiple"){
				if(@$_SESSION['temp_all'][$i]['check_mulitiple_multiple']!=""){$mark_mulitiple_multiple = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_mulitiple_multiple."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_mulitiple_multiple']."</strong>";
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($a=0;$a<count($arr);$a++){
				echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />";
				echo $arr[$a]."<br>";}
				if(@$_SESSION['temp_all'][$i]['other_mulitiple_multiple']!=""){
				echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />
				<input name='open_mulitiple_multiple' id='open_mulitiple_multiple' type='text' class='k-textbox' />";}
				echo "<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
            
				/*********************** เงื่อนไขของ comment ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="comment"){ 
				if(@$_SESSION['temp_all'][$i]['check_comment']!=""){$mark_comment = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_comment."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['comment']."</strong>";
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				echo "<textarea name='' id='' style='width:75%; height:80px;' class='k-textbox'></textarea>"."<br><hr style='border:solid 1px #000000;'>";
            	echo "</td></tr>";
				
				/*********************** เงื่อนไขของ ranking ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="ranking"){
				if(@$_SESSION['temp_all'][$i]['check_ranking']!=""){$mark_ranking = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_ranking."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_ranking']."</strong>";
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"."<input name='answer_ranking[]' id='answer_ranking[]' type='number' class='k-textbox' style='width:50px;' min='1' />"." ".$arr[$k]."</p>";}
				echo "<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
			
				/*********************** เงื่อนไขของ ranking_scale ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="ranking_scale"){ 
				if(@$_SESSION['temp_all'][$i]['check_ranking_scale']!=""){$mark_ranking_scale = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_ranking_scale."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_ranking_scale']."</strong>";
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($a=0;$a<count($arr);$a++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$a]."</td>";}
				echo "</tr>";
  				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($m=0;$m<count($answer_ranking_scale);$m++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_ranking_scale[$m]."</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($b=0;$b<count($arr);$b++){
				echo "<td bgcolor='#F4F4F4' align='center' ><input name='ranking_scale".$m."[]' type='radio' value='".$b."' /></td>";}
				echo "</tr>";}
				echo "</table>"."<br><hr style='border:solid 1px #000000;'>";		
				echo "</td></tr>";
						
				/*********************** เงื่อนไขของ matrix_only ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="matrix_only"){
				if(@$_SESSION['temp_all'][$i]['check_matrix_only']!=""){$mark_matrix_only = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_matrix_only."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_matrix_only']."</strong>";
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($answer_matrix_only);$k++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_only[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($n=0;$n<count($arr);$n++){
				echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='radio' /></td>";}
				echo "</tr>";}
				echo "</table>"."<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
				
				/*********************** เงื่อนไขของ matrix_multiple ***********************/
            }else if(@$_SESSION['temp_all'][$i]['type']=="matrix_multiple"){ 
				if(@$_SESSION['temp_all'][$i]['check_matrix_multiple']!=""){$mark_matrix_multiple = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_matrix_multiple."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_matrix_multiple']."</strong>";
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($answer_matrix_multiple);$k++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_multiple[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($n=0;$n<count($arr);$n++){
				echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='checkbox' /></td>";}
				echo "</tr>";}
				echo "</table>"."<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
				
				/*********************** เงื่อนไขของ single_textbox ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="single_textbox"){ 
				if(@$_SESSION['temp_all'][$i]['check_single_textbox']!=""){@$mark_single_textbox = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_single_textbox."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_single_textbox']."</strong>";
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				echo "<input name='answer_single_textbox' id='answer_single_textbox' class='k-textbox'>"."<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
						
				/*********************** เงื่อนไขของ mulitple_textbox ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="mulitple_textbox"){
				if(@$_SESSION['temp_all'][$i]['check_mulitple_textbox']!=""){$mark_mulitple_textbox = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_mulitple_textbox."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_mulitple_textbox']."</strong>";
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitple_textbox']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"." ".$arr[$k]."<br><input name='answer_mulitple_textbox' id='answer_mulitple_textbox' class='k-textbox'>"."</p>";}
				echo "<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
							
				/*********************** เงื่อนไขของ date_time ***********************/
			}else if(@$_SESSION['temp_all'][$i]['type']=="date_time"){
				if(@$_SESSION['temp_all'][$i]['check_date_time']!=""){$mark_date_time = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_date_time."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_date_time'];
				echo anchor('ci_manage_survey/edit_session_after/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session_after/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"." ".$arr[$k]."<br><input name='answer_date".$k."' id='answer_date".$k."'> <input name='answer_time".$k."' id='answer_time".$k."' ></p>";}
				echo "<br><hr style='border:solid 1px #000000;'>";	
				echo "</td></tr>";			
            }?>
            
		<?php } ?>   
              <tr>
                <td><p>
                  <div align="center" style="color:#CCCCCC; font-size:22px;">พื้นที่ตั้งคำถาม ของแบบสำรวจ</div>
                  </p></td>
              </tr>
            </table></td>
        </tr>
        <tr></tr>
      </table>
      <!-- สิ้นสดพื้นที่แทรก temp -->


      <!--  popup แทรกข้อมูลทั่วไป -->
      <div id="light_category" class="white_content_category" align="left"> <?php echo form_open('ci_manage_survey/list_check_category')?>
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
            <td width="3%" height="35" bgcolor="#D2DBDE"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="1" <?php echo @$respondent1?>/></td>
            <td width="31%" bgcolor="#D2DBDE">เพศ</td>
            <td width="3%" bgcolor="#D2DBDE"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="2" <?php echo @$respondent2?>/></td>
            <td width="29%" bgcolor="#D2DBDE">อายุ</td>
            <td width="3%" bgcolor="#D2DBDE"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="3" <?php echo @$respondent3?>/></td>
            <td width="31%" bgcolor="#D2DBDE">อาชีพ</td>
          </tr>
          <tr>
            <td height="35" bgcolor="#D2DBDE"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="4" <?php echo @$respondent4?>/></td>
            <td bgcolor="#D2DBDE">รายได้</td>
            <td bgcolor="#D2DBDE"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="5" <?php echo @$respondent5?>/></td>
            <td bgcolor="#D2DBDE">การศึกษา</td>
            <td bgcolor="#D2DBDE"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="6" <?php echo @$respondent6?>/></td>
            <td height="35" bgcolor="#D2DBDE">สถานะภาพ</td>
          </tr>
          <tr>
            <td width="3%" height="35" bgcolor="#D2DBDE"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="7" <?php echo @$respondent7?>/></td>
            <td width="31%" bgcolor="#D2DBDE">จังหวัด</td>
          </tr>
          <tr>
        <?php 
		$popup_temp = array(
			'width'      => '900',
			'height'     => '600',
			'scrollbars' => 'yes',
			'screenx'    => '0',
			'screeny'    => '0'
		);?>
            <td height="35" colspan="6" align="right"><input name="Submit2" type="submit" value="บันทึก" class="k-button" style="width:100px;"/>
              <a href = "javascript:void(0)" onclick = "document.getElementById('light_category').style.display='none';document.getElementById('fade').style.display='none'">
              <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:100px;"/>
              </a></td>
          </tr>
        </table>


        <!--  ปิดแทรกTemplate   -->

<?php echo form_close()?> 

<?php echo form_open('ci_manage_temp/select_temp')?>
<table width="90%" border="0" cellpadding="2" cellspacing="2" align="center">
  <tr>
    <td>
    <table id="grid_temp">
                <thead>
                    <tr>
                      <th data-field="select"><div align="center">#</div></th>
                      <th data-field="temp_title"><div align="center">หัวข้อคำถาม</div></th>
                      <th data-field="temp_detail"><div align="center">รายละเอียด</div></th>
                    </tr>
                </thead>
                <tbody>
                	<?php $i=0;?>
                    <?php foreach($template_subject as $template_subject){?>
                    <?php if($template_subject['temp_id']!=0){?>
               	  <tr>
                 	  <td><div align="center">
					  <?php if($template_subject['temp_id'] == @$all_session['temp_id'][$i]||$template_subject['temp_id'] == @$all_session['temp_id'][$i][$i]){?>
             			<input name="temp_id[<?php echo $i ?>]" type="checkbox" id="temp_id[<?php echo $i ?>]" value="<?php echo $template_subject['temp_id']?>" checked="checked" >
                      <?php }else{?>
                      	<input name="temp_id[<?php echo $i ?>]" type="checkbox" value="<?php echo $template_subject['temp_id']?>" id="temp_id[<?php echo $i ?>]">
                       <?php }?>
               	    </div></td>
                      <td><?php echo $template_subject['temp_title']?></td>
                      <td><?php echo $template_subject['temp_detail']?></td>

                    </tr>
                    <?php }$i++;} ?>
                </tbody>
    </table>
    </td>
  </tr>
</table>
<p>
<a href="javascript:window.close();"><input name="" type="submit" value="เลือก" class="k-button" style="width:150px;"></a><a href = "javascript:void(0)" onclick = "document.getElementById('light_category').style.display='none';document.getElementById('fade').style.display='none'">
<input type="reset" name="button6" id="button6" value="ยกเลิก" class="k-button" style="width:100px;"/>
</a></p>
			<?php echo form_close()?>
<script>
                $(document).ready(function() {
                    $("#grid_temp").kendoGrid({
                        //height: 430,
                        sortable: true,
						dataSource: {pageSize: 20},
						columns: [
                            { field: "select",width: "10%"},
                            { field: "temp_title",width: "45%"},
                            { field: "temp_detail",width: "45%"}],
                    });
                });
</script>


        <!--  ปิดแทรกTemplate   -->

<?php echo form_close()?>

</div>

     



      <p></p>
      <table width="90%" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="right"><a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='block';document.getElementById('fade').style.display='block'">
            <input type="submit" name="button4" id="button4" value="ตั้งคำถาม" class="k-button"/>
            </a>
            <div id="fade2" class="black_overlay"></div></td>
        </tr>
      </table>
      <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
        <tr>
          <td height="35"><table width="100%" align="center">
              <?php for($i=0;$i<count(@$_SESSION['temp_all']);$i++){?>
              <?php 
				/*********************** เงื่อนไขของ mulitiple_only ***********************/
			if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){ 
				if(@$_SESSION['qa_all'][$i]['check_mulitiple_only']!=""){$mark_mulitiple_only = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_mulitiple_only."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_only']."</strong>";
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($a=0;$a<count($arr);$a++){
				echo "<input name='other_mulitiple_only' id='other_mulitiple_only' type='radio' value='' />";
				echo $arr[$a]."<br>";}
				if(@$_SESSION['qa_all'][$i]['other_mulitiple_only']!=""){
				echo "<input name='other_mulitiple_only' id='other_mulitiple_only' type='radio' value='' />
				<input name='open_mulitiple_only' id='open_mulitiple_only' type='text' class='k-textbox' />";}
				echo "<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
				
				/*********************** เงื่อนไขของ mulitiple_multiple ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){
				if(@$_SESSION['qa_all'][$i]['check_mulitiple_multiple']!=""){$mark_mulitiple_multiple = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_mulitiple_multiple."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_multiple']."</strong>";
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($a=0;$a<count($arr);$a++){
				echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />";
				echo $arr[$a]."<br>";}
				if(@$_SESSION['qa_all'][$i]['other_mulitiple_multiple']!=""){
				echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />
				<input name='open_mulitiple_multiple' id='open_mulitiple_multiple' type='text' class='k-textbox' />";}
				echo "<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
            
				/*********************** เงื่อนไขของ comment ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="comment"){ 
				if(@$_SESSION['qa_all'][$i]['check_comment']!=""){$mark_comment = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_comment."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['comment']."</strong>";
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				echo "<textarea name='' id='' style='width:75%; height:80px;' class='k-textbox'></textarea>"."<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
				
				/*********************** เงื่อนไขของ ranking ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){
				if(@$_SESSION['qa_all'][$i]['check_ranking']!=""){$mark_ranking = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_ranking."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking']."</strong>";
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"."<input name='answer_ranking[]' id='answer_ranking[]' type='number' class='k-textbox' style='width:50px;' min='1' />"." ".$arr[$k]."</p>";}
				echo "<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";
			
				/*********************** เงื่อนไขของ ranking_scale ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){ 
				if(@$_SESSION['qa_all'][$i]['check_ranking_scale']!=""){$mark_ranking_scale = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_ranking_scale."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking_scale']."</strong>";
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($a=0;$a<count($arr);$a++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$a]."</td>";}
				echo "</tr>";
  				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($m=0;$m<count($answer_ranking_scale);$m++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_ranking_scale[$m]."</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($b=0;$b<count($arr);$b++){
				echo "<td bgcolor='#F4F4F4' align='center' ><input name='ranking_scale".$m."[]' type='radio' value='".$b."' /></td>";}
				echo "</tr>";}
				echo "</table>"."<br><hr style='border:solid 1px #000000;'>";		
				echo "</td></tr>";	
						
				/*********************** เงื่อนไขของ matrix_only ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){
				if(@$_SESSION['qa_all'][$i]['check_matrix_only']!=""){$mark_matrix_only = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_matrix_only."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_only']."</strong>";
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($answer_matrix_only);$k++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_only[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($n=0;$n<count($arr);$n++){
				echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='radio' /></td>";}
				echo "</tr>";}
				echo "</table>"."<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";	
				
				/*********************** เงื่อนไขของ matrix_multiple ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){ 
				if(@$_SESSION['qa_all'][$i]['check_matrix_multiple']!=""){$mark_matrix_multiple = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_matrix_multiple."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_multiple']."</strong>";
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($answer_matrix_multiple);$k++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_multiple[$k]."</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($n=0;$n<count($arr);$n++){
				echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='checkbox' /></td>";}
				echo "</tr>";}
				echo "</table>"."<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";	
				
				/*********************** เงื่อนไขของ single_textbox ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="single_textbox"){ 
				if(@$_SESSION['qa_all'][$i]['check_single_textbox']!=""){@$mark_single_textbox = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_single_textbox."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_single_textbox']."</strong>";
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				echo "<input name='answer_single_textbox' id='answer_single_textbox' class='k-textbox'>"."<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";	
						
				/*********************** เงื่อนไขของ mulitple_textbox ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitple_textbox"){
				if(@$_SESSION['qa_all'][$i]['check_mulitple_textbox']!=""){$mark_mulitple_textbox = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_mulitple_textbox."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitple_textbox']."</strong>";
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitple_textbox']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"." ".$arr[$k]."<br><input name='answer_mulitple_textbox' id='answer_mulitple_textbox' class='k-textbox'>"."</p>";}
				echo "<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";	
							
				/*********************** เงื่อนไขของ date_time ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="date_time"){
				if(@$_SESSION['qa_all'][$i]['check_date_time']!=""){$mark_date_time = "<span style='color:red;'>*</span>";}
				echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
				echo @$mark_date_time."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_date_time'];
				echo anchor('ci_manage_survey/edit_session/'.$i.'','<img src="'.base_url().'images/update_icon.png" width="20"/>  ').anchor('ci_manage_survey/unset_session/'.$i.'','<img src="'.base_url().'images/delete_icon.png" width="20"/>' , array('onClick' => "return confirm('คุณต้องการที่จะลบคำถามใช่หรือไม่?')"));
				echo "<br></td></tr><tr><td><br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
				for($k=0;$k<count($arr);$k++){
				echo "<p>"." ".$arr[$k]."<br><input name='answer_date".$k."' id='answer_date".$k."'> <input name='answer_time".$k."' id='answer_time".$k."' ></p>";}
				echo "<br><hr style='border:solid 1px #000000;'>";
				echo "</td></tr>";				
            }?>
              <?php } ?>
              <tr>
                <td><p>
                  <div align="center" style="color:#CCCCCC; font-size:22px;">พื้นที่ตั้งคำถาม ของแบบสำรวจ</div>
                  
                  <?php 
				  //echo "<pre>" ;
				  //print_r($_SESSION['qa_all']); ?>
                  </p></td>
              </tr>
            </table></td>
        </tr>
        <tr></tr>
      </table>
      <table width="90%" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="right"><a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='block';document.getElementById('fade').style.display='block'">
            <input type="submit" name="button4" id="button4" value="ตั้งคำถาม" class="k-button"/>
            </a>
            <div id="fade2" class="black_overlay"></div></td>
        </tr>
      </table>
      
      <!---------------------------- หน้าต่าง PopUp > แทรกคำถาม ---------------------------->
      
      <div id="light_question" class="white_content_question" align="left"> 
        <script>
    function showPage(showdiv){
        $('#midRight > div').hide()  
        $(showdiv).show();    
    }
    </script>
        <table width="100%" align="center" class="table_radius">
          <tr>
            <td width="30%" valign="top" bgcolor="#d2dbde" style="-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;"><p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page1')"><img src="<?php echo base_url()?>images/icon_menu/icon_1.png" width="15"/> คำถามแบบเลือกตอบเพียง 1 คำตอบ</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page2')"><img src="<?php echo base_url()?>images/icon_menu/icon_2.png" width="15"/> คำถามแบบเลือกตอบหลายคำตอบ</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page3')"><img src="<?php echo base_url()?>images/icon_menu/icon_3.png" width="15"/> คำถามแบบคำตอบยาว</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page4')"><img src="<?php echo base_url()?>images/icon_menu/icon_4.png" width="15"/> ตัวเลือกอันดับ</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page5')"><img src="<?php echo base_url()?>images/icon_menu/icon_5.png" width="15"/> การจัดลำดับทัศนคติ</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page6')"><img src="<?php echo base_url()?>images/icon_menu/icon_6.png" width="15"/> คำถามแบบเลือกตอบ 1 คำตอบในรูปแบบเมตริก</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page7')"><img src="<?php echo base_url()?>images/icon_menu/icon_7.png" width="15"/> คำถามแบบเลือกหลายคำตอบในรูปแบบเมตริก</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page8')"><img src="<?php echo base_url()?>images/icon_menu/icon_8.png" width="15"/> คำถามคำตอบแบบสั้น</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page9')"><img src="<?php echo base_url()?>images/icon_menu/icon_9.png" width="15"/> คำถามคำตอบแบบสั้นหลายคำตอบ</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onclick="showPage('#home_page10')"><img src="<?php echo base_url()?>images/icon_menu/icon_10.png" width="15"/> วันและเวลา</a> </p></td>
            <td width="70%" valign="top" ><div id="midRight">
                
                <!------------ หน้าแรก PopUp > แทรกคำถาม ---------->
                <div>
                  <table width="95%" align="center">
                    <tr>
                      <td align="center"><p><br />
                          <br />
                          <img src="<?php echo base_url()?>images/esanpoll_logo.png"/></p>
                        <br />
                        <br />
                        <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ปิดหน้าต่าง" class="k-button" style="width:225px;"/>
                        </a></td>
                    </tr>
                  </table>
                </div>
                <div id="home_page1" style="display:none;"> <?php echo form_open('ci_manage_survey/mulitiple_only')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท คำถามแบบเลือกตอบเพียง 1 คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_mulitiple_only" id="question_mulitiple_only" type="text" class="k-textbox" style="width:100%" placeholder="พิมพ์คำถาม" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td><textarea name="answer_mulitiple_only" id="answer_mulitiple_only" class="k-textbox" style="width:100%; height:200px; " placeholder="พิมพ์คำตอบ : ข้อความ 1 บรรทัดต่อ 1 คำตอบ  และห้ามมีเครื่องหมาย / "></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_mulitiple_only" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_mulitiple_only" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page2" style="display:none;"> <?php echo form_open('ci_manage_survey/mulitiple_multiple')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท  คำถามแบบเลือกตอบหลายคำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_mulitiple_multiple" id="question_mulitiple_multiple" type="text" class="k-textbox" style="width:100%" placeholder="พิมพ์คำถาม" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td><textarea name="answer_mulitiple_multiple" id="answer_mulitiple_multiple" class="k-textbox" style="width:100%; height:200px;" placeholder="พิมพ์คำตอบ : ข้อความ 1 บรรทัดต่อ 1 คำตอบ  และห้ามมีเครื่องหมาย / "></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_mulitiple_multiple" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_mulitiple_multiple" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page3" style="display:none;"> <?php echo form_open('ci_manage_survey/comment')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท คำถามแบบคำตอบยาว</strong></td>
                    <tr>
                    </tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="comment" id="comment" type="text" class="k-textbox" style="width:100%;" placeholder="พิมพ์คำถาม" /></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_comment" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page4" style="display:none;"> <?php echo form_open('ci_manage_survey/ranking')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท ตัวเลือกอันดับ</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_ranking" id="question_ranking" type="text" class="k-textbox" style="width:100%" placeholder="พิมพ์คำถาม" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td><textarea name="answer_ranking" id="answer_ranking" class="k-textbox" style="width:100%; height:200px;" placeholder="พิมพ์คำตอบ : ข้อความ 1 บรรทัดต่อ 1 คำตอบ  และห้ามมีเครื่องหมาย / "></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_ranking" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_ranking" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr            >
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page5" style="display:none;"> <?php echo form_open('ci_manage_survey/ranking_scale')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท การจัดลำดับทัศนคติ</strong></td>
                    </tr>
                    <tr>
                      <td><strong>หัวข้อคำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_ranking_scale" id="question_ranking_scale" type="text" class="k-textbox" style="width:100%" placeholder="พิมพ์คำถาม" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td width="100%" ><textarea name="answer_ranking_scale" id="answer_ranking_scale" cols="35" rows="8" class="k-textbox" style="width:100%;"  placeholder="พิมพ์คำตอบ : ข้อความ 1 บรรทัดต่อ 1 คำตอบ  และห้ามมีเครื่องหมาย /" ></textarea></td>
                    </tr>
                  </table>
                  <table width="95%" align="center">
                    <tr>
                      <td width="65%"><strong>ตัวเลือก</strong></td>
                      <td width="35%" align="center"><strong>ค่าน้ำหนัก</strong></td>
                    </tr>
                    <tr>
                      <td width="65%"><textarea name="ranking_scale" id="ranking_scale" cols="35" rows="8" class="k-textbox" style="width:100%;"  placeholder="พิมพ์ข้อความแทนค่าน้ำหนัก เช่น มากที่สุด ,มาก , ปานกลาง ฯลฯ  1 บรรทัดต่อ 1 ตัวเลือก  และห้ามมีเครื่องหมาย" ></textarea></td>
                      <td width="35%"><textarea name="ranking_scale_weight" id="ranking_scale_weight" cols="35" rows="8" class="k-textbox" style="width:100%;" placeholder="กรอกค่าน้ำหนัก : ตัวเลขกำหนดค่าน้ำหนักของข้อความทางซ้าย 1 บรรทัดต่อ 1 ค่า และต้องจัดตรงกับข้อความ" ></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_ranking_scale" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_ranking_scale" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                  </table>
                  <table>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page6" style="display:none;"> <?php echo form_open('ci_manage_survey/matrix_only')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท คำถามแบบเลือกตอบ 1 คำตอบในรูปแบบเมตริก</strong></td>
                    </tr>
                    <tr>
                      <td><strong>หัวข้อคำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_matrix_only" id="question_matrix_only" type="text" class="k-textbox" style="width:100%" placeholder="พิมพ์หัวข้อของคำถาม" /></td>
                    </tr>
                    <tr>
                      <td></td>
                    <tr>
                      <td width="100%" >คำถาม<br />
                        <textarea name="answer_matrix_only" id="answer_matrix_only" cols="45" rows="10" class="k-textbox" style="width:100%;" placeholder="พิมพ์คำถาม : ข้อความ 1 บรรทัดต่อ 1 คำถาม  และห้ามมีเครื่องหมาย /"></textarea></td>
                    </tr>
                    <tr>
                      <td width="100%" >ตัวเลือกแนวนอน<br />
                        <textarea name="ranking_matrix_only" id="ranking_matrix_only" cols="45" rows="10" class="k-textbox" style="width:100%;" placeholder="พิมพ์ข้อความคำตอบแบบคอลัมน์ เข่น ทุกวัน , 2-3วันต่อครั้ง , นานๆครั้ง ฯลฯ  ข้อความ 1 บรรทัดต่อ 1 คำตอบ  และห้ามมีเครื่องหมาย /"></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_matrix_only" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_matrix_only" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page7" style="display:none;"> <?php echo form_open('ci_manage_survey/matrix_multiple')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท คำถามแบบเลือกหลายคำตอบในรูปแบบเมตริก</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_matrix_multiple" id="question_matrix_multiple" type="text" class="k-textbox" style="width:100%" placeholder="พิมพ์หัวข้อของคำถาม" /></td>
                    </tr>
                    <tr>
                      <td></td>
                    <tr>
                      <td width="100%" >ตัวเลือกแนวตั้ง<br />
                        <textarea name="answer_matrix_multiple" id="answer_matrix_multiple" cols="45" rows="10" class="k-textbox" style="width:100%;" placeholder="พิมพ์คำถาม : ข้อความ 1 บรรทัดต่อ 1 คำถาม  และห้ามมีเครื่องหมาย /"></textarea></td>
                    </tr>
                    <tr>
                      <td width="100%" >ตัวเลือกแนวนอน<br />
                        <textarea name="ranking_matrix_multiple" id="ranking_matrix_multiple" cols="45" rows="10" class="k-textbox" style="width:100%;" placeholder="พิมพ์ข้อความคำตอบแบบคอลัมน์ เข่น ทุกวัน , 2-3วันต่อครั้ง , นานๆครั้ง ฯลฯ  ข้อความ 1 บรรทัดต่อ 1 คำตอบ  และห้ามมีเครื่องหมาย /"></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_matrix_multiple" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_matrix_multiple" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page8" style="display:none;"> <?php echo form_open('ci_manage_survey/single_textbox')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท คำถามคำตอบแบบสั้น</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_single_textbox" id="question_single_textbox" type="text" class="k-textbox" style="width:100%" placeholder="พิมพ์คำถาม" /></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_single_textbox" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_single_textbox" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page9" style="display:none;"> <?php echo form_open('ci_manage_survey/mulitple_textbox')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท คำถามคำตอบแบบสั้นหลายคำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_mulitple_textbox" id="question_mulitple_textbox" type="text" class="k-textbox" style="width:100%" placeholder="พิมพ์คำถาม" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td width="100%" ><textarea name="answer_mulitple_textbox" id="answer_mulitple_textbox" cols="45" rows="10" class="k-textbox" style="width:100%;" placeholder="พิมพ์คำตอบ : ข้อความ 1 บรรทัดต่อ 1 คำตอบ  และห้ามมีเครื่องหมาย / "></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_mulitple_textbox" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_mulitple_textbox" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page10" style="display:none;"> <?php echo form_open('ci_manage_survey/date_time')?>
                  <p>
                  <table width="95%" align="center">
                    <tr>
                      <td><strong>ประเภท วันและเวลา</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_date_time" id="question_date_time" type="text" class="k-textbox" style="width:100%" placeholder="พิมพ์คำถาม" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td width="100%" ><textarea name="answer_date_time" id="answer_date_time" class="k-textbox" cols="45" rows="10" style="width:100%;" placeholder="พิมพ์คำตอบ : ข้อความ 1 บรรทัดต่อ 1 คำตอบ  และห้ามมีเครื่องหมาย / "></textarea></td>
                    </tr>
                    <tr>
                      <td><p></p></td>
                    </tr>
                    <tr>
                      <td align="right"><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/>
                        &nbsp;&nbsp; <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
                        <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
                        </a></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
              </div></td>
          </tr>
        </table>
      </div>
      
      <!---------------------------- สิ้นสุดหน้าต่าง PopUp > แทรกคำถาม ---------------------------->
      
      <p>&nbsp;</p></td>
  </tr>
</table>
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
                $("#answer_date<?php echo $k;?>").kendoDatePicker();

              });
            $(document).ready(function () {
                // create TimePicker from input HTML element
                $("#answer_time<?php echo $k;?>").kendoTimePicker();
              });


        </script>
<?php }}} ?>
