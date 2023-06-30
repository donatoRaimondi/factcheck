<?php
require '../config/config.php';

// Eliminazione della notizia
if (isset($_POST['deleteM'])) {
    $idMultimedia = $_POST['id'];
    //ESEGUI QUERY E CANCELLA MEDIA DA PATH
    $sql= "SELECT contenuto from multimedia where id ='$idMultimedia'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $path=$row['contenuto'];
        if (unlink("../uploads/" . $path)) {
          echo "File eliminato con successo.";
        } else {
          echo "Errore durante l'eliminazione del file.";
        }
      }
    }
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
