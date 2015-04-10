<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;ข้อมูลรายการแบบสอบถาม</strong></div>
    </td>
  </tr>
      <tr>
        <td valign="top">
	<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
        <td>
        <div id="grid_table">
        <table id="grid">
                <thead>
                    <tr>
                        <th data-field="no"><div align="center">ลำดับที่</div></th>
                        <th data-field="user"><div align="center">ผู้สำรวจ</div></th>
                        <th data-field="sv_map"><div align="center">รหัสโพล</div></th>
                        <th data-field="location"><div align="center">จังหวัด</div></th>
                        <th data-field="date"><div align="center">วันที่สำรวจ</div></th>
                        <th data-field="time"><div align="center">เวลา</div></th>
                        <th data-field="center"><div align="center">ดูข้อมูล</div></th>
                    </tr>
                </thead>
                <tbody>
                <?php $all_session = $this->session->all_userdata();?>
                <?php $i = 1?>
                <?php foreach($subject_value as $subject_value){ ?>
                <?php if(@$subject_value['user_id']==$this->uri->segment(4)){?>
                    <tr>
                        <td><div align="center"><?php echo $i ?></div></td>
                        <td><div align="center">
						<?php if(@$subject_value['user_id']!=""){
							echo @$subject_value['user_name'];
						}else{
							echo "บุคคลทั่วไป";
						}
						?>
                        </div></td>
                        <td><div align="center"><?php echo $subject_value['sv_map']?></div></td>
                        <td><div align="center">
                        <?php
							$this->db->where('PROVINCE_ID',@$subject_value['sv_province']);
							$query = $this->db->get('province');
							
							foreach ($query->result() as $row)
							{
								echo $row->PROVINCE_NAME;
							}
						?>
                        </div></td>
                        <td><div align="center"><?php echo $subject_value['sv_date']?></div></td>
                        <td><div align="center"><?php echo $subject_value['sv_time']?></div></td>
                        <td>
                        <?php echo anchor('ci_manage_survey/ans_value/'.$subject_value['qh_id'].'/'.$subject_value['sv_map'].'','<input type="submit" name="button" id="button" value="ดูข้อมูล"  class="k-button" >'
						, array('target'=>'_blank'))?>
                        <?php echo anchor('ci_manage_survey/delete_ans_value/'.$subject_value['qh_id'].'/'.$subject_value['sv_map'].'','<input type="submit" name="button" id="button" value="ลบข้อมูล" class="k-button">')?>
                        </td>
                    </tr>
                <?php $i++ ?>
				<?php } }?>
                </tbody>
		</table>
        </div>
        </td>
      </tr>
    </table>
 </td>
      </tr>
</table>
    <script>
                $(document).ready(function() {
                    $("#grid").kendoGrid({
                        //height: 430,
                        filterable: true,
						columns: [
                            { field:"no", title: "หัวข้อแบบสำรวจ", width: "10%" },
                            { field: "user", title:"ผู้สำรวจ" },
                            { field: "sv_map", title:"รหัสโพล" },
							{ field: "location", title:"จังหวัด" },
                            { field: "date", title:"วันที่สำรวจ" },
                            { field: "time", title:"เวลา", width: "15%" },
                            { field: "center", title:"ดูข้อมูล", width: "15%",filterable: false  }],
                    });
                });
	</script>