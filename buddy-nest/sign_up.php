<?php
include_once 'functions.php';
if($_POST['f_name']==""||$_POST['l_name']==""||$_POST['f_name']==""||$_POST['u_id']==""||$_POST['pwd1']==""||$_POST['pwd2']=="")
{
echo <<<_HTML
<html>
<head>
</head>
<body>
Fill your form correctly.
Press Back Button or
<a href="sign_up_form.php"><h3>Click here to try again</h3></a>
</body>
</html>
_HTML;
}
else
{
$id=$_POST['u_id'];
$query="SELECT u_id FROM password";
$result=mysql_query($query);
$rows=mysql_num_rows($result);
for($i=0;$i<$rows;$i++)
{
$x=mysql_result($result,$i,'u_id');
if($id==$x)
{
$userid_exists=true;
}
}
if(isset($userid_exists))
{
echo <<<_HTML
<html>
<head>
</head>
<body>
Try different UserId.
Press back button or
<a href="sign_up_form.php"><h3>Click here to try again</h3></a>
</body>
</html>
_HTML;
}
else
{
if($_POST['pwd1']!=$_POST['pwd2'])
{
echo <<<_HTML
<html>
<head>
</head>
<body>
Enter your password correctly.
Press Back Button or
<a href="sign_up_form.php"><h3>Click here to try again</h3></a>
</body>
</html>
_HTML;
}
else
{
$dob=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
$query="insert into profile(f_name,l_name,gender,d_o_b,e_mail,country,u_id) values('$_POST[f_name]','$_POST[l_name]','$_POST[gender]','$dob','$_POST[e_mail]','$_POST[country]','$_POST[u_id]')";
if(!mysql_query($query))
{
die(mysql_error());
}
$query="insert into password(u_id,password) values('$_POST[u_id]','$_POST[pwd1]')";
if(!mysql_query($query))
{
die(mysql_error());
}
echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="4; URL=home.php">
</head>
<body>
You have Successfully Registered.
<a href="home.php"><h3>Click here to log in</h3></a>
</body>
</html>
_HTML;
}
}
}
?>

