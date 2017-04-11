<?php

include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$query="UPDATE profile SET f_name='$_POST[f_name]',l_name='$_POST[l_name]',gender='$_POST[gender]',d_o_b='$_POST[dob]',e_mail='$_POST[email]',country='$_POST[country]',about='$_POST[about]',hometown='$_POST[hometown]',religion='$_POST[religion]' WHERE u_id='$userid'";
if(!mysql_query($query))
{
die(mysql_error());
}
echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=view_profile.php">
</head>
<body>
<h4>Changes saved successfully</h4><br />
<a href="view_profile.php"><h3>View Profile</h3></a>
</body>
</html>
_HTML;
}
else
{
echo <<<_HTML
<h3>Please <a href="home.html">Log In</a> To View this Page.</h3>
_HTML;
}
?>