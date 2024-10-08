<?php
require_once('connection.php');
if(isset($_POST['surahname']) && $_POST['surahname'] != ''){
    $name = $_POST['surahname'];
    $sql = "INSERT INTO surah VALUES('','$name')";
    $con->query($sql);
    header('Location:insertsurahform.php');
}