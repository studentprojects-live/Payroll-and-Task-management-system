<?php
session_start();
    include("header.php");
include("dbconnection.php"); 
if(isset($_SESSION[emid]))
{
$qresult=mysql_query("select * from salary where empid='$_SESSION[emid]'");
}
else
{
$qresult=mysql_query("select * from salary");
}

	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        
            <div> 
              <p>View Salary<br />
              </p>
            </div>
   	      <table width="500" border="1">
       	      <tr>
       	        <th scope="col">Employee ID</th>
       	        <th scope="col">Branch ID</th>
       	        <th scope="col">Month &amp; year</th>
                <th scope="col">Basic Salary</th>
                <th scope="col">Bonus Salary</th>
                <th scope="col">PF</th> 
       	        <th scope="col">HRA</th>
                <th scope="col">LIC</th>
                <th scope="col">Total Salary</th>
   	        </tr>
            		
			                      	<?php
			
            
			while($arrvarsal=mysql_fetch_array($qresult))
			{
				
			
				echo "        <tr>
              <td>&nbsp; $arrvarsal[empid]</td>
              <td>&nbsp;$arrvarsal[branchid]</td>
              <td>&nbsp;$arrvarsal[month]$arrvar[year]</td></td>
			  <td>&nbsp;$arrvarsal[basicsalary]</td>
			  <td>&nbsp;$arrvarsal[bonussalary]</td>
			  <td>&nbsp;$arrvarsal[pf]</td>
			  <td>&nbsp;$arrvarsal[hra]</td>
			  <td>&nbsp;$arrvarsal[lic]</td>
			  <td>&nbsp;$arrvarsal[totalsalary]</td>
            </tr>";
			}

        
               ?>
        		
		     	      <tr>
       	        <td>&nbsp;</td>
       	        <td>&nbsp;</td>
       	        <td>&nbsp;</td>
       	        <td>&nbsp;</td>
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
			 if($_SESSION["logintype"] = "Admin")
			 {
				include("adminsidebar.php");
			 }
			 else
			 {
				 include("empsidebar.php");
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