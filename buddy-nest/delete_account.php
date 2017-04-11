<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$pass_entered=$_POST['pass'];
$query="SELECT password FROM password WHERE u_id='$userid'";
$result=mysql_query($query);
$pass_db=mysql_result($result,0,'password');
$img="profile-pics/".$userid."."."jpg";
if($pass_entered==$pass_db)
{
echo "Deleting... Please Wait"."<br />";
$query="DELETE FROM friends WHERE user='$userid'||friend='$userid'";
mysql_query($query);
$query="DELETE FROM friend_request WHERE user_s='$userid'||user_r='$userid'";
mysql_query($query);
$query="DELETE FROM friend_request WHERE user_s='$userid'||user_r='$userid'";
mysql_query($query);
$query="DELETE FROM message WHERE s_id='$userid'||r_id='$userid'";
mysql_query($query);
$query="DELETE FROM password WHERE u_id='$userid'";
mysql_query($query);
$query="DELETE FROM profile WHERE u_id='$userid'";
mysql_query($query);
$query="DELETE FROM t_comment WHERE u_id='$userid'";
mysql_query($query);
$query="DELETE FROM t_likes WHERE u_id='$userid'";
mysql_query($query);
$query="DELETE FROM t_post WHERE u_id='$userid'";
mysql_query($query);
unlink($img);
echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="2; URL=log_out.php">
</head>
<body>
<h3>Your Account has been Successfully Deleted</h3>
<h3><a href="log_out.php">Click Here</a> if it doesnot automatically redirect you</h3>
</body>
</html>
_HTML;
}

else
{
echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="5; URL=log_out.php">
</head>
<body>
<h3>Sorry, you have entered incorrect password and you will now be logged out because of security reasons.</h3>
<h3>Log in Again and try again</h3>
<h3>If this page doesn't automatically redirect within 6 seconds, <a href="log_out.php">click here</a> to continue</h3> 
</body>
</html>
_HTML;
}
}
else
{
echo <<<_HTML
<h3>Please <a href="home.php">Log In</a> To View this Page.</h3>
_HTML;
}
?>