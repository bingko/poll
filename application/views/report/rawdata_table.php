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
          <?php if($general_value1[0]['gv_value']>0){?>
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

                 <div id="sex_tabstrip">
                    <ul>
                        <li class="k-state-active">
                            กราฟแท่ง
                        </li>
                        <li>
                            กราฟวงกลม
                        </li>

                    </ul>
                    <div>
            <div id="sex" style="width:100%; height:180px;"></div>
            </div>
            <div>
            <div id="sex_pie" style="width:300px; height:180px;" align="center"></div>
            </div></div>
             <script>
                $(document).ready(function() {
                    $("#sex_tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
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
             <script>
                function createChart() {
                    $("#sex_pie").kendoChart({

                        legend: {
                            visible: true
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                //background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
                        series: [{
                            type: "pie",
                            startAngle: 220,
                            data: [{
                                category: "ชาย",
                                value: <?php echo number_format(@$man_vale,2,'.','')?>,
                            },{
                                category: "หญิง",
                                value: <?php echo number_format(@$woman_value,2,'.','')?>,
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%"
                        }
                    });
                }

                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
            </tr>
            <?php } ?>
            <?php if($general_value2[0]['gv_value']>0){?>
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
            มากกว่า 61 ปีขึ้นไป
            </span>
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;">
			<?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','10');
				$this->db->where('gv_value <=','20');
				@$age1 = ($this->db->count_all_results('general_value')*100)/count($general_value2);
                echo number_format(@$age1,2,'.','');
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','21');
				$this->db->where('gv_value <=','30');
				@$age2 = ($this->db->count_all_results('general_value')*100)/count($general_value2);	
                echo number_format(@$age2,2,'.','');			
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','31');
				$this->db->where('gv_value <=','40');
				@$age3 = ($this->db->count_all_results('general_value')*100)/count($general_value2);
                echo number_format(@$age3,2,'.','');				
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','41');
				$this->db->where('gv_value <=','50');
				@$age4 = ($this->db->count_all_results('general_value')*100)/count($general_value2);	
                echo number_format(@$age4,2,'.','');			
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','51');
				$this->db->where('gv_value <=','60');
				@$age5 = ($this->db->count_all_results('general_value')*100)/count($general_value2);
                echo number_format(@$age5,2,'.','');				
			?>%<br>
            <?php
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('gv_category',2);
				$this->db->where('gv_value >=','61');
                $this->db->where('gv_value <=','70');
				@$age6 = ($this->db->count_all_results('general_value')*100)/count($general_value2);	
                echo number_format(@$age6,2,'.','');			
			?>%
            </span>
            
            </td>
            <td bgcolor="#F5F5F5">
            <div id="age_tabstrip">
                    <ul>
                        <li class="k-state-active">
                            กราฟแท่ง
                        </li>
                        <li>
                            กราฟวงกลม
                        </li>

                    </ul>
                    <div>
            <div id="age" style="height:180px;"></div>
            </div>
            <div>
            <div id="age_pie" style="height:180px;" align="center"></div>
            </div></div>
             <script>
                $(document).ready(function() {
                    $("#age_tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
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
            <script>
                function createChart() {
                    $("#age_pie").kendoChart({

                        legend: {
                            visible: true
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                //background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
                        series: [{
                            type: "pie",
                            startAngle: 220,
                            data: [{
                                category: "10-20 ปี",
                                value: <?php echo number_format(@$age1,2,'.','')?>,
                            },{
                                category: "21-30 ปี",
                                value: <?php echo number_format(@$age2,2,'.','')?>,
                            },{
                                category: "31-40 ปี",
                                value: <?php echo number_format(@$age3,2,'.','')?>,
                            },{
                                category: "41-50 ปี",
                                value: <?php echo number_format(@$age4,2,'.','')?>,
                            },{
                                category: "51-60 ปี",
                                value: <?php echo number_format(@$age5,2,'.','')?>,
                            },{
                                category: "61-70 ปี",
                                value: <?php echo number_format(@$age6,2,'.','')?>,
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%"
                        }
                    });
                }

                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
          </tr>
          <?php } ?>
          <?php if($general_value3[0]['gv_value']>0){?>
          <tr>
            <td bgcolor="#F5F5F5">อาชีพ</td>
            <td bgcolor="#F5F5F5">
            <?php
            	for($i=0;$i<count($general_value3);$i++)
				{
					if($general_value3[$i]['gv_value']==1)
					{
						$official[] = $general_value3[$i]['gv_value'];
					}
					if($general_value3[$i]['gv_value']==2)
					{
						$students[] = $general_value3[$i]['gv_value'];
					}
					if($general_value3[$i]['gv_value']==3)
					{
						$employee[] = $general_value3[$i]['gv_value'];
					}
					if($general_value3[$i]['gv_value']==4)
					{
						$merchant[] = $general_value3[$i]['gv_value'];
					}
					if($general_value3[$i]['gv_value']==5)
					{
						$labor[] = $general_value3[$i]['gv_value'];
					}
					if($general_value3[$i]['gv_value']==6)
					{
						$maid[] = $general_value3[$i]['gv_value'];
					}
					if($general_value3[$i]['gv_value']==7)
					{
						$agriculturist[] = $general_value3[$i]['gv_value'];
					}
					if($general_value3[$i]['gv_value']==8)
					{
						$guest[] = $general_value3[$i]['gv_value'];
					}
				}
			?>
            <?php
            	if(@count($official)!=0){
					$official_vale = (@count($official)*100)/count($general_value3);
				}else{
					$official_vale = 0;
				}
				if(@count($students)!=0){
					$students_value = (@count($students)*100)/count($general_value3);
				}else{
					$students_value = 0;
				}
				if(@count($employee)!=0){
					$employee_value = (@count($employee)*100)/count($general_value3);
				}else{
					$employee_value = 0;
				}
				if(@count($merchant)!=0){
					$merchant_value = (@count($merchant)*100)/count($general_value3);
				}else{
					$merchant_value = 0;
				}
            	if(@count($labor)!=0){
					$labor_vale = (@count($labor)*100)/count($general_value3);
				}else{
					$labor_vale = 0;
				}
				if(@count($maid)!=0){
					$maid_value = (@count($maid)*100)/count($general_value3);
				}else{
					$maid_value = 0;
				}
				if(@count($agriculturist)!=0){
					$agriculturist_value = (@count($agriculturist)*100)/count($general_value3);
				}else{
					$agriculturist_value = 0;
				}
				if(@count($guest)!=0){
					$guest_value = (@count($guest)*100)/count($general_value3);
				}else{
					$guest_value = 0;
				}
			?>
            รับราชการ / พนักงานรัฐวิสาหกิจ<br>
            นักเรียน / นักศึกษา<br>
            พนักงานบริษัทเอกชน<br>
            ค้าขาย / ธุรกิจส่วนตัว<br>
            รับจ้างทั่วไป/ใช้แรงงาน<br>
            พ่อบ้าน/แม่บ้าน<br>
            เกษตรกรรม<br>
            อื่นๆ
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo @count($official);?> คน</span><br>
            <span style="color:red;"><?php echo @count($students);?> คน</span><br>
            <span style="color:red;"><?php echo @count($employee);?> คน</span><br>
            <span style="color:red;"><?php echo @count($merchant);?> คน</span><br>
            <span style="color:red;"><?php echo @count($labor);?> คน</span><br>
            <span style="color:red;"><?php echo @count($maid);?> คน</span><br>
            <span style="color:red;"><?php echo @count($agriculturist);?> คน</span><br>
            <span style="color:red;"><?php echo @count($guest);?> คน</span>
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo number_format($official_vale,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($students_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($employee_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($merchant_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($labor_vale,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($maid_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($agriculturist_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($guest_value,2,'.','');?>%</span>
  			</td>
            <td bgcolor="#F5F5F5">
                        <div id="job_tabstrip">
                    <ul>
                        <li class="k-state-active">
                            กราฟแท่ง
                        </li>
                        <li>
                            กราฟวงกลม
                        </li>

                    </ul>
                    <div>
            <div id="job" style="height:180px;"></div>
            </div>
            <div>
            <div id="job_pie" style="height:180px;" align="center"></div>
            </div></div>
             <script>
                $(document).ready(function() {
                    $("#job_tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
            
			<script>
                    function createChart() {
                        $("#job").kendoChart({
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
									<?php echo number_format(@$official_vale,2,'.','')?>,
									<?php echo number_format(@$students_value,2,'.','')?>,
									<?php echo number_format(@$employee_value,2,'.','')?>,
									<?php echo number_format(@$merchant_value,2,'.','')?>,
									<?php echo number_format(@$labor_vale,2,'.','')?>,
									<?php echo number_format(@$maid_value,2,'.','')?>,
									<?php echo number_format(@$agriculturist_value,2,'.','')?>,
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
                                categories: ["รับราชการ / พนักงานรัฐวิสาหกิจ","นักเรียน / นักศึกษา","พนักงานบริษัทเอกชน","ค้าขาย / ธุรกิจส่วนตัว","รับจ้างทั่วไป/ใช้แรงงาน","พ่อบ้าน/แม่บ้าน","เกษตรกรรม","อื่นๆ"],
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
                    $("#job_pie").kendoChart({

                        legend: {
                            visible: true
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                //background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
                        series: [{
                            type: "pie",
                            startAngle: 220,
                            data: [{
                                category: "รับราชการ / พนักงานรัฐวิสาหกิจ",
                                value: <?php echo number_format(@$official_vale,2,'.','')?>,
                            },{
                                category: "นักเรียน / นักศึกษา",
                                value: <?php echo number_format(@$students_value,2,'.','')?>,
                            },{
                                category: "พนักงานบริษัทเอกชน",
                                value: <?php echo number_format(@$employee_value,2,'.','')?>,
                            },{
                                category: "ค้าขาย / ธุรกิจส่วนตัว",
                                value: <?php echo number_format(@$merchant_value,2,'.','')?>,
                            },{
                                category: "รับจ้างทั่วไป/ใช้แรงงาน",
                                value: <?php echo number_format(@$labor_vale,2,'.','')?>,
                            },{
                                category: "พ่อบ้าน/แม่บ้าน",
                                value: <?php echo number_format(@$maid_value,2,'.','')?>,
                            },{
                                category: "เกษตรกรรม",
                                value: <?php echo number_format(@$agriculturist_value,2,'.','')?>,
                            },{
                                category: "อื่นๆ",
                                value: <?php echo number_format(@$guest_value,2,'.','')?>,
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%"
                        }
                    });
                }

                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
          </tr>
          <?php } ?>
          <?php if($general_value4[0]['gv_value']>0){?>
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
            20,001 - 40,000 บาท<br>
            40,001 บาทขึ้นไป
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
            <div id="revenue_tabstrip">
                    <ul>
                        <li class="k-state-active">
                            กราฟแท่ง
                        </li>
                        <li>
                            กราฟวงกลม
                        </li>

                    </ul>
                    <div>
            <div id="revenue" style="height:180px;"></div>
            </div>
            <div>
            <div id="revenue_pie" style="height:180px;" align="center"></div>
            </div></div>
             <script>
                $(document).ready(function() {
                    $("#revenue_tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
            
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
                                categories: ["ไม่เกิน 5,000 บาท","5,001 - 10,000 บาท","10,001 - 15,000 บาท","15,001 - 20,000 บาท","20,001 - 40,000 บาท","40,001 บาทขึ้นไป"],
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
                    $("#revenue_pie").kendoChart({

                        legend: {
                            visible: true
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                //background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
                        series: [{
                            type: "pie",
                            startAngle: 220,
                            data: [{
                                category: "ไม่เกิน 5,000 บาท",
                                value: <?php echo number_format(@$rate1_vale,2,'.','')?>,
                            },{
                                category: "5,001 - 10,000 บาท",
                                value: <?php echo number_format(@$rate2_value,2,'.','')?>,
                            },{
                                category: "10,001 - 15,000 บาท",
                                value: <?php echo number_format(@$rate3_value,2,'.','')?>,
                            },{
                                category: "15,001 - 20,000 บาท",
                                value: <?php echo number_format(@$rate4_value,2,'.','')?>,
                            },{
                                category: "20,001 - 40,000 บาท",
                                value: <?php echo number_format(@$rate5_value,2,'.','')?>,
                            },{
                                category: "40,001 บาทขึ้นไป",
                                value: <?php echo number_format(@$rate6_value,2,'.','')?>,
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%"
                        }
                    });
                }

                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
                        </td>
          </tr>
          <?php } ?>
          <?php if($general_value5[0]['gv_value']>0){?>
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
					if($general_value5[$i]['gv_value']==5)
					{
						$study5[] = $general_value5[$i]['gv_value'];
					}
					if($general_value5[$i]['gv_value']==6)
					{
						$study6[] = $general_value5[$i]['gv_value'];
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
				if(@count($study5)!=0){
					$study5_value = (@count($study5)*100)/count($general_value5);
				}else{
					$study5_value = 0;
				}
				if(@count($study6)!=0){
					$study6_value = (@count($study6)*100)/count($general_value5);
				}else{
					$study6_value = 0;
				}
			?>
            ประถมศึกษา / หรือต่ำกว่า<br>
            มัธยมศึกษาตอนต้น<br>
            มัธยมศึกษาตอนปลาย / ปวช.<br>
            อนุปริญญา / ปวส.<br>
            ปริญญาตรี<br>
            ปริญญาโท / ปริญญาเอก
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo @count($study1);?> คน</span><br>
            <span style="color:red;"><?php echo @count($study2);?> คน</span><br>
            <span style="color:red;"><?php echo @count($study3);?> คน</span><br>
            <span style="color:red;"><?php echo @count($study4);?> คน</span><br>
            <span style="color:red;"><?php echo @count($study5);?> คน</span><br>
            <span style="color:red;"><?php echo @count($study6);?> คน</span>
            </td>
            <td align="center" bgcolor="#F5F5F5">
            <span style="color:red;"><?php echo number_format($study1_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($study2_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($study3_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($study4_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($study5_value,2,'.','');?>%</span><br>
            <span style="color:red;"><?php echo number_format($study6_value,2,'.','');?>%</span>
            
            </td>
            <td bgcolor="#F5F5F5">
                        <div id="study_tabstrip">
                    <ul>
                        <li class="k-state-active">
                            กราฟแท่ง
                        </li>
                        <li>
                            กราฟวงกลม
                        </li>

                    </ul>
                    <div>
                <div id="study" style="height:180px;"></div>
            </div>
            <div>
            <div id="study_pie" style="height:180px;" align="center"></div>
            </div></div>
             <script>
                $(document).ready(function() {
                    $("#study_tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
            
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
									<?php echo number_format(@$study4_value,2,'.','')?>,
									<?php echo number_format(@$study5_value,2,'.','');?>,
									<?php echo number_format(@$study6_value,2,'.','')?>
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
                                categories: ["ประถมศึกษา / หรือต่ำกว่า","มัธยมศึกษาตอนต้น","มัธยมศึกษาตอนปลาย / ปวช.","อนุปริญญา / ปวส.","ปริญญาตรี","ปริญญาโท / ปริญญาเอก"],
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
                    $("#study_pie").kendoChart({

                        legend: {
                            visible: true
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                //background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
                        series: [{
                            type: "pie",
                            startAngle: 220,
                            data: [{
                                category: "ประถมศึกษา / หรือต่ำกว่า",
                                value: <?php echo number_format(@$study1_value,2,'.','')?>
                            },{
                                category: "มัธยมศึกษาตอนต้น",
                                value: <?php echo number_format(@$study2_value,2,'.','')?>
                            },{
                                category: "มัธยมศึกษาตอนปลาย / ปวช.",
                                value: <?php echo number_format(@$study3_value,2,'.','')?>
                            },{
                                category: "อนุปริญญา / ปวส.",
                                value: <?php echo number_format(@$study4_value,2,'.','')?>
                            },{
                                category: "ปริญญาตรี",
                                value: <?php echo number_format(@$study5_value,2,'.','');?>
                            },{
                                category: "ปริญญาโท / ปริญญาเอก",
                                value: <?php echo number_format(@$study6_value,2,'.','')?>
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%"
                        }
                    });
                }

                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>

            </td>
          </tr>
          <?php } ?>
          <?php if($general_value6[0]['gv_value']>0){?>
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
                                    <div id="status_tabstrip">
                    <ul>
                        <li class="k-state-active">
                            กราฟแท่ง
                        </li>
                        <li>
                            กราฟวงกลม
                        </li>

                    </ul>
                    <div>
                <div id="status" style="height:180px;"></div>
            </div>
            <div>
            <div id="status_pie" style="height:180px;" align="center"></div>
            </div></div>
             <script>
                $(document).ready(function() {
                    $("#status_tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
            
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
                <script>
                function createChart() {
                    $("#status_pie").kendoChart({

                        legend: {
                            visible: true
                        },
                        chartArea: {
                            background: ""
                        },
                        seriesDefaults: {
                            labels: {
                                visible: true,
                                //background: "transparent",
                                template: "#= category #: #= value#%"
                            }
                        },
                        series: [{
                            type: "pie",
                            startAngle: 220,
                            data: [{
                                category: "โสด",
                                value: <?php echo number_format(@$status1_value,2,'.','')?>
                            },{
                                category: "แต่งงานแล้ว",
                                value: <?php echo number_format(@$status2_value,2,'.','')?>
                            },{
                                category: "แยกกันอยู่",
                                value: <?php echo number_format(@$status3_value,2,'.','')?>
                            },{
                                category: "อย่าร้าง",
                                value: <?php echo number_format(@$status4_value,2,'.','')?>
                            }]
                        }],
                        tooltip: {
                            visible: true,
                            format: "{0}%"
                        }
                    });
                }

                $(document).ready(createChart);
                $(document).bind("kendo:skinChange", createChart);
            </script>
            </td>
          </tr>
          <?php } ?>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
          <tr>
            <td bgcolor="#CCCCCC">ข้อมูลทั่วไปเพิ่มเติม</td>
          </tr>
          <tr>
            <td>

            <?php for($i=0;$i<count(@$_SESSION['temp_all']);$i++){?>
            <?php $no = $i+1;?>
            <!------------------- mulitiple_only ------------------------------>
            <?php if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_only"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['question_mulitiple_only'];?></strong>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
            <?php
				$data = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
				$temp_mulitiple_only_value = @split('/',$data);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($temp_mulitiple_only_value);$a++){
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('value',$a+1);
					$this->db->where('type','mulitiple_only');
					$temp_sum = $this->db->count_all_results('ans_temp_value');
					$temp_sum_value[] = $temp_sum;
			?>
              <tr>
                <td bgcolor="#F5F5F5"><?php echo @$temp_mulitiple_only_value[$a]?></td>
                <td width="8%" align="center" bgcolor="#F5F5F5" style="color:red;">
				<?php echo $temp_sum?> คน
                </td>
                <td width="8%" align="center" bgcolor="#F5F5F5" style="color:red;">
				<?php echo @number_format(($temp_sum*100)/$keep_count,2,'.','')?>%
                </td>
              </tr>
            <?php } ?>
            </table>
            <?php
				if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_only"){
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('type','mulitiple_only');
					$query = $this->db->get('ans_temp_value');
					foreach ($query->result() as $mulitiple_only_row)
					$all_value_mulitiple_only = $mulitiple_only_row->value;				
					$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
					$temp_mulitiple_only_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
					
					for($a=0;$a<count($temp_mulitiple_only_value);$a++)
					{
						$this->db->where('qh_id',$this->uri->segment(3));
						$this->db->where('v_number',$no);
						$this->db->where('value',$a+1);
						$this->db->where('type','mulitiple_only');
						$temp_sum = $this->db->count_all_results('ans_temp_value');
						$temp_series_mulitiple_only[$i][] = $temp_mulitiple_only_value[$a];
						$temp_value_mulitiple_only[$i][] = @number_format(($temp_sum*100)/$keep_count,2,'.','');
					}					
				}
			?>
            
                  <div id="temp_tabstrip_mulitiple_only<?php echo $i?>">
                    <ul>
                        <li class="k-state-active">
                            กราฟแท่ง
                        </li>
                        <li>
                            กราฟวงกลม
                        </li>

                    </ul>
                    <div>
            <div id="temp_mulitiple_only<?php echo $i?>"></div>
            </div>
            <div>
            <div id="temp_mulitiple_only<?php echo $i?>_pie" align="center"></div>
            </div></div>
             <script>
                $(document).ready(function() {
                    $("#temp_tabstrip_mulitiple_only<?php echo $i?>").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
            </script>
            
			<?php }else if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_multiple"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['question_mulitiple_multiple'];?></strong>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
			<?php 
				$data = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$temp_mulitiple_multiple_value = @split('/',$data);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($temp_mulitiple_multiple_value);$a++){
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('ans_number',$a+1);
					$this->db->where('value',$a+1);
					$this->db->where('type','mulitiple_multiple');
					$temp_sum = $this->db->count_all_results('ans_temp_value');
					$temp_sum_value[] = $temp_sum;
			?>
                <tr>
                    <td bgcolor="#F5F5F5"><?php echo @$temp_mulitiple_multiple_value[$a]?></td>
                    <td width="8%" align="center" bgcolor="#F5F5F5" style="color:red;">
					<?php echo $temp_sum?> คน
                    </td>
                    <td width="8%" align="center" bgcolor="#F5F5F5" style="color:red;">
					<?php echo @number_format(($temp_sum*100)/$keep_count,2,'.','')?>%
                    </td>
                </tr>
			<?php } ?>
			</table>
            <?php
				if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_multiple"){
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
				$temp_mulitiple_multiple_value = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($temp_mulitiple_multiple_value);$a++)
				{
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('ans_number',$a+1);
					$this->db->where('value',$a+1);
					$this->db->where('type','mulitiple_multiple');
					$temp_sum = $this->db->count_all_results('ans_temp_value');
					$series_temp_mulitiple_multiple[$i][] = $temp_mulitiple_multiple_value[$a];
					$value_temp_mulitiple_multiple[$i][] = @number_format(($temp_sum*100)/$keep_count,2,'.','');
				}
			}
			?>
            <div id="temp_mulitiple_multiple<?php echo $i?>"></div>
			<?php }else if(@$_SESSION['temp_all'][$i]['type']=="comment"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['comment'];?></strong>
			<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','comment');
				$query = $this->db->get('ans_temp_value');
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
			<?php }else if(@$_SESSION['temp_all'][$i]['type']=="ranking"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['question_ranking'];?></strong><br>
            <?php
               	$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$temp_ranking_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
			?>
            <table width="100%" border="0" cellpadding="4" cellspacing="4">
                <tr>
                	<td bgcolor="#F5F5F5" width="70%">&nbsp;</td>
                    <?php for($b=0;$b<count($temp_ranking_value[$i]);$b++){?>
                    <td align="center" bgcolor="#F5F5F5">ลำดับ <?php echo $b+1?></td>
                    <?php } ?>
                </tr>
				<?php for($k=0;$k<count($temp_ranking_value[$i]);$k++){
				for($l=0;$l<count($temp_ranking_value[$i]);$l++){
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$k+1);
				$this->db->where('value',$l+1);
				$this->db->where('type','ranking');
				$temp_sum_ranking[$k][$l] =  $this->db->count_all_results('ans_temp_value');
				}
				?>
                <tr>
                    <td bgcolor="#F5F5F5" width="70%"><?php echo $temp_ranking_value[$i][$k];?></td>
                    <?php for($d=0;$d<count($temp_ranking_value[$i]);$d++){?>
                    <td align="center" bgcolor="#F5F5F5" style="color:red;">
					<?php echo $temp_sum_ranking[$k][$d]?> คน | 
                    <?php echo number_format(($temp_sum_ranking[$k][$d]*100)/count($temp_ranking_value[$i]),2,'.','')?>%
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
			</table>
            <?php
				if(@$_SESSION['temp_all'][$i]['type']=="ranking"){
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
				$temp_ranking_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($temp_ranking_value[$i]);$k++)
				{
					for($l=0;$l<count($temp_ranking_value[$i]);$l++)
					{
						$this->db->where('qh_id',$this->uri->segment(3));
						$this->db->where('v_number',$no);
						$this->db->where('ans_number',$k+1);
						$this->db->where('value',$l+1);
						$this->db->where('type','ranking');
						$temp_sum =  $this->db->count_all_results('ans_temp_value');
						$temp_sum_ranking_value[$i][$k][$l] =  number_format(($temp_sum*100)/count($temp_ranking_value[$i]),2,'.','').",";
					}
                 }		 
			}
			?>
            <div id="temp_ranking<?php echo $i?>"></div>
			<?php }else if(@$_SESSION['temp_all'][$i]['type']=="ranking_scale"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['question_ranking_scale'];?></strong>
            <table width='100%' cellpadding='2' cellspacing='2'>
                <tr>
                	<td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>
                <?php
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++){?>
                	<td bgcolor='#F4F4F4' align='center'><?php echo $arr[$a]?></td>
                    <?php } ?>
				</tr>
                <?php 
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$temp_answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($temp_answer_ranking_scale);$m++){?>
				<tr>
                	<td bgcolor='#F4F4F4'><?php echo $temp_answer_ranking_scale[$m]?></td>
				<?php
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				
				for($b=0;$b<count($arr);$b++)
				{
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('v_number',$no);
				$this->db->where('ans_number',$m+1);
				$this->db->where('value',$b+1);
				$this->db->where('type','ranking_scale');
				$temp_sum = $this->db->count_all_results('ans_temp_value');?>
				
					<td bgcolor='#F4F4F4' align='center'>
                	<span style='color:red;'><?php echo number_format(($temp_sum*100)/$keep_count,2,'.','')?>%</span>
                	</td>
				<?php } ?>
				</tr>
                <?php } ?>
			</table>
            <?php
				if(@$_SESSION['temp_all'][$i]['type']=="ranking_scale"){
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($a=0;$a<count($arr);$a++)
				{
					$series_temp_ranking_scale[$i][] = $arr[$a];
				}
  				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
				$temp_answer_ranking_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
					for($m=0;$m<count($temp_answer_ranking_scale);$m++)
					{
						//$temp_answer_ranking_scale[$m];
						$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
						$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
						
						for($b=0;$b<count($arr);$b++)
						{
							$this->db->where('qh_id',$this->uri->segment(3));
							$this->db->where('v_number',$no);
							$this->db->where('ans_number',$m+1);
							$this->db->where('value',$b+1);
							$this->db->where('type','ranking_scale');
							$temp_sum = $this->db->count_all_results('ans_temp_value');
							$value_temp_ranking_scale[$i][$m][$b] = number_format(($temp_sum*100)/$keep_count,2,'.','').",";
						}
					}				
				}
			?>
            <div id="temp_ranking_scale<?php echo $i?>"></div>
			<?php }else if(@$_SESSION['temp_all'][$i]['type']=="matrix_only"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['question_matrix_only'];?></strong>
            <table width='100%' cellpadding='2' cellspacing='2'>
            	<tr>
                	<td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>
			<?php
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($arr);$m++){?>
                	<td bgcolor='#F4F4F4' align='center'><?php echo $arr[$m]?></td>
                <?php } ?>
                </tr>
				<?php
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$temp_answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($temp_answer_matrix_only);$k++){?>
                <tr>
                	<td bgcolor='#F4F4F4'><?php echo $temp_answer_matrix_only[$k]?></td>
				<?php
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++)
				{
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('ans_number',$k+1);
					$this->db->where('value',$n+1);
					$this->db->where('type','matrix_only');
					$temp_sum = $this->db->count_all_results('ans_temp_value');
				?>
                	<td bgcolor='#F4F4F4' align='center'>
					<span style='color:red;'><?php echo @number_format(($temp_sum*100)/$keep_count,2,'.','')?>%</span>
					</td>
				<?php } ?>
				</tr>
                <?php } ?>
				</table>
            <?php
				if(@$_SESSION['temp_all'][$i]['type']=="matrix_only"){
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
					for($m=0;$m<count($arr);$m++)
					{
						$type_series[$i][] = $arr[$m];
						$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
						$temp_answer_matrix_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
						for($k=0;$k<count($temp_answer_matrix_only);$k++)
						{
							$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
							$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
							for($n=0;$n<count($arr);$n++)
							{
								$this->db->where('qh_id',$this->uri->segment(3));
								$this->db->where('v_number',$no);
								$this->db->where('ans_number',$k+1);
								$this->db->where('value',$n+1);
								$this->db->where('type','matrix_only');
								$temp_sum = $this->db->count_all_results('ans_temp_value');
								@$temp_type_value[$i][$k][$n] = number_format(($temp_sum*100)/$keep_count,2,'.','').",";
							}
						}
					}				
				}
			?>
            <div id="temp_matrix_only<?php echo $i?>"></div>
			<?php }else if(@$_SESSION['temp_all'][$i]['type']=="matrix_multiple"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['question_matrix_multiple'];?></strong>
            <table width='100%' cellpadding='2' cellspacing='2'>
            <tr>
            	<td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>
            <?php
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$temp_ranking_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($m=0;$m<count($temp_ranking_matrix_multiple);$m++){?>
              		<td bgcolor='#F4F4F4' align='center'><?php echo $temp_ranking_matrix_multiple[$m]?></td>
                    <?php } ?>
			</tr>
				<?php
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$temp_answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($k=0;$k<count($temp_answer_matrix_multiple);$k++){?>
                <tr><td bgcolor='#F4F4F4'><?php echo $temp_answer_matrix_multiple[$k]?></td>
                <?php
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
				for($n=0;$n<count($arr);$n++)
				{
					$this->db->where('qh_id',$this->uri->segment(3));
					$this->db->where('v_number',$no);
					$this->db->where('ans_number',$k+1);
					$this->db->where('value',$n+1);
					$this->db->where('type','matrix_multiple');
					$temp_sum = $this->db->count_all_results('ans_temp_value');?>
                    <td bgcolor='#F4F4F4' align='center'>
                    <span style='color:red;'><?php echo @number_format(($temp_sum*100)/$keep_count,2,'.','')?>%</span>
                    </td>
                    <?php } ?>
				</tr>
                <?php } ?>
			</table>
            <?php
				if(@$_SESSION['temp_all'][$i]['type']=="matrix_multiple"){
				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$temp_ranking_multiple_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /

				$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
				$temp_answer_multiple_value[$i] = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
					for($k=0;$k<count($temp_answer_matrix_multiple);$k++)
					{
						$temp_answer_matrix_multiple[$k];
						$date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
						$arr = @split('/',$date);//ตัด array โดยหา data จาก สัญญาลักณ์ /
						for($n=0;$n<count($arr);$n++)
						{
							$this->db->where('qh_id',$this->uri->segment(3));
							$this->db->where('v_number',$no);
							$this->db->where('ans_number',$k+1);
							$this->db->where('value',$n+1);
							$this->db->where('type','matrix_multiple');
							$temp_sum = $this->db->count_all_results('ans_temp_value');
							$value_temp_matrix_multiple[$i][$k][$n] = @number_format(($temp_sum*100)/$keep_count,2,'.','').",";
						}
					}				
				}
			?>
            <div id="temp_matrix_multiple<?php echo $i?>"></div>
			<?php }else if(@$_SESSION['temp_all'][$i]['type']=="single_textbox"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['question_single_textbox'];?></strong>
			<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','single_textbox');
				$query = $this->db->get('ans_temp_value');
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
			<?php }else if(@$_SESSION['temp_all'][$i]['type']=="mulitple_textbox"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['question_mulitple_textbox'];?></strong>
			<?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','mulitple_textbox');
				$query = $this->db->get('ans_temp_value');
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
			<?php }else if(@$_SESSION['temp_all'][$i]['type']=="date_time"){?>
            <strong><?php echo $no.". ".@$_SESSION['temp_all'][$i]['question_date_time'];?></strong>
            <?php
                $this->db->select('value');
				$this->db->where('qh_id',$this->uri->segment(3));
				$this->db->where('type','date_time');
				$query = $this->db->get('ans_temp_value');
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
				//echo $temp_value_mulitiple_only[0][0];
				//print_r($temp_sum_ranking_allnum);
				//print_r($temp_ranking_value);
				//print_r($temp_sum_ranking_value);
								
			?>
            <?php for($i=0;$i<count(@$_SESSION['temp_all']);$i++){?>
            <?php if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_only"){?>
			<script>
                    function createChart() {
                        $("#temp_mulitiple_only<?php echo $i?>").kendoChart({
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
									<?php for($m=0;$m<count($temp_value_mulitiple_only[$i]);$m++){?>
                                    <?php echo @$temp_value_mulitiple_only[$i][$m]?>,
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
                                categories: [<?php for($n=0;$n<count($temp_series_mulitiple_only[$i]);$n++){?>
								"<?php echo $temp_series_mulitiple_only[$i][$n]?>",
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
                        $("#temp_mulitiple_only<?php echo $i?>_pie").kendoChart({
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
									<?php for($n=0;$n<count($temp_series_mulitiple_only[$i]);$n++){?>
									{ category :
									"<?php echo @$temp_series_mulitiple_only[$i][$n]?>",
									value:
									<?php echo @$temp_value_mulitiple_only[$i][$n]?>
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
                                categories: [<?php for($n=0;$n<count($temp_series_mulitiple_only[$i]);$n++){?>
								"<?php echo $temp_series_mulitiple_only[$i][$n]?>",
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
            <?php }else if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_multiple"){?>
            <script>
                    function createChart() {
                        $("#temp_mulitiple_multiple<?php echo $i?>").kendoChart({
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
									<?php for($m=0;$m<count($value_temp_mulitiple_multiple[$i]);$m++){?>
                                    <?php echo @$value_temp_mulitiple_multiple[$i][$m]?>,
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
                                categories: [<?php for($n=0;$n<count($series_temp_mulitiple_multiple[$i]);$n++){?>
								"<?php echo $series_temp_mulitiple_multiple[$i][$n]?>",
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
                        $("#temp_mulitiple_only<?php echo $i?>_pie").kendoChart({
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
									<?php for($n=0;$n<count($series_temp_mulitiple_multiple[$i]);$n++){?>
									{ category :
									"<?php echo @$series_temp_mulitiple_multiple[$i][$n]?>",
									value:
									<?php echo @$value_temp_mulitiple_multiple[$i][$n]?>
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
                                categories: [<?php for($n=0;$n<count($series_temp_mulitiple_multiple[$i]);$n++){?>
								"<?php echo $series_temp_mulitiple_multiple[$i][$n]?>",
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
            <?php }else if(@$_SESSION['temp_all'][$i]['type']=="ranking"){?>
			<script>
                    function createChart() {
                        $("#temp_ranking<?php echo $i?>").kendoChart({
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
								<?php for($h=0;$h<count($temp_ranking_value[$i]);$h++){?>
								{
									name: "ลำดับ <?php echo $h+1?>",
									data:
									[
										<?php for($m=0;$m<count($temp_ranking_value[$i]);$m++){?>
                                        <?php echo @$temp_sum_ranking_value[$i][$m][$h]?>
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
								<?php for($e=0;$e<count($temp_ranking_value[$i]);$e++){?>
								"<?php echo $temp_ranking_value[$i][$e]?>",
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
            <?php }else if(@$_SESSION['temp_all'][$i]['type']=="ranking_scale"){?>
            <script>
                    function createChart() {
                        $("#temp_ranking_scale<?php echo $i?>").kendoChart({
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
								<?php for($m=0;$m<count($series_temp_ranking_scale[$i]);$m++){?>
								{
									name: "<?php echo $series_temp_ranking_scale[$i][$m]?>",
									data:
									[
										<?php for($n=0;$n<count($value_temp_ranking_scale[$i]);$n++){?>
                                        <?php echo @$value_temp_ranking_scale[$i][$n][$m]?>
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
								<?php for($p=0;$p<count($temp_answer_ranking_value[$i]);$p++){?>
								"<?php echo $temp_answer_ranking_value[$i][$p]?>",
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
            <?php }else if(@$_SESSION['temp_all'][$i]['type']=="matrix_only"){?>
			<script>
                    function createChart() {
                        $("#temp_matrix_only<?php echo $i?>").kendoChart({
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
										<?php for($n=0;$n<count($temp_type_value[$i]);$n++){?>
                                        <?php echo @$temp_type_value[$i][$n][$m]?>
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
								<?php for($p=0;$p<count($temp_answer_matrix_value[$i]);$p++){?>
								"<?php echo $temp_answer_matrix_value[$i][$p]?>",
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
            <?php }else if(@$_SESSION['temp_all'][$i]['type']=="matrix_multiple"){?>
			<script>
                    function createChart() {
                        $("#temp_matrix_multiple<?php echo $i?>").kendoChart({
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
								<?php for($m=0;$m<count($temp_ranking_multiple_value[$i]);$m++){?>
								{
									name: "<?php echo $temp_ranking_multiple_value[$i][$m]?>",
									data:
									[
										<?php for($n=0;$n<count($value_temp_matrix_multiple[$i]);$n++){?>
                                        <?php echo @$value_temp_matrix_multiple[$i][$n][$m]?>
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
								<?php for($p=0;$p<count($temp_answer_multiple_value[$i]);$p++){?>
								"<?php echo $temp_answer_multiple_value[$i][$p]?>",
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