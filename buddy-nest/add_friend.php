<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$request_sender=$_POST['userid'];
$request_reciever=$userid;

$query="INSERT INTO friends(user,friend) VALUES('$request_sender','$request_reciever')";
mysql_query($query);

$query1="INSERT INTO friends(user,friend) VALUES('$request_reciever','$request_sender')";
mysql_query($query1);

$query2="DELETE FROM friend_request WHERE user_s='$request_sender'&&user_r='$request_reciever'";
mysql_query($query2);

echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=find_friends.php">
</head>
<body>
<h3>You are now friend with $request_sender</h3>
<a href="find_friends.php">Click Here</a> to continue.
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