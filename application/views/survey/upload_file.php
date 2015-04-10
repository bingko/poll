<p></p>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
  <tr>
    <td height="50" bgcolor="#CCCCCC"><div class="alert"><strong>&nbsp;อัพโหลดไฟล์ข้อมูลสรุป</strong></div></td>
  </tr>
  <tr>
    <td>
    <?php echo form_open_multipart('survey/upload_file')?>
    <table width="95%" align="center" cellpadding="4" cellspacing="4">
      <tr>
        <td width="16%">หัวข้อแบบสอบถาม</td>
        <td width="84%"><?php echo $survey[0]['qh_title']?>
          <input type="hidden" name="qh_id" id="qh_id" value="<?php echo $survey[0]['qh_id']?>" /></td>
      </tr>
      <?php if($survey[0]['qh_file']!=""){?>
      <tr>
        <td>Link File</td>
        <td>
		<?php echo base_url()?>pdf/<?php echo $survey[0]['qh_file']?>
        <?php echo anchor('survey/file_delete/'.$survey[0]['qh_id'],'<img src="'.base_url().'images/delete_icon.png" height="30" />')?>
        </td>
      </tr>
      <?php } ?>
      <tr>
        <td>ไฟล์อัพโหลด</td>
        <td><input type="file" name="qh_file" id="qh_file" required="required" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="อัพโหลดข้อมูล" class="k-button" /></td>
      </tr>
    </table>
    <?php echo form_close()?>
    </td>
  </tr>
</table>