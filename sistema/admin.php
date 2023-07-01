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
<link rel="shortcut icon" href="../Logo/Fact_check_favicon.png">
</head>
<body>
    <h2>Notizie</h2>
    <?php
    if ($resultNews->num_rows > 0) {
        while ($rowNews = $resultNews->fetch_assoc()) {
            $idNotizia = $rowNews['id'];
            $contenutoN = $rowNews['contenuto'];
            $esitoN = $rowNews['esito'];
            $dataPubblicazioneN = $rowNews['data_pubblicazione'];
            $commentoN = $rowNews['commento'];

            echo '<div class="news">';
            echo '<p>Contenuto: ' . $contenutoN . '</p>';
            echo '<p>Esito: ' . $esitoN . '</p>';
              echo '<p>Commento: ' . $commentoN. '</p>';
            echo '<p>Data Pubblicazione: ' . $dataPubblicazioneN . '</p>';
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $idNotizia . '">';
            echo '<input type="submit" name="delete" value="Elimina">';
            echo '</form>';
            echo '<form action="update.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $idNotizia . '">';
            echo '<input type="text" name="esito" value="' . $esitoN . '">';
            echo '<input type="submit" name="update" value="Modifica Esito">';
            echo '</form>';
            echo '<form action="updateC.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $idNotizia . '">';
            echo '<input type="text" name="commento" value="' . $commentoN . '">';
            echo '<input type="submit" name="updateC" value="Modifica Commento">';
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
            $esito = $rowMedia['esito'];
            $commento = $rowMedia['commento'];
            echo '<p>Contenuto: ' . $contenuto . '</p>';
            echo '<p>Esito: ' . $esito  . '</p>';
              echo '<p>Commento: ' . $commento . '</p>';
            echo '<p>Data Pubblicazione: ' . $dataPubblicazione . '</p>';
            echo '<form action="deleteM.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $idMedia . '">';
            echo '<input type="submit" name="deleteM" value="Elimina">';
            echo '</form>';
            echo '<form action="updateME.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $idMedia  . '">';
            echo '<input type="text" name="esito" value="' . $esito . '">';
            echo '<input type="submit" name="update" value="Modifica Esito">';
            echo '</form>';
            echo '<form action="updateMC.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $idMedia . '">';
            echo '<input type="text" name="commento" value="' . $commento . '">';
            echo '<input type="submit" name="update" value="Modifica Commento">';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo 'Nessun media trovato.';
    }
    ?>
</body>
</html>
