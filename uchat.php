<?php
session_start();
    include("header.php");
include("dbconnection.php");
$result1 = mysql_query("SELECT * FROM project where branchid='$_SESSION[brid]'");
if(isset($_POST[branchid]))
{
$resul = mysql_query("SELECT * FROM employees where branchid='$_POST[branchid]'");
}
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
       
            <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
      <input type="button" value="Click Here to Chat" onclick="window.open('chatsend.php','popUpWindow','height=550,width=425,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');">
	  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
       	  <p>
       	    <label for="Branch">Select project : </label>
       	    
       	    <select name="branchid" id="branchid">
       	      <?php
			  while($arrows = mysql_fetch_array($result1))
			  {
				  echo "<option value='$arrows[branchid]'>$arrows[projectname]</option>";
			  }
			  ?>
   	        </select>
     	    <input type="submit" name="submit" id="submit" value="Select" />
       	  </p>
   	      <table width="500" border="2">
       	      <tr>
       	        <th width="111" scope="col">Employee Name</th>
       	        <th width="75" scope="col">Login ID</th>
       	        <th width="93" scope="col">Branch Name</th>
       	        <th width="93" scope="col">Chat</th>

   	        </tr>
            <?php
			while($arrvar=mysql_fetch_array($resul))
			{
				$resul2 = mysql_query("SELECT * FROM branch where branchid='$arrvar[branchid]'");
				$arrvar2=mysql_fetch_array($resul2);
				echo "        <tr>
              <td>&nbsp; $arrvar[fname] $arrvar[lname]</td>
              <td>&nbsp;$arrvar[loginid]</td>
              <td>&nbsp;$arrvar2[branchname]</td>
			  <td>&nbsp;";
			  ?>
			        <input type="button" value="Click Here to Chat" onclick="window.open('chatsend.php','popUpWindow','height=550,width=425,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');">
			  <?php
			 echo " </td>
		
            </tr>";
			}

        		
			?>
   
   	      
   	       	      
   	      </table>
   	      <p><br />
   	      </p>
            </table>
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
                <div class="margin_bottom_20"></div>
          <div class="margin_bottom_20"></div>
       	  </div>
            
        </div> <!-- end of content right -->
        
        <div class="cleaner"></div>
        
    </div>
   <?php
   include("footer.php");
   ?>