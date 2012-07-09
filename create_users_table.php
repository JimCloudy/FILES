<?php

$con = mysql_connect("mysql5.000webhost.com", "a3940063_cloudy", "6doubles");
if(!$con)
{
	die('Could not connect: ' . mysql_error());
}	

mysql_select_db("a3940063_files", $con);

$sql = "CREATE TABLE Users
	(
		userID int NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(userID),
		UName varchar(12),
		Upass varchar(12)
	)";

mysql_query($sql,$con);

mysql_close($con);

?>
