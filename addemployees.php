<?php
session_start();
?>

<script>
function validateFormadem()
{
var fn=document.forms["formadem"]["firstname"].value;
var ln = document.forms["formadem"]["lastname"].value;
var dob= document.forms["formadem"]["dob"].value;
var logi = document.forms["formadem"]["loginid"].value;
var pass = document.forms["formadem"]["password"].value;
var confpass = document.forms["formadem"]["confirmpassword"].value;
var bn = document.forms["formadem"]["branchname"].value;
var jndate = document.forms["formadem"]["joineddate"].value;
var bs = parseInt(document.forms["formadem"]["basicsalary"].value);
var addr = document.forms["formadem"]["address"].value;
var cty = document.forms["formadem"]["city"].value;
var coun = document.forms["formadem"]["country"].value;
var ste = document.forms["formadem"]["state"].value;
var cntno = document.forms["formadem"]["contactno"].value;
var emptype = document.forms["formadem"]["employeetype"].value;
var expe = document.forms["formadem"]["experience"].value;


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
  
 
  if (logi==null || logi=="")
  {
  alert("Login ID must be filled out");
  return false;
  }
  

  
  if ( pass==null || pass=="")
  {
  alert("Password must be filled out");
  return false;
  }

  if ( confpass==null || confpass=="")
  {
  alert(" Confrom Password must be filled out");
  return false;
  }
  

  if ( pass!=confpass)
  {
  alert("Password and confrom Password  must be same");
  return false;
  }
  
  if ( bn==null || bn=="")
  {
  alert(" Branch name must be filled out");
  return false;
  }
  if(bs<4999)
  {
	  alert("Basic salary must be greater than 5000");
	  return false;
  }
  if ( addr==null || addr=="")
  {
  alert(" Address must be filled out");
  return false;
  }
    if ( cty==null || cty=="")
  {
  alert(" City must be filled out");
  return false;
  }
  
   if (coun==null || coun=="")
  {
  alert("Country must be filled out");
  return false;
  }
  if (ste==null || ste=="")
  {
  alert("State must be filled out");
  return false;
  }
  
  if (contno==null || contno=="")
  {
  alert("Contact No must be filled out");
  return false;
  }
  
  

   if (emptype==null || emptype=="")
  {
  alert("Employee Type must be filled out");
  return false;
  }
  if (expe==null ||expe=="")
  {
  alert("Experience must be filled out");
  return false;
  }

}
</script>

<?php
include("header.php");
include("dbconnection.php");

$result = mysql_query("SELECT * FROM branch");

$dateofbirth = $_POST[dob];
$dobs = date("Y-m-d", strtotime($dateofbirth));

$joindate = $_POST[joineddate];
$joindt = date("Y-m-d", strtotime($joindate));

if(isset($_POST["submit"]))
{
$insdb ="INSERT INTO employees(fname,lname,loginid,password,branchid,joindate,basicsalary,address,city,state,country,contactno,sex,dob,emptype,expirence) VALUES 
('$_POST[firstname]','$_POST[lastname]', '$_POST[loginid]','$_POST[password]','$_POST[branchname]','$joindt','$_POST[basicsalary]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[country]','$_POST[contactno]','$_POST[radio]','$dobs','$_POST[employeetype]','$_POST[experience]')";
$recc = mysql_query($insdb,$con);
}

if(isset($_POST[updatebtn]))
{
	mysql_query("update employees set loginid = ''$_POST[firstname]','$_POST[lastname]', '$_POST[loginid]','$_POST[radio]','$_POST[branchname]','$_POST[joineddate]','$_POST[basicsalary]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[country]','$_POST[contactno]','$_POST[radio]','$_POST[dob]','$_POST[employeetype]','$_POST[experience]'");
}

$txt=mysql_query("select * from branch");
	?>

    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">Add A New Employee</div>
       	  <p>&nbsp;<?php echo $succ; ?><a href="viewemployee.php"><strong>View Employee</strong></a></p>
          <form id="formadem" name="formadem" method="post" action="" onsubmit="return validateFormadem()">
            <p>
              <label for="firstname">First Name </label>
              &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="firstname" type="text" id="firstname" size="50" /> 
            </p>
            <p>
              <label for="lastname">Last Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="lastname" type="text" id="lastname" size="50" />
            </p>
            <p>
              <label for="sex">Sex  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;
<label for="male">
  <input name="radio" type="radio" id="male" value="male" checked="checked" />
  Male</label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="radio" id="female" value="female" />
              <label for="female">Female</label>
            </p>
            <p>
              <label for="dob">Date_Of_Birth   </label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
	  		<input type="Text" name="dob" id="dob" maxlength="25" size="25"><a href="javascript:NewCal('dob','ddmmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
            </p>
            <p>
              <label for="loginid">Login ID</label>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="loginid" id="loginid" />
            </p>
            <p>
              <label for="password">Password</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="password" name="password" id="password" />
            </p>
            <p>
              <label for="confirmpassword">Confirm Password</label>
              <input type="password" name="confirmpassword" id="confirmpassword" />
            </p>
            <p>
              <label for="branchname">Branch Name</label>
              <select name="branchname" id="branchname">
              <option></option>
              <?php
              while($row = mysql_fetch_array($result))
  {
echo "<option value='". $row['branchid'] . "'>" . $row['branchname']. "</option>";
  }
?>
              </select>
            </p>
            <p>
              <label for="joineddate">Joined Date</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
	  		<input type="Text" name="joineddate" id="joineddate" maxlength="25" size="25"><a href="javascript:NewCal('joineddate','ddmmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
            </p>
            <p>
              <label for="basicsalary">Basic Salary</label> 
              &nbsp;&nbsp;&nbsp;&nbsp;     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="basicsalary" id="basicsalary" />
            </p>
            <p>
              <label for="address">Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
              <textarea name="address" id="address" cols="45" rows="5"></textarea>
            </p>
            <p>
              <label for="city">City</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="city" id="city" />
            </p>
            <p>
              <label for="country">Country</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="country"></label>
            <select name="country" id="country">
              <option value="India">India</option>
              <option value="USA">USA</option>
              <option value="Sri lanka">Sri lanka</option>
            </select>
            </p>
            <p>
              <label for="state">State</label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select name="state" id="state">
                <option value="Karnataka">Karnataka</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Kerala">Kerala</option>
              </select>
            </p>
            <p>
              <label for="contactno">Contact No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="contactno" id="contactno" />
            </p>
            <p>
              <label for="employeetype">Employee Type</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <select name="employeetype" id="employeetype">
                <option value="Employees">Employees</option>
                <option value="Branch Manager">Branch Manager</option>
              </select>
            </p>
            <p>
              <label for="experience">Experience</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="experience" id="experience" />
            </p>
            <p>
              <input type="submit" name="submit" id="submit" value="Add employees" />
              <input type="reset" name="reset" id="reset" value="Reset" />
              <input name="update" type="button" value="Update" />
            </p>
            <p>&nbsp;</p>
          </form>
          <p>&nbsp;</p>
      <div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            <div class="cleaner"></div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        
        	<div class="content_right_section">
            	
                <?php
				include("adminsidebar.php");
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