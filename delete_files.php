<?php

chdir("misc");

if($_POST["dfile"]=="")
{
		header ("location: index.php");
}
else
{

if (!unlink($_POST["dfile"]))
  {
   echo ("Error deleting " . $_POST["dfile"]);
  }
else
{
	$con = mysql_connect("mysql5.000webhost.com", "a3940063_cloudy", "6doubles");
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}	

	mysql_select_db("a3940063_files", $con);

	$sql = "DELETE FROM Files WHERE FName=" . '"' . $_POST['dfile'] . '"';

	mysql_query($sql);

	mysql_close($con);
      
	chdir(".");
      
	header ("location: index.php");

}
}
?>

