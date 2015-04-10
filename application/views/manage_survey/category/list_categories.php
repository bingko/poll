<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
    <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;จัดการประเภทแบบสอบถาม</strong></div>
    </td>
  </tr><tr><td>
 		          
    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
        <td align="right" valign="top">
      </td>
      </tr>
      <tr>
        <td valign="top"><div id="example" class="k-content"><div id="grid_category"></div></div></td>
      </tr>
    </table>

                </td></tr>

         </table>
<script>
				$(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url()?>index.php/ci_manage_survey",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/list_category?callback",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/category_update",
                                    dataType: "jsonp"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/category_delete",
                                    dataType: "jsonp"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/category_insert",
                                    dataType: "jsonp"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 10,
                            schema: {
                                model: {
                                    id: "sc_id",
                                    fields: {
                                        sc_id: { validation: { required: false } },
                                        sc_name: { validation: { required: true } },
                                        sc_desc: { validation: { required: false } }
                                    }
                                }
                            }
                        });

                    $("#grid_category").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
                        //height: 430,
                        toolbar: ["create"],
                        columns: [
                            { field: "sc_id", title:"<div align='center'>ลำดับ</div>", width: "10%" },
                            { field: "sc_name", title:"<div align='center'>ประเภทแบบสอบถาม</div>", width: "30%" },
                            { field: "sc_desc", title:"<div align='center'>รายละเอียด</div>", width: "45%" },
                            { command: ["edit", "destroy"], title: "<div align='center'>จัดการแบบสำรวจ</div>", width: "15%" }],
                        editable: "popup"
                    });
                });
</script>

