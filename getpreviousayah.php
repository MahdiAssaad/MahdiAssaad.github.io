<?php

require_once('connection.php');
session_start();

if(isset($_POST["ayahnumber"])){
    $ayahnumber = $_POST['ayahnumber'] - 1;
    $sql = "SELECT * FROM ayah WHERE AyahID='$ayahnumber'";
    $result = $con->query($sql);
    if($result && $result->num_rows>0){
        $row = $result->fetch_assoc();
        $ayahtext = $row['Ayahtext'];
        $_SESSION['Ayahtext'] = $ayahtext;
        $_SESSION['ayahnumber'] = $ayahnumber;
        $surahnumber = $row['SurahID'];
        $_SESSION['surahnumber'] = $surahnumber;
        $sql2 = "SELECT * FROM Surah WHERE SurahID='$surahnumber'";
        $result2 = $con->query($sql2);
        $row2 = $result2->fetch_assoc();
        $surahname = $row2['SurahName'];
        $_SESSION['surahname'] = $surahname;

        $getinsurahnumber = "SELECT * FROM ayah WHERE SurahID='$surahnumber'";
        $result3 = $con->query($getinsurahnumber);
        if($result3 && $result3->num_rows>0){
            $c = 0;
            $length = $result3->num_rows;
            for($i = 0;$i<$length;$i++){
                $row3 = $result3->fetch_assoc();
                if($row3['Ayahtext'] == $ayahtext){
                    $c++;
                    break;
                }
                $c++;
            }
        }
        $_SESSION['ayahinsurahnumber'] = $c;
        header('location:Home.php');
    }
}