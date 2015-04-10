<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="styles/kendo.common.min.css" rel="stylesheet" />
    <link href="styles/kendo.default.min.css" rel="stylesheet" />
    <script src="js/jquery.min.js"></script>
    <script src="js/kendo.all.min.js"></script>
</head>
<body>
           <div id="example" class="k-content">
            <div id="grid"></div>

            <script type="text/x-kendo-template" id="template">
                <div class="toolbar">
                    <label class="category-label" for="category">Show products by category:</label>
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
                            { field: "ProductID", title: "Product ID", width: 100 },
                            { field: "ProductName", title: "Product Name" },
                            { field: "UnitPrice", title: "Unit Price", width: 100 },
                            { field: "QuantityPerUnit", title: "Quantity Per Unit" }
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



</body>
</html>