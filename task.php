<?php
session_start();

include("header.php");
include("dbconnection.php");

if(isset($_POST[submit]))
{

$docfile = $_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);

$insdb ="INSERT INTO task(teamid,employeeid,task,others,documents) 
VALUES ('$_POST[teamid]','$_POST[employee]', '$_POST[task]','$_POST[others]','$docfile')";
mysql_query($insdb,$con);
}
	$txtc = mysql_query("select * from team where teamid='$_GET[teamid]'");
	$rowsrecd = mysql_fetch_array($txtc);
	$proinfo =$rowsrecd[teaminfo];

	$txtd = mysql_query("select * from employees where branchid='$_SESSION[brid]' AND emptype='Employees'");
?>
    <div id="templatemo_content">
   	
        <div id="templatemo_content_left">
        	<div class="header_02">Task information</div>
    <?php
		  if($_SESSION["logintype"] != "Admin")
		  {
		  ?>          
       	  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="500" height="224" border="0">
              <tr>
                <th height="40" scope="row">Team info</th>
                <td>&nbsp;<input type="hidden" value="<?php echo $_GET[teamid]; ?>" name="teamid" />
              <?php
             echo $proinfo;
         ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Select Employee</th>
                <td><label for="employee"></label>
                  <select name="employee" id="employee">
                  <?php
				  while($rw = mysql_fetch_array($txtd))
				  {
					  echo "<option value='$rw[empid]'>$rw[fname] $rw[lname]</option>";
				  }
				  ?>
                </select></td>
              </tr>
              <tr>
                <th scope="row"><label for="task2">Task</label>
&nbsp;</th>
                <td><input name="task" type="text"  id="task" size="50" align="right"/></td>
              </tr>
              <tr>
                <th scope="row"><label for="others2">Task Info</label></th>
                <td><textarea name="others" id="others" align="right"></textarea></td>
              </tr>
              <tr>
                <th scope="row"><label for="documents2">Documents</label></th>
                <td><input type="file" name="file" id="file" /></td>
              </tr>
              <tr>
                <th height="38" scope="row">&nbsp;</th>
                <td><input type="submit" name="submit" id="submit" value="Submit" />
                <input type="reset" name="reset" id="reset" value="Reset" /></td>
              </tr>
            </table>
       	  </form>
          
<?php
}
?>
          <table width="498" border="0">
            <tr bgcolor="#99CCFF">
              <th scope="col">Employee Name</th>
              <th scope="col">Task</th>
              <th scope="col">Task info</th>
              <th scope="col">Documents</th>
            </tr>
        <?php
		$txtef = mysql_query("select * from task where teamid='$_GET[teamid]'");
		while($arrrecs = mysql_fetch_array($txtef))
		{
			$txtefg = mysql_query("select * from employees where empid='$arrrecs[employeeid]'");
		while($arrg = mysql_fetch_array($txtefg))
		{
			$names = $arrg[fname]. " " . $arrg[lname];
		}
            echo "<tr>			
              <td>&nbsp;
			  $names
			  </td>
              <td>&nbsp;$arrrecs[task]</td>
              <td>&nbsp;$arrrecs[others]</td>
              <td>&nbsp;<a href='upload/$arrrecs[documents]'>$arrrecs[documents]</a></td>
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
			   if(isset($_SESSION[emid]))
				{
			   include("empsidebar.php");
				}
				else
				{
				include("adminsidebar.php");
				}
			   ?>

            <div class="margin_bottom_20"></div>
            <div class="margin_bottom_20"></div>
            <div class="margin_bottom_20"></div>
       	  </div>
            
        </div> <!-- end of content right -->
        
        <div class="cleaner"></div>
        
    </div>
    
                
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