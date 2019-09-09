<html>
<head>
<script type="text/javascript">
function scrollBottom()
   {
    var objControl=document.forms["FrmTestScroll"].elements["chat"];
    objControl.scrollTop = objControl.scrollHeight;
   }
 </script>
</head>
<body onLoad="scrollBottom()">
<?php
include("dbconnection.php");
$result = mysql_query("SELECT * FROM chat");
echo "<form method='post' action='' name='FrmTestScroll' id='FrmTestScroll'>
<textarea name='chat'  cols='45' rows='20'>";
while($rowa = mysql_fetch_array($result))
  {
	 $resulta = mysql_query("SELECT * FROM employees where empid='$rowa[senderid]'");
	 $rowaa = mysql_fetch_array($resulta);
	  $names = $rowaa['fname'] ." ". $rowaa['lname'];
  echo  $names . " : " . $rowa['message']. "\n";
  echo "_____________________________________________\n";
  }
echo "</textarea>";
echo "</form>";
?> 
</body>
</html>