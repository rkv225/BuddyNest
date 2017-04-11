<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$user1=$userid;
$user2=$_POST['userid'];

$query="DELETE FROM friends WHERE user='$user1'&&friend='$user2'";
mysql_query($query);

$query1="DELETE FROM friends WHERE user='$user2'&&friend='$user1'";
mysql_query($query1);

echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=view_friends.php">
</head>
<body>
<h3>You are no longer friend with $user2</h3><br>
<h3><a href="view_friends.php">Click Here</a></h3> `
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