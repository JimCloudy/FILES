<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php

if ($_FILES["afile"]["error"] > 0)
{
	echo "Error: " . $_FILES["afile"]["error"] . "<br/>";
}
else
{
	echo "Upload: " . $_FILES["afile"]["name"] . "<br/>";
	echo "Type: " . $_FILES["afile"]["type"] . "<br/>";
	echo "Size: " . $_FILES["afile"]["size"] . "<br/><br/>";


	if (file_exists("/home/a3940063/public_html/misc/" . $_FILES["afile"]["name"]))
	{
		echo $_FILES["afile"]["name"] . " already exists.";
	}
	else
	{
		move_uploaded_file($_FILES["afile"]["tmp_name"],
			"/home/a3940063/public_html/misc/" . $_FILES["afile"]["name"]);
		echo "Stored in: " . "misc/" . $_FILES["afile"]["name"];
	}

		$con = mysql_connect("mysql5.000webhost.com", "a3940063_cloudy", "6doubles");
		if(!$con)
		{
			die('Could not connect: ' . mysql_error());
		}	

		mysql_select_db("a3940063_files", $con);

		$result = mysql_query("SELECT * FROM Users WHERE UName=" . '"' . $_POST['auser'] . '"');

		$row = mysql_fetch_array($result);	

		if(!$row)
		{
			mysql_query("INSERT INTO Users(UName, Upass)
				VALUES(" . '"' . $_POST['auser'] . '", "mypass")');
			$result = mysql_query("SELECT * FROM Users WHERE UName=" . '"' . $_POST['auser'] . '"');
		
			$row = mysql_fetch_array($result);

			mysql_query("INSERT INTO Files (FName, userID)
			VALUES(" . '"' . $_FILES['afile']['name'] . '"' . "," . $row['userID'] . ")");
		}
		else
		{
		mysql_query("INSERT INTO Files (FName, userID)
			VALUES(" . '"' . $_FILES['afile']['name'] . '"' . "," . $row['userID'] . ")");
		}
	
		mysql_close($con);
	
}
?>

<br/>
<br/>
<a href="index.php">Back To File System</a>
<br/>

<?php
include("show_files.php");
?>

</body>
</html>

