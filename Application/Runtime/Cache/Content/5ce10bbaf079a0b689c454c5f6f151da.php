<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="/Think/Public/Content/js/jquery-1.11.3.min.js"></script>
<!--<script type="text/javascript" src="/Think/Public/Content/weiyacopy/js/weiya.js"></script>-->
<script type="text/javascript">
    var SaveContentByWeiXin = "<?php echo U('Content/SaveContentByWeiXin');?>";
</script> 
</head>
<body>
   <input type="text" id="text" value="" style="height:50px;"/>
   <input type="button" id="button" value="发送" style="height:50px;font-size:20px;"/> 
   <script type="text/javascript">
      $(document).ready(function(){
    	  $("#button").click(function(){
    		  $.ajax({
    			  type: "GET",
    			   url: SaveContentByWeiXin,
    			  data:{"content":$("#text").val()},
    		   success:function(){
    			   //alert($("#text").val());
    		   }
    		  })
    	  })
      })
   </script>
</body>

</html>