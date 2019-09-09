<?php
session_start();
?>
<script language="javascript" type="text/javascript">
function getXMLHTTP() { 
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(countryId) {		
		var strURL="findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
</script>
<script>
function validateFormadbr()
{
var bn=document.forms["formadb"]["branchname"].value;
var addr = document.forms["formadb"]["address"].value;
var city= document.forms["formadb"]["city"].value;
var state = document.forms["formadb"]["state"].value;
var coun = document.forms["formadb"]["country"].value;
var contno = parseInt(document.forms["formadb"]["contactno"].value);

		 if (isNaN(contno)) 
		 {
			alert("Please enter a number only.");
				  return false;
		 }
		  if (bn==null || bn=="")
		  {
		  alert("Branch name must be filled out");
		  return false;
		  }
		  
		  if (addr==null || addr=="")
		  {
		  alert("Address must be filled out");
		  return false;
		  }
		  
		  if (city==null || city=="")
		  {
		  alert("City must be filled out");
		  return false;
		  }
		  
		  if (state==null || state=="")
		  {
		  alert("State must be filled out");
		  return false;
		  }
		  
		   if (coun==null || coun=="")
		  {
		  alert("Country must be filled out");
		  return false;
		  }
		  
		   if (contno==null || contno=="")
		  {
		  alert("Contact No must be filled out");
		  return false;
		  }


}

</script>

<?php
    include("header.php");
	include("slider.php");
	include("dbconnection.php");
	
	if(isset($_POST[addbranch]))
	{
		$sql="INSERT INTO branch (branchname,address,city,state,country,contactno) VALUES ('$_POST[branchname]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[country]','$_POST[contactno]')";
	
		if (!mysql_query($sql,$con))
		{
		die('Error: ' . mysql_error());
		}
		if(mysql_affected_rows())
		{
			$brad = "New branch record inserted successfully...";
		}
	}
	
		if(isset($_POST[updatebtn]))
		{
		mysql_query("UPDATE branch SET branchname='$_POST[branchname]',address='$_POST[address]',city='$_POST[city]',state='$_POST[state]',country='$_POST[country]',contactno='$_POST[contactno]' where branchid='$_POST[brid]'");
		header("Location: addnewbranch.php");
		}
		if(isset($_POST[updatebtna]))
		{
		header("Location: addnewbranch.php");
		}
		if(isset($_POST[deletebtn]))
		{
				mysql_query("DELETE FROM branch where branchid='$_POST[brid]'");
						header("Location: addnewbranch.php");
		}
	
			$branchreca  =mysql_query("select * from branch where branchid='$_GET[brids]'");
			
			$arrvara=mysql_fetch_array($branchreca);
			
			$brid =$arrvara[branchid];
			$brname = $arrvara[branchname];
            $brcity = $arrvara[city];
            $brstate = $arrvara[state];
			$brcountry = $arrvara[country];
			$brcont = $arrvara[contactno];
			$braddress = $arrvara[address];
        		
	?> 
<div id="templatemo_content">
   	
    <div id="templatemo_content_left">
        	<div class="header_02">Add/Update A New Branch</div>

          <form id="formadb" name="formadb" method="post" action="" onsubmit="return validateFormadbr()">
       
            <table width="500" border="3">
              <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col" align="left">&nbsp;<?php echo $brad; ?></th>
              </tr>
              <tr>
                <th scope="col"><strong>Branch Name</strong></th>
                <th scope="col" align="left">
                <input type="hidden" name="brid" id="brid" value="<?php echo $_GET[brids]; ?>"/>
                <input type="text" name="branchname" id="branchname"  value="<?php echo $brname; ?>"/></th>
              </tr>
              <tr>
                <td><strong>
                  <label for="address2">Address</label>
                </strong></td>
                <td><textarea name="address" id="address" cols="45" rows="5"><?php echo $braddress; ?></textarea></td>
              </tr>
              <tr>
                <td><strong>
                  <label for="city2">City</label>
                </strong></td>
                <td><input type="text" name="city" id="city"  value="<?php echo $brcity; ?>"/></td>
              </tr>
                <tr>
                <td><strong>
                  <label for="country2">Country</label>
                </strong></td>
                <td>
                 <?php
			$arr = array("India", "Sri lanka", "Australia");
			?>
            <select name="country" id="country"  onChange="getState(this.value)">
              <option value="">Select country</option>
              <?php
			  foreach($arr as $value)
			  {
				   if($value == $brcountry)
					 {
					 echo "<option value='$value' selected>$value</option>";
					 }
					 else
					 {
					 echo "<option value='$value'>$value</option>";
					 }
			  }
			  ?>
            </select>
				</td>
              </tr>
              <tr>
                <td><strong>
                  <label for="state2">State</label>
                </strong></td>
                <td>
                <?php
				$arrcont = array("New Delhi","Karnatka","Kerala","Tamil Nadu","Others");
				?>
               <div id="statediv">
               
               <select name="state" id="state">
               <option value="Select state">Select state</option>
              <?php
				 foreach($arrcont as $value)
				 {
					 if($value == $brstate)
					 {
					 echo "<option value='$value' selected>$value</option>";
					 }
					 else
					 {
					 echo "<option value='$value'>$value</option>";
					 }
				 }
				 ?>
            </select></div>
               </td>
              </tr>
            
              <tr>
                <td><strong>
                  <label for="contactno3">Contact No</label>
                </strong></td>
                <td><input type="text" name="contactno" id="contactno"  value="<?php echo $brcont; ?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                <?php
				if(isset($_GET[brids]))
				{
				?>
    	            <input type="submit" name="updatebtn" id="updatebtn" value="Update Branch" />
	                <input type="submit" name="deletebtn" id="deletebtn" value="Delete Branch" />
                    <input type="submit" name="updatebtna" id="updatebtna" value="Cancel" />
                <?php
				}
				else
				{
				?>
					<input type="submit" name="addbranch" id="addbranch" value="Add Branch" />
				  <?php
				}
				?>
                </td>
              </tr>
            </table>
          </form>
          <table width="500" border="1">
            <tr>
              <th width="142" scope="col"><label for="branchname2">Branch Name</label></th>
              <th width="45" scope="col">City</th>
              <th width="200" scope="col"><label for="contactno2">State</label></th>
              <th width="85" scope="col">Country</th>
                      <th width="85" scope="col">Contact no</th>
            </tr>
            <?php
			$branchrec  =mysql_query("select * from branch");
			while($arrvar=mysql_fetch_array($branchrec))
			{
				
				echo "        <tr>
              <td>&nbsp;<a href='addnewbranch.php?brids=$arrvar[branchid]'>$arrvar[branchname]</a></td>
              <td>&nbsp;$arrvar[city]</td>
              <td>&nbsp;$arrvar[state]</td>
			       <td>&nbsp;$arrvar[country]</td>
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