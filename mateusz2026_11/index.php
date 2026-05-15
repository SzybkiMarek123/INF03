<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista aktorów | KinoTEKA</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
    $connect = mysqli_connect("localhost","root","","kino")
    ?>
    <header>
        <section id="sekcjaLEWA">
            <h2>KinoTEKA</h2>
        </section>
        <section id="sekcjaPRAWA">
            <p><em>W naszej bazie znajdują się najlepsi aktorzy</em></p>
        </section>
    </header>
    <main>
        <h1>Najlepsi aktorzy tylko w naszym kinie</h1>
            <?php
                $sql1='SELECT * FROM aktorzy ORDER BY nazwisko ASC,imie ASC';
                $zapytanie1 = mysqli_query($connect,$sql1);
                foreach($zapytanie1 as $zapytanie1ROW)
                    {
                echo '<a href="aktor.php?id=' . $zapytanie1ROW["id_aktora"] . '">';
                echo '<div id="aktorINDEX">';
                echo '<img src="' . $zapytanie1ROW["plik_awatara"] . '" alt="' . $zapytanie1ROW["imie"] . ' ' . $zapytanie1ROW["nazwisko"] . '" title="' . $zapytanie1ROW["imie"] . ' ' . $zapytanie1ROW["nazwisko"] . '">';
                echo '<p id="aktorP">' . $zapytanie1ROW["imie"] . ' ' . $zapytanie1ROW["nazwisko"] . '</p>';
                echo "</div>";
                echo '</a>';
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