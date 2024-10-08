<?php
require_once('connection.php');

for($i = 1;$i<=114;$i++){
    $sql = "SELECT * FROM ayah WHERE SurahID='$i'";
    $result = $con->query($sql);
    $c = 1;
    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $surahid = $row['SurahID'];
            $surahnamesql = "SELECT * FROM surah WHERE SurahID='$surahid'";
            $result2 = $con->query($surahnamesql);
            $row2 = $result2->fetch_assoc();
            //if()
            echo $row['Ayahtext']."($c)";
            $c++;
        }
    }
    echo "<br>";
}