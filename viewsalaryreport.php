<?php
    include("header.php");
include("dbconnection.php"); 

$qresult=mysql_query("select * from salary where empid='$_SESSION[emid]'");
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        
            <div> 
              <p><img src="images/burning108.gif" width="515" height="149" /><br />
              </p>
            </div>
          <form id="form1" name="form1" method="post" action="">
            <table width="606" border="1">
              <tr>
                <th width="345" scope="row"><label for="slno">SL NO </label>                  <input type="text" name="slno" id="slno" /></th>
                <td width="245"><label for="Salaryyear">Salary Year</label>
                <input type="text" name="Salaryyear" id="Salaryyear" /></td>
              </tr>
              <tr>
                <th scope="row"><label for="EmployeeID">Employee ID</label>
                <input type="text" name="EmployeeID" id="EmployeeID" /></th>
                <td><label for="SalaryMonth">Salary Month</label>
                <input type="text" name="SalaryMonth" id="SalaryMonth" /></td>
              </tr>
              <tr>
                <th scope="row"><label for="EmployeeName">Employee Name</label>
                <input type="text" name="EmployeeName" id="EmployeeName" /></th>
                <td><label for="Date">Date</label>
                <input type="text" name="Date" id="Date" /></td>
              </tr>
              <tr>
                <th scope="row"><label for="BranchName">Branch Name</label>
                <input type="text" name="BranchName" id="BranchName" /></th>
                <td>&nbsp;</td>
              </tr>
            </table>
          </form>
          <table width="600" border="1">
            <tr>
              <th width="590" scope="row"><label for="Basicsalary">Basic Salary</label>
              <input type="text" name="Basicsalary" id="Basicsalary" /></th>
            </tr>
            <tr>
              <th scope="row"><label for="EmployeeID">Provident Fund</label>
                <input type="text" name="pf" id="EmployeeID" /></th>
            </tr>
            <tr>
              <th scope="row"><label for="EmployeeName"> HRA</label>
                <input type="text" name="hra" id="EmployeeName" /></th>
            </tr>
            <tr>
              <th scope="row"><p>
                <label for="BranchName"> LIC</label>
                <input type="text" name="lic" id="BranchName" />
              </p></th>
            </tr> <tr>
              <th scope="row"><p>
                <label for="BranchName"> Total Salary Paid</label>
                <input type="text" name="totalsalarypaid" id="BranchName" />
              </p></th>
            </tr>
             <tr>
              <th scope="row"><p align="center">
                <input type="submit" name="print" id="print" value="PRINT" />
              </p></th>
            </tr><strong></strong>
          </table>
          <p>&nbsp;</p>
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