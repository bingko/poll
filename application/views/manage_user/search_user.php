<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
<tr>
    <td width="80%" height="50" bgcolor="#CCCCCC">
    <div><strong>&nbsp;ข้อมูลผู้ตอบแบบสอบถาม</strong></div>
    </td>
  </tr>
  
  <tr>
    <td align="right">
    <?php echo form_open_multipart('respondent/upload_file')?>
    <span style="font-size:16px;">
    <input name="upload_file" type="file" id="upload_file" class="k-button" required validationMessage=""/>
    </span>
    <input type="submit" name="submit" value="นำเข้าข้อมูลจาก Excel" class="k-button">
    <?php echo anchor('respondent/export_excel','<input type="button" name="Button" value="ส่งออกข้อมูลไป Excel" class="k-button">',array('_bank'))?>
    <?php echo form_close()?>
    
   
    </td>
  </tr>
  <tr>
  <td> 



<div id="grid_member" class="k-content"></div>

            <script>

                var gender_name = [{
                    "value": " ","text": "------ เลือกเพศ ------"
                },{
                    "value": "M","text": "ชาย"
                },{
                    "value": "F","text": "หญิง"
                }];
                var PROVINCE_NAME = [{
                    "value": " ","text": "-- เลือกจังหวัด --"
                },{
                    "value": "34","text": "กาฬสินธุ์"
                },{
                    "value": "28","text": "ขอนแก่น"
                },{
                    "value": "25","text": "ชัยภูมิ"
                },{
                    "value": "36","text": "นครพนม"
                },{
                    "value": "19","text": "นครราชสีมา"
                },{
                    "value": "77","text": "บึงกาฬ"
                },{
                    "value": "20","text": "บุรีรัมย์"
                },{
                    "value": "32","text": "มหาสารคาม"
                },{
                    "value": "37","text": "มุกดาหาร"
                },{
                    "value": "24","text": "ยโสธร"
                },{
                    "value": "33","text": "ร้อยเอ็ด"
                },{
                    "value": "22","text": "ศรีสะเกษ"
                },{
                    "value": "35","text": "สกลนคร"
                },{
                    "value": "21","text": "สุรินทร์"
                },{
                    "value": "31","text": "หนองคาย"
                },{
                    "value": "27","text": "หนองบัวลำภู"
                },{
                    "value": "26","text": "อำนาจเจริญ"
                },{
                    "value": "29","text": "อุดรธานี"
                },{
                    "value": "23","text": "อุบลราชธานี"
                },{
                    "value": "30","text": "เลย"

                }];

                $(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url()?>index.php/respondent",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/select_data?callback",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/data_update",
                                    dataType: "jsonp"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/data_delete",
                                    dataType: "jsonp"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/data_insert",
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
                                    id: "res_id",
                                    fields: {
                                        res_id: { editable: false, nullable: true },
                                        gender_name : { validation: { required: true } , field: "sex", values: gender_name },
										age: { validation: { required: false } },
										birthyear: { validation: { required: false } },
                                        address: { validation: { required: false } },
                                        PROVINCE_NAME: { validation: { required: true } , field: "province", values: gender_name },
										amphor: { validation: { required: true } },
                                        tambon: { validation: { required: false } },
										phone: { validation: { required: false } },
                                        mail: { validation: { required: false } },
										edu_bg: { validation: { required: false } },
										job: { validation: { required: false } },
                                        salary: { validation: { required: false } },
										registry: { validation: { required: false } }
                                        
                                    }
                                }
                            }
                        });

                    $("#grid_member").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
                        //height: 950,
						scrollable: true,
                        //selectable: "single",
                        sortable: true,
                        filterable: true,
                        toolbar: ["create"],
                        columns: [
                            
                            { field: "gender_name", values:gender_name, title: "เพศ", width: "10%" },
                            { field: "birthyear", title: "ปีเกิด", width: "10%" },
							{ field: "age", title: "อายุ", width: "10%" },
                            { field: "address",hidden: true, title: "รายละเอียด", width: "1%" },
                            { field: "PROVINCE_NAME", values:PROVINCE_NAME, title: "จังหวัด", width: "10%" },
                            { field: "amphor", title: "อำเภอ", width: "10%" },
                            { field: "tambon",hidden: true, title: "ตำบล", width: "1%" },
                            { field: "phone", title: "โทรศัพท์", width: "10%" },
                            { field: "mail", title: "อีเมล์", width: "15%" },
							{ field: "edu_bg",hidden: true, title: "วุฒิการศึกษา", width: "1%" },
                            { field: "job",hidden: true, title: "อาชีพ", width: "1%" },
                            { field: "salary",hidden: true, title: "เงินเดือน", width: "1%" },
                            { field: "registry",hidden: true, title: "วันที่บันทึก", width: "1%" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "15%" }],
                        editable: "popup"
                    });
                });
				
            </script>
</td></tr></table>