<?php
	$con= mysql_connect("localhost","root","technology");
if(!$con)
{
 die('could not connect;'.mysql_error());
}

mysql_select_db("payroll_and_taskmanagmnt",$con);
?>