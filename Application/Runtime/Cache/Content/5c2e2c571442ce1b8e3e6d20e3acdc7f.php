<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>InputContent</title>
<script type="text/javascript" src="/Think/Public/Content/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="/Think/Public/Content/js/exchange.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#add").click(function(){
		var $FromUserName = $("#FromUserName").val();
		var $MsgType = $("#MsgType").val();
		var $Content = $("#Content").val();
		//alert($Content);
		$.ajax({
			 type: "GET",
			  url: "http://localhost/thinksee/Uploads/Content/log.xml",
		 dataType: "xml",
		  success: function(response){
			    var maincontent = $(response).find("maincontent");
			    var subcontent = $(response).find("subcontent");
				var lastcontent = $(response).find("subcontent:last");
				var xml = "<subcontent><FromUserName>" + $FromUserName + "</FromUserName><MsgType>";
				    xml += $MsgType + "</MsgType><Content>" + $Content +"</Content></subcontent>";
				alert(xml);
				//lastcontent.after(xml);
				//alert(lastcontent.find("FromUserName").text());
				//alert(ts.length);
				//alert(response);
				}
			})
		})
	})
</script>
</head>

<body>
    FromUserName:<input type="text" id="FromUserName" value="" /><br/>
    MsgType:<input type="text" id="MsgType" value="" /><br/>
    Content:<input type="text" id="Content" value="" /><br/>
     <input type="button" value="增加" id="add">
</body>
</html>