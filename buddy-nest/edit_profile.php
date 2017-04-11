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
<title>Buddy Nest | Edit Profile</title>
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
            <h2>Edit Profile        </h2>
          </div>
          <div class="article">
		   <form action="edit_saved_profile.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
		    <p>
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" value='$profile[f_name]' />
      </p>
	   <p>
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" value='$profile[l_name]' />
      </p>
	   <p>
        <label for="gender">Gender</label>
        <input type="text" name="gender" value='$profile[gender]' />
      </p>
	   <p>
        <label for="dob">Date of Birth</label>
        <input type="text" name="dob" value='$profile[dob]' />
      </p>
	   <p>
        <label for="email">E-Mail</label>
        <input type="text" name="email" value='$profile[email]' />
      </p>
	   <p>
        <label for="country">Country</label>
        <input type="text" name="country" value='$profile[country]' />
      </p>
	   <p>
        <label for="about">About</label>
        <input type="text" size="50" name="about" value='$profile[about]' /></textarea>
      </p>
	   <p>
        <label for="hometown">Hometown</label>
        <input type="text" name="hometown" value='$profile[hometown]' />
      </p>
	   <p>
        <label for="religion">Religion</label>
        <input type="text" name="religion" value='$profile[religion]' />
      </p>
	   <p>
        <input type="submit" value="Save Changes" />
      </p>
		   </form>
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
<h3>Please <a href="home.html">Log In</a> To View this Page.</h3>
_HTML;
}
?>