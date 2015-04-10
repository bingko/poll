<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/all.min.js"></script>
<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/animetextstyle.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $all_session = $this->session->all_userdata();//ตัวแปร รับค่า session ทั้งหมด?>
<?php if($this->uri->segment(3)=="close"){$pop_close = 'onload="window.close();"';}?>
<body style="font-family:thaisanslite; font-size:20px;" <?php echo @$pop_close?> >
<?php echo form_open('ci_manage_survey/select_keep')?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <table id="grid">
                <thead>
                    <tr>
                      <th data-field="select">#</th>
                      <th data-field="user_title">คำนำหน้าชื่อ</th>
                      <th data-field="user_name">ชื่อ-นามสกุล</th>
                        <th data-field="user_tel">เบอร์ติดต่อ</th>
                        <th data-field="user_mail">อีเมล์</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $i=0;?>
                    <?php foreach($keep as $keep){?>
                    <?php if($keep['user_type']==3){?>
               	  <tr>
                 	  <td>
                      <input <?php if (!(strcmp(@$keep_value[$i]['user_id'],$keep['user_id']))) {echo "checked=\"checked\"";} ?> name="user_id[<?php echo $i ?>]" type="checkbox" value="<?php echo $keep['user_id']?>" id="user_id[<?php echo $i ?>]">
               	    </td>
                      <td><?php echo $keep['user_title']?></td>
                      <td><?php echo $keep['user_name']?></td>
                      <td><?php echo $keep['user_tel']?></td>
                      <td><?php echo $keep['user_mail']?></td>
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
                    $("#grid").kendoGrid({
                        sortable: true,
						dataSource: {pageSize: 150},
                        pageable: {
                            refresh: true,
                        },
						columns: [
                            { field: "select",width: "5%"},
                            { field: "user_title",width: "10%"},
                            { field: "user_name",width: "45%"},
                            { field: "user_tel",width: "20%"},
                            { field: "user_mail",width: "20%"}],
                    });
                });
</script>
</body>