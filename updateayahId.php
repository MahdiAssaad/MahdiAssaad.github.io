<?php
require_once('connection.php');
for($i = 790;$i<=954;$i++){
    $sql = "UPDATE ayah SET SurahID='6' WHERE AyahID='$i'";
    $con->query($sql);
}
echo "DONEEE!";