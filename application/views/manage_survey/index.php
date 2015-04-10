<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td>
        <p><p>   
    <table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
    <td height="50" bgcolor="#CCCCCC">
   
<div class="alert"><strong>&nbsp;ข้อมูลรายการแบบสอบถาม</strong></div>
    </td>
  </tr>
      <tr>
        <td align="right" valign="top">
        <a href="#" class="topopup"><input name="Submit" type="submit" value="สร้างฟอร์มแบบสอบถาม" class="k-button"/></a>
        </td>
      </tr>
      <tr>
        <td valign="top">
        <table id="list_survey">
                <thead>
                    <tr>
                        <th data-field="title"><div align="center"><strong>หัวข้อแบบสอบถาม</strong></div></th>
                        <th data-field="category"><div align="center"><strong>ประเภทแบบสอบถาม</strong></div></th>
                        <th data-field="createdate"><div align="center"><strong>วันที่สร้าง</strong></div></th>
                        <th data-field="createuser"><div align="center"><strong>ผู้สร้าง</strong></div></th>
                        <th data-field="datetime"><div align="center"><strong>ระยะเวลาสอบถาม</strong></div></th>
                        <th data-field="respondents"><div align="center"><strong>จำนวน<br />ผู้ตอบ</strong></div></th>
                        <th data-field="type_survey"><div align="center"><strong>สถานะ</strong></div></th>
                        <th data-field="report"><div align="center"><strong>รายงาน</strong></div></th>
                        <th data-field="control"><div align="center"><strong>จัดการ</strong></div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($survey_list as $survey_list){?>
            		<tr>
                    	<td><?php echo $survey_list['qh_title']?></td>
                        <td><?php echo $survey_list['sc_name']?></td>
                        <td><?php echo $survey_list['qh_createdate']?></td>
                        <td><?php echo $survey_list['user_name']?></td>
                        <td><?php echo $survey_list['qh_startdate']?> <br />ถึง <?php echo $survey_list['qh_enddate']?></td>
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
						<td>
                        <div align="center">
						<?php echo anchor('survey/list_detail/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/report.png">');?>&nbsp;
						<?php echo anchor('report/gen_excel/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/chart.png">');?>
                        </div>
						</td>
                        <td>
                        <div align="center">
						<?php echo anchor('ci_manage_survey/update_survey_db/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/doc_edit.png">');?>&nbsp;
						<?php echo anchor('ci_manage_survey/delete_survey_db/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/delete_icon.png">' , array('onClick' => "return confirm('คุณต้องการลบแบบสอบถามใช่หรือไม่?')"));?>
                        </div>
                        </td>
					</tr>
                <?php } ?>
                </tbody>
            </table>
        </td>
      </tr>
    </table>
<script>
                $(document).ready(function() {
                    $("#list_survey").kendoGrid({
                        //height: 430,
                        //sortable: true
						filterable: true,
						dataSource: {pageSize: 20},
						columns: [
                            { field:"titile"},
                            { field: "category", width: "12%" },
							{ field: "createdate", width: "8%" , filterable: {ui: "datetimepicker"}},
							{ field: "createuser", width: "12%" },
                            { field: "datetime", width: "13%",  filterable: {ui: "datetimepicker"} },
                            { field: "respondents", width: "5%"  },
                            { field: "type_survey", width: "5%",filterable: false },
							{ field: "report", width: "10%" , filterable: false},
                            { field: "control", width: "10%" ,filterable: false }],
                    });
                });
</script>
    <!-- // Javascript // -->
	<script language="JavaScript" type="text/javascript">
    function showhidediv(rad){
    var rads=document.getElementsByName(rad.name);
    document.getElementById('create_new').style.display=(rads[0].checked)?'block':'none' ;
    document.getElementById('create_old').style.display=(rads[1].checked)?'block':'none' ;
    }
    </script>
	<?php echo form_open('ci_manage_survey/check_create')?>
    <div id="toPopup">
        <div class="close"></div>
       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content">
        <h2>สร้างแบบสอบถาม</h2>
		<p>
            <input type="radio" name="check_create" id="check_create" value="1" onclick="showhidediv(this);" required validationMessage="Please enter {0}"/> สร้างแบบฟอร์มใหม่
		</p>
		<div id="create_new" style="display:none;" >
        <table width="95%" align="center">
          <tr>
            <td style="font-size:14px;"><strong>หัวข้อแบบสอบถาม</strong>
            <input type="text" name="title" id="title" class="k-textbox" style="width:100%;"/>
            </td>
            
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>ประเภทแบบสอบถาม</strong>
            <select name="category" id="category" class="k-textbox" style="height:30px;width:100%;">
            <option value="">เลือกประเภทแบบสอบถาม</option>
            <?php for($i=0;$i<count($survey_category);$i++){?>
            <option value="<?php echo $survey_category[$i]['sc_id']?>"><?php echo $survey_category[$i]['sc_name']?></option>
            <?php } ?>
            </select>
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>รายละเอียดแบบสอบถาม</strong>
            <textarea name="detail" id="detail" cols="45" rows="5" class="k-textbox" style="width:100%;" ></textarea></td>
          </tr>
        </table>
        </div>
		<p>
        	<input type="radio" name="check_create" id="check_create" value="2" onclick="showhidediv(this);" required validationMessage="Please enter {0}"/> คัดลอกจากแบบฟอร์มเดิม
        </p>
		<div id="create_old" style="display:none;">
        <table width="95%" align="center">
          <tr>
            <td style="font-size:14px;"><strong>หัวข้อแบบสอบถามเดิม</strong>
            <select name="title_copy_old" id="title_copy_old" class="k-textbox" style="height:30px;width:100%;">
            <option value="">เลือกประเภทหัวข้อแบบสอบถามเดิม</option>
			<?php for($a=0;$a<count($question_subject);$a++){?>
            <option value="<?php echo $question_subject[$a]['qh_id']?>"><?php echo $question_subject[$a]['qh_title']?></option>
            <?php } ?>
            </select>
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>หัวข้อแบบสำรวจใหม่</strong>
            <input type="text" name="title_copy" id="title_copy" class="k-textbox" style="width:100%;" />
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>ประเภทแบบสำรวจ</strong>
            <select name="category_copy" id="category_copy" class="k-textbox" style="height:30px;width:100%;">
            <?php for($i=0;$i<count($survey_category);$i++){?>
            <option value="<?php echo $survey_category[$i]['sc_id']?>"><?php echo $survey_category[$i]['sc_name']?></option>
            <?php } ?>
            </select>
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>รายละเอียดแบบสำรวจ</strong>
            <textarea name="detail_copy" id="detail_copy" cols="45" rows="5" class="k-textbox" style="width:100%;" ></textarea>
            </td>
          </tr>
        </table>
        </div>
        <p><div align="center">
        <input name="submit" type="submit" class="k-button" value="ดำเนินการต่อไป" />
        </div></p>
        </div>
    </div>
    <?php echo form_close()?>
	<div class="loader"></div>
   	<div id="backgroundPopup"></div>
    </td>
  </tr>
</table>
<script>
                $(document).ready(function() {
                    var validator = $("#tickets").kendoValidator().data("kendoValidator"),
                    status = $(".status");

                    $("button").click(function() {
                        if (validator.validate()) {
                            status.text("Hooray! Your tickets has been booked!")
                                .removeClass("invalid")
                                .addClass("valid");
                        } else {
                            status.text("Oops! There is invalid data in the form.")
                                .removeClass("valid")
                                .addClass("invalid");
                        }
                    });
                });
</script>
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
                            { field: "respondents", width: "8%"  },
                            { field: "type_survey", width: "5%" },
                            { field: "control", width: "20%" }],
                    });
                });
</script>