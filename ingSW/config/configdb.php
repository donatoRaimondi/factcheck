<?php
$servername = "localhost";
$username = "root"; // Nome utente del database
$password = "password"; // Password del database
$dbname = "factcheck"; // Nome del database

// Connessione al server MySQL
$conn = new mysqli($servername, $username, $password);

// Verifica se la connessione ha avuto successo
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Creazione del database "factcheck" se non esiste già
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    //echo "Il database 'factcheck' è stato creato correttamente.";
} else {
    echo "Errore durante la creazione del database: " . $conn->error;
    $conn->close();
    exit();
}

// Selezione del database "factcheck"
$conn->select_db($dbname);

// Creazione della tabella "utente" se non esiste già
$sql = "CREATE TABLE IF NOT EXISTS utente (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    //echo "La tabella 'utente' è stata creata correttamente.";
} else {
    echo "Errore durante la creazione della tabella 'utente': " . $conn->error;
    $conn->close();
    exit();
}

// Creazione della tabella "notizia" se non esiste già
$sql = "CREATE TABLE IF NOT EXISTS notizia (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_utente INT(11) UNSIGNED,
    contenuto TEXT,
    data_pubblicazione DATETIME,
    esito TEXT,
    commento TEXT,
    FOREIGN KEY (id_utente) REFERENCES utente(id)
)";
if ($conn->query($sql) === TRUE) {
    //echo "La tabella 'notizia' è stata creata correttamente.";
} else {
    echo "Errore durante la creazione della tabella 'notizia': " . $conn->error;
    $conn->close();
    exit();
}

// Creazione della tabella "multimedia" se non esiste già
$sql = "CREATE TABLE IF NOT EXISTS multimedia (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_utente INT(11) UNSIGNED,
    contenuto TEXT,
    data_pubblicazione DATETIME,
    esito TEXT,
    commento TEXT,
    FOREIGN KEY (id_utente) REFERENCES utente(id)
)";
if ($conn->query($sql) === TRUE) {
    //echo "La tabella 'multimedia' è stata creata correttamente.";
} else {
    echo "Errore durante la creazione della tabella 'multimedia': " . $conn->error;
    $conn->close();
    exit();
}

// Verifica se l'utente "guest" esiste già
$sql = "SELECT id FROM utente WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // L'utente "guest" non esiste, quindi procedi con l'inserimento
    $sql = "INSERT INTO utente (id, email, username, password) VALUES (1, NULL, 'guest', 'guest')";
    if ($conn->query($sql) === TRUE) {
        echo "L'utente 'guest' è stato inserito correttamente.";
    } else {
        echo "Errore durante l'inserimento dell'utente 'guest': " . $conn->error;
        $conn->close();
        exit();
    }
}

// Chiusura della connessione al database
$conn->close();
?>
