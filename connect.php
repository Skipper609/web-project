<?php

DEFINE ('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mental');

$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD)
or die('failed to login to the data base' );
$dbc->select_db("laptops") or die("could not connect to database");

?>