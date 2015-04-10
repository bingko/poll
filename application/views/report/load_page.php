<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Process Page</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.css">
<script src="<?php echo base_url()?>css/jquery-1.11.1.js"></script>
<script src="<?php echo base_url()?>css/bootstrap.js"></script>
<script type="text/javascript">
		setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที  
			// 1 วินาที่ เท่า 1000  
			// คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที		
			var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล  
					url:"<?php echo base_url()?>index.php/report/excel_time",  
					data:"rev=1",  
					async:false,
					success:function(getData){
						$("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง        
						if(getData==0){
							window.location = "<?php echo base_url()?>index.php/report/load_file/<?php echo $this->uri->segment(3)?>";
						}else{
							
						}
					}
			}).responseText;  
		},1000);      
</script>
<style>
.progress-bar.animate {
   width: 100%;
     -webkit-transition: width 300.0s ease !important;
     -moz-transition: width 300.0s ease !important;
       -o-transition: width 300.0s ease !important;
          transition: width 300.0s ease !important;
}
</style>
</head>
<body>
<div class="modal js-loading-bar">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-body">
       <div class="progress progress-striped active progress-popup">
        <div class="progress-bar" role="progressbar" align="center"></div>
        <div style=" position:absolute; left:50%; margin-left:-65px; color:#333; text-align:center">Processing Excel File...</div>
       </div>
     </div>
   </div>
 </div>
</div>
<div style="position:absolute; top:50%; left:50%; margin-left:-100px; margin-top:-50px;">
<iframe style="border:0px;" src="<?php echo base_url().'index.php/report/pageframe/'.$segment ;?>" height="100" width="200"></iframe>
</div>
</body>
</html>
<script>
this.$('.js-loading-bar').modal({
  backdrop: 'static',
  show: false
});

$('#load').ready(function() {
  var $modal = $('.js-loading-bar'),
      $bar = $modal.find('.progress-bar');
  
  $modal.modal('show');
  $bar.addClass('animate');
});
</script>
