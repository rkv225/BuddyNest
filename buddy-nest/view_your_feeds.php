<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

$query="SELECT t_id,time,post FROM t_post WHERE u_id='$userid'";
$result=mysql_query($query);
$rows=mysql_num_rows($result);


echo <<<_HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Buddy Nest | Your Feeds</title>
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
            <h2>Your Feeds          </h2>
          </div>
          <div class="article">
_HTML;

for($i=0;$i<$rows;$i++)
{
$t_id=mysql_result($result,$i,'t_id');
$timestamp=mysql_result($result,$i,'time');
$time=date("l F jS, Y - g:ia",$timestamp);
$post=mysql_result($result,$i,'post');
$qur="SELECT u_id FROM t_likes WHERE t_id='$t_id'";
$rs=mysql_query($qur);
$rws=mysql_num_rows($rs);
$show_bt="Like";
$act="likes.php";
for($x=0;$x<$rws;$x++)
{
$y=mysql_result($rs,$x,'u_id');
if($userid==$y)
{
$show_bt="Unlike";
$act="unlike.php";
}
}
echo <<<_END
<table>
<tr>
<td colspan="3">$time</td>
</tr>
<tr>
<td colspan="3">$post</td>
</tr>
<tr>
<td>
<form method="POST" action="comments.php">
		<input type="hidden" name="t_id" value='$t_id' />
		<input class="h" type="submit" value="Comments" />
		</form>
</td>
<td>
<form method="POST" action='$act'>
		<input type="hidden" name="t_id" value='$t_id' />
		<input class="h" type="submit" value='$show_bt ($rws)' />
		</form>
</td>
<td>
<form method="POST" action="delete_post.php">
		<input type="hidden" name="t_id" value='$t_id' />
		<input class="h" type="submit" value="Delete" />
		</form>
		</td>
</tr>
</table>
_END;
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