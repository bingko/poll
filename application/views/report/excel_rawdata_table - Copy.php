<?php
$qh_title = @$question_subject[0]['qh_title'];
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="ข้อมูลจริง'.$qh_title.'.xls"');#ชื่อไฟล์
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius" style="font-size:10px;">
      <tr>
        <td valign="top"><table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
          <tr>
            <td>
            <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
            <?php $no = $i+1;?>
            <!------------------- mulitiple_only ----------------------------->
            <?php if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){?> 
			<?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$no);
				$this->db->where('type','mulitiple_only');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $mulitiple_only_row)
				$all_value_mulitiple_only = $mulitiple_only_row->value;	
				echo $no.". ".@$_SESSION['qa_all'][$i]['question_mulitiple_only'];
			?>	
            <table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
            <?php
				$data = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_only_value = @split('/',$data);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($mulitiple_only_value);$a++){
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('value',$a+1);
					$this->db->where('type','mulitiple_only');
					$sum = $this->db->count_all_results('ans_value');
					$sum_value[] = $sum;
			?>
              <tr>
                <td bgcolor="#F5F5F5"><?php echo @$mulitiple_only_value[$a]?></td>
                <td width="8%" align="center" bgcolor="#F5F5F5" style="color:red;">
				<?php echo $sum?> คน
                </td>
                <td width="8%" align="center" bgcolor="#F5F5F5" style="color:red;">
				<?php echo number_format(($sum*100)/$keep_count,2,'.','')?>%
                </td>
              </tr>
            <?php } ?>
            </table>
            <?php } else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){?>
            <!------------------- mulitiple_only ----------------------------->
            <!------------------- mulitiple_multiple ----------------------------->
            <?php 
				echo $no.". ".@$_SESSION['qa_all'][$i]['question_mulitiple_multiple'];
				$data = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_multiple_value = @split('/',$data);//ตัด array โดยหา data จาก สัญญาลักณ์ /
			?>
				<table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
                <?php 
				for($a=0;$a<count($mulitiple_multiple_value);$a++){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$a+1);
				$this->db->where('value',$a+1);
				$this->db->where('type','mulitiple_multiple');
				$sum = $this->db->count_all_results('ans_value');
				$sum_value[] = $sum;
				?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo @$mulitiple_multiple_value[$a]?></td>
                    <td width="8%" align="center" bgcolor="#F5F5F5" style="color:red;">
					<?php echo $sum?> คน
                    </td>
                    <td width="8%" align="center" bgcolor="#F5F5F5" style="color:red;">
					<?php echo number_format(($sum*100)/$keep_count,2,'.','')?>%
                    </td>
                </tr>
                <?php } ?>
				</table>
			<?php } else if(@$_SESSION['qa_all'][$i]['type']=="comment"){?>
            <!------------------- mulitiple_multiple ----------------------------->
            <!------------------- comment ----------------------------->
            <?php echo $no.". ".@$_SESSION['qa_all'][$i]['comment'];?>
				<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','comment');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
                <table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
                <?php $number=1?>
                <?php foreach($data as $row){?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
                </tr>
                <?php $number++;} ?>
				</table>
            <?php } else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){?>
            <!------------------- comment ----------------------------->
            <!------------------- ranking ----------------------------->
            <?php 
				echo $no.". ".@$_SESSION['qa_all'][$i]['question_ranking'];
			?>
				<?php
               	$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$ranking_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				?>
                <table width="100%" border="1" cellpadding="0" cellspacing="0" style="font-size:10px;">
                <tr>
                	<td bgcolor="#F5F5F5" width="70%">&nbsp;</td>
                    <?php for($i=0;$i<count($ranking_value);$i++){?>
                    <td align="center" bgcolor="#F5F5F5">ลำดับ <?php echo $i+1?></td>
                    <?php } ?>
                </tr>
				<?php for($k=0;$k<count($ranking_value);$k++){
				for($l=0;$l<count($ranking_value);$l++){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('value',$l+1);
				$this->db->where('type','ranking');
				$sum_ranking[$k][$l] =  $this->db->count_all_results('ans_value');
				}
				?>
                <tr>
                    <td bgcolor="#F5F5F5" width="70%"><?php echo $ranking_value[$k];?></td>
                    <?php for($i=0;$i<count($ranking_value);$i++){?>
                    <td align="center" bgcolor="#F5F5F5" style="color:red;">
					<?php echo $sum_ranking[$k][$i]?> คน | 
                    <?php echo number_format(($sum_ranking[$k][$i]*100)/count($ranking_value),2,'.','')?>%
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
				</table>
                <?php } else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){?>
            <!------------------- ranking ----------------------------->
            <!------------------- ranking_scale ----------------------------->
            <?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_ranking_scale'];?>
				<table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
                <tr>
                	<td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>
                <?php
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++){?>
                	<td bgcolor='#F4F4F4' align='center'><?php echo $arr[$a]?></td>
                    <?php } ?>
				</tr>
                <?php 
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($answer_ranking_scale);$m++){?>
				<tr>
                	<td bgcolor='#F4F4F4'><?php echo $answer_ranking_scale[$m]?></td>
				<?php
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				
				for($b=0;$b<count($arr);$b++)
				{
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$m+1);
				$this->db->where('value',$b+1);
				$this->db->where('type','ranking_scale');
				$sum = $this->db->count_all_results('ans_value');?>
				
					<td bgcolor='#F4F4F4' align='center'>
                	<span style='color:red;'><?php echo number_format(($sum*100)/$keep_count,2,'.','')?>%</span>
                	</td>
				<?php } ?>
				</tr>
                <?php } ?>
				</table>		
			<?php } else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){?>
            <!------------------- ranking_scale ----------------------------->
            <!------------------- matrix_only ----------------------------->
			<?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_matrix_only'];?>
            <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
            	<tr>
                	<td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>
			<?php
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++){?>
                	<td bgcolor='#F4F4F4' align='center'><?php echo $arr[$m]?></td>
                <?php } ?>
                </tr>
				<?php
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_only);$k++){?>
                <tr>
                	<td bgcolor='#F4F4F4'><?php echo $answer_matrix_only[$k]?></td>
				<?php
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++)
				{
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('ans_number',$k+1);
					$this->db->where('value',$n+1);
					$this->db->where('type','matrix_only');
					$sum = $this->db->count_all_results('ans_value');
				?>
                	<td bgcolor='#F4F4F4' align='center'>
					<span style='color:red;'><?php echo @number_format(($sum*100)/$keep_count,2,'.','')?>%</span>
					</td>
				<?php } ?>
				</tr>
                <?php } ?>
				</table>
			<?php } else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){?>
            <!------------------- matrix_only ----------------------------->
            <!------------------- matrix_multiple ----------------------------->
            <?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_matrix_multiple'];?>
            <table width='100%' border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
            <tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>
            <?php
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$ranking_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($ranking_matrix_multiple);$m++){?>
              		<td bgcolor='#F4F4F4' align='center'><?php echo $ranking_matrix_multiple[$m]?></td>
                    <?php } ?>
                </tr>
				<?php
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_multiple);$k++){?>
                <tr><td bgcolor='#F4F4F4'><?php echo $answer_matrix_multiple[$k]?></td>
                <?php
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++)
				{
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('ans_number',$k+1);
					$this->db->where('value',$n+1);
					$this->db->where('type','matrix_multiple');
					$sum = $this->db->count_all_results('ans_value');?>
                    <td bgcolor='#F4F4F4' align='center'>
                    <span style='color:red;'><?php echo number_format(($sum*100)/$keep_count,2,'.','')?>%</span>
                    </td>
                    <?php } ?>
				</tr>
                <?php } ?>
				</table>
			<?php } else if(@$_SESSION['qa_all'][$i]['type']=="single_textbox"){?>
            <!------------------- matrix_multiple ----------------------------->
            <!------------------- single_textbox ----------------------------->   
            <?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_single_textbox'];?>       
          	<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','single_textbox');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
                <table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
                <?php $number=1?>
                <?php foreach($data as $row){?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
                </tr>
                <?php $number++;} ?>
				</table>
            <?php } else if(@$_SESSION['qa_all'][$i]['type']=="mulitple_textbox"){?>
            <!------------------- single_textbox ----------------------------->
            <!------------------- mulitple_textbox ----------------------------->
            <?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_mulitple_textbox'];?>       
          	<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','mulitple_textbox');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
                <table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
                <?php $number=1?>
                <?php foreach($data as $row){?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
                </tr>
                <?php $number++;} ?>
				</table>
            <?php } else if(@$_SESSION['qa_all'][$i]['type']=="date_time"){?>
            <!------------------- mulitple_textbox ----------------------------->
            <!------------------- date_time ----------------------------->
            <?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_date_time'];?>       
          	<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','date_time');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
                <table width="100%" border="1" cellpadding='0' cellspacing='0' style="font-size:10px;">
                <?php $number=1?>
                <?php foreach($data as $row){?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
                </tr>
                <?php $number++;} ?>
				</table>
            <?php } ?>
            <!------------------- date_time ----------------------------->
            <?php } ?>
            </td>
          </tr>
        </table>
        </td>
      </tr>
</table>
			<?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>        
			<?php 
			$no = $i+1;
			if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$no);
				$this->db->where('type','mulitiple_only');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $mulitiple_only_row)
				$all_value_mulitiple_only = $mulitiple_only_row->value;				
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_only_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				
				for($a=0;$a<count($mulitiple_only_value);$a++)
				{
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('value',$a+1);
					$this->db->where('type','mulitiple_only');
					$sum = $this->db->count_all_results('ans_value');
					$series_mulitiple_only[] = $mulitiple_only_value[$a];
                    $value_mulitiple_only[] = number_format(($sum*100)/$keep_count,2,'.','');
				}
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_multiple_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($mulitiple_multiple_value);$a++)
				{
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('ans_number',$a+1);
					$this->db->where('value',$a+1);
					$this->db->where('type','mulitiple_multiple');
					$sum = $this->db->count_all_results('ans_value');
					$series_mulitiple_multiple[] = $mulitiple_multiple_value[$a];
					$value_mulitiple_multiple[] = number_format(($sum*100)/$keep_count,2,'.','');
				}
			}
			else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){
               	$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$ranking_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($ranking_value);$k++)
				{
					for($l=0;$l<count($ranking_value);$l++)
					{
						$this->db->where('qh_id',$this->uri->segment(3));
						$this->db->where('v_number',$no);
						$this->db->where('ans_number',$k+1);
						$this->db->where('value',$l+1);
						$this->db->where('type','ranking');
						$sum_ranking[$k][$l] =  $this->db->count_all_results('ans_value');
					}
						$ranking_value[$k];
						for($i=0;$i<count($ranking_value);$i++)
						{
							$sum_ranking_value[$k][$i] = number_format(($sum_ranking[$k][$i]*100)/count($ranking_value),2,'.','').",";
						} 
                 }
			}
			else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++)
				{
					$series_ranking_scale[] = $arr[$a];
				}
  				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($answer_ranking_scale);$m++)
				{
					$answer_ranking_scale[$m];
					$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
					$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
					
					for($b=0;$b<count($arr);$b++)
					{
						$this->db->where('qh_id',$this->uri->segment(3));
						$this->db->where('v_number',$no);
						$this->db->where('ans_number',$m+1);
						$this->db->where('value',$b+1);
						$this->db->where('type','ranking_scale');
						$sum = $this->db->count_all_results('ans_value');
						$value_ranking_scale[$m][$b] = number_format(($sum*100)/$keep_count,2,'.','').",";
					}
				}
			}else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++)
				{
					$type_series[] = $arr[$m];
					$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
					$answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
					for($k=0;$k<count($answer_matrix_only);$k++)
					{
						$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
						$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
						for($n=0;$n<count($arr);$n++)
						{
							$this->db->where('qh_id',$this->uri->segment(3));
							$this->db->where('v_number',$no);
							$this->db->where('ans_number',$k+1);
							$this->db->where('value',$n+1);
							$this->db->where('type','matrix_only');
							$sum = $this->db->count_all_results('ans_value');
							@$type_value[$k][$n] = number_format(($sum*100)/$keep_count,2,'.','').",";
						}
					}
				}
            }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$ranking_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /

				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_multiple);$k++)
				{
					$answer_matrix_multiple[$k];
					$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
					$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
					for($n=0;$n<count($arr);$n++)
					{
						$this->db->where('qh_id',$this->uri->segment(3));
						$this->db->where('v_number',$no);
						$this->db->where('ans_number',$k+1);
						$this->db->where('value',$n+1);
						$this->db->where('type','matrix_multiple');
						$sum = $this->db->count_all_results('ans_value');
						$value_matrix_multiple[$k][$n] = number_format(($sum*100)/$keep_count,2,'.','').",";
					}
				}
			}
			?>
            <?php } ?>
            <script>
                    function createChart() {
                        $("#mulitiple_only").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?><?php echo @$_SESSION['qa_all'][$i]['question_mulitiple_only']?><?php  } ?>"
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
								{
									data: [
									<?php for($m=0;$m<count($value_mulitiple_only);$m++){?>
                                    <?php echo @$value_mulitiple_only[$m]?>,
                                    <?php  } ?>
									],
									color: "#176ced"
                            	}
							],
                            valueAxis: {
                                labels: {
                                    format: "{0}%"
                                },
                                line: {
                                    visible: false
                                },
                                axisCrossingValue: 0
                            },
                            categoryAxis: {
                                categories: [<?php for($i=0;$i<count($series_mulitiple_only);$i++){?>
								"<?php echo $series_mulitiple_only[$i]?>",
								<?php  } ?>],
                                line: {
                                    visible: false
                                },
                                labels: {
                                    //padding: {top: 100}
                                }
                            },
                            tooltip: {
                                visible: true,
                                format: "{0}%",
                                //template: "#= series.name #: #= value #%"
                            }
                        });
                    }
            
                    $(document).ready(createChart);
                    $(document).bind("kendo:skinChange", createChart);
			</script>
            <script>
                    function createChart() {
                        $("#mulitiple_multiple").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?><?php echo @$_SESSION['qa_all'][$i]['question_mulitiple_multiple']?><?php  } ?>"
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
								{
									data: [
									<?php for($m=0;$m<count($value_mulitiple_multiple);$m++){?>
                                    <?php echo @$value_mulitiple_multiple[$m]?>,
                                    <?php  } ?>
									],
									color: "#176ced"
                            	}
							],
                            valueAxis: {
                                labels: {
                                    format: "{0}%"
                                },
                                line: {
                                    visible: false
                                },
                                axisCrossingValue: 0
                            },
                            categoryAxis: {
                                categories: [<?php for($i=0;$i<count($series_mulitiple_multiple);$i++){?>
								"<?php echo $series_mulitiple_multiple[$i]?>",
								<?php  } ?>],
                                line: {
                                    visible: false
                                },
                                labels: {
                                    //padding: {top: 100}
                                }
                            },
                            tooltip: {
                                visible: true,
                                format: "{0}%",
                                //template: "#= series.name #: #= value #%"
                            }
                        });
                    }
            
                    $(document).ready(createChart);
                    $(document).bind("kendo:skinChange", createChart);
			</script>
            <script>
                    function createChart() {
                        $("#ranking").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?><?php echo @$_SESSION['qa_all'][$i]['question_ranking']?><?php  } ?>"
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
                                <?php $color = array(("#176ced"),("#d94531"),("#ffb502"),("#06a35e"));?>
								<?php for($i=0;$i<count($ranking_value);$i++){?>
								{
									name: "ลำดับ <?php echo $i+1?>",
									data:
									[
										<?php for($m=0;$m<count($ranking_value);$m++){?>
                                        <?php echo @$sum_ranking_value[$m][$i]?>
                                        <?php  } ?>
									],
									color: "<?php echo $color[$i]?>"
                            	},
								<?php  } ?>
							],
                            valueAxis: {
                                labels: {
                                    format: "{0}%"
                                },
                                line: {
                                    visible: false
                                },
                                axisCrossingValue: 0
                            },
                            categoryAxis: {
                                categories: [
								<?php for($i=0;$i<count($ranking_value);$i++){?>
								"<?php echo $ranking_value[$i]?>",
								<?php  } ?>],
                                line: {
                                    visible: false
                                },
                                labels: {
                                    //padding: {top: 100}
                                }
                            },
                            tooltip: {
                                visible: true,
                                format: "{0}%",
                                template: "#= series.name # : #= value #%"
                            }
                        });
                    }
            
                    $(document).ready(createChart);
                    $(document).bind("kendo:skinChange", createChart);
			</script>
			<script>
                    function createChart() {
                        $("#ranking_scale").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?><?php echo @$_SESSION['qa_all'][$i]['question_ranking_scale']?><?php  } ?>"
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
                                <?php $color = array(("#176ced"),("#d94531"),("#ffb502"),("#06a35e"));?>
								<?php for($i=0;$i<count($series_ranking_scale);$i++){?>
								{
									name: "<?php echo $series_ranking_scale[$i]?>",
									data:
									[
										<?php for($m=0;$m<count($value_ranking_scale);$m++){?>
                                        <?php echo @$value_ranking_scale[$m][$i]?>
                                        <?php  } ?>
									],
									color: "<?php echo $color[$i]?>"
                            	},
								<?php  } ?>
							],
                            valueAxis: {
                                labels: {
                                    format: "{0}%"
                                },
                                line: {
                                    visible: false
                                },
                                axisCrossingValue: 0
                            },
                            categoryAxis: {
                                categories: [
								<?php for($i=0;$i<count($answer_ranking_scale);$i++){?>
								"<?php echo $answer_ranking_scale[$i]?>",
								<?php  } ?>],
                                line: {
                                    visible: false
                                },
                                labels: {
                                    //padding: {top: 100}
                                }
                            },
                            tooltip: {
                                visible: true,
                                format: "{0}%",
                                template: "#= series.name # : #= value #%"
                            }
                        });
                    }
            
                    $(document).ready(createChart);
                    $(document).bind("kendo:skinChange", createChart);
			</script>
			<script>
                    function createChart() {
                        $("#matrix_only").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?><?php echo @$_SESSION['qa_all'][$i]['question_matrix_only']?><?php  } ?>"
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
                                <?php $color = array(("#176ced"),("#d94531"),("#ffb502"),("#06a35e"));?>
								<?php for($i=0;$i<count($type_series);$i++){?>
								{
									name: "<?php echo $type_series[$i]?>",
									data:
									[
										<?php for($m=0;$m<count($type_value);$m++){?>
                                        <?php echo @$type_value[$m][$i]?>
                                        <?php  } ?>
									],
									color: "<?php echo $color[$i]?>"
                            	},
								<?php  } ?>
							],
                            valueAxis: {
                                labels: {
                                    format: "{0}%"
                                },
                                line: {
                                    visible: false
                                },
                                axisCrossingValue: 0
                            },
                            categoryAxis: {
                                categories: [
								<?php for($i=0;$i<count($answer_matrix_only);$i++){?>
								"<?php echo $answer_matrix_only[$i]?>",
								<?php  } ?>],
                                line: {
                                    visible: false
                                },
                                labels: {
                                    //padding: {top: 100}
                                }
                            },
                            tooltip: {
                                visible: true,
                                format: "{0}%",
                                template: "#= series.name # : #= value #%"
                            }
                        });
                    }
            
                    $(document).ready(createChart);
                    $(document).bind("kendo:skinChange", createChart);
			</script>
            <script>
                    function createChart() {
                        $("#matrix_multiple").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?><?php echo @$_SESSION['qa_all'][$i]['question_matrix_multiple']?><?php  } ?>"
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
                                <?php $color = array(("#176ced"),("#d94531"),("#ffb502"),("#06a35e"));?>
								<?php for($i=0;$i<count($ranking_matrix_multiple);$i++){?>
								{
									name: "<?php echo $ranking_matrix_multiple[$i]?>",
									data:
									[
										<?php for($m=0;$m<count($value_matrix_multiple);$m++){?>
                                        <?php echo @$value_matrix_multiple[$m][$i]?>
                                        <?php  } ?>
									],
									color: "<?php echo $color[$i]?>"
                            	},
								<?php  } ?>
							],
                            valueAxis: {
                                labels: {
                                    format: "{0}%"
                                },
                                line: {
                                    visible: false
                                },
                                axisCrossingValue: 0
                            },
                            categoryAxis: {
                                categories: [
								<?php for($i=0;$i<count($answer_matrix_multiple);$i++){?>
								"<?php echo $answer_matrix_multiple[$i]?>",
								<?php  } ?>],
                                line: {
                                    visible: false
                                },
                                labels: {
                                    //padding: {top: 100}
                                }
                            },
                            tooltip: {
                                visible: true,
                                format: "{0}%",
                                template: "#= series.name # : #= value #%"
                            }
                        });
                    }
            
                    $(document).ready(createChart);
                    $(document).bind("kendo:skinChange", createChart);
			</script>