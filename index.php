<html>
	<head>
		<title>Store Your File</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
function showUserFiles(str)
{
if (str=="")
  {
  document.getElementById("userFiles").innerHTML="<b>Users files will be listed here.</b>";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("userFiles").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","show_user_files.php?q="+str,true);
xmlhttp.send();
}
</script>

	</head>
	<body>
		<div>
		   	<h1>FILES:</h1>
			<form>
				<select name="users" onchange="showUserFiles(this.value)">
				<option value="">Choose User</option>
<?php
	$con = mysql_connect("mysql5.000webhost.com", "a3940063_cloudy", "6doubles");
		if(!$con)
		{
			die('Could not connect: ' . mysql_error());
		}	

		mysql_select_db("a3940063_files", $con);
	$result = mysql_query("SELECT * FROM Users");

		while($row = mysql_fetch_array($result))
		{
			echo "<option value=" . '"' . $row['userID'] . '"' . ">" . $row['UName'] . "</option>";
		}

?>
				</select>
			</form>
		</div>
		
		<div id="userFiles"><b>Users files will be listed here.</b></div>
					
		<div id="getFile">
			<h3>ADD FILE</h3>
			<form action="upload_files.php" method="post"
				enctype="multipart/form-data">
				<label for="auser">User:</label><br/>
				<input type="text" name="auser" id="auser"/><br/>
				<label for="afile">Filename:</label><br/>
				<input type="file" name="afile" id="afile" /><br />
				<input type="submit" name="asubmit" value="Submit" />
			</form>
		</div>

		<div id="remFile">
			<h3>DELETE FILE</h3>
                        <?php include("build_delete_files.php") ?> 
 		</div>
	</body>	
</html>

	
