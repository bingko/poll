<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This demo shows how you can easily customize the appearance and styling of Kendo UI Mobile Button to deliver rich experience for end users of the mobile app.">
    <title>รายชื่อแบบสอบถาม</title>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link href="http://cdn.kendostatic.com/2013.2.918/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="http://cdn.kendostatic.com/2013.2.918/styles/kendo.default.min.css" rel="stylesheet" />
    <link href="http://cdn.kendostatic.com/2013.2.918/styles/kendo.mobile.all.min.css" rel="stylesheet" />
    <link href="/content/shared/styles/telerik-navigation.css" rel="stylesheet" />
<script>var _gaq=[["_setAccount","UA-23480938-1"],["_setDomainName",".kendoui.com"],["_addIgnoredRef","kendoui.com"],["_trackPageview"]];(function(d,s){var g=d.createElement(s),e=d.getElementsByTagName(s)[0];g.src="//www.google-analytics.com/ga.js";e.parentNode.insertBefore(g,e);}(document,"script"))</script> 
    <link href="/content/shared/styles/examples.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://cdn.kendostatic.com/2013.2.918/js/kendo.all.min.js"></script>
    <script src="/content/shared/js/examples.js"></script>
    <script src="/content/shared/js/console.js"></script>
    <script src="/content/shared/js/prettify.js"></script>
    <script src="/content/shared/js/telerik-navigation.js"></script>
</head>
<body>
     <div data-role="view" data-title="รายชื่อแบบสอบถาม" class="buttonAppearance">
    <ul data-role="listview" data-type="group" data-style="inset">     
    <table id="grid" width="100%">
                <thead>
                    <tr>
                        <th data-field="titile" width="30%" ><div align="center">หัวข้อแบบสำรวจ</div></th>
                        <th data-field="category" width="15%"><div align="center">ประเภทแบบสำรวจ</div></th>
                        <th data-field="datetime" width="20%"><div align="center">ระยะเวลาสำรวจ</div></th>
                        <th data-field="count" width="5%"><div align="center">จำนวนผู้ตอบ</div></th>
                        <th data-field="manage" width="20%"><div align="center">จัดการสำรวจ</div></th>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr>
                        <td width="30%" >เร่ง พ.ร.บ. นิรโทษกรรม เสียงในอีสานยังก้ำกึ่ง ยังไม่มั่นใจสภาปฏิรูปการเมืองฯ</td>
                        <td width="15%">การเมือง</td>
                        <td width="20%">30-10-2013 ถึง 31-10-2013</td>
                        <td width="5%">75</td>
                        <td width="20%"><?php echo anchor('survey/form_survey','<input name="submit" type="submit" class="k-button" value="สำรวจ" />')?></td>
                    </tr>
                    <tr>
                        <td>ชาวอีสานชี้เศรษฐกิจไทยทรงกับทรุด กังวลวิกฤติเศรษฐกิจ</td>
                        <td>การเมือง</td>
                        <td>30-10-2013 ถึง 31-10-2013</td>
                        <td>30</td>
                        <td><?php echo anchor('survey/form_survey','<input name="submit" type="submit" class="k-button" value="สำรวจ" />')?></td>
                    </tr>
                    <tr>
                        <td>ข่าวพระฉาวทำให้คนอีสานศรัทธาต่อพระสงฆ์ลดลง เชื่อเณรคำปาราชิกแล้ว</td>
                        <td>การเมือง</td>
                        <td>30-10-2013 ถึง 31-10-2013</td>
                        <td>95</td>
                        <td><?php echo anchor('survey/form_survey','<input name="submit" type="submit" class="k-button" value="สำรวจ" />')?></td>
                    </tr>
                    <tr>
                        <td>ไตรมาส 3/56  ดัชนีความเชื่อมั่นภาคการผลิต SMEs ของอีสานทรุด</td>
                        <td>การเมือง</td>
                        <td>30-10-2013 ถึง 31-10-2013</td>
                        <td>14</td>
                        <td><?php echo anchor('survey/form_survey','<input name="submit" type="submit" class="k-button" value="สำรวจ" />')?></td>
                    </tr>
                </tbody>
		</table>
  
        <li>
                    <a data-role="button" style="font-size: 0.6em"><div align="center">ออกจากระบบ</div></a>
          </li>
     </ul>
    <style scoped>
        .buttonAppearance .km-button:not(.km-back)
        {
            width: 90%;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }
    </style>
</div>


<script>
    var app = new kendo.mobile.Application(document.body);
</script>
</body>
</html>