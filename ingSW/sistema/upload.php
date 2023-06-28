<?php
require '../config/config.php';
include '../config/authsession.php';

// Check if a file was uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
  $id = $_SESSION['id'];
  $data_pubblicazione = date('Y-m-d H:i:s');
  $allowedTypes = array('image/png', 'image/jpeg', 'video/mp4','image/svg' ,'video/mov','video/x-matroska','video/webm','video/avi', 'audio/mp3', 'audio/wav');
  $file = $_FILES['file'];
  $filename = $file['name'];
  $tmpPath = $file['tmp_name'];
  $fileType = $_FILES['file']['type'];
  if(in_array($fileType, $allowedTypes)){
    // Generate a unique file name
    $uniqueFilename = uniqid() . '_' . $filename;

    // Specify the upload directory
    $uploadPath = '../uploads/' . $uniqueFilename;

    // Move the uploaded file to the upload directory
    move_uploaded_file($tmpPath, $uploadPath);

    // Insert image details into the database
    $query = mysqli_query($conn, "INSERT INTO multimedia (id,id_utente,contenuto,data_pubblicazione) VALUES (NULL,'$id','$uploadPath','$data_pubblicazione')");


    // Return a response
    echo 'Media uploaded successfully!';
  }else {
        echo 'Invalid file type. Only PNG, JPEG, JPG, MP4 and MP3 files are allowed.';
  }
  }else {
    // Return an error response
    http_response_code(400);
    echo 'Error: No file uploaded!';
  }
?>
