<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;รายงายข้อมูลจริง รูปแบบ Grid</strong></div>
    </td>
  </tr>
      <tr>
        <td valign="top">
        <table id="grid">
                <thead>
                    <tr>
                        <th data-field="title"><div align="center"><strong>หัวข้อแบบสอบถาม</strong></div></th>
                        <th data-field="category"><div align="center"><strong>ประเภทแบบสอบถาม</strong></div></th>
                        <th data-field="createdate"><div align="center"><strong>วันที่สร้าง</strong></div></th>
                        <th data-field="createuser"><div align="center"><strong>ผู้สร้าง</strong></div></th>
                        <th data-field="datetime"><div align="center"><strong>ระยะเวลาสอบถาม</strong></div></th>
                        <th data-field="respondents"><div align="center"><strong>จำนวนผู้ตอบ</strong></div></th>
                        <th data-field="type_survey"><div align="center"><strong>สถานะ</strong></div></th>
                        <th data-field="control">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($survey_list as $survey_list){?>
            		<tr>
                    	<td><?php echo $survey_list['qh_title']?></td>
                        <td><?php echo $survey_list['sc_name']?></td>
                        <td><?php echo $survey_list['qh_createdate']?></td>
                        <td><?php echo $survey_list['user_name']?></td>
                        <td><?php echo $survey_list['qh_startdate']?> ถึง <?php echo $survey_list['qh_enddate']?></td>
                        <td><div align="center"><?php $this->db->where('qh_id',$survey_list['qh_id']); echo $this->db->count_all_results('subject_value');?> คน</div></td>
						<td><div align="center">                        
						<?php if($survey_list['qh_type']==0) {
                        echo "<img src='" ?><?php echo base_url()?><?php echo "images/icon_set/lock.png'></a>"; 
						} else if($survey_list['qh_type']==1) { 
                        echo "<img src='" ?><?php echo base_url()?><?php echo "images/icon_set/global.png'></a>"; 
                        } else if($survey_list['qh_type']==2) { 
                        echo "<img src='" ?><?php echo base_url()?><?php echo "images/icon_set/group.png'></a>"; 
                        }?>
                        </div>
                        </td>
						<td><?php echo anchor('report/rawdata_table/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/chart.png"/>')?><?php echo anchor('report/print_rawdata_table/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/print.png"/>','target="_blank"')?><?php echo anchor('report/excel_rawdata_table/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/excel.png"/>','target="_blank"')?></td>
					</tr>
                <?php } ?>
                </tbody>
            </table>
        </td>
      </tr>
</table>
<script>
                $(document).ready(function() {
                    $("#grid").kendoGrid({
                        //height: 430,
                        //sortable: true
						dataSource: {pageSize: 20},
						columns: [
                            { field:"titile"},
                            { field: "category", width: "12%" },
							{ field: "createdate", width: "10%" },
							{ field: "createuser", width: "15%" },
                            { field: "datetime", width: "13%" },
                            { field: "respondents", width: "10%"  },
                            { field: "type_survey", width: "5%" },
                            { field: "control", width: "12%" }],
                    });
                });
</script>