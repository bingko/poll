           <div id="example" class="k-content">
            <div id="grid"></div>

            <script type="text/x-kendo-template" id="template">
                <div class="toolbar">
                    <label class="category-label" for="category">เลือกรายชื่อประเภทแบบสอบถาม:</label>
                    <input type="search" id="category" style="width: 150px"/>
                </div>
            </script>
            <script>
                $(document).ready(function() {
                    var grid = $("#grid").kendoGrid({
                        dataSource: {
                            type: "odata",
                            transport: {
                                read: "http://demos.kendoui.com/service/Northwind.svc/Products"
                            },
                            pageSize: 20,
                            serverPaging: true,
                            serverSorting: true,
                            serverFiltering: true
                        },
                        toolbar: kendo.template($("#template").html()),
                        height: 430,
                        sortable: true,
                        pageable: true,
                        columns: [
                            { field: "ProductID", title: "ลำดับ", width: 100 },
                            { field: "ProductName", title: "หัวข้อแบบสอบถาม" },
                            { field: "UnitPrice", title: "จำนวนผู้ตอบ", width: 100 },
                            { field: "QuantityPerUnit", title: "รายละเอียด" }
                        ]
                    });
                    var dropDown = grid.find("#category").kendoDropDownList({
                        dataTextField: "CategoryName",
                        dataValueField: "CategoryID",
                        autoBind: false,
                        optionLabel: "All",
                        dataSource: {
                            type: "odata",
                            severFiltering: true,
                            transport: {
                                read: "http://demos.kendoui.com/service/Northwind.svc/Categories"
                            }
                        },
                        change: function() {
                            var value = this.value();
                            if (value) {
                                grid.data("kendoGrid").dataSource.filter({ field: "CategoryID", operator: "eq", value: parseInt(value) });
                            } else {
                                grid.data("kendoGrid").dataSource.filter({});
                            }
                        }
                    });
                });

            </script>
            <style scoped>
                #grid .k-toolbar
                {
                    min-height: 27px;
                    padding: 1.3em;
                }
                .category-label
                {
                    vertical-align: middle;
                    padding-right: .5em;
                }
                #category
                {
                    vertical-align: middle;
                }
                .toolbar {
                    float: right;
                }
            </style>
        </div>
