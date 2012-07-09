<?php

$con = mysql_connect("mysql5.000webhost.com", "a3940063_cloudy", "6doubles");
if(!$con)
{
	die('Could not connect: ' . mysql_error());
}	

mysql_select_db("a3940063_files", $con);

$sql = "CREATE TABLE Files
	(
		fileID int NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(fileID),
		FOREIGN KEY(userID) REFERENCES Users(userID),
		FName varchar(50)
	)";

mysql_query($sql,$con);

mysql_close($con);

?>
