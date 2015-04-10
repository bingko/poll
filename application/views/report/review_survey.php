<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/popup.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/animetextstyle.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/all.min.js"></script>
<script src="<?php echo base_url()?>js/web.min.js"></script>
<script src="<?php echo base_url()?>js/console.js"></script>
<script src="<?php echo base_url()?>js/popup.js"></script>
<style type="text/css">
#tabbar {
 background-image:url(<?php echo base_url()?>images/header/gradient.png);
	background-size: cover;
	position: absolute;
	width: 100%;
	height: 95px;
	z-index: 1;
	left: 0;
	top: 0;
}
#tabbar_sub {
	background-color: #fecd16;
	position: absolute;
	width: 100%;
	height: 5px;
	z-index: 1;
	left: 0;
	top: 95px;
}
.table_radius {
	border: solid 2px #dbdcde;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	background-color: #fff;
}
.table_default {
	border: solid 1px #fbeed5;
	background-color: #fcf8e3;
	color: #c09853;
}
body {
	font-size: 13px;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: thaisanslite;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.survey_layer {
	border: dashed 1px #FF9900;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
}
.black_overlay {
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 200%;
	background-color: black;
	z-index: 1001;
	-moz-opacity: 0.8;
	opacity: .80;
	filter: alpha(opacity=80);
}
.white_content_title {
	display: none;
	position: absolute;
	top: 5%;
	left: 20%;
	width: 60%;
	height: 30%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color: #F8F8F8;
	z-index: 1002;
	overflow: auto;
}
.white_content_category {
	display: none;
	position: absolute;
	top: 5%;
	left: 20%;
	width: 60%;
	height: 30%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color: #F8F8F8;
	z-index: 1002;
	overflow: auto;
}
.white_content_question {
	display: none;
	position: fixed;
	top: 5%;
	left: 8%;
	width: 80%;
	height: 85%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color: #F8F8F8;
	z-index: 1002;
	overflow: auto;
}
.white_content_question_autopopup {
	position: fixed;
	top: 5%;
	left: 8%;
	width: 80%;
	height: 85%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color: #F8F8F8;
	z-index: 1002;
	overflow: auto;
}
.black_overlay_autopopup {
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 200%;
	background-color: black;
	z-index: 1001;
	-moz-opacity: 0.8;
	opacity: .80;
	filter: alpha(opacity=80);
}
</style>
<body onLoad="window.print();">
<?php @session_start(); $all_session = $this->session->all_userdata();?>
<!--ตัวแปร รับค่า session ทั้งหมด-->
<table width="100%">
  <tr>
    <td align="center"><div style="position:absolute;top:5px;left:10px;"> <img src="<?php echo base_url()?>images/header/logo.png" width="150" /></div>
      <p align="center">
      
      <div style="font-size:24px;"><strong>ECBER RESEARCH</strong></div>
      <br />
      <div style="font-size:14px;">ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน คณะวิทยาการจัดการ มหาวิทยาลัยขอนแก่น<br />
        เลขที่ 123 ถ.มิตรภาพ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40002  โทร.0-4320-2566 &nbsp;เว็บไซต์ www.ecberkku.com</div>
      </p></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_radius">
  <tr>
    <td valign="top"><table width="90%" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td height="35" align="center"><strong>หัวข้อแบบสอบถาม <?php echo $all_session['heading']['title']?><br>
            ประเภทแบบสอบถาม <?php echo @$survey_category_session[0]['sc_name']?><br>
            รายละเอียดแบบสอบถาม <?php echo $all_session['heading']['detail']?> </strong></td>
        </tr>
      </table>
      <hr>
      <table width="90%" align="center" cellpadding="2" cellspacing="2" class="">
        <tr>
          <td colspan="2"><?php for ($i = 0; $i < count(@$_SESSION['data_respondent']); $i++){?>
            <?php if(@$_SESSION['data_respondent'][$i]==1){?>
            <p><strong>เพศ</strong>
              <input name="" type="radio" value="" />
              ชาย
              <input name="" type="radio" value="" />
              หญิง</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==2){?>
            <p><strong>อายุ</strong>
              <select name="2" id="2" class="k-textbox" style="height:30px;width:80px;" required validationMessage="">
                <option value=""></option>
                <?php for($n=17;$n<71;$n++){?>
                <option value="<?php echo $n ;?>"><?php echo $n ;?></option>
                <?php } ?>
              </select>
              ปี</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==3){?>
            <strong>อาชีพ</strong>
            <table width="750">
              <tr>
                <td><input name="" type="radio" />
                  รับราชการ / พนักงานรัฐวิสาหกิจ</td>
                <td><input name="" type="radio" />
                  นักเรียน / นักศึกษา</td>
                <td><input name="" type="radio" />
                  พนักงานบริษัทเอกชน</td>
                <td><input name="" type="radio" />
                  ค้าขาย / ธุรกิจส่วนตัว</td>
              </tr>
              <tr>
                <td><input name="" type="radio" />
                  รับจ้างทั่วไป/ใช้แรงงาน</td>
                <td><input name="" type="radio" />
                  พ่อบ้าน/แม่บ้าน</td>
                <td><input name="" type="radio" />
                  เกษตรกรรม</td>
                <td><input name="" type="radio" />
                  อื่นๆ</td>
              </tr>
            </table>
            <?php }if(@$_SESSION['data_respondent'][$i]==4){?>
            <strong>รายได้ส่วนตัวเฉลี่ยต่อเดือน</strong>
            <table width="750">
              <tr>
                <td><input name="" type="radio" />
                  ไม่เกิน 5,000 บาท</td>
                <td><input name="" type="radio" />
                  5,001 - 10,000 บาท</td>
                <td><input name="" type="radio" />
                  10,001 - 15,000 บาท</td>
              </tr>
              <tr>
                <td><input name="" type="radio" />
                  15,001 - 20,000 บาท</td>
                <td><input name="" type="radio" />
                  20,001 - 40,000 บาท</td>
                <td><input name="" type="radio" />
                  มากกว่า 40,001 บาทขึ้นไป</td>
              </tr>
            </table>
            <?php }if(@$_SESSION['data_respondent'][$i]==5){?>
            <strong>การศึกษา</strong>
            <table width="750">
              <tr>
                <td><input name="" type="radio" />
                  ประถมศึกษา / หรือต่ำกว่า</td>
                <td><input name="" type="radio" />
                  มัธยมศึกษาตอนต้น</td>
                <td><input name="" type="radio" />
                  มัธยมศึกษาตอนปลาย / ปวช.</td>
              </tr>
              <tr>
                <td><input name="" type="radio" />
                  อนุปริญญา / ปวส.</td>
                <td><input name="" type="radio" />
                  ปริญญาตรี</td>
                <td><input name="" type="radio" />
                  ปริญญาโท / ปริญญาเอก</td>
              </tr>
            </table>
            <?php }if(@$_SESSION['data_respondent'][$i]==6){?>
            <p><strong>สถานะภาพ</strong>
              <input name="" type="radio" />
              โสด
              <input name="" type="radio" />
              แต่งงานแล้ว
              <input name="" type="radio" />
              แยกกันอยู่
              <input name="" type="radio" />
              อย่าร้าง</p>
            <?php }if(@$_SESSION['data_respondent'][$i]==7){?>
            <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       } 
                  }
             };
             req.open("GET", "<?php echo base_url()?>index.php/history/localtion?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('province', -1);     
    </script>
            <p><strong>จังหวัด</strong>&nbsp;&nbsp; <span id="province">
              <select name="province" id="province">
                <option value='0'></option>
              </select>
              </span> 
              <!--<select name="province" id="province" style="height:30px;width:200px;">
                <option value=""></option>
                <?php for($n=0;$n<count($province);$n++){?>
                <option value="<?php echo $province[$n]['PROVINCE_ID']?>"><?php echo $province[$n]['PROVINCE_NAME']?></option>
                <?php } ?>
              </select>--> 
            </p>
            <strong>อำเภอ</strong>&nbsp;&nbsp; <span id="amphur"></span>
            <?php } ?>
            <?php } ?></td>
        </tr>
        
          <td height="35"><table width="100%" align="center">
              <?php for($i=0;$i<count(@$_SESSION['temp_all']);$i++){?>
              <?php 
        /*********************** เงื่อนไขของ mulitiple_only ***********************/
      if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_only"){ 
        if(@$_SESSION['temp_all'][$i]['check_mulitiple_only']!=""){$mark_mulitiple_only = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'>";
        echo @$mark_mulitiple_only."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_mulitiple_only']."</strong>";
        echo "</td></tr><tr><td><br>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($a=0;$a<count($arr);$a++){
        echo "<input name='other_mulitiple_only' id='other_mulitiple_only' type='radio' value='' />";
        echo $arr[$a]."<br>";}
        if(@$_SESSION['temp_all'][$i]['other_mulitiple_only']!=""){
        echo "<input name='other_mulitiple_only' id='other_mulitiple_only' type='radio' value='' />
        <input name='open_mulitiple_only' id='open_mulitiple_only' type='text' class='k-textbox' />";}
        echo "<br><hr style='border:solid 1px #000000;'>";
        echo "</td></tr>";
      
        /*********************** เงื่อนไขของ mulitiple_multiple ***********************/
      }else if(@$_SESSION['temp_all'][$i]['type']=="mulitiple_multiple"){
        if(@$_SESSION['temp_all'][$i]['check_mulitiple_multiple']!=""){$mark_mulitiple_multiple = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
        echo @$mark_mulitiple_multiple."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_mulitiple_multiple']."</strong>";
        echo "</td></tr><tr><td><br>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($a=0;$a<count($arr);$a++){
        echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />";
        echo $arr[$a]."<br>";}
        if(@$_SESSION['temp_all'][$i]['other_mulitiple_multiple']!=""){
        echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />
        <input name='open_mulitiple_multiple' id='open_mulitiple_multiple' type='text' class='k-textbox' />";}
        echo "<br><hr style='border:solid 1px #000000;'>";
        echo "</td></tr>";
            
        /*********************** เงื่อนไขของ comment ***********************/
      }else if(@$_SESSION['temp_all'][$i]['type']=="comment"){ 
        if(@$_SESSION['temp_all'][$i]['check_comment']!=""){$mark_comment = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
        echo @$mark_comment."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['comment']."</strong>";
        echo "</td></tr><tr><td><br>";
        echo "<textarea name='' id='' style='width:75%; height:80px;' class='k-textbox'></textarea>"."<br><hr style='border:solid 1px #000000;'>";
              echo "</td></tr>";
        
        /*********************** เงื่อนไขของ ranking ***********************/
      }else if(@$_SESSION['temp_all'][$i]['type']=="ranking"){
        if(@$_SESSION['temp_all'][$i]['check_ranking']!=""){$mark_ranking = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
        echo @$mark_ranking."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_ranking']."</strong>";
        echo "</td></tr><tr><td><br>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($k=0;$k<count($arr);$k++){
        echo "<p>"."<input name='answer_ranking[]' id='answer_ranking[]' type='number' class='k-textbox' style='width:50px;' min='1' />"." ".$arr[$k]."</p>";}
        echo "<br><hr style='border:solid 1px #000000;'>";
        echo "</td></tr>";
      
        /*********************** เงื่อนไขของ ranking_scale ***********************/
      }else if(@$_SESSION['temp_all'][$i]['type']=="ranking_scale"){ 
        if(@$_SESSION['temp_all'][$i]['check_ranking_scale']!=""){$mark_ranking_scale = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
        echo @$mark_ranking_scale."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_ranking_scale']."</strong>";
        echo "</td></tr><tr><td>";
        echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($a=0;$a<count($arr);$a++){
        echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$a]."</td>";}
        echo "</tr>";
          $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
        $answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($m=0;$m<count($answer_ranking_scale);$m++){
        echo "<tr><td bgcolor='#F4F4F4'>".$answer_ranking_scale[$m]."</td>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($b=0;$b<count($arr);$b++){
        echo "<td bgcolor='#F4F4F4' align='center' ><input name='ranking_scale".$m."[]' type='radio' value='".$b."' /></td>";}
        echo "</tr>";}
        echo "</table>"."<br><hr style='border:solid 1px #000000;'>";   
        echo "</td></tr>";
            
        /*********************** เงื่อนไขของ matrix_only ***********************/
      }else if(@$_SESSION['temp_all'][$i]['type']=="matrix_only"){
        if(@$_SESSION['temp_all'][$i]['check_matrix_only']!=""){$mark_matrix_only = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
        echo @$mark_matrix_only."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_matrix_only']."</strong>";
        echo "</td></tr><tr><td>";
        echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($m=0;$m<count($arr);$m++){
        echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
        echo "</tr>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
        $answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($k=0;$k<count($answer_matrix_only);$k++){
        echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_only[$k]."</td>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($n=0;$n<count($arr);$n++){
        echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='radio' /></td>";}
        echo "</tr>";}
        echo "</table>"."<br><hr style='border:solid 1px #000000;'>";
        echo "</td></tr>";
        
        /*********************** เงื่อนไขของ matrix_multiple ***********************/
            }else if(@$_SESSION['temp_all'][$i]['type']=="matrix_multiple"){ 
        if(@$_SESSION['temp_all'][$i]['check_matrix_multiple']!=""){$mark_matrix_multiple = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
        echo @$mark_matrix_multiple."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_matrix_multiple']."</strong>";
        echo "</td></tr><tr><td>";
        echo "<table width='100%' cellpadding='2' cellspacing='2'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($m=0;$m<count($arr);$m++){
        echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
        echo "</tr>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
        $answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($k=0;$k<count($answer_matrix_multiple);$k++){
        echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_multiple[$k]."</td>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($n=0;$n<count($arr);$n++){
        echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='checkbox' /></td>";}
        echo "</tr>";}
        echo "</table>"."<br><hr style='border:solid 1px #000000;'>";
        echo "</td></tr>";
        
        /*********************** เงื่อนไขของ single_textbox ***********************/
      }else if(@$_SESSION['temp_all'][$i]['type']=="single_textbox"){ 
        if(@$_SESSION['temp_all'][$i]['check_single_textbox']!=""){@$mark_single_textbox = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
        echo @$mark_single_textbox."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_single_textbox']."</strong>";
        echo "</td></tr><tr><td><br>";
        echo "<input name='answer_single_textbox' id='answer_single_textbox' class='k-textbox'>"."<br><hr style='border:solid 1px #000000;'>";
        echo "</td></tr>";
            
        /*********************** เงื่อนไขของ mulitple_textbox ***********************/
      }else if(@$_SESSION['temp_all'][$i]['type']=="mulitple_textbox"){
        if(@$_SESSION['temp_all'][$i]['check_mulitple_textbox']!=""){$mark_mulitple_textbox = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
        echo @$mark_mulitple_textbox."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_mulitple_textbox']."</strong>";
        echo "</td></tr><tr><td><br>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_mulitple_textbox']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($k=0;$k<count($arr);$k++){
        echo "<p>"." ".$arr[$k]."<br><input name='answer_mulitple_textbox' id='answer_mulitple_textbox' class='k-textbox'>"."</p>";}
        echo "<br><hr style='border:solid 1px #000000;'>";
        echo "</td></tr>";
              
        /*********************** เงื่อนไขของ date_time ***********************/
      }else if(@$_SESSION['temp_all'][$i]['type']=="date_time"){
        if(@$_SESSION['temp_all'][$i]['check_date_time']!=""){$mark_date_time = "<span style='color:red;'>*</span>";}
        echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
        echo @$mark_date_time."<strong style='font-size:18px;'>".@$_SESSION['temp_all'][$i]['question_date_time'];
        echo "</td></tr><tr><td><br>";
        $date = str_replace("\n","/",@$_SESSION['temp_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
        $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
        for($k=0;$k<count($arr);$k++){
        echo "<p>"." ".$arr[$k]."<br><input name='answer_date".$k."' id='answer_date".$k."'> <input name='answer_time".$k."' id='answer_time".$k."' ></p>";}
        echo "<br><hr style='border:solid 1px #000000;'>";  
        echo "</td></tr>";      
            }?>
              <?php } ?>
            </table></td>
        </tr>
        <tr></tr>
      </table>
      
      <!-- สิ้นสดพื้นที่แทรก temp -->
      
      <div id="light_category" class="white_content_title" align="left"> <?php echo form_open('ci_manage_survey/list_check_category_update')?>
        <?php for ($i = 0; $i < count(@$_SESSION['data_respondent']); $i++){?>
        <?php 
            if(@$_SESSION['data_respondent'][$i]==1){
                $respondent1 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==2){
                $respondent2 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==3){
                $respondent3 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==4){
                $respondent4 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==5){
                $respondent5 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==6){
                $respondent6 = 'checked="checked"';
            }if(@$_SESSION['data_respondent'][$i]==7){
                $respondent7 = 'checked="checked"';
            }?>
        <?php } ?>
        <table width="90%" align="center" cellpadding="2" cellspacing="2">
          <tr>
            <td height="35" colspan="6"><h1>ข้อมูลทั่วไปของผู้ตอบ</h1></td>
          </tr>
          <tr>
            <td height="35"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="1" <?php echo @$respondent1?>/></td>
            <td>เพศ</td>
            <td><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="2" <?php echo @$respondent2?>/></td>
            <td>อายุ</td>
            <td><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="3" <?php echo @$respondent3?>/></td>
            <td>อาชีพ</td>
          </tr>
          <tr>
            <td height="35"><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="4" <?php echo @$respondent4?>/></td>
            <td>รายได้</td>
            <td><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="5" <?php echo @$respondent5?>/></td>
            <td>การศึกษา</td>
            <td><input name="data_respondent[]" type="checkbox" id="data_respondent[]" value="6" <?php echo @$respondent6?>/></td>
            <td height="35">สถานะภาพ</td>
          </tr>
          <tr>
            <td height="35" valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td height="35">&nbsp;</td>
          </tr>
          <tr>
            <td height="35" colspan="6" align="right"><input name="Submit2" type="submit" value="บันทึก" class="k-button" style="width:100px;"/>
              <a href = "javascript:void(0)" onclick = "document.getElementById('light_category').style.display='none';document.getElementById('fade').style.display='none'">
              <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:100px;"/>
              </a></td>
          </tr>
        </table>
        <?php echo form_close()?> </div>
      <p></p>
      <table width="95%" align="center" cellpadding="2" cellspacing="2" class="">
        <tr></tr>
        <tr>
          <td height="35"><table width="100%" align="center">
              <?php for($i=0;$i<count(@$_SESSION['qa_all']);$i++){?>
              <?php 
                /*********************** เงื่อนไขของ mulitiple_only ***********************/
            if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_only"){ 
                if(@$_SESSION['qa_all'][$i]['check_mulitiple_only']!=""){$mark_mulitiple_only = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_mulitiple_only."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_only']."</strong>";
                echo "</td></tr><tr><td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_only']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($a=0;$a<count($arr);$a++){
                echo "<input name='other_mulitiple_only' id='other_mulitiple_only' type='radio' value='' />";
                echo $arr[$a]."<br>";}
                if(@$_SESSION['qa_all'][$i]['other_mulitiple_only']!=""){
                echo "<input name='other_mulitiple_only' id='other_mulitiple_only' type='radio' value='' />
                <input name='open_mulitiple_only' id='open_mulitiple_only' type='text' class='k-textbox' />";}
                echo "<br><hr style='border:solid 1px #000000;'>";
                echo "</td></tr>";
            
                /*********************** เงื่อนไขของ mulitiple_multiple ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="mulitiple_multiple"){
                if(@$_SESSION['qa_all'][$i]['check_mulitiple_multiple']!=""){$mark_mulitiple_multiple = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_mulitiple_multiple."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitiple_multiple']."</strong>";
                echo "</td></tr><tr><td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitiple_multiple']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($a=0;$a<count($arr);$a++){
                echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />";
                echo $arr[$a]."<br>";}
                if(@$_SESSION['qa_all'][$i]['other_mulitiple_multiple']!=""){
                echo "<input name='other_mulitiple_multiple' id='other_mulitiple_multiple' type='checkbox' value='' />
                <input name='open_mulitiple_multiple' id='open_mulitiple_multiple' type='text' class='k-textbox' />";}
                echo "<br><hr style='border:solid 1px #000000;'>";
                echo "</td></tr>";
            
                /*********************** เงื่อนไขของ comment ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="comment"){ 
                if(@$_SESSION['qa_all'][$i]['check_comment']!=""){$mark_comment = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_comment."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['comment']."</strong>";
                echo "</td></tr><tr><td>";
                echo "<textarea name='' id='' style='width:75%; height:80px;' class='k-textbox'></textarea>"."<br><hr style='border:solid 1px #000000;'>";
                echo "</td></tr>";
                
                /*********************** เงื่อนไขของ ranking ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="ranking"){
                if(@$_SESSION['qa_all'][$i]['check_ranking']!=""){$mark_ranking = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_ranking."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking']."</strong>";
                echo "</td></tr><tr><td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($k=0;$k<count($arr);$k++){
                echo "<p>"."<input name='answer_ranking[]' id='answer_ranking[]' type='number' class='k-textbox' style='width:50px;' min='1' />"." ".$arr[$k]."</p>";}
                echo "<br><hr style='border:solid 1px #000000;'>";
                echo "</td></tr>";
            
                /*********************** เงื่อนไขของ ranking_scale ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="ranking_scale"){ 
                if(@$_SESSION['qa_all'][$i]['check_ranking_scale']!=""){$mark_ranking_scale = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_ranking_scale."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_ranking_scale']."</strong>";
                echo "</td></tr><tr><td>";
                echo "<table border='1' width='100%' cellpadding='0' cellspacing='0'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($a=0;$a<count($arr);$a++){
                echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$a]."</td>";}
                echo "</tr>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_ranking_scale']);//เปลี่ยนจาก \n เป็น /
                $answer_ranking_scale = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($m=0;$m<count($answer_ranking_scale);$m++){
                echo "<tr><td bgcolor='#F4F4F4'>".$answer_ranking_scale[$m]."</td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_scale_weight']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($b=0;$b<count($arr);$b++){
                echo "<td bgcolor='#F4F4F4' align='center' ><input name='ranking_scale".$m."[]' type='radio' value='".$b."' /></td>";}
                echo "</tr>";}
                echo "</table>"."<br><hr style='border:solid 1px #000000;'>";       
                echo "</td></tr>";
                        
                /*********************** เงื่อนไขของ matrix_only ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_only"){
                if(@$_SESSION['qa_all'][$i]['check_matrix_only']!=""){$mark_matrix_only = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_matrix_only."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_only']."</strong>";
                echo "</td></tr><tr><td>";
                echo "<table border='1' width='100%' cellpadding='0' cellspacing='0'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($m=0;$m<count($arr);$m++){
                echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
                echo "</tr>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_only']);//เปลี่ยนจาก \n เป็น /
                $answer_matrix_only = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($k=0;$k<count($answer_matrix_only);$k++){
                echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_only[$k]."</td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_only']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($n=0;$n<count($arr);$n++){
                echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='radio' /></td>";}
                echo "</tr>";}
                echo "</table>"."<br><hr style='border:solid 1px #000000;'>";
                echo "</td></tr>";
                
                /*********************** เงื่อนไขของ matrix_multiple ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="matrix_multiple"){ 
                if(@$_SESSION['qa_all'][$i]['check_matrix_multiple']!=""){$mark_matrix_multiple = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_matrix_multiple."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_matrix_multiple']."</strong>";
                echo "</td></tr><tr><td>";
                echo "<table border='1' width='100%' cellpadding='0' cellspacing='0'><tr><td bgcolor='#F4F4F4' width='50%'>&nbsp;</td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($m=0;$m<count($arr);$m++){
                echo "<td bgcolor='#F4F4F4' align='center'>".$arr[$m]."</td>";}
                echo "</tr>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
                $answer_matrix_multiple = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($k=0;$k<count($answer_matrix_multiple);$k++){
                echo "<tr><td bgcolor='#F4F4F4'>".$answer_matrix_multiple[$k]."</td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['ranking_matrix_multiple']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($n=0;$n<count($arr);$n++){
                echo "<td bgcolor='#F4F4F4' align='center'><input name='ranking_scale[]' type='checkbox' /></td>";}
                echo "</tr>";}
                echo "</table>"."<br><hr style='border:solid 1px #000000;'>";
                echo "</td></tr>";
                
                /*********************** เงื่อนไขของ single_textbox ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="single_textbox"){ 
                if(@$_SESSION['qa_all'][$i]['check_single_textbox']!=""){@$mark_single_textbox = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_single_textbox."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_single_textbox']."</strong>";
                echo "</td></tr><tr><td>";
                echo "<input name='answer_single_textbox' id='answer_single_textbox' class='k-textbox'>"."<br><hr style='border:solid 1px #000000;'>";
                echo "</td></tr>";
                        
                /*********************** เงื่อนไขของ mulitple_textbox ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="mulitple_textbox"){
                if(@$_SESSION['qa_all'][$i]['check_mulitple_textbox']!=""){$mark_mulitple_textbox = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_mulitple_textbox."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_mulitple_textbox']."</strong>";
                echo "</td></tr><tr><td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_mulitple_textbox']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($k=0;$k<count($arr);$k++){
                echo "<p>"." ".$arr[$k]."<br><input name='answer_mulitple_textbox' id='answer_mulitple_textbox' class='k-textbox'>"."</p>";}
                echo "<br><hr style='border:solid 1px #000000;'>";
                echo "</td></tr>";
                            
                /*********************** เงื่อนไขของ date_time ***********************/
            }else if(@$_SESSION['qa_all'][$i]['type']=="date_time"){
                if(@$_SESSION['qa_all'][$i]['check_date_time']!=""){$mark_date_time = "<span style='color:red;'></span>";}
                echo "<tr><td bgcolor='#CCCCCC'><strong style='font-size:18px;'>คำถาม :&nbsp;&nbsp;</strong>";
                echo @$mark_date_time."<strong style='font-size:18px;'>".@$_SESSION['qa_all'][$i]['question_date_time'];
                echo "</td></tr><tr><td>";
                $date = str_replace("\n","/",@$_SESSION['qa_all'][$i]['answer_date_time']);//เปลี่ยนจาก \n เป็น /
                $arr = @split('/',$date);//ตัด array โดยหา data จาก สัญลักษณ์ /
                for($k=0;$k<count($arr);$k++){
                echo "<p>"." ".$arr[$k]."<br><input name='answer_date".$k."' id='answer_date".$k."'> <input name='answer_time".$k."' id='answer_time".$k."' ></p>";}
                echo "<br><hr style='border:solid 1px #000000;'>";  
                echo "</td></tr>";          
            }?>
              <?php } ?>
            </table></td>
        </tr>
        <tr></tr>
      </table>
      <p>&nbsp;</p>
      <div id="light_question" class="white_content_question" align="left"> 
        <script>
    function showPage(showdiv){
        $('#midRight > div').hide()  
        $(showdiv).show();    
    }
    </script>
        <table width="100%" align="center" class="table_radius">
          <tr>
            <td width="30%" valign="top" bgcolor="#d2dbde" style="-moz-border-radius: 5px;-webkit-border-radius: 5px;border-radius: 5px;"><p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page1')"><img src="<?php echo base_url()?>images/icon_menu/icon_1.png" width="15"/> Mulitiple Choice (Only One Answer)</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page2')"><img src="<?php echo base_url()?>images/icon_menu/icon_2.png" width="15"/> Mulitiple Choice (Multiple Answer)</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page3')"><img src="<?php echo base_url()?>images/icon_menu/icon_3.png" width="15"/> Comment</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page4')"><img src="<?php echo base_url()?>images/icon_menu/icon_4.png" width="15"/> Ranking</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page5')"><img src="<?php echo base_url()?>images/icon_menu/icon_5.png" width="15"/> Ranking Scale</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page6')"><img src="<?php echo base_url()?>images/icon_menu/icon_6.png" width="15"/> Matrix of Choice (Only One Answer)</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page7')"><img src="<?php echo base_url()?>images/icon_menu/icon_7.png" width="15"/> Matrix of Choice (Multiple Answer)</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page8')"><img src="<?php echo base_url()?>images/icon_menu/icon_8.png" width="15"/> Single Textboxes</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page9')"><img src="<?php echo base_url()?>images/icon_menu/icon_9.png" width="15"/> Mulitple Textboxes</a> </p>
              <p>&nbsp; <a style="cursor:pointer;" onClick="showPage('#home_page10')"><img src="<?php echo base_url()?>images/icon_menu/icon_10.png" width="15"/> Date and Time</a> </p></td>
            <td width="70%" valign="top"><div id="midRight">
                <div id="home_page1" style="display:none;"> <?php echo form_open('ci_manage_survey/mulitiple_only')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ประเภท Mulitiple Choice (Only One Answer)</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_mulitiple_only" id="question_mulitiple_only" type="text" class="k-textbox" style="width:80%" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td><textarea name="answer_mulitiple_only" id="answer_mulitiple_only" class="k-textbox" style="width:70%; height:200px;"></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_mulitiple_only" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_mulitiple_only" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page2" style="display:none;"> <?php echo form_open('ci_manage_survey/mulitiple_multiple')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ประเภท Mulitiple Choice (Multiple Answer)</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_mulitiple_multiple" id="question_mulitiple_multiple" type="text" class="k-textbox" style="width:80%" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td><textarea name="answer_mulitiple_multiple" id="answer_mulitiple_multiple" class="k-textbox" style="width:70%; height:200px;"></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_mulitiple_multiple" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_mulitiple_multiple" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page3" style="display:none;"> <?php echo form_open('ci_manage_survey/comment')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ประเภท Comment</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="comment" id="comment" type="text" class="k-textbox" style="width:80%;" /></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_comment" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page4" style="display:none;"> <?php echo form_open('ci_manage_survey/ranking')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ประเภท Ranking</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_ranking" id="question_ranking" type="text" class="k-textbox" style="width:80%" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td><textarea name="answer_ranking" id="answer_ranking" class="k-textbox" style="width:70%; height:200px;"></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_ranking" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_ranking" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page5" style="display:none;"> <?php echo form_open('ci_manage_survey/ranking_scale')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ประเภท Ranking Scale</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_ranking_scale" id="question_ranking_scale" type="text" class="k-textbox" style="width:80%" /></td>
                    </tr>
                    <tr>
                      <td><strong>รายละเอียด</strong></td>
                    </tr>
                    
                      <td width="70%" ><textarea name="answer_ranking_scale" id="answer_ranking_scale" cols="35" rows="8" class="k-textbox" style="width:100%;"></textarea></td>
                    </tr>
                    <tr>
                      <td><strong>เกณฑ์</strong></td>
                    </tr>
                    <tr>
                      <td width="70%"><textarea name="ranking_scale" id="ranking_scale" cols="35" rows="8" class="k-textbox" style="width:100%;"></textarea></td>
                    </tr>
                    <tr>
                      <td><strong>ค่าน้ำหนัก</strong></td>
                    </tr>
                    <tr>
                      <td width="70%"><textarea name="ranking_scale_weight" id="ranking_scale_weight" cols="35" rows="8" class="k-textbox" style="width:100%;"></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_ranking_scale" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_ranking_scale" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page6" style="display:none;"> <?php echo form_open('ci_manage_survey/matrix_only')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ประเภท Matrix of Choice (Only One Answer)</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_matrix_only" id="question_matrix_only" type="text" class="k-textbox" style="width:80%" /></td>
                    </tr>
                    <tr>
                      <td></td>
                    <tr>
                      <td width="70%" >ตัวเลือกแนวตั้ง<br />
                        <textarea name="answer_matrix_only" id="answer_matrix_only" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea></td>
                    </tr>
                    <tr>
                      <td width="70%" >ตัวเลือกแนวนอน<br />
                        <textarea name="ranking_matrix_only" id="ranking_matrix_only" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_matrix_only" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_matrix_only" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page7" style="display:none;"> <?php echo form_open('ci_manage_survey/matrix_multiple')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ประเภท Matrix of Choice (Multiple Answer)</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_matrix_multiple" id="question_matrix_multiple" type="text" class="k-textbox" style="width:80%" /></td>
                    </tr>
                    <tr>
                      <td></td>
                    <tr>
                      <td width="70%" >ตัวเลือกแนวตั้ง<br />
                        <textarea name="answer_matrix_multiple" id="answer_matrix_multiple" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea></td>
                    </tr>
                    <tr>
                      <td width="70%" >ตัวเลือกแนวนอน<br />
                        <textarea name="ranking_matrix_multiple" id="ranking_matrix_multiple" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_matrix_multiple" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_matrix_multiple" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page8" style="display:none;"> <?php echo form_open('ci_manage_survey/single_textbox')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ปรเภท Single Textboxes</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_single_textbox" id="question_single_textbox" type="text" class="k-textbox" style="width:80%" /></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_single_textbox" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_single_textbox" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page9" style="display:none;"> <?php echo form_open('ci_manage_survey/mulitple_textbox')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ประเภท Mulitple Textboxes</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_mulitple_textbox" id="question_mulitple_textbox" type="text" class="k-textbox" style="width:80%" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    <tr>
                      <td width="70%" ><textarea name="answer_mulitple_textbox" id="answer_mulitple_textbox" cols="45" rows="10" class="k-textbox" style="width:100%;"></textarea></td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="other_mulitple_textbox" type="checkbox" value="other" />
                        เพิ่มคำตอบเอง</td>
                    </tr>
                    <tr>
                      <td class="table_default"><input name="check_mulitple_textbox" type="checkbox" value="check" />
                        บังคับให้ตอบคำถามนี้</td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
                <div id="home_page10" style="display:none;"> <?php echo form_open('ci_manage_survey/date_time')?>
                  <p>
                  <table width="90%" align="center">
                    <tr>
                      <td><strong>ประเภท Date and Time</strong></td>
                    </tr>
                    <tr>
                      <td><strong>คำถาม</strong></td>
                    </tr>
                    <tr>
                      <td><input name="question_date_time" id="question_date_time" type="text" class="k-textbox" style="width:80%" /></td>
                    </tr>
                    <tr>
                      <td><strong>คำตอบ</strong></td>
                    </tr>
                    
                      <td width="70%" ><textarea name="answer_date_time" id="answer_date_time" class="k-textbox" cols="45" rows="10" style="width:100%;"></textarea></td>
                    </tr>
                    <tr>
                      <td><input name="submit" id="submit" type="submit" value=" บันทึก " class="k-button" style="width:150px;"/></td>
                    </tr>
                  </table>
                  </p>
                  <?php echo form_close()?> </div>
              </div></td>
          </tr>
        </table>
        <table width="100%">
          <tr>
            <td align="right"><a href = "javascript:void(0)" onclick = "document.getElementById('light_question').style.display='none';document.getElementById('fade').style.display='none'">
              <input type="reset" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>
              </a></td>
          </tr>
        </table>
      </div>
      <p> </p></td>
  </tr>
</table>
</body>
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
                $("#answer_date<?php echo $k;?>").kendoDatePicker();

              });
            $(document).ready(function () {
                // create TimePicker from input HTML element
                $("#answer_time<?php echo $k;?>").kendoTimePicker();
              });


        </script>
<?php }}} ?>
<SCRIPT LANGUAGE="Javascript"><!-- 
function printWindow(){ 
browserVersion = parseInt(navigator.appVersion) 
if (browserVersion >= 4) window.print() 
} 
//--></SCRIPT>
