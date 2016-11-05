<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Paging</title>
<link type="text/css" rel="stylesheet" href="/Think/Public/Test/CssFile/Jquery.css" />
<link type="text/css" rel="stylesheet" href="/Think/Public/Test/CssFile/page.css" />
</head>
<body>
    <table id="team">
      <tr class="head">
          <th>队徽</th>
          <th>名字</th>
          <th>联盟</th>
          <th>分区</th>    
      </tr>
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
           <td class="team_logo"><img src="<?php echo ($vo[NBA_LOGO]); ?>" /></td>
           <td class="team_name"><?php echo ($vo[NBA_NAME]); ?></td>
           <td class="team_alliance"><?php echo ($vo[NBA_ALLIANCE]); ?></td>
           <td class="team_partition"><?php echo ($vo[NBA_PARTITION]); ?></td>
         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      <tr>
          <td colspan="4" align="center"><div class="viciao"><?php echo ($page); ?></div></td>
      </tr>
    </table>
    <!-- 分页样式正如上面的形式  div class="xxx"><?php echo ($page); ?></div>  然后到page.css找对应的class类名就行-->
</body>
</html>