<?php
require '../config/config.php';
//if (session_status() === PHP_SESSION_NONE) {
  //session_start();
//}
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        $conn->close();
        header("Location: ../index.php");
    }
?>
