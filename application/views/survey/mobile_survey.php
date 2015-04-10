<title>ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน โปรแกรมแบบสำรวจข้อมูลภาคตะวันออกเฉียงเหนือ</title>

<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/mobile.all.min.css" rel="stylesheet" />

<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/all.min.js"></script>


<div data-role="view" id="drawer-home" data-layout="drawer-layout" data-title="ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน โปรแกรมแบบสำรวจข้อมูลภาคตะวันออกเฉียงเหนือ">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_default">
  <tr>
    <td height="50">
    <div><h2>ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน โปรแกรมแบบสำรวจข้อมูลภาคตะวันออกเฉียงเหนือ</h2></div>
    </td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table_radius">
      <tr>
        <td>
        <div id="grid_table">
        <table id="grid">
                <thead>
                    <tr>
                        <th data-field="qh_title"><div align="center">หัวข้อแบบสำรวจ</div></th>
                        <th data-field="qh_category"><div align="center">ประเภทแบบสำรวจ</div></th>
                        <th data-field="qh_createdate"><div align="center">วันที่สร้างแบบสำรวจ</div></th>
                        <th data-field="qh_date"><div align="center">ระยะเวลาสำรวจ</div></th>
                        <th data-field="qh_count"><div align="center">จำนวนผู้ตอบ</div></th>
                        <th data-field="qh_url"><div align="center">จัดการสำรวจ</div></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($survey_list as $survey_list){?>
                    <tr>
                        <td><?php echo $survey_list['qh_title']?></td>
                        <td><?php echo $survey_list['sc_name']?></td>
                        <td><?php echo $survey_list['qh_createdate']?></td>
                        <td><?php echo $survey_list['qh_startdate']?> ถึง <?php echo $survey_list['qh_enddate']?></td>
                        <td>&nbsp;</td>
                        <td><?php echo anchor('ci_manage_survey/select_survey_db/'.$survey_list['qh_id'].'','<input name="submit" type="submit" class="k-button" value="สำรวจ" style="width:150px;"/>')?></td>
                    </tr>
                <?php } ?>
                </tbody>
		</table>
        </div>
        </td>
      </tr>
    </table>
<script>
                $(document).ready(function() {
                    $("#grid").kendoGrid({
                        //height: 430,
                        //sortable: true
						columns: [
                            { field:"qh_title", title: "หัวข้อแบบสำรวจ"},
                            { field: "qh_category", title:"ประเภทแบบสำรวจ", width: "15%" },
                            { field: "qh_createdate", title:"วันที่สร้างแบบสำรวจ", width: "10%" },
                            { field: "qh_date", title:"ระยะเวลาสำรวจ", width: "15%"  },
                            { field: "qh_count", title:"จำนวนผู้ตอบ", width: "7%"  },
							{ field: "qh_url", title:"จัดการสำรวจ", width: "14%"  }],
                    });
                });
	</script>
</div>
<div data-role="view" id="drawer-logout" data-layout="drawer-layout" data-title="ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน โปรแกรมแบบสำรวจข้อมูลภาคตะวันออกเฉียงเหนือ" align="center">
    <P>&nbsp;</P>
    <P>&nbsp;</P>
    <P>&nbsp;</P>
    <h1><?php echo anchor('ci_login/logout','ออกจากระบบ')?></h1>
</div>
<div data-role="drawer" id="my-drawer" style="width: 270px" data-views="['/', 'drawer-home','drawer-logout','/mobile/m/drawer/index.html']">
    <ul data-role="listview" data-type="group">
        <li>Menu
            <ul>
                <li><a href="#drawer-home">รายการแบบสำรวจ</a></li>
                <li><a href="#drawer-logout">ออกจากระบบ</a></li>
            </ul>
        </li>
    </ul>
</div>

<div data-role="layout" data-id="drawer-layout">
    <header data-role="header">
        <div data-role="navbar">
            <a data-role="button" data-rel="drawer" href="#my-drawer" data-align="left"><img src="<?php echo base_url()?>images/icon_menu/icon_1.png" width="15" height="15" /></a>
        </div>
    </header>
</div>

<script>
    // reset global drawer instance, for demo purposes
    kendo.mobile.ui.Drawer.current = null;
</script>

<style>
    .km-ios #my-drawer .km-content, .km-android #my-drawer .km-content, .km-blackberry #my-drawer .km-content,
    .km-ios #my-drawer .km-list > li, .km-android #my-drawer .km-list > li, .km-blackberry #my-drawer .km-list > li,
    .km-ios #my-drawer .km-listview-link > .km-icon, .km-android #my-drawer .km-listview-link > .km-icon, .km-blackberry #my-drawer .km-listview-link > .km-icon,
    .km-ios #my-drawer .km-list li > .km-icon, .km-android #my-drawer .km-list li > .km-icon, .km-blackberry #my-drawer .km-list li > .km-icon
    {
        background-color: #4e4e4e;
        color: #fff;
    }

    .km-ios #my-drawer .km-group-title,
    .km-blackberry #my-drawer .km-group-title
    {
        background-color: #6e6e6e;
        color: #fff;
    }

    .km-drawer-button:before, .km-drawer-button:after  { content: "\E077"; }
    .km-inbox:before, .km-inbox:after { content: "\E0B0"; }
    .km-sent:before, .km-sent:after { content: "\E0C6"; }
    .km-trash:before, .km-trash:after { content: "\E0C3"; }
    .km-spam:before, .km-spam:after { content: "\E0C5"; }
    .km-star:before, .km-star:after { content: "\E0D7"; }
    .km-settings:before, .km-settings:after { content: "\E0DA"; }
    .km-off:before, .km-off:after { content: "\E0B9"; }

    .inboxList
    {
        font-size: .8em;
    }

    .inboxList p,
    .inboxList h2,
    .inboxList h3
    {
        margin: 5px 2px;
    }

    .inboxList p,
    .inboxList h3
    {
        color: #777;
    }

    .inboxList h3.time
    {
        color: #369;
        float: left;
        margin-right: 10px;
    }
</style>


<script>
    var app = new kendo.mobile.Application(document.body);
</script>


