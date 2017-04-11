<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

if(isset($_POST['t_id']))
{
$t_id=$_POST['t_id'];

$query="SELECT u_id,time,comment FROM t_comment WHERE t_id='$t_id' ORDER BY t_comment.time ASC";
$result=mysql_query($query);
$rows=mysql_num_rows($result);
}

echo <<<_HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Buddy Nest | Comments</title>
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
            <h2>Comments          </h2>
          </div>
          <div class="article">
		  <form method="post" action="post_comment.php">
		  <textarea name="comment" rows="6" cols="60">
</textarea><br />
<input type="hidden" name="t_id" value='$t_id' />
<input class="h" type="submit" value="Comment" />
</form>
_HTML;

if($rows!=0)
{
for($i=0;$i<$rows;$i++)
{
$u_id=mysql_result($result,$i,'u_id');
$pic="profile-pics/".$u_id."."."jpg";
$query1="SELECT f_name,l_name FROM profile WHERE u_id='$u_id'";
$result1=mysql_query($query1);
$fn=mysql_result($result1,0,'f_name');
$ln=mysql_result($result1,0,'l_name');
$timestamp=mysql_result($result,$i,'time');
$time=date("l F jS, Y - g:ia",$timestamp);
$comment=mysql_result($result,$i,'comment');
echo <<<_END
<br />
<table>
<tr>
<td><img src='$pic' height="50" width="50"></td>
<td>$fn</td>
<td>$ln</td>
</tr>
<tr>
<td colspan="3">$time</td>
<tr>
<td colspan="3"><strong>$comment</strong></td>
</tr>
_END;
if($u_id==$userid)
{
echo <<<_END
<tr>
<td>
<form method="post" action="delete_comment.php">
<input type="hidden" name="text" value='$comment' />
<input type="hidden" name="t_id" value='$t_id' />
<input class="h" type="submit" value="Delete" />
</form>
</tr>
_END;
}
}
}

echo <<<_HTML
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