<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Process Page</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.css">
<script src="<?php echo base_url()?>css/jquery-1.11.1.js"></script>
<script src="<?php echo base_url()?>css/bootstrap.js"></script>
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
     <div class="modal-body" align="center">
     <a href="<?php echo base_url()?>excel/<?php echo $this->uri->segment(3)?>.xls"><img src="<?php echo base_url()?>images/icon_set/excel.png" width="100">
     <h2>โหลดไฟล์ข้อมูล Excel</h2></a>
     </div>
   </div>
 </div>
</div>
<div style="position:absolute; top:50%; left:50%; margin-left:-100px; margin-top:-50px;">
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
