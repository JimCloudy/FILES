<?php

echo "<div><h1>FILES FOR " . $_POST['auser'] . ":</h1>";

$con = mysql_connect("mysql5.000webhost.com", "a3940063_cloudy", "6doubles");
if(!$con)
{
	die('Could not connect: ' . mysql_error());
}	

mysql_select_db("a3940063_files", $con);

$result = mysql_query("SELECT * FROM Users WHERE UName=" . '"' . $_POST['auser']. '"');

$row = mysql_fetch_array($result);

if($row)
{

$files = mysql_query("SELECT * FROM Files WHERE userID=" . $row['userID']);

echo "<ul>";

while($row = mysql_fetch_array($files))
{
	if((!strpos($row['FName'],".php"))&&(!strpos($row['FName'], ".htm"))&&(!strpos($row['FName'], ".css")))
	{
		echo "<li>" . $row['FName'] . "</li>";
	}
}

echo "</ul></div>";
}
?>
