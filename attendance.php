<?php
session_start();
include("header.php");
include("dbconnection.php");
$result = mysql_query("SELECT * FROM branch");
$resultemp = mysql_query("SELECT * FROM employees where empid!='100'");
if(isset($_POST[Submit]))
{
$resultatt = mysql_query("SELECT * FROM attendance where empid='$_POST[employeename]' ");
}
else
{
	$resultatt = mysql_query("SELECT * FROM attendance");
}
?>
<div id="templatemo_content">
   
    <div id="templatemo_content_left">
        	<div class="header_02">Employees Attendance report</div>
       	  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

          <table width="409" border="1">
            <tr>
                <th width="181" scope="row"><label for="branchname2">Branch Name</label>                </th>
                <td width="212"><select name="branchname" id="branchname" va>
          
              <option></option>
              <?php
              while($row = mysql_fetch_array($result))
  {
echo "<option value='". $row['branchid'] . "'>" . $row['branchname']. "</option>";
  }
?>
      </select></td>
              </tr>
              <tr>
                <th scope="row"><label for="employeename">Employee Name</label>                </th>
                <td><select name="employeename" id="employeename">
                   <?php
              while($row = mysql_fetch_array($resultemp))
  {
		echo "<option value='". $row['empid'] . "'>" . $row['fname']. " ". $row['lname']  ."</option>";
  }
?>
                </select></td>
              </tr>
              <tr>
                <th scope="row"><label for="month">Month
/            
            
            Year
          </label>                </th>
                <td><select name="month" id="month">
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
                  <select name="year" id="year">
                  <?php
				  for($yr = 2013; $yr <= 2015; $yr++)
				  {
					  echo "<option value='$yr'>$yr</option>";
				  }
				  ?>
                </select></td>
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
              </tr>
            </table>
       <br />            
            <table width="614" border="1">
              <tr>
                <th width="108" scope="row"><strong>Employee ID</strong></th>
                <th width="181"><strong> Employe Name</strong></th>
                <th width="155"><strong>Login Time</strong></th>
                <th width="142"><strong>Logout Time</strong></th>
                <th width="142">&nbsp;Working hours</th>
              </tr>
              <?php
			  while($rwarray = mysql_fetch_array($resultatt))
			  {
				  $resultempa = mysql_query("SELECT * FROM employees where empid='$rwarray[empid]'");
				  $resarr = mysql_fetch_array($resultempa);
			
			$resulatt = mysql_query("SELECT TIMEDIFF(  '$rwarray[logout]',  '$rwarray[logintime]' )");
			  $resarra = mysql_fetch_array($resulatt);
              echo "<tr>			
                <td>&nbsp;$rwarray[empid]</td>
                <td>&nbsp;$resarr[fname]	$resarr[lname]</td>
                <td>&nbsp;$rwarray[logintime]</td>
                <td>&nbsp;$rwarray[logout]</td>
				   <td>&nbsp;$resarra[0]</td>
              </tr>";
			  
			  }
			  ?>
            </table>
            <p>&nbsp;</p>
          </form>
          <p>&nbsp;</p>
      <div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            <div class="cleaner"></div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        
        	<div class="content_right_section">
            	
                <div class="header_02">Admin Menu</div> 
                
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