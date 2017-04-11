<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$pass_old=$_POST['old_pass'];
$pass_new=$_POST['new_pass'];
$pass_new_re=$_POST['new_pass_retype'];

$query="SELECT password FROM password WHERE u_id='$userid'";
$result=mysql_query($query);
$pass_old_db=mysql_result($result,0,'password');
if($pass_old==$pass_old_db)
{
if($pass_new==$pass_new_re)
{
$query="UPDATE password SET password='$pass_new' WHERE u_id='$userid'";
mysql_query($query);
echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="2; URL=settings.php">
</head>
<body>
<h3>Password Changed successfully.</h3>
if not redirected, please <a href="settings.php">Click Here</a> to continue.
</body>
</html>
_HTML;
}
else
{
echo <<<_HTML
Enter new password correctly<br>
<a href="change_password_form.php">click here</a> to try again.
_HTML;
}
}
else
{
echo <<<_HTML
You entered an incorrect password<br>
<a href="change_password_form.php">click here</a> to try again.
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