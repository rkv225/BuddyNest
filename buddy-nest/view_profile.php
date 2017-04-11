<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$p_pic="profile-pics/".$userid."."."jpg";

$query="SELECT * FROM profile WHERE u_id='$userid'";
$result=mysql_query($query);
$rows=mysql_num_rows($result);
for($i=0;$i<$rows;$i++)
{
$profile['userid']=mysql_result($result,$i,'u_id');
$profile['f_name']=mysql_result($result,$i,'f_name');
$profile['l_name']=mysql_result($result,$i,'l_name');
$profile['gender']=mysql_result($result,$i,'gender');
$profile['dob']=mysql_result($result,$i,'d_o_b');
$profile['email']=mysql_result($result,$i,'e_mail');
$profile['country']=mysql_result($result,$i,'country');
$profile['about']=mysql_result($result,$i,'about');
$profile['hometown']=mysql_result($result,$i,'hometown');
$profile['religion']=mysql_result($result,$i,'religion');
}

echo <<<_HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Buddy Nest | View Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" href="icon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="icon.ico" type="image/x-icon" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 179px;
	height: 45px;
	z-index: 1;
	left: 795px;
	top: 99px;
}
#apDiv2 {
	position: absolute;
	width: 179px;
	height: 45px;
	z-index: 1;
	left: 795px;
	top: 170px;
}
#apDiv3 {
	position: absolute;
	width: 179px;
	height: 45px;
	z-index: 1;
	left: 795px;
	top: 270px;
}
</style>
</head>
<body>
<div class="main">
  <div class="main_resize">
    <div class="header">
	<div id="apDiv1"><div class="my_button round my_font2 h l">
        <a href="edit_profile.php">Edit Profile</a> &nbsp;</div></div>
		
		<div id="apDiv2"><div class="my_button2 round my_font3 h l">
        <a href="upload_profile_pic.php">Upload Profile Picture</a></div></div>
		
		<div id="apDiv3"><div class="my_button round my_font2 h l">
        <a href="view_your_feeds.php">Feeds</a> &nbsp;</div></div>
		
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
            <h2>Profile</h2>
          </div>
          <div class="article">
		  <img src='$p_pic' width="200" height="250" />
		  <table cellpadding="5">
		  <tr>
		  <td><b>User ID</b> : </td>
		  <td>$profile[userid]</td>
		  </tr>
		  <tr>
		  <td><b>First Name</b> :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>
		  <td>$profile[f_name]</td>
		  </tr>
		  <tr>
		  <td><b>Last Name</b> : </td>
		  <td>$profile[l_name]</td>
		  </tr>
		  <tr>
		  <td><b>Gender</b> : </td>
		  <td>$profile[gender]</td>
		  </tr>
		  <tr>
		  <td><b>Date of Birth</b> : </td>
		  <td>$profile[dob]</td>
		  </tr>
		  <tr>
		  <td><b>E-Mail</b> : </td>
		  <td>$profile[email]</td>
		  </tr>
		  <tr>
		  <td><b>Country</b> : </td>
		  <td>$profile[country]</td>
		  </tr>
		  <tr>
		  <td><b>About</b> : </td>
		  <td>$profile[about]</td>
		  </tr>
		  <tr>
		  <td><b>Hometown</b> : </td>
		  <td>$profile[hometown]</td>
		  </tr>
		  <tr>
		  <td><b>Religion</b> : </td>
		  <td>$profile[religion]</td>
		  </tr>
		  </table>
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
<h3>Please <a href="home.html">Log In</a> To View this Page.</h3>
_HTML;
}
?>