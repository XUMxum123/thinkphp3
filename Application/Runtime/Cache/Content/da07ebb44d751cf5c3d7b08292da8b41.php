<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MainContent</title>
<script type="text/javascript" src="/Think/Public/Content/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/Think/Public/Content/js/content.js"></script>
<link rel="stylesheet" type="text/css" href="/Think/Public/Content/css/content.css" />
<script type="text/javascript">
    var ShowContent = "<?php echo U('Content/ShowContent');?>";
    var Subscribe = "<?php echo U('Content/Subscribe');?>";
    var TotalContent = "<?php echo U('Content/TotalContent');?>";
</script> 
</head>
    <body style="border:0px;background-color:#DDD;overflow-x:hidden;overflow-y:hidden;border-radius: 5px;">
    <input type="hidden" id="countscribe" value="<?php echo ($countscribe); ?>" />  <!-- 备份 -->
    <input type="hidden" id="countcontent" value="<?php echo ($countcontent); ?>" />  <!-- 备份 -->
    <input type="hidden" id="contentnow" value="" />                <!-- 备份 -->
    
    <input type="hidden" id="count_old" value="<?php echo ($countcontent); ?>" />
    <input type="hidden" id="count_new" value="" />    <!-- 备份 -->
    <div id="hudong" style="background-color:#909;width:100%;height:38px;text-align:center;padding-top:12px;">
        <span id="scribe" style="color:#F00;"></span>                                                                        
                                                         冠捷尾牙互动区 
        <span id="who" style="color:#F00;"></span>
    </div>   
    <div id="maincontent" style="background-color:#fff;height:300px">
        <div style="height:20px"></div>
        <span id="loading">加载中...</span>
    </div> 
    </body>
</html>