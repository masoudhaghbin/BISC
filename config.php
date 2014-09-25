<?php
function connect()
{
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("Book");
}
?>