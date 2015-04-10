 <table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
    <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;แก้ไขฟอร์มแบบสำรวจ</strong></div>
    </td>
  </tr>    
<tr><td height="30" bgcolor="#CCCCCC" align="center">แก้ไขรูปภาพโลโก้แบบสำรวจ</td></tr>
<tr><td><p align="center"><br />
<br />เลือกรูปภาพโลโก้ที่ต้องการในขนาด 80x80 pixel 
</p>

<div id="example" class="k-content" align="center">
            <div class="configuration k-widget k-header" style="width: 300px"></div>
            
            <div style="width:45%">
                <div class="demo-section">
                    <input name="files" id="files" type="file" />
                </div>
            </div><br />
<br />
<br />
<br />
        </div>
        
        </td></tr>
 
       <tr><td height="30" bgcolor="#CCCCCC" align="center">แก้ไขข้อความบนหัวแบบสอบถาม</td></tr>
       
        <tr><td>
    <div id="example" class="k-content">
    <div class="configuration" style="float:none;max-width:none;margin:0 0 2em;">
    </div>

    <textarea id="editor" rows="10" cols="30" style="width:100%;height:50px">
    <p align="center">ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน (ECBER) คณะวิทยาการจัดการ มหาวิทยาลัยขอนแก่น<br />
123 ถ.มิตรภาพ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40002 โทร.0-4320-2566  โทรสาร.0-4320-2567</p>
    </textarea>

    <script type="text/x-kendo-template" id="viewHtml-template">
        <div>
            <textarea style="width: 400px; height: 300px;"></textarea>
            <div class="viewHtml-actions">
                <button class="k-button viewHtml-update">Update</button>
                <button class="k-button viewHtml-cancel">Cancel</button>
            </div>
        </div>
    </script>

    <script type="text/x-kendo-template" id="backgroundColor-template">
        <label for='templateTool' style='vertical-align:middle;'>Background:</label>
        <select id='templateTool' style='width:90px'><option value=''>none</option><option value='\#ff9'>yellow</option><option value='\#dfd'>green</option></select>
    </script>

    <script>
        $("#editor").kendoEditor({
            tools: [
                {
                    name: "fontName",
                    items: [].concat(
                        kendo.ui.Editor.prototype.options.fontName[8],
                        [{ text: "Garamond", value: "Garamond, serif" }]
                    )
                },
                {
                    name: "fontSize",
                    items: [].concat(
                        kendo.ui.Editor.prototype.options.fontSize[0],
                        [{ text: "16px", value: "16px" }]
                    )
                },
                {
                    name: "formatting",
                    items: [].concat(
                        kendo.ui.editor.FormattingTool.prototype.options.items[0],
                        [{ text: "Fieldset", value: "fieldset" }]
                    )
                },
                {
                    name: "customTemplate",
                    template: $("#backgroundColor-template").html()
                },
                {
                    name: "custom",
                    tooltip: "Insert a horizontal rule",
                    exec: function(e) {
                        var editor = $(this).data("kendoEditor");
                        editor.exec("inserthtml", { value: "<hr />" });
                    }
                }
            ]
        });

        $("#templateTool").kendoDropDownList({
            change: function(e) {
                $("#editor").data("kendoEditor").body.style.backgroundColor = e.sender.value();
            }
        });

    </script>

</div>


        
</td></tr>
<tr>
<td>
<p align="center"> <input type="submit" value="แก้ไข" class="k-button" width="100px" /></p>
</td>
</tr></table>


            <script>//สคริปอัพรูป
                $(document).ready(function () {
                    if (sessionStorage.initialFiles === undefined) {
                        sessionStorage.initialFiles = "[]";
                    }

                    var initialFiles = JSON.parse(sessionStorage.initialFiles);

                    $("#files").kendoUpload({
                        multiple: true,
                        async: {
                            saveUrl: "save",
                            removeUrl: "remove",
                            autoUpload: true
                        },
                        files: initialFiles,
                        success: onSuccess
                    });

                    function onSuccess(e) {
                        var currentInitialFiles = JSON.parse(sessionStorage.initialFiles);
                        for (var i = 0; i < e.files.length; i++) {
                            var current = {
                                name: e.files[i].name,
                                extension: e.files[i].extension,
                                size: e.files[i].size
                            }

                            if (e.operation == "upload") {
                                currentInitialFiles.push(current);
                            } else {
                                var indexOfFile = currentInitialFiles.indexOf(current);
                                currentInitialFiles.splice(indexOfFile, 1);
                            }
                        }
                        sessionStorage.initialFiles = JSON.stringify(currentInitialFiles);
                    }
                });
            </script>