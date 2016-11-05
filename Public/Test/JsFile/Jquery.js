/**
 * Javascript code
 * author: xumeng
 *   time: 2016-04-25
 */
 
/* $(document).ready(function(){
   $("#selectAll").click(function(){
     alert("123");
   })
 })*/
 
 /*
  * 出现全选后，然后取消全选，最后再全选，明明页面的代码已经是checked=checked了，就是不显示勾选  解决办法
  *   用prop 添加checked属性
  *   用removeAttr 去除checked属性
  * */
 // 全部选中/取消全选
 $(document).ready(function(){
   $("#selectAll").click(function(){
   	 if($("#selectAll").text() == "全部选中"){
   	   $('input:checkbox').each(function() {
   	      $(this).prop("checked", true); 
   	     //$(this).parent().parent().addClass("hit");
        })
         $("#selectAll").text("取消全选");
   	 }else{
   	     $('input:checkbox').each(function() {
          $(this).removeAttr("checked");
          //$(this).parent().parent().removeClass("hit");
       })
         $("#selectAll").text("全部选中");
   	 }
   }) 
 })
 
 // 反选
 $(document).ready(function(){
   $("#noselectAll").click(function(){
   	var $input_length = $("input:checkbox").length;
   	//alert($input_length);
   	$('input:checkbox').each(function(){
   		this.checked = !this.checked;
/*        if($(this).is(":checked")){
          $(this).attr("checked",true);
        }else{
          $(this).attr("checked",false);
        }*/
   		//$(this).parent().parent().toggleClass("hit");
   	})
   	if(("[name='checkbox']:checked").length == $input_length){
   	   $("#selectAll").text("取消全选");
   	}else{
   	   $("#selectAll").text("全部选中");
   	}
   }) 
 })
 
 // 删除选中
 $(document).ready(function(){
   $("#Delete").click(function(){
    var $len = $("input:checkbox:checked").length;
    if($len>0){
     var $flag = 1;
     $("input:checkbox").each(function() {
   	   if($(this).is(":checked")){
   	   	var $Id = $(this).attr("name");
   	   	 if($flag == 1){
   	   	  if(confirm("确定要删除吗?")){
           $(this).parent().parent().remove(); 
   	     	$.ajax({
   	   	     url: DeleteData,
   	   	     data: {"Id":$Id},
   	   	     success: function(){
                location.reload();
   	   	     }
   	       })
   	      }
   	      $flag = 0;
   	   	 }else{
   	   	   $(this).parent().parent().remove();
   	   	   $.ajax({
   	   	     url: DeleteData,
   	   	     data: {"Id":$Id},
   	   	     success: function(){
   	   	     	location.reload();
   	   	     }
   	       })
   	   	 }
        }   	  
     })
     $("#in").text("success!");
    }else{
      alert("还没有选中!");
    }     
     if($("input:checkbox").length == 0){
       $("#selectAll").remove();
       $("#noselectAll").remove();
     }
   })
 })

 // 单个点击选中
$(document).ready(function(){
  $("input:checkbox").click(function(){
    if($(this).attr("checked")){
      $(this).attr("checked",false);
    }else{
      $(this).attr("checked",true);
    }
  })
}) 
 
// 增加   time[parseInt(Math.random()*3)]
var time = new Array("14:00:00","22:30:00","15:00:00");
var site = new Array("EEE","FFF","GGG");
var mission = new Array("EEEEE","FFFFF","GGGGG");
$(document).ready(function(){
  $("#Add").click(function(){
  	$html = "<tr class=\"content\"><td><input type=\"checkbox\" class=\"checkbox\" name=\"checkbox\"/></td>";
    $html += "<td class=\"cont\"><select name=\"time\" class=\"time\">";
    for(var i=0;i<time.length;i++){
          $html += "<option>" + time[i] + "</option>";
    }
    $html += "</select></td><td class=\"cont\"><select name=\"site\" class=\"site\">"; 
    for(var i=0;i<site.length;i++){
          $html += "<option>" + site[i] + "</option>";
    }
    $html += "</select></td><td class=\"cont\"><select name=\"mission\" class=\"mission\">";
    for(var i=0;i<mission.length;i++){
          $html += "<option>" + mission[i] + "</option>";
    }
    $html += "</select></td></tr>";
    $("table#main").append($html);
  })
})

// 保存
$(document).ready(function(){
  $("#Save").click(function(){
  	 var $time_ = new Array(); 
  	 var $site_ = new Array();
  	 var $mission_ = new Array();
  	 $(".time").each(function(index){
  	     $time_temp = $(this).find("option:selected").text();
  	     $time_.push($time_temp); 	  
  	 })
  	 $(".site").each(function(index){
  	     $site_temp = $(this).find("option:selected").text();
  	     $site_.push($site_temp); 	  
  	 })
  	 $(".mission").each(function(index){
  	     $mission_temp = $(this).find("option:selected").text();
  	     $mission_.push($mission_temp); 	  
  	 })
  	 if($time_.toString() == ""||$site_.toString() == ""||$mission_.toString() == ""){
  	    alert("还没有增加数据!");
  	 }else{
  	 	 if(confirm("确定要保存数据吗?")){
             $.ajax({
  	           url: InputData,
  	           data: {"time":$time_.toString(),"site":$site_.toString(),"mission":$mission_.toString()},
  	           success: function(){
                    location.reload();
  	                //$("#in").text("success!");
  	                alert("保存成功!")
  	           }
  	        })  
         }	 
  	 }
/*  	 for(var i in $time_){
  	    document.write($time_[i]+" ");
  	 }*/
  	 //alert($time_.toString());
  	 //alert($time_ + "/n" + $site_ + "<br />" + $mission_);
  	 //alert($(".time").find("option:selected").text());
   })
})


 $(document).ready(function(){
    $("#savenl").click(function(){
       $.ajax({
          url: InputInfor,
          data: {"Name":$("#name").val(),"Logo":$("#logo").val()},
          success: function(){
              $("#suc").text("success!");
          }
       })
    })
 })