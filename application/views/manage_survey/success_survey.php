<?php @session_start(); $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด-->
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
        <td width="36" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step3.png"/></td>
        <td width="32" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
        <td width="32" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
        <td width="32" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
        <td width="32" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
        <td width="32" bgcolor="#d9f7bc"><img src="<?php echo base_url()?>images/step.png"/></td>
      </tr>
    </table></td>
  </tr>
</table>
<p><p>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_radius">
  <tr>
    <td>
    <h2>&nbsp;&nbsp;สถานะแบบสอบถาม</h2><br />
    <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
      <tr>
        <td align="center">
        <p><strong style="color:green; font-size:18px;">การสร้างแบบสอบถาม สำเร็จ</strong></p>
       
        <?php echo anchor('home','<input type="submit" name="button2" id="button2" value="รายการแบบสำรวจทั้งหมด" class="k-button" />');?>
        </td>
      </tr>
      </table>
    <p>&nbsp;</p>
    </td>
  </tr>
</table>

