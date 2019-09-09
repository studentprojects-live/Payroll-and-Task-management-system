<?php
session_start();
include("header.php");
include("dbconnection.php"); 
if(isset($_SESSION[emid]))
{
	$qresult=mysql_query("select * from project where branchid='$_SESSION[brid]'");
}
else
{
	$qresult=mysql_query("select * from project");

}
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">
 <h2>View Project</h2>
        	</div>
            <div class="header_02">
           
		  <?php
			   if(isset($_SESSION[loginid]))
				{
			?>
            <strong><a href="addnewprojects.php">Add Project</a></strong><br />
             </a>
            <?php
			}
			?>
            </div>
   	      <table width="630" border="1">
       	      <tr bgcolor="#FFFFCC">
       	        <th width="127" scope="col">Project Name</th>
       	        <th width="99" scope="col">Branch ID</th>
       	        <th width="146" scope="col">Start Date</th>
       	        <th width="109" scope="col">End Date</th>
                <th width="115" scope="col">Project status</th>
   	        </tr>
            		
				
                      	<?php
			
            
			while($arrvarpro=mysql_fetch_array($qresult))
			{
				
				echo "<tr> <td>&nbsp; ";
			if(isset($_SESSION[emid]))
			{
			echo "<a href='addnewprojects.php?proids=$arrvarpro[projectid]'>$arrvarpro[projectname]</a>";
			}
			else
			{
			echo "<a href='addnewprojects.php?proids=$arrvarpro[projectid]'>$arrvarpro[projectname]</a>";
			}
			$qresulta=mysql_query("select * from branch where branchid='$arrvarpro[branchid]'");
			$arrowsbr = mysql_fetch_array($qresulta);

			  echo "</td>
              <td>&nbsp;$arrowsbr[branchname]</td>
              <td>&nbsp;$arrvarpro[startdate]</td>
			  <td>&nbsp;$arrvarpro[enddate]</td>
			   <td>&nbsp;$arrvarpro[projectstatus]</td>
            </tr>";
			}
               ?>
        		
		     	      <tr>
       	        <td>&nbsp;</td>
       	        <td>&nbsp;</td>
       	        <td>&nbsp;</td>
       	        <td>&nbsp;</td>
                <td>&nbsp;</td>
   	        </tr>
   	      </table>
   	      <p>&nbsp;</p>
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
                
        <div class="news_section">
                  <div class="news_image"></div>
                <div class="news_content">
                      <div class="news_title"></div>
          </div>
              </div>
                <div class="news_section">
                  <div class="news_content"> </div>
              </div>
                
                <div class="margin_bottom_20"></div>
        	</div>
            
        </div> <!-- end of content right -->
        
        <div class="cleaner"></div>
        
    </div>
    
   <?php
   include("footer.php");
   ?>