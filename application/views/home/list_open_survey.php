<table width="100%" height="50px" border="0" align="center" cellpadding="2" cellspacing="2" class="" bgcolor="cccccc" >
  <tr>
    <td><div align="center"><?php echo anchor('home/index','<input name="submit" type="submit" class="k-button" style="width:200px ; height:40px;" value="กลับหน้าแรก"/>')?> </div></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
        <tr>
          <td height="50" bgcolor="#CCCCCC"><div class="alert"><strong>&nbsp;ข้อมูลรายการแบบสอบถาม</strong></div></td>
        </tr>
        <tr>
          <td align="right" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><table id="grid">
              <thead>
                <tr>
                  <th data-field="qh_title"><div align="center">หัวข้อแบบสำรวจ</div></th>
                  <th data-field="qh_category"><div align="center">ประเภทแบบสำรวจ</div></th>
                  <th data-field="qh_createdate"><div align="center">วันที่สร้างแบบสำรวจ</div></th>
                  <th data-field="qh_count"><div align="center">จำนวนผู้ตอบ</div></th>
                  <th data-field="qh_url"><div align="center">จัดการสำรวจ</div></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($survey_list as $survey_list){?>
                <tr>
                  <td><?php echo $survey_list['qh_title']?></td>
                  <td><?php echo $survey_list['sc_name']?></td>
                  <td><?php echo $survey_list['qh_createdate']?></td>
                  <td><div align="center">
                      <?php $this->db->where('qh_id',$survey_list['qh_id']); echo $this->db->count_all_results('subject_value');?>
                      คน</div></td>
                  <?php if($survey_list['qh_enddate']>=date('Y-m-d')){
					  		if($survey_list['qh_startdate']<=date('Y-m-d')){ ?>
                  <td><div align="center"><?php echo anchor('ci_manage_survey/select_survey_db/'.$survey_list['qh_id'].'','<input name="submit" type="submit" class="k-button" value="สำรวจ"/>')?></div></td>
                  <?php }else{ ?>
                  <td><div align="center" style="color:red;">ไม่อยู่ในช่วงสำรวจ</div></td>
                  <?php }
				  }else{ ?>
                  <td><div align="center" style="color:red;">ไม่อยู่ในช่วงสำรวจ</div></td>
                  <?php } ?>

                </tr>
                <?php } ?>
              </tbody>
            </table></td>
        </tr>
      </table>
      
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
            <input type="radio" name="check_create" id="check_create" value="1" onclick="showhidediv(this);" required validationMessage="Please enter {0}"/>
            สร้างแบบฟอร์มใหม่ </p>
          <div id="create_new" style="display:none;" >
            <table width="95%" align="center">
              <tr>
                <td style="font-size:14px;"><strong>หัวข้อแบบสอบถาม</strong>
                  <input type="text" name="title" id="title" class="k-textbox" style="width:100%;"/></td>
              </tr>
              <tr>
                <td style="font-size:14px;"><strong>ประเภทแบบสอบถาม</strong>
                  <select name="category" id="category" class="k-textbox" style="height:30px;width:100%;">
                    <option value="">เลือกประเภทแบบสอบถาม</option>
                    <?php for($i=0;$i<count($survey_category);$i++){?>
                    <option value="<?php echo $survey_category[$i]['sc_id']?>"><?php echo $survey_category[$i]['sc_name']?></option>
                    <?php } ?>
                  </select></td>
              </tr>
              <tr>
                <td style="font-size:14px;"><strong>รายละเอียดแบบสอบถาม</strong>
                  <textarea name="detail" id="detail" cols="45" rows="5" class="k-textbox" style="width:100%;" ></textarea></td>
              </tr>
            </table>
          </div>
          <p>
            <input type="radio" name="check_create" id="check_create" value="2" onclick="showhidediv(this);" required validationMessage="Please enter {0}"/>
            คัดลอกจากแบบฟอร์มเดิม </p>
          <div id="create_old" style="display:none;">
            <table width="95%" align="center">
              <tr>
                <td style="font-size:14px;"><strong>หัวข้อแบบสอบถามเดิม</strong>
                  <select name="title_copy_old" id="title_copy_old" class="k-textbox" style="height:30px;width:100%;">
                    <option value="">เลือกประเภทหัวข้อแบบสอบถามเดิม</option>
                    <?php for($a=0;$a<count($question_subject);$a++){?>
                    <option value="<?php echo $question_subject[$a]['qh_id']?>"><?php echo $question_subject[$a]['qh_title']?></option>
                    <?php } ?>
                  </select></td>
              </tr>
              <tr>
                <td style="font-size:14px;"><strong>หัวข้อแบบสำรวจใหม่</strong>
                  <input type="text" name="title_copy" id="title_copy" class="k-textbox" style="width:100%;" /></td>
              </tr>
              <tr>
                <td style="font-size:14px;"><strong>ประเภทแบบสำรวจ</strong>
                  <select name="category_copy" id="category_copy" class="k-textbox" style="height:30px;width:100%;">
                    <?php for($i=0;$i<count($survey_category);$i++){?>
                    <option value="<?php echo $survey_category[$i]['sc_id']?>"><?php echo $survey_category[$i]['sc_name']?></option>
                    <?php } ?>
                  </select></td>
              </tr>
              <tr>
                <td style="font-size:14px;"><strong>รายละเอียดแบบสำรวจ</strong>
                  <textarea name="detail_copy" id="detail_copy" cols="45" rows="5" class="k-textbox" style="width:100%;" ></textarea></td>
              </tr>
            </table>
          </div>
          <p>
          <div align="center">
            <input name="submit" type="submit" class="k-button" value="ดำเนินการต่อไป" />
          </div>
          </p>
        </div>
      </div>
      <?php echo form_close()?>
      <div class="loader"></div>
      <div id="backgroundPopup"></div></td>
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
						columns: [
                            { field:"qh_title", title: "หัวข้อแบบสำรวจ"},
                            { field: "qh_category", title:"ประเภทแบบสำรวจ", width: "15%" },
                            { field: "qh_createdate", title:"วันที่สร้างแบบสำรวจ", width: "15%" },
                            { field: "qh_count", title:"จำนวนผู้ตอบ", width: "8%"  },
							{ field: "qh_url", title:"จัดการสำรวจ", width: "15%"  }],
                    });
                });
	</script>