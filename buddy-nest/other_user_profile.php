<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$id_visited=$_POST['userid'];
$query="SELECT f_name,l_name,gender,d_o_b,e_mail,country,about,hometown,religion FROM profile WHERE u_id='$id_visited'";
$result=mysql_query($query);
$rows=mysql_num_rows($result);
for($i=0;$i<$rows;$i++)
{
$visited_profile_f_name=mysql_result($result,$i,'f_name');
$visited_profile_l_name=mysql_result($result,$i,'l_name');
$visited_profile_gender=mysql_result($result,$i,'gender');
$visited_profile_d_o_b=mysql_result($result,$i,'d_o_b');
$visited_profile_e_mail=mysql_result($result,$i,'e_mail');
$visited_profile_country=mysql_result($result,$i,'country');
$visited_profile_about=mysql_result($result,$i,'about');
$visited_profile_hometown=mysql_result($result,$i,'hometown');
$visited_profile_religion=mysql_result($result,$i,'religion');
}
$name_visited=$visited_profile_f_name;
$title=$name_visited."'s"." Profile";
$p_pic="profile-pics/".$id_visited."."."jpg";

$condition=" ";

$query1="SELECT user_r FROM friend_request WHERE user_s='$userid'&&user_r='$id_visited'";
$result1=mysql_query($query1);
$rows1=mysql_num_rows($result1);
if($rows1!=0)
{
$condition=1;
}

$query2="SELECT user_s FROM friend_request WHERE user_r='$userid'&&user_s='$id_visited'";
$result2=mysql_query($query2);
$rows2=mysql_num_rows($result2);
if($rows2!=0)
{
$condition=2;
}

$query3="SELECT user FROM friends WHERE user='$userid'&&friend='$id_visited'";
$result3=mysql_query($query3);
$rows3=mysql_num_rows($result3);
if($rows3!=0)
{
$condition=3;
}

echo <<<_HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Buddy Nest | $title</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" href="icon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="icon.ico" type="image/x-icon" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 200px;
	height: 135px;
	z-index: 1;
	left: 747px;
	top: 158px;
}
#apDiv2 {
	position: absolute;
	width: 200px;
	height: 178px;
	z-index: 2;
	left: 1px;
	top: 155px;
}
</style>
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
            <h2>$title          </h2>
          </div>
          <div class="article">
		  <img src='$p_pic' width="200" height="250" />
		  
		  <table cellpadding="5">
		  <tr>
		  <td><b>First Name</b> :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>
		  <td>$visited_profile_f_name</td>
		  </tr>
		  <tr>
		  <td><b>Last Name</b> : </td>
		  <td>$visited_profile_l_name</td>
		  </tr>
		  <tr>
		  <td><b>Gender</b> : </td>
		  <td>$visited_profile_gender</td>
		  </tr>
		  <tr>
		  <td><b>Date of Birth</b> : </td>
		  <td>$visited_profile_d_o_b</td>
		  </tr>
		  <tr>
		  <td><b>E-Mail</b> : </td>
		  <td>$visited_profile_e_mail</td>
		  </tr>
		  <tr>
		  <td><b>Country</b> : </td>
		  <td>$visited_profile_country</td>
		  </tr>
		  <tr>
		  <td><b>About</b> : </td>
		  <td>$visited_profile_about</td>
		  </tr>
		  <tr>
		  <td><b>Hometown</b> : </td>
		  <td>$visited_profile_hometown</td>
		  </tr>
		  <tr>
		  <td><b>Religion</b> : </td>
		  <td>$visited_profile_religion</td>
		  </tr>
		  </table>
		  
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
		  <div id="apDiv1"> 
_HTML;
		  
switch($condition)
{
case 1:
echo <<<_END
<form method="POST" action="cancel_request.php">
<input type="hidden" name="userid" value='$id_visited'>
<input class="h" type="submit" value="Cancel Request">
</form>
_END;
break;
case 2:
echo <<<_END
<table>
<tr>
<td>
<form method="POST" action="add_friend.php">
<input type="hidden" name="userid" value='$id_visited'>
<input class="h" type="submit" value="Accept Request">
</form>
</td>
<td>
<form method="post" action="delete_request.php">
<input type="hidden" name="userid" value='$id_visited'>
<input class="h" type="submit" value="Delete Request">
</form>
</td>
</tr>
</table>
_END;
break;
case 3:
echo <<<_END
<form method="POST" action="send_message.php">
<input type="hidden" name="reciever" value='$id_visited'>
<input class="h" type="submit" value="Message">
</form>
_END;
break;
default:
echo <<<_END
<form method="POST" action="send_request.php">
<input type="hidden" name="userid" value='$id_visited'>
<input class="h" type="submit" value="Send Request">
</form>
_END;
break;
}

echo <<<_HTML
	  
<div id="apDiv2">
_HTML;
if($condition==3)
{
echo <<<_HTML
<table>
<tr>
<td>
<form method="post" action="view_others_feeds.php">
<input type="hidden" name="userid" value='$id_visited'>
<input class="h" type="submit" value="Feeds">
</form>
</td>
</tr>
<tr>
<td>
<form method="post" action="view_others_friends.php">
<input type="hidden" name="userid" value='$id_visited'>
<input class="h" type="submit" value="Friends">
</form>
</td>
</tr>
</table>
_HTML;
}
echo <<<_HTML
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