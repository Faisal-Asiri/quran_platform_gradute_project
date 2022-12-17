<?php
$connection = mysqli_connect('localhost', 'id15193488_faisal', 'FaisalMMM@1429');
if(!$connection){
	die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'id15193488_quran');
if(!$select_db){
	die("Database Selection Failed" . mysqli_error($connection));
}
?>