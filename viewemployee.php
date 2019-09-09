<?php
session_start();
    include("header.php");
include("dbconnection.php"); 

if(isset($_POST[submitsearch]))
{

$qresult=mysql_query("select * from employees where empid!= '100' AND branchid='$_POST[branchid]'");
}
else
{
$qresult=mysql_query("select * from employees where empid!= '100' ");
}
	$qresultbranch=mysql_query("select * from branch");
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02"><strong><a href="addemployees.php">Add Employee</a></strong></div>
               	<div class="header_02">
               	  <form id="form1" name="form1" method="post" action="">
               	    <label for="branchid"><strong>Select Branch </strong></label>
               	    <select name="branchid" id="branchid">
                    <?php
                   while($arrows = mysql_fetch_array($qresultbranch))
				   {
					   echo " <option value='$arrows[branchid]'> $arrows[branchname] </option>";
				   }
					?>
           	        </select>
                    <input name="submitsearch" id="submitsearch" type="submit" value="Search" />
           	      </form>
               	</div>
   	      <table width="500" border="1">
       	      <tr>
       	        <th width="111" scope="col">Employee Name</th>
       	        <th width="75" scope="col">Login ID</th>
       	        <th width="93" scope="col">Branch Name</th>
       	        <th width="93" scope="col">Salary</th>
       	        <th width="94" scope="col">Contact No</th>
   	        </tr>
			<?php
			while($arrvar=mysql_fetch_array($qresult))
			{
				
				echo "        <tr>
              <td>&nbsp; $arrvar[fname] $arrvar[lname]</td>
              <td>&nbsp;$arrvar[loginid]</td>";
$qresulta=mysql_query("select * from branch where branchid='$arrvar[branchid]'");
$arrowsbr = mysql_fetch_array($qresulta);
              echo "<td>&nbsp;$arrowsbr[branchname]</td>
			  <td>&nbsp;$arrvar[basicsalary]</td>
			  <td>&nbsp;$arrvar[contactno]</td>
            </tr>";
			}

        		
			?>
   
   	      
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