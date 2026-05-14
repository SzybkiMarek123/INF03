<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfigurator samochodów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<?php 
 $connect = mysqli_connect("localhost","root","", "samochody")
?>
    <header>
    <h1>Serwis konfiguracji samochodów</h1>
    </header>
    <nav>
     <h2>Samochody</h2>
     <h2>Konfigurator</h2>
     <h2>Kontakt</h2>
    </nav>
    <main>
        <section>
        <table id = "styleTR">
        <?php 
        $sql1 = 'SELECT pojazdy.marka, pojazdy.model, pojazdy.cena, kolory.nazwa, kolory.doplata FROM pojazdy INNER JOIN kolory ON pojazdy.kolor = kolory.id WHERE pojazdy.model = "alfa"';
        $query1 = mysqli_query($connect,$sql1);
        while($row = mysqli_fetch_array($query1)){
            $sum = $row["cena"] + $row["doplata"];
            echo "<tr>";
            echo "<td>" . $row["marka"] . "</td>"."<td>" . $row["model"] . "</td>". "</td>"."<td>" . $row["nazwa"] . "</td>"."<td>" . $sum . "</td>";
            echo "</tr>";
            $sum = 0;
        }
        ?>
        </table>
        </section>
        <section>
        <?php 
        $sql2 = 'SELECT  marka, model, cena FROM pojazdy ORDER BY rand() LIMIT 2';
        $query2 = mysqli_query($connect,$sql2);
        $row1 = mysqli_fetch_row($query2);
        $row2 = mysqli_fetch_row($query2);
        ?>
        <table>
        <tr>
            <th colspan = "2">
                Konfiguracja 
            </th>
            <th>
                Cena
            </th>
        </tr>
        <tr>
            <td colspan = "3">
                <img id = "styleIMG" src="a1.jpg" alt="Konfiguracja 1">
            </td>
        </tr>
        <tr>
            <td>Marka</td>
            <td><?php echo $row1[0];?></td>
            <td rowspan = "2"><?php echo $row1[2];?></td>
        </tr>
        <tr>
            <td>Model</td>
            <td><?php echo $row1[1];?></td>
        </tr>
        <tr>
            <td colspan = "3">
                <img id = "styleIMG" src="a2.jpg" alt="Konfiguracja 2">
            </td>

        </tr>
            <td>Marka</td>
            <td><?php echo $row2[0];?></td>
            <td rowspan = "2"><?php echo $row2[2];?></td>
        </tr>
        <tr>
            <td>Model</td>
            <td><?php echo $row2[1];?></td>
            </td>
        </tr>
        </table>
        </section>
        <section>
        <h3>111 222 444</h3>
        <img src="a3.png" alt="Samochód">
        </section>
    </main>
    <footer>
    <P>Stronę wykonał: numer zdającego.</P>
    </footer>

    <?php 
    mysqli_close($connect)
    ?>
</body>
</html>