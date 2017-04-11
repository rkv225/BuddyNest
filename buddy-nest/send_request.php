<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$request_sender=$userid;
$request_reciever=$_POST['userid'];

$query="INSERT INTO friend_request(user_s,user_r) VALUES('$request_sender','$request_reciever')";
mysql_query($query);

echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=find_friends.php">
</head>
<body>
<h3>Friend Request Sent Successfully</h3><br>
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