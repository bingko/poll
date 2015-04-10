<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_default">
  <tr>
    <td><h3 class="text-warning">&nbsp;ข้อมูลแบบสอบถาม Survey</h3></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
        <p><p>   
    <table width="90%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
        <td align="right" valign="top">
        <a href="#" class="topopup"><input name="Submit" type="submit" value="สร้างฟอร์มแบบสอบถาม" class="k-button"/></a>
        </td>
      </tr>
      <tr>
        <td valign="top">
        <table id="grid">
                <thead>
                    <tr>
                        <th data-field="title"><div align="center"><strong>หัวข้อแบบสำรวจ</strong></div></th>
                        <th data-field="category"><div align="center"><strong>ประเภทแบบสำรวจ</strong></div></th>
                        <th data-field="createdate"><div align="center"><strong>วันที่สร้าง</strong></div></th>
                        <th data-field="datetime"><div align="center"><strong>ระยะเวลาสำรวจ</strong></div></th>
                        <th data-field="respondents"><div align="center"><strong>จำนวนผู้ตอบ</strong></div></th>
                        <th data-field="type_survey"><div align="center"><strong>สถานะ</strong></div></th>
                        <th data-field="control">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
            		<tr>
                       <td align='left'>แบบสำรวจความคิดเห็นกรณีการออกกฎหมายนิรโทษกรรม</td>
                        <td align='center'>การเมือง</td>
                        <td></td>
                        <td align='center'>01/11/2556 - 10/11/2556</td>
                        <td align='center'>300</td>
	
                       <td><div align="center"><a href="#" class="topopup" ><img src='<?php echo base_url()?>images/icon_menu/public_icon.png'></a></div>
                           

</td>
						<td>
						<input name="Submit" type="submit" value="รายงาน" class="k-textbox" />
						<input name="Submit" type="submit" value="ลบข้อมูล" class="k-textbox" />

                </tbody>
            </table>
        </td>
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
        <h2>Create Survey</h2>
        <h3>
		<p>
            <input type="radio" name="check_create" id="check_create" value="1" onclick="showhidediv(this);" /> สร้างแบบฟอร์มใหม่
		</p>
		<div id="create_new" style="display:none;" >
        <table width="95%" align="center">
          <tr>
            <td style="font-size:14px;" width="40%">หัวข้อแบบสอบถาม</td>
            <td>
            <input type="text" name="title" id="title" class="k-textbox" style="width:100%;" />
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;">ประเภทแบบสอบถาม</td>
            <td>
            <select name="category" id="category" class="k-textbox" style="height:30px;width:100%;">
            <option value="">เลือกประเภทแบบสอบถาม</option>
            <option value="เศรษฐกิจ">เศรษฐกิจ</option>
            <option value="การเมือง">การเมือง</option>
            <option value="สังคม">สังคม</option>
            </select>
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;">รายละเอียดแบบสอบถาม</td>
            <td>
            <textarea name="detail" id="detail" cols="45" rows="5" class="k-textbox" style="width:100%;" ></textarea>
            </td>
          </tr>
        </table>
        </div>
		<p>
        	<input type="radio" name="check_create" id="check_create" value="2" onclick="showhidediv(this);"/> คัดลอกจากแบบฟอร์มเดิม
        </p>
		<div id="create_old" style="display:none;"><div id="create_old" style="display:none;">
        <select name="category" id="category" class="k-textbox" style="height:30px;width:80%;" >
            <option value="">เลือกประเภทแบบสอบถาม</option>
            <option value="เศรษฐกิจ">เศรษฐกิจ</option>
            <option value="การเมือง">การเมือง</option>
            <option value="สังคม">สังคม</option>
            </select><br /><br />

        <select name="category" id="category" class="k-textbox" style="height:30px;width:80%;" >
            <option value="">เลือกหัวข้อแบบสอบถาม</option>
            <option value="1">ไตรมาส 3/56 ดัชนีความเชื่อมั่นภาคการผลิต SMEs ของอีสานทรุด</option>
            <option value="2">ชาวอีสานชี้เศรษฐกิจไทยทรงกับทรุด กังวลวิกฤติเศรษฐกิจ</option>
            <option value="3">เร่ง พ.ร.บ. นิรโทษกรรม เสียงในอีสานยังก้ำกึ่ง ยังไม่มั่นใจสภาปฏิรูปการเมืองฯ</option>
            </select></div></div>
        </h3>
        <p><div align="center">
        <input name="submit" type="submit" class="k-button" value="ดำเนินการต่อไป" />
        </div></p>
        </div>
    </div>
    <?php echo form_close()?>
	<div class="loader"></div>
   	<div id="backgroundPopup"></div>
    <script>
				$(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url()?>index.php/ci_manage_survey",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/list_data_survey?callback",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/Products/Update",
                                    dataType: "jsonp"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/Products/Destroy",
                                    dataType: "jsonp"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/insert_data_user",
                                    dataType: "jsonp"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 20,
                            schema: {
                                model: {
                                    id: "survey_id",
                                    fields: {
                                        survey_id: { validation: { required: true } },
                                        titile: { validation: { required: true } },
                                        category: { validation: { required: true } },
                                        datetime: { validation: { required: true } },
                                        count: { validation: { required: true } },
                                        status: { validation: { required: true } }
                                    }
                                }
                            }
                        });

                   $("#grid").kendoGrid({
                        //height: 430,
                        //sortable: true
						dataSource: {pageSize: 20},
						columns: [
                            { field:"titile"},
                            { field: "category", width: "15%" },
							{ field: "createdate", width: "10%" },
                            { field: "datetime", width: "12%" },
                            { field: "respondents", width: "8%"  },
                            { field: "type_survey", width: "5%" },
                            { field: "control", width: "15%" }],
                    });
                });
	</script>

    </td>
  </tr>
</table>
