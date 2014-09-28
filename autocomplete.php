<?php
	header('Content-Type: text/html; charset=utf-8');
	mysql_set_charset('utf8');
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	$mysqli=mysqli_connect('localhost','root','','Book') or die("Database Error");
	$sql="SELECT Name FROM Book WHERE Name LIKE '%$my_data%' ORDER BY Name";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['Name']."\n";
		}
	}
?>