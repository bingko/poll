    <table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
           <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;คำถามที่ใช้บ่อย</strong></div>
    </td>
  </tr>
  <tr><td >

        <div id="example" class="k-content" >

            <div class="configuration" hidden="ture">
                <span class="configHead">Animation Settings</span>
                <ul class="options">
                    <li>
                        <input id="toggle" name="animation" type="radio" /> <label for="toggle">toggle animation</label>
                    </li>
                    <li>
                        <input id="expand" name="animation" type="radio" checked="checked" /> <label for="expand">expand animation</label>
                    </li>
                    <li>
                        <input id="opacity" type="checkbox" checked="checked" /> <label for="opacity">animate opacity</label>
                    </li>
                </ul>
            </div>

            <div id="tabstrip" style="width:100%">
                <ul>
                    <li class="k-state-active">
                        จัดการคำถามที่ใช้บ่อย
                    </li>
                    <li>
                        สร้างคำถามที่ใช้บ่อย
                    </li>

                </ul>
                
                
                <!-- ตารางคำถามที่ใช้บ่อย -->
                <div>
                    
   <table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
           <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;คำถามที่ใช้บ่อย</strong></div>
    </td>
  </tr>
  <tr><td >
       <div id="grid_table">
        <table id="list_temp">
                <thead>
                    <tr>
                        <th data-field="temp_title"><div align="center">หัวข้อคำถาม</div></th>
                        <th data-field="temp_desc"><div align="center">รายละเอียด</div></th>
                        <th data-field="temp_createdate"><div align="center">วันที่สร้างคำถาม</div></th>
                        <th data-field="control"><div align="center">จัดการคำถาม</div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($template_subject as $template_subject){?>
                  <tr>
                    <td><?php echo $template_subject['temp_title']?></td>
                    <td><?php echo $template_subject['temp_detail']?></td>
                    <td><div align="center"><?php echo $template_subject['temp_createdate']?></div></td>
                    <td><div align="center">
            <?php echo anchor('ci_manage_temp/update_temp_db/'.$template_subject['temp_id'].'','<img src="'.base_url().'images/icon_set/doc_edit.png" width="27" border="0" >');?>
            <?php echo anchor('ci_manage_temp/delete_temp_db/'.$template_subject['temp_id'].'','<img src="'.base_url().'images/icon_set/delete_icon.png" width="27" border="0" >' , array('onClick' => "return confirm('คุณต้องการลบคำถามใช่หรือไม่?')"));?>
                        </div></td>
                        
                    </tr>
                 <?php } ?>
                </tbody>
		</table>

        </div>


  </td>
  </tr>
  </table>
            <script>
                $(document).ready(function() {
                    $("#list_temp").kendoGrid({
                        //height: 430,
                        //sortable: true
                        dataSource: {pageSize: 20},
                        columns: [
                            { field: "temp_title"},
                            { field: "temp_detail", width: "25s%" },
                            { field: "temp_createdate", width: "10%" },
                            { field: "control", width: "20%" }],
                    });
                });
</script>        
                </div>
                
                <!-- ปิดตารางจัดการคำถาม-->
                <div>
                <!-- เปิดสร้างคำถาม -->
                    <?php @session_start(); $all_session = $this->session->all_userdata();?>
<!--ตัวแปร รับค่า session ทั้งหมด-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_radius">
  <tr>
  	<td>

  	
        <h2>&nbsp;&nbsp;&nbsp;&nbsp;แบบฟอร์มคำถามที่ใช้บ่อย</h2>
        <?php echo form_open('ci_manage_temp/check_create')?>
          <div>
        <div align="center">
        <p><input type="submit" class="k-button" value="ถัดไป" style="width:150px;"/></p>
        </div>
        <table width="100%" align="center">
        <tr>
            <td><p><strong>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หัวข้อแบบคำถาม</strong><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="temp_title" id="temp_title" class="k-textbox" style="width:95%;" value="<?php echo @$all_session['heading']['temp_title']?>"/></p>
            </td>
            
          </tr>

          <tr>
            <td><strong>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายละเอียดแบบคำถาม</strong><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<textarea name="temp_detail" id="temp_detail" cols="45" rows="5" class="k-textbox" style="width:95%;" ><?php echo @$all_session['heading']['temp_detail']?></textarea></td>
          </tr>
        </table>
        </div>
        <?php echo form_close()?>
        
  	</td>
  </tr>
  <tr>
    <td valign="top"><?php 
	$popup_review = array(
		'width'      => '900',
		'height'     => '800',
		'scrollbars' => 'yes',
		//'status'     => 'yes',
		//'resizable'  => 'yes',
		'screenx'    => '0',
		'screeny'    => '0'
	);
?>
      
      <p>&nbsp;</p></td>
  </tr>
</table>

                </div>
                
            </div>
            <script>
                $(document).ready(function() {
                    var original = $("#tabstrip").clone(true);
                    original.find(".k-state-active").removeClass("k-state-active");

                    var getEffects = function () {
                        return (($("#expand")[0].checked ? "expand:vertical " : "") + ($("#opacity")[0].checked ? "fadeIn" : "")) || false;
                    };

                    var initTabStrip = function () {
                        $("#tabstrip").kendoTabStrip({ animation: { open: { effects: getEffects() } } }).css({ marginRight: "220px" });
                    };

                    $(".configuration input").change( function() {
                        var tabStrip = $("#tabstrip"),
                            selectedIndex = tabStrip.data("kendoTabStrip").select().index(),
                            clone = original.clone(true);

                        clone.children("ul")
                             .children("li")
                             .eq(selectedIndex)
                             .addClass("k-state-active")
                             .end();

                        tabStrip.replaceWith(clone);

                        initTabStrip();
                    });

                    initTabStrip();
                });
            </script>
        </div>



</td></tr></table>

