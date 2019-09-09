<?php
session_start();
include("dbconnection.php");

if(isset($_POST["Message"]))
{
$insdb ="INSERT INTO chat(senderid,message) VALUES ('$_SESSION[emid]','$_POST[mess]')";
$recc = mysql_query($insdb,$con);
}
?>
<html> 
<head> 
<title>Chat Box</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<script> 
function createRequestObject() { 
var ro; 
var browser = navigator.appName; 
if(browser == "Microsoft Internet Explorer"){ 
ro = new ActiveXObject("Microsoft.XMLHTTP"); 
}else{ 
ro = new XMLHttpRequest(); 
} 
return ro; 
} 

var http = createRequestObject(); 

function sndReq() { 
http.open('get', 'chatview.php'); 
http.onreadystatechange = handleResponse; 
http.send(null); 
setTimeout("sndReq()", 2000); // Recursive JavaScript function calls sndReq() every 2 seconds 
} 

function handleResponse() { 
if(http.readyState == 4){ 
var response = http.responseText; 
if (response != responseold || responsecheck != 1) { 
var responsecheck = 1; 
document.getElementById("messages").innerHTML = http.responseText; 
var responseold = response; 
} 
} 
} 
</script> 

</head> 
<body onLoad="javascript:sndReq();"> 
<div id="messages"></div> 
<p><strong>Send Message:</strong></p>
<form name="form1" method="post" action="">
  <p>
    <label for="mess"></label>
    <textarea name="mess" id="mess"   cols='45' rows='5'></textarea>
  </p>
  <p>
    <input type="submit" name="Message" id="Message" value="Send Message">
  </p>
</form>
<p>&nbsp;</p>
</body> 
</html>