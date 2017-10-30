
<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="PhpProject2"; // Database name


// Connect to server and select databse.
$con =mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
mysql_query("set names 'utf8'");

         
