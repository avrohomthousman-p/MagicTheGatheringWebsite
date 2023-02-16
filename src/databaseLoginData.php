<?php

define("DBpasswordFile", "MYSQL_data.txt");


function getDatabasePassword(){
	$myfile = fopen(DBpasswordFile, "r") or die("Database login failed!");
	$password = fgets($myfile);
	fclose($myfile);

	return $password;
}