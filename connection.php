<?php
$servername = 'localhost';
$username = 'root';
$pass = '';
$database = 'Quran';

$con = new mysqli($servername,$username,$pass,$database);
if($con->connect_error){
    die('error during connection!');
}