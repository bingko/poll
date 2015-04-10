<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_default">
  <tr>
    <td><h3 class="text-warning">&nbsp;สร้างแบบสำรวจข้อมูล</h3></td>
  </tr>
</table>
<p><p>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_radius">
  <tr>
    <td valign="top">
    <h2>&nbsp;&nbsp;สร้างแบบสอบถามใหม่</h2>
    <table width="90%" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right">
         <a href = "javascript:void(0)" onclick = "document.getElementById('light_title').style.display='block';document.getElementById('fade').style.display='block'"><input type="submit" name="button" id="button" value="แก้ไขข้อมูล" class="k-button" /></a>
        <div id="fade" class="black_overlay"></div>
        </td>
      </tr>
      <tr></tr>
    </table>
    <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
      <tr>
        <td width="21%" height="35"><strong>หัวข้อแบบสอบถาม</strong></td>
        <td width="79%" height="35"><?php echo $this->session->userdata('title')?></td>
      </tr>
      <tr>
        <td height="35"><strong>ประเภทแบบสอบถาม</strong></td>
        <td height="35"><?php echo $this->session->userdata('category')?></td>
      </tr>
      <tr>
        <td height="35"><strong>รายละเอียดแบบสอบถาม</strong></td>
        <td height="35"><?php echo $this->session->userdata('detail')?></td>
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
        <input type="text" name="title" id="title" class="k-textbox" style="width:100%;" value="<?php echo $this->session->userdata('title')?>"/>
        </td>
      </tr>
      <tr>
        <td height="35"><strong>ประเภทแบบสอบถาม</strong></td>
        <td height="35">
	<select name="category" id="category" class="k-textbox" style="height:30px;width:100%;" required validationMessage="">
	<option value="<?php echo $this->session->userdata('category')?>"><?php echo $this->session->userdata('category')?></option>
	<option value="เศรษฐกิจ">เศรษฐกิจ</option>
	<option value="การเมือง">การเมือง</option>
	<option value="สังคม">สังคม</option>
	</select>
        </td>
      </tr>
      <tr>
        <td height="35" valign="top"><strong>รายละเอียดแบบสอบถาม</strong></td>
        <td height="35">
        <textarea name="detail" id="detail" cols="45" rows="3" class="k-textbox" style="width:100%;"><?php echo $this->session->userdata('detail')?></textarea>
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
    <table width="90%" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right"><a href = "javascript:void(0)" onclick = "document.getElementById('light_category').style.display='block';document.getElementById('fade').style.display='block'">
          <input type="submit" name="button2" id="button2" value="เพิ่มข้อมูลทั่วไป" class="k-button" /></a>
          <div id="fade2" class="black_overlay"></div></td>
      </tr>
    </table>
    <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
      <tr>
        <td colspan="2">
		<?php for ($i = 0; $i < 10; $i++){?>
			<?php if($this->session->userdata($i)==1){?>
            <p><strong>เพศ</strong> <input name="" type="radio" value="" />ชาย <input name="" type="radio" value="" />หญิง<p>
            <?php }if($this->session->userdata($i)==2){?>
            <p><strong>อายุ</strong> <input name="" type="text" class="k-textbox" style="width:30px;"/> ปี<p>
            <?php }if($this->session->userdata($i)==3){?>
            <p><strong>อาชีพ</strong>
            <input name="" type="radio" />นักศึกษา
            <input name="" type="radio" />อาจารย์
            <input name="" type="radio" />บุคลากรสายสนับสนุน
            <input name="" type="radio" />บุคคลทั่วไป<p>
            <?php }if($this->session->userdata($i)==4){?>
            <p><strong>รายได้ส่วนตัวเฉลี่ยนต่อเดือน</strong>
            <input name="" type="radio" />ไม่เกิน 5,000 บาท
            <input name="" type="radio" />5,001 - 10,000 บาท
            <input name="" type="radio" />10,001 - 15,000 บาท
            <input name="" type="radio" />15,001 - 20,000 บาท
            <input name="" type="radio" />20,001 - 25,000 บาท
            <input name="" type="radio" />25,001 บาทขึ้นไป<p>
            <?php }if($this->session->userdata($i)==5){?>
            <p><strong>การศึกษา</strong>
            <input name="" type="radio" />ต่ำกว่า ม.6
            <input name="" type="radio" />ปริญาตรี
            <input name="" type="radio" />ปริญาโท
            <input name="" type="radio" />ปริญาเอก<p>
            <?php }if($this->session->userdata($i)==6){?>
            <p><strong>การศึกษา</strong>
            <input name="" type="radio" />โสด
            <input name="" type="radio" />แต่งงานแล้ว
            <input name="" type="radio" />แยกกันอยู่
            <input name="" type="radio" />อย่าร้าง<p>
            <?php } ?>
        <?php } ?>
        </td>
      </tr>
    </table>
    <div id="light_category" class="white_content_title" align="left">
	<?php echo form_open('ci_manage_survey/list_check_category')?>
      <?php for ($i = 0; $i < 10; $i++){?>
			<?php 
			if($this->session->userdata($i)==1){
				$respondent1 = 'checked="checked"';
            }if($this->session->userdata($i)==2){
				$respondent2 = 'checked="checked"';
            }if($this->session->userdata($i)==3){
				$respondent3 = 'checked="checked"';
            }if($this->session->userdata($i)==4){
				$respondent4 = 'checked="checked"';
            }if($this->session->userdata($i)==5){
				$respondent5 = 'checked="checked"';
            }if($this->session->userdata($i)==6){
				$respondent6 = 'checked="checked"';
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
        <p><strong><?php echo $this->session->userdata('question_mulitiple_only')?></strong><br>
        <?php echo str_replace("\n","<br><input name='answer_mulitiple_only' id='answer_mulitiple_only' type='radio' value='' />","<input name='answer_mulitiple_only' id='answer_mulitiple_only' type='radio' value='' />".$this->session->userdata('answer_mulitiple_only'));?></p>
        <p><strong><?php echo $this->session->userdata('question_mulitiple_multiple')?></strong><br>
        <?php echo str_replace("\n","<br><input name='answer_mulitiple_multiple' id='answer_mulitiple_multiple' type='checkbox' value='' />","<input name='answer_mulitiple_multiple' id='answer_mulitiple_multiple' type='checkbox' value='' />".$this->session->userdata('answer_mulitiple_multiple'));?></p>
        <p><strong><?php echo $this->session->userdata('comment')?></strong><br>
        <?php if($this->session->userdata('comment')!=""){echo "<textarea name='' id='' style='width:50%; height:80px;' class='k-textbox'></textarea>";}?>
        </p>
        </td>
      </tr>
      <tr></tr>
    </table>
    <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
      <tr></tr>
      <tr>
        <td height="35" align="center"><a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='block';document.getElementById('fade').style.display='block'"><input type="submit" name="button4" id="button4" value="เพิ่มคำถาม" class="k-button"/></a><div id="fade2" class="black_overlay"></div></td>
        </tr>
      <tr></tr>
    </table>
    <div id="light_question" class="white_content_question" align="left">
	<script>
    function showPage(showdiv){
        $('#midRight > div').hide()  
        $(showdiv).show();    
    }
    </script>
    <table width="100%" align="center" class="table_radius">
          <tr>
            <td width="25%" valign="top" bgcolor="#d2dbde" style="-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;">
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
            <td width="75%" valign="top">
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
                <td class="table_default"><input name="other_mulitiple_only" type="checkbox" value="" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="important_mulitiple_only" type="checkbox" value="" />บังคับให้ตอบคำถามนี้</td>
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
                <td class="table_default"><input name="other_mulitiple_only" type="checkbox" value="" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="important_mulitiple_only" type="checkbox" value="" />บังคับให้ตอบคำถามนี้</td>
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
              	<td>&nbsp;</td>
              </tr>
              <tr>
                <td class="table_default"><input name="other_comment" type="checkbox" value="" />เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
                <td class="table_default"><input name="important_comment" type="checkbox" value="" />บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/></td>
              </tr>
            </table></p>
            <?php echo form_close()?>
            </div>
            <div id="home_page4" style="display:none;"><strong>Ranking</strong></div>
            <div id="home_page5" style="display:none;"><strong>Ranking Scale</strong></div>
            <div id="home_page6" style="display:none;"><strong>Matrix of Choice (Only One Answer)</strong></div>
            <div id="home_page7" style="display:none;"><strong>Matrix of Choice (Multiple Answer)</strong></div>
            <div id="home_page8" style="display:none;"><strong>Single Textboxes</strong></div>
            <div id="home_page9" style="display:none;"><strong>Mulitple Textboxes</strong></div>
            <div id="home_page10" style="display:none;"><strong>Date and Time</strong></div>
			</div>
            </td>
          </tr>
        </table>
        <table width="100%">
        <tr>
          	<td align="right">
            <a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'"><input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:100px;"/></a></td>
       	  </tr>
        </table>
    </div>
    

    
    <p>&nbsp;</p>
    </td>
  </tr>
</table>