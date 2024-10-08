<?php
session_start();
require_once("connection.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM ayah WHERE SurahID='$id'";
    $result = $con->query($sql);
    $ayahtext = "";
    if($result && $result->num_rows>0){
        $c = 1;
        while($row = $result->fetch_assoc()){
            $ayahtext .= $row['Ayahtext'];
            $ayahtext = $ayahtext . "(".$c.")";
            if($c%2 == 0){
                $ayahtext = $ayahtext . "<br>";
                $ayahtext = $ayahtext . "<br>";
            }
            $c++;
        }
    }
}

?>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sourah</title>
    <link href="css/main.css" rel="stylesheet">

</head>
<body>
<div class="main-cont">
<div class="navbar"> 
<div class="navbar-items">
    <a href="index.php.php">
        <div class="item">
            <div class="text">الصفحة الرئيسية</div>
        </div>
    </a>
    <div class="item-dropdown">
        <div class="item" id="surah-toggle">
            <a><div class="text">سور القرآن الكريم</div></a>
        </div>
        <div class="dropdown-content" id="dropdown-content">
            <?php
            $query = "SELECT * FROM Surah";
            $result = $con->query($query);
            while($row = $result->fetch_assoc()){
                echo "<a href='sourah.php?id=$row[SurahID]'><div class='dropdown-item'>$row[SurahName]</div></a>";
            }
            ?>
        </div>
    </div>
    <a href="Search.php">
        <div class="item">
            <div class="text">في أي سورة؟</div>
        </div>
    </a>
</div>
<script src="js/main.js"></script>
</div>

<div class="page-cont">
    <div class="bismillah-cont">
    بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
    </div>
    <div class="sourah-cont">
        <?php
        echo $ayahtext;
        ?>
    </div>
</div>
</div>
</body>
<style>
    body{
        overflow-y: auto;

    }
    .page-cont{
        overflow-y: auto;
        overflow-x: hidden;
        height: 100%;
    }
</style>
</html>