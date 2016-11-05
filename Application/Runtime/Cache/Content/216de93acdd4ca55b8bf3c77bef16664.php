<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="content-Type" content="text/html;charset=utf-8" >
<TITLE>冠捷尾牙互动区</TITLE>
<link rel="stylesheet" href="/Think/Public/Content/css/weiya.css" type="text/css" />
</head>
<body class="gra">
<input type="hidden" id="count_old" value="<?php echo ($countcontent); ?>" /> <!-- 判断是否有新数据写入的标志 -->
<!--     <div id="hudong" style="background-color:#909;width:100%;height:38px;text-align:center;padding-top:12px;">
        <span id="scribe" style="color:#F00;"></span>                                                                        
                                                         冠捷尾牙互动区 
        <span id="who" style="color:#F00;"></span>
    </div>   -->
        <audio id="music" src="/Think/Public/Content/weiya/Breath And Life.mp3" autoplay="autoplay" loop="loop"></audio>    
        <a id="audio_btn"><img src="/Think/Public/Content/weiya/play.png" width="40" height="45" id="music_btn" border="0"></a> 
<!--dm start-->
	<div class="dm">
	   <!--d_screen start-->
		<div class="d_screen">
			<div class="d_mask"></div>
			<div class="d_show"></div>
		</div>
	   <!--d_screen end-->              
	</div>
<!--dm end-->

<!--引入类库-->
<script type="text/javascript" src="/Think/Public/Content/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">

//music
$(function() {
               $("#audio_btn").click(function () {
                   var music = document.getElementById("music");
                   if (music.paused) {
                       music.play();
                       $("#music_btn").attr("src", "/Think/Public/Content/weiya/play.png");
                   } else {
                       music.pause();
                       $("#music_btn").attr("src", "/Think/Public/Content/weiya/pause.png");
                   }
               });
               []
               a = $("span [class='swiper-pagination-bullet swiper-pagination-bullet-active']").index();
               //alert(a);

           })

$(document).ready(function(){
    var height = $(window).height();
    $(".dm").css("height",height);
})
$(function(){
    $(".dm,.d_del").toggle(1);
    //var flag = 0;
    //readXMLByAjax(flag);
    showInteval();
    setInterval("showInteval()",1000);
});

function showInteval(){
 var count_old = $("#count_old").val();
 $.ajax({
		 type: "GET",
	  url: "http://localhost/Think/uploads/Content/content.xml",
 dataType: "xml",
 success: function(res){
		      var subcontent = $(res).find("subcontent:gt(0)");
		      var sub_length = subcontent.length;
    	  //alert(count_old+" "+sub_length);
	      if(sub_length>count_old){
	    	  $("#count_old").val(sub_length);
	    	  readXMLByAjax(count_old);
	      }
		      //alert(count_old);
		      //alert(subcontent.length);	 
    }
 })
}    

// 读取弹幕内容 根据标志
function readXMLByAjax(flag){  //从第flag个subcontent读取内容
	$.ajax({
		 type: "GET",
		  url: "http://localhost/Think/uploads/Content/content.xml",
	 dataType: "xml",
	  success: function(response){
		    //var maincontent = $(response).find("maincontent");
		    var subcontent = $(response).find("subcontent:gt("+ flag +")"); 
			//var lastcontent = $(response).find("subcontent:eq(1)");
			//alert(subcontent.length);
			subcontent.each(function() {
				    var sub = $(this);
				    //var fName = sub.attr("Name");//读取节点属性
				    //var FromUserName = sub.find("FromUserName").text();//读取子节点的值
				    //var CreateTime = sub.find("CreateTime").text();//读取子节点的值
				    //var MsgType = sub.find("MsgType").text();//读取子节点的值
				    var Content = sub.find("Content").text();//读取子节点的值
				    insertText(Content);
/*     				    setTimeout(function(){
				    },100); */
			});
		   }
	    })
} 

// 插入内容
function insertText(text){
	   var div="<div style=\"width:100%\">" + text + "</div>";
	   $(".d_show").append(div); 		   
       init_screen();
}
    
//初始化弹幕
function init_screen(){
	var _top=0;
	$(".d_show").find("div:last").show(function(){
		var _left=$(window).width();
		var _height=$(window).height();

		//_top=_top+55;    // old
		//var dm_height = _height - 55;   //old
		var dm_height = _height;  // new
		var lines = [5,10,20,30,40];
		var i = Math.floor(Math.random()*lines.length);
		var line_height = lines[i];
		var text_line_height = 36;
		var max_dm_line = parseInt(dm_height/text_line_height);			
		var half_line =  Math.floor(max_dm_line/2);
		var rand_line = Math.floor(Math.random()*half_line+1)-1; // [0,half_line-1]中任意整数
		var _rand = Math.floor(Math.random()*10+1); //[1,10]  概率比例  60%在上面  40%在下面  (根据具体情况可以更改)
		if(_rand>6){		
			rand_line = rand_line + half_line-1;
		}
		_top = _top + rand_line*line_height;
		
		
/* 			if(_top>=_height-100){
			_top=0;
		} */

		$(this).css({left:_left,top:_top,color:getReandomColor()});
		//$(this).css({left:_left,top:_top,color:randColor()});
		var time=30000;
/* 			if($(this).index()%2==0){
			time=30000;
		} */
		$(this).animate({left:"-"+_left+"px"},time,function(){

		
		});
	});
}

//随机获取颜色值
function getReandomColor(){
	return '#'+(function(h){
	return new Array(7-h.length).join("0")+h
	})((Math.random()*0x1000000<<0).toString(16))
}

function randColor(){
      var colors = ["#FF0","#F00","#00F","#0FF","#F0F","#0F0","#EF6","#0CD","#ABC"];
      var colorsLength = colors.length;
      var i = Math.floor(Math.random()*colorsLength);/* 随机产生0-(colorsLength-1)的整数 */
      var color = colors[i];
      return color;
}
</script>
</body>
</html>