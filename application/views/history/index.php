<p></p>
<?php
	$thai_month = array(
		"01"=>"มกราคม",
		"02"=>"กุมภาพันธ์",
		"03"=>"มีนาคม",
		"04"=>"เมษายน",
		"05"=>"พฤษภาคม",
		"06"=>"มิถุนายน",	
		"07"=>"กรกฎาคม",
		"08"=>"สิงหาคม",
		"09"=>"กันยายน",
		"10"=>"ตุลาคม",
		"11"=>"พฤศจิกายน",
		"12"=>"ธันวาคม"					
	);
?>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
  <tr>
    <td height="50" bgcolor="#CCCCCC"><div class="alert"><strong>&nbsp;ประวัติการใช้งานระบบ</strong></div></td>
  </tr>
  <tr>
    <td>
    <div id="tabstrip">
		<ul>
            <li class="k-state-active">ประวัติการเข้าสู่ระบบ</li>
            <li>ประวัติการจัดการแบบสำรวจ</li>
            <li>ประวัติการจัดการข้อมูลผู้ใช้งาน</li>
        </ul>
        <div>
        	<table id="history_login">
                <thead>
                    <tr>
                        <th data-field="logfile_login_user"><div align="center"><strong>ผู้ใช้งาน</strong></div></th>
                        <th data-field="logfile_login_time"><div align="center"><strong>เวลา</strong></div></th>
                        <th data-field="logfile_login_date"><div align="center"><strong>วันที่</strong></div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($history_login as $history_login){?>
            		<tr>
                        <td><?php echo $history_login['logfile_login_user'];?></td>
                        <td><div align="center"><?php echo $history_login['logfile_login_time']?></div></td>
                        <td><div align="center">
						<?php
							$date = $history_login['logfile_login_date'];
							$date_arr = @split('-',$date);
							echo $date_arr[2].' '.$thai_month[$date_arr[1]].' '.($date_arr[0]+543);
						?>
                        </div></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div>
        	<table id="history_survey">
                <thead>
                    <tr>
                        <th data-field="logfile_login_user"><div align="center"><strong>ผู้ใช้งาน</strong></div></th>
                        <th data-field="logfile_login_what"><div align="center"><strong>ส่วนการทำงาน</strong></div></th>
                        <th data-field="logfile_login_time"><div align="center"><strong>เวลา</strong></div></th>
                        <th data-field="logfile_login_date"><div align="center"><strong>วันที่</strong></div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($history_survey as $history_survey){?>
            		<tr>
                        <td><?php echo $history_survey['logfile_survey_user']?></td>
                        <td>
						<?php echo $history_survey['logfile_survey_what']?> 
                        (<?php 
							$this->db->where('qh_id',$history_survey['logfile_survey_form']);
							$query = $this->db->get('question_subject');
							foreach ($query->result() as $row)
							{
								echo @$row->qh_title;
							}
						?>)
                        </td>
                        <td><div align="center"><?php echo $history_survey['logfile_survey_time']?></div></td>
                        <td><div align="center">
						<?php
							$date = $history_survey['logfile_survey_date'];
							$date_arr = @split('-',$date);
							echo $date_arr[2].' '.$thai_month[$date_arr[1]].' '.($date_arr[0]+543);
						?>
                        </div></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div>
        	<table id="history_user">
                <thead>
                    <tr>
                        <th data-field="logfile_user_user"><div align="center"><strong>ผู้ใช้งาน</strong></div></th>
                        <th data-field="logfile_user_what"><div align="center"><strong>ส่วนการทำงาน</strong></div></th>
                        <th data-field="logfile_user_time"><div align="center"><strong>เวลา</strong></div></th>
                        <th data-field="logfile_user_date"><div align="center"><strong>วันที่</strong></div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($history_user as $history_user){?>
            		<tr>
                        <td><?php echo $history_user['logfile_user_user']?></td>
                        <td><?php echo $history_user['logfile_user_what']?>(<?php echo $history_user['logfile_user_form']?>)</td>
                        <td><div align="center"><?php echo $history_user['logfile_user_time']?></div></td>
                        <td><div align="center">
						<?php
							$date = $history_user['logfile_user_date'];
							$date_arr = @split('-',$date);
							echo $date_arr[2].' '.$thai_month[$date_arr[1]].' '.($date_arr[0]+543);
						?>
                        </div></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
	</div>
    </td>
  </tr>
</table>
<script>
                $(document).ready(function() {
                    $("#history_login").kendoGrid({
                        sortable: true,
						//filterable: true,
						pageable: true,
						dataSource: {pageSize: 10},
						columns: [
                            { field: "logfile_login_user"},
                            { field: "logfile_login_time", width: "10%" },
							{ field: "logfile_login_date", width: "15%" }
							],
                    });
                });
</script>
<script>
                $(document).ready(function() {
                    $("#history_survey").kendoGrid({
                        sortable: true,
						//filterable: true,
						pageable: true,
						dataSource: {pageSize: 10},
						columns: [
                            { field: "logfile_user_user", width: "15%"},
                            { field: "logfile_user_what"},
                            { field: "logfile_user_time", width: "10%" },
							{ field: "logfile_user_date", width: "15%" }
							],
                    });
                });
</script>
<script>
                $(document).ready(function() {
                    $("#history_user").kendoGrid({
                        sortable: true,
						//filterable: true,
						pageable: true,
						dataSource: {pageSize: 10},
						columns: [
                            { field: "logfile_survey_user", width: "15%"},
                            { field: "logfile_survey_what"},
                            { field: "logfile_survey_time", width: "10%" },
							{ field: "logfile_survey_date", width: "15%" }
							],
                    });
                });
</script>
<script>
                $(document).ready(function() {
                    $("#tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
</script>