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
            <td colspan="5" bgcolor="#CCCCCC">ข้อมูลทั่วไป</td>
          </tr>
          <tr>
            <td width="18%" bgcolor="#F5F5F5">เพศ</td>
            <td width="32%" bgcolor="#F5F5F5">
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
            ชาย<br>
            หญิง
            </td>
            <td width="8%" align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo @count($man);?> คน</span><br>
            <span style="color:red;"><?php echo @count($woman);?> คน</span>
            </td>
            <td width="8%" align="center" bgcolor="#F5F5F5">
            <span style="color:red;">(<?php echo number_format($man_vale,2,'.','');?>%)</span><br>
            <span style="color:red;">(<?php echo number_format($woman_value,2,'.','');?>%)</span>
            </td>
            <td width="34%" bgcolor="#F5F5F5">
        	<div id="sex" style="height:100px;"></div>
			<script>
                    function createChart() {
                        $("#sex").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : เพศ"
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
									<?php echo number_format(@$man_vale,2,'.','')?>,
									<?php echo number_format(@$woman_value,2,'.','')?>
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
                                categories: ["ชาย","หญิง"],
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
            </td>
          </tr>
          <tr>
            <td bgcolor="#F5F5F5">อายุ</td>
            <td bgcolor="#F5F5F5">ช่วงอายุ</td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;">
            10 - 20 ปี<br>
            21 - 30 ปี<br>
            31 - 40 ปี<br>
            41 - 50 ปี<br>
            51 - 60 ปี<br>
            61 - 70 ปี
            </span>
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;">
			<?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','10');
				$this->db->where('gv_value <=','20');
				echo $age1 = ($this->db->count_all_results('general_value')*100)/count($general_value2);	
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','21');
				$this->db->where('gv_value <=','30');
				echo $age2 = ($this->db->count_all_results('general_value')*100)/count($general_value2);				
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','31');
				$this->db->where('gv_value <=','40');
				echo $age3 = ($this->db->count_all_results('general_value')*100)/count($general_value2);				
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','41');
				$this->db->where('gv_value <=','50');
				echo $age4 = ($this->db->count_all_results('general_value')*100)/count($general_value2);				
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','51');
				$this->db->where('gv_value <=','60');
				echo $age5 = ($this->db->count_all_results('general_value')*100)/count($general_value2);				
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','61');
				$this->db->where('gv_value <=','70');
				echo $age6 = ($this->db->count_all_results('general_value')*100)/count($general_value2);				
			?>%
            </span>
            
            </td>
            <td bgcolor="#F5F5F5">
            <div id="age" style="height:150px;"></div>
			<script>
                    function createChart() {
                        $("#age").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : เพศ"
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
									<?php echo number_format(@$age1,2,'.','')?>,
									<?php echo number_format(@$age2,2,'.','')?>,
									<?php echo number_format(@$age3,2,'.','')?>,
									<?php echo number_format(@$age4,2,'.','')?>,
									<?php echo number_format(@$age5,2,'.','')?>,
									<?php echo number_format(@$age6,2,'.','')?>
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
                                categories: ["10-20 ปี","21-30 ปี","31-40 ปี","41-50 ปี","51-60 ปี","61-70 ปี"],
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
            </td>
          </tr>
          <tr>
            <td bgcolor="#F5F5F5">อาชีพ</td>
            <td bgcolor="#F5F5F5">
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
            นักศึกษา<br>
            อาจารย์<br>
            บุคลากรสายสนับสนุน<br>
            บุคคลทั่วไป
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo @count($students);?> คน</span><br>
            <span style="color:red;"><?php echo @count($teacher);?> คน</span><br>
            <span style="color:red;"><?php echo @count($musc);?> คน</span><br>
            <span style="color:red;"><?php echo @count($guest);?> คน</span>
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo number_format($students_vale,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($teacher_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($musc_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($guest_value,2,'.','');?>%</span>
            </td>
            <td bgcolor="#F5F5F5">
            <div id="career" style="height:120px;"></div>
			<script>
                    function createChart() {
                        $("#career").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : อาชีพ"
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
									<?php echo number_format(@$students_vale,2,'.','')?>,
									<?php echo number_format(@$teacher_value,2,'.','')?>,
									<?php echo number_format(@$musc_value,2,'.','')?>,
									<?php echo number_format(@$guest_value,2,'.','')?>
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
                                categories: ["นักศึกษา","อาจารย์","บุคลากรสายสนับสนุน","บุคคลทั่วไป"],
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
            </td>
          </tr>
          <tr>
            <td bgcolor="#F5F5F5">รายได้ส่วนตัวเฉลี่ยต่อเดือน</td>
            <td bgcolor="#F5F5F5">
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
					$rate1_vale = (@count($rate1)*100)/count($general_value4);
				}else{
					$rate1_vale = 0;
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
            ไม่เกิน 5,000 บาท<br>
            5,001 - 10,000 บาท<br>
            10,001 - 15,000 บาท<br>
            15,001 - 20,000 บาท<br>
            20,001 - 25,000 บาท<br>
            25,001 บาทขึ้นไป
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo @count($rate1);?> คน</span><br>
            <span style="color:red;"><?php echo @count($rate2);?> คน</span><br>
            <span style="color:red;"><?php echo @count($rate3);?> คน</span><br>
            <span style="color:red;"><?php echo @count($rate4);?> คน</span><br>
            <span style="color:red;"><?php echo @count($rate5);?> คน</span><br>
            <span style="color:red;"><?php echo @count($rate6);?> คน</span>
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo number_format($rate1_vale,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($rate2_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($rate3_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($rate4_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($rate5_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($rate6_value,2,'.','');?>%</span>
            </td>
            <td bgcolor="#F5F5F5">
            <div id="revenue" style="height:160px;"></div>
			<script>
                    function createChart() {
                        $("#revenue").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : รายได้ส่วนตัวเฉลี่ยต่อเดือน"
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
									<?php echo number_format(@$rate1_vale,2,'.','')?>,
									<?php echo number_format(@$rate2_value,2,'.','')?>,
									<?php echo number_format(@$rate3_value,2,'.','')?>,
									<?php echo number_format(@$rate4_value,2,'.','')?>,
									<?php echo number_format(@$rate5_value,2,'.','')?>,
									<?php echo number_format(@$rate6_value,2,'.','')?>
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
                                categories: ["ไม่เกิน 5,000 บาท","5,001 - 10,000 บาท","10,001 - 15,000 บาท","15,001 - 20,000 บาท","20,001 - 25,000 บาท","25,001 บาทขึ้นไป"],
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
            </td>
          </tr>
          <tr>
            <td bgcolor="#F5F5F5">การศึกษา</td>
            <td bgcolor="#F5F5F5">
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
            ต่ำกว่า ม.6<br>
            ปริญาตรี<br>
            ปริญาโท<br>
            ปริญาเอก
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo @count($study1);?> คน</span><br>
            <span style="color:red;"><?php echo @count($study2);?> คน</span><br>
            <span style="color:red;"><?php echo @count($study3);?> คน</span><br>
            <span style="color:red;"><?php echo @count($study4);?> คน</span>
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo number_format($study1_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($study2_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($study3_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($study4_value,2,'.','');?>%</span>
            </td>
            <td bgcolor="#F5F5F5">
            <div id="study" style="height:120px;"></div>
			<script>
                    function createChart() {
                        $("#study").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : การศึกษา"
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
									<?php echo number_format(@$study1_value,2,'.','')?>,
									<?php echo number_format(@$study2_value,2,'.','')?>,
									<?php echo number_format(@$study3_value,2,'.','')?>,
									<?php echo number_format(@$study4_value,2,'.','')?>
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
                                categories: ["ต่ำกว่า ม.6","ปริญาตรี","ปริญาโท","ปริญาเอก"],
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
            </td>
          </tr>
          <tr>
            <td bgcolor="#F5F5F5">สถานภาพ</td>
            <td bgcolor="#F5F5F5">
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
            โสด<br>
            แต่งงานแล้ว<br>
            แยกกันอยู่<br>
            อย่าร้าง
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo @count($status1);?> คน</span><br>
            <span style="color:red;"><?php echo @count($status2);?> คน</span><br>
            <span style="color:red;"><?php echo @count($status3);?> คน</span><br>
            <span style="color:red;"><?php echo @count($status4);?> คน</span>
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo number_format($status1_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($status2_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($status3_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($status4_value,2,'.','');?>%</span>
            </td>
            <td bgcolor="#F5F5F5">
            <div id="status" style="height:120px;"></div>
			<script>
                    function createChart() {
                        $("#status").kendoChart({
                            title: {
                                text: "ข้อมูลแบบสำรวจ : สถานภาพ"
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
									<?php echo number_format(@$status1_value,2,'.','')?>,
									<?php echo number_format(@$status2_value,2,'.','')?>,
									<?php echo number_format(@$status3_value,2,'.','')?>,
									<?php echo number_format(@$status4_value,2,'.','')?>
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
                                categories: ["โสด","แต่งงานแล้ว","แยกกันอยู่","อย่าร้าง"],
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
            </td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
          <tr>
            <td bgcolor="#CCCCCC">ข้อมูลแบบสำรวจ</td>
          </tr>
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
			?>
            <div id="mulitiple_only" style="height:250px;"></div>
            <?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_mulitiple_only'];?>
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
            <?php } else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){?>
            <!------------------- mulitiple_only ----------------------------->
            <!------------------- mulitiple_multiple ----------------------------->
            <div id="mulitiple_multiple" style="height:250px;"></div>
            <?php 
				echo $no.". ".@$_SESSION['qa_all'][$i]['question_mulitiple_multiple'];
				$data = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$mulitiple_multiple_value = @split('/',$data);//ตัด array โดยหา data จาก สัญญาลักณ์ /
			?>
				<table width="100%" border="0" cellpadding="4" cellspacing="4">
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
					<?php echo @number_format(($sum*100)/$keep_count,2,'.','')?>%
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
                <table width="100%" border="0" cellpadding="4" cellspacing="4">
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
            <div id="ranking"></div>
            <?php 
				echo $no.". ".@$_SESSION['qa_all'][$i]['question_ranking'];
			?>
				<?php
               	$date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$ranking_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				?>
                <table width="100%" border="0" cellpadding="4" cellspacing="4">
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
            <div id="ranking_scale"></div>
            <?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_ranking_scale'];?>
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
			<?php } else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){?>
            <!------------------- ranking_scale ----------------------------->
            <!------------------- matrix_only ----------------------------->
            <div id="matrix_only"></div>
			<?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_matrix_only'];?>
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
			<?php } else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){?>
            <!------------------- matrix_only ----------------------------->
            <!------------------- matrix_multiple ----------------------------->
            <div id="matrix_multiple"></div>
            <?php echo $no.". ".@$_SESSION['qa_all'][$i]['question_matrix_multiple'];?>
            <table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>
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
                <table width="100%" border="0" cellpadding="4" cellspacing="4">
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
                <table width="100%" border="0" cellpadding="4" cellspacing="4">
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
                <table width="100%" border="0" cellpadding="4" cellspacing="4">
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
                    $value_mulitiple_only[] = @number_format(($sum*100)/$keep_count,2,'.','');
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
					$value_mulitiple_multiple[] = @number_format(($sum*100)/$keep_count,2,'.','');
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
						$value_matrix_multiple[$k][$n] = @number_format(($sum*100)/$keep_count,2,'.','').",";
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
