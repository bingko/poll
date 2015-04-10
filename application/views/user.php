<?php $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด-->

<p></p>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
<tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;ข้อมูลผู้ใช้งาน</strong></div>
    </td>
  </tr>
  <tr>
    <td valign="top"><div id="grid"></div></td>
  </tr>
</table>
<script>

				var user_title = [{
                    "value": " ","text": "-- คำนำหน้าชื่อ --"
                },{
					"value": "นาย","text": "นาย"
				},{
					"value": "นาง","text": "นาง"
				},{
					"value": "นางสาว","text": "นางสาว"
				}];
				
				var user_status = [{
                    "value": " ","text": "-- สถานะการใช้งาน --"
                },{
					"value": "1","text": "เปิด"
				},{
					"value": "0","text": "ปิด"
				}];
				
				<?php if($all_session['login']['user_type']==1){?>
				var user_type = [{
                    "value": " ","text": "-- ประเภทผู้ใช้งาน --"
                },{
					"value": "1","text": "ผู้ดูแลระบบ"
				},{
					"value": "2","text": "คนสร้างแบบสอบถาม"
				},{
					"value": "3","text": "คนเก็บแบบสอบถาม"
				}];
				<?php }else if($all_session['login']['user_type']==2){?>
				var user_type = [{
                    "value": " ","text": "-- ผู้ใช้งาน --"
                },{
					"value": "3","text": "คนเก็บแบบสอบถาม"
				}];
				<?php } ?>
								
				$(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url()?>index.php/ci_manage_user",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/select_non_pass?callback",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/update_data_user",
                                    dataType: "jsonp"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/delete_data_user",
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
                                    id: "user_name",
                                    fields: {
                                        user_title: { validation: { required: true }, field: "user_title", values: user_title },
                                        user_name: { validation: { required: true }},
                                        user_address: { validation: { required: true } },
                                        user_tel: { validation: { required: true } },
                                        user_mail: { validation: { required: true } },
                                        user_url: { validation: { required: true } },
                                        user_username: { validation: { required: true } },
                                        user_password: { },
                                        user_status: { validation: { required: true }, field: "user_status", values: user_status },
                                        user_type: { validation: { required: true } , field: "user_type", values: user_type }
                                    }
                                }
                            }
                        });
                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
						sortable: true,
                        //selectable: "single",
						filterable: true,
						scrollable: {virtual: true},
                        toolbar: ["create"],
                        columns: [
                            { field: "user_title", values:user_title, title:"<div align='center'>คำนำหน้าชื่อ</div>", width:"7%",filterable: false},
                            { field: "user_name",title:"<div align='center'>ชื่อ-นามสกุล</div>"},
                            { field: "user_address",hidden: true, title:"<div align='center'>รายละเอียด</div>"},
                            { field: "user_tel", title:"<div align='center'>เบอร์ติดต่อ</div>"},
                            { field: "user_mail", title:"<div align='center'>อีเมล์</div>"},
                            { field: "user_url", hidden: true, title:"<div align='center'>ลิงค์</div>"},
                            { field: "user_username", hidden: true, title:"<div align='center'>Username</div>"},
                            { field: "user_password",  hidden: true, title:"<div align='center'>Password</div>" },
                            { field: "user_status", values:user_status, title:"<div align='center'>สถานะ</div>", width:"6%",filterable: false},
                            { field: "user_type", values:user_type, title:"<div align='center'>ประเภทผู้ใช้งาน</div>", width:"13%"},
                            { command: [ "edit", "destroy"], title: "&nbsp;", width:"15%"}],
                        editable: "popup"

                    });
                });

</script>