<table width="100%" height="50px" border="0" align="center" cellpadding="2" cellspacing="2" class="" bgcolor="cccccc" >
  <tr>
    <td><div align="center"><?php echo anchor('home/list_survey','<input name="submit" type="submit" class="k-button" style="width:200px ; height:40px;" value="กลับหน้ารายการแบบสำรวจ"/>')?> </div></td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius" >
      <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;ข้อมูลรายการแบบสอบถาม</strong></div>
    </td>
  </tr>
      <tr>
        <td valign="top">
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
          <tr>
            <td bgcolor="#CCCCCC">ข้อมูลแบบสำรวจ</td>
          </tr>
          <tr>
            <td>
            <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
            <?php $no = $i+1;?>
            <!------------------- mulitiple_only ------------------------------>
            <?php if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_mulitiple_only'];?></strong>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
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
				<?php echo @number_format(($sum*100)/$keep_count,2,'.','')?>%
                </td>
              </tr>
            <?php } ?>
            </table>
            <?php
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
						$series_mulitiple_only[$i][] = $mulitiple_only_value[$a];
						$value_mulitiple_only[$i][] = @number_format(($sum*100)/$keep_count,2,'.','');
					}					
				}
			?>
                 <div id="tabstrip_mulitiple_only<?php echo $i?>">
                    <ul>
                        <li class="k-state-active">
                            กราฟแท่ง
                        </li>
                        <li>
                            กราฟวงกลม
                        </li>

                    </ul>
                    <div>
            <div id="mulitiple_only<?php echo $i?>"></div>
            </div>
            <div>
            <div id="mulitiple_only<?php echo $i?>_pie" align="center"></div>
            </div>
            </div>
             <script>
                $(document).ready(function() {
                    $("#tabstrip_mulitiple_only<?php echo $i?>").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
			<?php }else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_mulitiple_multiple'];?></strong>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
			<?php 
				$data = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_multiple_value = @split('/',$data);//ตัด array โดยหา data จาก สัญญาลักณ์ /
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
					<?php echo @number_format(($sum*100)/$keep_count,2,'.','')?>%
                    </td>
                </tr>
			<?php } ?>
			</table>
            <?php
				if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){
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
					$series_mulitiple_multiple[$i][] = $mulitiple_multiple_value[$a];
					$value_mulitiple_multiple[$i][] = @number_format(($sum*100)/$keep_count,2,'.','');
				}
			}
			?>
                <div id="tabstrip_mulitiple_multiple<?php echo $i?>">
                    <ul>
                        <li class="k-state-active">
                            กราฟแท่ง
                        </li>
                        <li>
                            กราฟวงกลม
                        </li>

                    </ul>
                    <div>
            <div id="mulitiple_multiple<?php echo $i?>"></div>
            </div>
            <div>
            <div id="mulitiple_multiple<?php echo $i?>_pie"></div>
            </div>
            </div>
           <script>
                $(document).ready(function() {
                    $("#tabstrip_mulitiple_multiple<?php echo $i?>").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
            
			<?php }else if(@$_SESSION['qa_all'][$i]['type']=="comment"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['comment'];?></strong>
			<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','comment');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
			?>
			<table width="100%" border="0" cellpadding="4" cellspacing="4">
			<?php $number=1?>
				<?php foreach($data as $row){?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
                </tr>
                <?php $number++;} ?>
			</table>
			<?php }else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_ranking'];?></strong><br>
            <?php
               	$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$ranking_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
			?>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
                <tr>
                	<td bgcolor="#F5F5F5" width="70%">&nbsp;</td>
                    <?php for($b=0;$b<count($ranking_value[$i]);$b++){?>
                    <td align="center" bgcolor="#F5F5F5">ลำดับ <?php echo $b+1?></td>
                    <?php } ?>
                </tr>
				<?php for($k=0;$k<count($ranking_value[$i]);$k++){
				for($l=0;$l<count($ranking_value[$i]);$l++){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('value',$l+1);
				$this->db->where('type','ranking');
				$sum_ranking[$k][$l] =  $this->db->count_all_results('ans_value');
				}
				?>
                <tr>
                    <td bgcolor="#F5F5F5" width="70%"><?php echo $ranking_value[$i][$k];?></td>
                    <?php for($d=0;$d<count($ranking_value[$i]);$d++){?>
                    <td align="center" bgcolor="#F5F5F5" style="color:red;">
					<?php echo $sum_ranking[$k][$d]?> คน | 
                    <?php echo number_format(($sum_ranking[$k][$d]*100)/count($ranking_value[$i]),2,'.','')?>%
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
			</table>
            <?php
				if(@$_SESSION['qa_all'][$i]['type']=="ranking"){
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$ranking_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($ranking_value[$i]);$k++)
				{
					for($l=0;$l<count($ranking_value[$i]);$l++)
					{
						$this->db->where('qh_id',$this->uri->segment(3));
						$this->db->where('v_number',$no);
						$this->db->where('ans_number',$k+1);
						$this->db->where('value',$l+1);
						$this->db->where('type','ranking');
						$sum =  $this->db->count_all_results('ans_value');
						$sum_ranking_value[$i][$k][$l] =  number_format(($sum*100)/count($ranking_value[$i]),2,'.','').",";
					}
                 }		 
			}
			?>
            <div id="ranking<?php echo $i?>"></div>
			<?php }else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_ranking_scale'];?></strong>
            <table width='100%' cellpadding='2' cellspacing='2'>
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
            <?php
				if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++)
				{
					$series_ranking_scale[$i][] = $arr[$a];
				}
  				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$answer_ranking_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
					for($m=0;$m<count($answer_ranking_scale);$m++)
					{
						//$answer_ranking_scale[$m];
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
							$value_ranking_scale[$i][$m][$b] = number_format(($sum*100)/$keep_count,2,'.','').",";
						}
					}				
				}
			?>
            <div id="ranking_scale<?php echo $i?>"></div>
			<?php }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_matrix_only'];?></strong>
            <table width='100%' cellpadding='2' cellspacing='2'>
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
            <?php
				if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
					for($m=0;$m<count($arr);$m++)
					{
						$type_series[$i][] = $arr[$m];
						$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
						$answer_matrix_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
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
								@$type_value[$i][$k][$n] = number_format(($sum*100)/$keep_count,2,'.','').",";
							}
						}
					}				
				}
			?>
            <div id="matrix_only<?php echo $i?>"></div>
			<?php }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_matrix_multiple'];?></strong>
            <table width='100%' cellpadding='2' cellspacing='2'>
            <tr>
            	<td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>
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
                    <span style='color:red;'><?php echo @number_format(($sum*100)/$keep_count,2,'.','')?>%</span>
                    </td>
                    <?php } ?>
				</tr>
                <?php } ?>
			</table>
            <?php
				if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$ranking_multiple_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /

				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$answer_multiple_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
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
							$value_matrix_multiple[$i][$k][$n] = @number_format(($sum*100)/$keep_count,2,'.','').",";
						}
					}				
				}
			?>
            <div id="matrix_multiple<?php echo $i?>"></div>
			<?php }else if(@$_SESSION['qa_all'][$i]['type']=="single_textbox"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_single_textbox'];?></strong>
			<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$i+1);
				$this->db->where('type','single_textbox');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
                <table width="100%" border="0" cellpadding="4" cellspacing="4">
                <?php $number=1?>
                <?php foreach($data as $row){?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
                </tr>
                <?php $number++;} ?>
				</table>
			<?php }else if(@$_SESSION['qa_all'][$i]['type']=="mulitple_textbox"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_mulitple_textbox'];?></strong>
			<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','mulitple_textbox');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
                <table width="100%" border="0" cellpadding="4" cellspacing="4">
                <?php $number=1?>
                <?php foreach($data as $row){?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
                </tr>
                <?php $number++;} ?>
				</table>
			<?php }else if(@$_SESSION['qa_all'][$i]['type']=="date_time"){?>
            <strong><?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_date_time'];?></strong>
            <?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','date_time');
				$query = $this->db->get('ans_value');
				$data = $query->result_array();
				?>
                <table width="100%" border="0" cellpadding="4" cellspacing="4">
                <?php $number=1?>
                <?php foreach($data as $row){?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo $number.". ".$row['value']?></td>
                </tr>
                <?php $number++;} ?>
				</table>
			<?php } ?>
            <!------------------- date_time ------------------------------>
            <?php } ?>
            <?php 
				//echo '<pre>';
				//echo $value_mulitiple_only[0][0];
				//print_r($sum_ranking_allnum);
				//print_r($ranking_value);
				//print_r($sum_ranking_value);
								
			?>
            <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
            <?php if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){?>
			<script>
                    function createChart() {
                        $("#mulitiple_only<?php echo $i?>").kendoChart({
                            title: {
                                //text: "ข้อมูลแบบสำรวจ : "
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
									<?php for($m=0;$m<count($value_mulitiple_only[$i]);$m++){?>
                                    <?php echo @$value_mulitiple_only[$i][$m]?>,
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
                                categories: [<?php for($n=0;$n<count($series_mulitiple_only[$i]);$n++){?>
								"<?php echo $series_mulitiple_only[$i][$n]?>",
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
                        $("#mulitiple_only<?php echo $i?>_pie").kendoChart({
                            title: {
                                //text: "ข้อมูลแบบสำรวจ : "
                            },
                            legend: {
                                position: "top"
                            },
                seriesDefaults: {
                    labels: {
                        visible: true,
                        background: "transparent",
                        template: "#= category #: #= value#%"
                    }
                },
                            series: [
								{
									type : "pie",
									data: [
									<?php for($n=0;$n<count($series_mulitiple_only[$i]);$n++){?>
									{ category :
									"<?php echo @$series_mulitiple_only[$i][$n]?>",
									value:
									<?php echo @$value_mulitiple_only[$i][$n]?>
									},
                                    <?php  } ?>
									]
                            	}],
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
                                categories: [<?php for($n=0;$n<count($series_mulitiple_only[$i]);$n++){?>
								"<?php echo $series_mulitiple_only[$i][$n]?>",
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
            <?php }else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){?>
            <script>
                    function createChart() {
                        $("#mulitiple_multiple<?php echo $i?>").kendoChart({
                            title: {
                                //text: "ข้อมูลแบบสำรวจ : "
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
									<?php for($m=0;$m<count($value_mulitiple_multiple[$i]);$m++){?>
                                    <?php echo @$value_mulitiple_multiple[$i][$m]?>,
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
                                categories: [<?php for($n=0;$n<count($series_mulitiple_multiple[$i]);$n++){?>
								"<?php echo $series_mulitiple_multiple[$i][$n]?>",
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
                        $("#mulitiple_multiple<?php echo $i?>_pie").kendoChart({
                            title: {
                                //text: "ข้อมูลแบบสำรวจ : "
                            },
                            legend: {
                                position: "top"
                            },
                seriesDefaults: {
                    labels: {
                        visible: true,
                        background: "transparent",
                        template: "#= category #: #= value#%"
                    }
                },
                            series: [
								{
									type : "pie",
									data: [
									<?php for($n=0;$n<count($series_mulitiple_multiple[$i]);$n++){?>
									{ category :
									"<?php echo @$series_mulitiple_multiple[$i][$n]?>",
									value:
									<?php echo @$value_mulitiple_multiple[$i][$n]?>
									},
                                    <?php  } ?>
									]
                            	}],
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
                                categories: [<?php for($n=0;$n<count($series_mulitiple_multiple[$i]);$n++){?>
								"<?php echo $series_mulitiple_multiple[$i][$n]?>",
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
            <?php }else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){?>
			<script>
                    function createChart() {
                        $("#ranking<?php echo $i?>").kendoChart({
                            title: {
                                //text: "ข้อมูลแบบสำรวจ : "
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
                                <?php $color = array(("#176ced"),("#d94531"),("#ffb502"),("#06a35e"));?>
								<?php for($h=0;$h<count($ranking_value[$i]);$h++){?>
								{
									name: "ลำดับ <?php echo $h+1?>",
									data:
									[
										<?php for($m=0;$m<count($ranking_value[$i]);$m++){?>
                                        <?php echo @$sum_ranking_value[$i][$m][$h]?>
                                        <?php  } ?>
									],
									color: "<?php echo $color[$h]?>"
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
								<?php for($e=0;$e<count($ranking_value[$i]);$e++){?>
								"<?php echo $ranking_value[$i][$e]?>",
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
            <?php }else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){?>
            <script>
                    function createChart() {
                        $("#ranking_scale<?php echo $i?>").kendoChart({
                            title: {
                                //text: "ข้อมูลแบบสำรวจ : "
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
                                <?php $color = array(("#176ced"),("#d94531"),("#ffb502"),("#06a35e"));?>
								<?php for($m=0;$m<count($series_ranking_scale[$i]);$m++){?>
								{
									name: "<?php echo $series_ranking_scale[$i][$m]?>",
									data:
									[
										<?php for($n=0;$n<count($value_ranking_scale[$i]);$n++){?>
                                        <?php echo @$value_ranking_scale[$i][$n][$m]?>
                                        <?php  } ?>
									],
									//color: "#176ced"
									color: "<?php echo $color[$m]?>"
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
								<?php for($p=0;$p<count($answer_ranking_value[$i]);$p++){?>
								"<?php echo $answer_ranking_value[$i][$p]?>",
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
            <?php }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){?>
			<script>
                    function createChart() {
                        $("#matrix_only<?php echo $i?>").kendoChart({
                            title: {
                                //text: "ข้อมูลแบบสำรวจ : "
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
                                <?php $color = array(("#176ced"),("#d94531"),("#ffb502"),("#06a35e"));?>
								<?php for($m=0;$m<count($type_series[$i]);$m++){?>
								{
									name: "<?php echo $type_series[$i][$m]?>",
									data:
									[
										<?php for($n=0;$n<count($type_value[$i]);$n++){?>
                                        <?php echo @$type_value[$i][$n][$m]?>
                                        <?php  } ?>
									],
									color: "<?php echo $color[$m]?>"
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
								<?php for($p=0;$p<count($answer_matrix_value[$i]);$p++){?>
								"<?php echo $answer_matrix_value[$i][$p]?>",
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
            <?php }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){?>
			<script>
                    function createChart() {
                        $("#matrix_multiple<?php echo $i?>").kendoChart({
                            title: {
                                //text: "ข้อมูลแบบสำรวจ : "
                            },
                            legend: {
                                position: "top"
                            },
                            seriesDefaults: {
                                type: "bar"
                            },
                            series: [
                                <?php $color = array(("#176ced"),("#d94531"),("#ffb502"),("#06a35e"));?>
								<?php for($m=0;$m<count($ranking_multiple_value[$i]);$m++){?>
								{
									name: "<?php echo $ranking_multiple_value[$i][$m]?>",
									data:
									[
										<?php for($n=0;$n<count($value_matrix_multiple[$i]);$n++){?>
                                        <?php echo @$value_matrix_multiple[$i][$n][$m]?>
                                        <?php  } ?>
									],
									color: "<?php echo $color[$m]?>"
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
								<?php for($p=0;$p<count($answer_multiple_value[$i]);$p++){?>
								"<?php echo $answer_multiple_value[$i][$p]?>",
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
			<?php } ?>
            <?php } ?>
            </td>
          </tr>
        </table>
        </td>
      </tr>
</table>