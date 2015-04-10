<?php @session_start(); $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_default">
  <tr>
    <td align="center" bgcolor="#eaeaea"></td>
  </tr>
</table>
<p><p>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_radius">
  <tr>
    <td>
    <h2>&nbsp;&nbsp;สถานะ</h2><br />
    <table width="90%" align="center" cellpadding="2" cellspacing="2" class="survey_layer">
      <tr>
        <td align="center">
        <p><strong style="color:green; font-size:18px;">การสร้างคำถามที่ใช้บ่อย สำเร็จ</strong></p>
       
        <?php echo anchor('survey/create_template','<input type="submit" name="button2" id="button2" value="กลับไปหน้าสร้างคำถาม" class="k-button" style="width:150px;"/>');?>
        </td>
      </tr>
      </table>
    <p>&nbsp;</p>
    </td>
  </tr>
</table>


