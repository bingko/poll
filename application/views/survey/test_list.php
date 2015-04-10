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


</body>
</html>