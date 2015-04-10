<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
    <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;ส่งออกข้อมูลดิบแบบสอบถาม</strong></div>
    </td>
  </tr>
<tr><td align="center"><p></p>
<div id="export_view" class="k-content">


            <div class="export-section">
                <h2></h2>
                <p>
                    <label for="categories">ประเภทแบบสอบถาม :</label><input id="categories" style="width: 300px" />
                </p>
                <p>
                    <label for="products">หัวข้อแบบสอบถาม:</label><input id="products" disabled="disabled" style="width: 300px" />
                </p>
                <button class="k-button" id="get">ส่งออกข้อมูล</button>
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
        </div>
        </td></tr>
        </table>
