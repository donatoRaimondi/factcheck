<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conn = mysqli_connect("localhost","root","password","factcheck");

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
