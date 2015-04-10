
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<?php //echo "<pre>";print_r($subject_value);?>
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
<div>แบบสำรวจเรื่อง <?php echo $question_subject[0]['qh_title']?></div>
<div>รายละเอียด <?php echo $question_subject[0]['qh_detail']?></div>
<div>แบบสำรวจเรื่อง 
<?php
    	$date = $question_subject[0]['qh_createdate'];
		$date_arr = @split('-',substr($date,0,10));
		echo $date_arr[2].' '.$thai_month[$date_arr[1]].' '.($date_arr[0]+543);
?>
</div>

<table width="300%" border="1" cellpadding="0" cellspacing="0" style="font-size:12px;">
  <tr>
    <td height="25" colspan="11" align="center" bgcolor="#CCCCCC"><strong>ข้อมูลทั่วไป</strong></td>
    <?php 
		for($i=0;$i<count(@$_SESSION['qa_all']);$i++){
		if(@$_SESSION['qa_all'][$i]['type']!="comment"&&@$_SESSION['qa_all'][$i]['type']!="single_textbox"&&@$_SESSION['qa_all'][$i]['type']!="mulitple_textbox"&&@$_SESSION['qa_all'][$i]['type']!="date_time"){
	?>
    <td width="36%" align="center" bgcolor="#CCCCCC">Question <?php echo $i+1?></td>
    <?php }} ?>
  </tr>
  <tr>
    <td align="center" bgcolor="#EFEFEF">ชื่อคนเก็บ</td>
    <td align="center" bgcolor="#EFEFEF">รหัสแบบสำรวจ</td>
    <td height="25" align="center" bgcolor="#EFEFEF">เพศ</td>
    <td height="25" align="center" bgcolor="#EFEFEF">&nbsp;อายุ&nbsp;</td>
    <td height="25" align="center" bgcolor="#EFEFEF">อาชีพ</td>
    <td align="center" bgcolor="#EFEFEF">รายได้ต่อเดือน</td>
    <td height="25" align="center" bgcolor="#EFEFEF">การศึกษา</td>
    <td height="25" align="center" bgcolor="#EFEFEF">สถานะภาพ</td>
    <td height="25" align="center" bgcolor="#EFEFEF">จังหวัด</td>
    <td align="center" bgcolor="#EFEFEF">อำเภอ</td>
    <td height="25" align="center" bgcolor="#EFEFEF">เขต</td>
    <?php
    	for($i=0;$i<count(@$_SESSION['qa_all']);$i++){
		if(@$_SESSION['qa_all'][$i]['type']!="comment"&&@$_SESSION['qa_all'][$i]['type']!="single_textbox"&&@$_SESSION['qa_all'][$i]['type']!="mulitple_textbox"&&@$_SESSION['qa_all'][$i]['type']!="date_time"){	
	?>
    <td bgcolor="#EFEFEF">
    <!-- mulitiple_only -->
    <?php if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<td bgcolor='#F4F4F4' align='center' height="30">Value</td>
      </tr>
    </table>
    <?php } ?>
    <!-- mulitiple_only -->
    <!-- mulitiple_multiple -->
    <?php if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td bgcolor='#F4F4F4' align='center' height="30">answer <?php echo @$m+1;?></td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- mulitiple_multiple -->
    <!-- ranking -->
    <?php if(@$_SESSION['qa_all'][$i]['type']=="ranking"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td bgcolor='#F4F4F4' align='center' height="30">answer <?php echo @$m+1;?></td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- ranking -->
    <!-- ranking_scale -->
    <?php if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td bgcolor='#F4F4F4' align='center' height="30">answer <?php echo @$m+1;?></td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- ranking_scale --> 
    <!-- matrix_only -->
    <?php if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td bgcolor='#F4F4F4' align='center' height="30">answer <?php echo @$m+1;?></td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- matrix_only -->
    <!-- matrix_multiple -->
    <?php if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td bgcolor='#F4F4F4' align='center' height="30">answer <?php echo @$m+1;?></td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- matrix_multiple -->
    </td>
    <?php }} ?>
  </tr>
  <?php for($i=0;$i<count($subject_value);$i++){?>
  <tr>
    <td align="center">
	<?php
		$this->db->where('user_id',@$subject_value[$i]['user_id']);
		$query = $this->db->get('user');
		foreach ($query->result() as $row)
		{
			echo @$row->user_name;
		}
	?>
	</td>
    <td align="center">"<?php echo @$subject_value[$i]['sv_map']?>"</td>
    <td height="25" align="center">
	<?php
    	$this->db->where('gv_map',@$subject_value[$i]['sv_map']);
		$this->db->where('gv_category',1);
		$query = $this->db->get('general_value');
		foreach ($query->result() as $row)
		{
			echo @$row->gv_value;
		}
	?>
	</td>
    <td height="25" align="center">
    <?php
    	$this->db->where('gv_map',@$subject_value[$i]['sv_map']);
		$this->db->where('gv_category',2);
		$query = $this->db->get('general_value');
		foreach ($query->result() as $row)
		{
			echo @$row->gv_value;
		}
	?>
    </td>
    <td height="25" align="center">
	<?php
    	$this->db->where('gv_map',@$subject_value[$i]['sv_map']);
		$this->db->where('gv_category',3);
		$query = $this->db->get('general_value');
		foreach ($query->result() as $row)
		{
			echo @$row->gv_value;
		}
	?>
	</td>
    <td height="25" align="center">
	<?php
    	$this->db->where('gv_map',@$subject_value[$i]['sv_map']);
		$this->db->where('gv_category',4);
		$query = $this->db->get('general_value');
		foreach ($query->result() as $row)
		{
			echo @$row->gv_value;
		}
	?>
	</td>
    <td height="25" align="center">
	<?php
    	$this->db->where('gv_map',@$subject_value[$i]['sv_map']);
		$this->db->where('gv_category',5);
		$query = $this->db->get('general_value');
		foreach ($query->result() as $row)
		{
			echo @$row->gv_value;
		}
	?>
	</td>
    <td height="25" align="center">
	<?php
    	$this->db->where('gv_map',@$subject_value[$i]['sv_map']);
		$this->db->where('gv_category',6);
		$query = $this->db->get('general_value');
		foreach ($query->result() as $row)
		{
			echo @$row->gv_value;
		}
	?>
	</td>
    <td height="25" align="center">
    <?php
    	$this->db->where('gv_map',@$subject_value[$i]['sv_map']);
		$this->db->where('gv_category',7);
		$query = $this->db->get('general_value');
		foreach ($query->result() as $row)
		{
			$this->db->where('GEO_ID',3);
			$this->db->where('PROVINCE_ID',@$row->gv_value);
			$query = $this->db->get('province');
			foreach ($query->result() as $row)
			{
				echo @$row->PROVINCE_NAME;
			}
		}
	?>
	</td>
    <td align="center">
    <?php
    	$this->db->where('gv_map',@$subject_value[$i]['sv_map']);
		$this->db->where('gv_category',7);
		$query = $this->db->get('general_value');
		foreach ($query->result() as $row)
		{
			$this->db->where('GEO_ID',3);
			$this->db->where('AMPHUR_ID',@$row->gv_data);
			$query = $this->db->get('amphur');
			foreach ($query->result() as $row)
			{
				echo @$row->AMPHUR_NAME;
			}
		}
	?>
    <?php
		
	?>
    </td>
    <td height="25" align="center">
	<?php if(@$general_value7[$i]['gv_area']==0){echo "0";}else{echo "1";}?>
    </td>
    <?php
    	for($cel=0;$cel<count(@$_SESSION['qa_all']);$cel++){
		if(@$_SESSION['qa_all'][$cel]['type']!="comment"&&@$_SESSION['qa_all'][$cel]['type']!="single_textbox"&&@$_SESSION['qa_all'][$cel]['type']!="mulitple_textbox"&&@$_SESSION['qa_all'][$cel]['type']!="date_time"){	
	?>
    <td>
    <!-- mulitiple_only -->
    <?php if(@$_SESSION['qa_all'][$cel]['type']=="mulitiple_only"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$cel]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
        <td align='center' height="30">
        <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$cel+1);
				$this->db->where('ans_map',$subject_value[$i]['sv_map']);
				//$this->db->where('value',$m+1);
				$this->db->where('type','mulitiple_only');
				$query = $this->db->get('ans_value');
				$value = $query->result_array();
				if(count($value)!=""){
					if(@$value[0]['value']!=""){
						echo @$value[0]['value'];
					}else{
						echo @$value[0]['value_open'];
					}
				}
		?>
        </td>
      </tr>
    </table>
    <?php } ?>
    <!-- mulitiple_only -->
    <!-- mulitiple_multiple -->
    <?php if(@$_SESSION['qa_all'][$cel]['type']=="mulitiple_multiple"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$cel]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td align='center' height="30">
        <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$cel+1);
				$this->db->where('ans_map',$subject_value[$i]['sv_map']);
				$this->db->where('value',$m+1);
				$this->db->where('type','mulitiple_multiple');
				$query = $this->db->get('ans_value');
				$value = $query->result_array();
				if(count($value)!=""){
					echo "1";
				}else{
					echo "0";
				}
		?>
        </td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- mulitiple_multiple -->
    <!-- ranking -->
    <?php if(@$_SESSION['qa_all'][$cel]['type']=="ranking"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$cel]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td align='center' height="30">
        <?php
				$this->db->order_by('ans_number','asc');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$cel+1);
				$this->db->where('ans_map',$subject_value[$i]['sv_map']);
				$this->db->where('type','ranking');
				$query = $this->db->get('ans_value');
				$value = $query->result_array();
				echo $value[$m]['value'];
		?>
        </td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- ranking -->
    <!-- ranking_scale -->
    <?php if(@$_SESSION['qa_all'][$cel]['type']=="ranking_scale"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$cel]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td align='center' height="30">
        <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$cel+1);
				$this->db->where('ans_map',$subject_value[$i]['sv_map']);
				$this->db->where('ans_number',$m+1);
				$this->db->where('type','ranking_scale');
				$this->db->order_by('ans_number','asc');
				$query = $this->db->get('ans_value');
				$value = $query->result_array();
				echo $value[0]['value'];
		?>
        </td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- ranking_scale --> 
    <!-- matrix_only -->
    <?php if(@$_SESSION['qa_all'][$cel]['type']=="matrix_only"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$cel]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td align='center' height="30"><?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$cel+1);
				$this->db->where('ans_map',$subject_value[$i]['sv_map']);
				$this->db->where('ans_number',$m+1);
				$this->db->where('type','matrix_only');
				$this->db->order_by('ans_number','asc');
				$query = $this->db->get('ans_value');
				$value = $query->result_array();
				echo @$value[0]['value'];
		?></td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- matrix_only -->
    <!-- matrix_multiple -->
    <?php if(@$_SESSION['qa_all'][$cel]['type']=="matrix_multiple"){?>
    <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
      <tr>
        <?php
			$date = str_replace("\n","/",@$_SESSION['qa_all'][$cel]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
			$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
		?>
		<?php for($m=0;$m<count($arr);$m++){?>
		<td align='center' height="30">
		<table width="100%" border="1" cellpadding="0" cellspacing="0">
          <tr>
			<?php			
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$cel+1);
				$this->db->where('ans_map',$subject_value[$i]['sv_map']);
				$this->db->where('ans_number',$m+1);
				$this->db->where('type','matrix_multiple');
				$this->db->order_by('value','asc');
				$query = $this->db->get('ans_value');
				$value = $query->result_array();
				for($num=0;$num<count($value);$num++)
				{
					if(@$value[$num]['value']!=""){
						echo "<td align='center'>".@$value_matrix_multiple = @$value[$num]['value']."</td>";

					}else{
						echo "<td align='center'>".@$value_matrix_multiple = "0"."</td>";
					}
				}
			?>
          </tr>
        </table>
        </td>
        <?php } ?>
      </tr>
    </table>
    <?php } ?>
    <!-- matrix_multiple -->
    </td>
    <?php }} ?>
  </tr>
  <?php } ?>
</table>
<?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
<?php $no = $i+1;?>
<?php if(@$_SESSION['qa_all'][$i]['type']=="comment"){?>
<!------------------- comment ------------------------------> 
<?php echo "Question ".$no?>
<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','comment');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
<table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
  <?php $number=1?>
  <?php foreach($data as $row){?>
  <tr>
    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
  </tr>
  <?php $number++;} ?>
</table>
<?php } else if(@$_SESSION['qa_all'][$i]['type']=="single_textbox"){?>
<!------------------- single_textbox ------------------------------> 
<?php echo "Question ".$no?>
<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','single_textbox');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
<table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
  <?php $number=1?>
  <?php foreach($data as $row){?>
  <tr>
    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
  </tr>
  <?php $number++;} ?>
</table>
<?php } else if(@$_SESSION['qa_all'][$i]['type']=="mulitple_textbox"){?>
<!------------------- mulitple_textbox ------------------------------> 
<?php echo "Question ".$no?>
<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','mulitple_textbox');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
<table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
  <?php $number=1?>
  <?php foreach($data as $row){?>
  <tr>
    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
  </tr>
  <?php $number++;} ?>
</table>
<?php } else if(@$_SESSION['qa_all'][$i]['type']=="date_time"){?>
<!------------------- date_time ------------------------------> 
<?php echo "Question ".$no?>
<?php
               //$this->db->select('value');
				
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','date_time');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
<table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:12px;">
  <?php $number=1?>
  <?php foreach($data as $row){

echo "<pre>";
print_r($data);

  	?>
  <tr>
    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
  </tr>
  <?php $number++;} ?>
</table>
<?php } ?>
<!------------------- date_time ------------------------------>

<?php } ?>
<?php
		@session_start();
		@session_destroy();
		$all_session = $this->session->all_userdata();//strat session
		$this->session->unset_userdata('heading');//ลบ session ของ heading
		$this->session->unset_userdata('question_subject');//ลบ session ของ heading
		$this->session->unset_userdata('user_id');//ลบ session ของ heading
?>