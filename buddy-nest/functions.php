<?php  //all functions are in this file
$dbhost = 'localhost';  // host address
$dbname = 'buddy_nest';  // name of database
$dbuser = 'root';  // user_id of database
$dbpass = 'teddy'; // password of database
$appname = "Buddy Nest";  // name of application

mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
if(databaseExists($dbname))
{
mysql_select_db($dbname) or die(mysql_error());
}

function databaseExists($dbname)
{
$query="SHOW databases";
$result=mysql_query($query);
$rows=mysql_num_rows($result);
for($i=0;$i<$rows;$i++)
{
$d=mysql_result($result,$i,'Database');
if($d==$dbname)
{
$exists=1;
}
}
if(isset($exists))
{
return 1;
}
else 
{
return 0;
}
}

function createTable($name, $query)
{
if (tableExists($name))
{
echo "Table '$name' already exists<br />";
}
else
{
queryMysql("CREATE TABLE $name($query)");
echo "Table '$name' created<br />";
}
}
function tableExists($name)
{
$result = queryMysql("SHOW TABLES LIKE '$name'");
return mysql_num_rows($result);
}
function queryMysql($query)
{
	$result = mysql_query($query) or die(mysql_error());
	return $result;
}

function destroy_session_and_data()
{
session_start();
$_SESSION=array();
if(session_id()!=""||isset($_COOKIE[session_name()]))
setcookie(session_name(),'',time()-2592000,'/');
session_destroy();
}
?>
