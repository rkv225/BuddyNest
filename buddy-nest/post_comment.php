<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$t_id=$_POST['t_id'];

if(isset($_POST['comment']))
{
$posted_comment=$_POST['comment'];
$time=time()+19800;
$query2="INSERT INTO t_comment(t_id,u_id,time,comment) VALUES('$t_id','$userid','$time','$posted_comment')";
mysql_query($query2);
}

echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=view_feeds.php">
</head>
<body>
Your Comment is posted<br>
<form method="post" action="comments.php">
<input type="hidden" name="t_id" value='$t_id' />
<input type="submit" value="Comments">
</form>
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