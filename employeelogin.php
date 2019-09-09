<?php
session_start();
?>
<script>
function validateForm()
{
var x=document.forms["form1"]["Loginid"].value;
var pass = document.forms["form1"]["password"].value;
if (x==null || x=="")
  {
  alert("Login ID must be filled out");
  return false;
  }
  
  if (pass==null || pass=="")
  {
  alert("Password must be filled out");
  return false;
  }
}
</script>
<?php
    include("header.php");
	include("slider.php");
	include("dbconnection.php"); 
	$dt = date("Y-m-d");
	if(isset($_SESSION["login"]))
	{
		header("Location: employeehome.php");
	}
if(isset($_POST["submit"]))
{
		$result = mysql_query("SELECT * FROM employees
	WHERE loginid='$_POST[Loginid]' AND password='$_POST[password]'");
	echo "test".mysql_num_rows($result);
	if(mysql_num_rows($result) == 1)
	{
			while($mqres = mysql_fetch_array($result))
			{
		$results = mysql_query("SELECT * FROM attendance
	WHERE empid='$mqres[empid]' AND logintime>'$dt'");

	if(mysql_num_rows($results) == 1)
	{
		$_SESSION["emplogin"] ="SET";
	}
			$_SESSION["logintype"] = "Employee";
			$_SESSION["emid"] = $mqres[empid];
			$_SESSION["ename"] = $mqres[fname]. " ". $mqres[lname];
			$_SESSION["brid"] = $mqres[branchid];
			}
			$_SESSION["login"] = $_POST[Loginid];
			header("Location: employeehome.php");
	}
	else
	{
		$msg = "Invalid Login ID and Password entered";
	}

}
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">Employee Login Page</div>
            <div class="image_frame_02"><a href="#"><img src="images/employeelogn.jpg" alt="image" width="317" /></a></div>
            <p class="bi_para">&nbsp;</p>
<div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            
            <div >
         
            <?php
			if(isset($_SESSION["loginid"]))
{
echo "You already logged in<br>";
?>
   <button onclick="window.location.href='employeehome.php'">Continue</button>
<?php
}
else
{
	?> 
              <form id="form1" name="form1" method="post" action=""  onsubmit="return validateForm()">
                <p>&nbsp;<?php echo $msg; ?></p>
                <p>
                  <label for="Loginid" >Login ID</label>
                </p>
                <p>
                  <input name="Loginid" type="text" id="Loginid" size="45" />
                </p>
                <p>
                  <label for="password">Password<br />
                  </label>
                  <input name="password" type="password" id="password" size="45" />
                </p>
             
                <p> 
                  <input type="submit" name="submit" id="submit" value="Login here" />
                  <input type="reset" name="submit2" id="submit2" value="Reset" />
                </p>
               
              </form>
<?php
}
?>
              <p>&nbsp;</p>
</div>
            <div class="cleaner"></div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        
        	<div class="content_right_section">
            	
                <div class="header_02"></div> 
                
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