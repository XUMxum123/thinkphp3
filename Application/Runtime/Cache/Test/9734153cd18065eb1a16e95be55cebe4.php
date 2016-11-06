<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Paging</title>
<link type="text/css" rel="stylesheet" href="/thinkphp3/Public/Test/CssFile/Jquery.css" />
<link type="text/css" rel="stylesheet" href="/thinkphp3/Public/Test/CssFile/page.css" />
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
           <td class="team_logo">   <img src="/thinkphp3/Public/Test/images/test.jpg" />        <!-- <img src="DB_NBATEAM_LOGO" />  暂时没有图片--></td>
           <td class="team_name"><?php echo ($vo[DB_NBATEAM_NAME]); ?></td>
           <td class="team_alliance"><?php echo ($vo[DB_NBATEAM_ALLIANCE]); ?></td>
           <td class="team_partition"><?php echo ($vo[DB_NBATEAM_PARTITION]); ?></td>
         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      <tr>
          <td colspan="4" align="center"><div class="technorati"><?php echo ($page); ?></div></td><!-- 样式值得注意 -->
      </tr>
    </table>
    <!-- 分页样式首先写成正如上面的形式  <div class="xxx"><?php echo ($page); ?></div>  然后到page.css找对应的class类名就行 如digg yahoo等div.xxx类的css -->
</body>
</html>