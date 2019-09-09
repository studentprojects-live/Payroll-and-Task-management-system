<?php
$country=$_GET['country'];

$arrindia = array("Karnataka","Kerala","Bihar","New Delhi");
$arraustralia = array("Perth","b","z");
$arrsrilanka = array("Colombo","y","z");
?>
<select name="state">
<?php 
if($country == "India")
{
	foreach($arrindia as $value)
	{
		echo "<option value='$value'>$value</option>";
	}
}

else if($country == "Australia")
{
	foreach($arraustralia as $value)
	{
		echo "<option value='$value'>$value</option>";
	}	
}

else if($country == "Sri lanka")
{
	foreach($arrsrilanka as $value)
	{
		echo "<option value='$value'>$value</option>";
	}	
}

else
{
}
?>
</select>