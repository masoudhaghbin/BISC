<?php

function connect()
{
header('Content-Type: text/html; charset=utf-8');
$mycon = mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('Book',$mycon);
mysql_set_charset('utf8');
mysql_set_charset('utf8', $mycon);

}
?>
