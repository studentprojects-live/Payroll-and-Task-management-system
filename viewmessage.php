<?php
session_start();
    include("header.php");
	include("dbconnection.php");
$dttim = date("Y-m-d h:i:s");

	$result = mysql_query("SELECT * FROM message where msgid='$_GET[msgid]'");
	
     while($row = mysql_fetch_array($result))
  {
	  	$msgid = $row[msgid];
	  	$sender = $row[senderid];
		$receiver =	$row[receiverid];
		$msgtitle =	$row[msgtitle];
		$msg =	  	$row[msg];
		$tdatetime = $row[datetime];
  }
  
  $resulta = mysql_query("SELECT * FROM message where replyid='$_GET[msgid]'");
  $replycount = mysql_num_rows($resulta);
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02"><a href="inbox.php">Inbox</a></div>
       	  <p class="bi_para"><a href="message.php">Send Message</a>&nbsp;<?php echo $msgres; ?></p>
       	  <form id="form1" name="form1" method="post" action="message.php">
       	    <table width="500" border="1">
       	      <tr>
       	        <th colspan="2" scope="col">View message</th>
   	          </tr>
       	      <tr>
       	        <td width="125" height="30"><strong>Sender : 
       	          
       	        </strong></td>
       	        <td width="359">&nbsp; <strong><?php echo $sender; ?></strong></td>
   	          </tr>
       	      <tr>
       	        <td height="29"><strong>Date Time :  </strong></td>
       	        <td>&nbsp; <strong><?php echo $dttim; ?></strong></td>
   	          </tr>
       	      <tr>
       	        <td height="33"><strong>Message title :</strong></td>
       	        <td height="33">&nbsp; <strong><?php echo $msgtitle; ?></strong></td>
   	          </tr>
       	      <tr>
       	        <td height="107" valign="top"><strong>Message: </strong></td>
       	        <td height="107" valign="top">&nbsp; <strong><?php echo $msg; ?></strong></td>
   	          </tr>
       	      <tr>
       	        <td>&nbsp;</td>
       	        <td>
                <input type="hidden" name="messageid" value="<?php echo $msgid; ?>" />
                <input type="hidden" name="senderid" value="<?php echo $sender; ?>" />
                <input type="submit" name="reply" id="reply" value="Reply" /></td>
   	          </tr>
   	        </table>
       	  </form>
          <?php
		  if($replycount>=1)
		  {
			  echo "<p><strong>&nbsp;Replies:</strong></p>";
			     while($rowas = mysql_fetch_array($resulta))
  				{
			  ?>
          
          <table width="500" border="1">
            <tr>
              <td width="125" height="30"><strong>Sender : </strong></td>
              <td width="359">&nbsp; <strong><?php echo $rowas["senderid"]; ?></strong></td>
            </tr>
            <tr>
              <td height="29"><strong>Date Time : </strong></td>
              <td>&nbsp; <strong><?php echo $rowas["datetime"]; ?></strong></td>
            </tr>
            <tr>
              <td height="33"><strong>Message title : </strong></td>
              <td height="33">&nbsp; <strong><?php echo $rowas["msgtitle"]; ?></strong></td>
            </tr>
            <tr>
              <td height="57" valign="top"><strong>Message: </strong></td>
              <td height="57" valign="top">&nbsp; <strong><?php echo $rowas["msg"]; ?></strong></td>
            </tr>
          </table>
          <br />
          <?php
		  		}
		  }
		  ?>
          <p>&nbsp;
          
          
          </p>
<div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            <div class="cleaner"></div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        
        	<div class="content_right_section">
            	
             <?php
			 if($_SESSION["login"] == "admin")
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