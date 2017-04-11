<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$query2="SELECT user_s FROM friend_request WHERE user_r='$userid'";
$result2=mysql_query($query2);
$rows2=mysql_num_rows($result2);
if(isset($rows2))
{
for($p=0;$p<$rows2;$p++)
{
$rp[$p][0]=mysql_result($result2,$p,'user_s');
$t_id=$rp[$p][0];
$query4="SELECT f_name,l_name FROM profile WHERE u_id='$t_id'";
$result4=mysql_query($query4);
$rows4=mysql_num_rows($result4);
for($x=0;$x<$rows4;$x++)
{
$rp[$p][1]=mysql_result($result4,$x,'f_name');
$rp[$p][2]=mysql_result($result4,$x,'l_name');
}
}
}


$query3="SELECT user_r FROM friend_request WHERE user_s='$userid'";
$result3=mysql_query($query3);
$rows3=mysql_num_rows($result3);
if(isset($rows3))
{
for($s=0;$s<$rows3;$s++)
{
$rs[$s][0]=mysql_result($result3,$s,'user_r');
$t_id=$rs[$s][0];
$query5="SELECT f_name,l_name FROM profile WHERE u_id='$t_id'";
$result5=mysql_query($query5);
$rows5=mysql_num_rows($result5);
for($y=0;$y<$rows5;$y++)
{
$rs[$s][1]=mysql_result($result5,$y,'f_name');
$rs[$s][2]=mysql_result($result5,$y,'l_name');
}
}
}

if(isset($_POST['key']))
{
$s_key=$_POST['key'];

$query="SELECT f_name,l_name,u_id FROM profile WHERE f_name LIKE '$s_key' || l_name LIKE '$s_key'";
$result=mysql_query($query);

$rows=mysql_num_rows($result);

for($i=0;$i<$rows;$i++)
{
$profile[$i][0]=mysql_result($result,$i,'f_name');
$profile[$i][1]=mysql_result($result,$i,'l_name');
$profile[$i][2]=mysql_result($result,$i,'u_id');
}
}


echo <<<_HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Buddy Nest | Find Friends</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" href="icon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="icon.ico" type="image/x-icon" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>
<div class="main">
  <div class="main_resize">
    <div class="header">
      <div class="logo">
        <h1><a href="view_profile.php"><span>Buddy </span>Nest <small>Stay Connected</small></a></h1>
      </div>
    </div>
      <div class="clr"></div>
      <div class="hbg"></div>
  </div>
    <div class="content">
      <div class="content_bg">
        <div class="mainbar">
          <div class="article">
            <h2>Find Friends</h2>
          </div>
          <div class="article">
		  <h3>Search Friends by Name</h3>
		  <form method="post" action="find_friends.php">
		  <table>
		  <tr>
		  <td><input class="h" type="text" name="key" size="30" /></td>
		  <td><input class="h" type="image" name="search" src="images/search.gif" alt="Search" title="Search" /></td>
			</tr>
			</table>
		  </form>
_HTML;

if(isset($_POST['key']))
{
if(!$rows)
echo "sorry, no match found";
}

if(isset($rows))
{
for($j=0;$j<$rows;$j++)
{
$id=$profile[$j][2];
if($userid==$id)
{
echo "sorry, no match found";
continue;
}
$k[$j]="profile-pics/".$profile[$j][2]."."."jpg";
echo <<<_HTML
<table>
<tr>
<td><img src='$k[$j]' width="60" height="60"></td>
_HTML;
echo "<td>".$profile[$j][0]."</td>";
echo "<td>".$profile[$j][1]."</td>";
echo <<<_HTML
<td>
<form action="other_user_profile.php" method="post">
<input type="hidden" name="userid" value=$id>
<input class="h" type="submit" value="View Profile">
</form>
</td>
</tr>
</table>
_HTML;
}
}
		  
echo <<<_HTML
		  <hr>
		  <h3>Your Pending Requests</h3>
_HTML;
if(isset($rows2))
{
for($i2=0;$i2<$rows2;$i2++)
{
$img1[$i2]="profile-pics/".$rp[$i2][0]."."."jpg";
echo <<<_HTML
<table>
<tr>
<td>
<img src='$img1[$i2]' width="60" height="60" />
</td>
<td>
_HTML;
echo $rp[$i2][1];
echo <<<_HTML
</td>
<td>
_HTML;

echo $rp[$i2][2];
echo <<<_HTML
</td>
<td>
<form method="post" action="add_friend.php">
_HTML;
$tmp=$rp[$i2][0];
echo <<<_HTML
<input type="hidden" name="userid" value='$tmp'>
<input class="h" type="submit" value="Accept Request">
</form>
</td>
<td>
<form method="post" action="delete_request.php">
<input type="hidden" name="userid" value='$tmp'>
<input class="h" type="submit" value="Delete Request">
</form>
</td>
</tr>
</table>
_HTML;
}
}




echo <<<_HTML
		  <hr>
		  <h3>Your Sent Requests</h3>
_HTML;


if(isset($rows3))
{
for($i3=0;$i3<$rows3;$i3++)
{
$img2[$i3]="profile-pics/".$rs[$i3][0]."."."jpg";
echo <<<_HTML
<table>
<tr>
<td>
<img src='$img2[$i3]' width="60" height="60" />
</td>
<td>
_HTML;
echo $rs[$i3][1];
echo <<<_HTML
</td>
<td>
_HTML;

echo $rs[$i3][2];
echo <<<_HTML
</td>
<td>
<form method="post" action="cancel_request.php">
_HTML;
$tmp=$rs[$i3][0];
echo <<<_HTML
<input type="hidden" name="userid" value='$tmp'>
<input class="h" type="submit" value="Cancel Request">
</form>
</td>
</table>
_HTML;

}
}

echo <<<_HTML
            <p class="spec">&nbsp;</p>
          </div>
          <div class="pagenavi"></div>
        </div>
        <div class="sidebar">
          <div class="gadget">
            <h2 class="star"><span>$username</span> </h2>
            <div class="clr"></div>
            <ul class="sb_menu">
      <li><a href="view_profile.php">Profile</a></li>
      <li><a href="view_feeds.php">Feeds</a></li>
      <li><a href="messages.php">Messages</a></li>
      <li><a href="view_friends.php">Friends</a></li>
      <li><a href="find_friends.php">Find Friends</a></li>
      <li><a href="settings.php">Settings</a></li>
      <li><a href="log_out.php">Log Out</a></li>
            </ul>
          </div>
          </div>
        </div>
        <div class="clr"></div>
      </div>
    </div>
</div>
  <div class="fbg"></div>
</div>
<div class="footer"></div>
<div align=center></div></body>
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