<?php
session_start();
?>
<script>
function validateFormad()
{
var y=document.forms["form2"]["Loginid"].value;
var passw = document.forms["form2"]["password"].value;
if (y==null || y=="")
  {
  alert("Login ID must be filled out");
  return false;
  }
  
  if (passw==null || passw=="")
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
	
	if(isset($_SESSION["loginid"]))
	{
		header("Location: adminhome.php");
	}
	
if(isset($_POST["submit"]))
{
		$result = mysql_query("SELECT * FROM employees
	WHERE loginid='$_POST[Loginid]' AND password='$_POST[password]' AND emptype='Admin'");

	if(mysql_num_rows($result) == 1)
	{
		while($row = mysql_fetch_array($result))
		{
			$_SESSION["logintype"] = "Admin";
			$_SESSION[empid] = $row[empid];
			$_SESSION[names] =  $row[fname]. " ". $row[lname];
		}
		$_SESSION["loginid"] = $_POST[Loginid];
		header("Location: adminhome.php");
	}
	else
	{
		$msg = "Invalid Login ID and Password entered";
	}

}
	?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">Administrator Login Page</div>
            <div class="image_frame_02"><a href="#"><img src="images/adminlogin.jpg" alt="image" /></a></div>
            <p class="bi_para">&nbsp;</p>
<div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            
            <div >
         
            <?php
			if(isset($_SESSION["login"]))
{
echo "You already logged in<br>";
?>
   <button onclick="window.location.href='adminhome.php'">Continue</button>
<?php
}
else
{
	?>
              <form id="form2" name="form2" method="post" action="" onsubmit="return validateFormad()">
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