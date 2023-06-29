<?php
require '../config/config.php';

// Query per ottenere i media dal database, ordinati per data di pubblicazione
$sql = 'SELECT * FROM multimedia ORDER BY data_pubblicazione DESC';
$result = $conn->query($sql);

if ($result) {
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $path = $row['contenuto'];
      $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
      $commento = $row['commento'];
      $esito = $row['esito'];
      echo '<p>Esito: ' . ($esito !== null ? $esito : 'non ancora confermato') . '</p>';
        echo '<p>Commento: ' . ($commento !== null ? $esito : 'non ancora confermato') . '</p>';
      // Verifica l'estensione del file per determinare come visualizzarlo
      if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
        // Immagine
        echo '<div class="media">';
        echo '<img src="' . $path . '" alt="Media" width="100px" height="100px">';
        echo '</div>';
      } elseif (in_array($extension, ['mp4', 'avi', 'mov', 'mkv'])) {
        // Video
        echo '<div class="media">';
        echo '<video src="' . $path . '" controls></video>';
        echo '</div>';
      } elseif (in_array($extension, ['mp3', 'wav'])) {
        // Audio
        echo '<div class="media">';
        echo '<audio src="' . $path . '" controls></audio>';
        echo '</div>';
      } else {
        // Tipo di file non supportato
        echo '<div class="media">';
        echo 'File non supportato: ' . $path;
        echo '</div>';
      }
    }
  } else {
    echo 'Nessun media trovato.';
  }
} else {
  echo 'Si è verificato un errore durante l\'esecuzione della query.';
}
?>
