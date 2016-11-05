/**
 * 
 */
/*
$(document).ready(function(){
	//readXmlByJs();
	read();
})*/





/*function readXmlByJs(){
	var xmlFileName="http://localhost/Thinkphp/uploads/Content/content.xml";  
	var xmlDoc='';  
	alert("123");
	if (window.ActiveXObject){ // IE     
	    var activeXNameList=new Array("MSXML2.DOMDocument.6.0","MSXML2.DOMDocument.5.0","MSXML2.DOMDocument.4.0","MSXML2.DOMDocument.3.0","MSXML2.DOMDocument","Microsoft.XMLDOM","MSXML.DOMDocument");  
	    for(var h=0;h<activeXNameList.length;h++)  
	    {  
	        try{  
	            xmlDoc=new ActiveXObject(activeXNameList[h]);  
	        }catch(e){  
	            continue;  
	        }  
	        if(xmlDoc) break;     
	    }  
	}else if(document.implementation && document.implementation.createDocument){ //非 IE  
	    xmlDoc=document.implementation.createDocument("","",null);    
	}else{  
	    alert('can not create XML DOM object, update your browser please...');  
	}  
	xmlDoc.async=false;  //同步,防止后面程序处理时遇到文件还没加载完成出现的错误,故同步等XML文件加载完再做后面处理  
	xmlDoc.load(xmlFileName); //加载XML
	
	if (window.ActiveXObject){
		//var nodeList= xmlDoc.documentElement.getElementsByTagName("subcontent")； // IE  
		for(var i=0;i<nodeList.length;i++){  
		    //...遍历操作...  
		}
	}else{
		var nodeList=xmlDoc.getElementsByTagName("subcontent");  // 非IE  
		alert("123");
		for(var i=0;i<nodeList.length;i++){  
		     
		} 
	}
}*/

