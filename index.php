<?php
session_start();
if($_SESSION["logintype"] == "Admin")
{
	header("Location: adminhome.php");
}

if($_SESSION["logintype"] == "Employee")
{
	header("Location: employeehome.php");
}
$mp=1;
    include("header.php");
	include("dbconnection.php");
	include("slider.php");
	
	
	?>

    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">Online Employee payroll and Task management system</div>
            <div class="image_frame_02"><a href="#"><img src="images/templatemo_image_02.jpg" alt="image" /></a></div>
            <p>Our project <strong>Employee payroll and Task Management  System </strong>is an online  application we create a website to check No. of employees in each branch,  Employees records, Tasks and time frame, attendance records, salary details,  etc.</p>
<p class="bi_para">&nbsp;</p>
          <div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            
            <div class="content_left_two_column margin_right_40">
            	<div class="header_02"></div>
                <p>The employees can submit their attendance, and the managers  can check employee attendance and his task details, etc. Also Branch Manager  can calculate and disburse salary to his employees. </p>

            </div>
            
            <div class="content_left_two_column">
            	<div class="header_02"></div>
              <ul>
                  <li><strong>Administrator</strong>:  The administrator is a super user and he has  complete control over all activities the can be performed. The administrator  can view Branch details, Employee details, task details, salary details, etc.</li>
                  <li><strong>Brach  Manager:</strong> The branch manager who handles employees and he assign tasks to  his employees. </li>
                  <li><strong>Employees</strong>:  Employees are the co-workers and they will complete the task given by the  branch manager.</li>
              </ul>
              <p>&nbsp;</p>
               
            </div>
            
            <div class="cleaner"></div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        
        	<div class="content_right_section">
            	
                <div class="header_02"><u>New Projects</u></div>
                 <?php
				 $result = mysql_query("SELECT * FROM project ORDER BY  projectid DESC ");
				 while( $rowsres = mysql_fetch_array($result))
                echo "<div class='header_02'>$rowsres[projectname]</div>";
				 ?>
            <div class="news_section">
                  <div class="news_image"></div>
              </div>
                
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