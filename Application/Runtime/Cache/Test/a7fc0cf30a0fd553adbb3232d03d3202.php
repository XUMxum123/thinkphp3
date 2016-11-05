<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>JqueryHtml</title>
<script type="text/javascript" src="/Think/Public/Test/JsFile/jquery-1.11.3.js"></script>
<script type="text/javascript" src="/Think/Public/Test/JsFile/Jquery.js"></script>
<link type="text/css" rel="stylesheet" href="/Think/Public/Test/CssFile/Jquery.css" />
<link type="text/css" rel="stylesheet" href="/Think/Public/Test/CssFile/page.css" />
<script type="text/javascript">
   var Jquery = "<?php echo U('Jquery/Jquery');?>";
   var InputInfor = "<?php echo U('Jquery/InputInfor');?>";
   var InputData = "<?php echo U('Jquery/InputData');?>";
   var DeleteData = "<?php echo U('Jquery/DeleteData');?>";
</script>
</head>
<body>
    <table id="main">
    <caption style="font-size:20px;font-weight: bolder;">后台信息管理</caption>
      <tr class="title">
        <td></td><td>时间</td><td>地点</td><td>任务</td>
      </tr>
      <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="content">
        <td><input type="checkbox" class="checkbox" name="<?php echo ($vo[MYID]); ?>"/></td>
        <td class="cont"><?php echo ($vo[TIME]); ?></td>
        <td class="cont"><?php echo ($vo[SITE]); ?></td>
        <td class="cont"><?php echo ($vo[MISSION]); ?></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <table style="margin: 0 auto; border: 1px solid #a68;width: 100%;">
       <tr><td colspan="4" style="text-align:center;"><div class="scott"><?php echo ($page); ?></div></td></tr>
    </table>
    <table id="button" style="margin: 0 auto; border: 1px solid #a68;">
       <tr>
       <td><button id="selectAll">全部选中</button></td>
       <td><button id="noselectAll">反选</button></td>
       <td><button id="Delete">删除选中</button></td>
       <td><input type="button" id="Add" value="增加" /></td>
       <td><input type="button" id="Save" value="保存" /></td>
       <td></td>
       </tr>
    </table>
    <div id="in"></div>
    <!-- 
    <div style="width:100%;text-align:center;">----------------------------</div>
    <div style="text-align:center;">NBA信息(待更新)</div>
    <table id="team">
      <tr>
          <th>队徽</th>
          <th>名字</th>    
      </tr>
      <?php if(is_array($datateam)): $i = 0; $__LIST__ = $datateam;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
           <td class="team_logo"><img src="<?php echo ($vo[NBA_LOGO]); ?>" /></td>
           <td class="team_name"><?php echo ($vo[NBA_NAME]); ?></td>
         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
     -->
    <!--
    ---------------------------------------------------------<br />
        名字：<input type="text" id="name" value="" />
        队徽：<input type="text" id="logo" value="" /><br />
    <input type="button" id="savenl" value="保存信息" /><br />
    <div id="suc"></div>
    <img src="http://localhost/Think/Uploads/Jquery/灰熊.png" />
    -->
</body>
</html>