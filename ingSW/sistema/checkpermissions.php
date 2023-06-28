<?php
$conn = mysqli_connect("localhost", "root", "", "factcheck");

// Verifica i privilegi dell'utente corrente
$query = "SHOW GRANTS FOR CURRENT_USER()";
$result = mysqli_query($conn, $query);

if ($result) {
    $privileges = mysqli_fetch_row($result);

    // Verifica se l'utente ha i privilegi di eliminazione e aggiornamento
    if (strpos($privileges[0], 'DELETE') !== false && strpos($privileges[0], 'UPDATE') !== false) {
        echo "L'utente ha i permessi necessari per eliminare e aggiornare i dati.";
    } else {
        echo "L'utente non ha i permessi necessari per eliminare e aggiornare i dati.";
    }
} else {
    echo "Errore nella query: " . mysqli_error($conn);
}

// Chiudi la connessione al database
mysqli_close($conn);
 ?>
