<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$t_id=$_POST['t_id'];

$query="DELETE FROM t_post WHERE t_id='$t_id'";
mysql_query($query);

$query="DELETE FROM t_comment WHERE t_id='$t_id'";
mysql_query($query);

$query="DELETE FROM t_likes WHERE t_id='$t_id'";
mysql_query($query);

echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=view_feeds.php">
</head>
<body>
<h3>Post deleted successfully</h3>
<br />
<h3><a href="view_feeds.php">Click Here</a></h3>
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