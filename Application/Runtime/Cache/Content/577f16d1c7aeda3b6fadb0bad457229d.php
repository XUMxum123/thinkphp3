<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <title>冠捷尾牙</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <script src="/Thinkphp/Public/Content/weiya/js/jquery.js" type="text/javascript"></script>
        <link href="/Thinkphp/Public/Content/weiya/js/swiper.min.css" rel="stylesheet" type="text/css"/>
        <script src="/Thinkphp/Public/Content/weiya/js/swiper.min.js" type="text/javascript"></script>
        <style>
            #audio_btn{
                position:absolute;
                top:0px;
                left:0px;
                z-index:999999;
            }
            input {
                display: block;
                width: 100%;
                border: none;
                font-size: 1em;
                line-height: 1.5em;
                margin: 0;
                padding: 0.5em;
                resize: none;
                font-family: inherit;
                color: inherit;
                box-sizing: border-box;
            }
            .send-btn {
                float: left;
            }
            ul{padding:0px;
               margin:0px;}
            li{list-style:none;
               padding:0px;
               margin:0px;
               width:100%;
            }
            #conts p{
                width:100%;
                word-break:break-all;
                padding:3px 0px 3px 0px;
                margin:0px;

            }

            .dm .d_screen 
            .d_del{width:38px;height:38px;background:#600;display:block;text-align:center;line-height:38px;
                   text-decoration:none;font-size:20px;color:#fff;border-radius:19px;border:1px solid #fff;position:absolute;top:10px;right:20px;z-index:3;display:none;}
            .dm .d_screen .d_del:hover{background:#f00;}
            .dm .d_screen .d_mask{width:100%;height:100%;position:absolute;top:0;left:0;opacity:0.5;
                                  filter:alpha(opacity=50) ;z-index:1;}
            .dm .d_screen .d_show{position: relative;z-index:2;}
            .dm .d_screen .d_show div{font-weight:500;color:#fff;position:absolute;left:0;top:0;}
            #showmeg p{
                font-weight:bold;
                text-align:center;
            }
			.d_show div{
				width:230px;
				heigth:50px;				
			}
			.d_show p{
				heigth:50px;
				text-overflow:ellipsis	;
			}
 #audio_btn{
                position:absolute;
                top:0px;
                left:0px;
                z-index:999999;
            }

        </style>
    </head>
    <body style="padding:0px;margin:0px;background:#006411;;background-size:100% 100%;" onLoad="scrollBy(0, document.body.scrollHeight)"> 
      <audio id="music" src="/Thinkphp/Public/Content/weiya/Breath And Life.mp3" autoplay="autoplay" loop="loop"></audio>    
        <a id="audio_btn"><img src="/Thinkphp/Public/Content/weiya/play.png" width="40" height="45" id="music_btn" border="0"></a>        
	   <div class="swiper-container" >
            <div  id="conts" style="color:#fff000;margin:0 auto ;padding-bottom:130px;padding-left:2%;padding-right:2%;padding-bottom:230px;height:100%;"> 
               <!---  comment by xumeng
				<div style="position:absolute;height:160px;background:#000;z-index:99999;width:260px;top:20%;left:30%;display:none;" id="showmeg" class="swing">
                    <p style="color:#4BACC6;">O(∩_∩)O哈哈~！</p>
                    <p style="color:#6F81BD;">O(∩_∩)O~</p>
                    <p style="color:#8064A2;">O(∩_∩)O哈哈~！！</p>
                    <p style="color:#C0504D;">O(∩_∩)O哈哈~！</p>
                    <p style="color:#9BBB59;">O(∩_∩)O哈哈~！</p>
                </div>    	
				-->
                <div class="dm">
                    <!--d_screen start-->
                    <div class="d_screen">
                        <a href="#" class="d_del">X</a>
                        <div class="d_mask"></div>
                        <div class="d_show">
                        						<div style="color:#4BACC6;font-size:26px;">111111111</div>
						                        <div style="color:#C0504D;font-size:16px;">2222222222</div>
						                        <div style="color:#8064A2;font-size:20px;">7777777777</div>
						                        <div style="color:#C0504D;font-size:21px;">33333333333</div>
						                        <div style="color:#4BACC6;font-size:26px;">44444444444</div>
<!--                                      <?php if($count > 1): if(is_array($contents)): $i = 0; $__LIST__ = $contents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="color:#C0504D;font-size:19px;"><?php echo ($vo[CONTENT]); ?></div><?php endforeach; endif; else: echo "" ;endif; endif; ?>   -->
                            
						<!--<div style="color:#C0504D;font-size:19px;">欢迎你们的到来</div>-->
						<!--  comment by xumeng
						<div style="color:#4BACC6;font-size:26px;">111111111</div>
						<div style="color:#C0504D;font-size:16px;">2222222222</div>
						<div style="color:#8064A2;font-size:20px;">7777777777</div>
						<div style="color:#C0504D;font-size:21px;">33333333333</div>
						<div style="color:#4BACC6;font-size:26px;">44444444444</div>
						<div style="color:#C0504D;font-size:36px;">5555555555</div>
						<div style="color:#8064A2;font-size:46px;">7777777777</div>
						<div style="color:#C0504D;font-size:86px;">66666666666</div>
						<div style="color:#8064A2;font-size:44px;">7777777777</div>
						<div style="color:#4BACC6;font-size:22px;">33333333333</div>
						<div style="color:#C0504D;font-size:33px;">44444444444</div>
						<div style="color:#8064A2;font-size:14px;">7777777777</div>
						<div style="color:#C0504D;font-size:18px;">5555555555</div>
						<div style="color:#8064A2;font-size:28px;">7777777777</div>
						<div style="color:#C0504D;font-size:26px;">33333333333</div>
						<div style="color:#4BACC6;font-size:16px;">44444444444</div>
						<div style="color:#C0504D;font-size:25px;">5555555555</div>-->
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
       
 <div style="position:fixed;left:0%;bottom:0px;height:100px;width:100%;border-top:solid 1px #a58e78;background-color:#000;z-index:99999; ">
                <p style="color:#fff;padding:0px;text-align:left;margin:0px;padding:0px;padding: 3px 0px 3px 5%;">就会出现在弹幕墙上哦~</p>
                <form id="reply-form2" action="tanmu.php" method="post" style="padding-top:8px;padding-bottom:30px;">
                    <div class="input" style="width:65%;float:left;margin-left:5%;">
                        <input id="reply-write" name="content" type="text" value="" placeholder="输入文字" >
                    </div>
                    <div class="send-btn" >
                        <a style="background-color:#6731D2;color:#fff;width: 4em;height: 2.5em;display: inline-block;text-align: center;line-height: 2.5em;cursor:pointer" onClick="send_reply2()">发射</a>
                    </div>
                </form>
            </div>

    </body>
</html>
<script>
    $(document).ready(function(){
        var height = $(window).height();
        $("#conts").css("height",height);
    })
    
 //music
 $(function () {
                $("#audio_btn").click(function () {
                    var music = document.getElementById("music");
                    if (music.paused) {
                        music.play();
                        $("#music_btn").attr("src", "/Thinkphp/Public/Content/weiya/play.png");
                    } else {
                        music.pause();
                        $("#music_btn").attr("src", "/Thinkphp/Public/Content/weiya/pause.png");
                    }
                });
                []
                a = $("span [class='swiper-pagination-bullet swiper-pagination-bullet-active']").index();
                //alert(a);

            })

    function send_reply2() {
        var content = $("#reply-write").val();
        if ($.trim(content) == "") {
            alert("亲，请输入你的想说的话！");
			return false;
        }
		
		      var text=$("#reply-write").val();
		        var div="<div style='font-size:25px;color:#000;'><p style='width:100%'>"+text+"</p></div>";
				$("#reply-write").val("");
		   $(".d_show").append(div);
		   init_screen();  
		
    }
    
    //弹幕一会显示一会消失
    window.onload = function () {
            setTimeout(show, 10000);  
        }
        //显示
        function show() {
            document.getElementById('showmeg').style.display = "block";
             $("#showmeg").animate({top:'40%'},1800);
             $("#showmeg").animate({top:'20%'},1800);
			 $("#showmeg").animate({left:'10%'},1800);
            setTimeout(hide, 5000);
        }
        //隐藏
        function hide() {
            document.getElementById('showmeg').style.display = "none";
            setTimeout(show, 10000);
        }
        
        

    $(function () {
        init_screen();
    });
    
	
	//考虑数据的交互，多久请求一下数据库
       $(document).ready(function () {
          setInterval("startRequest()",10000);
           });
          
       function startRequest()
        {
         // id= $(".d_show").find("div:last").attr("id");
        // $.ajax({
        // type: 'post',
        // url: 'demo.php?act=getdata',
        // data: "id=" +id,
        // dataType: 'json',
        // success: function (data) {
        
   // comment by xumeng
/* 		html="<div style='color:#ff0000;font-size:30px;'>感谢你，啦啦啦</div>";
		html+="<div style='color:#F39F1F;font-size:30px;'>嗯嗯嗯爱爱爱爱啊</div>";
		html+="<div style='color:#BF8DFF;font-size:35px;'>我的天呀</div>";
		html+="<div style='color:#000067;font-size:45px;'>good good good </div>";
		html+="<div style='color:#C0504D;font-size:33px;'>O(∩_∩)O哈哈哈~</div>";
		html+="<div style='color:#F39F1F;font-size:30px;'>嗯嗯嗯爱爱爱爱啊</div>";
		html+="<div style='color:#BF8DFF;font-size:35px;'>我的天呀</div>";
		html+="<div style='color:#000067;font-size:45px;'>good good good </div>";
		html+="<div style='color:#F39F1F;font-size:30px;'>嗯嗯嗯爱爱爱爱啊</div>";
		html+="<div style='color:#BF8DFF;font-size:35px;'>我的天呀</div>";
		html+="<div style='color:#000067;font-size:45px;'>good good good </div>"; */
        

        // for (var i = 0; i < data.length; i++) {
        //  html+= "<div id="+data[i].id+" style='font-size:" +data[i].size+ ";color:"+data[i].color+"'><p>"+data[i].username+":"+data[i].content+"</p></div>";
        // }
        // //$(".d_show").children().remove();
        $(".d_show").append(html);
		init_screen();
		
		// num=$(".d_show").find("div").length;
		// if(num>30){
		// $(".d_show").find("div:lt(20)").remove();  
		//}      
        // },
        // });
        // //init_screen();
        }

    function init_screen() {
        var _top = 0;
        $(".d_show").find("div").show().each(function () {
            var _left = $(window).width() - $(this).width()+220;
            var _height = $(window).height()+100;

            _top = _top + 36;
            if (_top >= _height - 120) { 
                _top = 40;
            }
            $(this).css({left: _left, top: _top});
            var time = 30000;
           /*  comment by xumeng
			if ($(this).index() % 2 == 0) {
                time = 30000;
            }
             if ($(this).index() % 3 == 0) {
                time = 30000;
            }
            if ($(this).index() % 4 == 0) {
                time = 30000;
            }
            if ($(this).index() % 5 == 0) {
                time = 30000;
            }
			if ($(this).index() % 7 == 0) {
                time = 30000;
            }
            if ($(this).index() % 8 == 0) {
                time = 30000;
            }
			*/
            $(this).animate({left: "-" + _left + "px"}, time, function () {
            });
        });
    }

    //随机获取颜色值
    function getReandomColor() {
        return '#' + (function (h) {
            return new Array(7 - h.length).join("0") + h
        })((Math.random() * 0x1000000 << 0).toString(16))
    }
</script>