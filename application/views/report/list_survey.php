    
        <div id="example" class="k-content">
            
            <div class="demo-section">
                <h2>Products</h2>
                <input id="products" style="width: 250px" />
            </div>

            <script>
                $(document).ready(function() {
                    $("#products").kendoDropDownList({
                        dataTextField: "ProductName",
                        dataValueField: "ProductID",
                        dataSource: {
                            transport: {
                                read: {
                                    dataType: "jsonp",
                                    url: "http://demos.kendoui.com/service/Products",
                                }
                            }
                        }
                    });
                });
            </script>
            
            <style scoped>
                .demo-section {
                    width: 250px;
                    margin: 35px auto 50px;
                    padding: 30px;
                }
                .demo-section h2 {
                    text-transform: uppercase;
                    font-size: 1.2em;
                    margin-bottom: 10px;
                }
            </style>
        </div><br>
<br>
            <script src="../../content/shared/js/people.js"></script>

        <div id="example" class="k-content">
            <div id="grid"></div>

            <div id="details"></div>

            <script>
                var wnd,
                    detailsTemplate;

                $(document).ready(function () {
                    var grid = $("#grid").kendoGrid({
                        dataSource: {
                           pageSize: 20,
                           data: createRandomData(50)
                        },
                        pageable: true,
                        height: 430,
                        columns: [
                            { field: "FirstName", title: "First Name", width: "140px" },
                            { field: "LastName", title: "Last Name", width: "140px" },
                            { field: "Title" },
                            { command: { text: "View Details", click: showDetails }, title: " ", width: "140px" }]
                    }).data("kendoGrid");

                    wnd = $("#details")
                        .kendoWindow({
                            title: "Customer Details",
                            modal: true,
                            visible: false,
                            resizable: false,
                            width: 300
                        }).data("kendoWindow");

                    detailsTemplate = kendo.template($("#template").html());
                });

                function showDetails(e) {
                    e.preventDefault();

                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    wnd.content(detailsTemplate(dataItem));
                    wnd.center().open();
                }
            </script>

            <script type="text/x-kendo-template" id="template">
                <div id="details-container">
                    <h2>#= FirstName # #= LastName #</h2>
                    <em>#= Title #</em>
                    <dl>
                        <dt>City: #= City #</dt>
                        <dt>Birth Date: #= kendo.toString(BirthDate, "MM/dd/yyyy") #</dt>
                    </dl>
                </div>
            </script>

            <style type="text/css">
                #details-container
                {
                    padding: 10px;
                }

                #details-container h2
                {
                    margin: 0;
                }

                #details-container em
                {
                    color: #8c8c8c;
                }

                #details-container dt
                {
                    margin:0;
                    display: inline;
                }
            </style>
        </div>