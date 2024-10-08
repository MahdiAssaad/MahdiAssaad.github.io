<?php

session_start();
require_once('connection.php');
$numberofayah = "SELECT COUNT(*) as ayahcount FROM ayah";
$result2 = $con->query($numberofayah);
$row2 = $result2->fetch_assoc();
$numberofayat = $row2['ayahcount'];
$randomayah = rand(1,$numberofayat);
$sql = "SELECT * FROM ayah WHERE AyahID='$randomayah'";
$result = $con->query($sql);
if($result){
    if($result->num_rows>0){
        $nbrow = $result->num_rows;
        $randnumber = rand(1,$nbrow);
        for($i = 0;$i<$randnumber;$i++){
            $row = $result->fetch_assoc();
        }
        $surahid = $row['SurahID'];
        $getsurahname = "SELECT * FROM surah WHERE SurahID='$surahid'";
        $result2 = $con->query($getsurahname);
        if($result && $result2->num_rows>0){
            $row2 = $result2->fetch_assoc();
            $surahname = $row2['SurahName'];
        }
        $Ayah = $row['Ayahtext'];
        $_SESSION['Ayahtext'] = $Ayah;
        $_SESSION['ayahnumber'] = $row['AyahID'];
        $_SESSION['surahnumber'] = $row['SurahID'];
        $surahnumber = $_SESSION['surahnumber'];
        $getinsurahnumber = "SELECT * FROM ayah WHERE SurahID='$surahnumber'";
        $result3 = $con->query($getinsurahnumber);
        if($result3 && $result3->num_rows>0){
            $c = 0;
            $length = $result3->num_rows;
            for($i = 0;$i<$length;$i++){
                $row3 = $result3->fetch_assoc();
                if($row3['Ayahtext'] == $Ayah){
                    $c++;
                    break;
                }
                $c++;
            }
        }
        $_SESSION['ayahinsurahnumber'] = $c;
        $_SESSION['surahname'] = $surahname;
        header('Location:Home.php');
    }else{
        $_SESSION['Ayahtext'] = 'Error!';
        header('Location:Home.php');
    }
}

?>