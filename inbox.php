<?php
session_start();
    include("header.php");
	include("dbconnection.php");
$dttim = date("Y-m-d h:i:s");
	if(isset($_GET[msgid]))
	{
		mysql_query("DELETE FROM message where msgid='$_GET[msgid]'");
		$msgres = "Message deleted successfully...";
	}
	if(isset($_SESSION["emid"]))
	{
	$result = mysql_query("SELECT * FROM message where receiverid='$_SESSION[login]'");
	}
	else
	{
	$result = mysql_query("SELECT * FROM message where receiverid='$_SESSION[loginid]'");
	}
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">Inbox</div>
       	  <p class="bi_para"><a href="message.php">Send Message</a>&nbsp; | <a href="sentmessage.php">Sent messages</a><?php echo $msgres; ?></p>
       	  <form id="form1" name="form1" method="post" action="">
            <table width="600" border="1">
    
<?php
		 		echo " <tr>";
                echo " <th scope='col' width='45' >Delete</th>";
                echo " <th scope='col'>SENDER</th>";
                echo " <th scope='col'>SUBJECT</th>";
                echo " <th scope='col'>TIME</th>";
                echo " </tr>";
			   while($row = mysql_fetch_array($result))
			  	{
    			echo " <tr>";
                echo " <th scope='col'><a href='inbox.php?msgid=$row[msgid]'>Delete</a></th>";
                echo " <th scope='col'>$row[senderid]</th>";
                echo " <th scope='col'><a href='viewmessage.php?msgid=$row[msgid]'>$row[msgtitle]</a></th>";
                echo " <th scope='col'>$row[datetime]</th>";
                echo " </tr>";
 				}
?>       
</table>
       	 
       	    <br>
       	  </form>
          <p>&nbsp;</p>
<div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            <div class="cleaner"></div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        
        	<div class="content_right_section">
            	
                         <?php
			 if($_SESSION["logintype"] = "Admin")
			 {
				include("adminsidebar.php");
			 }
			 else
			 {
				 include("empsidebar.php");
			 }
				?>
              <div class="margin_bottom_20"></div>
              <a href="http://jigsaw.w3.org/css-validator/check/referer"></a>
            
            </div>
            
        </div> <!-- end of content right -->
        
        <div class="cleaner"></div>
        
    </div>
   <?php
   include("footer.php");
   ?>