<?php

$servername = "localhost";
$username = "root"; // Nome utente del database
$password = ""; // Password del database
$dbname = "factcheck"; // Nome del database

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conn = mysqli_connect("$servername","$username","$password","$dbname");

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
