<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$query="SELECT * FROM message WHERE s_id='$userid'||r_id='$userid' ORDER BY message.time DESC";
$result=mysql_query($query);
$rows=mysql_num_rows($result);

echo <<<_HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Buddy Nest | Messages</title>
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
            <h2>Messages</h2>
          </div>
          <div class="article">
_HTML;

for($i=0;$i<$rows;$i++)
{
$s_id=mysql_result($result,$i,'s_id');
$r_id=mysql_result($result,$i,'r_id');
$timestamp=mysql_result($result,$i,'time');
$time=date("l F jS, Y - g:ia",$timestamp);
$message=mysql_result($result,$i,'message');
$qur="SELECT f_name,l_name FROM profile WHERE u_id='$s_id'";
$rs=mysql_query($qur);
$s_fn=mysql_result($rs,0,'f_name');
$s_ln=mysql_result($rs,0,'l_name');
$qur="SELECT f_name,l_name FROM profile WHERE u_id='$r_id'";
$rs=mysql_query($qur);
$r_fn=mysql_result($rs,0,'f_name');
$r_ln=mysql_result($rs,0,'l_name');

echo <<<_HTML
<table>
<tr>
<td>$r_fn</td>
<td>$r_ln</td>
<td><img src="images/arr.gif"></td>
<td>$s_fn</td>
<td>$s_ln</td>
</tr>
<tr>
<td colspan="5">$time</td>
</tr>
<tr>
<td colspan="5">$message</td>
</tr>
<tr>
<td colspan="2">
<form method="post" action="reply_message.php">
<input type="hidden" name="reciever" value='$s_id'>
<input class="h" type="submit" value="Reply">
</form>
</td>
<td colspan="2">
<form method="post" action="delete_message.php">
<input type="hidden" name="sender" value='$s_id'>
<input type="hidden" name="reciever" value='$r_id'>
<input type="hidden" name="message" value='$message'>
<input class="h" type="submit" value="Delete Message">
</form>
</td>
</tr>
</table>
_HTML;
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