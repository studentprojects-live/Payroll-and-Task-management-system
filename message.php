<?php
session_start();
    include("header.php");
	include("dbconnection.php");
	if(isset($_SESSION[loginid]))
	{
		$sentto = $_SESSION[loginid];
	}
	else
	{
		$sentto = $_SESSION[login];
	}
$dttim = date("Y-m-d h:i:s");
$result = mysql_query("SELECT * FROM employees");
if(isset($_POST["sendmesage"]))
{
$insdb ="INSERT INTO message(senderid,receiverid,msgtitle,msg,datetime) VALUES 
('$sentto','$_POST[senderid]','$_POST[subject]','$_POST[message]','$dttim')";

mysql_query($insdb,$con);
if(mysql_affected_rows() == 1)
{
	$msgres ="Message Sent successfully...";
}
}
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">Compose Message</div>
       	  <p class="bi_para"><a href="inbox.php"><strong>&nbsp;View Message</strong></a> <?php echo $msgres; ?></p>
       	  <form id="form1" name="form1" method="post" action="">
       	    <table width="500" border="0">
       	      <tr>
       	        <th height="41" scope="col">
                   <?php
				if(isset($_POST["messageid"]))
				{
					echo "<label for='to2'>Reply to:</label>";
				}
				else
				{
                	echo "<label for='to2'>TO:</label>";
				}
				?>
                <label for="subject2"></label></th>
       	        <th scope="col" align="left">
                <?php
				if(isset($_POST["messageid"]))
				{
					echo  $_POST["senderid"];
					echo "<input name='senderid' type='hidden' value='$_POST[senderid]' />";
				}
				else
				{
					?>
                <select name="senderid" id="to">
       	          <option> Select Employee</option>
       	        <?php   	
	   				while($row = mysql_fetch_array($result))
					  {
					echo "<option value='". $row['loginid'] . "'>" . $row['loginid'] ."</option>";
					  }
				?>
   	            </select>
                <?php
				}
				?>
                </th>
   	          </tr>
       	      <tr>
       	        <td><label for="subject3">Subject:</label>
                <label for="message2"></label></td>
       	        <td><input name="subject" type="text" id="subject" value="" size="40" /></td>
   	          </tr>
       	      <tr>
       	        <td><label for="message3">Message</label></td>
       	        <td><textarea name="message" id="message" cols="45" rows="5"></textarea></td>
   	          </tr>
       	      <tr>
       	        <td>&nbsp;</td>
       	        <td><input type="submit" name="sendmesage" id="sendmesage" value="Send Message" />
   	            <input type="submit" name="cancel" id="cancel" value="Cancel" /></td>
   	          </tr>
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