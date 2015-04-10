<p></p>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
  <tr>
    <td height="50" bgcolor="#CCCCCC"><div class="alert"><strong>&nbsp;รายการแบบสอบถาม</strong></div></td>
  </tr>
  <tr>
    <td>
		<table id="grid">
                <thead>
                    <tr>
                        <th data-field="qh_title"><div align="center">หัวข้อแบบสำรวจ</div></th>
                        <th data-field="qh_category"><div align="center">ประเภทแบบสำรวจ</div></th>
                        <th data-field="qh_count"><div align="center">จำนวนผู้ตอบ</div></th>
                        <th data-field="manage"><div align="center">ผลการสำรวจ</div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($survey as $survey){?>
                    <tr>
                        <td><?php echo $survey['qh_title']?></td>
                        <td><?php echo $survey['sc_name']?></td>
                        <td><div align="center">
                        <?php
                        $this->db->where('qh_id',$survey['qh_id']);
                        $this->db->where('user_id',$this->uri->segment(3));

						echo $this->db->count_all_results('subject_value');?> คน
                        </div></td>
                        <td>
                        <?php echo anchor('survey/list_detail_keep/'.$survey['qh_id'].'/'.$this->uri->segment(3).'','<input name="" type="submit" value="ดูผลการสำรวจ" class="k-button">')?>
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
                    $("#grid").kendoGrid({
                        sortable: true,
						//filterable: true,
						pageable: true,
						dataSource: {pageSize: 10},
						columns: [
                            { field: "qh_title" },
                            { field: "qh_category", width: "30%" },
							{ field: "qh_count", width: "10%" },
							{ field: "manage", width: "10%" }
							],
                    });
                });
</script>