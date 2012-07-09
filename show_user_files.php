<?php
$q=$_GET["q"];

$con = mysql_connect("mysql5.000webhost.com", "a3940063_cloudy", "6doubles");
if(!$con)
{
	die('Could not connect: ' . mysql_error());
}	

mysql_select_db("a3940063_files", $con);

$sql="SELECT * FROM Files WHERE userID =". $q;

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	echo "<b>" . $row['FName'] . "</b>";
	echo "<br/>";
}
?>


