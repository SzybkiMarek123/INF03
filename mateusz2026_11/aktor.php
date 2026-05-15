<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacje o aktorze | KinoTEKA</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
    $connect = mysqli_connect("localhost","root","","kino")
    ?>
    <header>
        <section>
            <h2>KinoTEKA</h2>
        </section>
        <section>
            <p><em>W naszej bazie znajdują się najlepsi aktorzy</em></p>
        </section>
    </header>
    <main>
        <h1>Najlepsi aktorzy tylko w naszym kinie</h1>
        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql2="SELECT imie,nazwisko, plik_awatara FROM aktorzy WHERE id_aktora = $id";
                $zapytanie2 = mysqli_query($connect,$sql2);
                $zapytanie2ROW = mysqli_fetch_row($zapytanie2);
                echo '<div id="aktorAKTOR">';
                echo '<img src="' . $zapytanie2ROW["2"] . '" alt="' . $zapytanie2ROW["0"] . ' ' . $zapytanie2ROW["1"] . '" title="' . $zapytanie2ROW["0"] . ' ' . $zapytanie2ROW["1"] . '">';
                echo '<h1>' . $zapytanie2ROW["0"] . ' ' . $zapytanie2ROW["1"] . '</h1>';
                echo "</div>";

                $sql3="SELECT filmy.id_filmu, filmy.tytul, filmy.rok_produkcji FROM filmy JOIN filmy_aktorzy ON filmy_aktorzy.id_filmu = filmy_aktorzy.id_filmu WHERE filmy_aktorzy.id_aktora = $id;";
                $zapytanie3 = mysqli_query($connect,$sql3);
                $liczbaW = mysqli_num_rows($zapytanie3);
                $imie = $zapytanie2ROW["0"];
                if ($liczbaW > 0) {
                    echo $imie . " znajduje się na listach obsady " . $liczbaW . " znanych nam produkcji.";
                } else {
                    echo "<p>$imie nie znajduje się na listach obsady znanych nam produkcji.</p>";
                }
            }
        ?>
    </main>
    <footer>
    <p><strong>Autor: numer zdającego</strong></p>
    </footer>
    <?php
    mysqli_close($connect)
    ?>
</body>
</html>