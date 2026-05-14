<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
    $connect = mysqli_connect("localhost","root","","mateusz2025");
    ?>
    <header>
    <h1>Ranking gier komputerowych</h1>
    </header>
    <main>
        <section id="sekcjaLEWA">
            <?php
            $sql1 ='SELECT nazwa,punkty FROM gry ORDER BY punkty DESC LIMIT 5 ';
            $zapytanie1 = mysqli_query($connect,$sql1);
            ?>
        <h3>Top 5 gier w tym miesiącu</h3>
        <ul>
        <?php 
        foreach($zapytanie1 as $wynik1){
        echo "<li>". $wynik1["nazwa"]."<span id='punkty'>". $wynik1["punkty"]."</li>";
        }
        ?>
        </ul>
        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Stronę wykonał</h3>
        <P>numer zdającego</P>
        </section>
        <section id="sekcjaSRODEK">
        <?php
            $sql2 ='SELECT id,nazwa,zdjecie FROM gry;';
            $zapytanie2 = mysqli_query($connect,$sql2);
            foreach($zapytanie2 as $wynik2){
            echo"<div>". '<img src="'.$wynik2['zdjecie'].'"alt="'.$wynik2['nazwa'].'" title="'.$wynik2['id'].'">'."</div>";
            }
        ?>
        </section> 
        <section id="sekcjaPRAWA">
            <h3>Dodaj nową grę</h3>
            <form action=""method="POST">
                <label for="nazwa">nazwa</label><br>
                <input type="text" name= "nazwa"><br>

                <label for="opis">opis</label><br>
                <input type="text" name= "opis"><br>

                <label for="cena">cena</label><br>
                <input type="text" name= "cena"><br>

                <label for="zdjecie">zdjecie</label><br>
                <input type="text" name= "zdjecie"><br>
                <button type="submit">DODAJ</button>
            </form>
            <?php
            if(isset($_POST["nazwa"])){
            $nazwa = $_POST["nazwa"];
            $opis = $_POST["opis"];
            $cena = $_POST["cena"];
            $zdjecie = $_POST["zdjecie"];

            $sql4 ="INSERT INTO gry(nazwa,opis,punkty,cena,zdjecie) VALUES('$nazwa','$opis',0,'$cena','$zdjecie')";
            $zapytanie4 = mysqli_query($connect,$sql4);
            }
            ?>
        </section>
    </main>
    <footer>
    <form action=""method="post">
        <input type="text"name="id">
        <button type="submit">Pokaż opis</button>
    </form>
    <?php
        if(isset($_POST["id"])){
        $id = $_POST["id"];
        $sql3 ="SELECT nazwa, LEFT(opis, 100), punkty, cena FROM gry WHERE id = '$id'";
        $zapytanie3 = mysqli_query($connect,$sql3);
        $zapytanie3ROW = mysqli_fetch_row($zapytanie3);
        echo "<h2>"."„".  $zapytanie3ROW[0] .", ". $zapytanie3ROW[2]."punktów, ". $zapytanie3ROW[3].'zł"'."</h2>";
        echo "<p>".$zapytanie3ROW[1]."</p>";
        }
    ?>
    </footer>
    <?php
    mysqli_close($connect)
    ?>
</body>
</html>