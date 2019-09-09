<?php
session_start();
    include("header.php");
	include("dbconnection.php"); 
		
	$txtb = mysql_query("select * from project where projectid='$_POST	[projid]'");
	while($rowsrec = mysql_fetch_array($txtb))
		{
		$projectid = $rowsrec[projectid];
		$projectname = $rowsrec[projectname];
		}
if(isset($_POST["submit"]))
{
$insdb ="INSERT INTO team(empid,teaminfo,projectid,branchid,comment) VALUES('$_SESSION[emid]','$_POST[teaminfo]', '$_POST[proid]','$_SESSION[brid]','$_POST[comment]')";
mysql_query($insdb,$con);
}

	$txtc = mysql_query("select * from team where empid='$_SESSION[emid]'");
	
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        <?php
		if(isset($_POST[projid]))
		{
		?>
        	<div class="header_02">Create Team</div>
       	  <form id="form1" name="form1" method="post" action="">
            <table width="713" height="212" border="0">
              <tr>
                <th width="143" height="33" scope="row">Project Name</th>
                <td width="560">
                <input type="hidden" name="proid" value="<?php echo $projectid; ?>" />
                <input name="projectid" type="text"  id="projectname" value="<?php echo $projectname; ?>" size="50" align="right" readonly="readonly"/></td>
              </tr>
              <tr>
                <th height="59" scope="row"  >Team Info</th>
                <td><textarea name="teaminfo" cols="39" id="teaminfo" align="right"></textarea></td>
              </tr>
              <tr>
                <th height="56" scope="row"><label for="comment2">Comment</label></th>
                <td><textarea name="comment" cols="39" id="comment" align="right"></textarea></td>
              </tr>
              <tr>
                <th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Create Team for <?php echo $projectname; ?> project" />                  <input type="reset" name="reset" id="reset" value="Reset" /></th>
              </tr>
            </table>
       	  </form>
          <?php
		}
		  ?>
          <div class="header_02">Current Development Projects</div>
          <table width="609" border="1">
            <tr>
              <th width="54" scope="col">Team ID</th>
              <th width="143" scope="col">Project Name</th>
              <th width="267" scope="col">Team Info</th>
              <th width="117" scope="col">Task info</th>
            </tr>
         <?php
		    while($rowsreca = mysql_fetch_array($txtc))
		{
		?>
            <tr>
              <td height="42">&nbsp;<?php echo $rowsreca[teamid]; ?></td>
              <td>&nbsp;<?php 
			  
			  $txtd = mysql_query("select * from project where projectid='$rowsreca[projectid]'");
			  $rowsrecd = mysql_fetch_array($txtd);
			  echo $rowsrecd[projectname]; 
			  
			  ?></td>
              <td><?php echo $rowsreca[teaminfo]; ?>No. of Employees working for this project</td>
              <td align="center"> <a href="task.php?teamid=<?php echo $rowsreca[teamid]; ?>"><strong>View</strong></a><strong></strong></td>
            </tr>
         <?php
		}
		?>
          </table>
          <div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            <div class="cleaner"></div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        
        	<div class="content_right_section">
            	
                 <?php
			   if(isset($_SESSION[emid]))
				{
			   include("empsidebar.php");
				}
				else
				{
				include("adminsidebar.php");
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