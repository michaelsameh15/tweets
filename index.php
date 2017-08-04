<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>tweets</title>
	
		<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
	<link href="https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<?php


//echo ($json_data->text);
 //print_r($json_data[0]["text"]);
?>
<script type="text/javascript">
$(window).load(function(){
	$('.preloader').hide(1000);
    $('.preloader2').hide();
   // $('.loader').fadeOut(1000); // set duration in brackets    
});
		</script>
<script type="text/javascript">
	 function getTweets() {
str = document.getElementById("username").value;

    if (str=="") {
      
      return;
    } 
    //var category_id = document.getElementById('currid').value;
     
    if (window.XMLHttpRequest) {

      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5

      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
$('#preloader').show("slow"); 
      if (this.readyState==4 && this.status==200) {
        $('#preloader').hide("slow"); 
       document.getElementById("bo").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","getTweets.php?username="+str,true);
    xmlhttp.send();
  }
</script>
<h1 style="text-align: center;color: #1da1f2"><span class="icon-twitter"></span> Search for Tweets</h1>
<form class="myform" onsubmit="javascript:getTweets();return false;" >
<input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter User name for example:mickey_sameh">
</form>
<div id="preloader" class="preloader2">
			<div class="sk-spinner sk-spinner-wave">
     	 		<div class="sk-rect1"></div>
       			<div class="sk-rect2"></div>
       			<div class="sk-rect3"></div>
      	 		<div class="sk-rect4"></div>
      			<div class="sk-rect5"></div>
     		</div>
    	</div>
<div id="bo"></div>


</body>
</html>
