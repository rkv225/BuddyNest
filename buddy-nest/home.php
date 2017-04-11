<?php
include_once 'functions.php';
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];
echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=view_profile.php">
</head>
<body>
<h4>You are logged in as $userid.<br>
<a href="view_profile.php">Click here</a> to continue.<br>
Sign in with other user,<a href="log_out.php">Click Here.</a>
</h4>
</body>
</html>
_HTML;
}
else
{
echo <<<_HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Buddy Nest | Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" href="icon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="icon.ico" type="image/x-icon" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 1;
	left: 132px;
	top: 443px;
}
#apDiv2 {
	position: absolute;
	width: 455px;
	height: 373px;
	z-index: 1;
	left: 170px;
	top: 380px;
	background-color: #FFFFFF;
	background-image: url(images/signup-img.png);
	text-align: center;
}
#apDiv3 {
	position: absolute;
	width: 458px;
	height: 374px;
	z-index: 2;
	left: 633px;
	top: 380px;
	text-align: center;
	font-size: xx-large;
	background-image: url(images/login-img.png);
}
#apDiv4 {
	position: absolute;
	width: 171px;
	height: 68px;
	z-index: 3;
	left: 148px;
	top: 257px;
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
        <h1><span>Buddy </span>Nest <small>Stay Connected</small></h1>
      </div>
      <div class="clr"></div>
      <div class="hbg"><img src="images/header_images.jpg" width="923" height="291" alt="" /></div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div id="apDiv3">
      <p>&nbsp;</p>
      <p><h2>Registered User<strong></strong></h2>
      <strong><h2>Log In</h2></strong></p>
      <form action="log_in.php" method="post" enctype="multipart/form-data" name="Log in form" id="Log in form">
        <p>
          <label for="u_id"><b>User ID</b>
          </label>
          <input type="text" name="u_id" /><br />
          <label for="pass">
            <b>Password</b></label>
          <input type="password" name="pass" /><br />
          </p>
        <p>
          <input class="h" type="submit" value="LOG IN" />
        </p>
      </form>
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
    <div class="content">
      <div class="content_bg">
        <div class="clr"></div>
        <div id="apDiv2">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>Not a </p>
        <p>Registered User </p>
        <div id="apDiv4"><div class="my_button round my_font h l">
        <a href="sign_up_form.php">Sign Up</a> &nbsp;</div></div>
        </p>
        </div>
      </div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2>About</h2>
        <p>This website is being created as a Major Project for our Final Year of Diploma in Engineering course.</p>
      </div>
      <div class="col c2">
        <h2>Developer</h2>
        <p>Developer Team<br />
		Rishabh Kumar Varshney<br />
		Shaukat Ali<br />
		Kushagra Gupta<br />
		Abhinav Sinha</p>
      </div>
	  <div class="col c3">
        <h2>Support</h2>
        <p>The developer team would like to thanks to Dr. Anis Afzal and Salim Ishtiyaq. They have supported and review our work and guided through this project.</p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>
_HTML;
}
?>