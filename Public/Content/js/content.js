/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
	$("#but").click(function(){
		alert("123");
	})
})

$(document).ready(function(){  
       var height = $(window).height();
       $("#maincontent").css("height",height);
       ShowContentInterval();
             //$(document).scrollTop($(".container").height() + "10000"); 
       //setInterval("CheckConntent()",2000);// 1秒钟check
    //setInterval("ShowContentInterval()",3000);
	});

function CheckConntent(){
    $.ajax({
           url:TotalContent,
           success:function(response,status,xhr){
                       var countscribe = $("#countscribe").val();
                           $.ajax({
                               type: "GET",
                                url: Subscribe,
                            success: function(res){
                                   var subname = $(res).find("table tr:last td:first").text();
                                   var scribe = $(res).find("table tr").length;
                                   if(countscribe != scribe){
                                       $("#scribe").html("(" + subname + " " + "刚刚关注了" + ")");
                                       Shark();
                                       $("#countscribe").val(scribe);
                                   }else{
                                       $("#scribe").html("");
                                   }
                               }
                           })          
               var nicknames = $(response).filter("#nicknames").val();
               var nowcontent = $(response).filter("#nowcontent").val();
               var countcontent = $("#countcontent").val();
               if(nowcontent != countcontent){
                   ShowContentInterval();
                  $("#who").html("(" + nicknames + " " + "刚刚发起了消息" +")");
                   Shark();
                  $("#countcontent").val(nowcontent);
               }else{
                   $("#who").html("");
               }
           }
       })
} 

  function ShowContentInterval(){
    	 $.ajax({
		 type: "GET",
		  url: ShowContent,
	     success: function(response){  
			   $("#loading").empty();
			   $("#loading").html(response);
                           //$(document).scrollTop($(".container").height()); 
                           /*
                           var nickname = $(response).find("table tr:last td:first span.nickname").text();
                           var countcontent = $("#countcontent").val();
                           var con = $(response).find("table tr").length;
                           if(con != countcontent){
                              Shark();
                              $("#who").html("(" + nickname + " " + "刚刚发起了消息" +")");
                            $("#countcontent").val(nowcontent);
                            }else{
                              $("#who").html("");
                           }*/
			   //var heigh = $(".container").height();
                           //$(document).scrollTop(heigh + "1000000");  
                        }
		})
} 

  function Shark(){
      var colors = ["#FF0","#F00","#00F","#0FF","#F0F","#0F0"];
      var colorsLength = colors.length;
      var set = setInterval(function(){
          var i = Math.floor(Math.random()*colorsLength);/* 随机产生0-(colorsLength-1)的整数 */
          var color = colors[i];
          $("#who").css("color",color);
          $("#scribe").css("color",color);
      },200);
  }   


    

