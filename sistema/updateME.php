<?php
require '../config/config.php';

if (isset($_POST['update'])) {
    $idMultimedia = $_POST['id'];
    $esito = $_POST['esito'];

    // Esegui la query per aggiornare l'esito della notizia
    $sqlUpdate = "UPDATE multimedia SET esito = '$esito' WHERE id = '$idMultimedia'";
    if ($conn->query($sqlUpdate) === TRUE) {
        // Aggiornamento riuscito
          header("Location: admin.php");
        // Effettua le azioni necessarie
    } else {
        // Errore nell'esecuzione della query di aggiornamento
        echo "Errore: " . mysqli_error($conn);
    }
     header("Location: admin.php");
   }
?>
