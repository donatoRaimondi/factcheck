<?php
require '../config/config.php';
include '../config/checksession.php';

if(isset($_POST["submit"])){
  $username= $_POST["username"];
  $password= $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM utente WHERE username ='$username' ");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
     if($password == $row["password"]){
       $_SESSION['username'] = $row["username"];
       $_SESSION['id'] = $row["id"];
       $id= $row["id"];
       header("Location: home.php");
     }
     else{
       echo "<script> alert('password errata') </script>";
     }
  }
  else{
  echo "<script> alert('Username non esistente!') </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="shortcut icon" href="../Logo/Fact_check_favicon.png">
  <link rel="stylesheet" href="../style/login.css">
  <link rel="stylesheet" href="../style/buttonLR.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css'><link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'>
<link rel="stylesheet" href="../Sidebar/style.css">
</head>
<body>
  <!--sidebar-->

  <div class="navigation-container" id="js_navigation-container">
    <div class="navigation-collapse-trigger">
      <span class="navigation-collapse-trigger__orb" id="js_navigation-collapse-trigger">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </span>
    </div>
    <div class="navigation">
      <!-- LOGO -->
      <a class="navigation-logo" href="../index.php">

        <img src="../Logo/Fact_check_logo2.svg" style="height: 100px;">
      </a>

      <!-- NAVIGATION -->
      <nav role="navigation">
        <ul>
          <li>
            <a class="navigation-link" href="loginospite.php">
              <i class="fa-solid fa-person-circle-question"></i>
              <span class="navigation-link__name js_navigation-item-name">
                      Prova il sistema come ospite
              </span>
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </div>

<!--/sidebar-->
<!-- partial:index.partial.html -->
<div id="large-header" class="large-header">
  <canvas id="demo-canvas"></canvas>
</div>
<div class="login-box">
  <h2>Login</h2>
  <form method="POST">
    <div class="user-box">
      <input type="user" name="username" required>
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required>
      <label>Password</label>
    </div>
      <button class="button" name="submit" type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </button>
  </form>
</div>
<!-- partial -->
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script><script  src="../script.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js'></script><script  src="../Sidebar/script.js"></script>
</body>
</html>
