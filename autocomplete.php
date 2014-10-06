<?php

	include('config.php');
	connect();

	$select=explode("_",$_POST['op']);
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);

	$sql="SELECT Name FROM Book WHERE Name LIKE '%$my_data%' ORDER BY Name";
	$result = mysql_query($sql) or die(mysqli_error());
	
	echo $select;
	
	if($result)
	{
		while($row=mysql_fetch_array($result))
		{
			echo $row['Name']."\n";
		}
	}
?>