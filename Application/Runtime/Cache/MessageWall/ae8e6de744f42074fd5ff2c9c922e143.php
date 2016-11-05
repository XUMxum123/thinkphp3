<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Type">
<meta content="text/html; charset=utf-8">
<meta charset="utf-8">
<title>我很想回家</title>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="/Thinkphp/Public/MessageWall/manyimage/second/css/reset.css">
<link rel="stylesheet" type="text/css" href="/Thinkphp/Public/MessageWall/manyimage/second/css/animations.css">
<link rel="stylesheet" type="text/css" href="/Thinkphp/Public/MessageWall/manyimage/second/css/layout.css">
<link rel="stylesheet" type="text/css" href="/Thinkphp/Public/MessageWall/manyimage/second/css/page.css">
</head>
<body>
<img src="/Thinkphp/Public/MessageWall/manyimage/second/img/icon_up.png" alt="" class="arrow-up pt-page-moveIconUp">
<div id="page-content">
  <div class="page page-1 page-current">
      <img class="pic" src="/Thinkphp/Public/MessageWall/manyimage/second/img/1.jpg">
      <div class="pic-desc">
          <p class="title1">我很想回家</p>
          <p class="title2">我非常十分想回家<span>想念父母</span></p>
      </div>
  </div>
   <div class="page page-2 hide">
       <img class="pic" src="/Thinkphp/Public/MessageWall/manyimage/second/img/2.jpg">
       <div class="pic-desc">
           <p class="title1">我很想回家</p>
           <p class="title2">我非常十分想回家<span>想念父母</span></p>
       </div>
   </div>
    <div class="page page-3 hide">
        <img class="pic" src="/Thinkphp/Public/MessageWall/manyimage/second/img/3.jpg">
        <div class="pic-desc">
            <p class="title1">我很想回家</p>
            <p class="title2">我非常十分想回家<span>想念父母</span></p>
        </div>
    </div>
    <div class="page page-4 hide">
       <img class="pic" src="/Thinkphp/Public/MessageWall/manyimage/second/img/4.jpg">
        <div class="pic-desc">
            <p class="title1">我很想回家</p>
            <p class="title2">我非常十分想回家<span>想念父母</span></p>
        </div>
    </div>
    <div class="page page-5 hide">
        <img class="pic" src="/Thinkphp/Public/MessageWall/manyimage/second/img/5.jpg">
        <div class="pic-desc">
            <p class="title1">我很想回家</p>
            <p class="title2">我非常十分想回家<span>想念父母</span></p>
        </div>
    </div>
    <div class="page page-6 hide">
        <img class="pic" src="/Thinkphp/Public/MessageWall/manyimage/second/img/6.jpg">
        <div class="pic-desc">
            <p class="title1">我很想回家</p>
            <p class="title2">我非常十分想回家<span>想念父母</span></p>
        </div>
    </div>
    <div class="page page-7 hide">
        <img class="pic" src="/Thinkphp/Public/MessageWall/manyimage/second/img/7.jpg">
    </div>
</div>
<div class="audio-box" style="display: none">
    <!--<audio id="myaudio" src="/Thinkphp/Public/MessageWall/manyimage/second/audio/111.mp3"   loop="loop" autoplay="autoplay" controls="controls">
        你的浏览器不支持HTML5
    </audio>-->
                        <audio controls="controls" autoplay="autoplay" id="music">
                            <source src="/Thinkphp/Public/MessageWall/manyimage/second/audio/111.ogg" />	
                            <source src="/Thinkphp/Public/MessageWall/manyimage/second/audio/111.mp3" />
                            <source src="/Thinkphp/Public/MessageWall/manyimage/second/audio/111.wav" />
                            你的浏览器不支持html5的audio标签
                        </audio>
    <input type="button" onclick="document.getElementById('myaudio').play()" value='播放' id="play-btn"  />
    <input type="button" onclick="document.getElementById('myaudio').pause()" value='停止' id="stop-btn" />
</div>
<a class="music-icon music-trigger play" href="javascript:;"></a>
<script type="text/javascript" src="/Thinkphp/Public/MessageWall/manyimage/second/js/zepto.min.js"></script> 
<script type="text/javascript" src="/Thinkphp/Public/MessageWall/manyimage/second/js/touch.js"></script> 
<script type="text/javascript" src="/Thinkphp/Public/MessageWall/manyimage/second/js/index.js"></script>
<script type="text/javascript" src="/Thinkphp/Public/MessageWall/manyimage/second/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
    $('.page-1 .pic').animate({
        width:"120%",
        marginLeft:"-20%"
    },5000);
    $('.page-1 .title1').fadeIn(2000);
    setTimeout(function(){
        $('.page-1 .title2').fadeIn(2000);
    },2000)
    $(".music-trigger").click(function(document){
       if($(this).hasClass("play")){
          $('#stop-btn').click();
          $(this).removeClass("play").addClass("stop");
       }
       else
       {
           $('#play-btn').click();
           $(this).removeClass("stop").addClass("play");
       }
    })
});
</script>
</body>
</html>