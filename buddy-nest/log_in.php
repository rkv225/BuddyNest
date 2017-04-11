<?php
include_once 'functions.php';
$id=$_POST['u_id'];
$pass_f=$_POST['pass'];
$pass_db=" ";
$query="SELECT password FROM password WHERE u_id='$id'";
$result=mysql_query($query);

$rows=mysql_num_rows($result);

if($rows==0)
{
echo "Incorrect User ID";
echo <<<_END
<br>
Try Again
<br>
<a href="home.php" />HOME</a>
_END;
}

else
{
for($i=0;$i<$rows;$i++)
{
$pass_db=mysql_result($result,$i,'password');
}
if($pass_f==$pass_db)
{
$query2="SELECT f_name FROM profile WHERE u_id='$id'";
$result2=mysql_query($query2);
$rows=mysql_num_rows($result2);
	for($i=0;$i<$rows;$i++)
	{
	$u_name=mysql_result($result2,$i,'f_name');
	}

session_start();
$_SESSION['username']=$u_name;
$_SESSION['userid']=$id;
$_SESSION['password']=$pass_f;
echo "Login Successful";
echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=view_profile.php">
</head>
<body>
<h3>You are now Logged in as $id.<br /></h3> 
<a href="view_profile.php">Click Here To View Your Profile</a>
</body>
</html>
_HTML;
}
else
{
echo "Incorrect Password";
echo <<<_END
<br>
Try Again
<br>
<a href="home.php" />HOME</a>
_END;
}
}
?>