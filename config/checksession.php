<?php
if (isset($_SESSION["id"])) {
    header('Location: ../sistema/home.php');
    exit();
}

 ?>
