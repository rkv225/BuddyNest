<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$r_id=$_POST['reciever'];
$message=$_POST['message'];
$time=time()+19800;

$query="INSERT INTO message(s_id,r_id,time,message) VALUES('$userid','$r_id','$time','$message')";
mysql_query($query);

echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=messages.php">
</head>
<body>
<h3>Message Sent Successfully</h3>
<a href="messages.php">Click Here</a> to continue.
</body>
</html>
_HTML;

}
else
{
echo <<<_HTML
<h3>Please <a href="home.php">Log In</a> To View this Page.</h3>
_HTML;
}
?>