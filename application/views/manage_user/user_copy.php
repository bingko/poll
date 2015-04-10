<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_default">
  <tr>
    <td><h3 class="text-warning">จัดการข้อมูลผู้ใช้งาน</h3></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><div id="grid"></div></td>
  </tr>
</table>
<script>
				var user_title = [{
                    "value": " ","text": "-- คำนำหน้าชื่อ --"
                },
				{
					"value": "นาย","text": "นาย"
				},
				{
					"value": "นาง","text": "นาง"
				},
				{
					"value": "นางสาว","text": "นางสาว"
				}];
				
				var user_status = [{
                    "value": " ","text": "-- การใช้งาน --"
                },
				{
					"value": "1","text": "เปิด"
				},
				{
					"value": "0","text": "ปิด"
				}];
				
				var user_type = [{
                    "value": " ","text": "-- ผู้ใช้งาน --"
                },
				{
					"value": "1","text": "ผู้ดูแลระบบ"
				},
				{
					"value": "2","text": "ผู้ใช้งานทั่วไป"
				},
				{
					"value": "3","text": "คนเก็บแบบสำรวจ"
				}];

                var user_password = [{
                    "text": "-- ผู้ใช้งาน --"
                }];
								
				$(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url()?>index.php/ci_manage_user",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/list_data_user?callback",
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
                                    id: "user_id",
                                    fields: {
                                        user_title: { validation: { required: true }, field: "user_title", values: user_title },
                                        user_name: { validation: { required: true } },
                                        user_address: { validation: { required: true } },
                                        user_tel: { validation: { required: true } },
                                        user_mail: { validation: { required: true } },
                                        user_url: { validation: { required: true } },
                                        user_username: { validation: { required: true } },
                                        user_password: { validation: { required: true } },
                                        user_status: { validation: { required: true }, field: "user_status", values: user_status },
                                        user_type: { validation: { required: true } , field: "user_type", values: user_type }
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
						scrollable: {virtual: true},
                        toolbar: ["create"],
                        columns: [
                            { field: "user_title", values:user_title, title:"<div align='center'>คำนำหน้าชื่อ</div>", width:"7%"},
                            { field: "user_name", title:"<div align='center'>ชื่อ-นามสกุล</div>", width:"10%"},
                            { field: "user_address", title:"<div align='center'>ที่อยู่</div>", width:"10%"},
                            { field: "user_tel", title:"<div align='center'>เบอร์ติดต่อ</div>"},
                            { field: "user_mail", title:"<div align='center'>อีเมล์</div>"},
                            { field: "user_url", title:"<div align='center'>ลิงค์</div>"},
                            { field: "user_username", title:"<div align='center'>Username</div>"},
                            { field: "user_password", title:"<div align='center'>Password</div>"},
                            { field: "user_status", values:user_status, title:"<div align='center'>การใช้งาน</div>", width:"8%"},
                            { field: "user_type", values:user_type, title:"<div align='center'>ผู้ใช้งาน</div>", width:"8%"},
                            { command: ["edit", "destroy"], title: "&nbsp;", width:"13%"}],
                        editable: "popup"
                    });
                });
</script>