<?php $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด-->

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><hr /><br />

    <?php if(@$all_session['login']['user_id']==""){?>

    <table width="1000px" height="400px" border="0" align="center" cellpadding="0" cellspacing="1" style='table-layout:fixed'>
<tr><td></td></tr>
    <tr>
    <td width="250px" height="380px">

      <div class="view view-first">
                    <img src="<?php echo base_url()?>images/resp_menu.png" />
                    <div class="mask">
                        <h2>ตอบแบบสอบถาม</h2>
                        <p>ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน (ECBER) <br />
คณะวิทยาการจัดการ มหาวิทยาลัยขอนแก่น</p>
                        <a href="http://ecberkku.com/" class="info">คลิ๊ก</a>
                    </div>
                </div>  
                </div> 
    </td>
   <td width="250px" height="380px">
      <div class="view view-first">
    <div id="menu2" class="k-content" style="background:url(<?php echo base_url()?>images/readpoll.png)">
    <div class="chart-wrapper">
        <div id="chart_menu2" style="width:90%; height:100%; overflow:visible;"></div>
    </div>
    <script>
        function createChart() {
            $("#chart_menu2").kendoChart({
                title: {
                    position: "bottom",
                    text: ""
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
                    startAngle: 140,
                    data: [{
                        category: "บุรีรัมย์",
                        value: 33.8,
                        color: "#9de219"
                    },{
                        category: "บึงกาฬ",
                        value: 16.1,
                        color: "#90cc38"
                    },{
                        category: "หนองคาย",
                        value: 11.3,
                        color: "#068c35"
                    },{
                        category: "สกลนคร",
                        value: 9.6,
                        color: "#006634"
                    },{
                        category: "นครราชสีมา",
                        value: 15.2,
                        color: "#004d38"
                    },{
                        category: "เลย",
                        value: 13.6,
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
                    <div class="mask">
                        <h2>ดูโพลย้อนหลัง</h2>
                        <p>ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน (ECBER) <br />
คณะวิทยาการจัดการ มหาวิทยาลัยขอนแก่น</p>
                        <a href="http://ecberkku.com/news4.html" class="info">คลิ๊ก</a>
                    </div>
                </div> 
   </td>
   <td width="250px" height="380px" background="<?php echo base_url()?>images/about.png">
   
      <div class="view view-first">
                    
    <div id="menu3" class="k-content"  style="position:relative;top:30px;left:-5px;background:url(<?php echo base_url()?>images/about.png);" >
  
    <div class="chart-wrapper">
        <div id="chart_menu3" ></div>
    </div>
    <script>
        function createChart() {
            $("#chart_menu3").kendoChart({
                title: {
                    text: "เกี่ยวกับเรา"
                },
                legend: {
                    position: "bottom"
                },
                seriesDefaults: {
                    type: "area",
                    area: {
                        line: {
                            style: "smooth"
                        }
                    }
                },
                series: [{
                    name: "",
                    data: [3.907, 7.943, 7.848, 9.284, 9.263, 9.801, 3.890, 8.238, 9.552, 6.855]
                }, {
                    name: "",
                    data: [1.988, 2.733, 3.994, 3.464, 4.001, 3.939, 1.333, -2.245, 4.339, 2.727]
                }, {
                    name: "",
                    data: [-0.253, 0.362, -3.519, 1.799, 2.252, 3.343, 0.843, 2.877, -5.416, 5.590]
                }],
                valueAxis: {
                    labels: {
                        format: "{0}%"
                    },
                    line: {
                        visible: false
                    },
                    axisCrossingValue: -10
                },
                categoryAxis: {
                    categories: [],
                    majorGridLines: {
                        visible: false
                    }
                },
                tooltip: {
                    visible: true,
                    format: "{0}%",
                    template: "#= series.name #: #= value #"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>
    <style type="text/css">
        #chart {
            background: center no-repeat url('<?php echo base_url()?>images/about.png');
        }
    </style>
</div>
                    
                    <div class="mask">
                        <h2>เกี่ยวกับเรา</h2>
                        <p>ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน<br />
E-Saan Center For Business and Economic Research (ECBER) <br />
</p>
                        <a href="http://ecberkku.com/about.html" class="info">คลิ๊ก</a>
                    </div>
                </div>  
   </td>
   <td width="250px" height="380px">
   <div class="view view-first">
                    <img src="<?php echo base_url()?>images/contactus.png" />
                    <div class="mask">
                        <h2>ติดต่อเรา</h2>
                        <p align="left">
ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน<br /><br />

คณะวิทยาการจัดการ<br />
 มหาวิทยาลัยขอนแก่น<br /><br />
โทรศัพท์ 0-4320-2401, <br />
0-4320-2342, 0-4320-2344, <br />
0-4336-2206 ต่อ 140<br />

โทรสาร 0-4320-2567<br /><br />

email : ecber.kku@gmail.com</p>
                        <a href="http://ecberkku.com/contact.html" class="info">คลิ๊ก</a>
                    </div>
                </div>  
   </td>
   </tr>
   </table>
  <!-------------------------------- ปิดเมนูกราฟฟิก --------------------------------->
    <br /><br />
    <table width="1000" border="0" align="center" cellpadding="3" cellspacing="3">

<tr>
        <td width="70%" height="500" valign="top">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like-box" data-href="https://www.facebook.com/ecberkku" data-width="650" data-height="600" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
</td>
        <td width="30%" valign="top">
        <?php echo form_open('ci_login/login')?>
        <table width="100%" align="center" cellpadding="3" cellspacing="3" class="table_radius">
          <tr>
            <td height="40" colspan="2" align="center"><strong style="font-size:25px;">Login</strong></td>
            </tr>
          <tr>
            <td width="26%">Username</td>
            <td width="74%" height="40"><input type="text" name="username" id="username" class="k-textbox" /></td>
          </tr>
          <tr>
            <td>Password</td>
            <td height="40"><input type="password" name="password" id="password" class="k-textbox" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="40" ><input type="submit" name="button" id="button" value="เข้าสู่ระบบ" class="k-button" /></td>
          </tr>
        </table>
        <?php echo form_close()?>
        </td>
      </tr>
    </table>
	<?php }else if($all_session['login']['user_status']==1&&$all_session['login']['user_type']==1||$all_session['login']['user_type']==2){?>
    <p><p>   
    <table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
        <td align="right" valign="top">
        <a href="#" class="topopup"><input name="Submit" type="submit" value="สร้างฟอร์มแบบสอบถาม" class="k-button"/></a>
        </td>
      </tr>
      <tr>
        <td valign="top">
        <table id="grid">
                <thead>
                    <tr>
                        <th data-field="title"><div align="center"><strong>หัวข้อแบบสอบถาม</strong></div></th>
                        <th data-field="category"><div align="center"><strong>ประเภทแบบสอบถาม</strong></div></th>
                        <th data-field="createdate"><div align="center"><strong>วันที่สร้าง</strong></div></th>
                        <th data-field="datetime"><div align="center"><strong>ระยะเวลาสอบถาม</strong></div></th>
                        <th data-field="respondents"><div align="center"><strong>จำนวนผู้ตอบ</strong></div></th>
                        <th data-field="type_survey"><div align="center"><strong>สถานะ</strong></div></th>
                        <th data-field="control">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($survey_list as $survey_list){?>
            		<tr>
                    	<td><?php echo $survey_list['qh_title']?></td>
                        <td><?php echo $survey_list['sc_name']?></td>
                        <td><?php echo $survey_list['qh_createdate']?></td>
                        <td><?php echo $survey_list['qh_startdate']?> ถึง <?php echo $survey_list['qh_enddate']?></td>
                        <td>&nbsp;</td>
						<td><div align="center">                        
						<?php if($survey_list['qh_type']==0) {
                        echo "<img src='" ?><?php echo base_url()?><?php echo "images/icon_set/lock.png'></a>"; 
						} else if($survey_list['qh_type']==1) { 
                        echo "<img src='" ?><?php echo base_url()?><?php echo "images/icon_set/global.png'></a>"; 
                        } else if($survey_list['qh_type']==2) { 
                        echo "<img src='" ?><?php echo base_url()?><?php echo "images/icon_set/group.png'></a>"; 
                        }?>
                        </div>
                        </td>
						<td><input name="Submit" type="submit" value="รายงาน" class="k-button" /><?php echo anchor('ci_manage_survey/update_survey_db/'.$survey_list['qh_id'].'','<input name="Submit" type="submit" value="แก้ไขข้อมูล" class="k-button" />');?><?php echo anchor('ci_manage_survey/delete_survey_db/'.$survey_list['qh_id'].'','<input name="Submit" type="submit" value="ลบข้อมูล" class="k-button"/>' , array('onClick' => "return confirm('คุณต้องการลบแบบสอบถามใช่หรือไม่?')"));?></td>
					</tr>
                <?php } ?>
                </tbody>
            </table>
        </td>
      </tr>
    </table>
    <!-- // Javascript // -->
	<script language="JavaScript" type="text/javascript">
    function showhidediv(rad){
    var rads=document.getElementsByName(rad.name);
    document.getElementById('create_new').style.display=(rads[0].checked)?'block':'none' ;
    document.getElementById('create_old').style.display=(rads[1].checked)?'block':'none' ;
    }
    </script>
    <?php echo form_open('ci_manage_survey/check_create')?>
    <div id="toPopup">
        <div class="close"></div>
       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content">
        <h2>สร้างแบบสอบถาม</h2>
		<p>
            <input type="radio" name="check_create" id="check_create" value="1" onclick="showhidediv(this);" required validationMessage="Please enter {0}"/> สร้างแบบฟอร์มใหม่
		</p>
		<div id="create_new" style="display:none;" >
        <table width="95%" align="center">
          <tr>
            <td style="font-size:14px;"><strong>หัวข้อแบบสอบถาม</strong>
            <input type="text" name="title" id="title" class="k-textbox" style="width:100%;"/>
            </td>
            
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>ประเภทแบบสอบถาม</strong>
            <select name="category" id="category" class="k-textbox" style="height:30px;width:100%;">
            <option value="">เลือกประเภทแบบสอบถาม</option>
            <?php for($i=0;$i<count($survey_category);$i++){?>
            <option value="<?php echo $survey_category[$i]['sc_id']?>"><?php echo $survey_category[$i]['sc_name']?></option>
            <?php } ?>
            </select>
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>รายละเอียดแบบสอบถาม</strong>
            <textarea name="detail" id="detail" cols="45" rows="5" class="k-textbox" style="width:100%;" ></textarea></td>
          </tr>
        </table>
        </div>
		<p>
        	<input type="radio" name="check_create" id="check_create" value="2" onclick="showhidediv(this);" required validationMessage="Please enter {0}"/> คัดลอกจากแบบฟอร์มเดิม
        </p>
		<div id="create_old" style="display:none;">
        <table width="95%" align="center">
          <tr>
            <td style="font-size:14px;"><strong>หัวข้อแบบสอบถามเดิม</strong>
            <select name="category_copy_old" id="category_copy_old" class="k-textbox" style="height:30px;width:100%;">
            <option value="">เลือกประเภทหัวข้อแบบสอบถามเดิม</option>
           
            </select>
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>หัวข้อแบบสำรวจใหม่</strong>
            <input type="text" name="title_copy" id="title_copy" class="k-textbox" style="width:100%;" />
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>ประเภทแบบสำรวจ</strong>
            <select name="category_copy" id="category_copy" class="k-textbox" style="height:30px;width:100%;">
            <?php for($i=0;$i<count($survey_category);$i++){?>
            <option value="<?php echo $survey_category[$i]['sc_id']?>"><?php echo $survey_category[$i]['sc_name']?></option>
            <?php } ?>
            </select>
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;"><strong>รายละเอียดแบบสำรวจ</strong>
            <textarea name="detail_copy" id="detail_copy" cols="45" rows="5" class="k-textbox" style="width:100%;" ></textarea>
            </td>
          </tr>
        </table>
        </div>
        <p><div align="center">
        <input name="submit" type="submit" class="k-button" value="ดำเนินการต่อไป" />
        </div></p>
        </div>
    </div>
    <?php echo form_close()?>
	<div class="loader"></div>
   	<div id="backgroundPopup"></div>
    <script>	
                $(document).ready(function() {
                    $("#grid").kendoGrid({
                        //height: 430,
                        //sortable: true
						selectable: "multiple",
						dataSource: {pageSize: 20},
						columns: [
							
                            { field: "titile", width: "25%"},
                            { field: "category", width: "10%" },
							{ field: "createdate", width: "10%" },
                            { field: "datetime", width: "15%" },
                            { field: "respondents", width: "10%"  },
                            { field: "type_survey", width: "10%" },
                            { field: "control", width: "20%" }],
                    });
                });
	</script>
    <?php }else if($all_session['login']['user_type']==3){ ?>
    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
        <td>
        <div id="grid_table">
        <table id="grid">
                <thead>
                    <tr>
                        <th data-field="qh_title"><div align="center">หัวข้อแบบสำรวจ</div></th>
                        <th data-field="qh_category"><div align="center">ประเภทแบบสำรวจ</div></th>
                        <th data-field="qh_createdate"><div align="center">วันที่สร้างแบบสำรวจ</div></th>
                        <th data-field="qh_date"><div align="center">ระยะเวลาสำรวจ</div></th>
                        <th data-field="qh_count"><div align="center">จำนวนผู้ตอบ</div></th>
                        <th data-field="qh_url"><div align="center">จัดการสำรวจ</div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($survey_list as $survey_list){?>
                    <tr>
                        <td><?php echo $survey_list['qh_title']?></td>
                        <td><?php echo $survey_list['sc_name']?></td>
                        <td><?php echo $survey_list['qh_createdate']?></td>
                        <td><?php echo $survey_list['qh_startdate']?> ถึง <?php echo $survey_list['qh_enddate']?></td>
                        <td><div align="center"><?php $this->db->where('qh_id',$survey_list['qh_id']); echo $this->db->count_all_results('subject_value');?> คน</div></td>
                        <td><?php echo anchor('survey/list_detail/'.$survey_list['qh_id'].'','<input name="submit" type="submit" class="k-button" value="รายงาน"/>')?><?php echo anchor('ci_manage_survey/select_survey_db/'.$survey_list['qh_id'].'','<input name="submit" type="submit" class="k-button" value="สำรวจ"/>')?></td>
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
                    $("#grid").kendoGrid({
                        //height: 430,
                        //sortable: true
						columns: [
                            { field:"qh_title", title: "หัวข้อแบบสำรวจ"},
                            { field: "qh_category", title:"ประเภทแบบสำรวจ", width: "15%" },
                            { field: "qh_createdate", title:"วันที่สร้างแบบสำรวจ", width: "10%" },
                            { field: "qh_date", title:"ระยะเวลาสำรวจ", width: "15%"  },
                            { field: "qh_count", title:"จำนวนผู้ตอบ", width: "7%"  },
							{ field: "qh_url", title:"จัดการสำรวจ", width: "13%"  }],
                    });
                });
	</script>
    <?php }?>
    </td>
  </tr>
  
</table>
