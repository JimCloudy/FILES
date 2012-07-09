<?php 

chdir("misc");

$dirFiles = glob("*.*");
if($dirFiles)
{
echo '<form action="delete_files.php" method="post">';
echo '<select name="dfile">';
echo '<option value="">Choose File</option>';

foreach($dirFiles as $f)
{
	if((!strpos($f,".php"))&&(!strpos($f, ".htm"))&&(!strpos($f, ".css")))
	{
	echo '<option value="' . $f . '">' . $f . "</option>";
	}
	}

echo "</select>";
echo '<input type="submit" value="DELETE"/>';
echo "</form>";
}
?>
	



