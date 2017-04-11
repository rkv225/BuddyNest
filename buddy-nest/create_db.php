<?php
include_once 'functions.php';
echo "Creating Database. Please Wait....";
echo "<br />";
if(databaseExists($dbname))
{
echo "Database $dbname already exists";
}
else
{
$query="CREATE DATABASE $dbname";
mysql_query($query);
echo "Database $dbname Created";
}
?>