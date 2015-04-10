<?php @session_start(); $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด--><br />
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
        <td width="36" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step2.png"/></td>
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
<p><p>
<?php echo form_open('ci_manage_survey/question_subject_after');?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_radius">
  <tr>
    <td>
    <h2>&nbsp;&nbsp;เพิ่มเติมส่วนเสริมของแบบสอบถาม</h2><br />
    <table width="90%" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right"><input type="submit" name="button2" id="button2" value="บันทึก" class="k-button" style="width:150px;"/></td>
      </tr>
    </table>
    <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
      <tr>
        <td height="35">วันที่เริ่มออนไลน์แบบสอบถาม</td>
        <td height="35"><input name="qh_startdate" id="qh_startdate" value="<?php echo $all_session['question_subject']['qh_startdate']?>"/></td>
      </tr>
      <tr>
        <td height="35">วันที่สิ้นสุดออนไลน์แบบสอบถาม</td>
        <td height="35"><input name="qh_enddate" id="qh_enddate" value="<?php echo $all_session['question_subject']['qh_enddate']?>"/></td>
      </tr>
      <tr>
      <?php 
		if($all_session['question_subject']['qh_type']==1){
			$qh_type1 = 'checked="checked"';
			$display1 = 'style="display:none;"';
		}else{
			$qh_type2 = 'checked="checked"';
		}?>
        <td width="21%" height="35">ลักษณะแบบสอบถาม</td>
        <td width="79%" height="35">
		<script>
        $(document).ready(function(){
            $(":radio:eq(0)").click(function(){
                $("p").hide();
            });
        
            $(":radio:eq(1)").click(function(){
                $("p").show();
            });
        });
        </script>
        <input name="qh_type" type="radio" id="qh_type" value="1" <?php echo @$qh_type1?>/> 
        สาธาระณะ
		<input name="qh_type" type="radio" id="qh_type" value="0" <?php echo @$qh_type2?>/> เฉพาะกลุ่ม
        <?php 
		$popup_keep = array(
			'width'      => '900',
			'height'     => '600',
			'scrollbars' => 'yes',
			'screenx'    => '0',
			'screeny'    => '0'
		);?>
        <p class="hidden" <?php echo @$display1; ?>><?php  echo anchor_popup('survey/select_keep','<input name="Button" type="button" value="เลือกคนเก็บแบบสอบถาม" class="k-button" />',$popup_keep)?></p>
        </td>
      </tr>
      <tr>
      <?php 
		if($all_session['question_subject']['qh_ip']==1){
			$qh_ip1 = 'checked="checked"';
		}else{
			$qh_ip2 = 'checked="checked"';
		}?>
        <td height="35">ตอบคำถามแบบ 1 ชุด ต่อ 1 IP</td>
        <td height="35"><input name="qh_ip" type="radio" id="radio" value="1" <?php echo @$qh_ip1?> /> เปิด<input type="radio" name="qh_ip" id="radio2" value="0" <?php echo @$qh_ip2?> /> ปิด</td>
      </tr>
      <tr>
        <td height="35">ชื่อของ URL แบบสอบถาม</td>
        <td height="35"><?php echo base_url()?>index.php/ci_manage_survey/select_survey_db/<?php echo $all_session['question_subject']['qh_id'];?>
        </td>
      </tr>
    </table>
    <p>&nbsp;</p>
    </td>
  </tr>
</table>
<?php echo form_close();?>
<script>

                $(document).ready(function(){
                    $("#qh_startdate").kendoDatePicker({
						format:"yyyy-MM-d"
					});
                    $("#qh_enddate").kendoDatePicker({
						format:"yyyy-MM-d"
					});
                });
</script>