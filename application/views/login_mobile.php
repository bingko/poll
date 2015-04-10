<title>ระบบจัดการแบบสอบถามอีสานโพล Online</title>
<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/mobile.all.min.css" rel="stylesheet" />

<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/all.min.js"></script>
<style type="text/css">
#tabbar {
	background-image:url(<?php echo base_url()?>images/header/gradient.png);
	background-size:cover;
	position: absolute ;
	width: 100%;
	height: 95px;
	z-index: 1;
	left: 0;
	top: 0;	
}

#tabbar_sub {
	background-color:#fecd16;
	position: absolute;
	width: 100%;
	height: 5px;
	z-index: 1;
	left: 0;
	top: 95px;
}
.table_radius {
	border:solid 2px #dbdcde;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	background-color:#fff;
}
.table_default {
	border:solid 1px #fbeed5;
	background-color:#fcf8e3;
	color:#c09853;
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
	border:dashed 1px #fbeed5;
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
	height: 100%;
	background-color: black;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
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
	background-color:#F8F8F8;
	z-index:1002;
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
	background-color:#F8F8F8;
	z-index:1002;
	overflow: auto;
}
.white_content_question {
	display: none;
	position: absolute;
	top: 5%;
	left: 8%;
	width: 80%;
	height: 85%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color:#F8F8F8;
	z-index:1002;
	overflow: auto;
}

/*  mobile styles */
@media screen and (max-device-width: 480px)
{
img
{
margin-bottom: 50px;
max-width: 100%;
height: auto;
}
#content 
{ 
margin-left: 20px; 
font-size: 32px;
}
</style>
<div id="music" data-role="view" data-title="ศูนย์วิจัยธุรกิจและเศรษฐกิจอีสาน โปรแกรมแบบสำรวจข้อมูลภาคตะวันออกเฉียงเหนือ">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p><br>
<body bgcolor="#999">
<?php echo form_open('ci_login/login')?>
        <table width="90%" align="center" cellpadding="4" cellspacing="4" class="table_radius">
          	  <tr>
                <td align="center"><br>
                      <img src="<?php echo base_url()?>images/header/logo_mobile.png" width="90%" />
                      </td>
              </tr>
             
          <tr>
            <td height="40" colspan="3" align="center"><strong style="font-size:25px;">Login</strong></td>
            </tr>
          <tr>
            
            <td align="center">Username : &nbsp;&nbsp;<input type="text" name="username" id="username" class="k-textbox" style="width:80%; height:50px;" required validationMessage=""/></td>

          </tr>
          <tr>
            
            <td align="center">Password &nbsp;: &nbsp;&nbsp;<input type="text" name="password" id="password" class="k-textbox" style="width:80%; height:50px;" required validationMessage=""/></td>

          </tr>
          <tr>
            <td align="center"><input type="submit" name="button" id="button" value="เข้าสู่ระบบ" class="k-button" style="width:50%; height:70px;" /></td>

          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="center" >&nbsp;</td>

          </tr>
        </table>
<?php echo form_close()?>
</body>
<script>
                $(document).ready(function() {
                    var validator = $("#tickets").kendoValidator().data("kendoValidator"),
                    status = $(".status");

                    $("button").click(function() {
                        if (validator.validate()) {
                            status.text("Hooray! Your tickets has been booked!")
                                .removeClass("invalid")
                                .addClass("valid");
                        } else {
                            status.text("Oops! There is invalid data in the form.")
                                .removeClass("valid")
                                .addClass("invalid");
                        }
                    });
                });
</script>
</div>
<script>
    var app = new kendo.mobile.Application(document.body);
</script>