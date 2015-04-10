<?php $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><br />

    <?php if(@$all_session['login']['user_id']==""){?>

    <table width="80%" bgcolor="#CCCCCC" height="400px" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius" >
<tr><td></td></tr>
    <tr>
    <td width="25%" height="380px">

		<div class="view view-first">
		<img src="<?php echo base_url()?>images/resp_menu.png" />
		<div class="mask">
			<h2>ตอบแบบสอบถาม</h2>
			<p>อีสานโพล &quot;เข้าใจทุกเสียงของคนอีสาน&quot;<br />
			อีสานโพลคือผลสำรวจข้อมูลที่เน้นประเด็นสำคัญของพื้นที่อีสาน ภายใต้ความรับผิดชอบของ
			ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน(ECBER)</p>
			<a href="<?php echo base_url()?>index.php/home/list_survey" class="info">คลิ๊ก</a>
		</div>
		</div>  
    </td>
   <td width="25%" height="380px">
    <div class="view view-first">
    <img src="<?php echo base_url()?>images/exitpoll.png" />
	<div class="mask">
		<h2>ดูโพลย้อนหลัง</h2>
		<p>สำรวจข้อมูลการสำรวจที่ผ่านมาได้ ที่นี่!</p>
		<a href="<?php echo base_url()?>index.php/home/list_poll" class="info">คลิ๊ก</a>
	</div>
	</div> 
   </td>
   <td width="25%" height="380px" >
   
	<div class="view view-first">
	<img src="<?php echo base_url()?>images/contactus.png" />               
	<div class="mask">
		<h2>ติดต่อเรา</h2>
		<p>ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน<br /><br />
		คณะวิทยาการจัดการ <br />มหาวิทยาลัยขอนแก่น <br />
		โทรศัพท์ 0-4320-2401, <br />
		0-4320-2342, 0-4320-2344, <br />
		0-4336-2206 ต่อ 140 <br />
		โทรสาร 0-4320-2567<br />
        E-mail : ecber.kku@gmail.com</p>
		<a href="http://ecberkku.com/contact.html" class="info">คลิ๊ก</a>
	</div>
	</div>  
   </td>
 

 
   <td  width="25%" height="380px" valign="top">
          <?php echo form_open('ci_login/login')?>
          <table width="200" height="250" align="right" cellpadding="3" cellspacing="3" class="table_radius">
            <tr>
              <td height="40" colspan="2" align="center"><strong style="font-size:25px;">เข้าสู่ระบบผู้ใช้งาน</strong></td>
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
              <td height="40" >
              <input type="submit" name="button" id="button" value="เข้าสู่ระบบ" class="k-button" />
              <input type="reset" name="Reset" id="button" value="ยกเลิก" class="k-button" />
              </td>
              </tr>
              </table><br /></td>
              </tr>
            </table>
          <?php echo form_close()?>

          </td>
             </tr>
   </table>
  <!-------------------------------- ปิดเมนูกราฟฟิก --------------------------------->

    <table width="80%" border="0" align="center" cellpadding="3" cellspacing="3">
      <tr>
        
      </tr>
    </table>
	<?php }else if($all_session['login']['user_status']==1&&$all_session['login']['user_type']==1||$all_session['login']['user_type']==2){?>
  
    <table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
           <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;ข้อมูลรายการแบบสอบถาม</strong></div>
    </td>
  </tr>

      <tr>
        <td align="right" valign="top">
        <a href="#" class="topopup"><input name="Submit" type="submit" value="สร้างฟอร์มแบบสอบถาม" class="k-button"/></a>
        </td>
      </tr>
      <tr>
        <td valign="top">
        <table id="list_survey">
                <thead>
                    <tr>
                        <th data-field="title"><div align="center"><strong>หัวข้อแบบสอบถาม</strong></div></th>
                        <th data-field="category"><div align="center"><strong>ประเภทแบบสอบถาม</strong></div></th>
                        <th data-field="createdate"><div align="center"><strong>วันที่สร้าง</strong></div></th>
                        <th data-field="createuser"><div align="center"><strong>ผู้สร้าง</strong></div></th>
                        <th data-field="datetime"><div align="center"><strong>ระยะเวลา<br />สอบถาม</strong></div></th>
                        <th data-field="respondents"><div align="center"><strong>จำนวน<br />ผู้ตอบ</strong></div></th>
                        <th data-field="type_survey"><div align="center"><strong>สถานะ</strong></div></th>
                        <th data-field="report"><div align="center"><strong>รายงาน</strong></div></th>
                        <th data-field="control"><div align="center" onmouseover="showhint('hint_here', this, event, 'hint_width')"><strong>จัดการ</strong></div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($survey_list as $survey_list){?>
            		<tr>
                    	<!-- <td><?php echo anchor('report/rawdata_table/'.$survey_list['qh_id'].'',$survey_list['qh_title']);?></td> -->
                        <td><?php echo $survey_list['qh_title'];?></td>
                        <td><?php echo $survey_list['sc_name'] ?></td>
                        <td><?php echo $survey_list['qh_createdate']?></td>
                        <td><?php echo $survey_list['user_name']?></td>
                        <td><?php echo $survey_list['qh_startdate']?> <br />ถึง <?php echo $survey_list['qh_enddate']?></td>
                        <td><div align="center"><?php $this->db->where('qh_id',$survey_list['qh_id']); echo $this->db->count_all_results('subject_value');?> คน</div></td>
						<td><div align="center">                        
						<?php if($survey_list['qh_type']==0) {
                        echo "<img src='" ?><?php echo base_url()?><?php echo "images/icon_set/group.png'>"; 
						} else if($survey_list['qh_type']==1) { 
                        echo "<img src='" ?><?php echo base_url()?><?php echo "images/icon_set/global.png'>"; 
                        } else if($survey_list['qh_type']==2) { 
                        echo "<img src='" ?><?php echo base_url()?><?php echo "images/icon_set/lock.png'>"; 
                        }?>
                        </div>
                        </td>
						<td>
                        <div>
						<?php echo anchor('survey/list_detail/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/report.png" width="25" border="0" >');?>
						<?php echo anchor('report/rawdata_table/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/chart.png" width="25" border="0" >')?>
						<?php echo anchor('report/print_rawdata_table/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/print.png" width="25" border="0" >','target="_blank"')?>
                        <?php
                        $atts = array(
							'onClick' => "return confirm('กำลังประมวลผล กรุณารอ10นาที')",
							'target' => "_blank",
							'width'      => '500',
							'height'     => '500',
							'scrollbars' => 'no',
							'status'     => 'no',
							'resizable'  => 'no',
							'screenx'    => '0',
							'screeny'    => '0'
						);
						//echo anchor_popup('report/gen_excel/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/Icon/process.png" width="25" border="0" >',$atts);
						?>
                        <a href="<?php echo site_url('report/new_excel')."/".$survey_list['qh_id'] ?>" target="_blank"><img src="<?php echo base_url()?>images/icon_set/excel.png" width="25" border="0" ></a>
                        <?php 
						/*
						$file_name = $survey_list['qh_id'];
								$filepath = 'excel/'.$file_name.'.xls';
								if(file_exists($filepath)){ ?>
									<a href="<?php echo base_url().'excel/'.$survey_list['qh_id'].'.xls'?>"><img src="<?php echo base_url()?>images/icon_set/excel.png" width="25" border="0" ></a>
								<?php } 
								*/ ?>
                        </div>
						</td>
                        <td>
                        <div align="center">
						<?php if($survey_list['poll_open']!=0){?>
						<?php echo anchor('survey/convert/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/symbol_check.png" width="25" border="0" >')?><?php }else{?><?php echo anchor('survey/convert/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/symbol_check_no.png" width="25" border="0" >')?><?php } ?> <?php echo anchor('ci_manage_survey/update_survey_db/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/doc_edit.png" width="27" border="0" >');?>
						<?php echo anchor('ci_manage_survey/delete_survey_db/'.$survey_list['qh_id'].'','<img src="'.base_url().'images/icon_set/delete_icon.png" width="27" border="0" >' , array('onClick' => "return confirm('คุณต้องการลบแบบสอบถามใช่หรือไม่?')"));?>
                        </div>
                        </td>
					</tr>
                <?php } ?>
                </tbody>
            </table>
        </td>
      </tr>
    </table>
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
                            { field:"title"},
                            { field: "category", width: "10%" },
							{ field: "createdate", width: "8%" },
							{ field: "createuser", width: "11%" },
                            { field: "datetime", width: "10%" },
                            { field: "respondents", width: "5%"  },
                            { field: "type_survey", width: "5%",filterable: false },
							{ field: "report", width: "15%" , filterable: false},
                            { field: "control", width: "10%" ,filterable: false }],
                    });
                });
</script>
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
            <select name="category" id="category" class="k-textbox" style="height:30px;width:100%;" >
            
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
            <select name="title_copy_old" id="title_copy_old" class="k-textbox" style="height:30px;width:100%;" >
            <option value="">เลือกประเภทหัวข้อแบบสอบถามเดิม</option>
			<?php for($a=0;$a<count($question_subject);$a++){?>
            <option value="<?php echo $question_subject[$a]['qh_id']?>"><?php echo $question_subject[$a]['qh_title']?></option>
            <?php } ?>
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
						sortable: true,
						pageable: true,
						selectable: "multiple",
						dataSource: {pageSize: 10},
						columns: [
							
                            { field: "title", width: "25%"},
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
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;ข้อมูลรายการแบบสอบถาม</strong></div>
    </td>
  </tr>

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
                        <td><div align="center">
						<?php
						$all_session = $this->session->all_userdata();
                        $this->db->where('qh_id',$survey_list['qh_id']);
						$this->db->where('user_id',$all_session['login']['user_id']); 
						echo $this->db->count_all_results('subject_value');?> คน
                        </div></td>
                  <?php if($survey_list['qh_enddate']>=date('Y-m-d')){
					  		if($survey_list['qh_startdate']<=date('Y-m-d')){ ?>
                  <td><div align="left"><?php echo anchor('survey/list_detail/'.$survey_list['qh_id'].'','<input name="submit" type="submit" class="k-button" value="รายงาน"/>')?><?php echo anchor('ci_manage_survey/select_survey_db/'.$survey_list['qh_id'].'','<input name="submit" type="submit" class="k-button" value="สำรวจ"/>')?></div></td>
                  <?php }else{ ?>
                  <td><div align="left" style="color:red;"><?php echo anchor('survey/list_detail/'.$survey_list['qh_id'].'','<input name="submit" type="submit" class="k-button" value="รายงาน"/>')?> ไม่อยู่ในช่วงสำรวจ</div></td>
                  <?php }
				  	}else{ ?>
                  <td><div align="left" style="color:red;"><?php echo anchor('survey/list_detail/'.$survey_list['qh_id'].'','<input name="submit" type="submit" class="k-button" value="รายงาน"/>')?> ไม่อยู่ในช่วงสำรวจ</div></td>
                  <?php } ?>
                  </tr>
                <?php } ?>
                </tbody>
		</table>
        </div>
        </td>
      </tr>
    </table>
    <?php $this->session->unset_userdata('all_qa_all'); ?>
	<script>
                $(document).ready(function() {
                    $("#grid").kendoGrid({
                        //height: 430,
                        sortable: true,
						pageable: true,
						selectable: "multiple",
						dataSource: {pageSize: 10},
						columns: [
                            { field:"qh_title", title: "หัวข้อแบบสำรวจ"},
                            { field: "qh_category", title:"ประเภทแบบสำรวจ", width: "15%" },
                            { field: "qh_createdate", title:"วันที่สร้างแบบสำรวจ", width: "12%" },
                            { field: "qh_date", title:"ระยะเวลาสำรวจ", width: "15%"  },
                            { field: "qh_count", title:"จำนวนผู้ตอบ", width: "8%"  },
							{ field: "qh_url", title:"จัดการสำรวจ", width: "20%"  }],
                    });
                });
	</script>
    <?php }?>
    </td>
  </tr>
  
</table>
