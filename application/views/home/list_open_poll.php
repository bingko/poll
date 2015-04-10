<table width="100%" height="50px" border="0" align="center" cellpadding="2" cellspacing="2" class="" bgcolor="cccccc" >
  <tr>
    <td><div align="center"><?php echo anchor('home/index','<input name="submit" type="submit" class="k-button" style="width:200px ; height:40px;" value="กลับหน้าแรก"/>')?> </div></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
        <tr>
          <td height="50" bgcolor="#CCCCCC"><div class="alert"><strong>&nbsp;ข้อมูลผลการสำรวจ</strong></div></td>
        </tr>
        <tr>
          <td align="right" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><table id="list_survey">
              <thead>
                <tr>
                  <th data-field="title"><div align="center"><strong>หัวข้อแบบสอบถาม</strong></div></th>
                  <th data-field="category"><div align="center"><strong>ประเภทแบบสอบถาม</strong></div></th>
                  <th data-field="datetime"><div align="center"><strong>ระยะเวลาสอบถาม</strong></div></th>
                  <th data-field="report"><div align="center"><strong>รายงาน</strong></div></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($survey_list as $survey_list){?>
                <tr> 
                  <!-- <td><?php echo anchor('report/rawdata_table/'.$survey_list['qh_id'].'',$survey_list['qh_title']);?></td> -->
                  <td><?php echo $survey_list['qh_title'];?></td>
                  <td><?php echo $survey_list['sc_name'] ?></td>
                  <td><?php echo $survey_list['qh_startdate']?> ถึง <?php echo $survey_list['qh_enddate']?></td>
                  <td><div align="center"><?php echo anchor('report/show_graph/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/chart.png" width="25" border="0" >')?> <?php if($survey_list['qh_file']!=""){?>
						<?php echo anchor(base_url().'pdf/'.$survey_list['qh_file'].'','<img src="'.base_url().'images/icon_set/pdf_icon.png" width="27" border="0" >','target="_blank"', array('onClick' => "return confirm('คุณต้องการอ่านรายงานเป็น PDF ใช่หรือไม่?')"));?>
                        <?php } ?> </div></td>
                </tr>
                <?php } ?>
              </tbody>
            </table></td>
        </tr>
      </table>
      
      <!-- // Javascript // --> 
      <script language="JavaScript" type="text/javascript">
    function showhidediv(rad){
    var rads=document.getElementsByName(rad.name);
    document.getElementById('create_new').style.display=(rads[0].checked)?'block':'none' ;
    document.getElementById('create_old').style.display=(rads[1].checked)?'block':'none' ;
    }
    </script></td>
  </tr>
</table>
<script>
                $(document).ready(function() {
                    var validator = $("#tickets").kendoValidator().data("kendoValidator"),
                    status = $(".status");

                    $("button").click(function() {
                        if (validator.validate()) {
                            status.text("Hooray! Your tickets has been booked!")
                                .removeClass("invalid")
                                .addClass("valid");
                        } else {
                            status.text("Oops! There is invalid data in the form.")
                                .removeClass("valid")
                                .addClass("invalid");
                        }
                    });
                });
</script> 
<script>
                $(document).ready(function() {
                    $("#list_survey").kendoGrid({
                        //height: 430,
                        sortable: true,
						//selectable: "single",
						filterable: true,
						pageable: true,
						dataSource: {pageSize: 10},
						columns: [
                            { field:"title", width: "45%"},
                            { field: "category", width: "20%" },

                            { field: "datetime", width: "20%" },
                            
							{ field: "report", width: "15%" , filterable: false}],
                    });
                });
</script>