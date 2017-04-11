<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$request_sender=$userid;
$request_reciever=$_POST['userid'];

$query="DELETE FROM friend_request WHERE user_s='$request_sender'&&user_r='$request_reciever'";
mysql_query($query);

echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=find_friends.php">
</head>
<body>
<h3>Friend Request Cancelled Successfully</h3><br>
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