<?php
/*
This file contains database configuration for mysql
*/

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','password');
define('DB_NAME','php_trip');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_NAME);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
//mysqli_close($conn);
?>