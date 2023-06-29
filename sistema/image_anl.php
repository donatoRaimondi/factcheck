<?php
require '../config/config.php';
include '../config/authsession.php';
 ?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Image analyzer</title>
  <title> Upload field </title><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://raw.github.com/daneden/animate.css/master/animate.css'><link rel="stylesheet" href="../style/anl.css">

</head>
<body>
<!-- partial:index.partial.html -->
  
<main>
<div class="upload">
<form class="form" action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" id="imageInput" accept=".png,.jpg,.jpeg,.svg,.mov,.mkv,.avi,.mp4,.wav,.mp3"  />
     <input type="submit" name="submit" value="SEND" id="upload-btn"/>
</form>
         <div class="upload-field" id="dropZone" >
          <div class="icon-field" ><span class="fa fa-file-o"></span>
            <p>Drag your image here</p>
          </div>
        </div>
    </div>
  </div>
</main>
<div class="button-container1">
<button id="mostraMediaButton" class="button"><span class="span-button">Mostra Media</span></button>
</div>
<div id="mediaContainer"></div>
<!-- partial -->
  <script src="../js/drop.js" charset="utf-8"></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../js/dragdrop.js"></script>
  <script>
  $(document).ready(function() {
    $('#mostraMediaButton').click(function() {
      $.ajax({
        url: 'get_media.php',
        type: 'GET',
        success: function(response) {
          $('#mediaContainer').html(response);
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });
  </script>
</body>
</html>
