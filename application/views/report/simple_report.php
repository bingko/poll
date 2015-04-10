<div id="grid"></div>
<script>
$("#grid").kendoGrid({
  columns: [ {
    field: "num",
    editor: function(container, options) {
     //create input element and add the validation attribute
     var input = $('<input name="' + options.field + '" required="required" />');
     //append the editor
     input.appendTo(container);
     //enhance the input into NumericTextBox
     input.kendoNumericTextBox();

     //create tooltipElement element, NOTE: data-for attribute should match editor's name attribute
     var tooltipElement = $('<span class="k-invalid-msg" data-for="' + options.field + '"></span>');
     //append the tooltip element
     tooltipElement.appendTo(container);
   }
  } ],
  editable: true,
  scrollable: false,
  dataSource: {
    data: [ { num: 1 }, { num: 2 } ],
    schema: {
      model: {
        fields: {
          num: { type: "number", validation: { required: true } }
        }
      }
    }
  }
});
</script>
<br>
<br>


<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_default">
    <tr>
    <td><h3 class="text-warning">&nbsp;รายงานข้อมูลแบบสอบถาม </h3></td>
  </tr>
</table>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_radius">
<tr><td align="center"><p></p>
<div id="export_view" class="k-content">


            <div class="export-section" align="center">
                <h2></h2>
                <p>
                    <label for="categories">ประเภทแบบสอบถาม :</label><input id="categories" style="width: 300px" />
                </p>
                <p>
                    <label for="products">หัวข้อแบบสอบถาม:</label><input id="products" disabled="disabled" style="width: 300px" />
                </p>
                <button class="k-button" id="get">ดูรายงาน</button>
            </div>
            
            

            <style scoped>
                .export-section {
                    width: 460px;
                    padding: 30px;
                }
                .export-section h2 {
                    text-transform: uppercase;
                    font-size: 1.2em;
                    margin-bottom: 30px;
                }
                .export-section label {
                    display: inline-block;
                    width: 120px;
                    padding-right: 5px;
                    text-align: right;
                }
                .export-section .k-button {
                    margin: 20px 0 0 125px;
                }
                .k-readonly
                {
                    color: gray;
                }
            </style>

            <script>
                $(document).ready(function() {
                    var categories = $("#categories").kendoComboBox({
                        filter: "contains",
                        placeholder: "เลือกประเภท...",
                        dataTextField: "CategoryName",
                        dataValueField: "CategoryID",
                        dataSource: {
                            type: "odata",
                            serverFiltering: true,
                            transport: {
                                read: "http://demos.kendoui.com/service/Northwind.svc/Categories"
                            }
                        }
                    }).data("kendoComboBox");

                    var products = $("#products").kendoComboBox({
                        autoBind: false,
                        cascadeFrom: "categories",
                        filter: "contains",
                        placeholder: "เลือกหัวข้อ...",
                        dataTextField: "ProductName",
                        dataValueField: "ProductID",
                        dataSource: {
                            type: "odata",
                            serverFiltering: true,
                            transport: {
                                read: "http://demos.kendoui.com/service/Northwind.svc/Products"
                            }
                        }
                    }).data("kendoComboBox");

                    var orders = $("#orders").kendoComboBox({
                        autoBind: false,
                        cascadeFrom: "products",
                        filter: "contains",
                        placeholder: "Select order...",
                        dataTextField: "Order.ShipCity",
                        dataValueField: "OrderID",
                        dataSource: {
                            type: "odata",
                            serverFiltering: true,
                            transport: {
                                read: "http://demos.kendoui.com/service/Northwind.svc/Order_Details?$expand=Order"
                            }
                        }
                    }).data("kendoComboBox");

                    $("#get").click(function() {
                        var categoryInfo = "\nCategory: { id: " + categories.value() + ", name: " + categories.text() + " }",
                            productInfo = "\nProduct: { id: " + products.value() + ", name: " + products.text() + " }",
                            orderInfo = "\nOrder: { id: " + orders.value() + ", name: " + orders.text() + " }";

                        alert("Order details:\n" + categoryInfo + productInfo + orderInfo);
                    });
                });
            </script>
        </div><br />
<br />

        </td></tr>

<tr><td>
     <div id="example" class="k-content">
    <div class="chart-wrapper">
        <div id="chart" style="background: center no-repeat url('../../content/shared/styles/world-map.png');"></div>
    </div>
    <script>
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    position: "bottom",
                    text: "Share of Internet Population Growth, 2007 - 2012"
                },
                legend: {
                    visible: false
                },
                chartArea: {
                    background: ""
                },
                seriesDefaults: {
                    labels: {
                        visible: true,
                        background: "transparent",
                        template: "#= category #: #= value#%"
                    }
                },
                series: [{
                    type: "pie",
                    startAngle: 150,
                    data: [{
                        category: "Asia",
                        value: 53.8,
                        color: "#9de219"
                    },{
                        category: "Europe",
                        value: 16.1,
                        color: "#90cc38"
                    },{
                        category: "Latin America",
                        value: 11.3,
                        color: "#068c35"
                    },{
                        category: "Africa",
                        value: 9.6,
                        color: "#006634"
                    },{
                        category: "Middle East",
                        value: 5.2,
                        color: "#004d38"
                    },{
                        category: "North America",
                        value: 3.6,
                        color: "#033939"
                    }]
                }],
                tooltip: {
                    visible: true,
                    format: "{0}%"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>
</div>

</td></tr>

</table>

