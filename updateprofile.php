<?php
session_start();
?>

<script>
function validateFormupd()
{
var fn=document.forms["formup"]["fname"].value;
var ln = document.forms["formup"]["lname"].value;
var lg = document.forms["formup"]["loginid"].value;
var oldpas = document.forms["formup"]["oldpassword"].value;
var chk = document.forms["formup"]["passcheck"].value;
var newpas = document.forms["formup"]["newpassword"].value;
var confpas = document.forms["formup"]["confpassword"].value;


if (fn==null || fn=="")
  {
  alert("First name must be filled out");
  return false;
  }
  
  if (ln==null || ln=="")
  {
  alert("Last name must be filled out");
  return false;
  }
  
  if (lg==null || lg=="")
  {
  alert("Login ID must be filled out");
  return false;
  }
  
  if (document.getElementById("passcheck").checked==true)
  {

	  if (oldpas==null || oldpas=="")
	  {
	  alert("OLD Password must be filled out");
	  return false;
	  }
	  

	  if (newpas==null || newpas=="")
	  {
	  alert("New Password must be filled out");
	  return false;
	  }
	  
	  if (confpas==null || confpas=="")
	  {
	  alert("Confrim Password must be filled out");
	  return false;
	  }
  
	  if (newpas!=confpas)
	  {
	  alert("New Password and Confrom Password must be same");
	  return false;
	  }
  
  }
}

	 function enable_text(status)
	{
	status=!status;	
	document.formup.oldpassword.disabled = status;
	document.formup.newpassword.disabled = status;
	document.formup.confpassword.disabled = status;
	}

</script>

<?php
include("header.php");
include("dbconnection.php");
if(isset($_SESSION[emid]))
{
	$empidss = $_SESSION[emid];
}
else
{
	$empidss = $_SESSION[empid];
}

if(isset($_POST["update"]))
{
	if($_POST["passcheck"] == "on")
	{

	mysql_query("UPDATE employees SET fname='$_POST[fname]',lname='$_POST[lname]',loginid='$_POST[loginid]',password='$_POST[newpassword]' where empid='$empidss' AND password='$_POST[oldpassword]'");
	if(mysql_affected_rows() == 1)
	{
	$att = "Admin profile and Password updated successfully...";
	}
	
	}
	else
	{
	mysql_query("UPDATE employees SET fname='$_POST[fname]',lname='$_POST[lname]',loginid='$_POST[loginid]' where empid='$empidss'");
		$att = "Admin profile updated successfully...";
	}
}
	$resultq = mysql_query("select * from employees where empid='100'");
	while($rowsa = mysql_fetch_array($resultq))
	{
	$fname = $rowsa["fname"];
	$lname = $rowsa["lname"];
	$loginid = $rowsa["loginid"];			
	}
?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">Admin profile</div>
       	  <form id="formup" name="formup" method="post" action=""  onsubmit="return validateFormupd()">
            <table width="554" height="350" border="5">
              <tr>
                <th height="31" colspan="2" bgcolor="#CCFFFF" scope="row"><p>
                  <?php
				echo $att; 
				?>
                </p></th>
              </tr>
              <tr>
                <th width="281" height="36" scope="row"><div align="right">First Name</div></th>
                <td width="263">&nbsp; 
                  <label for="fname"></label>
                <input name="fname" type="text" id="fname" size="40" value="<?php echo $fname; ?>" /></td>
              </tr>
              <tr>
                <th height="35" scope="row"><div align="right">Last Name</div></th>
                <td><input name="lname" type="text" id="lname" size="40"  value="<?php echo $lname; ?>" /></td>
              </tr>
              <tr>
                <th height="38" scope="row"><div align="right">Login ID</div></th>
                <td><input name="loginid" type="text" id="loginid" size="40"  value="<?php echo $loginid; ?>" /></td>
              </tr>`
              <tr>
                <th height="21" scope="row">&nbsp;</th>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th height="35" scope="row" align="right">Change Password</th>
                <td><input type="checkbox" name="passcheck" id="passcheck" />
                <label for="passcheck"></label></td>
              </tr>
              <tr>
                <th height="35" scope="row"><div align="right">Old Password/Current Password</div></th>
                <td>&nbsp;
                <input name="oldpassword" type="password" id="oldpassword" size="40" /></td>
              </tr>
              <tr>
                <th height="35" scope="row"><label for="newpassword">
                  <div align="right">New Password</div>
                </label></th>
               <td>&nbsp;
                <input name="newpassword" type="password" id="newpassword" size="40" /></td> 
             <tr>
                <th height="36" scope="row"><label for="confirmpassword">
                  <div align="right">New Confirm Password</div>
                </label></th>
               <td>&nbsp;
               <input name="confpassword" type="password" id="confpassword" size="40" /></td>    
              
              </tr>
              <tr>
       
              </tr>
              <tr>
                <th scope="row">&nbsp;</th>
                <td><input type="submit" name="update" id="update" value="Update" /></td>
              </tr>
            </table>
          
       	  </form>
      
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