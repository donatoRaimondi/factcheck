<?php
require '../config/config.php';

// Eliminazione della notizia
if (isset($_POST['deleteM'])) {
    $idMultimedia = $_POST['id'];

    // Esegui la query per eliminare la notizia
    $sqlDelete = "DELETE FROM multimedia WHERE id = '$idMultimedia'";
    if ($conn->query($sqlDelete) === TRUE) {
        // Eliminazione riuscita
        header("Location: admin.php");
        // Effettua le azioni necessarie
    } else {
        // Errore nell'esecuzione della query di eliminazione
        echo "Errore: " . mysqli_error($conn);
    }
}

    // Puoi anche effettuare ulteriori controlli o azioni dopo l'eliminazione

?>
