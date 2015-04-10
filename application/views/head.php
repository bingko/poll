<?php $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบจัดการแบบสอบถามอีสานโพล Online</title>
<link href="<?php echo base_url()?>css/common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/default.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/popup.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/animetextstyle.css" rel="stylesheet">
<link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
<link href="<?php echo base_url()?>css/hover_style_common.css" rel="stylesheet">
<link href="<?php echo base_url()?>css/hover_style.css" rel="stylesheet">
<link href="<?php echo base_url()?>css/kendo.dataviz.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/kendo.dataviz.silver.min.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
<link rel="stylesheet" media="print" href="<?php echo base_url()?>css/mystyle.css">
<?php
		$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
		$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
		$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
		$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"Windows");
		$macintosh  = stripos($_SERVER['HTTP_USER_AGENT'],"macintosh");
		
		if($iPod || $iPhone || $iPad || $Android){?>
<link href="<?php echo base_url()?>css/mobile.all.min.css" rel="stylesheet" />
<?php }?>

<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/all.min.js"></script>
<script src="<?php echo base_url()?>js/web.min.js"></script>
<script src="<?php echo base_url()?>js/console.js"></script>
<script src="<?php echo base_url()?>js/popup.js"></script>
<script src="<?php echo base_url()?>js/jquery.fittext.js"></script>
<script src="<?php echo base_url()?>js/jquery.lettering.js"></script>
<script src="<?php echo base_url()?>js/jquery.textillate.js"></script>
<script src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>


<style type="text/css">
#body_img	{
	background-image:url(<?php echo base_url()?>images/bg-tail.jpg);
	position: absolute ;
	width: 100%;
	z-index: 1;
	left: 0;
	top: 0;
	background-repeat:repeat;
	background-size:auto ;
	}
#body_survey_img	{
	background-image:url(<?php echo base_url()?>images/bg-image.png);
	position:fixed ;
	width: 100%;
	z-index: 1;
	left: 0;
	top: 0;
	background-repeat:repeat;
	background-size:auto ;
	}
#tabbar {
	background-image:url(<?php echo base_url()?>images/bg-tail.jpg);
	background-size:cover;
	position: absolute ;
	width: 100%;
	height: 95px;
	z-index: 1;
	left: 0;
	top: 0;	
}

#tabbar_sub {
	background-color:#000000;
	position: absolute;
	width: 100%;
	height: 5px;
	z-index: 1;
	left: 0;
	top: 95px;
}
.font_thaisanslite {
 	font-family:thaisanslite; 
	font-size:18px; 
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
body {
	font-size: 13px;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
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
	border:dashed 1px #FF9900;
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
	height: 50%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color:#F8F8F8;
	z-index:1002;
	overflow: auto;
}
.white_content_category {
	display: none;
	position: fixed;
	top: 5%;
	left: 20%;
	width: 60%;
	height: 60%;
	padding: 16px;
	border: 5px solid #FFF;
	background-color:#F8F8F8;
	z-index:1002;
	overflow: auto;
}
.white_content_review {
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
	position: fixed;
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
.white_content_question_autopopup {
	position: fixed;
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
.black_overlay_autopopup {
	position: fixed;
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
.animated{-webkit-animation-fill-mode:both;-moz-animation-fill-mode:both;-ms-animation-fill-mode:both;-o-animation-fill-mode:both;animation-fill-mode:both;-webkit-animation-duration:3s;-moz-animation-duration:3s;-ms-animation-duration:3s;-o-animation-duration:3s;animation-duration:3s;}.animated.hinge{-webkit-animation-duration:3s;-moz-animation-duration:3s;-ms-animation-duration:3s;-o-animation-duration:3s;animation-duration:3s;}@-webkit-keyframes flash {
	0%, 50%, 100% {opacity: 1;}	25%, 75% {opacity: 0;}
}

@-moz-keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

@-o-keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

@keyframes flash {
	0%, 50%, 100% {opacity: 1;}	
	25%, 75% {opacity: 0;}
}

.flash {
	-webkit-animation-name: flash;
	-moz-animation-name: flash;
	-o-animation-name: flash;
	animation-name: flash;
}
/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes pulse {
    0% { -webkit-transform: scale(1); }	
	50% { -webkit-transform: scale(1.1); }
    100% { -webkit-transform: scale(1); }
}
@-moz-keyframes pulse {
    0% { -moz-transform: scale(1); }	
	50% { -moz-transform: scale(1.1); }
    100% { -moz-transform: scale(1); }
}
@-o-keyframes pulse {
    0% { -o-transform: scale(1); }	
	50% { -o-transform: scale(1.1); }
    100% { -o-transform: scale(1); }
}
@keyframes pulse {
    0% { transform: scale(1); }	
	50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.pulse {
	-webkit-animation-name: pulse;
	-moz-animation-name: pulse;
	-o-animation-name: pulse;
	animation-name: pulse;
}


.rounded {
  border-top-left-radius: 50px 50px;
  border-top-right-radius: 50px 50px;
  border-bottom-left-radius: 50px 50px;
  border-bottom-right-radius: 50px 50px;
}
div#Footer
    {
        width: 100%;
        height: 130px;
       	color: #ffffff;
        position:relative;
		text-align: center;
        margin-left: auto;
        margin-right: auto;
		margin-bottom: 0;
		padding-bottom: 0;
    }
</style>
</head>

<body id="body_img" class="font_thaisanslite" >
<table width="100%">
<tr>
<td width="40%" background="<?php echo base_url()?>images/header/bg_kku.png">
<div style="position:relative;top:10px;left:20px;"><img src="<?php echo base_url()?>images/header/header.png" /></div>
</td>
<td width="60%" background="<?php echo base_url()?>images/world-map.png">
<br />
 <div class="jumbotron" ><div class="font_thaisanslite"><p class="animate flash" data-in-effect="flash">E-Saan Center For Business and Economic Research
  	</p>
    <?php if($webOS!=""||$macintosh!=""){ ?>
    <img src="<?php echo base_url()?>images/header/logo_nontext.png"/>
    <?php }else { ?>
    <img src="<?php echo base_url()?>images/header/logo.png"/>
    <?php } ?>
    
    </div></div>
<br />
</td>
</tr>
</table>
<?php if(@$all_session['login']['user_status']==1&&@$all_session['login']['user_type']==1){?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td bgcolor="#e5e8ea"><div id="menu-sprites"></div></td>
    <td bgcolor="#C0C0C0" align="center"><div class="font_thaisanslite"><?php 
	echo "ยินดีต้อนรับ คุณ"; 
	print_r ( $all_session['login']['user_name']);
	?></div></td>
  </tr>
</table>



<script>
                $("#menu-sprites").kendoMenu({
					
                    dataSource: [
						{
                            text: "หน้าหลัก",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>',
														
                        },
                        {
                            text: "จัดการแบบสอบถาม",
							imageUrl: "<?php echo base_url()?>images/icon_menu/survey.png",
							items: [
                                //{ text: "รายการแบบสอบถาม", url: '<?php echo base_url()?>index.php/survey'},
								{ text: "สร้างแบบคำถามที่ใช้บ่อย", url: '<?php echo base_url()?>index.php/survey/create_template'},
								{ text: "จัดการข้อมูลประเภทแบบสอบถาม",url: '<?php echo base_url()?>index.php/manage_survey/category'}
                            ]
                        },
                        {
                            text: "สมาชิกอีสานโพล",  url: '<?php echo base_url()?>index.php/respondent' ,
							imageUrl: "<?php echo base_url()?>images/icon_menu/member.png"
                        },
						{
                            text: "จัดการผู้ใช้งาน",url: '<?php echo base_url()?>index.php/manage_user/user',
							imageUrl: "<?php echo base_url()?>images/icon_menu/user.png"
                        },
						{
                            text: "ประวัติการใช้งาน",
							imageUrl: "<?php echo base_url()?>images/icon_menu/export.png",
							items: [
                                { text: "ติดตามผู้เก็บแบบสำรวจ",url: '<?php echo base_url()?>index.php/history/keep'},
                                { text: "ประวัติการใช้งานระบบ",url: '<?php echo base_url()?>index.php/history/index'},
                            ]
                        },
						{
							text: "ออกจากระบบ",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>index.php/ci_login/logout',	
						}]
                });
</script>
<?php }else if(@$all_session['login']['user_status']==1&&@$all_session['login']['user_type']==2){?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td bgcolor="#e5e8ea"><div id="menu-sprites"></div></td>
  </tr>
</table>
<script>
                $("#menu-sprites").kendoMenu({
                    dataSource: [
						{
                            text: "หน้าหลัก",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>',							
                        },
                        {
                            text: "สมาชิกอีสานโพล",  url: '<?php echo base_url()?>index.php/respondent' ,
							imageUrl: "<?php echo base_url()?>images/icon_menu/member.png"
                        },
                        {
                            text: "จัดการผู้ใช้งาน",url: '<?php echo base_url()?>index.php/manage_user/user',
							imageUrl: "<?php echo base_url()?>images/icon_menu/user.png"
                        },
						{
							text: "ออกจากระบบ",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>index.php/ci_login/logout',	
						}]
                });
</script>
<?php }else if(@$all_session['login']['user_status']==1&&@$all_session['login']['user_type']==3){?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td bgcolor="#e5e8ea"><div id="menu-sprites"></div></td>
  </tr>
</table>

<script>
                $("#menu-sprites").kendoMenu({
                    dataSource: [
						{
                            text: "หน้าหลัก",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>',							
                        },
                        {
                            text: "สมาชิกอีสานโพล",  url: '<?php echo base_url()?>index.php/respondent' ,
							imageUrl: "<?php echo base_url()?>images/icon_menu/member.png"
                        },
						{
							text: "ออกจากระบบ",
							imageUrl: "<?php echo base_url()?>images/icon_menu/home.png",
							url: '<?php echo base_url()?>index.php/ci_login/logout',	
						}]
                });
</script>
<?php } ?>



<script>hljs.initHighlightingOnLoad();</script>
<script>
  $(function (){
    var log = function (msg) {
      return function () {
        if (console) console.log(msg);
      }
    }
    $('code').each(function () {
      var $this = $(this);
      $this.text($this.html());
    })

    var animateClasses = 'flash bounce shake tada swing wobble pulse flip flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeInUpBig fadeInDownBig fadeInLeftBig fadeInRightBig fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight fadeOutUpBig fadeOutDownBig fadeOutLeftBig fadeOutRightBig bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight hinge rollIn rollOut';

    var $form = $('.playground form')
      , $viewport = $('.playground .viewport');

    var getFormData = function () {
      var data = { 
        loop: true, 
        in: { callback: log('in callback called.') }, 
        out: { callback: log('out callback called.') } 
      };
      
      $form.find('[data-key]').each(function () {
        var $this = $(this)
          , key = $this.data('key')
          , type = $this.data('type');

          data[type][key] = $this.is(':checkbox') ? $this.is(':checked') : $this.val();
      });

      return data;
    };

    $.each(animateClasses.split(' '), function (i, value) {
      var type = '[data-type]'
        , option = '<option value="' + value + '">' + value + '</option>';

      if (/Out/.test(value) || value === 'hinge') {
        type = '[data-type="out"]';
      } else if (/In/.test(value)) {
        type = '[data-type="in"]';
      } 

      if (type) {
        $form.find('[data-key="effect"]' + type).append(option);        
      }
    });

    $form.find('[data-key="effect"][data-type="in"]').val('fadeInLeftBig');
    $form.find('[data-key="effect"][data-type="out"]').val('hinge');

    $('.jumbotron h1')
      .fitText(0.5)
      .textillate({ in: { effect: 'flipInY' }});
    
    $('.jumbotron p')
      .fitText(3.2, { maxFontSize: 18 })
      .textillate({ initialDelay: 1000, in: { delay: 3, shuffle: true } });

    setTimeout(function () {
        $('.fade').addClass('in');
    }, 250);

    setTimeout(function () {
      $('h1.glow').removeClass('in');
    }, 2000);

    var $tlt = $viewport.find('.tlt')
      .on('start.tlt', log('start.tlt triggered.'))
      .on('inAnimationBegin.tlt', log('inAnimationBegin.tlt triggered.'))
      .on('inAnimationEnd.tlt', log('inAnimationEnd.tlt triggered.'))
      .on('outAnimationBegin.tlt', log('outAnimationBegin.tlt triggered.'))
      .on('outAnimationEnd.tlt', log('outAnimationEnd.tlt triggered.'))
      .on('end.tlt', log('end.tlt'));
    
    $form.on('change', function () {
      var obj = getFormData();
      $tlt.textillate(obj);
    }).trigger('change');

  });

	</script>
