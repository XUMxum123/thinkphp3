<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Index</title>
<link type="text/css" rel="stylesheet" href="/thinkphp3/Public/Test/JqueryBoot/css/bootstrap.min.css" />
<script type="text/javascript" src="/thinkphp3/Public/Test/JqueryBoot/js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="/thinkphp3/Public/Test/JqueryBoot/js/bootstrap.min.js"></script>

<link type="text/css" rel="stylesheet" href="/thinkphp3/Public/Test/JqueryBoot/css/jquery.bootgrid.min.css" />
<script type="text/javascript" src="/thinkphp3/Public/Test/JqueryBoot/js/jquery.bootgrid.min.js"></script>

<script type="text/javascript" src="/thinkphp3/Public/Test/JqueryBoot/js/index.js"></script>
<script type="text/javascript">
   var JqueryBoot_LoadData = "<?php echo U('JqueryBoot/LoadData');?>";
   var $dataJson  = {"current":1,"rowCount":4,"total":6,
     				 "rows":[{"Id":"1","Name":"a","Logo":"aa","Win":"11","Lose":"11","Rank":"11","Alliance":"11","Playoffs":"11","Partition":"11"},
                            {"Id":"2","Name":"b","Logo":"bb","Win":"22","Lose":"22","Rank":"22","Alliance":"22","Playoffs":"22","Partition":"22"},
                            {"Id":"3","Name":"c","Logo":"cc","Win":"33","Lose":"33","Rank":"33","Alliance":"33","Playoffs":"33","Partition":"33"},
                            {"Id":"4","Name":"d","Logo":"dd","Win":"44","Lose":"44","Rank":"44","Alliance":"44","Playoffs":"44","Partition":"44"},
                            {"Id":"5","Name":"e","Logo":"ee","Win":"55","Lose":"55","Rank":"55","Alliance":"55","Playoffs":"55","Partition":"55"},
                            {"Id":"6","Name":"f","Logo":"ff","Win":"66","Lose":"66","Rank":"66","Alliance":"66","Playoffs":"66","Partition":"66"}]};
   $("#grid-data").bootgrid({
	    ajax: true,
	    url: JqueryBoot_LoadData
	});
</script>
</head>
<body>
<div style="display: none;"><button id="button">测试</button></div>
<table id="grid-data" class="table table-condensed table-hover table-striped">
    <thead>
        <tr>
            <th data-column-id="Id">Id</th>
            <th data-column-id="Name">Name</th>
            <th data-column-id="Logo">Logo</th>
            <th data-column-id="Win" data-order="desc">Win</th>
            <th data-column-id="Lose">Lose</th>
            <th data-column-id="Rank">Rank</th>
            <th data-column-id="Alliance">Alliance</th>
            <th data-column-id="Playoffs">Playoffs</th>
            <th data-column-id="Partition">Partition</th>
        </tr>
    </thead>
</table>
</body>
</html>