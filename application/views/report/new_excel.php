<?php 

header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="'.$question_subject[0]['qh_title'].'.xls"');#ชื่อไฟล์

?>
<!doctype html>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta charset="utf-8">
<title>Export - Excel </title>
</head>

<body>
<table border="1" style="border:1px; border-spacing:0px;">
<thead>
	<tr>
    	<th colspan="10" align="left">เรื่อง : <?php echo $question_subject[0]['qh_title']?></th>
    </tr>
    <tr>
    	<th colspan="10" align="left">วันที่ปิดสำรวจ : <?php echo $question_subject[0]['qh_enddate']?></th>
    </tr>
</thead>
</table>
<table border="1" style="border:1px; border-spacing:0px;">
	<thead>
    	<tr>
        	<th colspan="11" align="center">ข้อมูลทั่วไป</th>
            <?php for($quesion_num=0;$quesion_num<count($question);$quesion_num++){ ?>
            <?php $colspan=1;  
				if($question[$quesion_num]['q_type']=='mulitiple_multiple'||$question[$quesion_num]['q_type']=='matrix_only'||$question[$quesion_num]['q_type']=='mulitple_textbox'||$question[$quesion_num]['q_type']=='ranking'){ $colspan=$question[$quesion_num]['count_answer']; }
				if(!empty($question[$quesion_num]['q_other'])){ $colspan=$colspan+1; }
				?>
            <th colspan="<?php echo $colspan; ?>" ><?php echo "Question ".($quesion_num+1) ?></th>
            <?php }?>
        </tr>
   		<tr>
        	<th>ชื่อคนเก็บ</th>
            <th>รหัสแบบสำรวจ</th>
            <th>เพศ</th>
            <th>อายุ</th>
            <th>อาชีพ</th>
            <th>รายได้ต่อเดือน</th>
            <th>การศึกษา</th>
            <th>สถานะภาพ</th>
            <th>จังหวัด</th>
            <th>อำเภอ</th>
            <th>เขต</th>
            <?php
			for($q_no=0;$q_no<count($question);$q_no++){ ?>
            <?php 
			if($question[$q_no]['q_type']=='mulitiple_only'||$question[$q_no]['q_type']=='comment'||$question[$q_no]['q_type']=='single_textbox'||$question[$q_no]['q_type']=='date_time'){
            		echo "<th>Value</th>";
			}elseif($question[$q_no]['q_type']=='mulitiple_multiple'||$question[$q_no]['q_type']=='matrix_only'){
				for($j=0;$j<$question[$q_no]['count_answer'];$j++){
					echo "<th>answer ".($j+1)."</th>";
				}
			}?>
                <?php if(!empty($question[$q_no]['q_other'])){?>
                <th><?php echo "คำตอบปลายเปิด"?></th>
                <?php }?>
            <?php }?>

            
        </tr>
    </thead>
    <tbody>
<?php foreach($ans_value as $value){ ?>
	<tr>
    	    <td><?php if($question_subject[0]['qh_type']==1){
					echo 'สำรวจจากอินเตอร์เน็ต';
				}else{
					echo $value[0]['user_name'];
				}
				?></td>
            <td><?php echo '"'.$value[0]['sv_map'].'"';?></td>
            <td align="center"><?php echo $value['general_value'][0]['gv_value'];?></td>
            <td align="center"><?php echo $value['general_value'][1]['gv_value'];?> </td>
            <td align="center"><?php echo $value['general_value'][2]['gv_value'];?></td>
            <td align="center"><?php echo $value['general_value'][3]['gv_value'];?></td>
            <td align="center"><?php echo $value['general_value'][4]['gv_value'];?></td>
            <td align="center"><?php echo $value['general_value'][5]['gv_value'];?></td>
            <td align="center"><?php if(!empty($value['general_value'][6]['gv_value'])){echo $province[($value['general_value'][6]['gv_value'])-1]['PROVINCE_NAME'];}?></td>
            <td align="center"><?php echo $value['general_value'][0]['AMPHUR_NAME'];?></td>
            <td align="center"><?php if($value['general_value'][0]['gv_area']==1){echo "1";}else{ echo "2";}?></td>
		<?php $subject_no=0; for($i=0;$i<(count($value)-1);$i++){?>
            <?php 
			if($value[$i]['type']=='mulitiple_only'||$value[$i]['type']=='comment'||$value[$i]['type']=='single_textbox'||$value[$i]['type']=='date_time'){?>
            <td align="center">
            <?php 
            	if(!empty($value[$i]['value_open'])){ 
					echo $question[$subject_no]['count_answer'];
                }else{
                	echo $value[$i]['value'];
                } 
            ?></td>
            	<?php if(!empty($value[$i]['value_open'])){?>
                <td align="center"><?php echo $value[$i]['value_open'] ?></td>
                <?php }elseif(empty($value[$i]['value_open'])&&!empty($question[$subject_no]['q_other'])){?>
                <td align="center">ไม่มีการตอบ</td>
                <?php } ?>
            <?php 
			}elseif($value[$i]['type']=='mulitiple_multiple'){
				if(empty($value[$i]['value'])){
					echo '<td align="center">0</td>';
				}else{
					echo '<td align="center">1</td>';
				}

				if($value[$i]['v_number']!=@$value[$i+1]['v_number']&&!empty($value[$i]['value_open'])&&!empty($question[$subject_no]['q_other'])){
					echo '<td align="center">1</td>';
					echo '<td align="center">'.$value[$i]['value_open'].'</td>';
				}elseif($value[$i]['v_number']!=@$value[$i+1]['v_number']&&empty($value[$i]['value_open'])&&!empty($question[$subject_no]['q_other'])){
					echo '<td align="center">0</td>';
					echo '<td align="center">ไม่มีการตอบ</td>';
				}
				
			}elseif($value[$i]['type']=='matrix_only'){
				echo '<td align="center">'.$value[$i]['value'].'</td>';

				if(!empty($value[$i]['value_open'])){
                	echo '<td align="center">'.$value[$i]['value_open'].'</td>';
                }elseif(empty($value[$i]['value_open'])&&!empty($question[$subject_no]['q_other'])){
					echo '<td align="center">ไม่มีการตอบ</td>';
                } 
					
			}else{
					
			}
            
			if(isset($value[$i+1]['v_number'])){        
				if($value[$i]['v_number']!=$value[$i+1]['v_number']){
					$subject_no++;
				} 
			}
			
            } ?>

	</tr>
<?php }?>
</tbody>
</table>
</body>
</html>
