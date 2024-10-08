<?php
require_once('connection.php');

function splitStringToArray($input) {
    // Use regex to split the string by the patterns that match "(1)", "(2)", etc.
    $parts = preg_split('/\s*\(\d+\)\s*/', $input);
    
    // Remove any empty elements from the array
    $parts = array_filter($parts);

    // Trim whitespace from each element
    $parts = array_map('trim', $parts);

    return $parts;
}

/*$verses = splitStringToArray("");


//surah ba3ed kaf
foreach($verses as $txt){
    $sql = "INSERT INTO ayah VALUES('','$txt','114')";
    $con->query($sql);
}
echo "done";*/
