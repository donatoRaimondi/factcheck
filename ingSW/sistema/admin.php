<?php
require '../config/config.php';
// Recupera le notizie
$sqlNews = "SELECT * FROM notizia ORDER BY data_pubblicazione";
$resultNews = $conn->query($sqlNews);

// Recupera i media
$sqlMedia = "SELECT * FROM multimedia ORDER BY data_pubblicazione DESC";
$resultMedia = $conn->query($sqlMedia);
?>

<html>
<head>
</head>
<body>
    <h2>Notizie</h2>
    <?php
    if ($resultNews->num_rows > 0) {
        while ($rowNews = $resultNews->fetch_assoc()) {
            $idNotizia = $rowNews['id'];
            $contenuto = $rowNews['contenuto'];
            $esito = $rowNews['esito'];
            $dataPubblicazione = $rowNews['data_pubblicazione'];

            echo '<div class="news">';
            echo '<p>Contenuto: ' . $contenuto . '</p>';
            echo '<p>Esito: ' . $esito . '</p>';
            echo '<p>Data Pubblicazione: ' . $dataPubblicazione . '</p>';
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $idNotizia . '">';
            echo '<input type="submit" name="delete" value="Elimina">';
            echo '</form>';
            echo '<form action="update.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $idNotizia . '">';
            echo '<input type="text" name="esito" value="' . $esito . '">';
            echo '<input type="submit" name="update" value="Modifica Esito">';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo 'Nessuna notizia trovata.';
    }
    ?>

    <h2>Media</h2>
    <?php
    if ($resultMedia->num_rows > 0) {
        while ($rowMedia = $resultMedia->fetch_assoc()) {
            $idMedia = $rowMedia['id'];
            $contenuto = $rowMedia['contenuto'];
            $dataPubblicazione = $rowMedia['data_pubblicazione'];

            echo '<div class="media">';
            echo '<p>Contenuto: ' . $contenuto . '</p>';
            echo '<p>Data Pubblicazione: ' . $dataPubblicazione . '</p>';
            echo '<form action="deleteM.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $idMedia . '">';
            echo '<input type="submit" name="delete" value="Elimina">';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo 'Nessun media trovato.';
    }
    ?>
</body>
</html>
