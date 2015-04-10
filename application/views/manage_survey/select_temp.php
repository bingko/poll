

<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/all.min.js"></script>
<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/animetextstyle.css" rel="stylesheet">
<?php //$all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด ?>

<body style="font-family:thaisanslite; font-size:20px;"  >
<?php echo form_open('ci_manage_temp/select_temp')?>
<table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td>
    <table id="grid_temp">
                <thead>
                    <tr>
                      <th data-field="select">#</th>
                      <th data-field="temp_title">หัวข้อคำถาม</th>
                      <th data-field="temp_detail">รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $i=0;?>
                    <?php foreach($template_subject as $template_subject){?>
                    <?php if($template_subject['temp_id']!=0){?>
               	  <tr>
                 	  <td>
					  <?php if($template_subject['temp_id'] == @$all_session['temp_id'][$i]||$template_subject['temp_id'] == @$all_session['temp_id'][$i][$i]){?>
             			<input name="temp_id[<?php echo $i ?>]" type="checkbox" id="temp_id[<?php echo $i ?>]" value="<?php echo $template_subject['temp_id']?>" checked="checked" >
                      <?php }else{?>
                      	<input name="temp_id[<?php echo $i ?>]" type="checkbox" value="<?php echo $template_subject['temp_id']?>" id="temp_id[<?php echo $i ?>]">
                       <?php }?>
               	    </td>
                      <td><?php echo $template_subject['temp_title']?></td>
                      <td><?php echo $template_subject['temp_detail']?></td>

                    </tr>
                    <?php }$i++;} ?>
                </tbody>
    </table>
    </td>
  </tr>
</table>
<p>
<a href="javascript:window.close();"><input name="" type="submit" value="เลือก" class="k-button" style="width:150px;"></a>
<a href="javascript:window.close();"><input name="" type="button" value="ยกเลิก" class="k-button" style="width:150px;"></a>
</p>
<?php echo form_close()?>
<script>
                $(document).ready(function() {
                    $("#grid_temp").kendoGrid({
                        //height: 430,
                        sortable: true,
						dataSource: {pageSize: 20},
						columns: [
                            { field: "select",width: "10%"},
                            { field: "temp_title",width: "45%"},
                            { field: "temp_detail",width: "45%"}],
                    });
                });
</script>

</body>

