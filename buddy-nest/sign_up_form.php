<?php

echo <<<_HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Buddy Nest | Sign Up</title>
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
<script type="text/javascript" language="javascript">
function checkSubmit ( thisForm ) {
if ( thisForm.f_name.value == '' )
{
alert('Please enter your First Name.');
return false;
}
if ( thisForm.l_name.value == '' )
{
alert('Please enter your Last Name.');
return false;
}
if ( thisForm.gender.value == '' )
{
alert('Please select your Gender.');
return false;
}
if ( thisForm.date.value == '0')
{
alert('Please select Date.');
return false;
}
if ( thisForm.month.value == '' )
{
alert('Please select Month');
return false;
}
if ( thisForm.year.value == '' )
{
alert('Please enter Year ');
return false;
}
if ( thisForm.country.value == '' )
{
alert('Please select your Country.');
return false;
}
if ( thisForm.u_id.value == '' )
{
alert('Please enter your UserName');
return false;
}
if ( thisForm.pwd1.value == '' )
{
alert('Please enter your Password.');
return false;
}
if ( thisForm.pwd2.value== '' )
{
alert('Please retype your password correctly');
return false;
}

return true;
}
</script>
</head>
<body>
<div class="main">
  <div class="main_resize">
    <div class="header">
      <div class="logo">
        <a href="home.php"><h1><span>Buddy </span>Nest <small>Stay Connected</small></h1></a>
      </div>
      <div class="clr"></div>
      <div class="hbg"><img src="images/header_images.jpg" width="923" height="291" alt="" /></div>
       <div class="content">
    <h1>SIGN UP</h1>
    <p>Please fill in the form to complete the registration process.</p>
    <form action="sign_up.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return checkSubmit(this);">
      <p>
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" />
      </p>
	  <p>
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" />
      </p>
      <p>
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </p>
      <p>Date of Birth: 
        <label for="date">Date</label>
        <select name="date" id="date">
          <option value="1" selected="selected">1</option>
          <option value="2">2 </option>
          <option value="3">3 </option>
          <option value="4">4 </option>
          <option value="5">5 </option>
          <option value="6">6 </option>
          <option value="7">7 </option>
          <option value="8">8 </option>
          <option value="9">9 </option>
          <option value="10">10 </option>
          <option value="11">11 </option>
          <option value="12">12 </option>
          <option value="13">13 </option>
          <option value="14">14 </option>
          <option value="15">15 </option>
          <option value="16">16 </option>
          <option value="17">17 </option>
          <option value="18">18 </option>
          <option value="19">19 </option>
          <option value="20">20 </option>
          <option value="21">21 </option>
          <option value="22">22 </option>
          <option value="23">23 </option>
          <option value="24">24 </option>
          <option value="25">25 </option>
          <option value="26">26 </option>
          <option value="27">27 </option>
          <option value="28">28 </option>
          <option value="29">29 </option>
          <option value="30">30 </option>
          <option value="31">31 </option>
        </select>
        <label for="month">Month</label>
        <select name="month" id="month">
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
        <label for="year">Year</label>
        <input type="text" size="5" name="year">
      </p>
      <p>
        <label for="e_mail">E Mail</label>
        <input type="text" name="e_mail" id="e_mail" size="25" />
      </p>
      <p>
        <label for="country">Country</label>
        <select name="country" id="country">
          <option value="India">India</option>
        </select>
      </p>
      <p>
        <label for="u_id">Username</label>
        <input type="text" name="u_id" id="u_id" />
      </p>
      <p>
        <label for="pwd1">Input Password</label>
        <input type="password" name="pwd1" id="pwd1" /> 
        </p>
      <p>
        <label for="pwd2">Re-Type Password</label>
        <input type="password" name="pwd2" id="pwd2" />
      </p>
      <p>
        <input class="h" type="submit" name="submit" id="submit" value="Sign Up" />
        <input class="h" type="reset" name="Reset" id="button" value="Reset" />
      </p>
      <p>*Note: You can also edit your profile afterwards.</p>
    </form>
    </div>
    <div class="content">
      <div class="content_bg">
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>
_HTML;
?>