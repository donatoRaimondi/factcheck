<?php
require '../config/config.php';
$username= 'GUEST';
$result = mysqli_query($conn, "SELECT * FROM utente WHERE username ='$username' ");
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0){
     $_SESSION['username'] = $row["username"];
     $_SESSION['id'] = $row["id"];
     header("Location: home.php");
   }
?>
