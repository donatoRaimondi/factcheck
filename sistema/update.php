<?php
require '../config/config.php';


if (isset($_POST['update'])) {
    $idNotizia = $_POST['id'];
    $esito = $_POST['esito'];

    // Esegui la query per aggiornare l'esito della notizia
    $sqlUpdate = "UPDATE notizia SET esito = '$esito' WHERE id = $idNotizia";
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
