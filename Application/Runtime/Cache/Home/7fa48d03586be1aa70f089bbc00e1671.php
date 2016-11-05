<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>显示篮球详细信息</title>
<link rel="stylesheet" href="/thinkphp/Public/Basketball/basketball.css">
</head>

<body>
<div>
<table border="5px">
<caption><?php echo ($name); ?></caption>
<tr>
<td>{CHINA_NAME}</td>
<td>韩国</td>
<td>日本</td>
<td>澳大利亚</td>
</tr>
<tr>
<td><?php echo ($arr[COUNTRY_NAME]); ?></td>
<td>韩国</td>
<td>日本</td>
<td>澳大利亚</td>
</tr>
<tr>
<td>中国</td>
<td>韩国</td>
<td>日本</td>
<td>澳大利亚</td>
</tr>
<tr>
<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arrs): $mod = ($i % 2 );++$i;?><td><?php echo ($key); ?>+<?php echo ($arrs); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
</tr>
</table>

<table border="5px">
<?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><!--<td><?php echo ($key); ?></td>-->
<?php if(is_array($vo1)): $i = 0; $__LIST__ = $vo1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><tr>
<?php if($key >= $title): ?><td><?php echo ($vo2); ?></td>
<?php else: ?><td><?php echo ($vo2); ?>+<?php echo ($vo2); ?></td><?php endif; ?>
</tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
</table>

</div>
</body>
</html>