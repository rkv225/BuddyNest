<?php
include_once 'functions.php';
destroy_session_and_data();
echo <<<_HTML
<html>
<head>
<meta http-equiv="refresh" content="0; URL=home.php">
</head>
<body>
<h4>You have successfully Logged Out</h4><br />
<h2><a href="home.php">HOME</a></h2>
</body>
</html>
_HTML;
?>