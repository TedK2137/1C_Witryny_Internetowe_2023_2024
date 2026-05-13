<?php
    $conn = new mysqli("localhost", "root", "", "kino");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista aktorów | KinoTEKA</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <div id="header1">
            <h2><a href="index.php">KinoTEKA</a></h2>
        </div>

        <div id="header2">
            <p><em>W naszej bazie znajdują się najlepsi aktorzy</em></p>
        </div>

        <main>
            <h1>Najlepsi aktorzy tylko w naszym kinie</h1>
            <div id="wynik">
                <?php
                    $query = "SELECT * FROM aktorzy ORDER BY nazwisko ASC, imie ASC;";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<div>";
                            echo "<a href='aktor.php?id=".$row['id_aktora']."'>";
                                echo "<img src='".$row['plik_awatara']."' alt='".$row['imie']." ".$row['nazwisko']."' title='".$row['imie']." ".$row['nazwisko']."'>";
                                echo "<p>".$row['imie']." ".$row['nazwisko']."</p>";
                            echo "</a>";
                        echo "</div>";
                    }
                ?>
            </div>
        </main>

        <footer>
            <p>Autor:*numer zdającego*</p>
        </footer>
    </body>
</html>

<?php
    $conn->close();
?>