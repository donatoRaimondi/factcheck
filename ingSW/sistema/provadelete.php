<?php
// Connessione al database
$conn = mysqli_connect("localhost", "root", "", "factcheck");

// Controllo se è stato inviato un ID tramite il pulsante
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Query per eliminare l'elemento dal database
    $sql = "DELETE FROM notizia WHERE id = $id";

    // Esecuzione della query
    if (mysqli_query($conn, $sql)) {
        echo "Elemento eliminato con successo.";
    } else {
        echo "Errore durante l'eliminazione dell'elemento: " . mysqli_error($conn);
    }
}

// Chiusura della connessione al database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Elimina Elemento</title>
</head>
<body>
    <!-- Form per inviare l'ID dell'elemento da eliminare -->
    <form method="post" action="">
        <input type="input" name="id" value="ID_Da_Eliminare">
        <input type="submit" name="delete" value="Elimina">
    </form>
</body>
</html>
