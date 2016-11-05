<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DisplayVerify</title>
<script type="text/javascript" src="/Think/Public/Test/JsFile/jquery-1.11.3.js"></script>
<script type="text/javascript">
var GenerateVerify = "<?php echo U('Test/GenerateVerify');?>";
var CheckVerify = "<?php echo U('Test/CheckVerify');?>";
$(document).ready(function(){
   $("#button").click(function(){
	   var $verify = $("#CheckVerify").val();	   
 	   $.ajax({
		    url: CheckVerify,
		   data: {"verify": $verify},
		success: function(response){
			$result = $(response).filter("#result").text();
			$("#inner").text($result);
		   }
	   }) 	  
   })
})
$(document).ready(function(){
	$("#clear").click(function(){
		$(".verify").attr("src",GenerateVerify);
	})
})
</script>
<style type="text/css">
  #button{
     margin-left: 5px;
     cursor: pointer;
  }
  #inner{
     padding-left: 5x;
     color: #f00;
  }
  .verify{
    border: 2px solid #f00;
    margin-top: 5px;
  }
  #clear{
    border: 2px solid #0f0;
    font-size: 20px;
    background-color: #ee6;
    cursor: pointer;
  }
</style>
</head>
<body>
   <input type="text" name="CheckVirify" id="CheckVerify" value="" /><button id="button">确定</button><span id="inner"></span><br />
   <img src="<?php echo U('Test/GenerateVerify');?>" class="verify"/><a id="clear">看不清</a>
</body>
</html>