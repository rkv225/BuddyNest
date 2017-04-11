<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$feed_text=$_POST['text'];

$query="SELECT t_id FROM t_post";
$result=mysql_query($query);
$rows=mysql_num_rows($result);
$rows=$rows-1;
$gen_text_id=mysql_result($result,$rows,'t_id');
$gen_text_id=$gen_text_id+1;

$gen_time=time()+19800;

$query1="INSERT INTO t_post(t_id,u_id,time,post) VALUES('$gen_text_id','$userid','$gen_time','$feed_text')";
mysql_query($query1);

echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=view_feeds.php">
</head>
<body>
You content was successfully Posted<br />
<a href="view_feeds.php">Feeds</a>
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