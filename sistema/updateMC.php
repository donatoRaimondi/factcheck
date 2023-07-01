<?php
require '../config/config.php';


if (isset($_POST['update'])) {
    $idMedia = $_POST['id'];
    $commento = $_POST['commento'];

    // Esegui la query per aggiornare l'esito della notizia
    $sqlUpdate = "UPDATE multimedia SET commento = '$commento' WHERE id = '$idMedia' ";
    if ($conn->query($sqlUpdate) === TRUE) {
        // Aggiornamento riuscito
        // Effettua le azioni necessarie
    } else {
        // Errore nell'esecuzione della query di aggiornamento
        echo "Errore: " . mysqli_error($conn);
    }
     header("Location: admin.php");
   }
?>
