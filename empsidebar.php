<?php
session_start();
$logindt = date("Y-m-d");

if($_SESSION["emplogin"] == "SET")
{
?>

<div class="header_02"><a href="employeehome.php"><strong>Employee Home</strong></a></div> 
<div class="header_02"><strong><a href="viewproject.php">View Project</a></strong></div> 
<div class="header_02"><strong><a href="team.php">Team</a></strong></div>
<div class="header_02"><strong><a href="task.php">Task</a></strong></div>
<div class="header_02"><strong><a href="uchat.php">Chat</a></strong></div> 
<div class="header_02"><strong><a href="inbox.php">Messages</a></strong></div> 
<div class="header_02"><strong><a href="viewsalary.php">Salary report</a></strong></div>
<div class="header_02"><strong><a href="logout.php">Logout</a></strong></div> 
<?php
}
?>