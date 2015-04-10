<p></p>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
  <tr>
    <td height="50" bgcolor="#CCCCCC"><div class="alert"><strong>&nbsp;รายชื่อผู้เก็บแบบสำรวจ</strong></div></td>
  </tr>
  <tr>
    <td>
		<table id="keep">
                <thead>
                    <tr>
                        <th data-field="user_title"><div align="center"><strong>คำนำหน้าชื่อ</strong></div></th>
                        <th data-field="user_name"><div align="center"><strong>ชื่อ-นามสกุล</strong></div></th>
                        <th data-field="user_tel"><div align="center"><strong>เบอร์ติดต่อ</strong></div></th>
                        <th data-field="user_mail"><div align="center"><strong>อีเมล์</strong></div></th>
                        <th data-field="user_status"><div align="center"><strong>สถานะ</strong></div></th>
                        <th data-field="manage"><div align="center"><strong>ข้อมูลสำรวจ</strong></div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($keep as $keep){?>
            		<tr>
                        <td><?php echo $keep['user_title']?></td>
                        <td><?php echo $keep['user_name']?></td>
                        <td><?php echo $keep['user_tel']?></td>
                        <td><?php echo $keep['user_mail']?></td>
                        <td><div align="center">
						<?php
                        	if($keep['user_status']==1){
								echo  "<strong style='color:green;'>เปิดการใช้</strong>";
							}else{
								echo  "<strong style='color:red;'>ปิดการใช้งาน</strong>";
							}
						?>
                        </div></td>
                        <td><div align="center">
                        <?php echo anchor('history/follow_keep/'.$keep['user_id'].'','<input name="" type="submit" value="ติดตามข้อมูล" class="k-button" />')?>
                        </div></td>
                    </tr>
                <?php } ?>
                </tbody>
		</table>
    </td>
  </tr>
</table>
<script>
                $(document).ready(function() {
                    $("#keep").kendoGrid({
                        sortable: true,
						//filterable: true,
						pageable: true,
						dataSource: {pageSize: 10},
						columns: [
                            { field: "user_title", width: "10%"},
                            { field: "user_name" },
							{ field: "user_tel", width: "20%"},
							{ field: "user_mail", width: "20%" },
							{ field: "user_status", width: "10%" },
							{ field: "manage", width: "10%" }
							],
                    });
                });
</script>