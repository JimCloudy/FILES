<?php

$con = mysql_connect("mysql5.000webhost.com", "a3940063_cloudy", "6doubles");
if(!$con)
{
	die('Could not connect: ' . mysql_error());
}	

mysql_select_db("a3940063_files", $con);

mysql_query("INSERT INTO Users (UName, UPass)
	VALUES('Brent', 'mypass')");

mysql_close($con);

?>
