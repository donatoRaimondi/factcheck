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
    <a class="navigation-logo" href="#">
      <img src="../Logo/Fact_check_logo2.svg" style="height: 100px;">
    </a>

    <!-- SEARCH -->
    <!--<div class="navigation-search">
      <input type="search" placeholder="search" class="navigation-search__input" />
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-search__icon">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>
    </div>-->

    <!-- NAVIGATION -->
    <nav role="navigation">
      <ul>
        <li>
          <a class="navigation-link" href="../Splashscreen/index.html">
            <i class="fa-regular fa-house-chimney"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Home
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="../Analytics/index.html">
            <i class="fa-solid fa-chart-pie"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Analytics
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="../Searchimage/index.html">
            <i class="fas fa-images"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Image analyzer
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="../Searchpage/index.html">
            <i class="fa-regular fa-newspaper"></i>
            <span class="navigation-link__name js_navigation-item-name">
              News analyzer
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="../Searchvideo/index.html">
            <i class="fab fa-youtube"></i>
            <span class="navigation-link__name js_navigation-item-name">
              Video analyzer
            </span>
          </a>
        </li>
        <li>
          <a class="navigation-link" href="../Searchaudio/index.html">
            <i class="fa-regular fa-podcast"></i>
            <span class="navigation-link__name js_navigation-item-name">
              audio analyzer
            </span>
          </a>
        </li>
      </ul>
    </nav>

    <!-- LOGOUT -->

    <a class="navigation-link logout" href="#">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="navigation-link__icon feather feather-power">
        <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
        <line x1="12" y1="2" x2="12" y2="12"></line>
      </svg>
      <span class="navigation-link__name js_navigation-item-name">
        Logout
      </span>
    </a>
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
