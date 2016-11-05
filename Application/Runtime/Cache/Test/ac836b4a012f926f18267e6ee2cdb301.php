<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MainPage</title>
<script type="text/javascript" src="/Think/Public/Test/JsFile/jquery-1.11.3.js"></script>
<script type="text/javascript">
  var Upload = "<?php echo U('UpDown/Upload');?>";
  var Download = "<?php echo U('UpDown/Download');?>";
  $filename = "E:/weixinweixin/wamp/www/Think/Uploads/UpDown/Upload/IMG_0595.JPG";
   $(document).ready(function(){
	  $("#download").click(function(){
         
  })
</script>
</head>
<body>
    <form action="<?php echo U('UpDown/Upload');?>" enctype="multipart/form-data" method="post">
        <input type="text" name="filename" value="" />
        <input type="file" name="file" value="" /><br />
        <input type="submit" value="提交" />
    </form>
    <form action="<?php echo U('UpDown/Download');?>" method="post">
        <input type="submit" id="download" value="下载" />
    </form>
    

    <div id="success"></div>
</body>
</html>