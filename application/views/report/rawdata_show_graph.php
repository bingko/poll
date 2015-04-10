<table width="98%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
    <td height="50" bgcolor="#CCCCCC">
    <div class="alert"><strong>&nbsp;ข้อมูลรายการแบบสอบถาม</strong></div>
    </td>
  </tr>
      <tr>
        <td valign="top">
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
          <tr>
            <td colspan="4" bgcolor="#CCCCCC">ข้อมูลทั่วไป</td>
          </tr>
          <tr>
            <td width="33%" bgcolor="#F5F5F5">
			<div id="chart1"></div>
			<script>
                function createChart() {
                    $("#chart1").kendoChart({
                        title: {
                            position: "bottom",
                            text: "ข้อมูลทั่วไป : เพศ"
                        },
                        legend: {
                            visible: false
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
						<?php
							for($i=0;$i<count($general_value1);$i++)
							{
								if($general_value1[$i]['gv_value']==1)
								{
									$man[] = $general_value1[$i]['gv_value'];
								}
								if($general_value1[$i]['gv_value']==2)
								{
									$woman[] = $general_value1[$i]['gv_value'];
								}
							}
						?>
						<?php
							if(@count($man)!=0){
								$man_vale = (@count($man)*100)/count($general_value1);
							}else{
								$man_vale = 0;
							}
							if(@count($woman)!=0){
								$woman_value = (@count($woman)*100)/count($general_value1);
							}else{
								$woman_value = 0;
							}
						?>
                        series: [{
                            type: "pie",
                            startAngle: 150,
                            data: [{
                                category: "ชาย",
                                value: <?php echo number_format(@$man_vale,2,'.','')?>,
                                color: "#176ced"
                            },{
                                category: "หญิง",
                                value: <?php echo number_format(@$woman_value,2,'.','')?>,
                                color: "#d94531"
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%",
							template: "#= category #: #= value#%"
                        }
                    });
                }
        
                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
            <td width="33%" bgcolor="#F5F5F5">
            <div id="chart2"></div>
			<script>
                function createChart() {
                    $("#chart2").kendoChart({
                        title: {
                            position: "bottom",
                            text: "ข้อมูลทั่วไป : อายุ"
                        },
                        legend: {
                            visible: false
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
                        series: [{
                            type: "pie",
                            startAngle: 150,
                            data: [{
                                category: "23 ปี",
                                value: 53.8,
                                color: "#176ced"
                            },{
                                category: "43 ปี",
                                value: 16.1,
                                color: "#d94531"
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%",
							template: "#= category #: #= value#%"
                        }
                    });
                }
        
                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
            <td width="33%" bgcolor="#F5F5F5">
            <div id="chart3"></div>
			<script>
                function createChart() {
                    $("#chart3").kendoChart({
                        title: {
                            position: "bottom",
                            text: "ข้อมูลทั่วไป : อาชีพ"
                        },
                        legend: {
                            visible: false
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                background: "transparent",
                                template: "#= category #: #= value#%",
                            }
                        },
						<?php
							for($i=0;$i<count($general_value3);$i++)
							{
								if($general_value3[$i]['gv_value']==1)
								{
									$students[] = $general_value3[$i]['gv_value'];
								}
								if($general_value3[$i]['gv_value']==2)
								{
									$teacher[] = $general_value3[$i]['gv_value'];
								}
								if($general_value3[$i]['gv_value']==3)
								{
									$musc[] = $general_value3[$i]['gv_value'];
								}
								if($general_value3[$i]['gv_value']==4)
								{
									$guest[] = $general_value3[$i]['gv_value'];
								}
							}
						?>
						<?php
							if(@count($students)!=0){
								$students_vale = (@count($students)*100)/count($general_value3);
							}else{
								$students_vale = 0;
							}
							if(@count($teacher)!=0){
								$teacher_value = (@count($teacher)*100)/count($general_value3);
							}else{
								$teacher_value = 0;
							}
							if(@count($musc)!=0){
								$musc_value = (@count($musc)*100)/count($general_value3);
							}else{
								$musc_value = 0;
							}
							if(@count($guest)!=0){
								$guest_value = (@count($guest)*100)/count($general_value3);
							}else{
								$guest_value = 0;
							}
						?>
                        series: [{
                            type: "pie",
                            startAngle: 150,
                            data: [{
                                category: "นักศึกษา",
                                value: <?php echo number_format(@$students_vale,2,'.','')?>,
                                color: "#176ced"
                            },{
                                category: "อาจารย์",
                                value: <?php echo number_format(@$teacher_value,2,'.','')?>,
                                color: "#d94531"
                            },{
                                category: "บุคลากรสายสนับสนุน",
                                value: <?php echo number_format(@$musc_value,2,'.','')?>,
                                color: "#ffb502"
                            },{
                                category: "บุคคลทั่วไป",
                                value: <?php echo number_format(@$guest_value,2,'.','')?>,
                                color: "#06a35e"
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%",
							template: "#= category #: #= value#%"
                        }
                    });
                }
        
                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
          </tr>
          <tr>
            <td width="33%" bgcolor="#F5F5F5">
			<div id="chart4"></div>
			<script>
                function createChart() {
                    $("#chart4").kendoChart({
                        title: {
                            position: "bottom",
                            text: "ข้อมูลทั่วไป : รายได้ส่วนตัวเฉลี่ยต่อเดือน"
                        },
                        legend: {
                            visible: false
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
						<?php
							for($i=0;$i<count($general_value4);$i++)
							{
								if($general_value4[$i]['gv_value']==1)
								{
									$rate1[] = $general_value4[$i]['gv_value'];
								}
								if($general_value4[$i]['gv_value']==2)
								{
									$rate2[] = $general_value4[$i]['gv_value'];
								}
								if($general_value4[$i]['gv_value']==3)
								{
									$rate3[] = $general_value4[$i]['gv_value'];
								}
								if($general_value4[$i]['gv_value']==4)
								{
									$rate4[] = $general_value4[$i]['gv_value'];
								}
								if($general_value4[$i]['gv_value']==5)
								{
									$rate5[] = $general_value4[$i]['gv_value'];
								}
								if($general_value4[$i]['gv_value']==6)
								{
									$rate6[] = $general_value4[$i]['gv_value'];
								}
							}
						?>
						<?php
							if(@count($rate1)!=0){
								$rate1_value = (@count($rate1)*100)/count($general_value4);
							}else{
								$rate1_value = 0;
							}
							if(@count($rate2)!=0){
								$rate2_value = (@count($rate2)*100)/count($general_value4);
							}else{
								$rate2_value = 0;
							}
							if(@count($rate3)!=0){
								$rate3_value = (@count($rate3)*100)/count($general_value4);
							}else{
								$rate3_value = 0;
							}
							if(@count($rate4)!=0){
								$rate4_value = (@count($rate4)*100)/count($general_value4);
							}else{
								$rate4_value = 0;
							}
							if(@count($rate5)!=0){
								$rate5_value = (@count($rate5)*100)/count($general_value4);
							}else{
								$rate5_value = 0;
							}
							if(@count($rate6)!=0){
								$rate6_value = (@count($rate6)*100)/count($general_value4);
							}else{
								$rate6_value = 0;
							}
						?>
                        series: [{
                            type: "pie",
                            startAngle: 150,
                            data: [{
                                category: "ไม่เกิน 5,000 บาท",
                                value: <?php echo number_format(@$rate1_value,2,'.','')?>,
                                color: "#176ced"
                            },{
                                category: "5,001 - 10,000 บาท",
                                value: <?php echo number_format(@$rate2_value,2,'.','')?>,
                                color: "#d94531"
                            },{
                                category: "10,001 - 15,000 บาท",
                                value: <?php echo number_format(@$rate3_value,2,'.','')?>,
                                color: "#ffb502"
                            },{
                                category: "15,001 - 20,000 บาท",
                                value: <?php echo number_format(@$rate4_value,2,'.','')?>,
                                color: "#06a35e"
                            },{
                                category: "20,001 - 25,000 บาท",
                                value: <?php echo number_format(@$rate5_value,2,'.','')?>,
                                color: "#b30190"
                            },{
                                category: "25,001 บาทขึ้นไป",
                                value: <?php echo number_format(@$rate6_value,2,'.','')?>,
                                color: "#a9a300"
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%",
							template: "#= category #: #= value#%"
                        }
                    });
                }
        
                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
            <td width="33%" bgcolor="#F5F5F5">
            <div id="chart5"></div>
			<script>
                function createChart() {
                    $("#chart5").kendoChart({
                        title: {
                            position: "bottom",
                            text: "ข้อมูลทั่วไป : การศึกษา"
                        },
                        legend: {
                            visible: false
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
						<?php
							for($i=0;$i<count($general_value5);$i++)
							{
								if($general_value5[$i]['gv_value']==1)
								{
									$study1[] = $general_value5[$i]['gv_value'];
								}
								if($general_value5[$i]['gv_value']==2)
								{
									$study2[] = $general_value5[$i]['gv_value'];
								}
								if($general_value5[$i]['gv_value']==3)
								{
									$study3[] = $general_value5[$i]['gv_value'];
								}
								if($general_value5[$i]['gv_value']==4)
								{
									$study4[] = $general_value5[$i]['gv_value'];
								}
							}
						?>
						<?php
							if(@count($study1)!=0){
								$study1_value = (@count($study1)*100)/count($general_value5);
							}else{
								$study1_value = 0;
							}
							if(@count($study2)!=0){
								$study2_value = (@count($study2)*100)/count($general_value5);
							}else{
								$study2_value = 0;
							}
							if(@count($study3)!=0){
								$study3_value = (@count($study3)*100)/count($general_value5);
							}else{
								$study3_value = 0;
							}
							if(@count($study4)!=0){
								$study4_value = (@count($study4)*100)/count($general_value5);
							}else{
								$study4_value = 0;
							}
						?>
                        series: [{
                            type: "pie",
                            startAngle: 150,
                            data: [{
                                category: "ต่ำกว่า ม.6",
                                value: <?php echo number_format(@$study1_value,2,'.','')?>,
                                color: "#176ced"
                            },{
                                category: "ปริญาตรี",
                                value: <?php echo number_format(@$study2_value,2,'.','')?>,
                                color: "#d94531"
                            },{
                                category: "ปริญาโท",
                                value: <?php echo number_format(@$study3_value,2,'.','')?>,
                                color: "#ffb502"
                            },{
                                category: "ปริญาเอก",
                                value: <?php echo number_format(@$study4_value,2,'.','')?>,
                                color: "#06a35e"
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%",
							template: "#= category #: #= value#%"
                        }
                    });
                }
        
                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
            <td width="33%" bgcolor="#F5F5F5">
            <div id="chart6"></div>
			<script>
                function createChart() {
                    $("#chart6").kendoChart({
                        title: {
                            position: "bottom",
                            text: "ข้อมูลทั่วไป : สถานะภาพ"
                        },
                        legend: {
                            visible: false
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
						<?php
							for($i=0;$i<count($general_value6);$i++)
							{
								if($general_value6[$i]['gv_value']==1)
								{
									$status1[] = $general_value6[$i]['gv_value'];
								}
								if($general_value6[$i]['gv_value']==2)
								{
									$status2[] = $general_value6[$i]['gv_value'];
								}
								if($general_value6[$i]['gv_value']==3)
								{
									$status3[] = $general_value6[$i]['gv_value'];
								}
								if($general_value6[$i]['gv_value']==4)
								{
									$status4[] = $general_value6[$i]['gv_value'];
								}
							}
						?>
						<?php
							if(@count($status1)!=0){
								$status1_value = (@count($status1)*100)/count($general_value6);
							}else{
								$status1_value = 0;
							}
							if(@count($status2)!=0){
								$status2_value = (@count($status2)*100)/count($general_value6);
							}else{
								$status2_value = 0;
							}
							if(@count($status3)!=0){
								$status3_value = (@count($status3)*100)/count($general_value6);
							}else{
								$status3_value = 0;
							}
							if(@count($status4)!=0){
								$status4_value = (@count($status4)*100)/count($general_value6);
							}else{
								$status4_value = 0;
							}
						?>
                        series: [{
                            type: "pie",
                            startAngle: 150,
                            data: [{
                                category: "โสด",
                                value: <?php echo number_format(@$status1_value,2,'.','')?>,
                                color: "#176ced"
                            },{
                                category: "แต่งงานแล้ว",
                                value: <?php echo number_format(@$status2_value,2,'.','')?>,
                                color: "#d94531"
                            },{
                                category: "แยกกันอยู่",
                                value: <?php echo number_format(@$status3_value,2,'.','')?>,
                                color: "#ffb502"
                            },{
                                category: "อย่าร้าง",
                                value: <?php echo number_format(@$status4_value,2,'.','')?>,
                                color: "#06a35e"
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%",
							template: "#= category #: #= value#%"
                        }
                    });
                }      
                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
          <tr>
            <td bgcolor="#CCCCCC">ข้อมูลแบบสำรวจ</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
            <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>        
			<?php 
			$no = $i+1;
			if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++)
				{
				$type_series[] = $arr[$m];
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_only);$k++){
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
					$type_value[$k][$n] = number_format(($sum*100)/$keep_count,2,'.','').",";
				}
				}
				}
            }
			?>
            <?php } ?>
        	<div id="chart"></div>
			<script>
                    function createChart() {
                        $("#chart").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : รับประทานอาหาร"
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
                                categories: ["ซื้อของใช้ส่วนตัว เช่น สบู่ แชมพู ผงซักฟอก กระดาษชำระ ฯลฯ","ซื้อสินค้าแฟชั่น เช่น เสื้อผ้า เครื่องแต่งกาย เครื่องประดับ รองเท้า ฯลฯ","ซื้ออาหารสด ของสด เช่น เนื้อสัตว์ ผัก ผลไม้ ฯลฯ"],
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
                                template: "#= series.name #: #= value #%"
                            }
                        });
                    }
            
                    $(document).ready(createChart);
                    $(document).bind("kendo:skinChange", createChart);
			</script>
			</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
        </td>
      </tr>
</table>
<?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>        
       		<?php 
			$no = $i+1;
			echo "<strong>".$no.". </strong>";
				/*********************** เงื่อนไขของ mulitiple_only ***********************/
			if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){ 
				$this->db->where('qh_id',$this->uri->segment(3));
				//$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('type','mulitiple_only');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $mulitiple_only_row)
				$all_value_mulitiple_only = $mulitiple_only_row->value;				
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_only']."</strong>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_only_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				
				for($a=0;$a<count($mulitiple_only_value);$a++){
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('value',$a+1);
					$this->db->where('type','mulitiple_only');
					$sum = $this->db->count_all_results('ans_value');
					echo $mulitiple_only_value[$a]." <span style='color:red;'>(".number_format(($sum*100)/$keep_count,2,'.','')."%)</span>"."<br>";
				}
				
				$value = @$_SESSION['qa_all'][$i]['question_mulitiple_only'];
				if(is_numeric($value)){
					echo "<input name='mulitiple_only_value' id='mulitiple_only_value' type='radio' checked='checked'/><input name='open_mulitiple_only' id='open_mulitiple_only' type='text' class='k-textbox' value='$value' />";
				}else{
					
				}
				echo "<p></p>";
       	 	
				/*********************** เงื่อนไขของ mulitiple_multiple ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_multiple']."</strong>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_multiple_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				
				for($a=0;$a<count($mulitiple_multiple_value);$a++){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$a+1);
				$this->db->where('value',$a+1);
				$this->db->where('type','mulitiple_multiple');
				$sum = $this->db->count_all_results('ans_value');
				echo $mulitiple_multiple_value[$a]." <span style='color:red;'>(".number_format(($sum*100)/$keep_count,2,'.','')."%)</span>"."<br>";
				}
				
				$value = @$_SESSION['qa_all'][$i]['question_mulitiple_multiple'];
				echo is_numeric($value);
				if(is_numeric($value)){
					
					if(@$_SESSION['qa_all'][$i]['other_mulitiple_multiple']!=""){
					echo "<input name='mulitiple_multiple_value' id='mulitiple_multiple_value' type='checkbox' checked='checked'/>
					<input name='open_mulitiple_multiple_value' id='open_mulitiple_multiple_value' type='text' class='k-textbox' value='$value'/>";}
					
				}else{
					
					
				}					
				echo "<p></p>";
            
				/*********************** เงื่อนไขของ comment ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="comment"){
				$this->db->where('qh_id',$this->uri->segment(3));
				//$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('type','comment');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $comment_row)
				$all_value_comment = $comment_row->value;
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['comment']."</strong>";
				echo "<br>";
				echo "<textarea name='comment_value' id='comment_value' style='width:50%; height:80px;' class='k-textbox'>".$all_value_comment."</textarea>"."<p></p>";
            
				/*********************** เงื่อนไขของ ranking ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking']."</strong>";
				echo "<br>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$ranking_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($ranking_value);$k++){
				$this->db->where('qh_id',$this->uri->segment(3));
				//$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('type','ranking');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $ranking_row)
				$all_value_ranking = $ranking_row->value;
				echo "<input name='ranking_value[$i]' id='ranking_value[$i]' type='number' value='$all_value_ranking' class='k-textbox' style='width:50px;'/>"." ".$ranking_value[$k]."<br>";}
				echo "<p></p>";
			
				/*********************** เงื่อนไขของ ranking_scale ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){ 
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking_scale']."</strong>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$a]."</td>";}
				echo "</tr>";
  				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($answer_ranking_scale);$m++){
					
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_ranking_scale[$m]."</td>";
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
				
				echo "<td bgcolor='#F4F4F4' align='center'><span style='color:red;'>(".number_format(($sum*100)/$keep_count,2,'.','')."%)</span></td>";
				}
				echo "</tr>";}
				echo "</table>"."<p></p>";		
						
				/*********************** เงื่อนไขของ matrix_only ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_only']."</strong>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_only);$k++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_only[$k]."</td>";
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
					echo "<td bgcolor='#F4F4F4' align='center'><span style='color:red;'>(".number_format(($sum*100)/$keep_count,2,'.','')."%)</span></td>";
				}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				
				/*********************** เงื่อนไขของ matrix_multiple ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){ 
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_multiple']."</strong>";
				echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$ranking_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($ranking_matrix_multiple);$m++){
				echo "<td bgcolor='#F4F4F4' align='center'>".$ranking_matrix_multiple[$m]."</td>";}
				echo "</tr>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($answer_matrix_multiple);$k++){
				echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_multiple[$k]."</td>";
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
					echo "<td bgcolor='#F4F4F4' align='center'><span style='color:red;'>(".number_format(($sum*100)/$keep_count,2,'.','')."%)</span></td>";
				}
				echo "</tr>";}
				echo "</table>"."<p></p>";
				
				/*********************** เงื่อนไขของ single_textbox ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="single_textbox"){ 
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_single_textbox']."</strong>";
				echo "<br>";
				$this->db->where('qh_id',$this->uri->segment(3));
				//$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('type','single_textbox');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $single_textbox_row)
				$all_value_single_textbox = $single_textbox_row->value;
				
				echo "<input name='single_textbox_value[$i]' id='single_textbox_value[$i]' value='$all_value_single_textbox' class='k-textbox'>"."<p></p>";
				
				
						
				/*********************** เงื่อนไขของ mulitple_textbox ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="mulitple_textbox"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitple_textbox']."</strong>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitple_textbox']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
					
				$this->db->where('qh_id',$this->uri->segment(3));
				//$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('type','mulitple_textbox');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $mulitple_textbox_row)
				$all_value_mulitple_textbox = $mulitple_textbox_row->value;
				
				echo "<p>"." ".$arr[$k]."<br><input name='mulitple_textbox_value[$i][$k]' id='mulitple_textbox_value[$i][$k]' class='k-textbox' value='$all_value_mulitple_textbox'>"."</p>";
				}
							
				/*********************** เงื่อนไขของ date_time ***********************/
			}else if(@$_SESSION['qa_all'][$i]['type']=="date_time"){
				echo "<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_date_time']."</strong>";
				$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($arr);$k++){
					
				$this->db->where('qh_id',$this->uri->segment(3));
				//$this->db->where('ans_map',$this->uri->segment(4));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('type','date_time');
				$query = $this->db->get('ans_value');
				foreach ($query->result() as $date_time_row)
				$all_value_date_time = $date_time_row->value;
				$chang_data = @split(' ',$all_value_date_time);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				
				
				echo "<p>"." ".@$arr[$k]."<br><input name='date_value$i$k' id='date_value$i$k' value='".@$chang_data[0]."' > <input name='time_value$i$k' id='time_value$i$k' value='".@$chang_data[1]." ".@$chang_data[2]."' ></p>";
				}				
            }?>
            
		<?php } ?> 
<?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
<?php if(@$_SESSION['qa_all'][$i]['type']=="date_time"){?>
<?php 
	  $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
	  $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
	  for($k=0;$k<count($arr);$k++){
?>
				
        <script>	
 
            $(document).ready(function () {
				// create DatePicker from input HTML element
                $("#date_value<?php echo $i ?><?php echo $k ?>").kendoDatePicker();

              });
            $(document).ready(function () {
                // create TimePicker from input HTML element
                $("#time_value<?php echo $i ?><?php echo $k ?>").kendoTimePicker();
              });


        </script>
<?php }}} ?>

