<?php
session_start();
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
include("header.php");
include("dbconnection.php");
$logindt = date("Y-m-d");
$qresult=mysql_query("SELECT * FROM attendance WHERE logintime >  '$logindt 00:00:00' AND logintime <  '$logindt 23:59:59' AND empid ='$_SESSION[emid]'");
$counts = mysql_num_rows($qresult);
$attid = date("Y-m-d h:i:s");
		if(isset($_POST["login"]))
		{
		$insdb ="INSERT INTO attendance(empid,logintime) VALUES ('$_SESSION[emid]','$attid')";
		mysql_query($insdb,$con);
		$affrow = mysql_affected_rows();
		   if($affrow == 1)
		   {
			  $att = "Employee logged in successfully..."; 
		   }
		$_SESSION["emplogin"] ="SET";
		}

		if(isset($_POST["logout"]))
		{
			$attid = date("Y-m-d h:i:s");
		$insdb ="UPDATE attendance SET logout='$attid' where empid='$_SESSION[emid]' ";
		mysql_query($insdb,$con);
		$affrow = mysql_affected_rows();
		   if($affrow == 1)
		   {
			  $att = "Employee logged Out successfully..."; 
		   }
		}
$qresult=mysql_query("SELECT * FROM attendance WHERE logintime >  '$logindt 00:00:00' AND logintime <  '$logindt 23:59:59' AND empid ='$_SESSION[emid]'");
$counts = mysql_num_rows($qresult);

echo date('d-m-Y H:i:s');
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">Employee home</div>
       	  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
       	    <table width="500" height="296" border="0">
              <tr>
                <th colspan="2" scope="row" bgcolor="#CCFFFF"><p>Welcome <?php echo $_SESSION["ename"]; ?>
                </p>
                <?php
                if($affrow == 1)
				{
				echo $att; 
				}
				?>
              </tr>
              <tr>
                <th scope="row">Employee ID</th>
                <td>&nbsp;<?php echo $_SESSION["emid"]; ?></td>
              </tr>
              <tr>
                <th scope="row">Login ID</th>
                <td>&nbsp;<?php echo $_SESSION["login"]; ?></td>
              </tr>
              <tr>
                <th scope="row">Branch Name</th>
                <td>&nbsp;<?php 
				$txtb = mysql_query("select * from branch where branchid='$_SESSION[brid]'");
				$rowsrec = mysql_fetch_array($txtb);
				echo $rowsrec["branchname"]; 
				?></td>
              </tr>
              <?php
			  if($counts == 0)
			  {
			  ?>
              <tr>
                <th scope="row"><label for="logintime2">Login Time </label></th>
                <td><input name="logintime" type="text" id="logintime" size="35" value="<?php echo date("d-m-Y h:i:s"); ?>" readonly/></td>
              </tr>
              <?php
			  }
			  else
			  {
			  ?>
              <tr>
                <th scope="row"><label for="logout">Logout</label></th>
                <td><input name="logout2" type="text" id="logout2" size="35" value="<?php echo date("d-m-Y h:i:s"); ?>" readonly /></td>
              </tr>
              <?php
			  }
			  ?>
              <tr>
                <th scope="row">&nbsp;</th>
                <td>
                 <?php
			  if($counts == 0)
			  {
			  ?>
                <input type="submit" name="login" id="login" value="Login" />             
                  <?php
			  }
			  else
			  {
			  ?>
                <input type="submit" name="logout" id="logout" value="logout" />
                 <?php
			  }
			  ?>	 
                </td>
              </tr>
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
			 if($_SESSION["loginid"] == "admin")
			 {
				include("adminsidebar.php");
			 }
			 else
			 {
				 include("empsidebar.php");
			 }
	?>
        	  <div class="news_section">
                <div class="news_content">
                      <div class="news_title"></div>
                </div>
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