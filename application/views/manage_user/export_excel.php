<?php
$qh_title = @$question_subject[0]['qh_title'];
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="สมาชิกอีสานโพล.xls"');#ชื่อไฟล์
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />

<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>เพศ</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>ปีเกิด</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>อายุ</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>ที่อยู่</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>ภูมิภาค</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>จังหวัด</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>อำเภอ</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>ตำบล</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>เบอร์ติดต่อ</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>อีเมล์</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>การศึกษา</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>อาชีพ</strong></td>
    <td height="25" align="center" bgcolor="#CCCCCC"><strong>รายได้</strong></td>
  </tr>
  <?php foreach($respondent as $respondent){?>
  <tr>
    <td align="center"><?php if($respondent['sex']=='M'){echo "ผู้ชาย";}else{echo "ผู้หญิง";}?></td>
    <td align="center"><?php echo $respondent['birthyear']?></td>
    <td align="center">
	<?php
    	$birthyear = (date('Y')+543)-$respondent['birthyear'];
		if($birthyear != date('Y')+543)
		{
			echo $birthyear;
		}
	?> ปี
    </td>
    <td><?php echo $respondent['address']?></td>
    <td><?php echo $respondent['zone']?></td>
    <td><?php echo $respondent['PROVINCE_NAME']?></td>
    <td><?php echo $respondent['amphor']?></td>
    <td><?php echo $respondent['tambon']?></td>
    <td><?php echo $respondent['phone']?></td>
    <td><?php echo $respondent['mail']?></td>
    <td><?php echo $respondent['edu_bg']?></td>
    <td><?php echo $respondent['job']?></td>
    <td><?php echo $respondent['salary']?></td>
  </tr>
  <?php } ?>
</table>
