<?php
session_start();
require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    <div class="main-cont">



    <div class="navbar"> 
    <div class="navbar-items">
        <a href="index.php">
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
        <?php
        if(isset($_SESSION['ayahnumber']) && $_SESSION['ayahnumber'] != "" && isset($_SESSION['surahnumber']) && $_SESSION['surahnumber'] != ""){
            if($_SESSION['ayahnumber'] != 1){
                if($_SESSION['surahnumber'] != 9)
                echo "بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ";
            }
        }
        ?>
    </div>

        <div class="ayah-cont">
            <div class="nextayah-form">
                <form action="getnextayah.php" method="post">
                    <input type="submit" value="<">
                    <input type="hidden" value="<?php echo $_SESSION['ayahnumber']; ?>" name="ayahnumber">
                    <input type="hidden" value="<?php echo $_SESSION['surahnumber']; ?>" name="surahnumber">
                </form>
            </div>
        <?php
        //ayah text
        if(isset($_SESSION['Ayahtext'])){
            echo $_SESSION['Ayahtext'];
            if(isset($_SESSION['ayahinsurahnumber']) && $_SESSION['ayahinsurahnumber']!=''){
                echo "(".$_SESSION['ayahinsurahnumber'].")";
                $_SESSION['ayahinsurahnumber'] = '';
            }
            $_SESSION['Ayahtext'] = '';
        }else{
            echo '';
        }
        ?>
        <div class="previousayah-form">   
        <form action="getpreviousayah.php" method="post">
            <input type="submit" value=">">
            <input type="hidden" value="<?php echo $_SESSION['ayahnumber']; ?>" name="ayahnumber">
            <input type="hidden" value="<?php echo $_SESSION['surahnumber']; ?>" name="surahnumber">
        </form>
        </div>
        </div>
        <div class="surahname">
            <?php
            if(isset($_SESSION['surahname']) && $_SESSION['surahname'] != ""){
                echo $_SESSION['surahname'];
                $_SESSION['surahname'] = '';
                $_SESSION['ayahnumber'] = '' ;
                $_SESSION['surahnumber'] = '';
            }
            ?>
        </div>
        <div class="button-cont">
        <form action="getrandomverse.php">
        <input type="submit" value="آية من كتاب الله" class="RandomButton">
        </form>
        </div>
        </div>
    </div>
    </div>

    

</body>
</html>