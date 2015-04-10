<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_default">
  <tr>
    <td><h3 class="text-warning">จัดการข้อมูลผู้ใช้งาน</h3></td>
  </tr>
</table>
<p></p>
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
  <tr>
    <td valign="top"><div id="grid"></div></td>
  </tr>
</table>
<script>
				$(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url()?>index.php/ci_manage_user",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/list_data_user?callback",
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
                                    id: "code_id",
                                    fields: {
                                        code_id: { validation: { required: true } },
                                        fullname: { validation: { required: true } },
                                        address: { validation: { required: true } },
                                        tel: { validation: { required: true } },
                                        mail: { validation: { required: true } },
                                        username: { validation: { required: true } },
                                        password: { validation: { required: true } },
                                        status: { validation: { required: true } }
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
                        //height: 430,
                        toolbar: ["create"],
                        columns: [
                            { field:"fullname", title: "ชื่อ-สกุล <img src='<?php echo base_url()?>images/icon_menu/user_4.png' />", width: "20%"},
                            { field: "address", title:"ที่อยู่", width: "20%" },
                            { field: "tel", title:"เบอร์ติดต่อ" },
                            { field: "mail", title:"อีเมล์"},
                            { field: "username", title:"Username" },
                            { field: "password", title:"Password" },
                            { field: "status", title:"Status" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "17%" }],
                        editable: "popup"
                    });
                });
</script>
